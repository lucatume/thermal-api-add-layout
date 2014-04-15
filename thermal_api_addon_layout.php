<?php
/**
 * Plugin Name: Thermal API Addon - Template
 * Plugin URI:  http://theaveragedev.com
 * Description: Adds the page template to the Thermal API response
 * Version:     0.1.0
 * Author:      theAverageDev (Luca Tumedei)
 * Author URI:  http://theaveragedev.com
 * License:     GPLv2+
 * Text Domain: thermal_template
 * Domain Path: /languages
 */

/**
 * Copyright (c) 2014 theAverageDev (Luca Tumedei) (email : luca@theaveragedev.com)
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License, version 2 or, at
 * your discretion, any later version, as published by the Free
 * Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 */

/**
 * Built using grunt-wp-plugin
 * Copyright (c) 2013 10up, LLC
 * https://github.com/10up/grunt-wp-plugin
 * template modified by theAverageDev (Luca Tumedei) to use classes and
 * autoloading
 */

// Useful global constants
define('THETHERMAL_LAYOUT_VERSION', '0.1.0');
define('THETHERMAL_LAYOUT_URL', plugin_dir_url( __FILE__ ));
define('THETHERMAL_LAYOUT_PATH', dirname( __FILE__ ) . '/');

function thermal_add_template_slug($data, $post){
    // slug will be '' for default page template
    // false if the post is not a page
    // a string otherwise
    $slug = get_page_template_slug($post->ID);
    if ($slug or $slug == '') {
        // data is an object, cast to array
        $data = (array)$data;
        if ($slug == '') {
            $slug = 'default';
        } 
        $data['template'] = $slug;
    }
    return (object)$data;
}

// hook into the filter to add the template
if (function_exists('add_filter')) {
    // the filter defined in the api/v1/controllers/Posts.php file

    // add the template data
    $tag = 'thermal_post_entity';
    $function = 'thermal_add_template_slug';
    $accepted_args = 2;
    // hook late to allow the Thermal API plugin to load
    $priority =  1000;
    add_filter( $tag, $function, $priority, $accepted_args );
}
