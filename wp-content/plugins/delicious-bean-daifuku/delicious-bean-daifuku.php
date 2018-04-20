<?php
/**
 * @package Delicious_Bean_Daifuku
 * @version 4.0
 */
/*
Plugin Name: Delicious Bean Daifuku
Plugin URI:https://wordpress.org/plugins/delicious-bean-daifuku/
This is not just a plugin, from "Mr,monokano Words that stomach is free" to display words like prayer.
これはただのプラグインではありません。偉大な食欲クリエイターものかのさんによって謳われた食欲のそそる言葉より、このプラグインが有効にされると
プラグイン管理画面以外の管理パネルの右上に「ものかのさんのお腹が空く名言」の言葉をランダムに表示されます。
Author: 466548
Version: 4.0
Author URI:https://twitter.com/466548
License:           GPLv2
*/

function daifuku_monokano_get_lyric() {
	/** These are the lyrics to Delicious Bean Daifuku */
	$lyrics ="人として生を受けたなら食っとけ！
小腹の声に耳を傾ける。
これ考えた奴、天才
食欲は愛（頬を赤らめながら
赤いハートは食欲マークです。
シュークリームおいしい
そばつゆにそば湯を入れてほっと一息（癒
お醤油を上から垂らしてひたひたにしてたべるえんがわ。
味噌ラーメンと餃子って相性いいよね。
今日の食訓「カレーはご飯。おにぎりはたくあん」
肉まんがあつあつふかふか
豆大福はもはや食べるを超えたなにかである。
まぜまぜ、まぜまぜ
合い間にうずらの卵でお口をリフレッシュ。
カツ丼おいしい
たい焼きの季節
ちゃんと台湾料理の味がするぞ！
餃子回転
豆大福歩きながらたべちゃうぞ
回ってる！回ってる！
人はおっさんに生まれるのではない、おっさんになるのだ。
こってりスープをご飯と一緒に口に含んで
餃子を回す喜び。
豆大福たべてるときたぶんうっふんとか言ってる（やめろ
おくちから広がる多幸感に包まれる…！！
炊飯器買うとこからはじめないとキャベツたべられない。
人智を超えたロースかつ丼の余韻がおなかに
源氏パイ買っちゃう
みんなちゃんと保存してー（人間性を疑われながら
半熟ショコラをゆっくり楽しめるおとなになりたい。
生パイン大福おいしい
濃厚チーズに偽りなし！
私くらいになると圧力鍋で圧力をかけずにお湯を沸かす。
餃子の絵文字ができたみたいだよ。
食欲はノープラン
この世に生を受けて食べたゴディバは２粒。
桜の花香るさくらもちおいしい
鳩さんにたい焼き狙われた
餃子テロ注意報が発令しておる…";

	// Here we split it into lines
	$lyrics = explode( "\n", $lyrics );

	// And then randomly choose a line
	return wptexturize( $lyrics[ mt_rand( 0, count( $lyrics ) - 1 ) ] );
}

// This just echoes the chosen line, we'll position it later
function daifuku_monokano() {
	$chosen = daifuku_monokano_get_lyric();
	echo "<p id='monokano'>$chosen</p>";
}

// Now we set that function up to execute when the admin_notices action is called
add_action( 'admin_notices', 'daifuku_monokano' );

// We need some CSS to position the paragraph
function monokano_css() {
	// This makes sure that the positioning is also good for right-to-left languages
	$x = is_rtl() ? 'left' : 'right';

	echo "
	<style type='text/css'>
	#monokano {
		float: $x;
		padding-$x: 15px;
		padding-top: 5px;
		margin: 0;
		font-size: 11px;
	}
	</style>
	";
}

add_action( 'admin_head', 'monokano_css' );

?>
