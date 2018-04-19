<?php
/**
* Template Name: トップページ
*/
?>
<?php get_header(); ?>
<body id="index">
	<div id="wrapper">
<?php get_sidebar(); ?>
		<main>
			<ul class="indeximg">
<?php
	$args = array(
		'posts_per_page' => -1,
		'post_type' => 'event',
		'orderby' => 'date',
		'order' => 'DESC'
	);
	$the_query = new WP_Query($args);
	if($the_query->have_posts()): while($the_query->have_posts()) : $the_query->the_post();
		if(get_the_post_thumbnail( $id )): echo '<li>'.get_the_post_thumbnail( $id,'full' ).'</li>'; endif;
	endwhile; endif;
?>
			</ul>
<?php get_template_part('parts', 'eventarchive' ); ?>
		</main>
<?php get_footer(); ?>
