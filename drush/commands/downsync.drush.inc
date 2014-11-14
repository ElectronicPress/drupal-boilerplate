<?php

/**
 * @file
 * Downsync command for Drush
 */

/**
 * Implements hook_drush_command().
 */
function downsync_drush_command() {
  $items = array();
  $items['downsync'] = array(
    'description' => "Sync one environment's db and files to another.",
    'arguments' => array(
      'source-alias' => 'Alias of the source site to copy from.',
      'destination-alias' => 'Alias of the destination site to copy to.',
    ),
    'examples' => array(
      'drush downsync @prod @local' => 'sql-sync the database and rsync the files from @prod to @local',
    ),
    'aliases' => array('dsync'),
    'bootstrap' => DRUSH_BOOTSTRAP_DRUSH,
    'drush dependencies' => array('sql', 'core'),
  );
  return $items;
}

/**
 * Actual function run by the downsync command.
 */
function drush_downsync($source = NULL, $destination = NULL) {
  // Execute a drush sql-sync
  print dt('SQL Sync running... NOTE: if you do not have ssh passwordless logins setup, you may be asked for your password multiple times.');
  drush_invoke('sql-sync', array($source, $destination));

  // Rsync the files.
  print dt('Rsync-ing files...');
  drush_invoke('rsync', array($source . ':%files', $destination . ':%files'));
}
