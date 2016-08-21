<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/*
  | -------------------------------------------------------------------------
  | Hooks
  | -------------------------------------------------------------------------
  | This file lets you define "hooks" to extend CI without hacking the core
  | files.  Please see the user guide for info:
  |
  |	https://codeigniter.com/user_guide/general/hooks.html
  |
 */
$hook['post_controller_constructor'][] = array(
    'class' => '',
    'function' => 'setViewed',
    'filename' => 'auto_load_prefix.php',
    'filepath' => 'hooks'
);

//$hook['post_controller_constructor'][] = array(
//    'class' => '',
//    'function' => 'load_config',
//    'filename' => 'auto_load_prefix.php',
//    'filepath' => 'hooks'
//);
$hook['post_controller_constructor'][] = array(
    'class' => '',
    'function' => 'load_encode',
    'filename' => 'auto_load_prefix.php',
    'filepath' => 'hooks'
);