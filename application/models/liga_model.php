<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Liga_model extends CI_Model {

    public $id_liga;
    public $nombre;
    public $temporada;
    public $id_user;

 public function __construct()
 {
  parent::__construct();
 }

public function get_leagues(){

  $query=$this->db->get_where("liga",array('id_user' => $this->session->userdata('user_id') ));
  return $query->result_array();

}

public function get_league(){
  $query=$this->db->get_where("liga",array('id_liga' => $this->input->get('id_liga')));
  return $query->result_array();
}

public function get_leagueid($id){
  $query=$this->db->get_where("liga",array('id_liga' => $id));
  return $query->result_array();
}

 public function save()
{
    if (isset($this->id_liga))
    {
        $this->db->update('liga', $this, array('id_liga' => $this->id_liga));  
    }else
    {
        $this->db->insert('liga',$this);
    }
}


public function eliminar()
{
    $this->db->delete('liga', array('id_liga' => $this->input->get('id_liga')));
}

}
?>