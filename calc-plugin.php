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

    return "<div class='calc-plugin'></div>";

}

add_shortcode("calc-plugin", "calc_plugin_shortcode");