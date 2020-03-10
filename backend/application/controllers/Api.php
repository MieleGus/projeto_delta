<?php
defined('BASEPATH') OR exit('No direct script acess allowed');
require(APPPATH.'/libraries/REST_Controller.php');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");
class Api extends REST_Controller{
    
       
    function __construct() {
        parent::__construct();
        $this->load->model('ApiModel');
    }

    
    public function alunos_get($id = 0)
	{
        if(!empty($id)){
            $data = $this->db->get_where("aluno", ['id' => $id])->row_array();
        }else{
            $data = $this->ApiModel->read();
        }
     
        $this->response($data, REST_Controller::HTTP_OK);
    }

     function alunos_post(){
        $data = array(
            'nome' => $this->post('nome'),
            'endereco' => $this->post('endereco'),
            'numero' => $this->post('numero'),
            'bairro' => $this->post('bairro'),
            'cidade' => $this->post('cidade'),
            'uf' => $this->post('uf'),
            'foto' => $this->post('foto')
        );
        $r = $this->ApiModel->insert($data);
        $this->response($r); 
    }

    public function alunos_put(){
        $id = $this->uri->segment(3);

        $data = array(
            'nome' => $this->put('nome'),
            'endereco' => $this->put('endereco'),
            'numero' => $this->put('numero'),
            'bairro' => $this->put('bairro'),
            'cidade' => $this->put('cidade'),
            'uf' => $this->put('uf'),
            'foto' => $this->put('foto')
        );
         $r = $this->ApiModel->update($id,$data);
         $this->response($r); 
    }
    public function alunos_delete(){
        $id = $this->uri->segment(3);
        $r = $this->ApiModel->delete($id);
        $this->response($r); 
    }
  

      
}

?>