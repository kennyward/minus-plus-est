

var $stickyHeader = jQuery(".content-area");


// stickykit
jQuery(document).ready(function(){


    var window_width = jQuery( window ).width();

    if (window_width < 900) {
        
      $stickyHeader.trigger("sticky_kit:detach");

      
    } else {
      make_sticky();
    }

    jQuery( window ).resize(function() {

      window_width = jQuery( window ).width();

      if (window_width < 900) {
          
        $stickyHeader.trigger("sticky_kit:detach");
        
      } else {
        make_sticky();
      }

    });

    function make_sticky() {
        $stickyHeader.stick_in_parent({ // stick site-branding in position
             'offset_top':40, //offset top by 40px
        });
    }

});


// fitvids
jQuery( window ).ready(function() {
    jQuery(".item-video").fitVids();
});


// chocolat.js - popup gallery on portfolio item pages
jQuery(document).ready(function(){
    jQuery('.entry-content ').Chocolat({
        imageSelector:'.open-viewer',
        enableZoom:false
    });
});


// identify image orentation for portfolio item gallery
jQuery('.item-images').imagesLoaded( {
  // options...
  },
  function() {
  // images are loaded
  
  }
);





jQuery(document).on('lazybeforeunveil', function(){
    jQuery('.entry-footer').fadeIn();
});