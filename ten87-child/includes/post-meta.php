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