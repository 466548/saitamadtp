<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>さいたまデザインDTP勉強会</title>
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
<?php
	$cmnogpimg = get_template_directory_uri().'/common/img/saitamadtp_ogp.png';
	if(is_singular('gallery08')):
		$imgid = get_post_meta($post->ID, 'img', true);
		$ogpimg = wp_get_attachment_image_src($imgid,'full')[0];
		$title = get_the_title($post->ID).' | '.esc_html(get_post_type_object(get_post_type())->label).' | '.get_bloginfo('name');
	else:
		$ogpimg = $cmnogpimg;
		$title = get_bloginfo('name').' | '.get_bloginfo('description');
	endif;
?>
	<meta property="og:title" content="<?php echo $title; ?>">
	<meta property="og:type" content="website">
	<meta property="og:url" content="<?php echo get_permalink(); ?>">
	<meta property="og:image" content="<?php echo $ogpimg; ?>">
	<meta property="og:site_name" content="<?php bloginfo('name'); ?>">
	<meta property="og:description" content="<?php bloginfo('description'); ?>">
	<meta name="twitter:card" content="summary_large_image">
	<meta name="twitter:title" content="<?php echo $title; ?>">
	<meta name="twitter:description" content="<?php bloginfo('description'); ?>">
	<meta name="twitter:image" content="<?php echo $ogpimg; ?>">
	<meta itemprop="image" content="<?php echo $ogpimg; ?>">
	<?php wp_head(); ?>
	<link rel="icon" type="image/x-icon" href="<?php echo common_links(); ?>/img/favicon.ico">
	<?php
		if(!is_home()):
			// if(get_post_type() === 'gallery08'):
			// 	$userArray = array("gallery08" => "saitama");
			// 	basic_auth($userArray);
			// endif;
			if(is_page('1245')): //Basic認証を掛けたいページID
				$userArray = array("total" => "gogosaitama"
			);
			basic_auth($userArray);
			endif;
		endif;
	?>
	<script>
		$(function(){
			$('.galleryarea').infiniteScroll({
				path: '.pagination a',
				append: '.galleryarea>div',
				// status: '.scroller-status',
				hideNav: '.pagination',
			});
		});
		$(document).ready(function(){
			$('a[href^="#"]').click(function(){
				var speed = 500;
				var href= $(this).attr("href");
				var target = $(href == "#" || href == "" ? 'html' : href);
				var position = target.offset().top;
				$("html, body").animate({scrollTop:position}, speed, "swing");
				return false;
			});
			var windowWidth = $(window).width();
			var htmlStr = $('#pageplugin').html();
			var timer = null;
			$(window).on('resize',function() {
				var resizedWidth = $(window).width();
				if(windowWidth != resizedWidth && resizedWidth < 500) {
					clearTimeout(timer);
					timer = setTimeout(function() {
						$('#pageplugin').html(htmlStr);
						window.FB.XFBML.parse();//window.FB.XFBML.parse()で再レンダリングします。
						var windowWidth = $(window).width();
					}, 500);
				}
			});
			$('.indeximg').bxSlider({
				auto:true,
				controls:false,
			});
		});
	</script>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-48546210-7"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-48546210-7');
	</script>
	<!-- juicer -->
	<script src="//kitchen.juicer.cc/?color=l5zlBSxoTEU=" async></script>
</head>
