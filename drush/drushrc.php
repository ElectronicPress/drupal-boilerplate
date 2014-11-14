<?php

/**
 * Examples of valid statements for a drushrc.php file. Use this file to
 * cut down on typing of options and avoid mistakes.
 *
 * If you have some configuration options that are specific to a
 * particular version of drush, then you may place them in a file
 * called drush5rc.php.  The version-specific file is loaded in
 * addition to, and after, the general-purpose drushrc.php file.
 * Version-specific configuration files can be placed in any of the
 * locations specified above.
 *
 * IMPORTANT NOTE on configuration file loading:
 *
 * At its core, drush works by "bootstrapping" the Drupal environment
 * in very much the same way that is done during a normal page request
 * from the web server, so most drush commands run in the context
 * of a fully-initialized website.
 *
 * Configuration files are loaded in the reverse order they are
 * shown above.  All configuration files are loaded in the first
 * bootstrapping phase, but the configuration files stored at
 * a Drupal root or Drupal site folder will not be loaded in
 * instances where no Drupal site is selected.  However, they
 * _will_ still be loaded if a site is selected (either via
 * the current working directory or by use of the --root and
 * --uri options), even if the drush command being run does
 * not bootstrap to the Drupal Root or Drupal Site phase.
 * Note that this is different than Drush-4.x and earlier, which
 * did not load these configuration files until the Drupal site
 * was bootstrapped.
 *
 * The drush commands 'rsync' and 'sql-sync' are special cases.
 * These commands will load the configuration file for the site
 * specified by the source parameter; however, they do not
 * load the configuration file for the site specified by the
 * destination parameter, nor do they load configuration files
 * for remote sites.
 *
 * See `drush topic docs-bootstrap` for more information on how
 * bootstrapping affects the loading of drush configuration files.
 */

/**
 * Command-specific options
 */

// Taken from admin_menu.module.
$developer_modules = array(
  'admin_devel',
  'cache_disable',
  'coder',
  'content_copy',
  'context_ui',
  'debug',
  'delete_all',
  'demo',
  'devel',
  'devel_node_access',
  'devel_themer',
  'field_ui',
  'fontyourface_ui',
  'form_controller',
  'imagecache_ui',
  'journal',
  'l10n_client',
  'l10n_update',
  'macro',
  'rules_admin',
  'stringoverrides',
  'trace',
  'upgrade_status',
  'user_display_ui',
  'util',
  'views_ui',
  'views_theme_wizard',
);

// Set the options.
$command_specific = array(
  'rsync' => array('verbose' => TRUE),
  'pm-update' => array('notes' => TRUE),
  'pm-updatecode' => array('notes' => TRUE),
  'casperjs' => array(
    'test-root' => str_replace('drush', 'tests/casperjs', dirname(__FILE__)),
  ),
  'devify' => array(
    'enable-modules' => $developer_modules,
    'disable-modules' => array('varnish', 'memcache_admin'),
  ),
);

/**
 * Load local development override configuration, if available.
 *
 * Use drushrc.local.php to override Drush configuration on secondary (staging,
 * development, etc) installations of this site.
 *
 * Keep this code block at the end of this file to take full effect.
 */
if (file_exists(dirname(__FILE__) . '/drushrc.local.php')) {
  include_once dirname(__FILE__) . '/drushrc.local.php';
}
