<?PHP
$f_username = gpc_get_string( 'username', '' );

	if ( is_blank( $f_username ) ) {
		$t_user_id = gpc_get_int( 'user_id' );
	} else {
		$t_user_id = user_get_id_by_name( $f_username );
		if ( $t_user_id === false ) {
			# If we can't find the user by name, attempt to find by email.
			$t_user_id = user_get_id_by_email( $f_username );
			if ( $t_user_id === false ) {
				error_parameters( $f_username );
				trigger_error( ERROR_USER_BY_NAME_NOT_FOUND, ERROR );
			}
		}
	}
if ( access_has_global_level( config_get( 'manage_user_threshold' ) )  ) {
	require_once( config_get( 'plugin_path' ) . 'Usergroups' . DIRECTORY_SEPARATOR . 'Usergroups_api.php' );  
	?>


<div class="col-md-12 col-xs-12">
<div class="space-10"></div>
<div class="form-container" > 
<form method="post" action="plugins/Usergroups/pages/manage_usergroup_add.php">
<?php echo form_security_field( 'manage_user_group_add' ) ?>
<input type="hidden" name="user_id" value="<?php echo $t_user_id ?>" />
<div class="widget-box widget-color-blue2">
<div class="widget-header widget-header-small">
	<h4 class="widget-title lighter">
		<i class="ace-icon fa fa-text-width"></i>
		<?php echo lang_get( 'add_usergroup_title' ) . ': ' . lang_get( 'plugin_format_config' )?>
	</h4>
</div>
<div class="widget-body">
<div class="widget-main no-padding">
<div class="table-responsive"> 
<table class="table table-bordered table-condensed table-striped"> 	
	<!-- Assigned Groups -->
	<tr <?php echo helper_alternate_class( 1 ) ?> valign="top">
	<td class="category" width="30%">
	<?php echo lang_get( 'assigned_groups' ) ?>
	</td>
	<td width="70%">
	<?php 
	print_group_user_list( $t_user_id) ;
	?>
	</td>
	</tr>


	<!-- Unassigned Group Selection -->
	<tr <?php echo helper_alternate_class() ?> valign="top">
	<td class="category">
	<?php echo lang_get( 'unassigned_groups' ) ?>
	</td>
	<td>
	<select name="group_id[]" multiple="multiple" size="5">
	<?php 
	print_group_user_list_option_list2( $t_user_id ) 
	?>
	</select>
	</td>
	</tr>

</table>
</div>
</div>
<div class="widget-toolbox padding-8 clearfix">
	<input type="submit" class="btn btn-primary btn-white btn-round" value="<?php echo lang_get( 'add_group_button' )?>" />
</div>
</div>
</div>
</form>
</div>
</div>
	<?php
}