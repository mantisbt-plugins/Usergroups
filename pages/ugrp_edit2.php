<?PHP
$edit_id			= gpc_get_int( 'edit_id' );
$desc		= $_REQUEST['group_desc'];
$mail		= $_REQUEST['group_mail'];
// perform update
$query = "UPDATE {plugin_Usergroups_groups} set group_desc = '$desc', group_mail= '$mail'  WHERE group_id = $edit_id";
$result = db_query($query);
print_header_redirect( 'plugin.php?page=Usergroups/config' );
