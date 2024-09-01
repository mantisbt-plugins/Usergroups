<?PHP
require_once( 'core.php' );
$name		= $_REQUEST['group_name'];
$desc		= $_REQUEST['group_desc'];
$mail		= $_REQUEST['group_mail'];
// first check if entry already exists
$query= "select * from {plugin_Usergroups_groups} where upper(trim(group_name))=upper(trim('$name'))";
$result = db_query($query);
$res2=db_num_rows($result);
if ($res2 == 0){
	$query = 'INSERT INTO {plugin_Usergroups_groups} ( group_name,group_desc,group_mail ) VALUES ( ' . db_param() . ', ' . db_param() . ', ' . db_param() . ')';
	if( !db_query($query, array( $name, $desc, $mail ) ) ){ 
		trigger_error( ERROR_USERGROUP_EXISTS, ERROR );
	}
}
print_header_redirect( 'plugin.php?page=Usergroups/config' );
