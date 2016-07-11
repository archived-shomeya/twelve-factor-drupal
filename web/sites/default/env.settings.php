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
