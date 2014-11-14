<?php

/**
 * @file
 * Default drush aliases.drushrc.php file.
 */

/**
 * These are the default configuration so that
 * everyone can just overwrite the different settings.
 */

$aliases['dev'] = array(
  'uri' => 'example.lan',
  'root' => str_replace('drush/aliases', 'docroot', dirname(__FILE__)),
);

$aliases['stage'] = array(
  'uri' => 'stage.example.com',
  'root' => '/var/www/html/stage.example.com/docroot',
  'remote-host' => 'example.com',
  'remote-user' => 'user',
  'ssh-options' => '-p 1234',
);

$aliases['live'] = array(
  'uri' => 'example.com',
  'root' => '/var/www/html/stage.example.com/docroot',
  'remote-host' => 'example.com',
  'remote-user' => 'user',
  'ssh-options' => '-p 1234',
);
