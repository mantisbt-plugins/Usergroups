<?PHP
$reqVar = '_' . $_SERVER['REQUEST_METHOD'];
$form_vars = $$reqVar;
$delete_id = $form_vars['delete_id'] ;
$group_id = $form_vars['group_id'] ;
$query = "DELETE FROM {plugin_Usergroups_usergroup} WHERE user_id = $delete_id and group_id=$group_id";        
db_query($query);
print_header_redirect( 'plugin.php?page=Usergroups/config' );