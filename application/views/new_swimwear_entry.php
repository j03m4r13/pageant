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

echo form_open('judge_page/new_swimwear_entry/' . $contestant_id . "/" . $judge_id); ?>
<fieldset>
<legend>Swimwear Category</legend>
<table border="0">
<tr>
<td colspan="2"><?php echo validation_errors(); ?></td>
</tr>
<tr>
<td>
Fitness:
</td>
<td>
<input type="text" name="fitness" value="<?php echo set_value('fitness');?>"/> (0 - 30)
</td>
</tr>
<tr>
<td>
Cut and Style:
</td>
<td>
<input type="text" name="cut_and_style" value="<?php echo set_value('cut_and_style');?>"/> (0 - 20)
</td>
</tr>
<tr>
<td>
Confidence
</td>
<td>
<input type="text" name="confidence" value="<?php echo set_value('confidence');?>"/> (0 - 20)
</td>
</tr>
<tr>
<td>
Grooming and Fashion Style
</td>
<td>
<input type="text" name="grooming" value="<?php echo set_value('grooming');?>"/> (0 - 20)
</td>
</tr>

<tr>
<td>
Poise, Bearing & Projection
</td>
<td>
<input type="text" name="poise" value="<?php echo set_value('poise');?>"/> (0 - 10)
</td>
</tr>

<tr>
<td colspan="2" align='center'><input type="submit" class="submit_button"    onclick="return confirmBox()"  style='width:200px' name="new" value="Save Entry"/></td>
</tr>
</table>
</fieldset>
</form>
<h2><font color='white'>CONTESTANT #<?php echo $contestant_id; ?></font></h2>
</div>
</div>