<?php
# list of groups that a user is NOT in
function print_group_user_list_option_list2( $p_user_id ) {
	$c_user_id = db_prepare_int( $p_user_id );
	$query = "SELECT group_id,group_name FROM {plugin_Usergroups_groups} ORDER BY group_name";
	$result = db_query( $query );
	$category_count = db_num_rows( $result );
	for( $i = 0;$i < $category_count;$i++ ) {
		$row = db_fetch_array( $result );
		$t_group_id = $row['group_id'];
		$t_group_name = $row['group_name'];
		$sql2 = "select * from {plugin_Usergroups_usergroup} where user_id=$c_user_id and group_id=$t_group_id";
		$result2 = db_query($sql2);
		$res2=db_num_rows($result2);
		if ($res2 == 0){
			echo "<option value=\"$t_group_id\">$t_group_name</option>";
		}
	}
}

# list of groups that a user is in
function print_group_user_list( $p_user_id, $p_include_remove_link = true ) {
	$c_user_id = db_prepare_int( $p_user_id );
	$query = "SELECT DISTINCT p.group_id, p.group_name, p.group_desc
				FROM {plugin_Usergroups_groups} p, {plugin_Usergroups_usergroup} u
				WHERE u.group_id = p.group_id and u.user_id= $c_user_id ORDER BY p.group_name";
	$result = db_query( $query );
	$category_count = db_num_rows( $result );
	for( $i = 0;$i < $category_count;$i++ ) {
		$row = db_fetch_array( $result );
		$t_group_id = $row['group_id'];
		$t_group_name = string_attribute( $row['group_name'] );
		$t_group_desc = string_attribute( $row['group_desc'] );
		if( $p_include_remove_link && access_has_global_level( config_get( 'manage_user_threshold' ) )) {
			?>
			<a href="plugin.php?page=Usergroups/manage_usergroup_delete.php&group_id=<?php echo $t_group_id; ?>&user_id=<?php echo $p_user_id ?>"><?php echo lang_get( 'groupdelete' ) ?></a>
			<?php
			echo $t_group_name;
			echo " / ";
			echo $t_group_desc;
		}	
		echo '<br />';
	}
}
 
# print memberlist of group
function print_group_member_list( $p_group_id ) {
	$c_group_id = db_prepare_int( $p_group_id );
	$query = "SELECT DISTINCT user_id,username,realname FROM {plugin_Usergroups_groups} p, {plugin_Usergroups_usergroup} u, {user} v WHERE u.group_id = p.group_id and p.group_id= $c_group_id and u.user_id=v.id ORDER BY username" ;
	$result = db_query( $query );
	$count = db_num_rows( $result );
	for( $i = 0;$i < $count;$i++ ) {
		$row = db_fetch_array( $result );
		$username = $row['username'];
		$user_id = $row['user_id'];
		$realname = $row['realname'];
		echo "<tr /><td />" ;
		echo $username;
		echo  "</td /><td />" ;
		echo $realname ;
		echo  "</td /><td />" ;		
		?>
		<a href="plugin.php?page=Usergroups/ugrp_deletemember.php&delete_id=<?php echo $user_id; ?>&group_id=<?php echo $c_group_id; ?>"><?php echo lang_get( 'groupmemberdelete' ) ?></a>
		<?php
		echo "</td /></tr />" ;
	}
}

# 
# This populates an option list with the appropriate users by access level
#
# @todo from print_reporter_option_list
function print_member_option_list( $group_id ) {
	$t_projects = project_cache_all();
	# Get list of users having access level for all accessible projects
	$query = "SELECT id, username, realname FROM {user}	WHERE enabled = 1 order by realname";
	$result = db_query( $query ); 
	$count = db_num_rows( $result );
	for( $i = 0;$i < $count;$i++ ) {
		$row = db_fetch_array( $result );
		$user_id = $row['id'];
		$realname = $row['realname'];
		$sql2 = "select * from {plugin_Usergroups_usergroup} where user_id=$user_id and group_id=$group_id";
		$result2 = db_query($sql2);
		$res2=db_num_rows($result2);
		if ($res2 == 0){
			echo '<option value="' . $user_id . '" ';
			echo '>' . $realname . '</option>';
		} 
	}
} 
