<div class="reg_form">
<div class="form_title">Editar Jugador</div>

 <?php echo validation_errors('<p class="error">'); ?>
 <?php echo form_open("jugador/edit_jugador"); ?>
  <p>
  <label for="nombre">Nombre Jugador:</label>
  <input type="text" id="nombre" name="nombre" value="<?php echo $jugador['nombre']; ?>" />
  </p>
  <p>
  <label for="sueldo">Sueldo:</label>
  <input type="number" id="sueldo" name="sueldo" value="<?php echo $jugador['sueldo']; ?>" />
  </p>
  <p>
  <label for="posicion">Posición:</label>
  <select id="posicion" name="posicion">
    <option <?php if($jugador['posicion']=='Portero')echo 'selected'; ?> value="Portero">Portero</option>
    <option <?php if($jugador['posicion']=='Defensa')echo 'selected'; ?> value="Defensa">Defensa</option>
    <option <?php if($jugador['posicion']=='Medio')echo 'selected'; ?> value="Medio">Medio</option>
    <option <?php if($jugador['posicion']=='Delantero')echo 'selected'; ?> value="Delantero">Delantero</option>
  </select>
    <input type="hidden" id="id_jugador" name="id_jugador" value="<?php echo $jugador['id_jugador']; ?>" />
  </p>
  <p>
  <label for="equipo">Equipo:</label>
  <select id="equipo" name="equipo">
  <?php foreach($equipos as $equipo){ ?>
  <option <?php if($equipo['id_equipo']==$jugador['id_equipo']) echo "selected"; ?> value="<?php echo $equipo['id_equipo']; ?>"><?php echo $equipo['nombre']; ?></option>
  <?php } ?>
  </select>
  </p>

  <p>
  <input type="submit" class="greenButton" value="Submit" />
  </p>
 <?php echo form_close(); ?>
</div><!--<div class="reg_form">-->
</div><!--<div id="content">-->