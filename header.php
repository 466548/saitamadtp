<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>さいたまデザインDTP勉強会</title>
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<?php wp_head(); ?>
	<link rel="icon" type="image/x-icon" href="<?php echo common_links(); ?>/img/favicon.ico">
	<?php
		// if(!is_home()):
		// 	if(get_post_type() === 'gallery08'):
		// 		$userArray = array("gallery08" => "saitama");
		// 		basic_auth($userArray);
		// 	endif;
		// endif;
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
