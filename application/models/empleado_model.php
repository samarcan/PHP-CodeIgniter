<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class empleado_model extends CI_Model {

    public $id_empleado;
    public $nombre;
    public $sueldo;
    public $id_equipo;
    public $id_user;

 public function __construct()
 {
  parent::__construct();
 }

public function get_empleados(){

  $query=$this->db->get_where("empleado",array('id_user' => $this->session->userdata('user_id')));
  return $query->result_array();

}

public function get_empleado(){
  $query=$this->db->get_where("empleado",array('id_empleado' => $this->input->get('id_empleado')));
  return $query->result_array();
}

 public function save()
{
    if (isset($this->id_empleado))
    {
        $this->db->update('empleado', $this, array('id_empleado' => $this->id_empleado));  
    }else
    {
        $this->db->insert('empleado',$this);
    }
}


public function eliminar()
{
    $this->db->delete('empleado', array('id_empleado' => $this->input->get('id_empleado')));
}

}
?>