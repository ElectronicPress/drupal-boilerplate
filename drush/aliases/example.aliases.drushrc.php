<?php

/**
 * @file
 * Default drush aliases.drushrc.php file.
 */

/**
 * These are the default configuration so that
 * everyone can just overwrite the different settings.
 */

// Project identification.
$site = '';
$url  = '';
$opts = '';
$user = '';

// Common settings.
$path_prefix = '/var/www/html/';
$path_suffix = '/docroot';
$path = $path_prefix . $url . $path_suffix;

// Development environment.
$aliases['dev'] = array(
  'uri' => $site . '.emh.ds9.e9p.net',
  'root' => $path,
);

// Staging environment(s).
$aliases['stage'] = array(
  'parent' => '@dev',
  'uri' => $site . '.archer.e9p.net',
  'remote-host' => 'archer.e9p.net',
  'remote-user' => $user,
  'ssh-options' => $opts,
);

// Production environment(s).
$aliases['prod'] = array(
  'parent' => '@stage',
  'uri' => $site . '.picard.e9p.net',
  'remote-host' => 'picard.e9p.net',
);
