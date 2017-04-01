<?php
class Proposta_servicos_model extends CI_Model {

        
        public $data_criacao;
        public $propostas_id;
        public $servicos_id;
        

        public function __construct() {

            parent::__construct();
        }


        public function insert_proposta_servico($data) {     

            $this->db->insert('proposta_servicos', $data);
		}

		
		public function get_dados_proposta_servicos($array) 
        {
                $query = $this->db->get_where('proposta_servicos','propostas_id = "'.$array.'"');
                // $query = $this->db->get_where('proposta_servicos','propostas_id in ("'.$array.'")');
                // $query = $this->db->get('proposta_servicos');

                $array_proposta_servicos = $query->result_array();
                // $array_ids = array();
                // $indice = 0;
                $array_ids = "(";
                foreach ($array_proposta_servicos as $key => $value) {
                    $array_ids .= $array_proposta_servicos[$key]['servicos_id'].',';
                	// $array_ids[$indice] = $array_proposta_servicos[$key]['id'];
                	// $indice +=1;
                }

                $array_ids .= ')';
                
                $array_ids = str_replace(',)', ')', $array_ids);
                

				return $array_ids;
        }


}       
?>