<?PHP
########################################################
# Mantis Bugtracker Plugin Usergroups
#
# By Cas Nuy  www.nuy.info 2023
# To be used with Mantis 2.x
#
########################################################
$reqVar = '_' . $_SERVER['REQUEST_METHOD'];
$form_vars = $$reqVar;
$edit_id = $form_vars['edit_id'] ;
// get current values
$query = "SELECT * FROM {plugin_Usergroups_groups} WHERE group_id = $edit_id ";
$result = db_query($query);
$row = db_fetch_array( $result );
$name=$row['group_name'];
$desc=$row['group_desc'];
$mail=$row['group_mail'];
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
		<?php echo  'Usergroups : ' . lang_get( 'editgroup' )?>
	</h4>
</div>
<div class="widget-body">
<div class="widget-main no-padding">
<div class="table-responsive"> 
<table class="table table-bordered table-condensed table-striped"> 
<tr>
<td class="center" colspan="6">
<br>
<?php 
$colspan=4;
?>
<form name="groupditing" method="post" action="plugin.php?page=Usergroups/ugrp_edit2.php">
<div class="widget-box widget-color-blue2">
<div class="widget-body">
<div class="widget-main no-padding">
<div class="table-responsive"> 
<input type="hidden" name="edit_id" value="<?php echo $edit_id;  ?>">
<tr class="row-category">
<td><div align="center"><?php echo lang_get( 'groupname' ); ?></div></td>
<td><div align="center"><?php echo lang_get( 'groupdesc' ); ?></div></td>
<td><div align="center"><?php echo lang_get( 'groupmail' ); ?></div></td>
</tr>
<tr>
<td><div align="center">
<?php echo $name?>
</td>
<td><div align="center">
<input name="group_desc" type="text" size=50 maxlength=50 value = "<?php echo $desc ?>">
</td>
<td><div align="center">
<input name="group_mail" type="text" size=50 maxlength=50 value = "<?php echo $mail ?>">
</td>
</tr>
<tr>
<td></td><td><input name="Update" type="submit" value="Update">
	<a href="plugin.php?page=Usergroups/config">Cancel</a>
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