<?PHP
$userid		= $_REQUEST['user_id'];
$f_group_id	= gpc_get_int_array( 'group_id', array() ); 
foreach ( $f_group_id as $groupid ) {
	$query	= "INSERT INTO {plugin_Usergroups_usergroup} ( group_id,user_id ) VALUES ( $f_group_id, $userid)";
	$res	= db_query($query);
}
$link='manage_user_edit_page.php?user_id='.$userid;
print_header_redirect( $link );
