<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Liga extends CI_Controller{
 public function __construct()
 {
  parent::__construct();
  $this->load->model('liga_model');
 }
 public function index()
 {
  if(($this->session->userdata('user_name')!=""))
  {
   $this->main_liga();
  }
  else{
   header('Location: '.base_url().'index.php/user');
  }
 }
 public function main_liga()
 {
  $data['title']= 'Ligas';
  $data['menu']='Ligas';
  $data['user_leagues'] = $this->liga_model->get_leagues();
  $this->load->view('header_view',$data);
  $this->load->view('menu_view',$data);
  $this->load->view('liga_view.php', $data);
  $this->load->view('footer_view',$data);
 }

 public function nueva_liga(){
  $data['menu']='Ligas';
  $data['title']= 'Nueva Liga';
  $this->load->view('header_view',$data);
  $this->load->view('menu_view',$data);
  $this->load->view('addliga_view.php', $data);
  $this->load->view('footer_view',$data);
 }


 public function add_liga()
 {
  $this->load->library('form_validation');
  // field name, error message, validation rules
  $this->form_validation->set_rules('league', 'Liga', 'trim|required');
  $this->form_validation->set_rules('year', 'Temporada', 'trim|required');

  if($this->form_validation->run() == FALSE)
  {
   header('Location: '.base_url().'index.php/liga');
  }
  else
  {
    $liga = new liga_model();
    $liga->nombre =  $this->input->post('league');
    $liga->temporada = $this->input->post('year');
    $liga->id_user = $this->session->userdata('user_id');
    $liga->save();
  header('Location: '.base_url().'index.php/liga');
  }
 }

 public function editar_liga()
 {
  $data['title']= 'Nueva Liga';
  $data['menu']='Ligas';
  $data['league']= $this->liga_model->get_league()[0];
  $this->load->view('header_view',$data);
  $this->load->view('menu_view',$data);
  $this->load->view('editliga_view.php', $data);
  $this->load->view('footer_view',$data);
 }

 public function edit_liga()
 {
  $this->load->library('form_validation');
  // field name, error message, validation rules
  $this->form_validation->set_rules('league', 'Liga', 'trim|required');
  $this->form_validation->set_rules('year', 'Temporada', 'trim|required');

  if($this->form_validation->run() == FALSE)
  {
   header('Location: '.base_url().'index.php/liga');
  }
  else
  {
    $liga = new liga_model();
    $liga->id_liga = $this->input->post('id_liga');
    $liga->nombre =  $this->input->post('league');
    $liga->temporada = $this->input->post('year');
    $liga->id_user = $this->session->userdata('user_id');
    $liga->save();

  header('Location: '.base_url().'index.php/liga');
  }
 }

 public function eliminar()
 {
  $this->liga_model->eliminar();
  header('Location: '.base_url().'index.php/liga');
 }

}
?>