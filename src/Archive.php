<?php
namespace Packatron\CommunityFabricator;

use Javanile\Granular\Bindable;

class Archive extends Bindable
{
    /**
     * @var array
     */
    public static $bindings = [
        'filter:get_the_archive_title' => ['filterTitle'],
    ];

    /**
     *
     */
    public function filterTitle($title)
    {
        global $wp_query;

        if ( is_post_type_archive() ) {
            $title = "AA";
        } elseif ( is_category() ) {
            $title = single_cat_title( '', false );
        } elseif ( is_tag() ) {
            $title = single_tag_title( '', false );
        } elseif ( is_author() ) {
            $title = '<span class="vcard">' . get_the_author() . '</span>' ;
        }

        return $title;
    }
}
