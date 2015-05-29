<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuarios extends CI_Controller {

	public function signup()
	{

		$data=array();
		//se cargan los modelos
		$this->load->model('Usuarios');

		$publication = new Publication();
		$publication->load(1);

		//pasamos la publicacion al array de datos
		$data['publication']=$publication;

		//lo mismo para issue
		$this->load->model('Issue');
		$issue = new Issue();
		$issue->load(1);

		$data['issue']= $issue;

		$this->load->view('magazines');
		$this->load->view('magazine', $data);
	}

	public function add(){
		$this->load->model('Publication');
		$publications=$this->Publication->get_all();

		$publicacion_form_options= array();
		foreach($publications as $id=>$publication){
			$publication_form_options[$id]= $publication['publication_name'];
		}

		$data['publication_form_options']=$publication_form_options;


		$this->load->library('form_validation');
		$this->form_validation->set_rules(array(

			array(
				'field' => 'publication_id',
				'label' => 'Publication',
				'rules' => 'required'
			),
			array(
				'field' => 'issue_number',
				'label' => 'Issue number',
				'rules' => 'required|is_numeric'
			),

			array(
				'field' => 'issue_date_publication',
				'label' => 'Publication date',
				'rules' => 'required|callback_date_validation'
			),
		));

		$this->form_validation->set_error_delimiters('<div class="alert alert-error">','</div>');

		if(!$this->form_validation->run()){
			$data['publication_form_options'] = $publicacion_from_options;
			$this->load->view('magazine_form',$data);
		}
		else{


		}

		$this->load->view('magazine_form', $data);
	}

	public function date_validation($input){
		$test_date = explode("-",$input);
		if(!@checkdate($test_date[1],$test_date[2],$test_date[0])){
			
			return FALSE;
		}
		else{
			return TRUE;
		}
	}


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */+