$(window).load(function(){

      var myLazyLoad = new LazyLoad({
          elements_selector: ".lazy"
      });



      var qsRegex,
          $searcher_wrap = $( "#searcher_wrap" ),
          $searcher = $( "#searcher" ),
          $window = $( window ).height(),
          $window_width = $( window ).width(),
          $filter = $('#filter');

      // init Isotope
      var $grid = $('.grid').isotope({
        itemSelector: '.grid-item',
        percentPosition: true,
        filter: getFilterValue($filter),
        masonry: {
          columnWidth: '.grid-sizer'
        },
      });

      // Remove overlay once all is loaded
      $grid.one( 'arrangeComplete', function() {
        $('#overlay').fadeOut(300, function(){
          $(this).remove();
        });
      });

     // Fire isotope initially
     $grid.isotope();
     falseScroll();

      // use value of search field to filter
     var $quicksearch = $('.quicksearch').keyup( debounce( function() {
       qsRegex = new RegExp( $quicksearch.val(), 'gi' );
       var filterValueReturn = getFilterValue($filter) ? getFilterValue($filter) : '*';
       $grid.isotope({
         filter: function() {
           var $this = $(this);
           var search = qsRegex ? $this.text().match( qsRegex ) : true;
           return search && $this.is( ':not(.title-card)' ) && $this.is(filterValueReturn);
         }
       });
     }, 200 ) );
      // Find featured images and give them high-res images;
      $('.featured').each( function(i, els){
        var el = $(els);
        imageSwitch(el);
        myLazyLoad.update();
      })

      // Reusable scroll to position

      function scrollIt(el){
        var $offset = ( $window - el.height() ) / 2
            // Scroll the tile to the top if mobile, otherwise center the tile on desktop
            $mobile = $window_width < 768 ? 50 : $offset

        $grid.one( 'arrangeComplete', function() {
          $('html, body').animate({
            scrollTop: ( el.offset().top - $mobile )
          }, 900);
        });
      }

      // Add and remove ARIA tags
      function aria(el){
        var fullBio = el.find('.full-bio'),
            flipper = el.find('.flipper'),
            hiddenCheck = fullBio.attr( 'aria-hidden', false ) === false ? true : false,
            expandedCheck = flipper.attr( 'aria-expanded', true ) === true ? false : true;

        fullBio.attr( 'aria-hidden', hiddenCheck )
        flipper.attr( 'aria-expanded', expandedCheck )
      }

      // Main portion that opens and closes the tiles
      $grid.on( 'click', '.grid-item', function() {
        var $this = $(this),
            dataCheck = $this.data('name'),
            dataName = dataCheck && '#name=' + dataCheck;

        if( !$this.hasClass('open') && !$this.hasClass('special') ) {
          $('.grid-item').removeClass('open')
          $this.addClass('open');
          // Switch image
          imageSwitch($this);

          // Scroll-to portion
          scrollIt($this)

          // Add data attribute 'name' to URL has
          window.location.hash = dataName;

          // Switch ARIA tags
          aria($this)

        } else {
          $this.removeClass('open')
          // Switch ARIA tags
          aria($this)
        }
        $grid.isotope();
      });

      // Clear select menus and re-isotope
      $('#clear').on('click', function(el){
        el.preventDefault();
        // Clear selects, open class, and hash
        $('select').prop('selectedIndex',0);
        $('.grid-item').removeClass('open');
        $filter.removeClass('select_active')
        $filter.find('li').removeClass('labelToggle')
        window.location.hash = '';
        $grid.isotope({ filter: ':not(.title-card)' });
      })

      $('select#year-awarded').change(function(el){
        location = $(this).find(':selected').data('url');
      });

      // bind filter on select change
      $filter.on( 'change', 'select', function() {
        if(this.value === ''){
         $(this).parent('li').removeClass('labelToggle')
        } else {
          $(this).parent('li').addClass('labelToggle')
        }
       var qsRegex = new RegExp( $('.quicksearch').val(), 'gi' );
       var filterValueReturn = getFilterValue($filter) ? getFilterValue($filter) : '*';

       $grid.isotope({
         filter: function() {
           var $this = $(this);
           var search = qsRegex ? $this.text().match( qsRegex ) : true;
           return search && $this.is( ':not(.title-card)' ) && $this.is(filterValueReturn);
         }
       });
       falseScroll();
       myLazyLoad.update();
      });

      // change is-checked class on buttons
      $filter.each( function( i, buttonGroup ) {
        var $buttonGroup = $( buttonGroup );
        $buttonGroup.on( 'click', 'button', function() {
          $buttonGroup.find('.is-checked').removeClass('is-checked');
          $(this).addClass('is-checked');
        });
      });

      // Search field
      $('#searcher').on('click', function(el){

        el.preventDefault();
        $searcher_wrap.find('input').focus();
        $searcher_wrap.toggleClass('active_search');

        if ( $searcher.hasClass('is-checked') ) {
          $searcher_wrap.find('input').val('')
          $('.quicksearch').keyup();
        }
        $searcher.toggleClass('is-checked');
      })

      // Close on escape
      $(document).on('keyup',function(evt) {
          if (evt.keyCode == 27 && $( "#searcher" ).hasClass('is-checked')) {
            $searcher_wrap.toggleClass('active_search');
            $searcher.toggleClass('is-checked');
            $searcher_wrap.find('input').val('')
          }
      });

      // Triggers open upon return key
      $(document).keypress(function(e) {
          if(e.which == 13) {
              $(e.target).trigger('click')
          }
      });


      // Open by URL hash
    if(location.hash.match(/^#name/)) {
        var hashName = location.hash.substring(6),
            $dataName = $('*[data-name="' + hashName + '"]');

        $dataName.addClass('open');
        $grid.isotope();

        // Replace with high quality image
        imageSwitch($dataName);
        myLazyLoad.update();

        // Scroll-to portion
        scrollIt($dataName);

        // Switch ARIA tags
        aria($dataName);

      }


      // Search through category tags
      $('.tags').on('click', 'a', function(els){
        var $this = $(this),
            el = els;
            $text = $this.text();

        el.preventDefault();
        // Stop propagation, otherwise it will bubble and want to close the slide
        el.stopPropagation();
        $filter.addClass('select_active');
        $grid.isotope({
          filter: function() {
            return $text ? $(this).find('.tags').text().match( $text ) : true;
          }
        });
        falseScroll();
        myLazyLoad.update();
      })

});

//false scroll
function falseScroll() {
  $(window).scrollTop($(window).scrollTop()+1);
}

// Debounce so filtering doesn't happen every millisecond
function debounce( fn, threshold ) {
  var timeout;
  return function debounced() {
    if ( timeout ) {
      clearTimeout( timeout );
    }
    function delayed() {
      fn();
      timeout = null;
    }
    timeout = setTimeout( delayed, threshold || 100 );
  }
}

// IE10 fix for select menu issue
if ("onpropertychange" in document && !!window.matchMedia) {
  $("html").addClass("ie10");
}

function getFilterValue( $filter ) {

  // get filter value from option value

    var filterValue = '';
    var allarts = false;
    $filter.addClass('select_active')
    $('.labelToggle > select').each(function(){
      if($( this ).val() == '.arts-sci-arts, .arts-sci-humanities, .arts-sci-natural-sci, .arts-sci-social-sci, .arts-sci-all-divisions'){
        allarts = true;
      } else {
        filterValue += $( this ).val();
      }
    });
    filterValueReturn = ( allarts ? '.arts-sci-arts'+filterValue+', .arts-sci-humanities'+filterValue+', .arts-sci-natural-sci'+filterValue+', .arts-sci-social-sci'+filterValue+', .arts-sci-all-divisions'+filterValue : filterValue );
    return filterValueReturn;

}

// Function to replace the image with the high-rest one
function imageSwitch(el){
    var $this = el;
    var $front = $this.find('.flipper .front');
    var $img = $this.data('img');
    $front.toggleClass('lazy');
    $front.css('background-image', 'url(' + $img + ')');
}