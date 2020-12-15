<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       wpvue
 * @since      1.0.0
 *
 * @package    Wpvue
 * @subpackage Wpvue/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Wpvue
 * @subpackage Wpvue/public
 * @author     Sherif <ghozdev@gmail.com>
 */
class Wpvue_Public {

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
	private function is_develop_serve()
{
   $connection = @fsockopen('localhost', '8080');

   if ( $connection ) {
      return true;
   }

   return false;
}
	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		if ( $this->is_develop_serve() ) {
		   wp_enqueue_script( $this->plugin_name  . '_dev', 'http://localhost:8080/js/app.js', [], $this->version, false );
		} else {
		   wp_enqueue_script( $this->plugin_name . '_chunks', plugin_dir_url( __DIR__ ) . 'dist/js/chunk-vendors.js', [], $this->version, false );
		   wp_enqueue_script( $this->plugin_name, plugin_dir_url( __DIR__ ) . 'dist/js/app.js', [], $this->version, false );
		}
	 
	 }
	 public function enqueue_styles() {
	 
		if ( $this->is_develop_serve() ) {
		   wp_enqueue_style( $this->plugin_name . '_dev', 'http://localhost:8080/css/app.css', [], $this->version, 'all' );
		} else {
		   wp_enqueue_style( $this->plugin_name, plugin_dir_url( __DIR__ ) . 'dist/css/app.css', [], $this->version, 'all' );
		}
	 
	 }

}
