<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class partido extends CI_Controller{

 public function __construct()
 {
  parent::__construct();
  $this->load->model(array('partido_model','equipo_model','liga_model','resultado_model'));
 }


 public function index()
 {
  if(($this->session->userdata('user_name')!=""))
  {
   $this->main_partido();
  }
  else{
   header('Location: '.base_url().'index.php/user');
  }
 }


 public function main_partido()
 {
  $data['title']= 'Partidos';
  $data['menu']='Partidos';
  $data['ligas'] = $this->liga_model->get_leagues();
  $this->load->view('header_view',$data);
  $this->load->view('menu_view',$data);
  $this->load->view('partido_view.php', $data);
  $this->load->view('footer_view',$data);
 }

 public function select_liga(){
  $data['title']= 'Partidos';
  $data['menu']='Partidos';
  $data['liga']=$this->liga_model->get_leagueid($this->input->post('id_liga'))[0];
  $data['partidos']=$this->partido_model->get_partidos();
  $data['equipos_locales']=$this->anadir_nombres_local($this->partido_model->get_partidos());
  $data['equipos_visitantes']=$this->anadir_nombres_visitante($this->partido_model->get_partidos());
  $data['resultados']=$this->resultado_model->get_resultados();
  $data['equipos_clasificacion']=$this->anadir_nombres_clasificacion($this->resultado_model->get_resultados());


  $this->load->view('header_view',$data);
  $this->load->view('menu_view',$data);
  $this->load->view('selectliga_view.php', $data);
  $this->load->view('footer_view',$data);
 }

 public function add_select_liga(){
  $data['title'] = 'Partidos';
  $data['menu'] ='Partidos';
  $data['ligas'] = $this->liga_model->get_leagues();
  $this->load->view('header_view',$data);
  $this->load->view('menu_view',$data);
  $this->load->view('addselectliga_view.php', $data);
  $this->load->view('footer_view',$data);

 }

 public function nuevo_partido(){
  $data['menu']='Partidos';
  $data['title']= 'Nuevo partido';
  $data['liga'] = $this->liga_model->get_leagueid($this->input->get('id_liga'))[0];
  $data['equipos'] = $this->equipo_model->get_equipos_liga($this->input->get('id_liga'));
  $this->load->view('header_view',$data);
  $this->load->view('menu_view',$data);
  $this->load->view('addpartido_view.php', $data);
  $this->load->view('footer_view',$data);
 }


 public function add_partido()
 {
  $this->load->library('form_validation');
  // field name, error message, validation rules
  $this->form_validation->set_rules('fecha', 'Fecha', 'trim|required');
  $this->form_validation->set_rules('equipolocal', 'equipolocal', 'trim|required');
  $this->form_validation->set_rules('equipovisitante', 'equipovisitante', 'trim|required');
  $this->form_validation->set_rules('resultadolocal', 'resultadolocal', 'trim|required');
  $this->form_validation->set_rules('resultadovisitante', 'resultadovisitante', 'trim|required');
  $this->form_validation->set_rules('liga', 'liga', 'trim|required');


  if($this->form_validation->run() == FALSE)
  {
   header('Location: '.base_url().'index.php/partido');
  }
  else
  {
    if($this->input->post('equipolocal') != $this->input->post('equipovisitante')){
      $partido = new partido_model();
      $partido->fecha =  $this->input->post('fecha');
      $partido->id_equipo_local = $this->input->post('equipolocal');
      $partido->id_equipo_visitante = $this->input->post('equipovisitante');
      $partido->resultado_equipo_local = $this->input->post('resultadolocal');
      $partido->resultado_equipo_visitante = $this->input->post('resultadovisitante');
      $partido->id_liga = $this->input->post('liga');
      $partido->id_user = $this->session->userdata('user_id');
      $partido->save();


      if($partido->resultado_equipo_visitante > $partido->resultado_equipo_local){
        $this->anadir_resultado($partido->id_equipo_visitante,3,$partido->id_liga);
        $this->anadir_resultado($partido->id_equipo_local,0,$partido->id_liga);
      }
      elseif ($partido->resultado_equipo_visitante == $partido->resultado_equipo_local) {
        $this->anadir_resultado($partido->id_equipo_visitante,1,$partido->id_liga);
        $this->anadir_resultado($partido->id_equipo_local,1,$partido->id_liga);
      }
      else{
        $this->anadir_resultado($partido->id_equipo_local,3,$partido->id_liga);
        $this->anadir_resultado($partido->id_equipo_visitante,0,$partido->id_liga);
      }

    }
  header('Location: '.base_url().'index.php/partido');
  }
 }

 public function eliminar()
 {
  $this->partido_model->eliminar();
  header('Location: '.base_url().'index.php/partido');
 }


public function anadir_nombres_local($partidos)
{
  $nombres_equipos= array();
  foreach ($partidos as $partido) {
    array_push($nombres_equipos,$this->equipo_model->get_equipoid($partido['id_equipo_local'])[0]['nombre']);
  }

  return $nombres_equipos;
}
public function anadir_nombres_visitante($partidos)
{
  $nombres_equipos= array();
  foreach ($partidos as $partido) {
    array_push($nombres_equipos,$this->equipo_model->get_equipoid($partido['id_equipo_visitante'])[0]['nombre']);
  }

  return $nombres_equipos;
}

public function anadir_nombres_clasificacion($resultados)
{
  $nombres_equipos= array();
  foreach ($resultados as $resultado) {
    array_push($nombres_equipos,$this->equipo_model->get_equipoid($resultado['id_equipo'])[0]['nombre']);
  }

  return $nombres_equipos;
}


public function anadir_resultado($id, $puntos,$id_liga){

  $resultado = new resultado_model();

  if(sizeof($this->resultado_model->get_resultado($id)) == 0){

    $resultado->id_equipo = $id;
    $resultado->id_liga = $id_liga;
    $resultado->puntos = $puntos;
    $resultado->id_user = $this->session->userdata('user_id');
  }
  else{
    $aux = $this->resultado_model->get_resultado($id)[0];
    $resultado->id_resultado = $aux['id_resultado'];
    $resultado->id_liga = $aux['id_liga'];
    $resultado->id_equipo = $aux['id_equipo'];
    $resultado->puntos = $aux['puntos']+$puntos;
    $resultado->id_user = $this->session->userdata('user_id');
  }

  $resultado->save();

}

}
?>