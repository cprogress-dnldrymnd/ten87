<?php

use Carbon_Fields\Container;
use Carbon_Fields\Complex_Container;
use Carbon_Fields\Field;

/*-----------------------------------------------------------------------------------*/
/* Studio
/*-----------------------------------------------------------------------------------*/

Container::make('post_meta', __('Page Heading Settings'))
	->where('post_type', '=', 'page')
	->add_fields(
		array(
			Field::make('checkbox', 'show_custom_page_heading', __('Show custom page heading')),
			Field::make('text', 'alt_title', __('Alt title'))
				->set_help_text('Leave blank to use title'),
			Field::make('text', 'description', __('Description'))
				->set_help_text('Leave blank to use excerpt'),
		)
	);
Container::make('post_meta', __('Page Options'))
	->where('post_type', '=', 'page')
	->set_context('side')
	->add_fields(
		array(
			Field::make('checkbox', 'hide_partners_logos', __('Hide Partners Logos')),
		)
	);
Container::make('theme_options', __('Theme Options'))
	->add_fields(array(
		Field::make('text', 'tiktok_url', __('Tiktok URL')),
		Field::make('text', 'instagram_url', __('Instagram URL')),
		Field::make('text', 'facebook_url', __('Facebook URL')),
		Field::make('text', 'linkedin_url', __('Linkedin URL')),
	));


Container::make('post_meta', __('Template Options'))
	->where('post_type', '=', 'templates')
	->set_context('side')
	->add_fields(
		array(
			Field::make('select', 'display_location', __('Display Location'))
				->add_options(array(
					'shortcode' => __('Custom(via shortcode)'),
					'after_header' => __('After Header'),
					'before_footer' => __('Before Footer'),
				)),
			Field::make('select', 'display_location_condition', __('Display Location Condition'))
				->add_options(array(
					'' => __('Sitewide'),
					'post_type' => __('Post Type'),
					'post_type_archive' => __('Post Type Archive'),
				))
				->set_conditional_logic(array(
					array(
						'field' => 'display_location',
						'value' => 'shortcode', // Optional, defaults to "". Should be an array if "IN" or "NOT IN" operators are used.
						'compare' => '!=', // Optional, defaults to "=". Available operators: =, <, >, <=, >=, IN, NOT IN
					)
				)),
			Field::make('multiselect', 'display_location_post_type', __('Select Post Type'))
				->add_options(array(
					'page' => __('Page'),
					'post' => __('Posts'),
					'fundings' => __('Fundings'),
					'team' => __('Community'),
				))
				->set_conditional_logic(array(
					array(
						'field' => 'display_location_condition',
						'value' => 'post_type', // Optional, defaults to "". Should be an array if "IN" or "NOT IN" operators are used.
						'compare' => '=', // Optional, defaults to "=". Available operators: =, <, >, <=, >=, IN, NOT IN
					)
				)),
			Field::make('multiselect', 'display_location_post_type_achive', __('Select Post Type'))
				->add_options(array(
					'post' => __('Posts'),
					'fundings' => __('Fundings'),
					'team' => __('Community'),
				))
				->set_conditional_logic(array(
					array(
						'field' => 'display_location_condition',
						'value' => 'post_type_archive', // Optional, defaults to "". Should be an array if "IN" or "NOT IN" operators are used.
						'compare' => '=', // Optional, defaults to "=". Available operators: =, <, >, <=, >=, IN, NOT IN
					)
				)),
		)
	);


Container::make('post_meta', __('Page Heading Settings'))
	->where('post_type', '=', 'fundings')
	->add_fields(
		array(
			Field::make('checkbox', 'has_readmore', __('Has Readmore'))
			->set_help_text('Check this to display readmore in popup.'),
		)
	);
