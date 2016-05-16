
function showMessage(message, effect)
{
    if (typeof (effect) == "undefined")
    {
        effect = "mfp-zoom-in";
    }
    jQuery.magnificPopup.open({
        preloader: true,
        mainClass: effect,
        items: {
            src: '<div class="as-popup-message mfp-with-anim">' + message + '</div>',
            type: "inline",
            midClick: true
        }
    });
}
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
            },
            options);

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
        jQuery(this).magnificPopup({
            delegate: 'a',
            type: 'image',
            gallery: {
                enabled: true
            }
        });
    });
    jQuery('.as-lightbox-gallery').each(function () {
        jQuery(this).magnificPopup({
            //delegate: 'a',
            type: 'image',
            removalDelay: 300,
            mainClass: 'mfp-fade',
            gallery: {
                enabled: true,
            }
        });
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
        }, {
            offset: '75%',
            triggerOnce: true
        });
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
        }, {
            offset: '85%',
            triggerOnce: true
        });
    });
}

/** 
 * Time Circles
 */

function as_time_circles() {
    jQuery('.as_count_down').each(function (i, obj) {

        var id_time_circles = jQuery(this).attr('id');
        var date_color = jQuery(this).attr('date-color');
        var hour_color = jQuery(this).attr('hours-color');
        var minute_color = jQuery(this).attr('minutes-color');
        var second_color = jQuery(this).attr('seconds-color');
        jQuery('#' + id_time_circles).TimeCircles(
                {
                    circle_bg_color: "#ccd3d7",
                    use_background: true,
                    bg_width: 1.0,
                    fg_width: 0.02,
                    time: {
                        Days: {
                            color: date_color,
                            text: "Days"
                        },
                        Hours: {
                            color: hour_color,
                            text: "Hours"
                        },
                        Minutes: {
                            color: minute_color,
                            text: "Minutes"
                        },
                        Seconds: {
                            color: second_color,
                            text: "Seconds"
                        }
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
    var isIE = /*@cc_on!@*/false || !!document.documentMode;
    if (!isIE) {
        jQuery('.dslc-in-viewport-check:in-viewport:not(.dslc-in-viewport)').each(function () {
            var _this = jQuery(this);
            var anim = _this.data('dslc-anim');

            var anim_speed = parseInt(_this.data('dslc-anim-duration'));
            if (jQuery(window).width() < 768)
                anim_speed = '0';

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
            }, {
                offset: '80%',
                triggerOnce: true
            });
        });
    } else {
        jQuery('.dslc-in-viewport-check').css('opacity', 1);
    }
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
            //column spacing
            var gutter = 0;
            jQuery('.dslc-posts.dslc-projects.dslc-init-masonry .dslc-post').each(function () {
                var width = jQuery(this).width();
                var left = jQuery(this).position().left;
                if (gutter <= 0)
                {
                    if ((left - width) > 0)
                    {
                        gutter = left - width;
                    }
                }
            });
            var container = jQuery('.dslc-posts.dslc-projects.dslc-init-grid.as-isotope-posts').isotope({
                itemSelector: '.dslc-post',
                transitionDuration: '.5s',
                layoutMode: 'fitRows',
                masonry: {
                    gutter: gutter
                }
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
                container.isotope({
                    filter: filterValueMasonry
                });
                jQuery(".dslc-post-filters").find('.dslc-active').removeClass('dslc-active').addClass("dslc-inactive");
                jQuery(this).removeClass('dslc-inactive').addClass("dslc-active");
            });
        }
        //init Masonry
        if (jQuery(".dslc-posts.dslc-projects.dslc-init-masonry.as-isotope-posts").length > 0)
        {
            var gutter = 0;
            jQuery('.dslc-posts.dslc-projects.dslc-init-masonry .dslc-post').each(function () {
                var width = jQuery(this).width();
                var left = jQuery(this).position().left;
                if (gutter <= 0)
                {
                    if ((left - width) > 0)
                    {
                        gutter = left - width;
                    }
                }
            });
            var container = jQuery('.dslc-posts.dslc-projects.dslc-init-masonry.as-isotope-posts').isotope({
                itemSelector: '.dslc-post',
                transitionDuration: '.5s',
                layoutMode: 'masonry',
                masonry: {
                    gutter: gutter
                }
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
                container.isotope({
                    filter: filterValueMasonry
                });
                jQuery(".dslc-post-filters").find('.dslc-active').removeClass('dslc-active').addClass("dslc-inactive");
                jQuery(this).removeClass('dslc-inactive').addClass("dslc-active");
            });
        }
        // Event when click on an image portfolio
        $('.dslc-project .dslca-post-thumb a, .as-port-control a, .dslc-project-title a, .as-group-icon-project a.as-link-to-project').click(function (event) {
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
                                        },
                                        2000, 'easeOutExpo');
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
            },
            2000, 'easeOutExpo');
            $('#as_portfolio_content').fadeOut(500, function () {
            });
        });
    });
});

/**
 * Google Map
 */
var style_google = [];

var as_snapzzy_none = [];
var as_snapzzy_subtle_grayscale = [{
        featureType: "landscape",
        stylers: [{
                saturation: -100
            }, {
                lightness: 65
            }, {
                visibility: "on"
            }]
    }, {
        featureType: "poi",
        stylers: [{
                saturation: -100
            }, {
                lightness: 51
            }, {
                visibility: "simplified"
            }]
    }, {
        featureType: "road.highway",
        stylers: [{
                saturation: -100
            }, {
                visibility: "simplified"
            }]
    }, {
        featureType: "road.arterial",
        stylers: [{
                saturation: -100
            }, {
                lightness: 30
            }, {
                visibility: "on"
            }]
    }, {
        featureType: "road.local",
        stylers: [{
                saturation: -100
            }, {
                lightness: 40
            }, {
                visibility: "on"
            }]
    }, {
        featureType: "transit",
        stylers: [{
                saturation: -100
            }, {
                visibility: "simplified"
            }]
    }, {
        featureType: "administrative.province",
        stylers: [{
                visibility: "off"
            }]
    }, {
        featureType: "water",
        elementType: "labels",
        stylers: [{
                visibility: "on"
            }, {
                lightness: -25
            }, {
                saturation: -100
            }]
    }, {
        featureType: "water",
        elementType: "geometry",
        stylers: [{
                hue: "#ffff00"
            }, {
                lightness: -25
            }, {
                saturation: -97
            }]
    }];
var as_snapzzy_shades_of_grey = [{
        featureType: "all",
        elementType: "labels.text.fill",
        stylers: [{
                saturation: 36
            }, {
                color: "#000000"
            }, {
                lightness: 40
            }]
    }, {
        featureType: "all",
        elementType: "labels.text.stroke",
        stylers: [{
                visibility: "on"
            }, {
                color: "#000000"
            }, {
                lightness: 16
            }]
    }, {
        featureType: "all",
        elementType: "labels.icon",
        stylers: [{
                visibility: "off"
            }]
    }, {
        featureType: "administrative",
        elementType: "geometry.fill",
        stylers: [{
                color: "#000000"
            }, {
                lightness: 20
            }]
    }, {
        featureType: "administrative",
        elementType: "geometry.stroke",
        stylers: [{
                color: "#000000"
            }, {
                lightness: 17
            }, {
                weight: 1.2
            }]
    }, {
        featureType: "landscape",
        elementType: "geometry",
        stylers: [{
                color: "#000000"
            }, {
                lightness: 20
            }]
    }, {
        featureType: "poi",
        elementType: "geometry",
        stylers: [{
                color: "#000000"
            }, {
                lightness: 21
            }]
    }, {
        featureType: "road.highway",
        elementType: "geometry.fill",
        stylers: [{
                color: "#000000"
            }, {
                lightness: 17
            }]
    }, {
        featureType: "road.highway",
        elementType: "geometry.stroke",
        stylers: [{
                color: "#000000"
            }, {
                lightness: 29
            }, {
                weight: .2
            }]
    }, {
        featureType: "road.arterial",
        elementType: "geometry",
        stylers: [{
                color: "#000000"
            }, {
                lightness: 18
            }]
    }, {
        featureType: "road.local",
        elementType: "geometry",
        stylers: [{
                color: "#000000"
            }, {
                lightness: 16
            }]
    }, {
        featureType: "transit",
        elementType: "geometry",
        stylers: [{
                color: "#000000"
            }, {
                lightness: 19
            }]
    }, {
        featureType: "water",
        elementType: "geometry",
        stylers: [{
                color: "#000000"
            }, {
                lightness: 17
            }]
    }];
var as_snapzzy_blue_water = [{
        featureType: "administrative",
        elementType: "labels.text.fill",
        stylers: [{
                color: "#444444"
            }]
    }, {
        featureType: "landscape",
        elementType: "all",
        stylers: [{
                color: "#f2f2f2"
            }]
    }, {
        featureType: "poi",
        elementType: "all",
        stylers: [{
                visibility: "off"
            }]
    }, {
        featureType: "road",
        elementType: "all",
        stylers: [{
                saturation: -100
            }, {
                lightness: 45
            }]
    }, {
        featureType: "road.highway",
        elementType: "all",
        stylers: [{
                visibility: "simplified"
            }]
    }, {
        featureType: "road.arterial",
        elementType: "labels.icon",
        stylers: [{
                visibility: "off"
            }]
    }, {
        featureType: "transit",
        elementType: "all",
        stylers: [{
                visibility: "off"
            }]
    }, {
        featureType: "water",
        elementType: "all",
        stylers: [{
                color: "#46bcec"
            }, {
                visibility: "on"
            }]
    }];
var as_snapzzy_pale_dawn = [{
        featureType: "administrative",
        elementType: "all",
        stylers: [{
                visibility: "on"
            }, {
                lightness: 33
            }]
    }, {
        featureType: "landscape",
        elementType: "all",
        stylers: [{
                color: "#f2e5d4"
            }]
    }, {
        featureType: "poi.park",
        elementType: "geometry",
        stylers: [{
                color: "#c5dac6"
            }]
    }, {
        featureType: "poi.park",
        elementType: "labels",
        stylers: [{
                visibility: "on"
            }, {
                lightness: 20
            }]
    }, {
        featureType: "road",
        elementType: "all",
        stylers: [{
                lightness: 20
            }]
    }, {
        featureType: "road.highway",
        elementType: "geometry",
        stylers: [{
                color: "#c5c6c6"
            }]
    }, {
        featureType: "road.arterial",
        elementType: "geometry",
        stylers: [{
                color: "#e4d7c6"
            }]
    }, {
        featureType: "road.local",
        elementType: "geometry",
        stylers: [{
                color: "#fbfaf7"
            }]
    }, {
        featureType: "water",
        elementType: "all",
        stylers: [{
                visibility: "on"
            }, {
                color: "#acbcc9"
            }]
    }];
var as_snapzzy_light_monochrome = [{
        featureType: "administrative.locality",
        elementType: "all",
        stylers: [{
                hue: "#2c2e33"
            }, {
                saturation: 7
            }, {
                lightness: 19
            }, {
                visibility: "on"
            }]
    }, {
        featureType: "landscape",
        elementType: "all",
        stylers: [{
                hue: "#ffffff"
            }, {
                saturation: -100
            }, {
                lightness: 100
            }, {
                visibility: "simplified"
            }]
    }, {
        featureType: "poi",
        elementType: "all",
        stylers: [{
                hue: "#ffffff"
            }, {
                saturation: -100
            }, {
                lightness: 100
            }, {
                visibility: "off"
            }]
    }, {
        featureType: "road",
        elementType: "geometry",
        stylers: [{
                hue: "#bbc0c4"
            }, {
                saturation: -93
            }, {
                lightness: 31
            }, {
                visibility: "simplified"
            }]
    }, {
        featureType: "road",
        elementType: "labels",
        stylers: [{
                hue: "#bbc0c4"
            }, {
                saturation: -93
            }, {
                lightness: 31
            }, {
                visibility: "on"
            }]
    }, {
        featureType: "road.arterial",
        elementType: "labels",
        stylers: [{
                hue: "#bbc0c4"
            }, {
                saturation: -93
            }, {
                lightness: -2
            }, {
                visibility: "simplified"
            }]
    }, {
        featureType: "road.local",
        elementType: "geometry",
        stylers: [{
                hue: "#e9ebed"
            }, {
                saturation: -90
            }, {
                lightness: -8
            }, {
                visibility: "simplified"
            }]
    }, {
        featureType: "transit",
        elementType: "all",
        stylers: [{
                hue: "#e9ebed"
            }, {
                saturation: 10
            }, {
                lightness: 69
            }, {
                visibility: "on"
            }]
    }, {
        featureType: "water",
        elementType: "all",
        stylers: [{
                hue: "#e9ebed"
            }, {
                saturation: -78
            }, {
                lightness: 67
            }, {
                visibility: "simplified"
            }]
    }];
var as_snapzzy_apple_maps = [{
        featureType: "landscape.man_made",
        elementType: "geometry",
        stylers: [{
                color: "#f7f1df"
            }]
    }, {
        featureType: "landscape.natural",
        elementType: "geometry",
        stylers: [{
                color: "#d0e3b4"
            }]
    }, {
        featureType: "landscape.natural.terrain",
        elementType: "geometry",
        stylers: [{
                visibility: "off"
            }]
    }, {
        featureType: "poi",
        elementType: "labels",
        stylers: [{
                visibility: "off"
            }]
    }, {
        featureType: "poi.business",
        elementType: "all",
        stylers: [{
                visibility: "off"
            }]
    }, {
        featureType: "poi.medical",
        elementType: "geometry",
        stylers: [{
                color: "#fbd3da"
            }]
    }, {
        featureType: "poi.park",
        elementType: "geometry",
        stylers: [{
                color: "#bde6ab"
            }]
    }, {
        featureType: "road",
        elementType: "geometry.stroke",
        stylers: [{
                visibility: "off"
            }]
    }, {
        featureType: "road",
        elementType: "labels",
        stylers: [{
                visibility: "off"
            }]
    }, {
        featureType: "road.highway",
        elementType: "geometry.fill",
        stylers: [{
                color: "#ffe15f"
            }]
    }, {
        featureType: "road.highway",
        elementType: "geometry.stroke",
        stylers: [{
                color: "#efd151"
            }]
    }, {
        featureType: "road.arterial",
        elementType: "geometry.fill",
        stylers: [{
                color: "#ffffff"
            }]
    }, {
        featureType: "road.local",
        elementType: "geometry.fill",
        stylers: [{
                color: "black"
            }]
    }, {
        featureType: "transit.station.airport",
        elementType: "geometry.fill",
        stylers: [{
                color: "#cfb2db"
            }]
    }, {
        featureType: "water",
        elementType: "geometry",
        stylers: [{
                color: "#a2daf2"
            }]
    }];
var as_snapzzy_greyscale = [{
        "featureType": "all",
        "elementType": "all",
        "stylers": [{
                "saturation": -100
            }, {
                "gamma": 0.5
            }]
    }];
var as_snapzzy_neutral_blue = [{
        featureType: "water",
        elementType: "geometry",
        stylers: [{
                color: "#193341"
            }]
    }, {
        featureType: "landscape",
        elementType: "geometry",
        stylers: [{
                color: "#2c5a71"
            }]
    }, {
        featureType: "road",
        elementType: "geometry",
        stylers: [{
                color: "#29768a"
            }, {
                lightness: -37
            }]
    }, {
        featureType: "poi",
        elementType: "geometry",
        stylers: [{
                color: "#406d80"
            }]
    }, {
        featureType: "transit",
        elementType: "geometry",
        stylers: [{
                color: "#406d80"
            }]
    }, {
        elementType: "labels.text.stroke",
        stylers: [{
                visibility: "on"
            }, {
                color: "#3e606f"
            }, {
                weight: 2
            }, {
                gamma: .84
            }]
    }, {
        elementType: "labels.text.fill",
        stylers: [{
                color: "#ffffff"
            }]
    }, {
        featureType: "administrative",
        elementType: "geometry",
        stylers: [{
                weight: .6
            }, {
                color: "#1a3541"
            }]
    }, {
        elementType: "labels.icon",
        stylers: [{
                visibility: "off"
            }]
    }, {
        featureType: "poi.park",
        elementType: "geometry",
        stylers: [{
                color: "#2c5a71"
            }]
    }];
var as_snapzzy_bright_bubbly = [{
        featureType: "water",
        stylers: [{
                color: "#19a0d8"
            }]
    }, {
        featureType: "administrative",
        elementType: "labels.text.stroke",
        stylers: [{
                color: "#ffffff"
            }, {
                weight: 6
            }]
    }, {
        featureType: "administrative",
        elementType: "labels.text.fill",
        stylers: [{
                color: "#e85113"
            }]
    }, {
        featureType: "road.highway",
        elementType: "geometry.stroke",
        stylers: [{
                color: "#efe9e4"
            }, {
                lightness: -40
            }]
    }, {
        featureType: "road.arterial",
        elementType: "geometry.stroke",
        stylers: [{
                color: "#efe9e4"
            }, {
                lightness: -20
            }]
    }, {
        featureType: "road",
        elementType: "labels.text.stroke",
        stylers: [{
                lightness: 100
            }]
    }, {
        featureType: "road",
        elementType: "labels.text.fill",
        stylers: [{
                lightness: -100
            }]
    }, {
        featureType: "road.highway",
        elementType: "labels.icon"
    }, {
        featureType: "landscape",
        elementType: "labels",
        stylers: [{
                visibility: "off"
            }]
    }, {
        featureType: "landscape",
        stylers: [{
                lightness: 20
            }, {
                color: "#efe9e4"
            }]
    }, {
        featureType: "landscape.man_made",
        stylers: [{
                visibility: "off"
            }]
    }, {
        featureType: "water",
        elementType: "labels.text.stroke",
        stylers: [{
                lightness: 100
            }]
    }, {
        featureType: "water",
        elementType: "labels.text.fill",
        stylers: [{
                lightness: -100
            }]
    }, {
        featureType: "poi",
        elementType: "labels.text.fill",
        stylers: [{
                hue: "#11ff00"
            }]
    }, {
        featureType: "poi",
        elementType: "labels.text.stroke",
        stylers: [{
                lightness: 100
            }]
    }, {
        featureType: "poi",
        elementType: "labels.icon",
        stylers: [{
                hue: "#4cff00"
            }, {
                saturation: 58
            }]
    }, {
        featureType: "poi",
        elementType: "geometry",
        stylers: [{
                visibility: "on"
            }, {
                color: "#f0e4d3"
            }]
    }, {
        featureType: "road.highway",
        elementType: "geometry.fill",
        stylers: [{
                color: "#efe9e4"
            }, {
                lightness: -25
            }]
    }, {
        featureType: "road.arterial",
        elementType: "geometry.fill",
        stylers: [{
                color: "#efe9e4"
            }, {
                lightness: -10
            }]
    }, {
        featureType: "poi",
        elementType: "labels",
        stylers: [{
                visibility: "simplified"
            }]
    }];
var as_snapzzy_icy_blue = [{
        stylers: [{
                hue: "#2c3e50"
            }, {
                saturation: 250
            }]
    }, {
        featureType: "road",
        elementType: "geometry",
        stylers: [{
                lightness: 50
            }, {
                visibility: "simplified"
            }]
    }, {
        featureType: "road",
        elementType: "labels",
        stylers: [{
                visibility: "off"
            }]
    }];
var as_snapzzy_blue_gray = [{
        featureType: "water",
        stylers: [{
                visibility: "on"
            }, {
                color: "#b5cbe4"
            }]
    }, {
        featureType: "landscape",
        stylers: [{
                color: "#efefef"
            }]
    }, {
        featureType: "road.highway",
        elementType: "geometry",
        stylers: [{
                color: "#83a5b0"
            }]
    }, {
        featureType: "road.arterial",
        elementType: "geometry",
        stylers: [{
                color: "#bdcdd3"
            }]
    }, {
        featureType: "road.local",
        elementType: "geometry",
        stylers: [{
                color: "#ffffff"
            }]
    }, {
        featureType: "poi.park",
        elementType: "geometry",
        stylers: [{
                color: "#e3eed3"
            }]
    }, {
        featureType: "administrative",
        stylers: [{
                visibility: "on"
            }, {
                lightness: 33
            }]
    }, {
        featureType: "road"
    }, {
        featureType: "poi.park",
        elementType: "labels",
        stylers: [{
                visibility: "on"
            }, {
                lightness: 20
            }]
    }, {}, {
        featureType: "road",
        stylers: [{
                lightness: 20
            }]
    }];
var as_snapzzy_blue_essence = [{
        featureType: "landscape.natural",
        elementType: "geometry.fill",
        stylers: [{
                visibility: "on"
            }, {
                color: "#e0efef"
            }]
    }, {
        featureType: "poi",
        elementType: "geometry.fill",
        stylers: [{
                visibility: "on"
            }, {
                hue: "#1900ff"
            }, {
                color: "#c0e8e8"
            }]
    }, {
        featureType: "road",
        elementType: "geometry",
        stylers: [{
                lightness: 100
            }, {
                visibility: "simplified"
            }]
    }, {
        featureType: "road",
        elementType: "labels",
        stylers: [{
                visibility: "off"
            }]
    }, {
        featureType: "transit.line",
        elementType: "geometry",
        stylers: [{
                visibility: "on"
            }, {
                lightness: 700
            }]
    }, {
        featureType: "water",
        elementType: "all",
        stylers: [{
                color: "#7dcdcd"
            }]
    }];
var as_snapzzy_girly = [{
        featureType: "administrative",
        elementType: "labels.text.fill",
        stylers: [{
                color: "#444444"
            }]
    }, {
        featureType: "landscape",
        elementType: "all",
        stylers: [{
                color: "#f2f2f2"
            }]
    }, {
        featureType: "poi",
        elementType: "all",
        stylers: [{
                visibility: "off"
            }]
    }, {
        featureType: "road",
        elementType: "all",
        stylers: [{
                saturation: -100
            }, {
                lightness: 45
            }]
    }, {
        featureType: "road.highway",
        elementType: "all",
        stylers: [{
                visibility: "simplified"
            }]
    }, {
        featureType: "road.highway",
        elementType: "geometry",
        stylers: [{
                visibility: "simplified"
            }, {
                color: "#ff6a6a"
            }, {
                lightness: "0"
            }]
    }, {
        featureType: "road.highway",
        elementType: "labels.text",
        stylers: [{
                visibility: "on"
            }]
    }, {
        featureType: "road.highway",
        elementType: "labels.icon",
        stylers: [{
                visibility: "on"
            }]
    }, {
        featureType: "road.arterial",
        elementType: "all",
        stylers: [{
                visibility: "on"
            }]
    }, {
        featureType: "road.arterial",
        elementType: "geometry.fill",
        stylers: [{
                color: "#ff6a6a"
            }, {
                lightness: "75"
            }]
    }, {
        featureType: "road.arterial",
        elementType: "labels.icon",
        stylers: [{
                visibility: "off"
            }]
    }, {
        featureType: "road.local",
        elementType: "geometry.fill",
        stylers: [{
                lightness: "75"
            }]
    }, {
        featureType: "transit",
        elementType: "all",
        stylers: [{
                visibility: "off"
            }]
    }, {
        featureType: "transit.line",
        elementType: "all",
        stylers: [{
                visibility: "on"
            }]
    }, {
        featureType: "transit.station.bus",
        elementType: "all",
        stylers: [{
                visibility: "on"
            }]
    }, {
        featureType: "transit.station.rail",
        elementType: "all",
        stylers: [{
                visibility: "on"
            }]
    }, {
        featureType: "transit.station.rail",
        elementType: "labels.icon",
        stylers: [{
                weight: "0.01"
            }, {
                hue: "#ff0028"
            }, {
                lightness: "0"
            }]
    }, {
        featureType: "water",
        elementType: "all",
        stylers: [{
                visibility: "on"
            }, {
                color: "#80e4d8"
            }, {
                lightness: "25"
            }, {
                saturation: "-23"
            }]
    }];
var as_snapzzy_retro = [{
        featureType: "administrative",
        stylers: [{
                visibility: "off"
            }]
    }, {
        featureType: "poi",
        stylers: [{
                visibility: "simplified"
            }]
    }, {
        featureType: "road",
        elementType: "labels",
        stylers: [{
                visibility: "simplified"
            }]
    }, {
        featureType: "water",
        stylers: [{
                visibility: "simplified"
            }]
    }, {
        featureType: "transit",
        stylers: [{
                visibility: "simplified"
            }]
    }, {
        featureType: "landscape",
        stylers: [{
                visibility: "simplified"
            }]
    }, {
        featureType: "road.highway",
        stylers: [{
                visibility: "off"
            }]
    }, {
        featureType: "road.local",
        stylers: [{
                visibility: "on"
            }]
    }, {
        featureType: "road.highway",
        elementType: "geometry",
        stylers: [{
                visibility: "on"
            }]
    }, {
        featureType: "water",
        stylers: [{
                color: "#84afa3"
            }, {
                lightness: 52
            }]
    }, {
        stylers: [{
                saturation: -17
            }, {
                gamma: .36
            }]
    }, {
        featureType: "transit.line",
        elementType: "geometry",
        stylers: [{
                color: "#3f518c"
            }]
    }];
style_google[1] = as_snapzzy_none;
style_google[2] = as_snapzzy_subtle_grayscale;
style_google[3] = as_snapzzy_shades_of_grey;
style_google[4] = as_snapzzy_blue_water;
style_google[5] = as_snapzzy_pale_dawn;
style_google[6] = as_snapzzy_light_monochrome;
style_google[7] = as_snapzzy_apple_maps;
style_google[8] = as_snapzzy_greyscale;
style_google[9] = as_snapzzy_neutral_blue;
style_google[10] = as_snapzzy_bright_bubbly;
style_google[11] = as_snapzzy_icy_blue;
style_google[12] = as_snapzzy_blue_gray;
style_google[13] = as_snapzzy_blue_essence;
style_google[14] = as_snapzzy_girly;
style_google[15] = as_snapzzy_retro;

function as_google_map() {
    //for google map
    var elements = document.getElementsByClassName('as_googlemap');
    var lating = new Array();
    var myOptions = new Array();
    var map = new Array();
    for (i = 0; i < elements.length; i++)
    {
        //alert(elements[i].id + elements[i].getAttribute('value'));
        var s1 = elements[i].getAttribute('value').substring(0, elements[i].getAttribute('value').indexOf(","));
        var s2 = elements[i].getAttribute('value').substring(elements[i].getAttribute('value').indexOf(",") + 1);

        //alert(s1+" "+ s2);
        lating[i] = new google.maps.LatLng(s1, s2);

        var zoom_get = elements[i].getAttribute('zoom');
        var scrwheel = elements[i].getAttribute('scrollwheel');
        var snappzy = 1;
        try {
            snappzy = elements[i].getAttribute('snapzzymap');
        } catch (err) {
        }
        myOptions[i] = {
            scrollwheel: parseInt(scrwheel),
            zoom: parseInt(zoom_get),
            center: lating[i],
            styles: style_google[parseInt(snappzy)],
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        map[i] = new google.maps.Map(document.getElementById(elements[i].id), myOptions[i]);

        //for mark position
        var mark1 = elements[i].getAttribute('markposition').substring(0, elements[i].getAttribute('markposition').indexOf(","));
        var mark2 = elements[i].getAttribute('markposition').substring(elements[i].getAttribute('markposition').indexOf(",") + 1);
        var latmark = new google.maps.LatLng(mark1, mark2);

        var titlemark = elements[i].getAttribute('marktitle');
        var myMarker = new google.maps.Marker(
                {
                    position: latmark,
                    map: map[i],
                    title: titlemark
                });
        //alert(JSON.stringify(map[i]));
    }
}

/**
 *  Before & After Image
 */
function as_before_img() {
    jQuery('.as-compare-img-container').each(function () {
        var orientation_vertical = jQuery(".as-compare-img-container[data-orientation='vertical']"),
                orientation_horizontal = jQuery(".as-compare-img-container[data-orientation!='vertical']"),
                img_offset = jQuery('.as-compare-img-container').attr('data-offset');
        orientation_horizontal.twentytwenty({
            default_offset_pct: img_offset
        });
        orientation_vertical.twentytwenty({
            default_offset_pct: img_offset,
            orientation: 'vertical'
        });
        jQuery(this).hover(function () {
            jQuery(window).trigger("resize.twentytwenty");
        });
    });
}

/**
 *  Text Rotator
 */
function as_text_rotator() {
    jQuery(".as-text-rotate-wrapper .as-rotate").each(function(){
        anim_text  = jQuery(this).data('anim-text');
		speed_text = jQuery(this).data('speed-text');

	    jQuery(this).textrotator({
	        animation: anim_text,
	        speed: speed_text
	    });
    });
}

/**
 *  Owl Carousel Post Format
 */
function as_gallery_post() {
    var owl_slider_post = jQuery(".owl-carousel");
    owl_slider_post.owlCarousel({
        navigation: false, // Show next and prev buttons
        slideSpeed: 300,
        pagination: false,
        singleItem: true,
        //Autoplay
        autoPlay: true,
        stopOnHover: false,
        autoHeight: true,
        transitionStyle: "fade"
    });

    // Custom Navigation Events
    jQuery(".as-btn-slider-post-next").click(function () {
        owl_slider_post.trigger('owl.next');
    })
    jQuery(".as-btn-slider-post-prev").click(function () {
        owl_slider_post.trigger('owl.prev');
    })
}
/**
 *  DSLC Carousel Post Format
 */
function as_gallery_dslc() {
    jQuery('.as-post-galleries').each(function () {
        jQuery(this).owlCarousel({
            navigation: false, // Show next and prev buttons
            slideSpeed: 300,
            pagination: false,
            singleItem: true,
            //Autoplay
            autoPlay: true,
            stopOnHover: false,
            autoHeight: true,
            transitionStyle: "fade"
        });

        // Custom Navigation Events
        jQuery(".as-post-gallery-lc-next").click(function () {
            jQuery('.as-post-galleries').trigger('owl.next');
        })
        jQuery(".as-post-gallery-lc-prev").click(function () {
            jQuery('.as-post-galleries').trigger('owl.prev');
        });
    });

}
jQuery(window).load(function () {
    as_gallery_post();
    as_counter();
    as_circle_chart();
    as_testimonials();
    as_google_map();
    as_time_circles();
    as_before_img();
    as_text_rotator();
    as_gallery_dslc();
});
jQuery(document).ajaxComplete(function () {
    if (jQuery('body').hasClass('dslca-enabled')) {
        as_testimonials();
        as_counter();
        as_circle_chart();
        as_google_map();
        as_time_circles();
        as_before_img();
        as_text_rotator();
        as_gallery_dslc();
    }
});