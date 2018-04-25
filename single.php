<?php get_header(); ?>
<body id="gallery-one">
	<div id="wrapper">
<?php get_sidebar(); ?>
		<main>
			<h2>Gallery</h2>
<?php
	$pageorder = $post->ID;
	$getallpage = gallerypager();
	$maxkey = count($getallpage);
	$key = array_search($pageorder, $getallpage);
	$prevkey = $key-1;
	$nextkey = $key+1;
	$previd = NULL;
	$nextid = NULL;
	// echo $prevkey.'/'.$nextkey.'（'.$maxkey.'）';
	if($prevkey>-1){
		$previd = $getallpage[$prevkey];
	}
	if($nextkey<$maxkey){
		$nextid = $getallpage[$nextkey];
	}
?>
			<div class="pagination">
				<p><?php if(isset($previd)): ?><a href="<?php echo get_permalink($previd); ?>" class="prev">前の作品</a><?php endif; ?></p>
				<p><a href="<?php echo home_url('/').get_post_type_object(get_post_type())->name.'/'; ?>">一覧へ戻る</a></p>
				<p><?php if(isset($nextid)): ?><a href="<?php echo get_permalink($nextid); ?>" class="next">次の作品</a><?php endif; ?></p>
			</div>
<?php if(have_posts()): while(have_posts()):the_post(); ?>
			<img src="<?php echo wp_get_attachment_image_src(CFS()->get('img'), 'full')[0]; ?>" alt="<?php the_title(); ?>の作品">
			<section>
				<div id="infoarea">
					<h3><?php the_title(); ?><span>の作品</span></h3>
					<p><?php echo esc_html(get_post_type_object(get_post_type())->labels->singular_name); ?>参加<?php if(is_object_in_term($post->ID, 'gallery')): ?>（<?php $terms = get_the_terms($post->ID,'gallery'); foreach($terms as $term): echo '<a href="'.get_term_link($term->slug, 'gallery').'">'.$term->name.'</a>'; endforeach; ?>）<?php endif; ?></p>
					<?php if(get_the_content()): ?><div class="concept">
						<h4>Concept</h4>
						<div><?php the_content(); ?></div>
					</div><?php endif; ?>
				</div>
				<div id="infoarear">
<?php
	$votecnt = get_post_meta($post->ID, 'stmv_cnt', true);
	if($votecnt<1){$votecnt=0;}
?>
					<div id="stmv-area" class="<?php echo get_post_type(); ?>-<?php the_ID(); ?>"><span class="votebutton"><img src="<?php echo common_links(); ?>/img/btn_stmv.png" alt="いいね！"></span><span><?php echo $votecnt; ?></span><p>「いいね！」は1作品1回までです。</p></div>
					<?php get_template_part('parts', 'snsbtn'); ?>
				</div>
			</section>
<?php endwhile; endif; ?>
		</main>
<?php get_footer(); ?>
