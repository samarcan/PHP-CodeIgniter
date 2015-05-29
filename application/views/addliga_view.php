<div class="reg_form">
<div class="form_title">Nueva Liga</div>
 <?php echo validation_errors('<p class="error">'); ?>
 <?php echo form_open("liga/add_liga"); ?>
  <p>
  <label for="league">Liga:</label>
  <input type="text" id="league" name="league" value="<?php echo set_value('league'); ?>" />
  </p>
  <p>
  <label for="year">Temporada:</label>
  <input type="text" id="year" name="year" value="<?php echo set_value('year'); ?>" />
  </p>
  <p>
  <input type="submit" class="greenButton" value="Submit" />
  </p>
 <?php echo form_close(); ?>
</div><!--<div class="reg_form">-->
</div><!--<div id="content">-->