<?php
namespace Packatron\CommunityFabricator\Helpers;

class Http
{
    /**
     *
     */
    public static function getCurrentUrl()
    {
        global $wp;

        return add_query_arg( $_SERVER['QUERY_STRING'], '', home_url($wp->request));
    }
}


