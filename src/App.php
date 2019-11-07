<?php
namespace Packatron\CommunityFabricator;

use Javanile\Granular\Autoload;

class App extends Autoload
{
    /**
     *
     */
    public function run()
    {
        // autoload bindable classes
        $this->autoload(__NAMESPACE__.'\\Bindings', __DIR__.'/Bindings');

        // bind init method as action init
        $this->bind('action:init:1', 'init');
        $this->bind('filter:show_admin_bar', 'disableAdminBar');
    }

    /**
     *
     */
    public function init()
    {
        load_plugin_textdomain('community-fabricator', false, 'community-fabricator/languages');
    }

    /**
     *
     */
    public function disableAdminBar()
    {
        return false;
    }
}
