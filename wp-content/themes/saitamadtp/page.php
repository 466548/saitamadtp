<?php
	get_header();
	global $post;
?>
<body id="<?php echo $post->post_name; ?>">
	<div id="wrapper">
<?php get_sidebar(); ?>
		<main>
<?php
	if(have_posts()): while(have_posts()): the_post();
		remove_filter('the_content', 'wpautop');
		the_content();
	endwhile; wp_reset_postdata(); endif;
?>
		</main>
<?php get_footer(); ?>
