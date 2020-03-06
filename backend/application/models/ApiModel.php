<?php
defined('BASEPATH') OR exit('No direct script acess allowed');

class ApiModel extends CI_Model{
    //lista todos alunos
    public function getAlunos(){
        $query = $this->db->get('aluno');
        return $query->result();
    }

    //lista aluno por id
    function getAluno($id) {
        $query = $this->db->get_where($this->aluno, array("id" => $id));
        if ($query) {
            return $query->row();
        }
        return NULL;
    }
    


    private $alunos = 'alunos';
    //
    function postAlunos($nome, $endereco, $numero, $bairro, $cidade, $uf, $foto) {
        $data = array('nome' => $nome, 'endereco' => $endereco, 'numero' => $numero, 'bairro' => $bairro, 'cidade' => $cidade, 'uf' => $uf, 'foto' => $foto);
        $this->db->insert($this->alunos, $data);
    }
}



?>


