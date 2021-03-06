<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://bit.ly/Stray_Taco
 * @since      1.0.0
 *
 * @package    League_Wftda_Ranking
 * @subpackage League_Wftda_Ranking/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    League_Wftda_Ranking
 * @subpackage League_Wftda_Ranking/admin
 * @author     Mike Straw (aka Stray Taco) <stray.taco@ohiorollerderby.com>
 */
class League_Wftda_Ranking_Admin {

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
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in League_Wftda_Ranking_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The League_Wftda_Ranking_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/league-wftda-ranking-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in League_Wftda_Ranking_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The League_Wftda_Ranking_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/league-wftda-ranking-admin.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * Display the admin page
	 * 
	 * @since 1.0.0
	 */
	public function display_admin_page()
	{
		if (!current_user_can( 'manage_options' )) {
			return;
		}
		include_once(plugin_dir_path( __FILE__ ) . 'partials/league-wftda-ranking-admin-display.php');
	}

	/**
	 * Create hook for the admin page
	 * 
	 * @since 1.0.0
	 */
	public function add_admin_page() {
		add_options_page( 'League WFTDA Rankings', 'League WFTDA Rankings', 'manage_options', 'league-wftda-ranking', array($this, 'display_admin_page'));
	}
}
