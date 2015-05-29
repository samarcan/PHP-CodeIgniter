
<a class="ui button icon circular" style="height:44px;float:right;margin:0px 30px 20px 0;color:green;" href="/CodeIgniter/index.php/Partido/nuevo_partido?id_liga=<?php echo $liga['id_liga']; ?>">
<i class="add icon" style="color:green;"></i>Partido</a>

<?php 
if(sizeof($partidos)>0){
?>
<h2>Partidos</h2>
<table class="ui compact table segment">
  <thead>
    <tr><th>Equipo Local</th>
    <th>Equipo Visitante</th>
    <th>Goles Local</th>
    <th>Goles Visitante</th>
    <th>Fecha</th>
  </tr></thead>
  <tbody>
  <?php 
  $i = 0;
  foreach($partidos as $partido){ 
    ?>
    <tr>
      <td><?php echo $equipos_locales[$i]; ?></td>
      <td><?php echo $equipos_visitantes[$i]; ?></td>
      <td><?php echo $partido['resultado_equipo_local']; ?></td>
      <td><?php echo $partido['resultado_equipo_visitante']; ?></td>
      <td><?php echo $partido['fecha']; ?></td>
    </tr>
   <?php 
   $i++;
   } 
   ?>
  </tbody>
</table>
</br>
<h2>Clasificación</h2>

<table class="ui compact table segment">
  <thead>
    <tr><th>Posición</th>
    <th>Equipo</th>
    <th>Puntos</th>
  </tr></thead>
  <tbody>
  <?php 
  $i = 0;
  foreach($resultados as $resultado){ 
    ?>
    <tr>
      <td><?php echo ($i+1) ?></td>
      <td><?php echo $equipos_clasificacion[$i]; ?></td>
      <td><?php echo $resultado['puntos']; ?></td>
    </tr>
   <?php 
   $i++;
   } 
   ?>
  </tbody>
</table>

<?php } ?>