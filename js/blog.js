jQuery(document).ready(function($) {
    console.log('blog');
    if(jQuery('body').hasClass('page-id-416')) {
        var form_header = jQuery('<h3 class="modal-header">Send me more stories!</h3>');
        form_header.prependTo('.yikes-mailchimp-container-1');
    }

    if(jQuery('body').hasClass('page-id-395')) {
        var form_header = jQuery('<h3 class="modal-header">Send me resources!</h3>');
        form_header.prependTo('.yikes-mailchimp-container-1');
    }

    if(jQuery('body').hasClass('page-id-384') || jQuery('body').hasClass('single-post') ) {
        var form_header = jQuery('<h3 class="modal-header">I want to continue learning!</h3>');
        form_header.prependTo('.yikes-mailchimp-container-1');
    }

    if(jQuery('body').hasClass('single-post')) {
        var form_header_magnet = jQuery('<h3 class="modal-header">I want the worksheet!</h3>');
        var close_bttn_magnet = jQuery('<span class="modal-close">X</span>');
        form_header_magnet.prependTo('#gform_wrapper_3');
        close_bttn_magnet.prependTo('#gform_wrapper_3');
    }



    if(jQuery('body').hasClass('single-post') || jQuery('body').hasClass('page-id-384') || jQuery('body').hasClass('page-id-416') || jQuery('body').hasClass('page-id-395')  ) {
        var close_bttn = jQuery('<span class="modal-close">X</span>');
        var height = jQuery(document).height() + 'px';
        close_bttn.prependTo('.yikes-mailchimp-container-1');

        jQuery('.header-subscribe').on('click', function() {
            jQuery('.modal').css('height', height);
            jQuery('.modal').css('display', 'block');
        });
        jQuery('span.modal-close').on('click', function() {
            jQuery('div.modal, div#lead-magnet').fadeOut();
        });

        jQuery('.lead-button').on('click', function() {
            // console.log('lead button clicked');
            TweenMax.to(window, 0.5, {scrollTo: {y: ".cus-anchor", offsetY: 200}});
            jQuery('#lead-magnet').css('height', height);
            jQuery('#lead-magnet').css('display', 'block');
        })


        jQuery('#gform_submit_button_3').on('click', function() {
            setInterval(add_handler, 500);
        });
    }

    function add_handler() {
        jQuery('span.modal-close').one('click', function() {
            jQuery('div#lead-magnet').fadeOut();
        });
        jQuery('.download').one('click', function() {
            jQuery('div#lead-magnet').fadeOut();
        });
    }


})