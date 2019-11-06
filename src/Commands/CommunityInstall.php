<?php
namespace Packatron\CommunityFabricator\Commands;

use WP_CLI;
use WP_CLI_Command;

class CommunityInstall extends WP_CLI_Command
{
    /**
     * @when before_wp_load
     */
    public function __invoke()
    {
        WP_CLI::line( "AA I don't need a WP install." );
    }

    /**
     * @when before_wp_load
     */
    public function early( $args, $assoc_args )
    {
        WP_CLI::line( "I don't need a WP install." );
    }

    /**
     * @param $args
     * @param $assoc_args
     */
    public function normal( $args, $assoc_args )
    {
        WP_CLI::line( "I need a WP install." );
    }
}
