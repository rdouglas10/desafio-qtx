<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * This controller can be accessed 
 * for Aprovador group only
 */
class Aprovador extends MY_Controller {

	// protected $access = array("", "");
	protected $access = array("Aprovador");

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
       		"base_url"       	 => base_url('index.php/aprovador/p'),
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

       	$data['query_propostas'] = $this->proposta->get_all_profile_aprovador('id','asc',$config['per_page'],$offset);

        return $data;
    }

	

	public function index()
	{	
       	
       	$dados = $this->pagination();

       	$data['pagination'] 	 = $dados['pagination'];
       	$data['query_propostas'] = $dados['query_propostas'];

		$this->load->view("header");
		$this->load->view("navbar");
		$this->load->view("aprovador/aprovador_list_proposta", $data);
		$this->load->view("footer");
	
	}


	public function aprovar($id)
	{		
			$dados = $this->pagination();

			$data['pagination'] 	 = $dados['pagination'];
			// $data['query_propostas'] = $dados['query_propostas'];
			

			if($this->proposta->aprovar_proposta($id))
			{	
				$data['alert_message'] = 'Proposta desativada com sucesso!!!';	
				$data['type_alert'] = 'success';	
			}else
			{	
				$data['alert_message'] = 'A proposta #'.$id.' já estava aprovada!' ;
				$data['type_alert'] = 'danger';
			}
			
			
	  	 	$data['query_propostas'] = $this->proposta->get_all_profile_aprovador();
			

			$this->load->view("header");
			$this->load->view("navbar");
			$this->load->view("aprovador/aprovador_list_proposta", $data);
			$this->load->view("footer");	
	}


	public function recusar($id)
	{		
			$dados = $this->pagination();

			$data['pagination'] 	 = $dados['pagination'];
			$data['query_propostas'] = $dados['query_propostas'];


			if($this->proposta->recusar_proposta($id))
			{	
				
				$data['alert_message'] = 'Proposta recusada com sucesso!!!';	
				$data['type_alert'] = 'success';	
			}else
			{	

				$data['alert_message'] = ('A proposta #'.$id.' já estava recusada!') ;
				$data['type_alert'] = 'danger';
			}
			
			
	  	 	$data['query_propostas'] = $this->proposta->get_all_profile_aprovador();
			

			$this->load->view("header");
			$this->load->view("navbar");
			$this->load->view("aprovador/aprovador_list_proposta", $data);
			$this->load->view("footer");	
	}


	public function dowload_proposta($id)
	{	

		$dados_proposta = $this->proposta->get_dados_proposta($id);

		$dados_proposta_servicos = $this->proposta_servico->get_dados_proposta_servicos($dados_proposta[0]['id']);

		$dados_servicos = $this->servico->get_dados_servicos($dados_proposta_servicos);
		// echo $this->db->last_query();

		// echo $dados_proposta[0]['id'];

		// echo "<pre>";
		// print_r($dados_proposta);
		// echo "</pre>";

		// echo "<pre>";
		// print_r($dados_proposta_servicos);
		// echo "</pre>";

		// echo "<pre>";
		// print_r($dados_servicos);
		// echo "</pre>";
		// die();



		$data = [];

		$data['proposta'] = $dados_proposta; 
		$data['servicos'] = $dados_servicos; 

		$data['usuario']  =	($this->session->userdata['first_name']);
		

        //load the view and saved it into $html variable
        $html=$this->load->view('aprovador/proposta_pdf', $data, true);
 
        //this the the PDF filename that user will get to download
        $pdfFilePath = "proposta_qualitex.pdf";
 
        //load mPDF library
        $this->load->library('m_pdf');
 
       //generate the PDF from the given html
        $this->m_pdf->pdf->WriteHTML($html);
 
        //download it.
        $this->m_pdf->pdf->Output($pdfFilePath, "D"); 

	}

	
}