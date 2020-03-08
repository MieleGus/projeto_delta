<?php
defined('BASEPATH') OR exit('No direct script acess allowed');

class ApiModel extends CI_Model{
    //lista todos alunos
    public function get_alunos(){
        $query = $this->db->get('aluno');
        return $query->result();
    }

    //lista aluno por id
    function get_aluno($id) {
        $query = $this->db->get_where($this->aluno, array("id" => $id));
        if ($query) {
            return $query->row();
        }
        return NULL;
    }
    

    private $alunos = 'alunos';
    //
    function post_alunos($nome, $endereco, $numero, $bairro, $cidade, $uf, $foto) {
        $data = array('nome' => $nome, 'endereco' => $endereco, 'numero' => $numero, 'bairro' => $bairro, 'cidade' => $cidade, 'uf' => $uf, 'foto' => $foto);
        $this->db->insert($this->alunos, $data);
    }

    // function update_alunos($website_id, $website_title, $website_url) {
    //     $data = array('title' => $website_title, 'url' => $website_url);
    //     $this->db->where('id', $website_id);
    //     $this->db->update($this->website, $data);
    // }


}



?>


