<?php

/**
 * @file
 * Contains ability to have environment specific overrides for drupal settings and config.
 */

// Load .env file if it exists
if (file_exists(dirname(DRUPAL_ROOT) . '/.env')) {
  // Load environment
  $dotenv = new Dotenv\Dotenv(dirname(DRUPAL_ROOT));
  $dotenv->load();
}

// Get Environment from variable or settings
if (getenv('DRUPAL_ENV')) {
  $settings['DRUPAL_ENV'] = getenv('DRUPAL_ENV');
}
if (isset($settings['DRUPAL_ENV'])) {
  $drupal_env = $settings['DRUPAL_ENV'];
  if (file_exists(__DIR__ . "/env/$drupal_env/settings.php")) {
    include __DIR__ . "/env/$drupal_env/settings.php";
  }
}

// Load hash_salt
if (getenv('DRUPAL_HASH_SALT')) {
  $settings['hash_salt'] = getenv('DRUPAL_HASH_SALT');
}
