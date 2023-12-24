<?PHP
$groupid	= $_REQUEST['group_id'];
$userid		= $_REQUEST['user_id'];
$query = "DELETE FROM {plugin_Usergroups_usergroups} WHERE group_id = $groupid and user_id=$userid";        
db_query($query);
$link='manage_user_edit_page.php?user_id='.$userid;
print_header_redirect( $link );