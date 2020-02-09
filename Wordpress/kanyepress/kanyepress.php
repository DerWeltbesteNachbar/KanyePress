<?php
/**
 * KanyePress
 *
 * Plugin Name: KanyePress
 * Plugin URI:
 * Description: This plugin serves randomly generated quotes by Kanye West via shortcode [kanye-press]. This is made possible by <a href="https://kanye.rest/" target="_blank">https://kanye.rest/</a>.
 * Version:     1.0.0
 * Author:      Dominik Borchert
 * Author URI:
 * License:     GPLv2 or later
 * License URI: http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * Text Domain: classic-editor
 * Domain Path: /languages
 *
 * This program is free software; you can redistribute it and/or modify it under the terms of the GNU
 * General Public License version 2, as published by the Free Software Foundation. You may NOT assume
 * that you can use any other version of the GPL.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without
 * even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 */

defined( 'ABSPATH' ) or die( 'Invalid request.' );

if ( ! class_exists( 'KanyeRest' ) ) :
class KanyeRest {

	private function __construct() {}

	public static function init_actions() {

		register_activation_hook( __FILE__, array( __CLASS__, 'activate' ) );
		register_uninstall_hook( __FILE__, array( __CLASS__, 'uninstall' ) );

		add_action( 'wp_head' , array( __CLASS__, 'kanyepress_js') );
		add_action( 'wp_head' , array( __CLASS__, 'kanyepress_css') );

		wp_enqueue_script( 'kanypress_script_1', plugin_dir_url( __FILE__ ) . 'static/js/2.8a9c6e85.chunk.js', 0, "1.0.0", 1);
		wp_enqueue_script( 'kanypress_script_2', plugin_dir_url( __FILE__ ) . 'static/js/main.377356de.chunk.js', 0, "1.0.0", 1);

		add_shortcode( 'kanye-press' , array( __CLASS__, 'add_kanyepress_root') );

	}

	/**
	 * Add react root element
	 */
	function add_kanyepress_root() {
		return '<div id="root"></div>';
	}

	/**
	 * JS
	 */

	function kanyepress_js() {
	?>
		<script type='text/javascript'>
			!function(a){function e(e){for(var r,t,n=e[0],o=e[1],u=e[2],p=0,l=[];p<n.length;p++)t=n[p],Object.prototype.hasOwnProperty.call(i,t)&&i[t]&&l.push(i[t][0]),i[t]=0;for(r in o)Object.prototype.hasOwnProperty.call(o,r)&&(a[r]=o[r]);for(s&&s(e);l.length;)l.shift()();return c.push.apply(c,u||[]),f()}
			function f(){for(var e,r=0;r<c.length;r++){for(var t=c[r],n=!0,o=1;o<t.length;o++){var u=t[o];0!==i[u]&&(n=!1)}
			n&&(c.splice(r--,1),e=p(p.s=t[0]))}
			return e}
			var t={},i={1:0},c=[];function p(e){if(t[e])return t[e].exports;var r=t[e]={i:e,l:!1,exports:{}};return a[e].call(r.exports,r,r.exports,p),r.l=!0,r.exports}
			p.m=a,p.c=t,p.d=function(e,r,t){p.o(e,r)||Object.defineProperty(e,r,{enumerable:!0,get:t})},p.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},p.t=function(r,e){if(1&e&&(r=p(r)),8&e)return r;if(4&e&&"object"==typeof r&&r&&r.__esModule)return r;var t=Object.create(null);if(p.r(t),Object.defineProperty(t,"default",{enumerable:!0,value:r}),2&e&&"string"!=typeof r)
			for(var n in r)p.d(t,n,function(e){return r[e]}.bind(null,n));return t},p.n=function(e){var r=e&&e.__esModule?function(){return e.default}:function(){return e};return p.d(r,"a",r),r},p.o=function(e,r){return Object.prototype.hasOwnProperty.call(e,r)},p.p="./";var r=window["webpackJsonpmy-app"]=window["webpackJsonpmy-app"]||[],n=r.push.bind(r);r.push=e,r=r.slice();for(var o=0;o<r.length;o++)e(r[o]);var s=n;f()}([])
		</script>
	<?php
	}

	/**
	 * CSS
	 */

	function kanyepress_css() {
		echo "
		<style type='text/css'>
		.kanypress {

		}
		.kanypress--quote {

		}
		.kanypress--quote + button {
			margin-left: .5em;
			height: 18px;
			width: 18px;

			border: none;
			border-radius: 0;
			background: none;
			background-image: url(data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjQiIGhlaWdodD0iMjQiIHZpZXdCb3g9IjAgMCAyNCAyNCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48cGF0aCBkPSJNMTIgMEM1LjkxMzQ4IDAgMC44Nzk5OSA0LjU1MzM1IDAuMTEzMjgxIDEwLjQzOTVDMC4wOTE2MTc4IDEwLjU3MTggMC4wOTY3OTI4IDEwLjcwNzEgMC4xMjg0OTggMTAuODM3NUMwLjE2MDIwNCAxMC45Njc4IDAuMjE3NzkyIDExLjA5MDQgMC4yOTc4MzggMTEuMTk4QzAuMzc3ODg0IDExLjMwNTUgMC40Nzg3NTIgMTEuMzk1OSAwLjU5NDQ0MyAxMS40NjM4QzAuNzEwMTMzIDExLjUzMTYgMC44MzgyODMgMTEuNTc1NSAwLjk3MTI3IDExLjU5MjhDMS4xMDQyNiAxMS42MTAxIDEuMjM5MzYgMTEuNjAwNCAxLjM2ODU1IDExLjU2NDRDMS40OTc3NCAxMS41Mjg1IDEuNjE4MzggMTEuNDY2OSAxLjcyMzI4IDExLjM4MzNDMS44MjgxOSAxMS4yOTk4IDEuOTE1MjIgMTEuMTk2IDEuOTc5MTkgMTEuMDc4MUMyLjA0MzE3IDEwLjk2MDMgMi4wODI4IDEwLjgzMDcgMi4wOTU3IDEwLjY5NzNDMi43MzQ5OSA1Ljc4OTM2IDYuOTA4NTIgMiAxMiAyQzE0Ljc2NjkgMiAxNy4yNTA2IDMuMTI4NTUgMTkuMDU4NiA0Ljk0MTQxTDE3IDdMMjMgOEwyMiAyTDIwLjQ3MDcgMy41MjkzQzE4LjMwMDcgMS4zNTc1NSAxNS4zMDkzIDAgMTIgMFpNMjIuOTEyMSAxMi40MThDMjIuNjY0NCAxMi40MTQ0IDIyLjQyNDEgMTIuNTAyOSAyMi4yMzc5IDEyLjY2NjRDMjIuMDUxNyAxMi44Mjk5IDIxLjkzMjggMTMuMDU2NiAyMS45MDQzIDEzLjMwMjdDMjEuMjY1IDE4LjIxMDYgMTcuMDkxNSAyMiAxMiAyMkM4Ljk3NzkgMjIgNi4yOTg3NSAyMC42NTAyIDQuNDY0ODQgMTguNTM1Mkw2IDE3TDAgMTZMMSAyMkwzLjA0ODgzIDE5Ljk1MTJDNS4yNDUyNyAyMi40MjI3IDguNDM2MDYgMjQgMTIgMjRDMTguMDg2NSAyNCAyMy4xMiAxOS40NDY2IDIzLjg4NjcgMTMuNTYwNUMyMy45MDcgMTMuNDE5OSAyMy44OTcgMTMuMjc2NiAyMy44NTc1IDEzLjE0MDFDMjMuODE4MSAxMy4wMDM1IDIzLjc0OTkgMTIuODc3IDIzLjY1NzcgMTIuNzY4OUMyMy41NjU1IDEyLjY2MDggMjMuNDUxMyAxMi41NzM2IDIzLjMyMjcgMTIuNTEzMUMyMy4xOTQyIDEyLjQ1MjYgMjMuMDU0MiAxMi40MjAxIDIyLjkxMjEgMTIuNDE4VjEyLjQxOFoiIGZpbGw9ImJsYWNrIi8+PC9zdmc+);
			background-size: contain;
			background-repeat: no-repeat;
			background-position: center;
			cursor: pointer;
			outline: none !important;
		}
		.kanypress--quote + button:hover {
			opacity: .75;
		}
		</style>
		";
	}

	/**
	 * Plugin activated.
	 */
	public static function activate() {

	}

	/**
	 * Plugin deactivated.
	 */
	public static function uninstall() {

	}

}

add_action( 'plugins_loaded', array( 'KanyeRest', 'init_actions' ) );

endif;
