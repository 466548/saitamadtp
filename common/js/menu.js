jQuery(function($){
	var rwdMenu = $('#globalMenu'),
	switchPoint = 767,
	slideSpeed = 500;

	var menuSouce = rwdMenu.html();

	$(window).load(function(){
	// $(window).on('load resize', function(){

		function menuSet(){
			if(window.innerWidth < switchPoint){
				if(!($('#rwdMenuWrap').length)){
					$('header').after('<div id="rwdMenuWrap"><div id="switchBtnArea"><a href="javascript:void(0);" class="menu-trigger" href="#"><span></span><span></span><span></span></a></div></div>');
					$('#rwdMenuWrap').append(menuSouce);

					var menuList = $('#rwdMenuWrap > ul'),
					// switchBtn = $('#switchBtn');
					switchBtn = $('.menu-trigger');

					switchBtn.on('click', function(){
						menuList.slideToggle(slideSpeed);
						$(this).toggleClass('active');
					});
				}
			} else {
				$('#rwdMenuWrap').remove();
			}
		}

		$(window).on('resize', function(){
			menuSet();
		});

		menuSet();
	});
});
