<?php
namespace Packatron\CommunityFabricator;

use Javanile\Granular\Bindable;

class Shortcodes extends Bindable
{
    /**
     * @var array
     */
    public static $bindings = [
        'shortcode:entityadd' => 'entityAddShortcode'
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
                [input type="submit" class="btn" value="Submit"]
            [/fu-upload-form]
        ');
    }
}
