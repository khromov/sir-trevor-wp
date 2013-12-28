<?php
// Load Wordpress Without Theme
require('./../../../wp-load.php');

// Check Referer & Permissions
if(strpos($_SERVER['HTTP_REFERER'], get_site_url()) !== 0 || !current_user_can('edit_posts')){
	status_header(404);
	nocache_headers();
	include( get_404_template() );
	exit;
}

// Return Image URL
$image = wp_get_attachment_image_src($_GET['id'], 'full');
echo $image[0];