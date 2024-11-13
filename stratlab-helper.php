<?php
/*
Plugin Name: StratLab Site Helper
Plugin URI: https://github.com/carterfromsl/stratlab-custom/
Description: A handy plugin for StratLab sites which allows us to roll out quick fixes to all websites at once.
Version: 1.0
Author: StratLab Marketing
Author URI: https://strategylab.ca
Text Domain: stratlab-custom
Requires at least: 6.0
Requires PHP: 7.0
Update URI: https://github.com/carterfromsl/stratlab-custom/
*/

// Check for updates from GitHub
require_once plugin_dir_path(__FILE__) . 'slGitHubUpdater.php';

if (is_admin()) {
    new slGitHubUpdater(__FILE__);
}

// Enqueue scripts and styles if the active theme is "enfold"
function stratlab_enqueue_custom_files() {
    if (wp_get_theme()->get('Name') === 'Enfold') {
        // Enqueue JavaScript file
        wp_enqueue_script(
            'stratlab-functions-js',
            plugin_dir_url(__FILE__) . 'js/functions.js',
            array(), // No dependencies
            filemtime(plugin_dir_path(__FILE__) . 'js/functions.js'), // Version based on file modification time
            true // Load in footer
        );

        // Enqueue CSS file
        wp_enqueue_style(
            'stratlab-enfold-custom-css',
            plugin_dir_url(__FILE__) . 'styles/enfold-custom.css',
            array(), // No dependencies
            filemtime(plugin_dir_path(__FILE__) . 'styles/enfold-custom.css') // Version based on file modification time
        );
    }
}
add_action('wp_enqueue_scripts', 'stratlab_enqueue_custom_files');
