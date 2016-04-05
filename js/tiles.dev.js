$(window).load(function(){    

    $( function() {

      var qsRegex,
          $searcher_wrap = $( "#searcher_wrap" ),
          $searcher = $( "#searcher" ),
          $window = $( window ).height();

      // init Isotope
      var $grid = $('.grid').isotope({
        itemSelector: '.grid-item',
        percentPosition: true,
        masonry: {
          columnWidth: '.grid-sizer'
        },
        filter: ':not(.title-card)'

      });
    
      // use value of search field to filter
      var $quicksearch = $('.quicksearch').keyup( debounce( function() {
        qsRegex = new RegExp( $quicksearch.val(), 'gi' );
        $grid.isotope({
          filter: function() {
            var search = qsRegex ? $(this).text().match( qsRegex ) : true;
            var notTitleCard = $(this).is( ':not(.title-card)' );
            return search && notTitleCard;
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

      // Main portion that opens and closes the 
      $grid.on( 'click', '.grid-item', function() {
        var $this = $(this),
            dataCheck = $this.data('name'),
            dataName = dataCheck && '#name=' + dataCheck;

        if( !$this.hasClass('open') ) {
          $('.grid-item').removeClass('open')
          $this.addClass('open');
          // Switch image
          imageSwitch($this);

          var $offset = ( $window - $this.height() ) / 2                    

          // bind event
          $grid.one( 'arrangeComplete', function() {
            $('html, body').animate({
              scrollTop: ( $this.offset().top - $offset )
            }, 900); 
          });

          // Add data attribute 'name' to URL has
          window.location.hash = dataName;          
        } else {
          $this.removeClass('open')
        }
        $grid.isotope();                
      });              

      // bind filter button click
      $('#filter').on( 'click', 'button', function() {
        var filterValue = $( this ).attr('data-filter');
        $grid.isotope({ filter: filterValue });
      });

      // change is-checked class on buttons
      $('#filter').each( function( i, buttonGroup ) {
        var $buttonGroup = $( buttonGroup );
        $buttonGroup.on( 'click', 'button', function() {
          $buttonGroup.find('.is-checked').removeClass('is-checked');
          $(this).addClass('is-checked');
        });
      }); 

      // Search field
      $('#searcher').on('click', function(){  

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

      // Open by URL hash
      if(location.hash.match(/^#name/)) {
        var hashName = location.hash.substring(6),
            $dataName = $('*[data-name="' + hashName + '"]');

        $dataName.toggleClass('open');
        $grid.isotope('layout');

        // Replace with high quality image
        imageSwitch($dataName);
      } 


      // Search through category tags
      $('.tags').on('click', 'a', function(els){
        var $this = $(this),
            el = els;
            $text = $this.text();

        el.preventDefault();
        // Stop propagation, otherwise it will bubble and want to close the slide
        el.stopPropagation();
        $grid.isotope({
          filter: function() {
            return $text ? $(this).find('.tags').text().match( $text ) : true;
          }
        });
      })

                 
    });

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