<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class partido_model extends CI_Model {

    public $id_partido;
    public $fecha;
    public $id_equipo_local;
    public $id_equipo_visitante;
    public $resultado_equipo_local;
    public $resultado_equipo_visitante;
    public $id_liga;
    public $id_user;

 public function __construct()
 {
  parent::__construct();
 }

public function get_partidos(){
  $this->db->order_by("fecha", "desc");
  $query=$this->db->get_where("partido",array('id_user' => $this->session->userdata('user_id'),'id_liga'=> $this->input->post('id_liga')));
  return $query->result_array();

}

public function get_partido(){
  $query=$this->db->get_where("partido",array('id_partido' => $this->input->get('id_partido')));
  return $query->result_array();
}

 public function save()
{
    if (isset($this->id_partido))
    {
        $this->db->update('partido', $this, array('id_partido' => $this->id_partido));  
    }else
    {
        $this->db->insert('partido',$this);
    }
}


public function eliminar()
{
    $this->db->delete('partido', array('id_partido' => $this->input->get('id_partido')));
}

}
?>