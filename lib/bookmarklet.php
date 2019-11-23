<?php

function mcluhan_create_table() {
  if ($_GET['create_table'] == 'yes') {
    global $wpdb;
    $table_name = 'gbl_bml_trackings';
    if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {
      $sql = "CREATE TABLE IF NOT EXISTS `$table_name` (
                `id` int(11) NOT NULL AUTO_INCREMENT,
                `link_id` varchar(100) NOT NULL,
                `user_name` varchar(100) DEFAULT '',
                `full_link` varchar(255) DEFAULT '',
                `target_link` varchar(255) DEFAULT '',
                `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
                `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                PRIMARY KEY (`id`),
                UNIQUE KEY `id` (`id`)
              ) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;";
      
      require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
      dbDelta( $sql );
    }
  }
} 
add_action( 'wp', 'mcluhan_create_table' );

function gbl_add_tracking() {
  header('Access-Control-Allow-Origin: *');
  global $wpdb;
  $link = urldecode($_REQUEST['link']);
  $data = array();

  if (!empty($link)) {
    $p = parse_url($link);
    parse_str($p["query"], $q);
    $data = array(
      'link_id'              => $q['id'],
      'user_name'            => $q['xcust'],
      'full_link'            => $link,
      'target_link'          => $q['url']
    );
    $wpdb->insert('gbl_bml_trackings', $data, array('%s', '%s', '%s', '%s'));
  }

  echo json_encode(array(status => 1, data => $data));
  die();
}
add_action( 'wp_ajax_nopriv_gbl_add_tracking', 'gbl_add_tracking' );
