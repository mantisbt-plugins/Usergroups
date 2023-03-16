<?PHP
require_once( '../../../core.php' );
require_once( config_get( 'plugin_path' ) . 'Usergroups' . DIRECTORY_SEPARATOR . 'Usergroups_api.php' );  

$reqVar = '_' . $_SERVER['REQUEST_METHOD'];
$form_vars = $$reqVar;
$edit_id = $form_vars['edit_id'] ;
$grp_table	= plugin_table('groups','Usergroups');
$basepad=config_get('path');
// get current values
$query = "SELECT * FROM $grp_table WHERE group_id = $edit_id ";
$result = db_query_bound($query);
$row = db_fetch_array( $result );
$name=$row['group_name'];
$desc=$row['group_desc'];
$mail=$row['group_mail'];
?>
<div class="col-md-12 col-xs-12">
<div class="space-10"></div>
<div class="form-container" > 
<br/>
<form name="groupmembers" method="post" >
<input type="hidden" name="edit_id" value="<?php echo $edit_id;  ?>">
<div class="widget-box widget-color-blue2">
<div class="widget-header widget-header-small">
	<h4 class="widget-title lighter">
		<i class="ace-icon fa fa-text-width"></i>
		<?php echo 'Usergroups : ' . lang_get( 'plugin_format_config' )?>
	</h4>
</div>
<div class="widget-body">
<div class="widget-main no-padding">
<div class="table-responsive"> 
<table class="table table-bordered table-condensed table-striped"> 
<tr class="row-category">
<td><div align="center"><?php echo lang_get( 'groupname' ); ?></div></td>
<td></td><td></td>
</tr>
<tr>
<td><div align="center"><strong>
<?php echo $name?>
</strong></td>
<td>
<a href="ugrp_addmembers.php?edit_id=<?php echo $row["group_id"]; ?>"><?php echo lang_get( 'addmembers' ) ?></a><br>

</td>
<tr>
<?php
print_group_member_list( $edit_id) ;
?>
<tr>
<td></td><td><input type="button" value="Close" onclick="self.close()"></td>
</tr>
</center>
</table>
</div>
</div>
</div>
</div>
</form>
</div>
</div>