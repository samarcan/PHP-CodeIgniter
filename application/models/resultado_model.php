<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Resultado_model extends CI_Model {

    public $id_resultado;
    public $id_equipo;
    public $id_liga;
    public $puntos;
    public $id_user;

 public function __construct()
 {
  parent::__construct();
 }

public function get_resultados(){
  $this->db->order_by("puntos", "desc");
  $query=$this->db->get_where("resultado",array('id_user' => $this->session->userdata('user_id'),'id_liga'=> $this->input->post('id_liga')));
  return $query->result_array();
}

public function get_resultado($id){
  $query=$this->db->get_where("resultado",array('id_equipo' => $id));
  return $query->result_array();
}


public function get_resultados_liga($id_liga){
 $query=$this->db->get_where("resultado",array('id_liga' => $id_liga));
  return $query->result_array();
}

 public function save()
{
    if (isset($this->id_resultado))
    {
        $this->db->update('resultado', $this, array('id_resultado' => $this->id_resultado));  
    }else
    {
        $this->db->insert('resultado',$this);
    }
}


public function eliminar()
{
    $this->db->delete('resultado', array('id_resultado' => $this->input->get('id_resultado')));
}

}
?>