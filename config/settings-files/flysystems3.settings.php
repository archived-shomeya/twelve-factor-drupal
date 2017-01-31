<?php

/**
 * @file
 * Contains configuration for flysystem drivers.
 */

// Load .env file if it exists
if (file_exists(dirname(DRUPAL_ROOT) . '/.env')) {
  // Load environment
  $dotenv = new Dotenv\Dotenv(dirname(DRUPAL_ROOT));
  $dotenv->load();
}

$schemes = [
  's3' => [
    'driver' => 's3',
    'config' => [
      'key'    => getenv('S3_KEY'),
      'secret' => getenv('S3_SECRET'),
      'region' => getenv('S3_REGION'),
      'bucket' => getenv('S3_BUCKET'),
      'protocol' => 'https',
      'cname' => getenv('S3_CNAME'),
      'endpoint' => getenv('S3_ENDPOINT'),
    ],
    'cache' => TRUE,
    'serve_js' => TRUE,
    'serve_css' => TRUE,
  ]
];

$settings['flysystem'] = $schemes;
