<?php
// Load front-end assets.
add_action('wp_enqueue_scripts', 'slam_assets');

function slam_assets()
{
  $script_asset = include get_theme_file_path('public/js/index.asset.php');
  $style_asset = include get_theme_file_path('public/css/styles.asset.php');

  wp_enqueue_style('custom-google-fonts', '//fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@400;500;700&display=swap');

  wp_enqueue_style(
    'slam-style',
    get_theme_file_uri('public/css/styles.css'),
    $style_asset['dependencies'],
    $style_asset['version']
  );

  wp_enqueue_script(
    'slam-script',
    get_theme_file_uri('public/js/index.js'),
    $script_asset['dependencies'],
    $script_asset['version'],
    true
  );

  // wp_localize_script('main-studio_slam-js', 'studio_slamData', array(
  //   'root_url' => get_site_url(),
  //   'nonce' => wp_create_nonce('wp_rest')
  // ));
}

// Features
function studio_slam_features()
{
  register_nav_menu('slamMenu', 'Slam Menu');
  register_nav_menu('slamMenuEng', 'Slam Menu English');
  // add_theme_support('title-tag');
  // add_theme_support('post-thumbnails');
  add_image_size('slam-works-retina', 700, 1000, true);
  add_image_size('slam-works', 400, 225, true);
}

add_action('after_setup_theme', 'studio_slam_features');


// ACF JSON Save
function slam_acf_json_save_point($path)
{
  return get_stylesheet_directory() . '/inc/acf-json';
}
add_filter('acf/settings/save_json', 'slam_acf_json_save_point');

// ACF JSON Load
function slam_acf_json_load_point($paths)
{
  $paths[] = get_stylesheet_directory() . '/inc/acf-json';

  return $paths;
}
add_filter('acf/settings/load_json', 'slam_acf_json_load_point');
