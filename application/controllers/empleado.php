<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class empleado extends CI_Controller{

 public function __construct()
 {
  parent::__construct();
  $this->load->model(array('empleado_model','equipo_model'));
 }


 public function index()
 {
  if(($this->session->userdata('user_name')!=""))
  {
   $this->main_empleado();
  }
  else{
   header('Location: '.base_url().'index.php/user');
  }
 }


 public function main_empleado()
 {
  $data['title']= 'empleados';
  $data['menu']='Empleados';
  $data['user_empleados'] = $this->empleado_model->get_empleados();
  $data['nombres_equipos'] = $this->anadir_nombres($data['user_empleados']);
  $this->load->view('header_view',$data);
  $this->load->view('menu_view',$data);
  $this->load->view('empleado_view.php', $data);
  $this->load->view('footer_view',$data);
 }

 public function nuevo_empleado(){
  $data['menu']='Empleados';
  $data['title']= 'Nuevo empleado';
  $data['equipos'] = $this->equipo_model->get_equipos();
  $this->load->view('header_view',$data);
  $this->load->view('menu_view',$data);
  $this->load->view('addempleado_view.php', $data);
  $this->load->view('footer_view',$data);
 }


 public function add_empleado()
 {
  $this->load->library('form_validation');
  // field name, error message, validation rules
  $this->form_validation->set_rules('nombre', 'Nombre', 'trim|required');
  $this->form_validation->set_rules('sueldo', 'Sueldo', 'trim|required');
  $this->form_validation->set_rules('equipo', 'Equipo', 'trim|required');


  if($this->form_validation->run() == FALSE)
  {
   header('Location: '.base_url().'index.php/empleado');
  }
  else
  {
    $empleado = new empleado_model();
    $empleado->nombre =  $this->input->post('nombre');
    $empleado->sueldo = $this->input->post('sueldo');
    $empleado->id_equipo = $this->input->post('equipo');
    $empleado->id_user = $this->session->userdata('user_id');
    $empleado->save();
  header('Location: '.base_url().'index.php/empleado');
  }
 }

 public function editar_empleado()
 {
  $data['title']= 'Nuevo empleado';
  $data['menu']='Empleados';
  $data['equipos'] = $this->equipo_model->get_equipos();
  $data['empleado']= $this->empleado_model->get_empleado()[0];
  $this->load->view('header_view',$data);
  $this->load->view('menu_view',$data);
  $this->load->view('editempleado_view.php', $data);
  $this->load->view('footer_view',$data);
 }

 public function edit_empleado()
 {
  $this->load->library('form_validation');
  // field name, error message, validation rules
  $this->form_validation->set_rules('nombre', 'Nombre', 'trim|required');
  $this->form_validation->set_rules('sueldo', 'Sueldo', 'trim|required');
  $this->form_validation->set_rules('equipo', 'Equipo', 'trim|required');

  if($this->form_validation->run() == FALSE)
  {
   header('Location: '.base_url().'index.php/empleado');
  }
  else
  {
    $empleado = new empleado_model();
    $empleado->id_empleado = $this->input->post('id_empleado');
    $empleado->nombre =  $this->input->post('nombre');
    $empleado->sueldo = $this->input->post('sueldo');
    $empleado->id_equipo = $this->input->post('equipo');
    $empleado->id_user = $this->session->userdata('user_id');
    $empleado->save();

  header('Location: '.base_url().'index.php/empleado');
  }
 }

 public function eliminar()
 {
  $this->empleado_model->eliminar();
  header('Location: '.base_url().'index.php/empleado');
 }


public function anadir_nombres($empleados)
{
  $nombres_equipos= array();
  foreach ($empleados as $empleado) {
    array_push($nombres_equipos,$this->equipo_model->get_equipoid($empleado['id_equipo'])[0]['nombre']);
  }

  return $nombres_equipos;
}

}
?>