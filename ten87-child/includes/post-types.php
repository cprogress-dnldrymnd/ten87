<?php
/*-----------------------------------------------------------------------------------*/
/* Custom Post Type
/*-----------------------------------------------------------------------------------*/
class newPostType
{
	function __construct(array $param)
	{

		add_action('init', array($this, 'create_post_type'));
		$this->name = $param['name'];
		$this->singular_name = $param['singular_name'];
		$this->icon = $param['icon'];
		$this->supports = $param['supports'];
		$this->show_in_rest = isset($param['show_in_rest']) ? $param['show_in_rest'] : false;
		$this->exclude_from_search = isset($param['exclude_from_search']) ? $param['exclude_from_search'] : false;;
		$this->publicly_queryable = isset($param['publicly_queryable']) ? $param['publicly_queryable'] : true;
		$this->show_in_admin_bar = isset($param['show_in_admin_bar']) ? $param['show_in_admin_bar'] : true;
		$this->has_archive = isset($param['has_archive']) ? $param['has_archive'] : true;
		$this->hierarchical = isset($param['hierarchical']) ? $param['hierarchical'] : false;
		$this->taxonomies = isset($param['taxonomies']) ? $param['taxonomies'] : false;



		if (isset($param['rewrite'])) {
			$this->rewrite = $param['rewrite'];
		} else {
			$this->rewrite = array('slug' => strtolower($this->name));
		}
	}

	function create_post_type()
	{
		register_post_type(
			strtolower($this->name),
			array(
				'labels'              => array(
					'name'               => _x($this->name, 'post type general name'),
					'singular_name'      => _x($this->singular_name, 'post type singular name'),
					'menu_name'          => _x($this->name, 'admin menu'),
					'name_admin_bar'     => _x($this->singular_name, 'add new on admin bar'),
					'add_new'            => _x('Add New', strtolower($this->name)),
					'add_new_item'       => __('Add New ' . $this->singular_name),
					'new_item'           => __('New ' . $this->singular_name),
					'edit_item'          => __('Edit ' . $this->singular_name),
					'view_item'          => __('View ' . $this->singular_name),
					'all_items'          => __('All ' . $this->name),
					'search_items'       => __('Search ' . $this->name),
					'parent_item_colon'  => __('Parent :' . $this->name),
					'not_found'          => __('No ' . strtolower($this->name) . ' found.'),
					'not_found_in_trash' => __('No ' . strtolower($this->name) . ' found in Trash.')
				),
				'show_in_rest'        => $this->show_in_rest,
				'supports'            => $this->supports,
				'public'              => true,
				'has_archive'         => $this->has_archive,
				'hierarchical'        => $this->hierarchical,
				'taxonomies'          => $this->taxonomies,
				'rewrite'             => $this->rewrite,
				'menu_icon'           => $this->icon,
				'capability_type'     => 'page',
				'exclude_from_search' => $this->exclude_from_search,
				'publicly_queryable'  => $this->publicly_queryable,
				'show_in_admin_bar'   => $this->show_in_admin_bar,
			)
		);
	}
}
/*-----------------------------------------------------------------------------------*/
/* Taxonomy
/*-----------------------------------------------------------------------------------*/
class newTaxonomy
{
	function __construct(array $param)
	{
		add_action('init', array($this, 'create_taxonomy'));
		add_action('restrict_manage_posts', array($this, 'filter_by_taxonomy'), 10, 2);
		add_filter('manage_' . $param['post_type'] . '_posts_columns', array($this, 'change_table_column_titles'));
		add_filter('manage_' . $param['post_type'] . '_posts_custom_column', array($this, 'change_column_rows'), 10, 2);
		add_filter('manage_edit-' . $param['post_type'] . '_sortable_columns', array($this, 'change_sortable_columns'));

		$this->taxonomy = $param['taxonomy'];
		$this->post_type = $param['post_type'];
		$this->args = $param['args'];
	}

	function create_taxonomy()
	{
		register_taxonomy($this->taxonomy, $this->post_type, $this->args);
	}

	function filter_by_taxonomy($post_type, $which)
	{

		// Apply this only on a specific post type
		if ($this->post_type !== $post_type)
			return;

		// A list of taxonomy slugs to filter by
		$taxonomies = array($this->taxonomy);

		foreach ($taxonomies as $taxonomy_slug) {

			// Retrieve taxonomy data
			$taxonomy_obj = get_taxonomy($taxonomy_slug);
			$taxonomy_name = $taxonomy_obj->labels->name;

			// Retrieve taxonomy terms
			$terms = get_terms($taxonomy_slug);

			// Display filter HTML
			echo "<select name='{$taxonomy_slug}' id='{$taxonomy_slug}' class='postform'>";
			echo '<option value="">' . sprintf(esc_html__('Show All %s', 'text_domain'), $taxonomy_name) . '</option>';
			foreach ($terms as $term) {
				printf(
					'<option value="%1$s" %2$s>%3$s (%4$s)</option>',
					$term->slug,
					((isset($_GET[$taxonomy_slug]) && ($_GET[$taxonomy_slug] == $term->slug)) ? ' selected="selected"' : ''),
					$term->name,
					$term->count
				);
			}
			echo '</select>';
		}
	}
	function change_table_column_titles($columns)
	{
		unset($columns['date']); // temporarily remove, to have custom column before date column
		$columns[$this->taxonomy] = $this->args['label'];
		$columns['date'] = 'Date'; // readd the date column
		return $columns;
	}

	function change_column_rows($column_name, $post_id)
	{
		if ($column_name == $this->taxonomy) {
			echo get_the_term_list($post_id, $this->taxonomy, '', ', ', '') . PHP_EOL;
		}
	}

	function change_sortable_columns($columns)
	{
		$columns[$this->taxonomy] = $this->taxonomy;
		return $columns;
	}
}

new newTaxonomy(
	array(
		'taxonomy'  => 'studio_category',
		'post_type' => 'studios',
		'args'      => array(
			'hierarchical' => true,
			'label'        => 'Studio Categories',
			'query_var'    => true,
			'rewrite'      => array(
				'slug'         => 'studios',
				'with_front' => true
			)
		)
	)
);

new newPostType(
	array(
		'name'          => 'Studios',
		'singular_name' => 'Studio',
		'icon'          => 'dashicons-media-text',
		'rewrite'       => array('slug' => 'studios', 'with_front' => true),
		'has_archive'   => true,
		'supports'      => array('title', 'revisions', 'editor', 'thumbnail', 'excerpt'),
		'show_in_rest'  => true,
		'taxonomies'    => array('studio_category'),
	)
);


new newPostType(
	array(
		'name'          => 'Templates',
		'singular_name' => 'Template',
		'icon'          => 'dashicons-media-document',
		'rewrite'       => array('slug' => 'template'),
		'supports'      => array('title', 'revisions'),
	)
);

function wpa_studio_post_link($post_link, $id = 0)
{
	$post = get_post($id);
	if (is_object($post)) {
		$terms = wp_get_object_terms($post->ID, 'studio_category');
		if ($terms) {
			return str_replace('studios', 'studios/' . $terms[0]->slug, $post_link);
		}
	}
	return $post_link;
}
add_filter('post_type_link', 'wpa_studio_post_link', 1, 3);

function archive_rewrite_rules()
{
	add_rewrite_rule(
		'^studios/(.*)/(.*)/?$',
		'index.php?post_type=studios&name=$matches[2]',
		'top'
	);
	//flush_rewrite_rules(); // use only once
}

add_action('init', 'archive_rewrite_rules');

add_filter('use_block_editor_for_post_type', 'prefix_disable_gutenberg', 10, 2);
function prefix_disable_gutenberg($current_status, $post_type)
{
	// Use your post type key instead of 'product'
	if ($post_type === 'studios') return false;
	return $current_status;
}


// Add the custom columns to the templates post type:
add_filter('manage_templates_posts_columns', 'set_custom_edit_templates_columns');
function set_custom_edit_templates_columns($columns)
{
	unset($columns['author']);
	$columns['shortcode'] = __('Shortcode', 'your_text_domain');

	return $columns;
}

// Add the data to the custom columns for the templates post type:
add_action('manage_templates_posts_custom_column', 'custom_templates_column', 10, 2);
function custom_templates_column($column, $post_id)
{
	switch ($column) {
		case 'shortcode':
			echo '<input value="[custom_template post_id=' . $post_id . ']" readonly/>';
			break;
	}
}


add_post_type_support('team', 'editor');

apply_filters( 'obsius_core_filter_post_excerpt_length', 500 );

function action_obsius_core_get_custom_post_type_excerpt() {
	return 'xxxxxxxxxxx';
}

add_filter('obsius_core_get_custom_post_type_excerpt', 'action_obsius_core_get_custom_post_type_excerpt');