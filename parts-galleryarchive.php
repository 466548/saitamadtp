<?php
	$galleryslug = esc_html(get_post_type_object(get_post_type())->name);
	$paged = get_query_var('paged') ? get_query_var('paged') : 1;
	$perpage = 30;
	$orderbykey = 'none';
	$orderkey = 'ASC';
	if(is_post_type_archive()&&is_tax('gallery')):
		$args = array(
			'paged' => $paged,
			'posts_per_page' => $perpage,
			'orderby' => $orderbykey,
			'order'   => $orderkey,
			'post_type' => $galleryslug,
			'tax_query' => array(
				array(
					'taxonomy' => 'gallery',
					'field' => 'slug',
					'terms' => $term,
				),
			),
		);
	elseif(is_post_type_archive()):
		$args = array(
			'paged' => $paged,
			'posts_per_page' => $perpage,
			'orderby' => $orderbykey,
			'order'   => $orderkey,
			'post_type' => $galleryslug,
		);
	elseif(is_tax('gallery')):
		$args = array(
			'paged' => $paged,
			'posts_per_page' => $perpage,
			'orderby' => $orderbykey,
			'order'   => $orderkey,
			'tax_query' => array(
				array(
					'taxonomy' => 'gallery',
					'field' => 'slug',
					'terms' => $term,
				),
			),
		);
	else:
		$args = array(
			'paged' => $paged,
			'posts_per_page' => $perpage,
			'orderby' => $orderbykey,
			'order'   => $orderkey,
		);
	endif;
	$the_query = new WP_Query($args);
	if($the_query->have_posts()):
?>
			<section class="galleryarea">
<?php while($the_query->have_posts()) : $the_query->the_post(); ?>
				<div<?php if(has_term('horizontal', 'gallerytag')){echo ' class="horizontal"';} ?>><a href="<?php the_permalink(); ?>" ontouchstart="">
					<img src="<?php echo wp_get_attachment_image_src(CFS()->get('img'), 'medium')[0]; ?>" alt="<?php the_title(); ?>の作品">
					<div><p><?php the_title(); ?><?php $terms = get_the_terms($post->ID,'gallery'); if($terms){?><span>（<?php foreach($terms as $term): echo $term->name; endforeach;?>）</span><?php } ?></p></div>
					</a><!-- <p><?php echo $post->ID; ?></p> --></div>
<?php endwhile; ?>
			</section>
			<div class="scroller-status">
				<!-- <div class="infinite-scroll-request loader-ellips">...</div>
				<p class="infinite-scroll-last">End of content</p>
				<p class="infinite-scroll-error">No more pages to load</p> -->
			</div>
			<div class="pagination">
				<?php //posts_nav_link(); ?>
				<?php
					// リンクが無い場合はNULLが返ってくる
					$next_link = get_next_posts_link('Next');
					if(isset($next_link)){echo $next_link;}
				?>
			</div>
<?php //wp_reset_postdata(); ?><?php endif; ?>
