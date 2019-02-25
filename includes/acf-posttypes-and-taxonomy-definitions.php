<?php

// * Discipl - acf-posttypes-and-taxonomy-definitions.php
// * -------------------------------------------------------------------------------------------------------
// * Definities van Advanced Custom Fields voor diverse plekken
// * -------------------------------------------------------------------------------------------------------
// * @author  StudioPress / Paul van Buuren
// * @license GPL-2.0+
// * @package discipl-2019
// * @version 1.0.1
// * @desc.   Eerste accept-versie.
// * @link    https://github.com/paulvanbuuren/discipl.org-wordpress-theme-2019

//========================================================================================================

if( function_exists('acf_add_local_field_group') ):


  //------------------------------------------------------------------------------------------------------
  // ACF DEF HERE
  // team member info
  // 
  acf_add_local_field_group(array(
  	'key' => 'group_5c61bc236720d',
  	'title' => 'Discipl - team member info',
  	'fields' => array(
  		array(
  			'key' => 'field_5c61bc2d458df',
			'label' => 'Functietitel',
  			'name' => 'teammember_title',
  			'type' => 'text',
  			'instructions' => '',
  			'required' => 0,
  			'conditional_logic' => 0,
  			'wrapper' => array(
  				'width' => '',
  				'class' => '',
  				'id' => '',
  			),
  			'default_value' => '',
  			'placeholder' => '',
  			'prepend' => '',
  			'append' => '',
  			'maxlength' => 150,
  		),
  		array(
  			'key' => 'field_5c61bd31e780e',
  			'label' => 'Website',
  			'name' => 'teammember_website_url',
  			'type' => 'url',
  			'instructions' => 'Volledige URL, inclusief http:// of https://',
  			'required' => 0,
  			'conditional_logic' => 0,
  			'wrapper' => array(
  				'width' => '',
  				'class' => '',
  				'id' => '',
  			),
  			'default_value' => '',
  			'placeholder' => '',
  		),
  		array(
  			'key' => 'field_5c61bd76e9f97',
  			'label' => 'Github',
  			'name' => 'teammember_github_url',
  			'type' => 'url',
  			'instructions' => 'Volledige URL alsjeblieft',
  			'required' => 0,
  			'conditional_logic' => 0,
  			'wrapper' => array(
  				'width' => '',
  				'class' => '',
  				'id' => '',
  			),
  			'default_value' => '',
  			'placeholder' => '',
  		),
  		array(
  			'key' => 'field_5c61bcb7cf622',
  			'label' => 'LinkedIn',
  			'name' => 'teammember_linkedin_url',
  			'type' => 'url',
  			'instructions' => 'Volledige URL voor LinkedIn, zoals https://www.linkedin.com/in/henk-de-vries/',
  			'required' => 0,
  			'conditional_logic' => 0,
  			'wrapper' => array(
  				'width' => '',
  				'class' => '',
  				'id' => '',
  			),
  			'default_value' => '',
  			'placeholder' => '',
  		),
  		array(
  			'key' => 'field_5c61bc71fcb00',
  			'label' => 'Twitter',
  			'name' => 'teammember_twitter_url',
  			'type' => 'url',
  			'instructions' => 'Volledige Twitter URL, zoals https://twitter.com/dochterlief',
  			'required' => 0,
  			'conditional_logic' => 0,
  			'wrapper' => array(
  				'width' => '',
  				'class' => '',
  				'id' => '',
  			),
  			'default_value' => '',
  			'placeholder' => '',
  		),
  	),
  	'location' => array(
  		array(
  			array(
  				'param' => 'post_type',
  				'operator' => '==',
  				'value' => DISCIPL_CPT_TEAM,
  			),
  		),
  	),
  	'menu_order' => 0,
  	'position' => 'normal',
  	'style' => 'default',
  	'label_placement' => 'top',
  	'instruction_placement' => 'label',
  	'hide_on_screen' => '',
  	'active' => 1,
  	'description' => '',
  ));

  //------------------------------------------------------------------------------------------------------
  // the fields for a page
    
  acf_add_local_field_group(array(
  	'key' => 'group_5c61522ae3a23',
  	'title' => 'Discipl - extra page blocks',
  	'fields' => array(
  		array(
  			'key' => 'field_5c61522ef1ab2',
  			'label' => 'extra blokken',
  			'name' => 'discipl_contentblocks',
  			'type' => 'repeater',
  			'instructions' => '',
  			'required' => 0,
  			'conditional_logic' => 0,
  			'wrapper' => array(
  				'width' => '',
  				'class' => '',
  				'id' => '',
  			),
  			'collapsed' => 'field_5c61d6098ea11',
  			'min' => 0,
  			'max' => 0,
  			'layout' => 'block',
  			'button_label' => 'blok toevoegen',
  			'sub_fields' => array(
  				array(
  					'key' => 'field_5c615267f1ab3',
  					'label' => 'soort blok',
  					'name' => 'soort_blok',
  					'type' => 'radio',
  					'instructions' => '',
  					'required' => 0,
  					'conditional_logic' => 0,
  					'wrapper' => array(
  						'width' => '',
  						'class' => '',
  						'id' => '',
  					),
  					'choices' => array(
  						'tekst_foto' => 'Tekst met foto',
  						'driekoloms' => 'Driekoloms tekst',
  						'teamblock' => 'Block met team-info',
  						'porfolioblock' => 'Projecten',
  					),
  					'allow_null' => 0,
  					'other_choice' => 0,
  					'default_value' => 'tekst_foto',
  					'layout' => 'horizontal',
  					'return_format' => 'value',
  					'save_other_choice' => 0,
  				),
  				array(
  					'key' => 'field_5c61d6098ea11',
  					'label' => 'Titel van blok',
  					'name' => 'fotoblock_title',
  					'type' => 'text',
  					'instructions' => '',
  					'required' => 0,
  					'conditional_logic' => 0,
  					'wrapper' => array(
  						'width' => '',
  						'class' => '',
  						'id' => '',
  					),
  					'default_value' => '',
  					'placeholder' => '',
  					'prepend' => '',
  					'append' => '',
  					'maxlength' => '',
  				),
  				array(
  					'key' => 'field_5c615475704fb',
  					'label' => 'Fotoblocktekst',
  					'name' => 'fotoblock_text',
  					'type' => 'wysiwyg',
  					'instructions' => 'Hier geen plaatjes toevoegen.',
  					'required' => 0,
  					'conditional_logic' => array(
  						array(
  							array(
  								'field' => 'field_5c615267f1ab3',
  								'operator' => '==',
  								'value' => 'tekst_foto',
  							),
  						),
  					),
  					'wrapper' => array(
  						'width' => '',
  						'class' => '',
  						'id' => '',
  					),
  					'default_value' => 'Fotoblocktekst',
  					'tabs' => 'visual',
  					'toolbar' => 'basic',
  					'media_upload' => 0,
  					'delay' => 0,
  				),
/*  				
  				array(
  					'key' => 'field_5c615500f7bba',
  					'label' => 'Fotoblockcitaat',
  					'name' => 'fotoblock_quote',
  					'type' => 'textarea',
  					'instructions' => 'Gebruik geen opmaak',
  					'required' => 0,
  					'conditional_logic' => array(
  						array(
  							array(
  								'field' => 'field_5c615267f1ab3',
  								'operator' => '==',
  								'value' => 'tekst_foto',
  							),
  						),
  					),
  					'wrapper' => array(
  						'width' => '',
  						'class' => '',
  						'id' => '',
  					),
  					'default_value' => 'Fotoblockcitaat',
  					'placeholder' => '',
  					'maxlength' => '',
  					'rows' => '',
  					'new_lines' => '',
  				),
*/  				
  				array(
  					'key' => 'field_5c6154bdafc1c',
  					'label' => 'Fotoblockimage',
  					'name' => 'fotoblock_image',
  					'type' => 'image',
  					'instructions' => '',
  					'required' => 0,
  					'conditional_logic' => array(
  						array(
  							array(
  								'field' => 'field_5c615267f1ab3',
  								'operator' => '==',
  								'value' => 'tekst_foto',
  							),
  						),
  					),
  					'wrapper' => array(
  						'width' => '24',
  						'class' => '',
  						'id' => '',
  					),
  					'return_format' => 'array',
  					'preview_size' => 'thumbnail',
  					'library' => 'all',
  					'min_width' => '',
  					'min_height' => '',
  					'min_size' => '',
  					'max_width' => '',
  					'max_height' => '',
  					'max_size' => '',
  					'mime_types' => '',
  				),
  				array(
  					'key' => 'field_5c61558e23ffa',
  					'label' => 'Fotoblockachtergrondkleur',
  					'name' => 'fotoblock_bgcolor',
  					'type' => 'radio',
  					'instructions' => '',
  					'required' => 0,
  					'conditional_logic' => array(
  						array(
  							array(
  								'field' => 'field_5c615267f1ab3',
  								'operator' => '==',
  								'value' => 'tekst_foto',
  							),
  						),
  					),
  					'wrapper' => array(
  						'width' => '',
  						'class' => '',
  						'id' => '',
  					),
  					'choices' => array(
  						'white' => 'Wit',
  						'lichtblauw' => 'Lichtblauw',
  						'lila' => 'Lila',
  						'donkerblauw' => 'Donkerblauw',
  					),
  					'allow_null' => 0,
  					'other_choice' => 0,
  					'default_value' => 'lichtblauw',
  					'layout' => 'vertical',
  					'return_format' => 'value',
  					'save_other_choice' => 0,
  				),
  				array(
  					'key' => 'field_5c6182ec832fa',
  					'label' => 'Fotoblockuitlijning',
  					'name' => 'fotoblock_alignment',
  					'type' => 'radio',
  					'instructions' => '',
  					'required' => 0,
  					'conditional_logic' => array(
  						array(
  							array(
  								'field' => 'field_5c615267f1ab3',
  								'operator' => '==',
  								'value' => 'tekst_foto',
  							),
  						),
  					),
  					'wrapper' => array(
  						'width' => '',
  						'class' => '',
  						'id' => '',
  					),
  					'choices' => array(
  						'align-left' => 'Foto links',
  						'align-right' => 'Foto rechts',
  					),
  					'allow_null' => 0,
  					'other_choice' => 0,
  					'default_value' => 'align-left',
  					'layout' => 'vertical',
  					'return_format' => 'value',
  					'save_other_choice' => 0,
  				),
  				array(
  					'key' => 'field_5c615ae1238dc',
  					'label' => 'Kolommen',
  					'name' => 'kolommen',
  					'type' => 'repeater',
  					'instructions' => 'Deze kolommen komen naast elkaar; min. 2, max. 3 kolommen.',
  					'required' => 0,
  					'conditional_logic' => array(
  						array(
  							array(
  								'field' => 'field_5c615267f1ab3',
  								'operator' => '==',
  								'value' => 'driekoloms',
  							),
  						),
  					),
  					'wrapper' => array(
  						'width' => '',
  						'class' => '',
  						'id' => '',
  					),
  					'collapsed' => '',
  					'min' => 2,
  					'max' => 3,
  					'layout' => 'row',
  					'button_label' => '',
  					'sub_fields' => array(
  						array(
  							'key' => 'field_5c615b16238dd',
  							'label' => 'Kolom-titel',
  							'name' => 'discipl_column_title',
  							'type' => 'text',
  							'instructions' => '',
  							'required' => 0,
  							'conditional_logic' => 0,
  							'wrapper' => array(
  								'width' => '',
  								'class' => '',
  								'id' => '',
  							),
  							'default_value' => 'Kolom-titel',
  							'placeholder' => '',
  							'prepend' => '',
  							'append' => '',
  							'maxlength' => '',
  						),
  						array(
  							'key' => 'field_5c615b927986f',
  							'label' => 'Kolom-tekst',
  							'name' => 'discipl_column_text',
  							'type' => 'textarea',
  							'instructions' => '',
  							'required' => 0,
  							'conditional_logic' => 0,
  							'wrapper' => array(
  								'width' => '',
  								'class' => '',
  								'id' => '',
  							),
  							'default_value' => 'Kolom-tekst',
  							'placeholder' => '',
  							'maxlength' => '',
  							'rows' => '',
  							'new_lines' => '',
  						),
  						array(
  							'key' => 'field_5c615be579871',
  							'label' => 'discipl-logovariant',
  							'name' => 'discipl_column_logovariant',
  							'type' => 'radio',
  							'instructions' => '',
  							'required' => 0,
  							'conditional_logic' => 0,
  							'wrapper' => array(
  								'width' => '',
  								'class' => '',
  								'id' => '',
  							),
  							'choices' => array(
  								'none' => 'Geen logo tonen',
  								'logo_lightblue' => 'Lichtblauw',
  								'logo_violet' => 'Violet',
  								'logo_darkblue' => 'Donkerblauw',
  							),
  							'allow_null' => 0,
  							'other_choice' => 0,
  							'default_value' => 'none',
  							'layout' => 'vertical',
  							'return_format' => 'value',
  							'save_other_choice' => 0,
  						),
  					),
  				),
  				array(
  					'key' => 'field_5c61a5627cdba',
  					'label' => 'Kolomuitlijning',
  					'name' => 'kolommen_uitlijning',
  					'type' => 'radio',
  					'instructions' => '',
  					'required' => 0,
  					'conditional_logic' => array(
  						array(
  							array(
  								'field' => 'field_5c615267f1ab3',
  								'operator' => '==',
  								'value' => 'driekoloms',
  							),
  						),
  					),
  					'wrapper' => array(
  						'width' => '',
  						'class' => '',
  						'id' => '',
  					),
  					'choices' => array(
  						'align-left' => 'Tekst links uitlijnen',
  						'align-center' => 'Tekst centreren',
  					),
  					'allow_null' => 0,
  					'other_choice' => 0,
  					'default_value' => '',
  					'layout' => 'vertical',
  					'return_format' => 'value',
  					'save_other_choice' => 0,
  				),
  				array(
  					'key' => 'field_5c619337e8115',
  					'label' => 'Teaminfo-intro',
  					'name' => 'teaminfo_text',
  					'type' => 'text',
  					'instructions' => '',
  					'required' => 0,
  					'conditional_logic' => array(
  						array(
  							array(
  								'field' => 'field_5c615267f1ab3',
  								'operator' => '==',
  								'value' => 'teamblock',
  							),
  						),
  					),
  					'wrapper' => array(
  						'width' => '',
  						'class' => '',
  						'id' => '',
  					),
  					'default_value' => '',
  					'placeholder' => '',
  					'prepend' => '',
  					'append' => '',
  					'maxlength' => '',
  				),
  				array(
  					'key' => 'field_5c61d69ca6564',
  					'label' => 'Team leden',
  					'name' => 'teaminfo_teammembers',
  					'type' => 'relationship',
  					'instructions' => '',
  					'required' => 0,
  					'conditional_logic' => array(
  						array(
  							array(
  								'field' => 'field_5c615267f1ab3',
  								'operator' => '==',
  								'value' => 'teamblock',
  							),
  						),
  					),
  					'wrapper' => array(
  						'width' => '',
  						'class' => '',
  						'id' => '',
  					),
  					'post_type' => array(
  						0 => DISCIPL_CPT_TEAM,
  					),
  					'taxonomy' => '',
  					'filters' => array(
  						0 => 'search',
  					),
  					'elements' => array(
  						0 => 'featured_image',
  					),
  					'min' => '',
  					'max' => '',
  					'return_format' => 'object',
  				),
  				array(
            'key' => 'field_5c61d4950b6bf',
            'label' => 'Korte beschrijving',
            'name' => 'portfolio_description',
            'type' => 'textarea',
  					'instructions' => '',
  					'required' => 0,
  					'conditional_logic' => array(
  						array(
  							array(
  								'field' => 'field_5c615267f1ab3',
  								'operator' => '==',
  								'value' => 'porfolioblock',
  							),
  						),
  					),
  					'wrapper' => array(
  						'width' => '',
  						'class' => '',
  						'id' => '',
  					),
  					'default_value' => '',
  					'placeholder' => '',
  					'prepend' => '',
  					'append' => '',
  					'maxlength' => '',
  				),
  				array(
  					'key' => 'field_5c61d4b50b6c0',
  					'label' => 'Portfolio-intro',
  					'name' => 'portfolio_text',
  					'type' => 'text',
  					'instructions' => '',
  					'required' => 0,
  					'conditional_logic' => array(
  						array(
  							array(
  								'field' => 'field_5c615267f1ab3',
  								'operator' => '==',
  								'value' => 'teamblock',
  							),
  						),
  					),
  					'wrapper' => array(
  						'width' => '',
  						'class' => '',
  						'id' => '',
  					),
  					'default_value' => '',
  					'placeholder' => '',
  					'prepend' => '',
  					'append' => '',
  					'maxlength' => '',
  				),
  				array(
  					'key' => 'field_5c61934ce8116',
  					'label' => 'Projecten',
  					'name' => 'portfolio_items',
  					'type' => 'relationship',
  					'instructions' => '',
  					'required' => 0,
  					'conditional_logic' => array(
  						array(
  							array(
  								'field' => 'field_5c615267f1ab3',
  								'operator' => '==',
  								'value' => 'porfolioblock',
  							),
  						),
  					),
  					'wrapper' => array(
  						'width' => '',
  						'class' => '',
  						'id' => '',
  					),
  					'post_type' => array(
  						0 => DISCIPL_CPT_PROJECTEN,
  					),
  					'taxonomy' => '',
  					'filters' => array(
  						0 => 'search',
  					),
  					'elements' => array(
  						0 => 'featured_image',
  					),
  					'min' => '',
  					'max' => '',
  					'return_format' => 'object',
  				),
  				array(
  					'key' => 'field_5c6156249b8ef',
  					'label' => 'Logovariant',
  					'name' => 'fotoblock_logovariant',
  					'type' => 'radio',
  					'instructions' => '',
  					'required' => 0,
  					'conditional_logic' => array(
  						array(
  							array(
  								'field' => 'field_5c615267f1ab3',
  								'operator' => '==',
  								'value' => 'tekst_foto',
  							),
  						),
  						array(
  							array(
  								'field' => 'field_5c615267f1ab3',
  								'operator' => '==',
  								'value' => 'teamblock',
  							),
  						),
  					),
  					'wrapper' => array(
  						'width' => '',
  						'class' => '',
  						'id' => '',
  					),
  					'choices' => array(
  						'none' => 'Geen logo',
  						'logo_lightblue' => 'Lichtblauw',
  						'logo_violet' => 'Violet',
  						'logo_darkblue' => 'Donkerblauw',
  					),
  					'allow_null' => 0,
  					'other_choice' => 0,
  					'default_value' => '',
  					'layout' => 'vertical',
  					'return_format' => 'value',
  					'save_other_choice' => 0,
  				),
  			),
  		),
  	),
  	'location' => array(
  		array(
  			array(
  				'param' => 'post_type',
  				'operator' => '==',
  				'value' => 'page',
  			),
  		),
  	),
  	'menu_order' => 0,
  	'position' => 'normal',
  	'style' => 'default',
  	'label_placement' => 'top',
  	'instruction_placement' => 'label',
  	'hide_on_screen' => '',
  	'active' => 1,
  	'description' => '',
  ));

  //------------------------------------------------------------------------------------------------------
  
endif;

//========================================================================================================

add_action( 'init', 'cptui_register_my_cpts' );

function cptui_register_my_cpts() {

  //------------------------------------------------------------------------------------------------------
  
	$labels = array(
		"name"                  => __( 'Projecten', 'discipl' ),
		"singular_name"         => __( 'Project', 'discipl' ),
		"menu_name"             => __( 'Projecten', 'discipl' ),
		"all_items"             => __( 'Alle projecten', 'discipl' ),
		"add_new"               => __( 'Nieuw project toevoegen', 'discipl' ),
		"add_new_item"          => __( 'Voeg nieuw project toe', 'discipl' ),
		"edit_item"             => __( 'Bewerk Project', 'discipl' ),
		"new_item"              => __( 'Nieuw project', 'discipl' ),
		"view_item"             => __( 'Bekijk Project', 'discipl' ),
		"search_items"          => __( 'Zoek Project', 'discipl' ),
		"not_found"             => __( 'Geen projecten gevonden', 'discipl' ),
		"not_found_in_trash"    => __( 'Geen projecten gevonden in de prullenbak', 'discipl' ),
		"featured_image"        => __( 'Uitgelichte afbeelding', 'discipl' ),
		"archives"              => __( 'Overzichten', 'discipl' ),
		"uploaded_to_this_item" => __( 'Bijbehorende bestanden', 'discipl' ),
		);


	$args = array(
		"label"                 => __( 'Projecten', '' ),
		"labels"                => $labels,
		"description"           => "Info over gerealiseerde projecten",
		"public"                => true,
		"publicly_queryable"    => true,
		"show_ui"               => true,
		"show_in_rest"          => false,
		"rest_base"             => "",
		"has_archive"           => true,
		"show_in_menu"          => true,
		"exclude_from_search"   => false,
		"capability_type"       => "post",
		"map_meta_cap"          => true,
		"hierarchical"          => false,
		"rewrite"               => array( "slug" => DISCIPL_CPT_PROJECTEN, "with_front" => true ),
		"query_var"             => true,
		"supports"              => array( "title", "excerpt", "thumbnail", "editor", "revisions" ),
	);

	register_post_type( DISCIPL_CPT_PROJECTEN, $args );

  //------------------------------------------------------------------------------------------------------
  
	$labels = array(
		"name"                  => __( 'Teamleden', 'discipl' ),
		"singular_name"         => __( 'Teamlid', 'discipl' ),
		"menu_name"             => __( 'Teamleden', 'discipl' ),
		"all_items"             => __( 'Alle teamleden', 'discipl' ),
		"add_new"               => __( 'Nieuw teamlid toevoegen', 'discipl' ),
		"add_new_item"          => __( 'Voeg nieuw teamlid toe', 'discipl' ),
		"edit_item"             => __( 'Bewerk teamlid', 'discipl' ),
		"new_item"              => __( 'Nieuw teamlid', 'discipl' ),
		"view_item"             => __( 'Bekijk teamlid', 'discipl' ),
		"search_items"          => __( 'Zoek teamlid', 'discipl' ),
		"not_found"             => __( 'Geen teamleden gevonden', 'discipl' ),
		"not_found_in_trash"    => __( 'Geen teamleden gevonden in de prullenbak', 'discipl' ),
		"featured_image"        => __( 'Uitgelichte afbeelding', 'discipl' ),
		"archives"              => __( 'Overzichten', 'discipl' ),
		"uploaded_to_this_item" => __( 'Bijbehorende bestanden', 'discipl' ),
		);

	$args = array(
		"label"                 => __( 'Teamleden', '' ),
		"labels"                => $labels,
		"description"           => "Info over medewerkers",
		"public"                => true,
		"publicly_queryable"    => true,
		"show_ui"               => true,
		"show_in_rest"          => false,
		"rest_base"             => "",
		"has_archive"           => true,
		"show_in_menu"          => true,
		"exclude_from_search"   => false,
		"capability_type"       => "post",
		"map_meta_cap"          => true,
		"hierarchical"          => false,
		"rewrite"               => array( "slug" => DISCIPL_CPT_TEAM, "with_front" => false ),
		"query_var"             => false,
		"supports"              => array( "title", "excerpt", "thumbnail", "revisions" ),
	);

	register_post_type( DISCIPL_CPT_TEAM, $args );

  //------------------------------------------------------------------------------------------------------
  
}

//========================================================================================================
// options page 

if( function_exists('acf_add_options_page') ):

	$args = array(
		'slug' => 'instellingen',
		'title' => __( 'Extra settings discipl.org', 'discipl' ),
		'parent' => 'themes.php'
  ); 
  
  acf_add_options_page($args);

  acf_add_local_field_group(array(
  	'key' => 'group_5c73b144ca785',
  	'title' => 'Discipl - site-teksten',
  	'fields' => array(
  		array(
  			'key' => 'field_5c73b17420925',
  			'label' => 'Tekst op meer weten knop',
  			'name' => 'discipl_cta_meer_weten',
  			'type' => 'textarea',
  			'instructions' => '',
  			'required' => 0,
  			'conditional_logic' => 0,
  			'wrapper' => array(
  				'width' => '',
  				'class' => '',
  				'id' => '',
  			),
  			'default_value' => '',
  			'placeholder' => '',
  			'maxlength' => '',
  			'rows' => '',
  			'new_lines' => '',
  		),
  		array(
  			'key' => 'field_5c740b343e204',
  			'label' => 'Logo in footer',
  			'name' => 'discipl_footer_logo',
  			'type' => 'image',
  			'instructions' => '',
  			'required' => 0,
  			'conditional_logic' => 0,
  			'wrapper' => array(
  				'width' => '',
  				'class' => '',
  				'id' => '',
  			),
  			'return_format' => 'array',
  			'preview_size' => 'thumbnail',
  			'library' => 'all',
  			'min_width' => '',
  			'min_height' => '',
  			'min_size' => '',
  			'max_width' => '',
  			'max_height' => '',
  			'max_size' => '',
  			'mime_types' => '',
  		),
  		array(
  			'key' => 'field_5c73fe225eed2',
  			'label' => 'Tekst in footer',
  			'name' => 'discipl_footer_payoff',
  			'type' => 'textarea',
  			'instructions' => '',
  			'required' => 0,
  			'conditional_logic' => 0,
  			'wrapper' => array(
  				'width' => '',
  				'class' => '',
  				'id' => '',
  			),
  			'default_value' => '',
  			'placeholder' => '',
  			'maxlength' => '',
  			'rows' => '',
  			'new_lines' => '',
  		),
  	),
  	'location' => array(
  		array(
  			array(
  				'param' => 'options_page',
  				'operator' => '==',
  				'value' => 'instellingen',
  			),
  		),
  	),
  	'menu_order' => 0,
  	'position' => 'normal',
  	'style' => 'default',
  	'label_placement' => 'top',
  	'instruction_placement' => 'label',
  	'hide_on_screen' => '',
  	'active' => true,
  	'description' => '',
  ));
  
endif;


//========================================================================================================

