<?php
/**
 * MQuiz
 * @filename install.php
 * @version 1.0.0
 * @author Nguyễn Hữu Minh
 * @copyright HuuMinh Information Technologies
 * #url http://www.huuminh.net/
 * @date 6/9/17
 */

defined('ABSPATH') OR exit('No direct script access allowed');

class MQuiz_Install
{
	public static function install()
	{
		global $wpdb;
		
		if ( ! is_blog_installed() ) {
			return;
		}
		
		if ( ! defined( 'MQUIZZ_INSTALLING' ) ) {
			define( 'MQUIZZ_INSTALLING', true );
		}
		
		self::create_tables();
	}
	
	private static function create_tables() {
		global $wpdb;

		$wpdb->hide_errors();

		require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

		dbDelta( self::get_schema() );
	}

	private static function get_schema() {
		global $wpdb;

		$collate = '';

		if ( $wpdb->has_cap( 'collation' ) ) {
			$collate = $wpdb->get_charset_collate();
		}

		$tables = "CREATE TABLE {$wpdb->prefix}mquiz_relationships (
  `relationship_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `quiz_id` bigint(20) NOT NULL,
  `question_id` bigint(20) NOT NULL,
  PRIMARY KEY (`relationship_id`)) 
  $collate;";

		return $tables;
	}
}

?>