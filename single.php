<?php get_header(); ?>
<body id="gallery-one">
	<div id="wrapper">
<?php get_sidebar(); ?>
		<main>
<?php if(have_posts()): while(have_posts()):the_post(); ?>
			<h2>Gallery</h2>
			<div class="pagination"><p><?php previous_post_link('%link','前の作品'); ?></p><p><?php next_post_link('%link','次の作品'); ?></p></div>
			<img src="<?php echo CFS()->get('img'); ?>" alt="<?php the_title(); ?>の作品">
			<section>
				<div id="infoarea">
					<h3><?php the_title(); ?><span>の作品</span></h3>
					<p><?php echo esc_html(get_post_type_object(get_post_type())->labels->singular_name); ?>参加<?php if(is_object_in_term($post->ID, 'gallery')): ?>（<?php $terms = get_the_terms($post->ID,'gallery'); foreach($terms as $term): echo '<a href="'.get_term_link($term->slug, 'gallery').'">'.$term->name.'</a>'; endforeach; ?>）<?php endif; ?></p>
					<?php if(get_the_content()): ?><div class="concept">
						<h4>Concept</h4>
						<div><?php the_content(); ?></div>
					</div><?php endif; ?>
				</div>
<?php
	$votecnt = get_post_meta($post->ID, 'stmv_cnt', true);
	if($votecnt<1){$votecnt=0;}
?>
				<div id="stmv-area" class="<?php echo get_post_type(); ?>-<?php the_ID(); ?>"><span class="votebutton"><img src="<?php echo common_links(); ?>/img/btn_stmv.png" alt="いいね！"></span><span><?php echo $votecnt; ?></span><p>「いいね！」を投票できるのは2回までです。</p></div>
			</section>
<?php endwhile; endif; ?>
		</main>
<?php get_footer(); ?>
