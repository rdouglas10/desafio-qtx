<?php
class Servico_model extends CI_Model {

        public $nome;
        public $descricao;
        public $valor;
        public $ativo;        
        public $tipos_servicos_id;

        public function get_all_servico() 
        {
                $query = $this->db->get('servicos');
                return $query->result_array();
        }

        public function insert_servico()
        {
                $this->nome                = $_POST['nome']; 
                $this->descricao           = $_POST['descricao'];
                $this->valor               = $_POST['valor'];
                $this->ativo               = $_POST['ativo'];
                $this->tipos_servicos_id   = $_POST['tipos_servicos_id'];

                $this->db->insert('servicos', $this);
        }

        public function update_servico()
        {
                $this->nome                = $_POST['nome']; 
                $this->descricao           = $_POST['descricao'];
                $this->valor               = $_POST['valor'];
                $this->ativo               = $_POST['ativo'];
                $this->tipos_servicos_id   = $_POST['tipos_servicos_id'];

                $this->db->update('servicos', $this, array('id' => $_POST['id']));
        }


        public function get_dados_servicos($array) 
        {               
                        // $where = 'id in ("'.$id.'")'
          //       $this->db->where($where);
          //       $query = $this->db->get('proposta_servicos');
                $query = $this->db->get_where('servicos','id in '.$array.'');

                return $query->result_array();
        }

}
?>