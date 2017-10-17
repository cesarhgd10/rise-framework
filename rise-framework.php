<?php

/**
 * The framework bootstrap
 */


// Require composer autoload
require_once 'vendor/autoload.php';


define( 'APP_PATH', 'app/' );

define( 'HELPERS_PATH', APP_PATH . 'helpers/' );


/**
 * Require the frameworks helpers
 * @return [type] [description]
 */
function require_helpers() {
  require HELPERS_PATH . 'PostHelper.php';
}
add_action( 'init', 'require_helpers' );