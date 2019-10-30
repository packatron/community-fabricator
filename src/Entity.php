<?php
namespace Packatron\CommunityFabricator;

use Javanile\Granular\Bindable;

class Entity extends Bindable
{
    /**
     * @var array
     */
    public static $bindings = [
        'action:init' => ['registerEntityPostType', 'registerEntitiesPostType'],
        'filter:rwmb_meta_boxes' => ['addEntityMetaBoxes'],
        'action:pre_get_posts:1:1' => ['routeEntityAdd'],
        /*'action:add_meta_boxes' => 'addMetaBox',
        'action:admin_enqueue_scripts' => 'adminEnqueueScripts',
        'action:save_post:10:2' => 'savePost',
        'action:wp_enqueue_scripts' => 'wpEnqueueScripts',
        'shortcode:Entity' => 'renderEntity',*/
    ];

    /**
     *
     */
    public function registerEntityPostType()
    {
        $labels = array(
            'name'               => _x( 'Entity', 'post type general name', 'community-fabricator' ),
            'singular_name'      => _x( 'Entity', 'post type singular name', 'community-fabricator' ),
            'menu_name'          => _x( 'Entities', 'admin menu', 'community-fabricator' ),
            'name_admin_bar'     => _x( 'Entity', 'add new on admin bar', 'community-fabricator' ),
            'add_new'            => _x( 'Add New', 'ads', 'community-fabricator' ),
            'add_new_item'       => __( 'Add New Entity', 'community-fabricator' ),
            'new_item'           => __( 'New Entity', 'community-fabricator' ),
            'edit_item'          => __( 'Edit Entity', 'community-fabricator' ),
            'view_item'          => __( 'View Entity', 'community-fabricator' ),
            'all_items'          => __( 'All Entities', 'community-fabricator' ),
            'search_items'       => __( 'Search Entity', 'community-fabricator' ),
            'parent_item_colon'  => __( 'Parent Entity:', 'community-fabricator' ),
            'not_found'          => __( 'No Entity found.', 'community-fabricator' ),
            'not_found_in_trash' => __( 'No Entity found in Trash.', 'community-fabricator' )
        );

        $args = array(
            'labels'             => $labels,
            'description'        => __( 'Description.', 'community-fabricator' ),
            'public'             => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'query_var'          => true,
            'rewrite'            => array( 'slug' => 'entity' ),
            'cptp_permalink_structure' => '%postname%',
            'capability_type'    => 'post',
            'has_archive'        => true,
            'hierarchical'       => false,
            'menu_position'      => null,
            'menu_icon'          => 'dashicons-book-alt',
            'supports'           => array(
                'title',
                //'editor',
                //'author',
                //'thumbnail',
                //'excerpt',
                //'comments'
            )
        );

        register_post_type('entity', $args);
    }

    /**
     *
     */
    public function registerEntitiesPostType()
    {
        $entities = get_posts([
            'post_type' => 'entity',
        ]);

        foreach ($entities as $entity) {
            $labels = array(
                'name'               => _x( $entity->post_title, 'post type general name', 'community-fabricator' ),
                'singular_name'      => _x( $entity->post_title, 'post type singular name', 'community-fabricator' ),
                'menu_name'          => _x( $entity->post_title, 'admin menu', 'community-fabricator' ),
                'name_admin_bar'     => _x( $entity->post_title, 'add new on admin bar', 'community-fabricator' ),
                'add_new'            => _x( 'Add New', 'ads', 'community-fabricator' ),
                'add_new_item'       => __( 'Add New '.$entity->post_title, 'community-fabricator' ),
                'new_item'           => __( 'New '.$entity->post_title, 'community-fabricator' ),
                'edit_item'          => __( 'Edit '.$entity->post_title, 'community-fabricator' ),
                'view_item'          => __( 'View '.$entity->post_title, 'community-fabricator' ),
                'all_items'          => __( 'All '.$entity->post_title, 'community-fabricator' ),
                'search_items'       => __( 'Search '.$entity->post_title, 'community-fabricator' ),
                'parent_item_colon'  => __( 'Parent '.$entity->post_title.':', 'community-fabricator' ),
                'not_found'          => __( 'No '.$entity->post_title.' found.', 'community-fabricator' ),
                'not_found_in_trash' => __( 'No '.$entity->post_title.' found in Trash.', 'community-fabricator' )
            );

            $args = array(
                'labels'             => $labels,
                'description'        => __( 'Description.', 'community-fabricator' ),
                'public'             => true,
                'publicly_queryable' => true,
                'show_ui'            => true,
                'show_in_menu'       => true,
                'query_var'          => true,
                'rewrite'            => array( 'slug' => $entity->post_name ),
                'cptp_permalink_structure' => '%postname%',
                'capability_type'    => 'post',
                'has_archive'        => true,
                'hierarchical'       => false,
                'menu_position'      => null,
                'menu_icon'          => 'dashicons-category',
                'supports'           => array(
                    'title',
                    //'editor',
                    //'author',
                    //'thumbnail',
                    //'excerpt',
                    //'comments'
                )
            );

            register_post_type($entity->post_name, $args);
        }
    }

    /**
     * @param $metaBoxes
     */
    public function addEntityMetaBoxes($metaBoxes)
    {
        $metaBoxes[] = array(
            'id' => 'untitled',
            'title' => esc_html__( 'Untitled Metabox', 'metabox-online-generator' ),
            'post_types' => array('entity'),
            'context' => 'advanced',
            'priority' => 'default',
            'autosave' => 'false',
            'fields' => array(
                array(
                    'id' => 'textarea_1',
                    'type' => 'textarea',
                    'name' => esc_html__( 'Textarea', 'metabox-online-generator' ),
                ),
                array(
                    'id' => 'textarea_1_copy_1',
                    'type' => 'textarea',
                    'name' => esc_html__( 'Textarea', 'metabox-online-generator' ),
                ),
            ),
        );

        return $metaBoxes;
    }

    /**
     *
     */
    public function routeEntityAdd($query)
    {
        if ( is_admin() || ! $query->is_main_query() ){
            return;
        }

        if ($query->get('name') != 'add') {
            return;
        }

        $query->set('post_type', 'page');
        $query->set('is_home', false);

        return $query;
    }
}
