<?php
namespace Packatron\CommunityFabricator\Bindings;

use Javanile\Granular\Bindable;
use Packatron\CommunityFabricator\Widgets\ContextWidget;

class Widgets extends Bindable
{
    /**
     * @var array
     */
    public static $bindings = [
        'action:widgets_init' => 'registerWidgets'
    ];

    /**
     *
     */
    public function registerWidgets()
    {
        register_widget(ContextWidget::class);
    }
}
