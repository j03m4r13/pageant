<div class='daform' style='float:left;padding:20px;width:740px;'>
<div id='pane_left' style='float:left;'>
	<div id='pic_left'>
		<div class='reflection'>
		<img src='/pageant/images/<?php echo $picture_sub;?>' width='200px'/>
		</div>
	</div>
</div>
<div id='entry_side' style='float:left;width:500px'>
<?php 

echo form_open('judge_page/new_top3_entry/' . $contestant_id . "/" . $judge_id); ?>
<fieldset>
<legend>Top 3</legend>
<table border="0" width='500px'>
<tr>
<td colspan="3"><?php echo validation_errors(); ?></td>
</tr>
<tr>
<td valign='top'>
Physical Attribute:
</td>
<td valign='top'>
<input type="hidden" name="contestant_id" value="<?php echo $contestant_id;?>"/>
<input type="hidden" name="judge_id" value="<?php echo $judge_id;?>"/>

<input type="text" name="physical_attribute" value="<?php echo set_value('physical_attribute');?>"/> (0 - 50)
</td>
<td>
<ul>
<li>Charm</li>
<li>X-Factor</li>
<li>Face Value</li>
</ul>

</td>
</tr>
<tr>
<td valign='top'>
Intelligence
</td>
<td valign='top'>
<input type="text" name="intelligence" value="<?php echo set_value('intelligence');?>"/> (0 - 50)
</td>
<td>
<ul>
<li>Wit</li>
<li>Content</li>
<li>Delivery</li>
<li>Enunciation</li>
<li>Consideration</li>
<li>Diction</li>
<li>Articulation</li>
<li>Pronounciation</li>
</ul>

</td>

</tr>
<tr>
<td colspan="3" align='center'><input type="submit" class="submit_button"    onclick="return confirmBox();"  style='width:200px' name="new" value="Save Entry"/></td>
</tr>
</table>
</fieldset>
</form>
<h2><font color='white'>CONTESTANT #<?php echo $contestant_id; ?></font></h2>
</div>
</div>