<?php
/**
* Template Name: 投票集計
*/
?>
<?php get_header(); ?>
<body id="total">
	<div id="wrapper">
<?php get_sidebar(); ?>
		<main>
			<h2>集計</h2>
<?php
	$args = array(
		'posts_per_page' => -1,
		'post_type' => 'gallery08',
		'orderby' => 'meta_value_num',
		'order' => 'DESC',
		'meta_key' => 'stmv_cnt'
	);
	$the_query = new WP_Query($args);
	$rank = 1;
	$flag = '';
	if($the_query->have_posts()):
?>
			<table>
				<tr>
					<th>順位</th><th>名前</th><th>会場</th><th>投票数</th>
				</tr>
<?php while($the_query->have_posts()) : $the_query->the_post(); ?>
				<tr>
					<td><?php if($flag !== get_post_meta($post->ID , 'stmv_cnt' ,true)): echo $rank; endif; ?></td>
					<td><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></td>
					<td><?php $terms = get_the_terms($post->ID,'gallery'); foreach($terms as $term): echo $term->name; endforeach;?></td>
					<td><?php echo get_post_meta($post->ID , 'stmv_cnt' ,true); ?></td>
				</tr>
<?php $flag = get_post_meta($post->ID , 'stmv_cnt' ,true); $rank++; endwhile; ?>
			</table>
<?php endif; wp_reset_postdata(); ?>
		</main>
<?php get_footer(); ?>
