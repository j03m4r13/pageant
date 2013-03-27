<div class='daform' style='float:left;padding:50px;width:680px;'>
<div id='pane_left' style='float:left;'>
	<div id='pic_left'>
		<div class='reflection'>
		<img src='/pageant/images/<?php echo $picture_sub;?>' width='200px'/>
		</div>
	</div>
</div>
<div id='entry_side' style='float:left;width:250px'>
<?php 

echo form_open('judge_page/new_interview_entry/' . $contestant_id . "/" . $judge_id); ?>
<fieldset>
<legend>Interview Category</legend>
<table border="0">
<tr>
<td colspan="2"><?php echo validation_errors(); ?></td>
</tr>
<tr>
<td>
Intelligence:
</td>
<td>
<input type="hidden" name="contestant_id" value="<?php echo $contestant_id;?>"/>
<input type="hidden" name="judge_id" value="<?php echo $judge_id;?>"/>
<input type="text" name="interview" value="<?php echo set_value('interview');?>"/> (0 - 100)
</td>
</tr>
<tr>
<td colspan='2'>&nbsp;</td>
</tr>
<tr>
<td colspan="2" align='center'><input type="submit" class="submit_button"  onclick="return confirmBox();"   name="new" style='width:200px' value="Save Entry"/></td>
</tr>
</table>
</fieldset>
</form>
<h2><font color='white'>CONTESTANT #<?php echo $contestant_id; ?></font></h2>
</div>
</div>
