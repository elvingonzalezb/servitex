function debouncer(func, timeout) {
    var timeoutID, timeout = timeout || 500;
    return function() {
        var scope = this,
            args = arguments;
        clearTimeout(timeoutID);
        timeoutID = setTimeout(function() {
            func.apply(scope, Array.prototype.slice.call(args));
        }, timeout);
    }
}

// Without zoom previews switcher
jQuery(function() {
  	if (!$('.product-zoom').length) {
  
    $('#mainProductImg').css({'min-height': $('#mainProductImg img').height(), 'min-width': $('#mainProductImg img').width() })   
      
    $('#smallGallery a').click(function(e){
      	e.preventDefault();
      	$('#smallGallery a').removeClass('active');
      	$(this).addClass('active');
      	var targ = $(this).parent('li').index();
      	var curImg = $('#mainProductImg').find('div.product-main-image__item.active');
      	var cur = curImg.index();
      	if (targ == cur) {
        	return false;
      	}
      	else {
        	var newImg = $('#mainProductImg').find('div.product-main-image__item:nth-child('+ (targ+1) +')');
        	curImg.removeClass('active');
        	newImg.addClass('active')
      	}
    })
    
	}

	var prevW = window.innerWidth || $(window).width();
    
	$(window).resize(debouncer(function(e) {
  
        var currentW = window.innerWidth || $(window).width();
        if (currentW != prevW) {
          	// start resize events            
          	if (!$('.product-zoom').length) {
  
            	$('#mainProductImg').css({'min-height': '', 'min-width': '' })  
            	$('#mainProductImg').css({'min-height': $('#mainProductImg img').height(), 'min-width': $('#mainProductImg img').width() })   

          	}   
          	// end resize events    
        }
        prevW = window.innerWidth || $(window).width();
    }));  
})

// Magnific Popup on Product Image click
jQuery(function() {
  	if ($('#mainProductImg .zoom-link').length) {
    	$('#mainProductImg').magnificPopup({
          	disableOn: 767,
      		  delegate: '.zoom-link',
          	type: 'image',
          	mainClass: 'mfp-fade',
          	preloader: true,
          	fixedContentPos: false,
      		  gallery: {
            	enabled: true,
            	navigateByImgClick: true,
            	preload: [0,1] // Will preload 0 - before current, and 1 after the current image
          	}
        });
  	}
})

// Elevate Zoom
jQuery(function() {
    var windowW = window.innerWidth || document.documentElement.clientWidth;
  	$('.product-zoom').imagesLoaded(function() {
    	if ($('.product-zoom').length) {
    		var zoomPosition
    		if ( $('html').css('direction').toLowerCase() == 'rtl' ) {
      			zoomPosition = 11;
    		}
    		else {
      			zoomPosition = 1
    		}

        if (windowW > 767) {
            	$('.product-zoom').elevateZoom({
                  zoomWindowWidth:0,
                  zoomWindowHeight:0,
                	//zoomWindowHeight: $('.product-zoom').height(),
                	gallery: "smallGallery",
        			    galleryActiveClass: 'active',
        			    zoomWindowPosition  : zoomPosition,
                  borderSize: 0
            	})
        } else {
            	$(".product-zoom").elevateZoom({
                	gallery: "smallGallery",
                	zoomType: "inner",
        			    galleryActiveClass: 'active',
        			    zoomWindowPosition  : zoomPosition
            	});
        }

        if (windowW > 767) {
              $('.product-zoom-2').elevateZoom({
                  zoomWindowHeight: $('.product-zoom').height(),
                  gallery: "smallGallery",
                  galleryActiveClass: 'active',
                  zoomWindowPosition  : zoomPosition
              })
        } else {
              $(".product-zoom-2").elevateZoom({
                  gallery: "smallGallery",
                  zoomType: "inner",
                  galleryActiveClass: 'active',
                  zoomWindowPosition  : zoomPosition
              });
        }

    	}
  	})
  
  
  	$('.product-main-image > .product-main-image__zoom ').bind('click', function(){
      	galleryObj = [];
      	current = 0;
      	itemN = 0;
      
    	if ($('#smallGallery').length){
      		$('#smallGallery li a').not('.video-link').each(function() {
        		if ($(this).hasClass('active')) {
          			current = itemN;
        		}
        		itemN++;
        		var src = $(this).data('zoom-image'),
          		type = 'image';
          		image = {};
          		image ["src"] = src;
          		image ["type"] = type;
        		galleryObj.push(image);
     		 });
    	} else {
        	itemN++;
        	var src = $(this).parent().find('.product-zoom').data('zoom-image'),
          	type = 'image';
          	image = {};
          	image ["src"] = src;
          	image ["type"] = type;
        	galleryObj.push(image);
    	}

      	$.magnificPopup.open({
      		items: galleryObj,
      		gallery: {
        		enabled: true,
      		}
    	}, current);
    
  	});
  
    var  prevW = windowW;

    $(window).resize(debouncer(function(e) {
        var currentW = window.innerWidth || $(window).width();
        if (currentW != prevW) {
	        // start resize events
	        $('.zoomContainer').remove();
	      	$('.elevatezoom').removeData('elevateZoom');

	      	if ($('.product-zoom').length) {
	        	if (currentW > 767) {
	          		$('.product-zoom').elevateZoom({
                  zoomWindowWidth:0,
                  zoomWindowHeight:0,
	            		//zoomWindowHeight: $('.product-zoom').height(),
	            		gallery: "smallGallery",
                  borderSize: 0
	          		})
	        	} else {
	          		$(".product-zoom").elevateZoom({
	            		gallery: "smallGallery",
	           	 		zoomType: "inner"
	          		});
	        	}
	      	}

          if ($('.product-zoom-2').length) {
            if (currentW > 767) {
                $('.product-zoom-2').elevateZoom({
                  zoomWindowHeight: $('.product-zoom').height(),
                  gallery: "smallGallery"
                })
            } else {
                $(".product-zoom-2").elevateZoom({
                  gallery: "smallGallery",
                  zoomType: "inner"
                });
            }
          }   

	        // end resize events    
        }
        prevW = window.innerWidth || $(window).width();
    }));
})

jQuery(function() {

    "use strict";

  	// Product carousel Start 
    $('.product-carousel.three-in-row').slick({
        infinite: true,
        dots: false,
        lazyLoad: 'ondemand',
        slidesToShow: 3,
        slidesToScroll: 3,
        responsive: [{
            breakpoint: 992,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 3
            }
        }, {
            breakpoint: 768,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2
            }
        }, {
            breakpoint: 560,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        }, {
            breakpoint: 321,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                centerMode: true,
                centerPadding: '20px'
            }
        }]
    });

    $('.product-carousel.four-in-row').slick({
        infinite: true,
        dots: false,
        lazyLoad: 'ondemand',
        slidesToShow: 4,
        slidesToScroll: 4,
        responsive: [{
            breakpoint: 992,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 3
            }
        }, {
            breakpoint: 768,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2
            }
        }, {
            breakpoint: 560,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        }, {
            breakpoint: 321,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                centerMode: true,
                centerPadding: '20px'
            }
        }]
    });
  
  	$('.product-carousel.five-in-row').slick({
        infinite: true,
        dots: false,
        lazyLoad: 'ondemand',
        slidesToShow: 5,
        slidesToScroll: 5,
        responsive: [{
            breakpoint: 992,
            settings: {
                slidesToShow: 4,
                slidesToScroll: 4
            }
        }, {
            breakpoint: 768,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2
            }
        }, {
            breakpoint: 560,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        }, {
            breakpoint: 321,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                centerMode: true,
                centerPadding: '20px'
            }
        }]
    });
  	// Product carousel End 
  
  	// Vertical products carousel Start
  
  	if ($('.products-widget-carousel').closest('.filters-col__collapse').length){

    	var state = 0;
        
	    if (!$('.products-widget-carousel').closest('.filters-col__collapse').hasClass('open')) {
	      	var state = 1;
	      	$('.products-widget-carousel').closest('.filters-col__collapse').addClass('open');
	    }

    	$('.products-widget-carousel').on('init', function(event, slick){
      		if (state == 1) {
      			setTimeout(function() {
        			$('.products-widget-carousel').closest('.filters-col__collapse').removeClass('open');
      			}, 1000);
      		}
    	});

    	$('.products-widget-carousel').slick({
      		vertical: true,
      		infinite: true,
      		slidesToShow: 2,
      		slidesToScroll: 2,
      		verticalSwiping: true,
      		arrows: false,
      		dots: true
    	});
  	} else {
    	$('.products-widget-carousel').slick({
      		vertical: true,
      		infinite: true,
      		slidesToShow: 3,
      		slidesToScroll: 3,
      		verticalSwiping: true,
      		arrows: false,
      		dots: true,
      		responsive: [{
        		breakpoint: 992,
        		settings: {
          			slidesToShow: 3,
          			slidesToScroll: 3
        		}
      		}]
    	});
  	}
  	// Vertical products carousel End
  	
  	// Product thumbnails carousel Start  
    $('.product-images-carousel ul').slick({
        infinite: false,
        dots: false,
        slidesToShow: 5,
        slidesToScroll: 1,
        responsive: [{
            breakpoint: 1200,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 1
            }
        },{
            breakpoint: 992,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1
            }
        }]
    });
  	// Product thumbnails carousel End  
  
  	// Product mobile slider Start  
    $('#singleGallery').slick({
        infinite: false,
        dots: true,
        arrows: false,
        slidesToShow: 1,
        slidesToScroll: 1
    });
  	// Product mobile slider End

  	// Product vertical product slider Start
  	if ($('#singleGalleryVertical').length) {
  		$('#singleGalleryVertical').on('init', function(event, slick){
    		$('#singleGalleryVertical').css({'opacity': 1})
  		});
    	$('#singleGalleryVertical').css({'opacity': 0}).slick({
        	infinite: false,
    		vertical: true,
    		verticalScrolling: true,
        	dots: true,
        	arrows: false,
        	slidesToShow: 1,
        	slidesToScroll: 1
   		}).mousewheel(function(e) {
    		e.preventDefault();
    		if (e.deltaY < 0) {
      			$(this).slick('slickNext')
    		} else {
      			$(this).slick('slickPrev')
    		}
  		});
  	}
  	// Product vertical product slider End  
  
  	// Simple slider Start
  	window.setTimeout(function() {
        $('.single-slider').css({
      		'opacity': '1'
    	})
    },500);
  
  	$('.single-slider > ul').slick({
        infinite: false,
        dots: false,
        arrows: true,
        slidesToShow: 1,
        slidesToScroll: 1,
    	responsive: [{
            breakpoint: 768,
            settings: {
                arrows: false,
                dots: true
            }
        }]
    });
  	// Simple slider End
});