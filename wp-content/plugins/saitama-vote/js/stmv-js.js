(function($){
	$('.votebutton').click(function(){
		var prsloc = $(this).parent().attr('class');
		var str = prsloc.split('-');
		var customfield = 'stmv-'+str[0];
		var readstorage = localStorage.getItem(customfield);
		if(readstorage){
			// if(readstorage.indexOf('/') != -1){
			// 	alert('2点投票済みなので投票できません。');
			// }else{
			// 	var postid = readstorage+'/'+str[1];
			// 	cntstmv(customfield, postid);
			// }

			var rsarray = readstorage.split('/');
			if(rsarray.indexOf(str[1])>=0){
				alert('同じ作品にもう一度「いいね！」はできません。この作品への「いいね！」を取り消します。');
				var delnum = rsarray.indexOf(str[1]);
				rsarray.splice(delnum, 1);
				// localStorage.removeItem(customfield);
				if(rsarray.length>0){
					localStorage.setItem(customfield, rsarray[0]);
				}else{
					localStorage.setItem(customfield, '');
				}
				cntdownstmv(customfield, postid);
			}else if(rsarray.length>1){
				alert('2点投票済みなので投票できません。');
			}else{
				var postid = readstorage+'/'+str[1];
				cntstmv(customfield, postid);
			}
		}else{
			var postid = str[1];
			cntstmv(customfield, postid);
		}

		function cntstmv(lsname, lsvalue){
			localStorage.setItem(lsname, lsvalue);
			// ここからajax部分
			$.ajax({
				type:'POST',
				url:ajaxurl,
				data:{
					'action':'plus_stmv_fields',
					'id':str[1]
				},
				success:function(response){
					// alert(response);
					$('#stmv-area span:nth-of-type(2)').text(response);
				}
			});
			return false;
		}
		function cntdownstmv(lsname, lsvalue){
			// ここからajax部分
			$.ajax({
				type:'POST',
				url:ajaxurl,
				data:{
					'action':'minus_stmv_fields',
					'id':str[1]
				},
				success:function(response){
					// alert(response);
					$('#stmv-area span:nth-of-type(2)').text(response);
				}
			});
			return false;
		}
		// ここまで
	});
})(jQuery);
