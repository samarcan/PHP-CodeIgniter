<div class="reg_form">
<div class="form_title">Editar Equipo</div>

 <?php echo validation_errors('<p class="error">'); ?>
 <?php echo form_open("equipo/edit_equipo"); ?>
  <p>
  <label for="nombre">Nombre Equipo:</label>
  <input type="text" id="nombre" name="nombre" value="<?php echo $equipo['nombre']; ?>" />
  </p>
  <p>
  <label for="ciudad">Ciudad:</label>
  <input type="text" id="ciudad" name="ciudad" value="<?php echo $equipo['ciudad']; ?>" />
  </p>
  <p>
  <label for="estadio">Estadio:</label>
  <input type="text" id="estadio" name="estadio" value="<?php echo $equipo['estadio']; ?>" />
    <input type="hidden" id="id_equipo" name="id_equipo" value="<?php echo $equipo['id_equipo']; ?>" />
  </p>
  <p>
  <label for="estadio">Liga:</label>
  <select id="liga" name="liga">
  <?php foreach($ligas as $liga){ ?>
  <option <?php if($liga['id_liga']==$equipo['id_liga']) echo "selected"; ?> value="<?php echo $liga['id_liga']; ?>"><?php echo $liga['nombre']; ?></option>
  <?php } ?>
  </select>
  </p>

  <p>
  <input type="submit" class="greenButton" value="Submit" />
  </p>
 <?php echo form_close(); ?>
</div><!--<div class="reg_form">-->
</div><!--<div id="content">-->