<?PHP
########################################################
# Mantis Bugtracker Plugin Usergroups
#
# By Cas Nuy  www.nuy.info 2023
# To be used with Mantis 2.x
#
########################################################
require_once( config_get( 'plugin_path' ) . 'Usergroups' . DIRECTORY_SEPARATOR . 'Usergroups_api.php' );  
$reqVar = '_' . $_SERVER['REQUEST_METHOD'];
$form_vars = $$reqVar;
$edit_id = $form_vars['edit_id'] ;
// get current values
$query = "SELECT * FROM {plugin_Usergroups_groups} WHERE group_id = $edit_id ";
$result = db_query($query);
$row = db_fetch_array( $result );
$name=$row['group_name'];
layout_page_header( '');
layout_page_begin( 'config_page.php' );
print_manage_menu();
?>
<div class="col-md-12 col-xs-12">
<div class="space-10"></div>
<div class="form-container" > 
<br/>
<div class="widget-box widget-color-blue2">
<div class="widget-header widget-header-small">
	<h4 class="widget-title lighter">
		<i class="ace-icon fa fa-text-width"></i>
		<?php echo  'Usergroups : ' . lang_get( 'addmembers' )?>
	</h4>
</div>
<div class="widget-body">
<div class="widget-main no-padding">
<div class="table-responsive"> 
<table class="table table-bordered table-condensed table-striped"> 
<tr>
<td class="center" colspan="6">
<br>
<form method="post" action="plugin.php?page=Usergroups/manage_usergroup_addmembers.php">
<?php echo form_security_field( 'manage_user_group_addmembers' ) ?>
<input type="hidden" name="group_id" value="<?php echo $edit_id ?>" />
<table align="center" class="width50" cellspacing="1">
<tr valign="top">
<td class="category">
<?php echo $name ?>
</td></tr>
<tr><td>
<select name="user_id[]" multiple="multiple" size="20">
<?php 
print_member_option_list($edit_id) ;
?>
</select>
</td></tr>
<tr><td><input name="Add Selected" type="submit" value="Update"><input name="Return" type="submit" value="Cancel"></td>
</tr>
</table>
</form>