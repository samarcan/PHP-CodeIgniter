
<a class="ui button icon circular" style="height:44px;float:right;margin:0px 30px 20px 0;color:green;" href="liga/nueva_liga">
<i class="add icon" style="color:green;"></i>Liga</a>


<?php 
if(sizeof($user_leagues)>0){
?>


<table class="ui compact table segment">
  <thead>
    <tr><th>Nombre de la Liga</th>
    <th>Temporada</th>
    <th></th>
    <th></th>
  </tr></thead>
  <tbody>
  <?php foreach($user_leagues as $league){ ?>
    <tr>
      <td><?php echo $league['nombre']; ?></td>
      <td><?php echo $league['temporada']; ?></td>
      <td><a href="liga/editar_liga?id_liga=<?php echo $league['id_liga']?>">Editar</a></td>
      <td><a href="liga/eliminar?id_liga=<?php echo $league['id_liga']?>">Eliminar</a></td>
    </tr>
   <?php } ?>
  </tbody>
</table>

<?php } ?>