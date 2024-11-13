<?php
/*
Plugin Name: StratLab Site Helper
Plugin URI: https://github.com/carterfromsl/stratlab-helper/
Description: A handy plugin for StratLab sites which allows us to roll out quick fixes to all websites at once.
Version: 1.0.2
Author: StratLab Marketing
Author URI: https://strategylab.ca
Text Domain: stratlab-helper
Requires at least: 6.0
Requires PHP: 7.0
Update URI: https://github.com/carterfromsl/stratlab-helper/
*/

// Check for updates from GitHub
require_once plugin_dir_path(__FILE__) . 'slGitHubUpdater.php';

if (is_admin()) {
    new slGitHubUpdater(__FILE__);
}

// Enqueue scripts and styles
function stratlab_enqueue_files() {
    // Enqueue JavaScript file (always)
    wp_enqueue_script(
        'stratlab-functions-js',
        plugin_dir_url(__FILE__) . 'js/functions.js',
        array(), // No dependencies
        filemtime(plugin_dir_path(__FILE__) . 'js/functions.js'), // Version based on file modification time
        true // Load in footer
    );

    // Conditionally enqueue CSS file if the active theme is "Enfold"
    if (wp_get_theme()->get('Name') === 'Enfold') {
        wp_enqueue_style(
            'stratlab-enfold-custom-css',
            plugin_dir_url(__FILE__) . 'styles/enfold-custom.css',
            array(), // No dependencies
            filemtime(plugin_dir_path(__FILE__) . 'styles/enfold-custom.css') // Version based on file modification time
        );
    }
}
add_action('wp_enqueue_scripts', 'stratlab_enqueue_files');

// Enqueue admin UI CSS on the backend
function stratlab_enqueue_admin_styles() {
    wp_enqueue_style(
        'stratlab-admin-ui-css',
        plugin_dir_url(__FILE__) . 'styles/admin-ui.css',
        array(), // No dependencies
        filemtime(plugin_dir_path(__FILE__) . 'styles/admin-ui.css') // Version based on file modification time
    );
}
add_action('admin_enqueue_scripts', 'stratlab_enqueue_admin_styles');
