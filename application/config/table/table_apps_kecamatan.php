<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

$table_list				= array(
							//	BACKUP		//
							'kecamatan'						=> 'kecamatan',
							'backup_restore_history'				=> 'backup_restore_history',
							'backup_download_history'				=> 'backup_download_history',
							);

$config['table']		= array_merge($config['table'], $table_list);