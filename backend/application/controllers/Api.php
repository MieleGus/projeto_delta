<?php
// use chriskacerguis\RestServer\RestController;
use chriskacerguis\RestServer\RestController;
use Restserver\Libraries\REST_Controller;
require (APPPATH . 'libraries/RestController.php');
require APPPATH . 'libraries/Format.php';



defined('BASEPATH') OR exit('No direct script acess allowed');


class Api extends RestController{
    
       
    public function __construct() {
        parent::__construct();
        $this->load->model('ApiModel');
    }

    // public function dialogs_get(){
    //     echo "Test"; 
    // }

    function alunos_get(){ //alunos_get (lista toods alunos)
        $this->load->model('ApiModel');
        $alunos = $this->ApiModel->get_alunos();
        // var_dump($alunos);
        if ($alunos) {
            $this->response($alunos, 200);
        } else {
            $this->response(NULL, 404);
        }
   }

    public function aluno_get(){ // lista aluno por id
        $this->load->model('ApiModel');
        if (!$this->get('id')) {
            $this->response(NULL, 400);
        }

        $aluno = $this->ApiModel->get_aluno($this->get('id'));

        if ($aluno) {
            $this->response($aluno, 200); // 200 being the HTTP response code
        } else {
            $this->response(NULL, 404);
        }

    }

     function index_post() {
        $this->load->model('ApiModel');
        $result = $this->ApiModel->update( $this->post('id'), array(
            'nome' => $this->post('name'),
            'endereco' => $this->post('email'),
            'numero' => $this->post('numero'),
            'bairro' => $this->post('bairro'),
            'cidade' => $this->post('cidade'),
            'uf' => $this->post('uf'),
            'foto' => $this->post('foto')
        ));
             
        if($result === FALSE)
        {
            $this->response(array('status' => 'failed'));
        }
             
        else
        {
            $this->response(array('status' => 'success'));
        }
             
    }

}

?>