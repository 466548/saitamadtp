<?php get_header(); ?>
<body id="event-one">
	<div id="wrapper">
<?php get_sidebar(); ?>
		<main>
<?php if(have_posts()): while(have_posts()):the_post(); ?>
			<div class="mainimg"><?php if(get_the_post_thumbnail( $id )): echo get_the_post_thumbnail( $id,'full' ); endif; ?></div>
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
				<h2><?php the_title(); ?></h2>
				<p class="date"><?php echo date('Y年n月j日', strtotime(CFS()->get('date'))); ?>（<?php echo $week[date('w', strtotime(CFS()->get('date')))]; ?>） <?php if(CFS()->get('start')): echo CFS()->get('start'); ?>〜<?php endif; ?></p>
				<p class="place"><?php echo CFS()->get('place'); ?></p>
				<a href="<?php echo CFS()->get('url'); ?>"><?php echo $btn; ?></a>
<?php
	$fields1 = CFS()->get('satellite_loop');
	if($fields1):
?>
				<h3>Satellite</h3>
				<ul class="satellite">
<?php
	foreach ($fields1 as $field):
		if($field['url']):
?>
					<li><a href="<?php echo $field['url']; ?>"><?php echo $field['area']; ?></a></li>
<?php else: ?>
					<li><?php echo $field['area']; ?></li>
<?php endif; endforeach; ?>
				</ul>
<?php endif; ?>

<?php if(CFS()->get('slug')): ?>
				<h3>Gallery</h3>
				<ul class="gallery">
<?php
		if(preg_match("/^http/",CFS()->get('slug'))):
			$galleryurl = CFS()->get('slug');
		else:
			$galleryurl = home_url().'/'.CFS()->get('slug').'/';
		endif;
?>
					<li><a href="<?php echo $galleryurl; ?>">ALL</a></li>
<?php if($fields1): ?>
					<li><a href="<?php echo $galleryurl.'?gallery=saitama'; ?>">さいたま</a></li>
<?php foreach($fields1 as $field): if($field['term']!=='none'): ?>
					<li><a href="<?php echo $galleryurl.'?gallery='.$field['term']; ?>"><?php echo $field['area']; ?></a></li>
<?php endif; endforeach; endif; ?>
				</ul>
<?php endif; ?>

<?php
	$fields2 = CFS()->get('reportloop');
	if($fields2):
?>
				<h3>Report</h3>
				<ul class="report">
<?php foreach ($fields2 as $field): ?>
					<li><a href="<?php echo $field['report_url']; ?>"><?php echo $field['title']; ?></a><?php if($field['author']): ?><p>by <?php echo $field['author']; ?></p><?php endif; ?></li>
<?php endforeach; endif; ?>
				</ul>
			</article>
<?php endwhile;wp_reset_postdata();endif; ?>
		</main>
<?php get_footer(); ?>
