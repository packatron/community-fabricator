<?php
namespace Packatron\CommunityFabricator\Bindings;

use Javanile\Granular\Bindable;
use Packatron\CommunityFabricator\Helpers\Language;

class Entity extends Bindable
{
    /**
     * @var array
     */
    public static $bindings = [
        'action:init' => ['registerEntityPostType'],
        'filter:rwmb_meta_boxes' => ['addEntityMetaBoxes'],
        'action:post_updated:10:3' => ['postUpdated'],
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
            'public'             => false,
            'publicly_queryable' => false,
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
     * @param $metaBoxes
     */
    public function addEntityMetaBoxes($metaBoxes)
    {
        $entityOptions = [];
        $entities = get_posts([
            'post_type' => 'entity',
        ]);

        foreach ($entities as $entity) {
            $entityOptions[$entity->post_name] = $entity->post_title;
        }

        $metaBoxes[] = array(
            'id' => 'untitled',
            'title' => esc_html__( 'Entity Properties', 'community-fabricator' ),
            'post_types' => array('entity'),
            'context' => 'advanced',
            'priority' => 'default',
            'autosave' => 'false',
            'fields' => array(
                array(
                    'id' => 'plural_name',
                    'name' => esc_html__( 'Plural Name', 'community-fabricator' ),
                    'type' => 'text',
                    'desc' => esc_html__( 'Enable user to upload a featured image to entity', 'community-fabricator' ),
                    'std' => 'asd',
                ),
                array(
                    'id' => 'use_featured_image',
                    'name' => esc_html__( 'Use Featured Image', 'community-fabricator' ),
                    'type' => 'checkbox',
                    'desc' => esc_html__( 'Enable user to upload a featured image to entity', 'community-fabricator' ),
                ),
                array(
                    'id' => 'parent_entity',
                    'name' => esc_html__( 'Parent Entity', 'community-fabricator' ),
                    'type' => 'select',
                    'placeholder' => esc_html__( 'No Parent', 'community-fabricator' ),
                    'options' => $entityOptions,
                ),
                array(
                    'id' => 'fields',
                    'type' => 'textarea',
                    'name' => esc_html__( 'Fields', 'community-fabricator' ),
                    'class' => 'tab-support',
                ),
            ),
        );

        return $metaBoxes;
    }

    /**
     *
     */
    public function postUpdated($postId, $postAfter, $postBefore)
    {
        if (get_post_type($postId) != 'entity') {
            return;
        }

        Language::generateTranslations();
    }
}
