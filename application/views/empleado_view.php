
<a class="ui button icon circular" style="height:44px;float:right;margin:0px 30px 20px 0;color:green;" href="Empleado/nuevo_Empleado">
<i class="add icon" style="color:green;"></i>Empleado</a>

<?php 
if(sizeof($user_empleados)>0){
?>

<table class="ui compact table segment">
  <thead>
    <tr><th>Nombre del Empleado</th>
    <th>Sueldo</th>
    <th>Equipo</th>
    <th></th>
    <th></th>
  </tr></thead>
  <tbody>
  <?php 
  $i = 0;
  foreach($user_empleados as $empleado){ 
    ?>
    <tr>
      <td><?php echo $empleado['nombre']; ?></td>
      <td><?php echo $empleado['sueldo']; ?></td>
      <td><?php echo $nombres_equipos[$i]; ?></td>
      <td><a href="empleado/editar_empleado?id_empleado=<?php echo $empleado['id_empleado']?>">Editar</a></td>
      <td><a href="empleado/eliminar?id_empleado=<?php echo $empleado['id_empleado']?>">Eliminar</a></td>
    </tr>
   <?php 
   $i++;
   } 
   ?>
  </tbody>
</table>

<?php } ?>