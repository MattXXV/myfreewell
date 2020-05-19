jQuery(document).ready(function($){
    console.log('solutions');
    var testimoinal_counter = 2;
    var testimonials = {
        one: '"The training challenged me to think bigger when looking at context and my bias/perspective.”',
        two: '“I am thinking more objectively about situations.”',
        three: '“I am more aware of being open to others ideas.”',
        four: '“I am more aware of the fact that everyone is operating with their own narratives.”',
        five: '"I am definitely more conscious of my responses and assumptions.”'
    };
    function rotator() {
        function reset_styles() {
            jQuery('span.circle-icon').css('background', '#ffffff');
        }
        switch(testimoinal_counter) {
            case 1:
                jQuery('.testimonial > p').css('display', 'none');
                reset_styles();
                jQuery('span.test-1').css('background', '#ce5d74');
                jQuery('.testimonial > p').text(testimonials.one);
                jQuery('.testimonial > p').fadeIn(300);
                testimoinal_counter++;
                break;
            case 2:
                jQuery('.testimonial > p').css('display', 'none');
                reset_styles();
                jQuery('span.test-2').css('background', '#ce5d74');
                jQuery('.testimonial > p').text(testimonials.two);
                jQuery('.testimonial > p').fadeIn(300);
                testimoinal_counter++;
                break;
            case 3:
                jQuery('.testimonial > p').css('display', 'none');
                reset_styles();
                jQuery('span.test-3').css('background', '#ce5d74');
                jQuery('.testimonial > p').text(testimonials.three);
                jQuery('.testimonial > p').fadeIn(300);
                testimoinal_counter++;
                break;
            case 4:
                jQuery('.testimonial > p').css('display', 'none');
                reset_styles();
                jQuery('span.test-4').css('background', '#ce5d74');
                jQuery('.testimonial > p').text(testimonials.four);
                jQuery('.testimonial > p').fadeIn(300);
                testimoinal_counter++;
                break;
            case 5:
                jQuery('.testimonial > p').css('display', 'none');
                reset_styles();
                jQuery('span.test-5').css('background', '#ce5d74');
                jQuery('.testimonial > p').text(testimonials.five);
                jQuery('.testimonial > p').fadeIn(300);
                testimoinal_counter = 1;
                break;
        }
    }
    function run_rotator() {
        if(jQuery('body').hasClass('page-id-144')) {
            setInterval(rotator, 5000);
        }
    }
    jQuery('.contact-button').on('click', function() {
        window.location.href = 'http://oneforall-llc.com/contact';
    });
    run_rotator();
});

