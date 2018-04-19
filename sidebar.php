		<div id="fb-root"></div>
		<script>(function(d, s, id) {
			var js, fjs = d.getElementsByTagName(s)[0];
			if (d.getElementById(id)) return;
			js = d.createElement(s); js.id = id;
			js.src = 'https://connect.facebook.net/ja_JP/sdk.js#xfbml=1&version=v2.12';
			fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));</script>
		<header>
			<div>
				<h1><a href="<?php echo home_url(); ?>/"><img src="<?php echo common_links(); ?>/img/logo.svg" alt="さいたまデザインDTP勉強会"></a></h1>
				<nav id="globalMenu">
					<ul>
<?php
	$args = array(
		'posts_per_page' => 1,
		'post_type' => 'event',
		'orderby' =>  'date',//キーの指定
		'order' =>  'DESC',//並び順の指定
	);
	$the_query = new WP_Query($args);
	if($the_query->have_posts()): while($the_query->have_posts()) : $the_query->the_post();
?>
						<li><a href="<?php the_permalink(); ?>">直近の勉強会</a></li>
<?php endwhile;wp_reset_postdata();endif; ?>
						<li><a href="<?php echo home_url(); ?>/event/">過去の勉強会</a></li>
						<li><a href="<?php echo home_url(); ?>/faq/">FAQ</a></li>
						<li><a href="<?php echo home_url(); ?>/contact/">お問い合わせ</a></li>
						<li><a href="https://saitama.connpass.com/">Connpass</a></li>
						<li><a href="https://twitter.com/saitamadtp"><i class="fab fa-twitter-square fa-lg"></i></a></li>
						<li><a href="https://www.facebook.com/saitamadtp/"><i class="fab fa-facebook-square fa-lg"></i></a></li>
					</ul>
				</nav>
			</div>
		</header>
