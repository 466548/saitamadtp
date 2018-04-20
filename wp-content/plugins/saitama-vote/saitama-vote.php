<?php
/*
Plugin Name: Saitama Vote
Plugin URI: (プラグインの説明と更新を示すページの URI)
Description: さいたまデザインDTP勉強会のためのプラグイン
Version: β1.0
Author: 茶生
Author URI: vtype.net
License: GPL2
	Copyright 2018 茶生 (email : foolsai@gmail.com)

	This program is free software; you can redistribute it and/or modify
	it under the terms of the GNU General Public License, version 2, as
	published by the Free Software Foundation.

	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with this program; if not, write to the Free Software
	Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

	// // 投稿IDを取得
	// function get_stmv_post_id(){
	// 	global $post;
	// 	return $post->ID;
	// 	// return 6;
	// }
	//
	// function stmv_votebutton(){
	// 	// return "Hello ";
	// 	return stmv_post_id();
	// }

	function stmv_plugin_load() {
		// wp_enqueue_script('cookie', plugins_url('js/jquery.cookie.js', __FILE__ ), array(), '1.4.1', true);
		wp_enqueue_script('stmv_js', plugins_url('js/stmv-js.js', __FILE__ ), array(), '1.0', true);
		wp_register_style('stmv_css', plugins_url('css/stmv-style.css', __FILE__));
		wp_enqueue_style('stmv_css');
	}
	add_action('wp_enqueue_scripts', 'stmv_plugin_load');

	function add_my_ajaxurl() {
?>
		<script>
			var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
		</script>
<?php
	}
	add_action( 'wp_head', 'add_my_ajaxurl', 1 );

	// 固定カスタムフィールドボックス
	function add_stmv_fields() {
		// add_meta_box( 'cd_setting', '投票数', 'insert_cd_fields', 'gallery08a', 'normal');
		// $screens = array('gallery08a', 'gallery08b');
		$screens = array('gallery08');
		foreach ($screens as $screen){
			add_meta_box('stmv_setting', '投票数', 'insert_stmv_fields', $screen, 'normal');
		}
	}
	add_action('admin_menu', 'add_stmv_fields');

	// カスタムフィールドの入力エリア
	function insert_stmv_fields(){
		global $post;
		global $stmv_postid;
		if(get_post_meta($post->ID, 'stmv_cnt', true)==NULL){
			echo 0;
		}else{
			echo get_post_meta($post->ID, 'stmv_cnt', true);
		}
	}

	// カスタムフィールドの値を保存
	function plus_stmv_fields(){
		$id = $_POST['id'];
		$cnt = get_post_meta($id, 'stmv_cnt', true)+1;
		echo $cnt;
		update_post_meta($id, 'stmv_cnt', $cnt);

		// echo get_bloginfo('name');
		die();
	}
	add_action('wp_ajax_plus_stmv_fields', 'plus_stmv_fields');
	add_action('wp_ajax_nopriv_plus_stmv_fields', 'plus_stmv_fields');

	function minus_stmv_fields(){
		$id = $_POST['id'];
		$cnt = get_post_meta($id, 'stmv_cnt', true)-1;
		echo $cnt;
		update_post_meta($id, 'stmv_cnt', $cnt);

		// echo get_bloginfo('name');
		die();
	}
	add_action('wp_ajax_minus_stmv_fields', 'minus_stmv_fields');
	add_action('wp_ajax_nopriv_minus_stmv_fields', 'minus_stmv_fields');

	// function view_sitename(){
	// 	echo get_bloginfo( 'name' );
	// 	die();
	// }
	// add_action( 'wp_ajax_view_sitename', 'view_sitename' );
	// add_action( 'wp_ajax_nopriv_view_sitename', 'view_sitename' );


	// // デバッグ用
	// // カスタムフィールドの入力エリア
	// function insert_stmv_fields(){
	// 	global $post;
	// 	echo 'count： <input type="text" name="stmv_cnt" value="'.get_post_meta($post->ID, 'stmv_cnt', true).'" size="50" /><br>';
	// }
	//
	// // カスタムフィールドの値を保存
	// function save_smtv_fields($post_id){
	// 	if(!empty($_POST['stmv_cnt'])){ //題名が入力されている場合
	// 		update_post_meta($post_id, 'stmv_cnt', $_POST['stmv_cnt'] ); //値を保存
	// 	}
	// }
	// add_action('save_post', 'save_smtv_fields');
?>
