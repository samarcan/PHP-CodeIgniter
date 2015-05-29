<div class="ui menu">
  <a href="/CodeIgniter/index.php/liga" class="<?php if($menu=='Ligas')echo 'active ';?>item">
    <i class="home icon"></i> Liga
  </a>
   <a href="/CodeIgniter/index.php/equipo" class="<?php if($menu=='Equipos')echo 'active ';?>item">
    <i class="users icon"></i> Equipos
  </a>
   <a href="/CodeIgniter/index.php/jugador" class="<?php if($menu=='Jugadores')echo 'active ';?>item">
    <i class="user icon"></i> Jugadores
  </a>
   <a href="/CodeIgniter/index.php/empleado" class="<?php if($menu =='Empleados')echo 'active ';?>item">
    <i class="attachment icon"></i> Empleados
  </a>
  <a href="/CodeIgniter/index.php/partido" class="<?php if($menu=='Partidos')echo 'active ';?>item">
    <i class="table icon"></i> Calendario
  </a>
  <div class="right menu">
    <div class="item" style="font-weight: bold;">
             <?php echo $this->session->userdata('user_name') ?>
    </div>
  <a class="item" href="user/logout">
    <i class="off icon"></i> Salir
  </a>
  </div>
</div>