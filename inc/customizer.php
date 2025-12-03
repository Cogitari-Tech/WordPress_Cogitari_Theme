<?php
/**
 * Cogitari Customizer Settings
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function cogitari_customize_register( $wp_customize ) {
	// Seção de Cores
	$wp_customize->add_section( 'cogitari_colors', array(
		'title'    => __( 'Cores do Tema', 'cogitari' ),
		'priority' => 30,
	) );

	// Cor Primária (Azul)
	$wp_customize->add_setting( 'cogitari_primary_color', array(
		'default'           => '#2F80ED',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cogitari_primary_color', array(
		'label'    => __( 'Cor Primária (Azul)', 'cogitari' ),
		'section'  => 'cogitari_colors',
		'settings' => 'cogitari_primary_color',
	) ) );

	// Cor Secundária (Roxo)
	$wp_customize->add_setting( 'cogitari_secondary_color', array(
		'default'           => '#7B42F6',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cogitari_secondary_color', array(
		'label'    => __( 'Cor Secundária (Roxo)', 'cogitari' ),
		'section'  => 'cogitari_colors',
		'settings' => 'cogitari_secondary_color',
	) ) );
}
add_action( 'customize_register', 'cogitari_customize_register' );