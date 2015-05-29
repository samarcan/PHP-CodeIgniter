<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Jugador_model extends CI_Model {

    public $id_jugador;
    public $nombre;
    public $sueldo;
    public $posicion;
    public $id_equipo;
    public $id_user;

 public function __construct()
 {
  parent::__construct();
 }

public function get_jugadores(){

  $query=$this->db->get_where("jugador",array('id_user' => $this->session->userdata('user_id')));
  return $query->result_array();

}

public function get_jugador(){
  $query=$this->db->get_where("jugador",array('id_jugador' => $this->input->get('id_jugador')));
  return $query->result_array();
}

 public function save()
{
    if (isset($this->id_jugador))
    {
        $this->db->update('jugador', $this, array('id_jugador' => $this->id_jugador));  
    }else
    {
        $this->db->insert('jugador',$this);
    }
}


public function eliminar()
{
    $this->db->delete('jugador', array('id_jugador' => $this->input->get('id_jugador')));
}

}
?>