<?php
function dwwp_sample_shortcode($atts, $content = null ){

   $atts= shortcode_atts(
       array(
           'title'=>'Default title',
           'src'=>'www.google.com'
       ), $atts
   );

    return '<h1>'.$atts['title'].'</h1>';

}
add_shortcode('job_listing', 'dwwp_sample_shortcode');