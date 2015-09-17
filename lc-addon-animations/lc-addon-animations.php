<?php

/*
	Plugin Name: Live Composer Add-On - Animations
	Plugin URI: http://www.livecomposerplugin.com
	Description: Adds additional animations for modules ( Styling > Animation ).
	Author: Slobodan Kustrimovic
	Version: 1.0
	Author URI: http://livecomposerplugin.com
*/

	/**
	 * Enqueue Scripts
	 *
	 * @since 1.0
	 */

/*
	function sklc_addon_anim_scripts() {

		wp_enqueue_style( 'sklc-addon-anim-css', plugin_dir_url( __FILE__ ) . 'css/animations.css', array(), '1.0' );

	} add_action( 'wp_enqueue_scripts', 'sklc_addon_anim_scripts' );
*/


	/**
	 * Filter the animations options
	 *
	 * @since 1.0
	 */

	function sklc_addon_anim_filter( $options ) {

		// New options
		$addon_options = array(
			array(
				'label' => 'FadeIn',
				'value' => 'sklcfadeIn'
			),
			array(
				'label' => 'Fade In Up',
				'value' => 'sklcfadeInUp'
			),
			array(
				'label' => 'Fade In Up Big',
				'value' => 'sklcfadeInUpBig'
			),
			array(
				'label' => 'Fade In Up Large',
				'value' => 'sklcfadeInUpLarge'
			),
			array(
				'label' => 'Fade In Down',
				'value' => 'sklcfadeInDown'
			),
			array(
				'label' => 'Fade In Down Big',
				'value' => 'sklcfadeInDownBig'
			),
			array(
				'label' => 'Fade In Down Large',
				'value' => 'sklcfadeInDownLarge'
			),
			array(
				'label' => 'Fade In Left',
				'value' => 'sklcfadeInLeft'
			),
			array(
				'label' => 'Fade In Left Big',
				'value' => 'sklcfadeInLeftBig'
			),
			array(
				'label' => 'Fade In Left Large',
				'value' => 'sklcfadeInLeftLarge'
			),
			array(
				'label' => 'Fade In Right',
				'value' => 'sklcfadeInRight'
			),
			array(
				'label' => 'Fade In Right Big',
				'value' => 'sklcfadeInRightBig'
			),
			array(
				'label' => 'Fade In Right Large',
				'value' => 'sklcfadeInRightLarge'
			),
			array(
				'label' => 'Fade In Up Left',
				'value' => 'sklcfadeInUpLeft'
			),
			array(
				'label' => 'Fade In Up Left Big',
				'value' => 'sklcfadeInUpLeftBig'
			),
			array(
				'label' => 'Fade In Up Left Large',
				'value' => 'sklcfadeInUpLeftLarge'
			),
			array(
				'label' => 'Fade In Up Right',
				'value' => 'sklcfadeInUpRight'
			),
			array(
				'label' => 'Fade In Up Right Big',
				'value' => 'sklcfadeInUpRightBig'
			),
			array(
				'label' => 'Fade In Up Right Large',
				'value' => 'sklcfadeInUpRightLarge'
			),
			array(
				'label' => 'Fade In Down Left',
				'value' => 'sklcfadeInDownLeft'
			),
			array(
				'label' => 'Fade In Down Left Big',
				'value' => 'sklcfadeInDownLeftBig'
			),
			array(
				'label' => 'Fade In Down Left Large',
				'value' => 'sklcfadeInDownLeftLarge'
			),
			array(
				'label' => 'Fade In Down Right',
				'value' => 'sklcfadeInDownRight'
			),
			array(
				'label' => 'Fade In Down Right Big',
				'value' => 'sklcfadeInDownRightBig'
			),
			array(
				'label' => 'Fade In Down Right Large',
				'value' => 'sklcfadeInDownRightLarge'
			),
			array(
				'label' => 'Fade Out',
				'value' => 'sklcfadeOut'
			),
			array(
				'label' => 'Fade Out Up',
				'value' => 'sklcfadeOutUp'
			),
			array(
				'label' => 'Fade Out Up Big',
				'value' => 'sklcfadeOutUpBig'
			),
			array(
				'label' => 'Fade Out Up Large',
				'value' => 'sklcfadeOutUpLarge'
			),
			array(
				'label' => 'Fade Out Down',
				'value' => 'sklcfadeOutDown'
			),
			array(
				'label' => 'Fade Out Down Big',
				'value' => 'sklcfadeOutDownBig'
			),
			array(
				'label' => 'Fade Out Down Large',
				'value' => 'sklcfadeOutDownLarge'
			),
			array(
				'label' => 'Fade Out Left',
				'value' => 'sklcfadeOutLeft'
			),
			array(
				'label' => 'Fade Out Left Big',
				'value' => 'sklcfadeOutLeftBig'
			),
			array(
				'label' => 'Fade Out Left Large',
				'value' => 'sklcfadeOutLeftLarge'
			),
			array(
				'label' => 'Fade Out Right',
				'value' => 'sklcfadeOutRight'
			),
			array(
				'label' => 'Fade Out Right Big',
				'value' => 'sklcfadeOutRightBig'
			),
			array(
				'label' => 'Fade Out Right Large',
				'value' => 'sklcfadeOutRightLarge'
			),
			array(
				'label' => 'Fade Out Up Left',
				'value' => 'sklcfadeOutUpLeft'
			),
			array(
				'label' => 'Fade Out Up Left Big',
				'value' => 'sklcfadeOutUpLeftBig'
			),
			array(
				'label' => 'Fade Out Up Left Large',
				'value' => 'sklcfadeOutUpLeftLarge'
			),
			array(
				'label' => 'Fade Out Up Right',
				'value' => 'sklcfadeOutUpRight'
			),
			array(
				'label' => 'Fade Out Up Right Big',
				'value' => 'sklcfadeOutUpRightBig'
			),
			array(
				'label' => 'Fade Out Up Right Large',
				'value' => 'sklcfadeOutUpRightLarge'
			),
			array(
				'label' => 'Fade Out Down Left',
				'value' => 'sklcfadeOutDownLeft'
			),
			array(
				'label' => 'Fade Out Down Left Big',
				'value' => 'sklcfadeOutDownLeftBig'
			),
			array(
				'label' => 'Fade Out Down Left Large',
				'value' => 'sklcfadeOutDownLeftLarge'
			),
			array(
				'label' => 'Fade Out Down Right',
				'value' => 'sklcfadeOutDownRight'
			),
			array(
				'label' => 'Fade Out Down Right Big',
				'value' => 'sklcfadeOutDownRightBig'
			),
			array(
				'label' => 'Fade Out Down Right Large',
				'value' => 'sklcfadeOutDownRightLarge'
			),
			array(
				'label' => 'Bounce In',
				'value' => 'sklcbounceIn'
			),
			array(
				'label' => 'Bounce In Big',
				'value' => 'sklcbounceInBig'
			),
			array(
				'label' => 'Bounce In Large',
				'value' => 'sklcbounceInLarge'
			),
			array(
				'label' => 'Bounce In Up',
				'value' => 'sklcbounceInUp'
			),
			array(
				'label' => 'Bounce In Up Big',
				'value' => 'sklcbounceInUpBig'
			),
			array(
				'label' => 'Bounce In Up Large',
				'value' => 'sklcbounceInUpLarge'
			),
			array(
				'label' => 'Bounce In Down',
				'value' => 'sklcbounceInDown'
			),
			array(
				'label' => 'Bounce In Down Big',
				'value' => 'sklcbounceInDownBig'
			),
			array(
				'label' => 'Bounce In Down Large',
				'value' => 'sklcbounceInDownLarge'
			),
			array(
				'label' => 'Bounce In Left',
				'value' => 'sklcbounceInLeft'
			),
			array(
				'label' => 'Bounce In Left Big',
				'value' => 'sklcbounceInLeftBig'
			),
			array(
				'label' => 'Bounce In Left Large',
				'value' => 'sklcbounceInLeftLarge'
			),
			array(
				'label' => 'Bounce In Right',
				'value' => 'sklcbounceInRight'
			),
			array(
				'label' => 'Bounce In Right Big',
				'value' => 'sklcbounceInRightBig'
			),
			array(
				'label' => 'Bounce In Right Large',
				'value' => 'sklcbounceInRightLarge'
			),
			array(
				'label' => 'Bounce In Up Left',
				'value' => 'sklcbounceInUpLeft'
			),array(
				'label' => 'Bounce In Up Left Big',
				'value' => 'sklcbounceInUpLeftBig'
			),
			array(
				'label' => 'Bounce In Up Left Large',
				'value' => 'sklcbounceInUpLeftLarge'
			),
			array(
				'label' => 'Bounce In Up Right',
				'value' => 'sklcbounceInUpRight'
			),
			array(
				'label' => 'Bounce In Up Right Big',
				'value' => 'sklcbounceInUpRightBig'
			),
			array(
				'label' => 'Bounce In Up Right Large',
				'value' => 'sklcbounceInUpRightLarge'
			),
			array(
				'label' => 'Bounce In Down Left',
				'value' => 'sklcbounceInDownLeft'
			),
			array(
				'label' => 'Bounce In Down Left Big',
				'value' => 'sklcbounceInDownLeftBig'
			),
			array(
				'label' => 'Bounce In Down Left Large',
				'value' => 'sklcbounceInDownLeftLarge'
			),
			array(
				'label' => 'Bounce In Down Right',
				'value' => 'sklcbounceInDownRight'
			),
			array(
				'label' => 'Bounce In Down Right Big',
				'value' => 'sklcbounceInDownRightBig'
			),
			array(
				'label' => 'Bounce In Down Right Large',
				'value' => 'sklcbounceInDownRightLarge'
			),
			array(
				'label' => 'Bounce Out',
				'value' => 'sklcbounceOut'
			),
			array(
				'label' => 'Bounce Out Big',
				'value' => 'sklcbounceOutBig'
			),
			array(
				'label' => 'Bounce Out Large',
				'value' => 'sklcbounceOutLarge'
			),
			array(
				'label' => 'Bounce Out Up',
				'value' => 'sklcbounceOutUp'
			),
			array(
				'label' => 'Bounce Out Up Big',
				'value' => 'sklcbounceOutUpBig'
			),
			array(
				'label' => 'Bounce Out Up Large',
				'value' => 'sklcbounceOutUpLarge'
			),array(
				'label' => 'Bounce Out Down',
				'value' => 'sklcbounceOutDown'
			),
			array(
				'label' => 'Bounce Out Down Big',
				'value' => 'sklcbounceOutDownBig'
			),
			array(
				'label' => 'Bounce Out Down Large',
				'value' => 'sklcbounceOutDownLarge'
			),
			array(
				'label' => 'Bounce Out Left',
				'value' => 'sklcbounceOutLeft'
			),
			array(
				'label' => 'Bounce Out Left Big',
				'value' => 'sklcbounceOutLeftBig'
			),
			array(
				'label' => 'Bounce Out Left Large',
				'value' => 'sklcbounceOutLeftLarge'
			),
			array(
				'label' => 'Bounce Out Right',
				'value' => 'sklcbounceOutRight'
			),
			array(
				'label' => 'Bounce Out Right Big',
				'value' => 'sklcbounceOutRightBig'
			),
			array(
				'label' => 'Bounce Out Right Large',
				'value' => 'sklcbounceOutRightLarge'
			),
			array(
				'label' => 'Bounce Out Up Left',
				'value' => 'sklcbounceOutUpLeft'
			),
			array(
				'label' => 'Bounce Out Up Left Big',
				'value' => 'sklcbounceOutUpLeftBig'
			),
			array(
				'label' => 'Bounce Out Up Left Large',
				'value' => 'sklcbounceOutUpLeftLarge'
			),
			array(
				'label' => 'Bounce Out Up Right',
				'value' => 'sklcbounceOutUpRight'
			),
			array(
				'label' => 'Bounce Out Up Right Big',
				'value' => 'sklcbounceOutUpRightBig'
			),
			array(
				'label' => 'Bounce Out Up Right Large',
				'value' => 'sklcbounceOutUpRightLarge'
			),
			array(
				'label' => 'Bounce Out Down Left',
				'value' => 'sklcbounceOutDownLeft'
			),
			array(
				'label' => 'Bounce Out Down Left Big',
				'value' => 'sklcbounceOutDownLeftBig'
			),array(
				'label' => 'Bounce Out Down Left Large',
				'value' => 'sklcbounceOutDownLeftLarge'
			),
			array(
				'label' => 'Bounce Out Down Right',
				'value' => 'sklcbounceOutDownRight'
			),
			array(
				'label' => 'Bounce Out Down Right Big',
				'value' => 'sklcbounceOutDownRightBig'
			),
			array(
				'label' => 'Bounce Out Down Right Large',
				'value' => 'sklcbounceOutDownRightLarge'
			),
			array(
				'label' => 'Zoom In',
				'value' => 'sklczoomIn'
			),
			array(
				'label' => 'Zoom In Up',
				'value' => 'sklczoomInUp'
			),
			array(
				'label' => 'Zoom In Up Big',
				'value' => 'sklczoomInUpBig'
			),
			array(
				'label' => 'Zoom In Up Large',
				'value' => 'sklczoomInUpLarge'
			),
			array(
				'label' => 'Zoom In Down',
				'value' => 'sklczoomInDown'
			),
			array(
				'label' => 'Zoom In Down Big',
				'value' => 'sklczoomInDownBig'
			),
			array(
				'label' => 'Zoom In Down Large',
				'value' => 'sklczoomInDownLarge'
			),
			array(
				'label' => 'Zoom In Left',
				'value' => 'sklczoomInLeft'
			),
			array(
				'label' => 'Zoom In Left Big',
				'value' => 'sklczoomInLeftBig'
			),
			array(
				'label' => 'Zoom In Left Large',
				'value' => 'sklczoomInLeftLarge'
			),
			array(
				'label' => 'Zoom In Right',
				'value' => 'sklczoomInRight'
			),
			array(
				'label' => 'Zoom In Right Big',
				'value' => 'sklczoomInRightBig'
			),
			array(
				'label' => 'Zoom In Right Large',
				'value' => 'sklczoomInRightLarge'
			),array(
				'label' => 'Zoom In Up Left',
				'value' => 'sklczoomInUpLeft'
			),
			array(
				'label' => 'Zoom In Up Left Big',
				'value' => 'sklczoomInUpLeftBig'
			),
			array(
				'label' => 'Zoom In Up Left Large',
				'value' => 'sklczoomInUpLeftLarge'
			),
			array(
				'label' => 'Zoom In Up Right',
				'value' => 'sklczoomInUpRight'
			),
			array(
				'label' => 'Zoom In Up Right Big',
				'value' => 'sklczoomInUpRightBig'
			),
			array(
				'label' => 'Zoom In Up Right Large',
				'value' => 'sklczoomInUpRightLarge'
			),
			array(
				'label' => 'Zoom In Down Left',
				'value' => 'sklczoomInDownLeft'
			),
			array(
				'label' => 'Zoom In Down Left Big',
				'value' => 'sklczoomInDownLeftBig'
			),
			array(
				'label' => 'Zoom In Down Left Large',
				'value' => 'sklczoomInDownLeftLarge'
			),
			array(
				'label' => 'Zoom In Down Right',
				'value' => 'sklczoomInDownRight'
			),
			array(
				'label' => 'Zoom In Down Right Big',
				'value' => 'sklczoomInDownRightBig'
			),
			array(
				'label' => 'Zoom In Down Right Large',
				'value' => 'sklczoomInDownRightLarge'
			),
			array(
				'label' => 'Zoom Out',
				'value' => 'sklczoomOut'
			),
			array(
				'label' => 'Zoom Out Up',
				'value' => 'sklczoomOutUp'
			),
			array(
				'label' => 'Zoom Out Up Big',
				'value' => 'sklczoomOutUpBig'
			),
			array(
				'label' => 'Zoom Out Up Large',
				'value' => 'sklczoomOutUpLarge'
			),
			array(
				'label' => 'Zoom Out Down',
				'value' => 'sklczoomOutDown'
			),
			array(
				'label' => 'Zoom Out Down Big',
				'value' => 'sklczoomOutDownBig'
			),
			array(
				'label' => 'Zoom Out Down Large',
				'value' => 'sklczoomOutDownLarge'
			),
			array(
				'label' => 'Zoom Out Left',
				'value' => 'sklczoomOutLeft'
			),
			array(
				'label' => 'Zoom Out Left Big',
				'value' => 'sklczoomOutLeftBig'
			),
			array(
				'label' => 'Zoom Out Left Large',
				'value' => 'sklczoomOutLeftLarge'
			),
			array(
				'label' => 'Zoom Out Right',
				'value' => 'sklczoomOutRight'
			),
			array(
				'label' => 'Zoom Out Right Big',
				'value' => 'sklczoomOutRightBig'
			),
			array(
				'label' => 'Zoom Out Right Large',
				'value' => 'sklczoomOutRightLarge'
			),
			array(
				'label' => 'Zoom Out Up Left',
				'value' => 'sklczoomOutUpLeft'
			),
			array(
				'label' => 'Zoom Out Up Left Big',
				'value' => 'sklczoomOutUpLeftBig'
			),
			array(
				'label' => 'Zoom Out Up Left Large',
				'value' => 'sklczoomOutUpLeftLarge'
			),
			array(
				'label' => 'Zoom Out Up Right',
				'value' => 'sklczoomOutUpRight'
			),
			array(
				'label' => 'Zoom Out Up Right Big',
				'value' => 'sklczoomOutUpRightBig'
			),
			array(
				'label' => 'Zoom Out Up Right Large',
				'value' => 'sklczoomOutUpRightLarge'
			),
			array(
				'label' => 'Zoom Out Down Left',
				'value' => 'sklczoomOutDownLeft'
			),
			array(
				'label' => 'Zoom Out Down Left Big',
				'value' => 'sklczoomOutDownLeftBig'
			),
			array(
				'label' => 'Zoom Out Down Left Large',
				'value' => 'sklczoomOutDownLeftLarge'
			),
			array(
				'label' => 'Zoom Out Down Right',
				'value' => 'sklczoomOutDownRight'
			),
			array(
				'label' => 'Zoom Out Down Right Big',
				'value' => 'sklczoomOutDownRightBig'
			),
			array(
				'label' => 'Zoom Out Down Right Large',
				'value' => 'sklczoomOutDownRightLarge'
			),
			array(
				'label' => 'Flip In X',
				'value' => 'sklcflipInX'
			),
			array(
				'label' => 'Flip In Y',
				'value' => 'sklcflipInY'
			),
			array(
				'label' => 'Flip In Top Front',
				'value' => 'sklcflipInTopFront'
			),
			array(
				'label' => 'Flip In Top Back',
				'value' => 'sklcflipInTopBack'
			),
			array(
				'label' => 'Flip In Bottom Front',
				'value' => 'sklcflipInBottomFront'
			),
			array(
				'label' => 'Flip In Bottom Back',
				'value' => 'sklcflipInBottomBack'
			),
			array(
				'label' => 'Flip In Left Front',
				'value' => 'sklcflipInLeftFront'
			),
			array(
				'label' => 'Flip In Left Back',
				'value' => 'sklcflipInLeftBack'
			),
			array(
				'label' => 'Flip In Right Front',
				'value' => 'sklcflipInRightFront'
			),
			array(
				'label' => 'Flip In Right Back',
				'value' => 'sklcflipInRightBack'
			),
			array(
				'label' => 'Flip Out X',
				'value' => 'sklcflipOutX'
			),
			array(
				'label' => 'Flip Out Y',
				'value' => 'sklcflipOutY'
			),
			array(
				'label' => 'Flip Out Top',
				'value' => 'sklcflipOutTopFront'
			),
			array(
				'label' => 'Flip Out Top Back',
				'value' => 'sklcflipOutTopBack'
			),
			array(
				'label' => 'Flip Out Bottom Front',
				'value' => 'sklcflipOutBottomFront'
			),
			array(
				'label' => 'Flip Out Bottom Back',
				'value' => 'sklcflipOutBottomBack'
			),
			array(
				'label' => 'Flip Out Left Front',
				'value' => 'sklcflipOutLeftFront'
			),
			array(
				'label' => 'Flip Out Left Back',
				'value' => 'sklcflipOutLeftBack'
			),
			array(
				'label' => 'Flip Out Right Front',
				'value' => 'sklcflipOutRightFront'
			),
			array(
				'label' => 'Flip Out Right Back',
				'value' => 'sklcflipOutRightBack'
			),
			array(
				'label' => 'Flash',
				'value' => 'sklcflash'
			),
			array(
				'label' => 'Strobe',
				'value' => 'sklcstrobe'
			),
			array(
				'label' => 'Shake X',
				'value' => 'sklcshakeX'
			),
			array(
				'label' => 'Shake Y',
				'value' => 'sklcshakeY'
			),
			array(
				'label' => 'Bounce',
				'value' => 'sklcbounce'
			),
			array(
				'label' => 'Tada',
				'value' => 'sklctada'
			),
			array(
				'label' => 'Rubber Band',
				'value' => 'sklcrubberBand'
			),
			array(
				'label' => 'Swing',
				'value' => 'sklcswing'
			),
			array(
				'label' => 'Spin Clockwise',
				'value' => 'sklcspin'
			),
			array(
				'label' => 'Spin Counter-Clockwise',
				'value' => 'sklcspin-reverse'
			),
			array(
				'label' => 'Slingshot Clockwise',
				'value' => 'sklcslingshot'
			),
			array(
				'label' => 'Slingshot Counter-Clockwise',
				'value' => 'sklcslingshot-reverse'
			),
			array(
				'label' => 'Wobble',
				'value' => 'sklcwobble'
			),
			array(
				'label' => 'Pulse',
				'value' => 'sklcpulse'
			),
			array(
				'label' => 'Pulsate',
				'value' => 'sklcpulsate'
			),
			array(
				'label' => 'Heartbeat',
				'value' => 'sklcheartbeat'
			),
			array(
				'label' => 'Panic',
				'value' => 'sklcpanic'
			),
				
		);
		
		// Merge new options with original options
		$new_options = array_merge( $options, $addon_options );

		// Pass it back
		return $new_options;

	} add_filter( 'dslc_animation_options', 'sklc_addon_anim_filter' );