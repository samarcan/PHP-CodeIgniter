
<a class="ui button icon circular" style="height:44px;float:right;margin:0px 30px 20px 0;color:green;" href="jugador/nuevo_jugador">
<i class="add icon" style="color:green;"></i>Jugador</a>

<?php 
if(sizeof($user_jugadores)>0){
?>

<table class="ui compact table segment">
  <thead>
    <tr><th>Nombre del Jugador</th>
    <th>Sueldo</th>
    <th>Posición</th>
    <th>Equipo</th>
    <th></th>
    <th></th>
  </tr></thead>
  <tbody>
  <?php 
  $i = 0;
  foreach($user_jugadores as $jugador){ 
    ?>
    <tr>
      <td><?php echo $jugador['nombre']; ?></td>
      <td><?php echo $jugador['sueldo']; ?></td>
      <td><?php echo $jugador['posicion']; ?></td>
      <td><?php echo $nombres_equipos[$i]; ?></td>
      <td><a href="jugador/editar_jugador?id_jugador=<?php echo $jugador['id_jugador']?>">Editar</a></td>
      <td><a href="jugador/eliminar?id_jugador=<?php echo $jugador['id_jugador']?>">Eliminar</a></td>
    </tr>
   <?php 
   $i++;
   } 
   ?>
  </tbody>
</table>

<?php } ?>