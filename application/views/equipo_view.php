
<a class="ui button icon circular" style="height:44px;float:right;margin:0px 30px 20px 0;color:green;" href="equipo/nuevo_equipo">
<i class="add icon" style="color:green;"></i>Equipo</a>

<?php 
if(sizeof($user_equipos)>0){
?>

<table class="ui compact table segment">
  <thead>
    <tr><th>Nombre del Equipo</th>
    <th>Ciudad</th>
    <th>Estadio</th>
    <th>Liga</th>
    <th></th>
    <th></th>
  </tr></thead>
  <tbody>
  <?php 
  $i = 0;
  foreach($user_equipos as $equipo){ 
    ?>
    <tr>
      <td><?php echo $equipo['nombre']; ?></td>
      <td><?php echo $equipo['ciudad']; ?></td>
      <td><?php echo $equipo['estadio']; ?></td>
      <td><?php echo $nombres_liga[$i]; ?></td>
      <td><a href="equipo/editar_equipo?id_equipo=<?php echo $equipo['id_equipo']?>">Editar</a></td>
      <td><a href="equipo/eliminar?id_equipo=<?php echo $equipo['id_equipo']?>">Eliminar</a></td>
    </tr>
   <?php 
   $i++;
   } 
   ?>
  </tbody>
</table>

<?php } ?>