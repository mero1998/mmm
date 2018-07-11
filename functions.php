<?php 

    /*
    ** Function To Add My Custom Styles
    ** wp_enqueue_style
    **
    */

    function marwan_add_style(){
        
        wp_enqueue_style('bootstrap-css' , get_template_directory_uri() . '/css/bootstrap.min.css');
        wp_enqueue_style('fontawesome-css' , get_template_directory_uri() . '/css/fontawesome.css');
        wp_enqueue_style('main' , get_template_directory_uri() . '/css/main.css');

        
    }


   /*
    ** Function To Add My Custom Scripts
    ** wp_enqueue_script
    **
    */

    function marwan_add_scripts(){
        
        // Remove Registeration For Old jQuery
        wp_deregister_script('jquery');  
        // Register A New jQuery In Footer
        wp_register_script('jquery', includes_url('/js/jquery/jquery.js' , false , '' , true));
        // Enqueue The New jQuery
        wp_enqueue_script('jquery');
        // Add Bootstrap File Script
        wp_enqueue_script('bootstrap-js' , get_template_directory_uri() . '/js/bootstrap.min.js' , array('jquery') , false , true);
        // Add Main File Script
        wp_enqueue_script('main-js' , get_template_directory_uri() . '/js/main.js' , array() , false , true);
        // Add html5shiv for old Browesrs
        wp_enqueue_script('html5shiv' , get_template_directory_uri() . '/js/html5shiv.js');
        // Add Conditional Comment For html5shiv
        wp_script_add_data('html5shiv' , 'conditional' , 'It IE 9');
        // Add respond for old Browesrs
        wp_enqueue_script('respond' , get_template_directory_uri() . '/js/respond.min.js');
        // Add Conditional Comment For Respond
        wp_script_add_data('respond' , 'conditional' , 'It IE 9');


    }

    /**
    * Add Custom Menu Support
    *
    **/

    
    function marwan_regeister_custom_menu(){
        // Register custom menu
        
        register_nav_menus(array(
        
                'bootstrap_menu' => 'Navgation Bar',
                'footer-menu'    => 'Footer Menu'
        
        ));
    }
    
    function marwan_bootstrap_menu(){
        
             wp_nav_menu(array(
             
                    'theme_location' => 'bootstrap_menu',
                    'menu' => 'marwan_bootstrap_menu',
                    'menu_id' => 'marwan_bootstrap_menu',
                    'menu_class' => 'nav navbar-nav navbar-right',
                    'container' => false
             
             ));
    }
     /*
    ** Add Action 
    **
    ** add_action()
    */
    
    // Add Css Styles
    add_action('wp_enqueue_scripts' , 'marwan_add_style');
    // Add js Scripts
    add_action('wp_enqueue_scripts' , 'marwan_add_scripts');
    // Register Custom Menu
    add_action('init' , 'marwan_regeister_custom_menu');