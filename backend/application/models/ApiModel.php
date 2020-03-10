<?php
defined('BASEPATH') OR exit('No direct script acess allowed');

class ApiModel extends CI_Model{

    private $aluno = 'aluno';

    //lista todos alunos
    public function read(){
        $query = $this->db->get('aluno');
        return $query->result();
    }

   public function insert($data){

        $this->nome = $data['nome'];
        $this->endereco  = $data['endereco'];
        $this->numero = $data['numero'];
        $this->bairro = $data['bairro'];
        $this->cidade = $data['cidade'];
        $this->uf = $data['uf'];
        $this->foto = $data['foto'];
        if($this->db->insert('aluno',$this))
        {    
            return 'Data is inserted successfully';
        }
          else
        {
            return "Error has occured";
        }
    }


    public function update($id,$data){
   
        $this->nome = $data['nome'];
        $this->endereco  = $data['endereco'];
        $this->numero = $data['numero'];
        $this->bairro = $data['bairro'];
        $this->cidade = $data['cidade'];
        $this->uf = $data['uf'];
        $this->foto = $data['foto'];
        $this->db->where('id', $id);
		$result = $this->db->update('aluno', $this);
        //  $result = $this->db->update('aluno',$this,array('id' => $id));
         if($result)
         {
             return "Data is updated successfully";
         }
         else
         {
             return "Error has occurred";
         }
     }

     public function delete($id){
   
        $result = $this->db->query("delete from `aluno` where id = $id");
        if($result)
        {
            return "Data is deleted successfully";
        }
        else
        {
            return "Error has occurred";
        }
    }
     
  
    
  



}



?>


