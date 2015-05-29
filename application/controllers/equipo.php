<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Equipo extends CI_Controller{

 public function __construct()
 {
  parent::__construct();
  $this->load->model(array('equipo_model','liga_model'));
 }


 public function index()
 {
  if(($this->session->userdata('user_name')!=""))
  {
   $this->main_equipo();
  }
  else{
   header('Location: '.base_url().'index.php/user');
  }
 }


 public function main_equipo()
 {
  $data['title']= 'Equipos';
  $data['menu']='Equipos';
  $data['user_equipos'] = $this->equipo_model->get_equipos();
  $data['nombres_liga'] = $this->anadir_nombres($data['user_equipos']);
  $this->load->view('header_view',$data);
  $this->load->view('menu_view',$data);
  $this->load->view('equipo_view.php', $data);
  $this->load->view('footer_view',$data);
 }

 public function nuevo_equipo(){
  $data['menu']='Equipos';
  $data['title']= 'Nuevo Equipo';
  $data['ligas'] = $this->liga_model->get_leagues();
  $this->load->view('header_view',$data);
  $this->load->view('menu_view',$data);
  $this->load->view('addequipo_view.php', $data);
  $this->load->view('footer_view',$data);
 }


 public function add_equipo()
 {
  $this->load->library('form_validation');
  // field name, error message, validation rules
  $this->form_validation->set_rules('nombre', 'Nombre', 'trim|required');
  $this->form_validation->set_rules('ciudad', 'Ciudad', 'trim|required');
  $this->form_validation->set_rules('estadio', 'Estadio', 'trim|required');
  $this->form_validation->set_rules('liga', 'Liga', 'trim|required');


  if($this->form_validation->run() == FALSE)
  {
   header('Location: '.base_url().'index.php/equipo');
  }
  else
  {
    $equipo = new equipo_model();
    $equipo->nombre =  $this->input->post('nombre');
    $equipo->ciudad = $this->input->post('ciudad');
    $equipo->estadio = $this->input->post('estadio');
    $equipo->id_liga = $this->input->post('liga');
    $equipo->id_user = $this->session->userdata('user_id');
    $equipo->save();
  header('Location: '.base_url().'index.php/equipo');
  }
 }

 public function editar_equipo()
 {
  $data['title']= 'Nuevo Equipo';
  $data['menu']='Equipos';
  $data['ligas'] = $this->liga_model->get_leagues();
  $data['equipo']= $this->equipo_model->get_equipo()[0];
  $this->load->view('header_view',$data);
  $this->load->view('menu_view',$data);
  $this->load->view('editequipo_view.php', $data);
  $this->load->view('footer_view',$data);
 }

 public function edit_equipo()
 {
  $this->load->library('form_validation');
  // field name, error message, validation rules
  $this->form_validation->set_rules('nombre', 'Nombre', 'trim|required');
  $this->form_validation->set_rules('ciudad', 'Ciudad', 'trim|required');
  $this->form_validation->set_rules('estadio', 'Estadio', 'trim|required');
  $this->form_validation->set_rules('liga', 'Liga', 'trim|required');

  if($this->form_validation->run() == FALSE)
  {
   header('Location: '.base_url().'index.php/equipo');
  }
  else
  {
    $equipo = new equipo_model();
    $equipo->id_equipo = $this->input->post('id_equipo');
    $equipo->nombre =  $this->input->post('nombre');
    $equipo->ciudad = $this->input->post('ciudad');
    $equipo->estadio = $this->input->post('estadio');
    $equipo->id_liga = $this->input->post('liga');
    $equipo->id_user = $this->session->userdata('user_id');
    $equipo->save();

  header('Location: '.base_url().'index.php/equipo');
  }
 }

 public function eliminar()
 {
  $this->equipo_model->eliminar();
  header('Location: '.base_url().'index.php/equipo');
 }


public function anadir_nombres($equipos)
{
  $nombres_liga= array();
  foreach ($equipos as $equipo) {
    array_push($nombres_liga,$this->liga_model->get_leagueid($equipo['id_liga'])[0]['nombre']);
  }

  return $nombres_liga;
}

}
?>