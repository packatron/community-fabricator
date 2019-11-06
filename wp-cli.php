<?php

require_once __DIR__.'/vendor/autoload.php';

use Packatron\CommunityFabricator\Commands\CommunityInstall;

WP_CLI::add_command('community install', CommunityInstall::class);
