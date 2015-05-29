<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Equipo_model extends CI_Model {

    public $id_equipo;
    public $nombre;
    public $ciudad;
    public $estadio;
    public $id_liga;
    public $id_user;

 public function __construct()
 {
  parent::__construct();
 }

public function get_equipos(){
  $query=$this->db->get_where("equipo",array('id_user' => $this->session->userdata('user_id')));
  return $query->result_array();
}

public function get_equipo(){
  $query=$this->db->get_where("equipo",array('id_equipo' => $this->input->get('id_equipo')));
  return $query->result_array();
}
public function get_equipoid($id){
  $query=$this->db->get_where("equipo",array('id_equipo' => $id));
  return $query->result_array();
}

public function get_equipos_liga($id_liga){
 $query=$this->db->get_where("equipo",array('id_liga' => $id_liga,'id_user' => $this->session->userdata('user_id')));

  return $query->result_array();
}

 public function save()
{
    if (isset($this->id_equipo))
    {
        $this->db->update('equipo', $this, array('id_equipo' => $this->id_equipo));  
    }else
    {
        $this->db->insert('equipo',$this);
    }
}


public function eliminar()
{
    $this->db->delete('equipo', array('id_equipo' => $this->input->get('id_equipo')));
}

}
?>