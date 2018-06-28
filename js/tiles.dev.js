$(window).load(function(){    

    // $( function() {


 // lazyloading (not IE) in 3... 2... 1...
  // var ua = window.navigator.userAgent;
  // var msie = ua.indexOf("MSIE ");
  // if (msie < 0) // If NOT Internet Explorer
  // {
      var myLazyLoad = new LazyLoad({
          elements_selector: ".lazy"
      });
  // }



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
        masonry: {
          columnWidth: '.grid-sizer'
        },
        filter: '.2018:not(.title-card)',
      });

      // Remove overlay once all is loaded
      $grid.one( 'arrangeComplete', function() {
        $('#overlay').fadeOut(300, function(){
          $(this).remove();
        });
      });
    
     // Fire isotope initially
     $grid.isotope();

      // use value of search field to filter
     var $quicksearch = $('.quicksearch').keyup( debounce( function() {
       qsRegex = new RegExp( $quicksearch.val(), 'gi' );
       var filterValueReturn = getFilterValue($filter) ? getFilterValue($filter) : '*';
       //console.log(filterValueReturn)
       $grid.isotope({
         filter: function() {
           var $this = $(this);
           var search = qsRegex ? $this.text().match( qsRegex ) : true;
           return search && $this.is( ':not(.title-card)' ) && $this.is(filterValueReturn);
         }
       });
     }, 200 ) );

      // Function to replace the image with the high-rest one
      function imageSwitch(el){
        var $this = el;
        $this.find('.front').css('background-image', 'url(' + $this.data('img') + ')');
      }

      // Find featured images and give them high-res images;
      $('.featured').each( function(i, els){
        var el = $(els);
        imageSwitch(el);
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
          // $this.find('h2').focus();
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

      // bind filter button click
      // $filter.on( 'click', 'button', function() {
      //   var filterValue = $( this ).attr('data-filter');
      //   $grid.isotope({ filter: filterValue });
      // }); 

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

          $dataName.toggleClass('open');
          $grid.isotope();

          // Replace with high quality image
          imageSwitch($dataName);

          // Scroll-to portion
          scrollIt($dataName)          

          // Switch ARIA tags
          aria($dataName)

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
      })

   //  });


   //start ajax of non-current husky 100
   $.ajax({
      url: ajaxpagination.ajaxurl,
      type: 'post',
      dataType: 'html',
      data: {
        action: 'ajax_pagination',
        // query_vars: ajaxpagination.query_vars,
        currentyear: '2018'
      },
      success: function( html ) {
        $content = $( html );
        //$('#main-content ul.grid').append( html );
        //rerun isotope 
        //$grid.isotope();
        $grid.append( $content )
             .isotope( 'appended', $content );
        //rerun lazy
        myLazyLoad.update();
        //console.log( 'done' );
      }
    })

});  

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



