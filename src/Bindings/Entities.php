<?php
namespace Packatron\CommunityFabricator\Bindings;

use Javanile\Granular\Bindable;
use Symfony\Component\Yaml\Yaml;

class Entities extends Bindable
{
    /**
     * @var array
     */
    public static $bindings = [
        'action:init' => ['registerEntitiesPostType'],
        'filter:rwmb_meta_boxes' => ['addEntitiesMetaBoxes'],
    ];

    /**
     *
     */
    public function registerEntitiesPostType()
    {
        $entities = get_posts([
            'post_type' => 'entity',
        ]);

        foreach ($entities as $entity) {
            $supports = array(
                'title',
                //'editor',
                //'author',
                //'thumbnail',
                //'excerpt',
                //'comments'
            );

            if (get_post_meta($entity->ID, 'use_featured_image', true)) {
                $supports[] = 'thumbnail';
            }

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
                'exclude_from_search' => false,
                'hierarchical'       => false,
                'menu_position'      => null,
                'menu_icon'          => 'dashicons-category',
                'supports'           => $supports,
            );

            register_post_type($entity->post_name, $args);
        }
    }

    /**
     * @param $metaBoxes
     */
    public function addEntitiesMetaBoxes($metaBoxes)
    {
        $entityOptions = [];
        $entities = get_posts([
            'post_type' => 'entity',
        ]);

        foreach ($entities as $entity) {
            try {
                $fields = Yaml::parse(str_replace("\t", "    ", get_post_meta($entity->ID, 'fields', true)));
            } catch (\Throwable $exception) {
                $fields = [];
            }
            if (!$fields || !is_array($fields)) {
                $fields = [];
            }
            $metaBoxes[] = array(
                'id' => 'metabox-entity-'.$entity->post_name,
                'title' => esc_html__( 'Entity Properties', 'community-fabricator' ),
                'post_types' => array($entity->post_name),
                'context' => 'advanced',
                'priority' => 'default',
                'autosave' => 'false',
                'fields' => $fields,
            );
        }

        return $metaBoxes;
    }
}
