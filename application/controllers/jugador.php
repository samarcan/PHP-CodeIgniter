<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class jugador extends CI_Controller{

 public function __construct()
 {
  parent::__construct();
  $this->load->model(array('jugador_model','equipo_model'));
 }


 public function index()
 {
  if(($this->session->userdata('user_name')!=""))
  {
   $this->main_jugador();
  }
  else{
   header('Location: '.base_url().'index.php/user');
  }
 }


 public function main_jugador()
 {
  $data['title']= 'Jugadores';
  $data['menu']='Jugadores';
  $data['user_jugadores'] = $this->jugador_model->get_jugadores();
  $data['nombres_equipos'] = $this->anadir_nombres($data['user_jugadores']);
  $this->load->view('header_view',$data);
  $this->load->view('menu_view',$data);
  $this->load->view('jugador_view.php', $data);
  $this->load->view('footer_view',$data);
 }

 public function nuevo_jugador(){
  $data['menu']='Jugadores';
  $data['title']= 'Nuevo jugador';
  $data['equipos'] = $this->equipo_model->get_equipos();
  $this->load->view('header_view',$data);
  $this->load->view('menu_view',$data);
  $this->load->view('addjugador_view.php', $data);
  $this->load->view('footer_view',$data);
 }


 public function add_jugador()
 {
  $this->load->library('form_validation');
  // field name, error message, validation rules
  $this->form_validation->set_rules('nombre', 'Nombre', 'trim|required');
  $this->form_validation->set_rules('sueldo', 'Sueldo', 'trim|required');
  $this->form_validation->set_rules('posicion', 'Posicion', 'trim|required');
  $this->form_validation->set_rules('equipo', 'Equipo', 'trim|required');


  if($this->form_validation->run() == FALSE)
  {
   header('Location: '.base_url().'index.php/jugador');
  }
  else
  {
    $jugador = new jugador_model();
    $jugador->nombre =  $this->input->post('nombre');
    $jugador->sueldo = $this->input->post('sueldo');
    $jugador->posicion = $this->input->post('posicion');
    $jugador->id_equipo = $this->input->post('equipo');
    $jugador->id_user = $this->session->userdata('user_id');
    $jugador->save();
  header('Location: '.base_url().'index.php/jugador');
  }
 }

 public function editar_jugador()
 {
  $data['title']= 'Nuevo jugador';
  $data['menu']='jugadores';
  $data['equipos'] = $this->equipo_model->get_equipos();
  $data['jugador']= $this->jugador_model->get_jugador()[0];
  $this->load->view('header_view',$data);
  $this->load->view('menu_view',$data);
  $this->load->view('editjugador_view.php', $data);
  $this->load->view('footer_view',$data);
 }

 public function edit_jugador()
 {
  $this->load->library('form_validation');
  // field name, error message, validation rules
  $this->form_validation->set_rules('nombre', 'Nombre', 'trim|required');
  $this->form_validation->set_rules('sueldo', 'Sueldo', 'trim|required');
  $this->form_validation->set_rules('posicion', 'Posicion', 'trim|required');
  $this->form_validation->set_rules('equipo', 'Equipo', 'trim|required');

  if($this->form_validation->run() == FALSE)
  {
   header('Location: '.base_url().'index.php/jugador');
  }
  else
  {
    $jugador = new jugador_model();
    $jugador->id_jugador = $this->input->post('id_jugador');
    $jugador->nombre =  $this->input->post('nombre');
    $jugador->sueldo = $this->input->post('sueldo');
    $jugador->posicion = $this->input->post('posicion');
    $jugador->id_equipo = $this->input->post('equipo');
    $jugador->id_user = $this->session->userdata('user_id');
    $jugador->save();

  header('Location: '.base_url().'index.php/jugador');
  }
 }

 public function eliminar()
 {
  $this->jugador_model->eliminar();
  header('Location: '.base_url().'index.php/jugador');
 }


public function anadir_nombres($jugadores)
{
  $nombres_equipos= array();
  foreach ($jugadores as $jugador) {
    array_push($nombres_equipos,$this->equipo_model->get_equipoid($jugador['id_equipo'])[0]['nombre']);
  }

  return $nombres_equipos;
}

}
?>