<?php
class Proposta_model extends CI_Model {

        public $descricao;
        public $data_criacao;
        public $status;
        public $ativo;
        public $user_id;
        


        public function __construct() {
            parent::__construct();
        }


        public function get_all_profile_aprovador($sort = 'id', $order = 'asc', $limit = null, $offset = null) 
        {
            $where = 'status in ("Aprovado","Negado","Pendente") AND ativo = "S"';    
            $this->db->where($where);

            $this->db->order_by($sort, $order);
            if($limit)
              $this->db->limit($limit,$offset);
            $query = $this->db->get('propostas');
            if ($query->num_rows() > 0) {
              return $query->result_array();
            } else {
              return null;
            }
        }


        public function get_all($sort = 'id', $order = 'asc', $limit = null, $offset = null) 
        {
               
            $this->db->order_by($sort, $order);
            if($limit)
              $this->db->limit($limit,$offset);
            $query = $this->db->get('propostas');
            if ($query->num_rows() > 0) {
              return $query->result_array();
            } else {
              return null;
            }
        }


        public function get_all_propostas($sort = 'id', $order = 'asc', $limit = 5, $offset = null) 
        {
                $query = $this->db->get('propostas');
                return $query->result_array();
        }


        public function get_dados_proposta($id) 
        {
                $this->db->where('id',$id);
                $query = $this->db->get('propostas');

                return $query->result_array();
        }
        
        public function insert_proposta($data)
        {       
                $this->db->insert('propostas', $data);
                return $this->db->affected_rows();
        }


        public function count_all_proposta()
        {
                return $this->db->count_all('propostas');
        }


        // public function delete_proposta($id){
        //         // $this -> db -> where('id', $id);
        //         $this ->db->delete('propostas',array('id' => $id, 'status' => 'Em Elaboracao'));
        //         // echo $this->db->last_query();
        //         return $this->db->affected_rows();
                
                
        // }


        public function desativar_proposta($id)
        {   
            $this->db->where('id',$id);
            $where = '(status = "Em Elaboracao")';
            $this->db->where($where);
            $this->db->update('propostas', array('ativo' => 'N'));
            
            return $this->db->affected_rows();
        }


        public function update_status($id)
        {   
            // $this->db->where('id',$id);
            // $this->db->where('ativo','S');
            $this->db->where(array('id' => $id, 'ativo' => 'S'));
            $where = '(status = "Em Elaboracao")';
            $this->db->where($where);
            $this->db->update('propostas', array('status' => 'Pendente'));
            return $this->db->affected_rows();
        }


        public function aprovar_proposta($id)
        {   
            $this->db->where(array('id' => $id, 'ativo' => 'S'));
            $this->db->update('propostas', array('status' => 'Aprovado'));
            return $this->db->affected_rows();
        }


        public function recusar_proposta($id)
        {   
            $this->db->where('id',$id);
            $this->db->update('propostas', array('status' => 'Negado'));
            return $this->db->affected_rows();
        }


        public function last_id_proposta(){
            $this->db->select_max('id');
            $result= $this->db->get('propostas')->row_array();
            return $result['id'];
        }


}
?>