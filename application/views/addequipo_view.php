
<?php 
if(sizeof($ligas)>0){
?>

<div class="reg_form">
<div class="form_title">Nuevo Equipo</div>

 <?php echo validation_errors('<p class="error">'); ?>
 <?php echo form_open("equipo/add_equipo"); ?>
  <p>
  <label for="nombre">Nombre Equipo:</label>
  <input type="text" id="nombre" name="nombre" value="" />
  </p>
  <p>
  <label for="ciudad">Ciudad:</label>
  <input type="text" id="ciudad" name="ciudad" value="" />
  </p>
  <p>
  <label for="estadio">Estadio:</label>
  <input type="text" id="estadio" name="estadio" value="" />

  </p>
  <p>
  <label for="liga">Liga:</label>
  <select id="liga" name="liga">
  <?php foreach($ligas as $liga){ ?>
  <option value="<?php echo $liga['id_liga']; ?>"><?php echo $liga['nombre']; ?></option>
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
    <h1>Debes Crear Ligas Antes</h1>
  </div>
<?php } ?>