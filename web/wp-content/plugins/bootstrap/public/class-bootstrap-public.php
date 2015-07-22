<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       www.cargocollective.com/daogilles
 * @since      1.0.0
 *
 * @package    Bootstrap
 * @subpackage Bootstrap/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Bootstrap
 * @subpackage Bootstrap/public
 * @author     Dao Duc Gilles <daogilles@gmail.com>
 */
class Bootstrap_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Bootstrap_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Bootstrap_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( 'main', get_template_directory_uri(  ) . '/styles/main.css', array(), $this->version, 'all' );
		wp_enqueue_style( 'fancybox', get_template_directory_uri(  ) . '/styles/jquery.fancybox.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Bootstrap_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Bootstrap_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( 'main', get_template_directory_uri() . '/scripts/bundle.js', array(), $this->version, false );
		wp_enqueue_script( 'slick', get_template_directory_uri() . '/scripts/slick/slick.js', array(), $this->version, false );
		wp_enqueue_script( 'fancybox', get_template_directory_uri() . '/scripts/jquery.fancybox.js', array(), $this->version, false );

	}

}
