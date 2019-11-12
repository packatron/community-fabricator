<?php

require_once __DIR__.'/vendor/autoload.php';

//use WP_CLI;
use Packatron\CommunityFabricator\Commands\CommunityInstall;

WP_CLI::add_command('community install', CommunityInstall::class);
