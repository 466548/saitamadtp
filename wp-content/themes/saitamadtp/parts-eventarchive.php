<?php
	$args = array(
		'posts_per_page' => -1,
		'post_type' => 'event',
	);
	$the_query = new WP_Query($args);
	if($the_query->have_posts()):
?>
			<section id="eventarchive">
<?php while($the_query->have_posts()) : $the_query->the_post(); ?>
				<article>
<?php
	date_default_timezone_set('Asia/Tokyo');
	$today = date("Y/m/d");
	$target_day = date('Y/m/d', strtotime(CFS()->get('date')));
	if(strtotime($today) === strtotime($target_day)):
		$message = "本日開催";
		$btn = '詳細';
	elseif(strtotime($today) > strtotime($target_day)):
		$message = "開催終了";
		$btn = '詳細';
	else:
		$message = "次回開催";
		$btn = '詳細・申込';
	endif;
	$week = array('日', '月', '火', '水', '木', '金', '土');
?>
					<span><?php echo $message; ?></span>
					<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					<p class="date"><?php echo date('Y年n月j日', strtotime(CFS()->get('date'))); ?>（<?php echo $week[date('w', strtotime(CFS()->get('date')))]; ?>） <?php if(CFS()->get('start')): echo CFS()->get('start'); ?>〜<?php endif; ?></p>
					<p class="place"><?php echo CFS()->get('place'); ?></p>
					<a href="<?php echo CFS()->get('url'); ?>"><?php echo $btn; ?></a>
<?php
	if(CFS()->get('slug')):
		if(preg_match("/^http/",CFS()->get('slug'))):
			$galleryurl = CFS()->get('slug');
		else:
			$galleryurl = home_url().'/'.CFS()->get('slug').'/';
		endif;
?>
					<a href="<?php echo $galleryurl; ?>">ギャラリー</a>
<?php endif; ?>
				</article>
<?php endwhile; ?>
				<a href="<?php echo home_url(); ?>/event/" class="formb">過去の開催について</a>
			</section>
<?php endif; wp_reset_postdata(); ?>
