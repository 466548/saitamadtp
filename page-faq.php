<?php
/**
* Template Name: faq
*/
?>
<?php get_header(); ?>
<body id="faq">
	<div id="wrapper">
<?php get_sidebar(); ?>
		<main>
<?php if(have_posts()): while(have_posts()): the_post(); ?>
			<h2>FAQ</h2>
			<dl>
<?php
	$fields = CFS()->get('faqloop');
	foreach($fields as $field):
?>
				<dt><?php echo $field['question']; ?></dt>
				<dd><?php echo $field['answer']; ?></dd>
<?php endforeach; ?>
			</dl>
			<section>
<?php
		remove_filter('the_content', 'wpautop');
		the_content();
?>
			</section>
<?php endwhile; wp_reset_postdata(); endif; ?>
		</main>
<?php get_footer(); ?>
