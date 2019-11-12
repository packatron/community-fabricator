<?php
/**
 *
 */

namespace Packatron\CommunityFabricator\Bindings;

use Javanile\Granular\Bindable;

class Post extends Bindable
{
    /**
     * @var array
     */
    public static $bindings = [
        'filter:the_title' => ['filterTitle'],
    ];

    /**
     *
     */
    public function filterTitle($title)
    {
        $title = str_replace(['Private: ', 'Privato: '], '', $title);

        return ucfirst($title);
    }
}
