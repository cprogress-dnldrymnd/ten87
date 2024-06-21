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
		$this->post_type = isset($param['post_type']) ? $param['post_type'] : $this->name;



		if (isset($param['rewrite'])) {
			$this->rewrite = $param['rewrite'];
		} else {
			$this->rewrite = array('slug' => strtolower($this->name));
		}
	}

	function create_post_type()
	{
		register_post_type(
			strtolower($this->post_type),
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
			'rewrite'       => array('slug' => '', 'with_front' => false),

		)
	)
);

new newPostType(
	array(
		'name'          => 'Studios',
		'singular_name' => 'Studio',
		'icon'          => 'dashicons-media-text',
		'rewrite'       => array('slug' => 'l', 'with_front' => false),
		'has_archive'   => true,
		'supports'      => array('title', 'revisions', 'editor', 'thumbnail', 'excerpt', 'page-attributes'),
		'show_in_rest'  => true,
		'taxonomies'    => array('studio_category'),
	)
);

new newPostType(
	array(
		'name'          => 'Funding',
		'singular_name' => 'Funding',
		'post_type' => 'fundings',
		'icon'          => 'dashicons-media-text',
		'rewrite'       => array('slug' => 'funding-for-musicians', 'with_front' => false),
		'has_archive'   => true,
		'supports'      => array('title', 'revisions', 'editor', 'thumbnail', 'excerpt'),
		'show_in_rest'  => false,
	)
);

new newPostType(
	array(
		'name'          => 'Rate Cards',
		'singular_name' => 'Rate Card',
		'post_type' => 'rate-cards',
		'icon'          => 'dashicons-media-text',
		'rewrite'       => array('slug' => 'funding-for-musicians', 'with_front' => false),
		'has_archive'   => true,
		'supports'      => array('title', 'revisions', 'editor', 'thumbnail'),
		'show_in_rest'  => false,
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
			echo '<input type="text" value="[custom_template post_id=' . $post_id . ']" readonly/>';
			break;
	}
}


add_post_type_support('team', 'editor');


function action_obsius_core_filter_post_excerpt_length()
{
	return 500;
}
add_filter('obsius_core_filter_post_excerpt_length', 'action_obsius_core_filter_post_excerpt_length');



function action_register_post_type_args($args, $post_type)
{
	if ($post_type == "team") {
		$args['rewrite'] = array(
			'slug' => 'community-2'
		);
		$args['has_archive'] = true;
		$args['publicly_queryable'] = true;
		$args['exclude_from_search'] = true;
	}

	return $args;
}
add_filter('register_post_type_args', 'action_register_post_type_args', 999, 2);


function post_query($query)
{

	if (isset($query->query['post_type'])) {
		if ($query->query['post_type'] === 'post') {
			$args =  array('menu_order' => 'ASC', 'date' => 'DESC');
			$query->set('orderby', $args);
		}
	}
}
add_action('pre_get_posts', 'post_query', 9999);

// Remove post type slug from 'studio_category' taxonomy archive URLs
function remove_post_type_slug_from_studio_category_archive($tax_link, $term, $taxonomy)
{
	if ($taxonomy === 'studio_category') {
		// Assuming your post type is 'studios', replace if different
		$tax_link = str_replace('/studio_category/', '/', $tax_link);
	}
	return $tax_link;
}
add_filter('term_link', 'remove_post_type_slug_from_studio_category_archive', 10, 3);

// Fix potential 404 errors
function fix_studio_category_archive_404($query)
{
	if (
		!is_admin() &&
		$query->is_main_query() &&
		$query->is_tax('studio_category') &&
		empty($query->query_vars['post_type'])
	) {
		$query->set('post_type', array('studios')); // Set your post type here
	}
}
add_action('parse_query', 'fix_studio_category_archive_404');

function remove_studio_category_term_slug_rewrite_rules()
{
	// Get all studio_category terms
	$terms = get_terms(array(
		'taxonomy' => 'studio_category',
		'hide_empty' => false,
	));

	// Add rewrite rules for each term
	if (!is_wp_error($terms) && !empty($terms)) {
		foreach ($terms as $term) {
			add_rewrite_rule(
				'^' . $term->slug . '/?$', // Match the term slug directly
				'index.php?studio_category=' . $term->slug,
				'top'
			);
		}
	}
}
add_action('init', 'remove_studio_category_term_slug_rewrite_rules', 10, 0);

// Flush permalinks
function flush_studio_category_term_rewrite_rules()
{
	remove_studio_category_term_slug_rewrite_rules();
	flush_rewrite_rules();
}
register_activation_hook(__FILE__, 'flush_studio_category_term_rewrite_rules');
// Add the custom column
function add_team_id_column($columns) {
    $columns['team_id'] = 'Team ID';
    return $columns;
}
add_filter('manage_team_posts_columns', 'add_team_id_column');

// Populate the custom column with data
function display_team_id_column($column, $post_id) {
    if ($column === 'team_id') {
        echo '<span class="copy-to-clipboard button" data-clipboard-text="' . $post_id . '">' . $post_id . '</span>';
    }
}
add_action('manage_team_posts_custom_column', 'display_team_id_column', 10, 2);

// Enqueue Clipboard.js and custom script
function enqueue_clipboard_scripts() {
    wp_enqueue_script('clipboard', 'https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.11/clipboard.min.js', array(), null, true); // CDN for Clipboard.js
    wp_add_inline_script('clipboard', '
        document.addEventListener("DOMContentLoaded", function() {
            var clipboard = new ClipboardJS(".copy-to-clipboard");

            clipboard.on("success", function(e) {
                // Optional feedback (e.g., change button text temporarily)
                e.trigger.textContent = "Copied!";
                setTimeout(function() {
                    e.trigger.textContent = e.trigger.dataset.clipboardText;
                }, 1500);
            });
        });
    ');
}
add_action('admin_enqueue_scripts', 'enqueue_clipboard_scripts');

function custom_permalink_structure( $post_link, $post ) {
    if ( $post->post_type === 'post' ) {
        return home_url( '/blog/' . $post->post_name . '/' );
    } else {
        return $post_link; 
    }
}
add_filter( 'post_permalink', 'custom_permalink_structure', 10, 2 );
