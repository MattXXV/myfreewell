console.log('One for all, All for one!!!');

jQuery(document).ready(function($){
    jQuery('#frame-one').css('opacity', 1);
    animations.frame_one();
    scrollArrow.add_scroll_event();

    function calculate_device_height() {
        var device_height = screen.height;
        console.log('height= ' + device_height);
        if(device_height < 700) {
            jQuery('.one-for-all-nav-arrow-wrap').css('display', 'none');
        }
        if(device_height < 700) {
            jQuery('.frame-one-right-column').css('padding-top', '10px');
        }
    }
    calculate_device_height();
});

function scroll_arrow() {
    var device_width = jQuery( window ).width();
    this.add_scroll_event = function() {
        if (device_width < 767) {
            var viewLocation = 0;
            jQuery('.one-for-all-nav-arrow-wrap').on('click', function (e) {
                switch (viewLocation) {
                    case 0:
                        TweenMax.to(window, 0.5, {scrollTo: {y: "#frame-two", offsetY: 0}});
                        viewLocation++;
                        break;
                    case 1:
                        TweenMax.to(window, 0.5, {scrollTo: {y: "#frame-three", offsetY: 0}});
                        viewLocation++;
                        break;
                    case 2:
                        TweenMax.to(window, 0.5, {scrollTo: {y: "#frame-four", offsetY: 280}});
                        viewLocation++;
                        break;
                    case 3:
                        TweenMax.to(window, 0.5, {scrollTo: {y: ".five-img-1", offsetY: -500}});
                        viewLocation++;
                        jQuery('.one-for-all-nav-arrow-wrap').css('opacity', 0);
                        break;
                }
            })
        } else {

                var viewLocation = 0;
                jQuery('.one-for-all-nav-arrow-wrap').on('click', function (e) {
                    switch (viewLocation) {
                        case 0:
                            TweenMax.to(window, 0.5, {scrollTo: {y: "#frame-two", offsetY: 200}});
                            viewLocation++;
                            break;
                        case 1:
                            TweenMax.to(window, 0.5, {scrollTo: {y: "#frame-three", offsetY: 200}});
                            viewLocation++;
                            break;
                        case 2:
                            TweenMax.to(window, 0.5, {scrollTo: {y: "#frame-four", offsetY: 200}});
                            viewLocation++;
                            break;
                        case 3:
                            TweenMax.to(window, 0.5, {scrollTo: {y: ".five-img-4", offsetY: -280}});
                            viewLocation++;
                            jQuery('.one-for-all-nav-arrow-wrap').css('opacity', 0);
                            break;
                    }
                })
        }
    }
}

//Home Screen Animations
function animations_class() {
    this.counter = [0,0,0,0,0,0,0];
    // first content section
     this.frame_one = function() {
        if(this.counter[0] === 0) {
            TweenMax.to('.frame-one-right-text-header', 0.5, {opacity: 1, delay: 0.5});
            TweenMax.fromTo('.frame-one-right-text-header', 0.5, {x: 100}, {x: 0, delay: 0.5});
            TweenMax.to('.frame-one-right-info-graphic', 0.5, {opacity: 1, delay: 0.5});
            TweenMax.fromTo('.frame-one-right-info-graphic', 0.5, {x: -100}, {x: 0, delay: 0.5});
            // dropdown arrow animation
            TweenMax.to('.one-for-all-nav-arrow-wrap', 0.3, {opacity: 1, delay: 0.75});
            TweenMax.fromTo('.one-for-all-nav-arrow-wrap', 0.4, {y: -80}, {
                y: 0,
                delay: 0.75,
                onComplete: addClass_arrow
            });

            function addClass_arrow() {
                jQuery('.one-for-all-nav-arrow-wrap').css('position', 'fixed');
            }
            this.counter[0] = 1;
        }
    };
    // second content section left side
    this.frame_two_left_col = function() {
        if(this.counter[1] === 0) {
            TweenMax.to('.start-img', 0.5, {y: -300, delay: 0});
            TweenMax.to('.end-img', 1.75, {opacity: 1, delay: 0.5, onComplete: set_style});
            TweenMax.to('.frame-two-right-col-text', 0.5, {opacity: 1, delay: 0.5});
            TweenMax.to('.frame-two-right-col-text', 0.5, {x: 100, delay: 0.5});
            function set_style() {
                jQuery('.start-img').css('display', 'none');
                jQuery('.end-img').css('position', 'relative');
            }
            this.counter[1] = 1;
        }
    };
    // second content section right side
    this.frame_two_right_col = function() {
        if(this.counter[2] === 0) {
            TweenMax.to('.frame-two-right-col-text', 0.5, {opacity: 1, delay: 0.5});
            TweenMax.to('.frame-two-right-col-text', 0.5, {x: 100, delay: 0.5});
            this.counter[2] = 1;
        }
    };
    // third content section left side
    this.frame_three_left_col = function() {
        if(this.counter[3] === 0) {
            TweenMax.to('.header-txt', 0.3, {opacity: 1, delay: 0});
            TweenMax.to('.three-text', 0.3, {opacity: 1, delay: 0});
            TweenMax.to('.header-txt', 0.50, {y: 75, delay: 0});
            TweenMax.to('.three-text', 0.50, {y: -275, delay: 0});
            this.counter[3] = 1;
        }
    };
    // third content section right side
    this.frame_three_right_col = function() {
        if(this.counter[4] === 0) {
            TweenMax.to('.video-img', 0.3, {opacity: 1, delay: 0});
            TweenMax.to('.video-img', 1.25, {opacity: 0, delay: 1});
            TweenMax.to('video', 1.25, {opacity: 1, delay: 1});
            TweenMax.to('video', .50, {opacity: 0, delay: 6});
            TweenMax.to('.video-img', .50, {opacity: 1, delay: 6});
            this.counter[4] = 1;
        }
    };
    // fourth content section
    this.frame_four = function() {
        if(this.counter[5] === 0) {
            TweenMax.to('.frame-four-txt', .25, {opacity: 1, delay: 0});
            TweenMax.to('.p-1', .25, {height: 663, delay: 0.3});
            TweenMax.to('.p-2', .25, {height: 457, delay: 0.4});
            TweenMax.to('.p-3', .25, {height: 166, delay: 0.5});
            TweenMax.to('.p-4', .25, {height: 189, delay: 0.6});
            TweenMax.to('.p-5', .25, {height: 306, delay: 0.7});
            TweenMax.to('.p-6', .25, {height: 321, delay: 0.8});
            TweenMax.to('.p-7', .25, {height: 397, delay: 0.9});
            TweenMax.to('.p-8', .25, {height: 306, delay: 1.0});
            TweenMax.to('.p-9', .25, {height: 311, delay: 1.1});
            this.counter[5] = 1;
        }
    };
    // fifth content section
    this.frame_five = function() {
        if(this.counter[6] === 0 && jQuery('#frame-five').css('display') != 'none') {
            TweenMax.fromTo('.five-img-1', .5, {opacity: 0, rotationX: 90, top: 250}, {
                opacity: 1,
                rotationX: 0,
                top: 0,
                delay: 0
            });
            TweenMax.to('.frame-five-txt-1', .50, {opacity: 1, delay: .2});
            TweenMax.fromTo('.five-img-2', .5, {opacity: 0, rotationX: 90, top: 250}, {
                opacity: 1,
                rotationX: 0,
                top: 0,
                delay: 0.5
            });
            TweenMax.to('.frame-five-txt-2', .50, {opacity: 1, delay: 0.7});
            TweenMax.fromTo('.five-img-3', .5, {opacity: 0, rotationX: 90, top: 250}, {
                opacity: 1,
                rotationX: 0,
                top: 0,
                delay: 1
            });
            TweenMax.to('.frame-five-txt-3', .50, {opacity: 1, delay: 1.2});
            TweenMax.fromTo('.five-img-4', .5, {opacity: 0, rotationX: 90, top: 250}, {
                opacity: 1,
                rotationX: 0,
                top: 0,
                delay: 1.5
            });
            TweenMax.to('.frame-five-txt-4', .50, {opacity: 1, delay: 1.7});
            this.counter[6] = 1;
        }
    }
}
//Scene Controllers for Home Screen Animations
var controller = new ScrollMagic.Controller();
var sceneTwoLeft = new ScrollMagic.Scene({triggerElement: "#frame-two", duration: 200})
    .addTo(controller)
    .on("start", function (e) {
        animations.frame_two_left_col();
    });
var sceneTwoRight = new ScrollMagic.Scene({triggerElement: ".frame-two-right-col-text", duration: 200})
    .addTo(controller)
    .on("start", function (e) {
        animations.frame_two_right_col();
    });
var sceneThreeLeft = new ScrollMagic.Scene({triggerElement: "#frame-three", duration: 0, offset: -70})
    .addTo(controller)
    .on("start", function (e) {
        animations.frame_three_left_col();
    });
var sceneThreeRight = new ScrollMagic.Scene({triggerElement: ".frame-three-right-column", duration: 0, offset: -70})
    .addTo(controller)
    .on("start", function (e) {
        animations.frame_three_right_col();
    })
var sceneFour = new ScrollMagic.Scene({triggerElement: "#frame-four", duration: 0, offset: 0})
    .addTo(controller)
    .on("start", function (e) {
        animations.frame_four();
    })
var sceneFive = new ScrollMagic.Scene({triggerElement: "#frame-five", duration: 0, offset: 50})
    .addTo(controller)
    .on("start", function (e) {
        animations.frame_five();
    });

var animations = new animations_class();
var scrollArrow = new scroll_arrow();

