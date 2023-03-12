<?php

/**

* Plugin Name: Calculator plugin
* Description: Este plugin ofrece una calculadora sencilla para realizar cálculos rápidos y fáciles en tu sitio web de WordPress. Fue desarrollado específicamente para una prueba de la empresa Izertis.
* Version: 1.0.0
* Requires PHP: 8.1
* Author: Fabian Espinosa -fabianEspinosa1988@gmail.com
* Author URI: https://www.linkedin.com/in/faehz/

*/

function calc_plugin_shortcode() {

    $settings = get_option('calcUrlApi');
    $a =  admin_url( 'admin.php?page=calc-setting-admin' );    
    $url = $settings['calcUrlApi']; 
    if (empty($url)) {
        return "<div style='
        background-color: blueviolet;
        color: white;
        padding: 0.5rem;
        text-align: center;
        font-size: 25px;
        font-family: monospace;
        border-radius: 1rem;
    '>Al parece no tienes un URL configurada, <a href=".$a.">haz clic acá</a>
    para configurar una.    
    </div>";
    }    
    
    wp_enqueue_script(
        "calc_plugin_js",
        plugin_dir_url(__FILE__) . "/build/index.js",
        [ "wp-element"],
        "0.1.0",
        true
    );    
    
    wp_enqueue_style(
        "calc_plugin_css",
        plugin_dir_url(__FILE__) . "/build/index.css"
    );

     // Add the settings to a global variable

    return "<div class='calc-plugin' calcUrl=".$url."></div>";

}

add_shortcode("calc-plugin", "calc_plugin_shortcode");


include(plugin_dir_path(__FILE__) . 'admin/configurations.php');

