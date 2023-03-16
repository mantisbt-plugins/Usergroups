<?PHP
require_once( '../../../core.php' );

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
<form name="groupditing" method="post" action="<?php echo $basepad;?>plugins/Usergroups/pages/ugrp_edit2.php">
<div class="widget-box widget-color-blue2">
<div class="widget-body">
<div class="widget-main no-padding">
<div class="table-responsive"> 
<table class="table table-bordered table-condensed table-striped"> 
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
<tr>
<td></td><td><input name="Update" type="submit" value="Update">
<input type="button" value="Cancel" onclick="self.close()"></td>
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