<div class="reg_form">
<div class="form_title">Editar Empleado</div>

 <?php echo validation_errors('<p class="error">'); ?>
 <?php echo form_open("empleado/edit_empleado"); ?>
  <p>
  <label for="nombre">Nombre Empleado:</label>
  <input type="text" id="nombre" name="nombre" value="<?php echo $empleado['nombre']; ?>" />
  </p>
  <p>
  <label for="sueldo">Sueldo:</label>
  <input type="number" id="sueldo" name="sueldo" value="<?php echo $empleado['sueldo']; ?>" />
    <input type="hidden" id="id_empleado" name="id_empleado" value="<?php echo $empleado['id_empleado']; ?>" />
  </p>
  <p>
  <label for="equipo">Equipo:</label>
  <select id="equipo" name="equipo">
  <?php foreach($equipos as $equipo){ ?>
  <option <?php if($equipo['id_equipo']==$empleado['id_equipo']) echo "selected"; ?> value="<?php echo $equipo['id_equipo']; ?>"><?php echo $equipo['nombre']; ?></option>
  <?php } ?>
  </select>
  </p>

  <p>
  <input type="submit" class="greenButton" value="Submit" />
  </p>
 <?php echo form_close(); ?>
</div><!--<div class="reg_form">-->
</div><!--<div id="content">-->