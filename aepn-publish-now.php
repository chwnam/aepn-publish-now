<?php
/**
 * Plugin Name: 바로 발행
 * Plugin URI:
 * Description: Threads attorneyengineer 님을 위한 플러그인. 블록 에디터에서 Ctrl+Alt+S 를 누르면 바로 발행하도록 동작합니다.
 * Author: changwoo0215
 * Author URI: https://www.threads.com/@changwoo0215
 * Version: 1.0.0
 */

if ( ! function_exists( 'aepn_init' ) ) {
	function aepn_init(): void {
		wp_register_script(
			'aepn-direct-save',
			plugins_url( 'script.js', __FILE__ ),
			[],
			'1.0.0',
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
		if ( 'post-new.php' === $hook) {
			wp_enqueue_script( 'aepn-direct-save' );
		}
	}
}

add_action( 'admin_enqueue_scripts', 'aepn_enqueue_scripts' );
