<?php
namespace Packatron\CommunityFabricator\Bindings;

use Javanile\Granular\Bindable;

class Language extends Bindable
{
    /**
     * @var array
     */
    public static $bindings = [
        'action:init:1' => ['init'],
    ];

    /**
     *
     */
    public function init()
    {
        if (!is_admin()) {
            $lang = $_SERVER['HTTP_ACCEPT_LANGUAGE'];
            $locale = 'en_US';

            if (preg_match('/[a-z]{2}[_-][A-Z]{2}/', $lang)) {
                $locale = strtr($lang, '-', '_');
            } elseif ($lang == 'it') {
                $locale = 'it_IT';
            }

            switch_to_locale($locale);
        }

        load_plugin_textdomain('community-fabricator', false, 'community-fabricator/languages');
    }
}
