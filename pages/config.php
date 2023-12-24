<?php	
########################################################
# Mantis Bugtracker Plugin Usergroups
#
# By Cas Nuy  www.nuy.info 2023
# To be used with Mantis 2.x
#
########################################################
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
		<?php echo  'Usergroups : ' . lang_get( 'plugin_format_config' )?>
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
<tr>
<td colspan="<?php echo $colspan ?>" class="row-category"><div align="left"><a name="grouprecord"></a>
<?php 
echo lang_get( 'allgroups' ); 
?>
<form name="config"  action="<?php echo plugin_page( 'ugrp_add' ) ?>" method="post"> 
</div>
</td>
</tr>
<tr class="row-category">
<td><div align="center"><?php echo lang_get( 'groupname' ); ?></div></td>
<td><div align="center"><?php echo lang_get( 'groupdesc' ); ?></div></td>
<td><div align="center"><?php echo lang_get( 'groupmail' ); ?></div></td>
<td><div align="center"><?php echo lang_get( 'groupactions' ); ?></div></td>
</tr>
<tr>
<td><div align="center">
<input name="group_name" type="text" maxlength=10 >
</td>
<td><div align="center">
<input name="group_desc" type="text" maxlength=50 >
</td>
<td><div align="center">
<input name="group_mail" type="text" maxlength=50 >
</td>
<td><div align="center">
<input type="submit" class="btn btn-primary btn-white btn-round" value="<?php echo lang_get( 'groupsubmit' )?>" />
</td>
</td>
</form>
</tr>

<?php
# Pull all group-Record entries 
$query = "SELECT * FROM {plugin_Usergroups_groups} order by group_name";
$result = db_query($query);
while ($row = db_fetch_array($result)) {
	?>
	<tr >
	<td><div align="center">

	<a href="plugin.php?page=Usergroups/ugrp_show.php&edit_id=<?php echo $row["group_id"]; ?>"><?php echo $row['group_name']?></a>
	</td>
	<td><div align="center"><?php  echo $row["group_desc"]; ?></td>
	<td><div align="center"><?php  echo $row["group_mail"]; ?></td>
	<td><div align="center">
	<a href="plugin.php?page=Usergroups/ugrp_delete.php&delete_id=<?php echo $row["group_id"]; ?>"><?php echo lang_get( 'groupdelete' ) ?></a>
	<===> 
	<a href="plugin.php?page=Usergroups/ugrp_edit.php&edit_id=<?php echo $row["group_id"]; ?>"><?php echo lang_get( 'groupedit' ) ?></a><br>
	</td>
	</tr>
	<?php
}	 
?>
</table>
<div class="table-responsive"> 
<table class="table table-bordered table-condensed table-striped"> 
<tr>
<td class="center" colspan="2">
<form name="config2" action="<?php echo plugin_page( 'config_edit' ) ?>" method="post">
<tr >
<td class="category">
<?php echo lang_get( 'mailtogroup' ) ?>
</td>
<td class='center'>
<label><input type="radio" name="mail_group" value="1" <?php echo ( ON == plugin_config_get( 'mail_group' ) ) ? 'checked="checked" ' : ''?>/>
<?php echo lang_get( 'usergroups_enabled' ) ?></label>
<label><input type="radio" name="mail_group" value="0" <?php echo ( OFF == plugin_config_get( 'mail_group' ) ) ? 'checked="checked" ' : ''?>/>
<?php echo lang_get( 'usergroups_disabled' ) ?></label>
</td>
</tr>
</table>
</div>
</div>
<div class="widget-toolbox padding-8 clearfix">
<input type="submit" class="btn btn-primary btn-white btn-round" value="<?php echo lang_get( 'change_configuration' )?>" />
</div>
</div>
</div>
</form>
</div>
</div>
<?php
layout_page_end();