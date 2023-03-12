<?php
class CalcSettingsPage
{
    // Contiene los valores que se utilizarán en los campos de devolución de llamada
    private $options;


    /**
     * Lo que ejecutamos al instanciar la clase:
     * admin_menu agrega una opción nueva al menú. Los detalles de esa 
     * nueva opción están en la function add_plugin_page
     * admin_init indica el contenido de la página de configuración.
     */
    public function __construct()
    {
        add_action( 'admin_menu', array( $this, 'add_plugin_page' ) );
        add_action( 'admin_init', array( $this, 'page_init' ) );
    }

    /**
     * Función que añade la opciones del menú, en este caso como un sub menú de ajustes.
     */
    public function add_plugin_page()
    {
        // This page will be under "Settings"
        add_options_page(
            'Calculator Admin', 
            'Calculator Admin', 
            'manage_options', 
            'calc-setting-admin', 
            array( $this, 'create_admin_page' )
        );
    }

    /**
     * Controlador de la página de configuración a la que llama la opción del menú.
     */
    public function create_admin_page()
    {
        // Set class property
        $this->options = get_option( 'calcUrlApi' );
        ?>
        <div class="wrap">
            <h1>Welcome to calculator plugin settings!</h1>
            <form method="post" action="options.php">
            <?php
                // This prints out all hidden setting fields
                settings_fields( 'my_option_group' );
                do_settings_sections( 'calc-setting-admin' );
                submit_button();
            ?>
            </form>
        </div>
        <?php
    }

    /**
     * Indica la sección que tendrá la página de configuración
     */
    public function page_init()
    {        
        register_setting(
            'my_option_group', // Grupo de opciones
            'calcUrlApi', // Nombre de la opción que queremos editar
            array( $this, 'sanitize' ) // Función que depura la información
        );

        add_settings_section(
            'calc-setting_section_id', // ID de la sección
            'Calculator plugin admin', // Título de la página
            array( $this, 'print_section_info' ), // Función que añade un texto explicativo
            'calc-setting-admin' // Nombre de la página
        );

        add_settings_field(
            'calcUrlApi', // Nombre de campo en base de datos
            'API URL', // Label del formulario
            array( $this, 'nombrePersona_callback' ), // Función que muestra el input
            'calc-setting-admin', // Nombre de la página en la que se muestra
            'calc-setting_section_id' // ID de la sección en la que se muestra
        );      
    }

    /**
     * Debuguear el dato es necesario.
     *
     * @param array $input Contiene todos los campos de configuración como claves de matriz
     */
    public function sanitize( $input )
    {
        $new_input = array();

        if( isset( $input['calcUrlApi'] ) )
            $new_input['calcUrlApi'] = sanitize_text_field( $input['calcUrlApi'] );

        return $new_input;
    }

    /** 
     * Función para añadir información a la página
     */
    public function print_section_info()
    {
        print 'Enter your settings below:';
    }

    /** 
     * Función para mostrar en input con la información de base de datos
     */
    public function nombrePersona_callback()
    {
        printf(
            '<input type="text" id="calcUrlApi" name="calcUrlApi[calcUrlApi]" value="%s" />',
            isset( $this->options['calcUrlApi'] ) ? esc_attr( $this->options['calcUrlApi']) : ''
        );
    }
}

if( is_admin() )
    $calc_my_settings_page = new CalcSettingsPage();