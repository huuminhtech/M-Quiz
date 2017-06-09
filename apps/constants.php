<?php
/**
 * MQuiz
 * @filename constants.php
 * @version 1.0.0
 * @author Nguyễn Hữu Minh
 * @copyright HuuMinh Information Technologies
 * #url http://www.huuminh.net/
 * @date 6/9/17
 */

defined('ABSPATH') OR exit('No direct script access allowed');

defined('MQUIZ_APPS_DIR') OR define('MQUIZ_APPS_DIR', MQUIZ_PLUGIN_DIR.'apps/');
defined('MQUIZ_PLGUIN_URL') OR define('MQUIZ_PLGUIN_URL', plugin_dir_url(MQUIZ_PLUGIN_FILE));
defined('MQUIZ_ADMIN_DIR') OR define('MQUIZ_ADMIN_DIR', MQUIZ_APPS_DIR.'admin/');
defined('MQUIZ_ADMIN_VIEW_DIR') OR define('MQUIZ_ADMIN_VIEW_DIR', MQUIZ_PLUGIN_DIR.'views/admin/');

?>