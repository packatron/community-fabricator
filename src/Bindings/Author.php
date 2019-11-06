<?php
namespace Packatron\CommunityFabricator\Bindings;

use Javanile\Granular\Bindable;

class Entity extends Bindable
{
    /**
     * @var array
     */
    public static $bindings = [
        'filter:the_author' => ['theAuthor'],
    ];

    /**
     *
     */
    public function theAuthor($displayName)
    {
        return ucwords($displayName);
    }
}
