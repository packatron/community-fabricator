<?php
namespace Packatron\CommunityFabricator\Types;

use Javanile\Granular\Bindable;

class Entity extends Bindable
{
    /**
     * @var array
     */
    public static $bindings = [
        'action:init' => ['registerEntityPostType', 'registerEntitiesPostType'],
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
                'rewrite'            => array( 'slug' => 'entity' ),
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
     *
     */
    public function addMetaBox()
    {
        /*
        add_meta_box(
            'Entity-meta-box',
            __( 'Banners', 'sitepoint' ),
            [$this, 'renderMetaBox'],
            'Entity'
        );*/
    }

    /**
     *
     */
    public function getEntity($id)
    {
        /*
        $Entity = [
            'width' => get_post_meta($id, 'width', true) ?: 250,
            'height' => get_post_meta($id, 'height', true) ?: 250,
            'bannerId' => [],
            'bannerSrc' => [],
            'bannerLink' => [],
        ];

        for ($i = 0; $i < 3; $i++) {
            $Entity['bannerId'][$i] = get_post_meta($id, 'banner_id_'.$i, true) ?: '';
            $Entity['bannerSrc'][$i] = get_post_meta($id, 'banner_src_'.$i, true) ?: '';
            $Entity['bannerLink'][$i] = get_post_meta($id, 'banner_link_'.$i, true) ?: '';
        }

        return $Entity;*/
    }

    /**
     * @param $ads
     */
    public function renderMetaBox($Entity)
    {
        /*
        $Entity = $this->getEntity($Entity->ID);

        include __DIR__.'/../../templates/Entity-meta-box.php';*/
    }

    /**
     *
     */
    public function renderEntity($attr)
    {
        /*
        if (empty($attr['id']) ||
            get_post_status($attr['id']) != 'publish' ||
            get_post_type($attr['id']) != 'Entity') {
            return '';
        }

        $Entity = $this->getEntity($attr['id']);

        ob_start();

        include __DIR__.'/../../templates/Entity.php';

        return ob_get_clean();*/
    }

    /**
     *
     */
    public function wpEnqueueScripts()
    {
        /*
        wp_enqueue_script(
            'jquery-cycle-lite-js',
            plugins_url('../../assets/js/jquery.cycle.lite.js', __FILE__),
            array( 'jquery' )
        );*/
    }

    /**
     *
     */
    public function adminEnqueueScripts()
    {
        if (!is_admin()) {
            return;
        }

        wp_enqueue_media('media-upload');
        wp_enqueue_media('thickbox');

        wp_enqueue_script(
            'community-fabricator-Entity-admin-js',
            plugins_url('../../assets/js/Entity.admin.js', __FILE__),
            array('jquery','media-upload','thickbox')
        );

        wp_enqueue_style(
            'community-fabricator-admin-css',
            plugins_url('../../assets/css/admin.css', __FILE__)
        );
    }

    /**
     * @param bool $postId
     * @param bool $post
     */
    public function savePost($postId = false, $post = false)
    {
        if (wp_is_post_revision($postId) ||
            wp_is_post_autosave($postId) ||
            $post->post_type != 'Entity' ||
            $post->post_status == 'auto-draft') {
            return;
        }

        update_post_meta($postId, 'width', $_POST['Entity_width']);
        update_post_meta($postId, 'height', $_POST['Entity_height']);

        for ($i = 0; $i < 3; $i++) {
            update_post_meta($postId, 'banner_id_'.$i, $_POST['Entity_banner_id_'.$i]);
            update_post_meta($postId, 'banner_src_'.$i, $_POST['Entity_banner_src_'.$i]);
            update_post_meta($postId, 'banner_link_'.$i, $_POST['Entity_banner_link_'.$i]);
        }
    }
}
