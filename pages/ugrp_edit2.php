<?PHP
$edit_id	= gpc_get_int( 'edit_id' );
$desc		= $_REQUEST['group_desc'];
$mail		= $_REQUEST['group_mail'];
// perform update
$query = 'UPDATE {plugin_Usergroups_groups} set group_desc = ' . db_param() . ', group_mail= ' . db_param() . '  WHERE group_id = ' . db_param() . '';
$result = db_query( $query, array( $desc, $mail, $edit_id ) );
print_header_redirect( 'plugin.php?page=Usergroups/config' );