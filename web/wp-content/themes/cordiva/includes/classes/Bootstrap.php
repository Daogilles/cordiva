<?php
/**
 * Created by PhpStorm.
 * User: gillesdaoduc
 * Date: 23/06/2015
 * Time: 15:37
 */


class BootstrapSite extends TimberSite {

    function __construct() {
        add_theme_support( 'post-formats' );
        add_theme_support( 'post-thumbnails' );
        add_theme_support( 'menus' );
        add_filter( 'timber_context', array( $this, 'add_to_context' ) );
        add_filter( 'get_twig', array( $this, 'add_to_twig' ) );
        parent::__construct();
    }

    function add_to_context( $context ) {

        global $sitepress;

        $context['tpl_dir'] = get_template_directory_uri();
        $context['content_url'] = content_url();
        $context['plugins_url'] = plugins_url();
        $context['admin_url'] = admin_url();
        $context['home_url'] = get_home_url();
        $context['img_dir'] = get_template_directory_uri().'/images';
        $context['link_decouvrir'] = get_permalink('11');
        $context['is_home'] = is_front_page();        
        $context['is_single'] = is_single();
       
        $context['main_menu'] = new TimberMenu('main-menu');        
        $context['footer_menu'] = new TimberMenu('footer-menu'); 
        
        return $context;
    }

    function add_to_twig( $twig ) {
        /* this is where you can add your own fuctions to twig */
        $twig->addExtension( new Twig_Extension_StringLoader() );
        $twig->addFilter( 'myfoo', new Twig_Filter_Function( 'myfoo' ) );
        return $twig;
    }


}