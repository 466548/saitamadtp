<section class="snsbtnarea">
<?php
	$shareurl = get_permalink();
	$escapeurl = urlencode(get_permalink());
	if(is_singular('gallery08')):
		$title = get_the_title($post->ID).' | '.esc_html(get_post_type_object(get_post_type())->label).' | '.get_bloginfo('name');
	elseif(is_singular('event')):
		$title = get_the_title($post->ID).' | '.get_bloginfo('name');
	else:
		$title = get_bloginfo('name').' | '.get_bloginfo('description');
	endif;
?>
	<div class="twbtn"><a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-text="<?php echo $title; ?>" data-url="<?php echo $shareurl; ?>" data-via="saitamadtp" data-show-count="false">Tweet</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script></div>
	<div class="fbbtn"><div class="fb-share-button" data-href="<?php echo $shareurl; ?>" data-layout="button_count" data-size="small" data-mobile-iframe="true"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $escapeurl; ?>&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">シェア</a></div></div>
</section>
