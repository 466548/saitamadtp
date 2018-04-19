<?php
/**
 * WordPress の基本設定
 *
 * このファイルは、インストール時に wp-config.php 作成ウィザードが利用します。
 * ウィザードを介さずにこのファイルを "wp-config.php" という名前でコピーして
 * 直接編集して値を入力してもかまいません。
 *
 * このファイルは、以下の設定を含みます。
 *
 * * MySQL 設定
 * * 秘密鍵
 * * データベーステーブル接頭辞
 * * ABSPATH
 *
 * @link http://wpdocs.osdn.jp/wp-config.php_%E3%81%AE%E7%B7%A8%E9%9B%86
 *
 * @package WordPress
 */
// 注意:
// Windows の "メモ帳" でこのファイルを編集しないでください !
// 問題なく使えるテキストエディタ
// (http://wpdocs.osdn.jp/%E7%94%A8%E8%AA%9E%E9%9B%86#.E3.83.86.E3.82.AD.E3.82.B9.E3.83.88.E3.82.A8.E3.83.87.E3.82.A3.E3.82.BF 参照)
// を使用し、必ず UTF-8 の BOM なし (UTF-8N) で保存してください。
// ** MySQL 設定 - この情報はホスティング先から入手してください。 ** //
/** WordPress のためのデータベース名 */
define('WP_CACHE', true);
define( 'WPCACHEHOME', '/virtual/htdocs/saitama-dtp/wp-content/plugins/wp-super-cache/' );
define('DB_NAME', 'saitama_dtp');
/** MySQL データベースのユーザー名 */
define('DB_USER', 'root');
/** MySQL データベースのパスワード */
define('DB_PASSWORD', 'haratomomi');
/** MySQL のホスト名 */
define('DB_HOST', '127.0.0.1');
/** データベースのテーブルを作成する際のデータベースの文字セット */
define('DB_CHARSET', 'utf8mb4');
/** データベースの照合順序 (ほとんどの場合変更する必要はありません) */
define('DB_COLLATE', '');
/**#@+
 * 認証用ユニークキー
 *
 * それぞれを異なるユニーク (一意) な文字列に変更してください。
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org の秘密鍵サービス} で自動生成することもできます。
 * 後でいつでも変更して、既存のすべての cookie を無効にできます。これにより、すべてのユーザーを強制的に再ログインさせることになります。
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'anYD-gPf_QJk,*zF=0[7A p~k$Ca_&?]8t/,:n9jzx.@K4#00@`)(aPB%/X:Kgp!');
define('SECURE_AUTH_KEY',  'w0q7O)}_uMb+y&78,/>*fnn.}0}YO-BATBkwYM>x_YaGn5jnGBk 6#Wit%K0$O)_');
define('LOGGED_IN_KEY',    'GB(KM?qM4S~rt~hM,%4%Xn%UkfTX<z>$CDADF3Wmcstj]i38d5Ju6P@`B+txAF3Z');
define('NONCE_KEY',        'x[.fQ^%?>V&;C[F!,WZT~FNfT&huU?)^S^yJK&hfLq2X4SrS.c4C@$,Y4{0nvH8i');
define('AUTH_SALT',        'P9WJtw%*CepY sUsDdLtfzD#dqSQADBA?1BgpWC=U^h[D$4(o6j]rbcljBBxlpJV');
define('SECURE_AUTH_SALT', '%t2XU,@R!4kn47l4|diJ^vvztBkB$/qFS9NJ>O;j{T#z=<D)2hGf^-T^x6vj,WCs');
define('LOGGED_IN_SALT',   'bSGuR4)rG(u9fsKyi#B}>tuj5~;|;gc/SpZpfgwtdy^ACFmQ3o P!cC>/RgR)|^{');
define('NONCE_SALT',       'S5D,W<Gq:X.Y%ub]k)8_/Z3`0[Db@+e,FB(JDEqTW[bV~%~t}c)ou_`h+G7wc?[|');
/**#@-*/
/**
 * WordPress データベーステーブルの接頭辞
 *
 * それぞれにユニーク (一意) な接頭辞を与えることで一つのデータベースに複数の WordPress を
 * インストールすることができます。半角英数字と下線のみを使用してください。
 */
$table_prefix  = 'wp_';
/**
 * 開発者へ: WordPress デバッグモード
 *
 * この値を true にすると、開発中に注意 (notice) を表示します。
 * テーマおよびプラグインの開発者には、その開発環境においてこの WP_DEBUG を使用することを強く推奨します。
 *
 * その他のデバッグに利用できる定数については Codex をご覧ください。
 *
 * @link http://wpdocs.osdn.jp/WordPress%E3%81%A7%E3%81%AE%E3%83%87%E3%83%90%E3%83%83%E3%82%B0
 */
define('WP_DEBUG', false);
/* 編集が必要なのはここまでです ! WordPress でブログをお楽しみください。 */
/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');
/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
