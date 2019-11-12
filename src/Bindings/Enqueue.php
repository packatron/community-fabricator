<?php
namespace Packatron\CommunityFabricator\Bindings;

use Javanile\Granular\Bindable;

class Enqueue extends Bindable
{
    /**
     * @var array
     */
    public static $bindings = [
        'action:admin_enqueue_scripts' => ['adminEnqueueScripts'],
    ];

    /**
     *
     */
    public function adminEnqueueScripts()
    {
        wp_enqueue_script(
            'textarea-tab-support',
            plugin_dir_url( __FILE__ ) . '../../assets/js/textarea-tab-support.js',
            array('jquery'),
            '1.0'
        );
    }
}
