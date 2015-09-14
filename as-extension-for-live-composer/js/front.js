(function ($) {
    $.fn.countTo = function (options) {
        options = options || {};

        return $(this).each(function () {
            // set options for current element
            var settings = $.extend({}, $.fn.countTo.defaults, {
                from: $(this).data('from'),
                to: $(this).data('to'),
                speed: $(this).data('speed'),
                refreshInterval: $(this).data('refresh-interval'),
                decimals: $(this).data('decimals')
            }, options);

            // how many times to update the value, and how much to increment the value on each update
            var loops = Math.ceil(settings.speed / settings.refreshInterval),
                    increment = (settings.to - settings.from) / loops;

            // references & variables that will change with each update
            var self = this,
                    $self = $(this),
                    loopCount = 0,
                    value = settings.from,
                    data = $self.data('countTo') || {};

            $self.data('countTo', data);

            // if an existing interval can be found, clear it first
            if (data.interval) {
                clearInterval(data.interval);
            }
            data.interval = setInterval(updateTimer, settings.refreshInterval);

            // initialize the element with the starting value
            render(value);

            function updateTimer() {
                value += increment;
                loopCount++;

                render(value);

                if (typeof (settings.onUpdate) == 'function') {
                    settings.onUpdate.call(self, value);
                }

                if (loopCount >= loops) {
                    // remove the interval
                    $self.removeData('countTo');
                    clearInterval(data.interval);
                    value = settings.to;

                    if (typeof (settings.onComplete) == 'function') {
                        settings.onComplete.call(self, value);
                    }
                }
            }

            function render(value) {
                var formattedValue = settings.formatter.call(self, value, settings);
                $self.text(formattedValue);
            }
        });
    };

    $.fn.countTo.defaults = {
        from: 0, // the number the element should start at
        to: 0, // the number the element should end at
        speed: 1000, // how long it should take to count between the target numbers
        refreshInterval: 100, // how often the element should be updated
        decimals: 0, // the number of decimal places to show
        formatter: formatter, // handler for formatting the value before rendering
        onUpdate: null, // callback method for every time the element is updated
        onComplete: null       // callback method for when the element finishes updating
    };

    function formatter(value, settings) {
        return value.toFixed(settings.decimals);
    }
}(jQuery));

/** 
 * Init Lightbox
 */

function dslc_init_lightbox() {

    jQuery('.dslc-lightbox-image').each(function () {
        jQuery(this).magnificPopup({
            type: 'image',
            mainClass: 'mfp-with-zoom', // this class is for CSS animation below
            zoom: {
                enabled: true, // By default it's false, so don't forget to enable it

                duration: 300, // duration of the effect, in milliseconds
                easing: 'ease-in-out', // CSS transition easing function 

                // The "opener" function should return the element from which popup will be zoomed in
                // and to which popup will be scaled down
                // By defailt it looks for an image tag:
                opener: function (openerElement) {
                    // openerElement is the element on which popup was initialized, in this case its <a> tag
                    // you don't need to add "opener" option if this code matches your needs, it's defailt one.
                    return openerElement.is('img') ? openerElement : openerElement.find('img');
                }
            }
        });
    });

    jQuery('.dslc-lightbox-gallery').each(function () {
        jQuery(this).magnificPopup({delegate: 'a', type: 'image', gallery: {enabled: true}});
    });

}
/**
 * Initiate Parallax
 */
function dslc_parallax() {
    jQuery(window).stellar({
        responsive: true,
    });
}
/**
 * Initiate Counter
 */
function as_counter() {
    jQuery('.as-counter-box-wrapper').each(function () {
        jQuery('.odometer').waypoint(function () {
            var data_number = jQuery(this).attr('data-number');
            jQuery(this).html(data_number);
        }, {offset: '75%', triggerOnce: true});
    });
}
/**
 * Initiate Testimonials
 */
function as_testimonials() {
    jQuery('.as-testimonials-simple').each(function () {
        var slide_owl = jQuery(this),
                data_pagination = slide_owl.attr('data-pagination');
        data_effect = slide_owl.attr('data-effect');
        data_auto = slide_owl.attr('data-auto');
        var temp = true;
        if (!data_pagination) {
            temp = false;
        }
        slide_owl.owlCarousel({
            autoPlay: data_auto,
            stopOnHover: true,
            navigation: false,
            pagination: temp,
            singleItem: true,
            autoHeight: true,
            transitionStyle: data_effect
        });
        // Custom Navigation Events
        jQuery(".as-testimonials-simple-next").click(function () {
            slide_owl.trigger('owl.next');
        })
        jQuery(".as-testimonials-simple-prev").click(function () {
            slide_owl.trigger('owl.prev');
        })
    });
}
/**
 * Initiate Circle Chart
 */
function as_circle_chart() {
    jQuery('.circle-chart-wrapper').each(function (e) {
        jQuery(".chart").waypoint(function () {
            var element = jQuery(this),
                    data_easing = element.attr('data-easing'),
                    data_duration = element.attr('data-duration'),
                    data_lineCap = element.attr('data-line-cap'),
                    data_lineWidth = element.attr('data-line-width'),
                    data_bar_color = element.attr('data-bar-color'),
                    data_track_color = element.attr('data-track-color'),
                    data_percent = element.attr('data-percent'),
                    data_size = element.attr('data-size');
            element.easyPieChart({
                easing: data_easing,
                animate: {
                    duration: data_duration,
                    enabled: true
                },
                lineCap: data_lineCap,
                lineWidth: data_lineWidth,
                barColor: data_bar_color,
                trackColor: data_track_color,
                size: data_size,
                scaleColor: false,
            });

            element.appear(function () {
                if (!element.hasClass('animated')) {
                    element.addClass('animated');
                    //element.data('easyPieChart').update(data_percent);

                    if (element.find('.percent-chart').get(0)) {
                        if (!element.find('.percent-chart').hasClass('active-lc'))
                            element.find('.percent-chart').countTo();
                        else
                            element.find('.percent-chart').text(data_percent);
                    }
                }
            });
        }, {offset: '85%', triggerOnce: true});
    });
}

/** 
 * Time Circles
 */

function as_time_circles() {
	jQuery('.as_count_down').each(function(i, obj) {

		var id_time_circles = jQuery(this).attr('id');
		//alert(Id);
		jQuery('#'+id_time_circles).TimeCircles(
	       {   
		                  circle_bg_color: "#ccd3d7",
			              use_background: true,
	           bg_width: 1.0,
	           fg_width: 0.02,
	           time: {
	                Days: { color: "#21c2f8",text: "Days" },
	                Hours: { color: "#f28776",text: "Hours"  },
	                Minutes: { color: "#9674ed",text: "Minutes"  },
	                Seconds: { color: "#facc43",text: "Seconds"  }
	            }
	       }
	    );
	    //test
	});
}

/**
 * Animation Effect
 */
function dslc_check_viewport() {
    jQuery('.dslc-in-viewport-check:in-viewport:not(.dslc-in-viewport)').each(function () {
        var _this = jQuery(this);
        var anim = _this.data('dslc-anim');
        var anim_speed = parseInt(_this.data('dslc-anim-duration'));
        var anim_delay = parseInt(_this.data('dslc-anim-delay'));
        var anim_easing = _this.data('dslc-anim-easing');
        var anim_params = anim + ' ' + anim_speed + 'ms' + ' ' + anim_easing + ' forwards';
        _this.css({
            '-webkit-animation': anim_params,
            '-moz-animation': anim_params,
            'animation': anim_params,
        });
        _this.waypoint(function () {
            if (anim_delay > 0) {
                setTimeout(function () {
                   _this.addClass('dslc-in-viewport');
                }, anim_delay);
//                 jQuery(this).addClass('dslc-in-viewport');
            } else {
                _this.addClass('dslc-in-viewport');
            }
        }, {offset: '80%', triggerOnce: true});
    });
}
function as_stellar_refresh() {
/*
    jQuery(window).data('plugin_stellar').destroy();
    jQuery(window).data('plugin_stellar').init();
*/
}
jQuery(document).ready(function ($) {
    /**
     * Filter
     */
    // init Isotope
    $(window).load(function () {
        //init grid
        if (jQuery(".dslc-posts.dslc-projects.dslc-init-grid.as-isotope-posts").length > 0)
        {
            var container = jQuery('.dslc-posts.dslc-projects.dslc-init-grid').isotope({
                itemSelector: '.dslc-post',
                transitionDuration: '.5s',
                layoutMode: 'fitRows'
            });
            var last_count = 0;
            var last = false;
            jQuery('.dslc-posts.dslc-projects.dslc-init-grid .dslc-post').each(function () {
                if (!last)
                {
                    if (jQuery(this).hasClass("dslc-last-col"))
                    {
                        last = true;
                    }
                    last_count++;
                }
            });
            // change is-checked class on buttons
            jQuery('.dslc-post-filter.as-isotope-filter').click(function () {
                $(document).off("click", '.dslc-post-filter');
                var filterValue = jQuery(this).attr('data-id');
                var filterValueMasonry = filterValue;
                if (filterValueMasonry != " ")
                {
                    filterValueMasonry = "." + filterValue;
                }
                else
                {
                    filterValueMasonry = "";
                    filterValue = "";
                }
                jQuery('.dslc-posts.dslc-projects.dslc-init-grid .dslc-post').removeClass("dslc-first-col");
                jQuery('.dslc-posts.dslc-projects.dslc-init-grid .dslc-post').removeClass("dslc-last-col");
                var count = 0;
                jQuery('.dslc-posts.dslc-projects .dslc-post').each(function () {
                    if (jQuery(this).hasClass(filterValue) || filterValue == "")
                    {
                        count++;
                        if (count % last_count == 1)
                        {
                            jQuery(this).addClass("dslc-first-col");
                        }
                        else if (count % last_count == 0)
                        {
                            jQuery(this).addClass("dslc-last-col");
                        }
                    }
                });
                container.isotope({filter: filterValueMasonry});
                jQuery(".dslc-post-filters").find('.dslc-active').removeClass('dslc-active').addClass("dslc-inactive");
                jQuery(this).removeClass('dslc-inactive').addClass("dslc-active");
            });
        }
        //init Masonry
        if (jQuery(".dslc-posts.dslc-projects.dslc-init-masonry.as-isotope-posts").length > 0)
        {
            var container = jQuery('.dslc-posts.dslc-projects.dslc-init-masonry').isotope({
                itemSelector: '.dslc-post',
                transitionDuration: '.5s',
                layoutMode: 'masonry'
            });
            var last_count = 0;
            var last = false;
            jQuery('.dslc-posts.dslc-projects.dslc-init-masonry .dslc-post').each(function () {
                if (!last)
                {
                    if (jQuery(this).hasClass("dslc-last-col"))
                    {
                        last = true;
                    }
                    last_count++;
                }
            });
            // change is-checked class on buttons
            jQuery('.dslc-post-filter.as-isotope-filter').click(function () {
                $(document).off("click", '.dslc-post-filter');
                var filterValue = jQuery(this).attr('data-id');
                var filterValueMasonry = filterValue;
                if (filterValueMasonry != " ")
                {
                    filterValueMasonry = "." + filterValue;
                }
                else
                {
                    filterValueMasonry = "";
                    filterValue = "";
                }
                jQuery('.dslc-posts.dslc-projects.dslc-init-masonry .dslc-post').removeClass("dslc-first-col");
                jQuery('.dslc-posts.dslc-projects.dslc-init-masonry .dslc-post').removeClass("dslc-last-col");
                var count = 0;
                jQuery('.dslc-posts.dslc-projects .dslc-post').each(function () {
                    if (jQuery(this).hasClass(filterValue) || filterValue == "")
                    {
                        count++;
                        if (count % last_count == 1)
                        {
                            jQuery(this).addClass("dslc-first-col");
                        }
                        else if (count % last_count == 0)
                        {
                            jQuery(this).addClass("dslc-last-col");
                        }
                    }
                });
                container.isotope({filter: filterValueMasonry});
                jQuery(".dslc-post-filters").find('.dslc-active').removeClass('dslc-active').addClass("dslc-inactive");
                jQuery(this).removeClass('dslc-inactive').addClass("dslc-active");
            });
        }
        // Event when click on an image portfolio
        $('.dslc-project .dslca-post-thumb a, .as-port-control a, .dslc-project-title a').click(function (event) {
            var target = $(event.currentTarget);
            if (target.attr('data-ajax') == "1") {
                event.preventDefault();
                if (target.attr('data-id') && !target.hasClass('loading')) {
                    $.ajax({
                        url: as_globals.ajaxURL,
                        type: 'post',
                        data: {
                            action: 'as_load_project',
                            content: {
                                id: target.attr('data-id')
                            }
                        },
                        beforeSend: function () {
                            target.addClass('loading');
                            $('.as-mask-color-port').fadeIn('300');
                        },
                        error: function (request) {

                        },
                        success: function (response) {
                            $('.as-mask-color-port').fadeOut('300');
                            var container = $("#as_portfolio_content .as-port-content"),
                                    control = $("#as_portfolio_content .as-port-control");
                            target.removeClass('loading');
                            if (response.success) {

                                if (!target.hasClass('next') && !target.hasClass('prev')) {
                                    $("#as_portfolio_content").fadeIn('500', function () {
                                        $('html, body').animate({
                                            scrollTop: $("#as_portfolio_content").offset().top
                                        }, 2000, 'easeOutExpo');
                                    });
                                }

                                control.find('a.prev').attr('data-id', response.prev_post);
                                control.find('a.next').attr('data-id', response.next_post);
                                container.html(response.html);
                            } else {
                                alert('Error');
                            }
                        }
                    });
                }
            } else {
                return true;
            }
        });
        //event when close portfolio content
        $('.close-port').click(function () {
            $('html, body').animate({
                scrollTop: $(".dslc-projects").offset().top
            }, 2000, 'easeOutExpo');
            $('#as_portfolio_content').fadeOut(500, function () {
            });
        });
    });
});
/**
 * Google Map
 */
function as_google_map() {
	//for google map
	var elements 	= document.getElementsByClassName('as_googlemap');
	var lating 		= new Array();
	var myOptions 	= new Array();
	var map 		= new Array();
	for(i=0; i< elements.length; i++)
	{
		//alert(elements[i].id + elements[i].getAttribute('value'));
		var s1 = elements[i].getAttribute('value').substring(0, elements[i].getAttribute('value').indexOf(",") );
		var s2 = elements[i].getAttribute('value').substring(elements[i].getAttribute('value').indexOf(",")+1 );

		//alert(s1+" "+ s2);
		lating[i] = new google.maps.LatLng(s1, s2);

		var zoom_get = elements[i].getAttribute('zoom');
		var scrwheel = elements[i].getAttribute('scrollwheel');
		myOptions[i] = { 
			scrollwheel: parseInt(scrwheel), 
			zoom:parseInt(zoom_get), 
			center: lating[i], 
			styles: [{"featureType":"administrative","elementType":"all","stylers":[{"visibility":"on"},{"lightness":33}]},{"featureType":"landscape","elementType":"all","stylers":[{"color":"#f2e5d4"}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#c5dac6"}]},{"featureType":"poi.park","elementType":"labels","stylers":[{"visibility":"on"},{"lightness":20}]},{"featureType":"road","elementType":"all","stylers":[{"lightness":20}]},{"featureType":"road.highway","elementType":"geometry","stylers":[{"color":"#c5c6c6"}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#e4d7c6"}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#fbfaf7"}]},{"featureType":"water","elementType":"all","stylers":[{"visibility":"on"},{"color":"#acbcc9"}]}],
			mapTypeId: google.maps.MapTypeId.ROADMAP
		};
		map[i] = new google.maps.Map(document.getElementById(elements[i].id), myOptions[i]);

		//for mark position
		var mark1 = elements[i].getAttribute('markposition').substring(0, elements[i].getAttribute('markposition').indexOf(",") );
		var mark2 = elements[i].getAttribute('markposition').substring(elements[i].getAttribute('markposition').indexOf(",")+1 );
		var latmark = new google.maps.LatLng(mark1, mark2);

		var titlemark = elements[i].getAttribute('marktitle');
		var myMarker = new google.maps.Marker(
		{
			position: latmark,
			map: map[i],
			title:titlemark
	    });
		//alert(JSON.stringify(map[i]));
	}
}
jQuery(window).load(function () {
    as_counter();
    as_circle_chart();
    as_testimonials();
    as_google_map();
    as_time_circles();
});
jQuery(document).ajaxComplete(function () {
    if (jQuery('body').hasClass('dslca-enabled')) {
        as_testimonials();
        as_counter();
        as_circle_chart();
        as_timeline();
        as_time_circles();
    }
});
jQuery.ajaxPrefilter(function (options, originalOptions, jqXHR) {

    if (originalOptions.data.dslc_module_id == "Anna_Timeline")
    {
        var dslcAccordionCount = 0;
        var dslcAccordionDateVal = "";
        jQuery('#dslc-module-' + originalOptions.data.module_instance_id + ' .dslc-accordion-item').each(function () {

            dslcAccordionCount++;

            if (dslcAccordionCount > 1) {
                dslcAccordionDateVal += ' (dslc_sep) ';
            }

            dslcAccordionDateVal += jQuery(this).find('.dslc-accordion-date').text();
        });
        options.data += "&anna_timeline_date=" + dslcAccordionDateVal;
    }
});
/* ------------------------------------- */
/* P R I C I N G   JS
 /* ------------------------------------ */
function as_timeline() {
    jQuery(".cd-container .dslc-accordion-item").removeClass("dslc-inactive");
    jQuery(".cd-container .dslc-accordion-item").addClass("dslc-active");
    jQuery(".cd-container .dslc-accordion-item .dslc-accordion-content").css("display", "block");
}
jQuery(document).ready(function ($) {
	// Owl Carousel
	var owl_slider_post = $(".owl-carousel");
	owl_slider_post.owlCarousel({
		navigation : false, // Show next and prev buttons
		slideSpeed : 300,
		paginationSpeed : 400,
		singleItem: true,
		//Autoplay
	    autoPlay : false,
	    stopOnHover : false,
	    autoHeight: true
	});

	// Custom Navigation Events
	$(".as-btn-slider-post-next").click(function(){
		owl_slider_post.trigger('owl.next');
	})
	$(".as-btn-slider-post-prev").click(function(){
		owl_slider_post.trigger('owl.prev');
	})
    var $timeline_block = $('.cd-timeline-block');

    //hide timeline blocks which are outside the viewport
    $timeline_block.each(function () {
        if ($(this).offset().top > $(window).scrollTop() + $(window).height() * 0.75) {
            $(this).find('.cd-timeline-img, .cd-timeline-content').addClass('is-hidden');
        }
    });

    //on scolling, show/animate timeline blocks when enter the viewport
    $(window).on('scroll', function () {
        $timeline_block.each(function () {
            if ($(this).offset().top <= $(window).scrollTop() + $(window).height() * 0.75 && $(this).find('.cd-timeline-img').hasClass('is-hidden')) {
                $(this).find('.cd-timeline-img, .cd-timeline-content').removeClass('is-hidden').addClass('bounce-in');
            }
        });
    });
    as_timeline();
});