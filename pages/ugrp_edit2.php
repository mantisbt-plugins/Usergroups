<?PHP
$edit_id			= gpc_get_int( 'edit_id' );
$desc		= $_REQUEST['group_desc'];
$mail		= $_REQUEST['group_mail'];
// perform update
$param = [$desc, $mail};
$query = "UPDATE{plugin_Usergroups_groups} set group_desc = " . db_param() . ", group_mail= " . db_param() . "  WHERE group_id = $edit_id";
$result = db_query($query);
print_header_redirect( 'plugin.php?page=Usergroups/config' );
