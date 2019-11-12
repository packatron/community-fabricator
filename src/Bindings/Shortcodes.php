<?php
namespace Packatron\CommunityFabricator\Bindings;

use Javanile\Granular\Bindable;
use RWMB_Meta_Box_Registry;

class Shortcodes extends Bindable
{
    /**
     * @var array
     */
    public static $bindings = [
        'shortcode:entityadd' => 'entityAddShortcode',
        'shortcode:entityedit' => 'entityEditShortcode',
    ];

    /**
     *
     */
    public function entityAddShortcode()
    {
        $entity = 'project';

        return do_shortcode('
            [fu-upload-form 
                class="html-wrapper-class" 
                post_id="" 
                suppress_default_fields="true" 
                post_type="'.$entity.'" 
                form_layout="post" 
                title="Upload your media"]
                [input type="text" name="post_title" id="title" class="required" description="Title"]
                [textarea name="post_content" class="textarea" id="my-textarea" description="Description (optional)"]
                [input type="submit" class="submit btn btn-primary" value="Submit"]
            [/fu-upload-form]
        ');
    }

    /**
     *
     */
    public function entityEditShortcode()
    {
        $registry = rwmb_get_registry( 'meta_box' );

        $metaBox = $registry->get('metabox-entity-forum');

        $metaBox->set_object_id(22);
        $metaBox->show();

        return "AAA";
    }
}
