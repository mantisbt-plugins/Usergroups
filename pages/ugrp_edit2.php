<?PHP
//require_once( '../../../core.php' );
$edit_id			= gpc_get_int( 'edit_id' );
$grp_table	= plugin_table('groups','Usergroups');
$desc		= $_REQUEST['group_desc'];
$mail		= $_REQUEST['group_mail'];

// perform update
$query = "UPDATE $grp_table set group_desc = '$desc', group_mail= '$mail'  WHERE group_id = $edit_id";
$result = db_query($query);
print_header_redirect( 'plugin.php?page=Usergroups/config' );

