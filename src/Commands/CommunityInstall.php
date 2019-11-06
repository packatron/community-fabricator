<?php
/**
 *
 */

namespace Packatron\CommunityFabricator\Commands;

use WP_CLI;
use WP_CLI_Command;

class CommunityInstall extends WP_CLI_Command
{
    /**
     * @when before_wp_load
     */
    public function __invoke($args, $assoc_args)
    {
        /*
        $isInstalled = WP_CLI::runcommand('core is-installed', ['return' => 'all', 'exit_error' => false]);

        if ($isInstalled->return_code) {
            $command = "core install"
                . " --title='Community Fabricator'"
                . " --admin_user='admin'"
                . " --admin_email='admin@localhost.lan'"
                . " --admin_password='admin'";
            echo WP_CLI::runcommand($command, ['exit_error' => true]);
        }

        echo WP_CLI::runcommand('theme activate community-fabricator', ['exit_error' => true]);

        $plugins = [
            "meta-box",
            "community-fabricator",
            "frontend-uploader",
            "custom-post-type-permalinks",
            "loco-translate",
            "wp-login-flow"
        ];

        foreach ($plugins as $plugin) {
            echo WP_CLI::runcommand("plugin activate {$plugin}", ['exit_error' => true]);
        }

        echo WP_CLI::runcommand("rewrite structure '/post/%author%/%postname%/'", ['exit_error' => true]);
        */
        $activeWidgets = WP_CLI::runcommand('widget list left-sidebar --format=json', ['return' => true, 'parse' =>  'json','exit_error' => false]);

        if (!$activeWidgets) {
            echo WP_CLI::runcommand("widget add community-fabricator-context-widget left-sidebar", ['exit_error' => true]);
        }
    }
}
