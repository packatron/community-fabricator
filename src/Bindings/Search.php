<?php
/**
 *
 */

namespace Packatron\CommunityFabricator\Bindings;

use Javanile\Granular\Bindable;

class Search extends Bindable
{
    /**
     * @var array
     */
    public static $bindings = [
        'filter:pre_get_posts' => ['preGetPosts'],
    ];

    /**
     *
     */
    public function preGetPosts($query)
    {
        /*
        if ( is_admin() || ! $query->is_main_query() ) {
            return;
        }

        if ( $query->is_search() ) {
            var_dump("AA");
            $query->set(
                'post_type',
                array( 'post', 'page', 'oraganization' )
            );
        }
        */
    }
}
