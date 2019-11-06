<?php
/**
 * @version 0.0.1
 */
/*
Plugin Name: Community Fabricator
Plugin URI: https://github.com/packatron/community-fabricator
Description: Get a new banana for your split.
Author: Packatron
Version: 0.0.1
Author URI: https://github.com/packatron
*/

require_once __DIR__.'/wp-cli.php';

require_once __DIR__.'/vendor/autoload.php';

use Packatron\CommunityFabricator\App;

$app = new App();

$app->run();
