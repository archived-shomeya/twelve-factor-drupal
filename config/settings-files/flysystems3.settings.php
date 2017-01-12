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

      // Optional configuration settings.

      // 'options' => [
      //   'ACL' => 'public-read',
      //   'StorageClass' => 'REDUCED_REDUNDANCY',
      // ],

      // 'protocol' => 'https',                   // Autodetected based on the
      // current request if not
      // provided.

      // 'prefix' => 'an/optional/prefix',        // Directory prefix for all
      // uploaded/viewed files.

      // 'cname' => 'static.example.com',         // A CNAME that resolves to
      // your bucket. Used for URL
      // generation.

      // 'endpoint' => 'https://api.example.com', // An alternative API endpoint
      // for 3rd party S3 providers.
    ],
    'cache' => TRUE,
    'serve_js' => TRUE,
    'serve_css' => TRUE,
  ]
];

$settings['flysystem'] = $schemes;
