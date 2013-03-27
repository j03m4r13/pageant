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

echo form_open('judge_page/new_tribal_entry/' . $contestant_id . "/" . $judge_id); ?>
<fieldset>
<legend>Tribal Costume Category</legend>
<table border="0">
<tr>
<td colspan="2"><?php echo validation_errors(); ?></td>
</tr>
<tr>
<td>
Creativity:
</td>
<td>
<input type="hidden" name="contestant_id" value="<?php echo $contestant_id;?>"/>
<input type="hidden" name="judge_id" value="<?php echo $judge_id;?>"/>
<input type="text" name="creativity" value="<?php echo set_value('creativity');?>"/> (0 - 30)
</td>
</tr>
<tr>
<td>
Fitness:
</td>
<td>
<input type="text" name="fitness" value="<?php echo set_value('fitness');?>"/> (0 - 25)
</td>
</tr>
<tr>
<td>
Cut and Style
</td>
<td>
<input type="text" name="cut_and_style" value="<?php echo set_value('cut_and_style');?>"/> (0 - 20)
</td>
</tr>
<tr>
<td>
Color Combination
</td>
<td>
<input type="text" name="color_combination" value="<?php echo set_value('color_combination');?>"/> (0 - 15)
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
