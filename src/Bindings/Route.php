<?php
namespace Packatron\CommunityFabricator\Bindings;

use Javanile\Granular\Bindable;

class Route extends Bindable
{
    /**
     * @var array
     */
    public static $bindings = [
        'action:pre_get_posts:1:1' => ['routeEntityAdd'],
    ];
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
