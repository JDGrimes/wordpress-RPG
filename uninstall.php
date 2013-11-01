<?php
	if(WP_UNINSTALL_PLUGIN)
	{
		global $wpdb;
		$errors = array();
		if ($wpdb->query("DROP TABLE  `" . $wpdb->prefix . "rpg_usermeta` ") != FALSE) {
			if ($wpdb->query("DROP TABLE `" . $wpdb->prefix . "rpg_levels`") != FALSE) {
				update_option('WPRPG_rpg_installed', "0");
			} else {
				$errors[] = "You had an error occur! RPG_LEVELS wasn't DROPPED!<br />";
				$errors[] = $wpdb->last_error;
			}
		} else {
			$errors[] = "You had an error occur! USERMETA wasn't changed back!<br />";
			$errors[] = $wpdb->last_error;
		}
	}		
?>