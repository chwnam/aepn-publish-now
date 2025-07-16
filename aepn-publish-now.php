<?php
/**
 * Plugin Name: 바로 발행
 * Plugin URI: https://github.com/chwnam/aepn-publish-now
 * Description: 블록 에디터에서 Ctrl+Shift+s를 누르면 바로 발행하도록 동작합니다.
 * Author: changwoo0215
 * Author URI: https://www.threads.com/@changwoo0215
 * Version: 1.0.2
 * License: GPLv2-or-later
 */

if ( ! function_exists( 'aepn_init' ) ) {
	function aepn_init(): void {
		wp_register_script(
			'aepn-publish-now',
			plugins_url( 'script.js', __FILE__ ),
			[],
			'production' === wp_get_environment_type() ? '1.0.2' : time(),
			[
				'strategy'  => 'defer',
				'in_footer' => true,
			],
		);
	}
}

add_action( 'init', 'aepn_init' );

if ( ! function_exists( 'aepn_enqueue_scripts' ) ) {
	function aepn_enqueue_scripts( string $hook ): void {
		if ( 'post-new.php' === $hook ||  'post.php' === $hook ) {
			wp_enqueue_script( 'aepn-publish-now' );
		}
	}
}

add_action( 'admin_enqueue_scripts', 'aepn_enqueue_scripts' );
