<div width="100%" style=" text-align:center;">
<?php echo form_open("partido/select_liga"); ?>
<div class="ui form">
  <div class="field">
    <label>Ligas</label>
    <select id="id_liga" name="id_liga" class="ui dropdown">
    <?php foreach ($ligas as $liga) {?>
      <option value="<?php echo $liga['id_liga']; ?>"><?php echo $liga['nombre']; ?></option>
    <?php } ?>
    </select>
  </div>
</div>
<p>
<input type="submit" class="greenButton" value="Submit" />
</p>
<?php echo form_close(); ?>
</div>