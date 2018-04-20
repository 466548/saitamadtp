<?php
function common_links(){
	// $commonlinksurl = home_url() . '/wp-content/themes/common';
	$commonlinksurl = get_bloginfo('template_directory') . '/common';
	return $commonlinksurl;
}

function replaceImagePath($arg){
	$content = str_replace('"img/', '"' . get_bloginfo('template_directory') . '/common/img/', $arg);
	// $content = str_replace('"img/', '"' . home_url() . '/wp-content/themes/common/img/', $arg);
	return $content;
}

add_theme_support( 'post-thumbnails', array( 'post','event' ));

function basic_auth($auth_list,$realm="Restricted Area",$failed_text="認証に失敗しました"){
	if (isset($_SERVER['PHP_AUTH_USER']) and isset($auth_list[$_SERVER['PHP_AUTH_USER']])){
		if ($auth_list[$_SERVER['PHP_AUTH_USER']] == $_SERVER['PHP_AUTH_PW']){
			return $_SERVER['PHP_AUTH_USER'];
		}
	}
	header('WWW-Authenticate: Basic realm="'.$realm.'"');
	header('HTTP/1.0 401 Unauthorized');
	header('Content-type: text/html; charset='.mb_internal_encoding());
	die($failed_text);
}


function gallerypager(){
	if(is_singular('gallery08')):
		$args = array(
			'posts_per_page' => -1,
			'orderby' => 'none',
			'order'   => 'ASC',
			'post_type' => 'gallery08'
		);
		$the_query = new WP_Query($args);
		$idarr = array();
		if($the_query->have_posts()): while($the_query->have_posts()): $the_query->the_post();
			$postid = get_the_ID();
			array_push($idarr, $postid);
		endwhile; endif;
		return $idarr;
	endif;
}
add_action('wp_loaded', 'gallerypager');


if(!is_admin()){
	function register_script(){
		wp_deregister_script('jquery');
		wp_enqueue_script('jquery', '//code.jquery.com/jquery-1.12.4.min.js', array(), '1.12.4');

		// wp_register_script('', common_links().'/js/.js');
		wp_register_script('menu', common_links().'/js/menu.js');
		wp_register_script('bxslider', '//cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js');
		// wp_register_script('featherlight', '//cdn.rawgit.com/noelboss/featherlight/1.7.13/release/featherlight.min.js');
		// wp_register_script('featherlight-gallery', '//cdn.rawgit.com/noelboss/featherlight/1.7.13/release/featherlight.gallery.min.js');
		wp_register_script('infinite-scroll', '//unpkg.com/infinite-scroll@3/dist/infinite-scroll.pkgd.min.js');
	}
	function add_script(){
		register_script();
		wp_enqueue_script('jquery');

		wp_enqueue_script('menu');
		// if(is_front_page()){wp_enqueue_script('infinite-scroll');}
		wp_enqueue_script('infinite-scroll');
		wp_enqueue_script('bxslider');
		// wp_enqueue_script('featherlight');
		// wp_enqueue_script('featherlight-gallery');
	}
	add_action('wp_enqueue_scripts', 'add_script');

	function register_stylesheet() {
		wp_register_style('style', common_links().'/css/style.css', array(), null, 'all');
		wp_register_style('font-awesome', '//use.fontawesome.com/releases/v5.0.9/css/all.css', array(), null, 'all');
		wp_register_style('bxslider', '//cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css');
		// wp_register_style('featherlight', '//cdn.rawgit.com/noelboss/featherlight/1.7.13/release/featherlight.min.css');
		// wp_register_style('featherlight-gallery', '//cdn.rawgit.com/noelboss/featherlight/1.7.13/release/featherlight.gallery.min.css');
		wp_register_style('notosans', '//fonts.googleapis.com/earlyaccess/notosansjapanese.css', array(), null, 'all');
		wp_register_style('sawarabi', '//fonts.googleapis.com/earlyaccess/sawarabimincho.css', array(), null, 'all');
		wp_register_style('baskerville', '//fonts.googleapis.com/css?family=Libre+Baskerville:400,700', array(), null, 'all');
	}
	function load_stylesheet() {
		register_stylesheet();
		// if(is_front_page()){wp_enqueue_style('bxslider');}
		wp_enqueue_style('bxslider');
		// wp_enqueue_style('featherlight');
		// wp_enqueue_style('featherlight-gallery');
		wp_enqueue_style('font-awesome');
		wp_enqueue_style('notosans');
		wp_enqueue_style('sawarabi');
		wp_enqueue_style('baskerville');
		wp_enqueue_style('style');
	}
	add_action('wp_enqueue_scripts', 'load_stylesheet');
}
?>
