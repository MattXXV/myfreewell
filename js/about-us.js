jQuery(document).ready(function($){
    console.log('about-us');

    function activate_icons() {
        if(jQuery('body').hasClass('page-id-258')) {
            var buttonOne = jQuery('#button-one');
            var buttonTwo = jQuery('#button-two');
            var buttonThree = jQuery('#button-three');
            var buttonFour = jQuery('#button-four');
            jQuery(buttonOne).on('mouseover', function(e) {
                jQuery('#button-one .vc_single_image-wrapper img').attr('srcset', '');
                jQuery('#button-one .vc_single_image-wrapper img').attr('src', '/wp-content/themes/one-for-all/images/01-btn-hov.png');
            });
            jQuery(buttonOne).on('mouseout', function(e) {
                jQuery('#button-one .vc_single_image-wrapper img').attr('src', '/wp-content/themes/one-for-all/images/01-btn.png');
            });
            jQuery(buttonOne).on('mouseover', function(e) {
                jQuery('#button-one .vc_single_image-wrapper img').attr('srcset', '');
                jQuery('#button-one .vc_single_image-wrapper img').attr('src', '/wp-content/themes/one-for-all/images/01-btn-hov.png');
            });
            jQuery(buttonTwo).on('mouseover', function(e) {
                jQuery('#button-two .vc_single_image-wrapper img').attr('srcset', '');
                jQuery('#button-two .vc_single_image-wrapper img').attr('src', '/wp-content/themes/one-for-all/images/target-hover.png');
            });
            jQuery(buttonTwo).on('mouseout', function(e) {
                jQuery('#button-two .vc_single_image-wrapper img').attr('src', '/wp-content/themes/one-for-all/images/target.png');
            });
            jQuery(buttonThree).on('mouseover', function(e) {
                jQuery('#button-three .vc_single_image-wrapper img').attr('srcset', '');
                jQuery('#button-three .vc_single_image-wrapper img').attr('src', '/wp-content/themes/one-for-all/images/02-btn-hov.png');
            });
            jQuery(buttonThree).on('mouseout', function(e) {
                jQuery('#button-three .vc_single_image-wrapper img').attr('src', '/wp-content/themes/one-for-all/images/02-btn.png');
            });
            jQuery(buttonFour).on('mouseover', function(e) {
                jQuery('#button-four .vc_single_image-wrapper img').attr('srcset', '');
                jQuery('#button-four .vc_single_image-wrapper img').attr('src', '/wp-content/themes/one-for-all/images/03-btn-hov.png');
            });
            jQuery(buttonFour).on('mouseout', function(e) {
                jQuery('#button-four .vc_single_image-wrapper img').attr('src', '/wp-content/themes/one-for-all/images/03-btn.png');
            });
        }
    }
    activate_icons();
});
function button_scroll() {
        jQuery('#button-one').on('click', function() {
            TweenMax.to(window, 0.5,  {scrollTo:{y:".button-one-content", offsetY:60}});
        });
        jQuery('#button-two').on('click', function() {
            TweenMax.to(window, 0.5,  {scrollTo:{y:".button-two-content", offsetY:60}});
        });
        jQuery('#button-three').on('click', function() {
            TweenMax.to(window, 0.5,  {scrollTo:{y:".button-three-content", offsetY:60}});
        });
        jQuery('#button-four').on('click', function() {
            TweenMax.to(window, 0.5,  {scrollTo:{y:".button-four-content", offsetY:0}});
        });
        jQuery('.up-nav-arrow').on('click', function() {
            TweenMax.to(window, 0.5,  {scrollTo:0});
        });
}
button_scroll();