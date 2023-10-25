<?php

use Carbon_Fields\Container;
use Carbon_Fields\Complex_Container;
use Carbon_Fields\Field;

/*-----------------------------------------------------------------------------------*/
/* Studio
/*-----------------------------------------------------------------------------------*/

Container::make('post_meta', __('Page Title Settings'))
	->where('post_type', '=', 'page')
	->add_fields(
		array(
			Field::make('text', 'level', __('Level')),
			Field::make('text', 'award', __('Award')),
		)
	);