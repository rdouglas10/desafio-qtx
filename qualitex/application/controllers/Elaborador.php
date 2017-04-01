<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * This controller can be accessed 
 * for Elaborador group only
 */
class Elaborador extends MY_Controller {

	protected $access = "Elaborador";


	public function __construct()
        {
            parent::__construct();
            $this->load->model('proposta_model', 'proposta');
            $this->load->model('servico_model', 'servico');
            $this->load->model('proposta_servicos_model', 'proposta_servico');
        }


    public function pagination()
    {
    	$config = array(
       		"base_url"       	 => base_url('index.php/elaborador/p'),
       		"per_page"       	 => 5,
       		"num_links"      	 => 3, 
       		"uri_segment"    	 => 3,
       		"total_rows"     	 => $this->proposta->count_all_proposta(),
       		"full_tag_open"  	 => "<ul class='pagination'>",
       		"full_tag_close"   	 => "</ul>",
       		"first_link"	 	 => FALSE,
       		"last_link"	 		 => FALSE,
       		"first_tag_open"	 => "<li>",
       		"first_tag_close"	 => "</li>",
       		"prev_link"	 		 => "Anterior",
       		"prev_tag_open"	 	 => "<li class='prev'>",
       		"prev_tag_close"	 => "</li>",
       		"next_link"	 		 => "Proximo",
       		"next_tag_open"	 	 => "<li class='next'>",
       		"next_tag_close"	 => "</li>",
       		"last_tag_open"	 	 => "<li>",
       		"last_tag_close"	 => "</li>",
       		"cur_tag_open"	 	 => "<li class='active'><a href='#'>",
       		"cur_tag_close"	     => "</a></li>",
       		"num_tag_open"	 	 => "<li>",
       		"num_tag_close"	     => "</li>",
       		);

       	$this->pagination->initialize($config);

       	$data['pagination'] = $this->pagination->create_links();
       	$offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

       	$data['query_propostas'] = $this->proposta->get_all('id','asc',$config['per_page'],$offset);

        return $data;
    }

	

	public function index()
	{	
       	
       	$dados = $this->pagination();

       	$data['pagination'] 	 = $dados['pagination'];
       	$data['query_propostas'] = $dados['query_propostas'];

		$this->load->view("header");
		$this->load->view("navbar");
		$this->load->view("elaborador/elaborador_list_proposta", $data);
		$this->load->view("footer");
	
	}


	public function add()
	{	
		
		if(!$this->input->post())
		{

			$data['id_user']    = $this->session->userdata['id'];
			$data['username']   = $this->session->userdata['username'];
			$data['first_name'] = $this->session->userdata['first_name'];
			$data['last_name']  = $this->session->userdata['last_name'];
			
			$data['query_servicos'] = 	$this->servico->get_all_servico();

			$this->load->view("header");
			$this->load->view("navbar");
			$this->load->view("elaborador/elaborador_add_proposta", $data);
			$this->load->view("footer");
		}else
		{	

			if(!empty($this->input->post('descricao')))
			{	

				$data = array(
				'descricao'    => $this->input->post('descricao'),
				'data_criacao' => date("Y-m-d H:i:s"),
				'status'       => $this->input->post('status'),
				'ativo'        => $this->input->post('ativo'),
				'user_id'      => $this->input->post('user_id'),
				);	

				

				if($this->proposta->insert_proposta($data))
				{	
					$servicos = $this->input->post('servicos_id');
					if($servicos)
					{
						foreach ($servicos as $key => $value) {
							
							$dados_ps['propostas_id'] = $this->proposta->last_id_proposta();	
							$dados_ps['servicos_id'] = $value;
							$dados_ps['data_criacao'] = date("Y-m-d H:i:s");

							$this->proposta_servico->insert_proposta_servico($dados_ps);
						}
					}
				}else
				{
					// nothing
				}


				// $data['query_propostas'] = 	$this->proposta->get_all_propostas();
				$dados = $this->pagination();

		       	$data['pagination'] 	 = $dados['pagination'];
		       	$data['query_propostas'] = $dados['query_propostas'];

				$data['sucess_message'] = 'Dados cadastrados com sucesso!!!';

				$this->load->view("header");
				$this->load->view("navbar");
				$this->load->view("elaborador/elaborador_list_proposta", $data);
				$this->load->view("footer");

			}else{
				
				$data['query_servicos'] = $this->servico->get_all_servico();

				$this->load->library('form_validation');
				$this->form_validation->set_rules("descricao", "Descrição", "required|min_length[5]", array('required' => '*Você deve preencher a %s.'));

				if ($this->form_validation->run() == FALSE) 
				{
			        $this->load->view("header");
					$this->load->view("navbar");
					$this->load->view("elaborador/elaborador_add_proposta", $data);
					$this->load->view("footer");
				}else
                {
                    $this->load->view('dont_have');
                }
				
			}
		}

	}


	public function desativar($id)
	{		
			$dados = $this->pagination();

			$data['pagination'] 	 = $dados['pagination'];
			$data['query_propostas'] = $dados['query_propostas'];
			

			if($this->proposta->desativar_proposta($id))
			{	
				$data['alert_message'] = 'Proposta desativada com sucesso!!!';	
				$data['type_alert'] = 'success';	
			}else
			{	
				$data['alert_message'] = 'Não foi possivel excluir essa proposta. #'.$id ;
				$data['type_alert'] = 'danger';
			}
			
			
	  	 	// $data['query_propostas'] = $this->proposta->get_all_propostas();
			

			$this->load->view("header");
			$this->load->view("navbar");
			$this->load->view("elaborador/elaborador_list_proposta", $data);
			$this->load->view("footer");	
	}


	public function send($id)
	{		
			$dados = $this->pagination();

			$data['pagination'] 	 = $dados['pagination'];
			$data['query_propostas'] = $dados['query_propostas'];


			if($this->proposta->update_status($id))
			{	
				
				$data['alert_message'] = 'Proposta enviada com sucesso!!!';	
				$data['type_alert'] = 'success';	
			}else
			{	

				$data['alert_message'] = 'Não foi possivel enviar essa proposta. #'.$id ;
				$data['type_alert'] = 'danger';
			}
			
			
	  	 	// $data['query_propostas'] = $this->proposta->get_all_propostas();
			

			$this->load->view("header");
			$this->load->view("navbar");
			$this->load->view("elaborador/elaborador_list_proposta", $data);
			$this->load->view("footer");	
	}


}