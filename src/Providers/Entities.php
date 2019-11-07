<?php
/**
 *
 */

namespace Packatron\CommunityFabricator\Providers;

class Entities
{
    /**
     *
     */
    public static function getAll()
    {
        $entities = get_posts([
            'post_type' => 'entity',
        ]);

        return $entities;
    }
}
