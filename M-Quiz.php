<?php
/*
Plugin Name: M-Quiz
Plugin URI: https://huuminh.net/
Description: M-Quiz is a source web application to create and manage online quiz, test, exam on your web server. Copyright &copy; 2017 <a href="https://huuminh.net/">HuuMinh Information Technologies</a>.
Version: 1.0.0
Author: Minh Nguyen
Author URI: https://huuminh.net/
License: GPLv2 or later
Text Domain: huuminh
*/

defined('ABSPATH') OR exit('No direct script access allowed');

defined('MQUIZ_PLUGIN_FILE') OR define('MQUIZ_PLUGIN_FILE', __FILE__);
defined('MQUIZ_PLUGIN_DIR') OR define('MQUIZ_PLUGIN_DIR', dirname( __FILE__ ) . '/');

class MQuiz
{
	const VERSION = '1.0.0';
	
	public function __construct()
	{
		$this->includes();
		$this->init();
	}
	
	public function includes()
	{
		require_once( MQUIZ_PLUGIN_DIR."apps/constants.php" );
		require_once( MQUIZ_PLUGIN_DIR."apps/install.php" );
		require_once( MQUIZ_PLUGIN_DIR."apps/register_quiz_post_type.php" );
		require_once( MQUIZ_PLUGIN_DIR."apps/register_question_post_type.php" );
		
		if( is_admin( ) )
		{
			require_once( MQUIZ_PLUGIN_DIR."Apps/Admin/admin.php" );
		}
		
		do_action( 'mquiz_loaded' );
	}
	
	private function init()
	{
		register_activation_hook( __FILE__, array('MQuiz_Install', 'install' ));
	}
}

new MQuiz();

?>
