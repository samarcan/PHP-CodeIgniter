
<?php 
if(sizeof($equipos)>0){
?>

<div class="reg_form">
<div class="form_title">Nuevo Empleado</div>

 <?php echo validation_errors('<p class="error">'); ?>
 <?php echo form_open("empleado/add_empleado"); ?>
  <p>
  <label for="nombre">Nombre Empleado:</label>
  <input type="text" id="nombre" name="nombre" value="" />
  </p>
  <p>
  <label for="sueldo">Sueldo:</label>
  <input type="number" step="0.01" id="sueldo" name="sueldo" value="" />
  </p>

  <p>
  <label for="equipo">Equipo:</label>
  <select id="equipo" name="equipo">
  <?php foreach($equipos as $equipo){ ?>
  <option value="<?php echo $equipo['id_equipo']; ?>"><?php echo $equipo['nombre']; ?></option>
  <?php } ?>
  </select>
  </p>
  <p>
  <input type="submit" class="greenButton" value="Submit" />
  </p>
 <?php echo form_close(); ?>
</div><!--<div class="reg_form">-->
</div><!--<div id="content">-->

<?php } 
else{ ?>
  <div>
    <h1>Debes Crear Equipos Antes</h1>
  </div>
<?php } ?>