<div class='daform' style='float:left;padding:50px;width:680px;'>
<div id='pane_left' style='float:left;'>
	<div id='pic_left'>
		<div class='reflection'>
		<img src='/pageant/images/logo.png' width='200px'/>
		</div>
	</div>
</div>
<div id='entry_side' style='float:left;width:250px'>
<?php echo form_open('judge_page/login'); ?>
<fieldset>
<legend>Judge Login</legend>
<table border="0">
<tr>
<td colspan="2"><?php echo validation_errors(); ?></td>
</tr>
<tr>
<td>
Username:
</td>
<td>
<input type="text" name="username" value="<?php echo set_value('username');?>"/>
</td>
</tr>
<tr>
<td>
Password:
</td>
<td>
<input type="password" name="password" value="<?php echo set_value('password');?>"/>
</td>
</tr>
<tr>
<td colspan='2'>&nbsp;</td>
</tr>
<tr>
<td colspan="2" align='center'><input type="submit" class="submit_button" name="new" style='width:200px' value="Login Now"/></td>
</tr>
</table>
</fieldset>
</form>
</div>
</div>
