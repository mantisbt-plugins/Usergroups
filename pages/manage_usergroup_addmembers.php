<?PHP
$groupid		= $_REQUEST['group_id'];
if (!isset($_POST['Return'])) {
	$f_user_id	= gpc_get_int_array( 'user_id', array() ); 
	foreach ( $f_user_id as $userid ) {
		$query = 'INSERT INTO {plugin_Usergroups_usergroup} ( group_id,user_id ) VALUES ( ' . db_param() . ' , ' . db_param() . ' )';
		db_query( $query, array( $groupid, $userid ) );
	}
}
print_header_redirect( 'plugin.php?page=Usergroups/config&?edit_id=".$groupid' );