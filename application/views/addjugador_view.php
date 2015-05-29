
<?php 
if(sizeof($equipos)>0){
?>

<div class="reg_form">
<div class="form_title">Nuevo Jugador</div>
 <?php echo validation_errors('<p class="error">'); ?>
 <?php echo form_open("jugador/add_jugador"); ?>
  <p>
  <label for="nombre">Nombre Jugador:</label>
  <input type="text" id="nombre" name="nombre" value="" />
  </p>
  <p>
  <label for="sueldo">Sueldo:</label>
  <input type="number" step="0.01" id="sueldo" name="sueldo" value="" />
  </p>
  <p>


  <label for="posicion">Posicion:</label>
  <select id="posicion" name="posicion">
    <option value="Portero">Portero</option>
    <option value="Defensa">Defensa</option>
    <option value="Medio">Medio</option>
    <option value="Delantero">Delantero</option>
  </select>
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