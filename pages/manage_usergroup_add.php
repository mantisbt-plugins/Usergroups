<?PHP
$userid		= $_REQUEST['user_id'];
$groupid	= gpc_get_int_array( 'group_id', array() ); 
foreach ( $f_group_id as $groupid ) {
	$param	= [(int)$groupid, (int)$userid];	$query	= 'INSERT INTO {plugin_Usergroups_usergroup} ( group_id,user_id ) VALUES ( ' . db_param() . ', ' . db_param() . ')';
	$res	= db_query( $query, array ( $groupid, $userid ) );
}
$link='manage_user_edit_page.php?user_id='.$userid;
print_header_redirect( $link );