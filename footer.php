		<footer>
<?php if(is_post_type_archive('gallery08')): $totop = home_url('/').'gallery08/#wrapper'; else: $totop = '#wrapper'; endif; ?>
			<div class="totop"><a href="<?php echo $totop; ?>"><i class="fas fa-arrow-up"></i></a></div>
			<section class="snsarea forpc">
				<div id="pageplugin"><div class="fb-page" data-href="https://www.facebook.com/saitamadtp/" data-tabs="timeline" data-width="500" data-height="500" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="false"><blockquote cite="https://www.facebook.com/saitamadtp/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/saitamadtp/">さいたまデザインDTP勉強会</a></blockquote></div></div>
				<div class="twittertl"><a class="twitter-timeline" width="100%" height="500px" href="https://twitter.com/saitamadtp?ref_src=twsrc%5Etfw">Tweets by saitamadtp</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script></div>
			</section>
			<ul class="formb">
				<li><a href="https://twitter.com/saitamadtp"><i class="fab fa-twitter-square fa-2x"></i></a></li>
				<li><a href="https://www.facebook.com/saitamadtp/"><i class="fab fa-facebook-square fa-2x"></i></a></li>
				<li><a href="<?php echo home_url(); ?>/faq/" class="question"><i class="fas fa-question chngsize"></i></a></li>
				<li><a href="<?php echo home_url(); ?>/contact/"><i class="fas fa-envelope-square fa-2x"></i></a></li>
			</ul>
			<small>Copyright<i class="far fa-copyright"></i> さいたまデザインDTP勉強会 All rights reserved.</small>
		</footer>
	</div>
<?php wp_footer(); ?>
</body>
</html>
