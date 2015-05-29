
<?php 
if(sizeof($equipos)>1){
?>

<div class="reg_form">
<div class="form_title">Nuevo Partido</div>
 <?php echo validation_errors('<p class="error">'); ?>
 <?php echo form_open("partido/add_partido"); ?>

  <p>
  <label for="fecha">Fecha:</label>
  <input type="date" name="fecha" id="fecha"/>
  </p>

  <p>
  <label for="equipolocal">Equipo Local:</label>
  <select id="equipolocal" name="equipolocal">
  <?php foreach($equipos as $equipo){ ?>
  <option value="<?php echo $equipo['id_equipo']; ?>"><?php echo $equipo['nombre']; ?></option>
  <?php } ?>
  </select>
  <input type="hidden" name="liga" id="liga" value="<?php echo $liga['id_liga']; ?>" />
  </p>

  <p>
  <label for="equipovisitante">Equipo Visitante:</label>
  <select id="equipovisitante" name="equipovisitante">
  <?php foreach($equipos as $equipo){ ?>
  <option value="<?php echo $equipo['id_equipo']; ?>"><?php echo $equipo['nombre']; ?></option>
  <?php } ?>
  </select>
  </p>

  <p>
    <label for="resultadolocal">Goles Equipo Local</label>
    <input type="number" name="resultadolocal" id="resutadolocal"/>
  </p>

  <p>
    <label for="resultadovisitante">Goles Equipo Visitante</label>
    <input type="number" name="resultadovisitante" id="resutadolocal"/>
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
    <h1>Debes crear al menos 2 Equipos antes</h1>
  </div>
<?php } ?>