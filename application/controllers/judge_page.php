<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Judge_page extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('gown_model');
		$this->load->model('swimwear_model');
		$this->load->model('production_model');
		$this->load->model('candidates_model');
		$this->load->model('tribal_model');
		$this->load->model('interview_model');
		$this->load->model('judges_model');
		$this->load->model('top3_model');
		
		$this->load->library('table');
		
		$this->load->library('session');
		$this->load->helper('url');
	}
	public function login(){
			$rSess = $this->session->all_userdata();
	
			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');		
			$data['title'] = "Judge Login 2";
			$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');
			$data['judgename'] = "";

			if($this->form_validation->run() == FALSE){
				$this->load->view("header", $data);
				$this->load->view('login', $data);
				$this->load->view("footer");
			}else{
				$info['username'] = $_POST['username'];
				$info['password'] = $_POST['password'];
				$login = $this->judges_model->get_judge_login($info);
				if(count($login)){
						$this->session->set_userdata('username', $_POST['username']);		
						$this->session->set_userdata('judge_id', $login['judge_id']);		
									
						redirect("judge_page/list_contestants/" . $login['judge_id']);
				}else{
					redirect("judge_page/login");
				}
			}
	
	}
	
	public function new_top3_entry($contestant_id = NULL, $judge_id = NULL){
			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');		
			//physical attribute 50%
			//intelligence 50%
			
			$this->form_validation->set_message('less_than', '%s must be within the specified range');
			$this->form_validation->set_message('greater_than', '%s must be  within the specified range');
			$this->form_validation->set_rules('physical_attribute', 'Physical Attribute', 'required|numeric|less_than[51]|greater_than[-1]|is_natural');
			$this->form_validation->set_rules('intelligence', 'Intelligence', 'required|numeric|less_than[51]|greater_than[-1]|is_natural');
			$candidate = $this->candidates_model->get_candidate_by_id($contestant_id);
			$data['picture_sub'] = $candidate['picture_sub'];
			if(is_null($contestant_id)){
				$contestant_id = $_POST['contestant_id'];
				$judge_id = $_POST['judge_id'];
			}
			$data['contestant_id'] = $contestant_id;
			$data['judge_id'] = $judge_id;
			$data['judgename'] = "Judge " . $judge_id;	
			$data['judge_id'] = $judge_id;
			
			$data['title'] = "Candidate Interview Category";
			if($this->form_validation->run() == FALSE){
				$this->load->view("header", $data);
				$this->load->view('new_top3_entry', $data);
				$this->load->view("footer");
			}else{
				$hasTop3 = $this->candidates_model->hasTop3($contestant_id, $judge_id);
				if(!$hasTop3){
				
					$info['contestant_id'] = $contestant_id;
					$info['judge_id'] = $judge_id;
					$info['physical_attribute'] = $_POST['physical_attribute'];
					$info['intelligence'] = $_POST['intelligence'];
					$info['total'] = $info['physical_attribute'] + $info['intelligence'];			
				
					$this->top3_model->new_top3_judge_entry($info);
				}
				redirect("judge_page/list_top3/" . $judge_id);
				
			}
	}	
	public function new_interview_entry($contestant_id = NULL, $judge_id = NULL){
			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');		
			//ELEGANCE 30%
			//FITNESS  20%
			//CUT&STYLE 15%
			//CHARM & CHARISMA 15%
			//EXECUTION & OVERALL APPEARANCE 10%
			//POISE, BEARING AND PROJECTION 10%
			
			$this->form_validation->set_message('less_than', '%s must be within the specified range');
			$this->form_validation->set_message('greater_than', '%s must be  within the specified range');
			$this->form_validation->set_rules('interview', 'Interview', 'required|numeric|less_than[101]|greater_than[-1]|is_natural');
			$candidate = $this->candidates_model->get_candidate_by_id($contestant_id);
			$data['picture_sub'] = $candidate['picture_sub'];
			if(is_null($contestant_id)){
				$contestant_id = $_POST['contestant_id'];
				$judge_id = $_POST['judge_id'];
			}
			$data['contestant_id'] = $contestant_id;
			$data['judge_id'] = $judge_id;
			$data['judgename'] = "Judge " . $judge_id;				
			
			$data['title'] = "Candidate Interview Category";
			if($this->form_validation->run() == FALSE){
				$this->load->view("header", $data);
				$this->load->view('new_interview_entry', $data);
				$this->load->view("footer");
			}else{
				$hasInterview = $this->candidates_model->hasInterview($contestant_id, $judge_id);
				if(!$hasInterview){
				
					$info['contestant_id'] = $contestant_id;
					$info['judge_id'] = $judge_id;
					$info['total'] = $_POST['interview'];			
				
					$this->interview_model->new_interview_judge_entry($info);
				}
				redirect("judge_page/list_contestants/" . $judge_id);
				
			}
	}
	
	public function new_gown_entry($contestant_id = NULL, $judge_id = NULL){
			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');		
			//ELEGANCE 30%
			//FITNESS  20%
			//CUT&STYLE 15%
			//CHARM & CHARISMA 15%
			//EXECUTION & OVERALL APPEARANCE 10%
			//POISE, BEARING AND PROJECTION 10%
			
			$this->form_validation->set_message('less_than', '%s must be within the specified range');
			$this->form_validation->set_message('greater_than', '%s must be  within the specified range');
			$this->form_validation->set_rules('elegance', 'Elegance', 'required|numeric|less_than[31]|greater_than[-1]|is_natural');
			
			$this->form_validation->set_rules('fitness', 'Fitness', 'required|numeric|less_than[21]|greater_than[-1]|is_natural');

			$this->form_validation->set_rules('cut_and_style', 'Cut and Style', 'required|numeric|less_than[16]|greater_than[-1]|is_natural');
			$this->form_validation->set_rules('charm_and_charisma', 'Charm and Charisma', 'required|numeric|less_than[16]|greater_than[-1]|is_natural');
			$this->form_validation->set_rules('execution', 'Execution and Overall Appearance', 'required|numeric|less_than[11]|greater_than[-1]|is_natural');

			$this->form_validation->set_rules('poise', 'Poise, Bearing and Projection', 'required|numeric|less_than[11]|greater_than[-1]|is_natural');
			$candidate = $this->candidates_model->get_candidate_by_id($contestant_id);
			$data['picture_sub'] = $candidate['picture_sub'];
			if(is_null($contestant_id)){
				$contestant_id = $_POST['contestant_id'];
				$judge_id = $_POST['judge_id'];
			}
			$data['judgename'] = "Judge " . $judge_id;				
			
			$data['contestant_id'] = $contestant_id;
			$data['judge_id'] = $judge_id;
			
			$data['title'] = "Candidate Gown Category";
			if($this->form_validation->run() == FALSE){
				$this->load->view("header", $data);
				$this->load->view('new_gown_entry', $data);
				$this->load->view("footer");
			}else{
				$hasGown = $this->candidates_model->hasGown($contestant_id, $judge_id);
				if(!$hasGown){
				
					$info['contestant_id'] = $contestant_id;
					$info['judge_id'] = $judge_id;
					$info['elegance'] = $_POST['elegance'];
					$info['fitness'] = $_POST['fitness'];
					$info['cut_and_style'] = $_POST['cut_and_style'];
					$info['charm_and_charisma'] = $_POST['charm_and_charisma'];
					$info['execution_and_overall_appearance'] = $_POST['execution'];
					$info['poise_bearing_and_projection'] = $_POST['poise'];
					$info['total'] = $info['elegance'] + $info['fitness'] + $info['cut_and_style'] + $info['charm_and_charisma'] + $info['execution_and_overall_appearance'] +	$info['poise_bearing_and_projection'];			
				
					$this->gown_model->new_gown_judge_entry($info);
				}
				redirect("judge_page/list_contestants/" . $judge_id);
				
			}
	}

	public function new_swimwear_entry($contestant_id = NULL,$judge_id = NULL){
			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');		
			//FITNESS  30%
			//CUT&STYLE 20%
			//CONFIDENCE 20%
			//GROOMING AND FASHION STYLE 20%
			//POISE, BEARING AND PROJECTION 10%
			
			
			$this->form_validation->set_message('less_than', '%s must be within the specified range');
			$this->form_validation->set_message('greater_than', '%s must be within the specified range');
			$this->form_validation->set_rules('fitness', 'Fitness', 'required|numeric|less_than[31]|greater_than[-1]|is_natural');

			$this->form_validation->set_rules('cut_and_style', 'Cut and Style', 'required|numeric|less_than[21]|greater_than[-1]|is_natural');

			$this->form_validation->set_rules('confidence', 'Confidence', 'required|numeric|less_than[21]|greater_than[-1]|is_natural');
			$this->form_validation->set_rules('grooming', 'Grooming and Fashion Style', 'required|numeric|less_than[21]|greater_than[-1]|is_natural');

			$this->form_validation->set_rules('poise', 'Poise, Bearing and Projection', 'required|numeric|less_than[11]|greater_than[-1]|is_natural');
			$candidate = $this->candidates_model->get_candidate_by_id($contestant_id);
			$data['picture_sub'] = $candidate['picture_sub'];
			if(is_null($contestant_id)){
				$contestant_id = $_POST['contestant_id'];
				$judge_id = $_POST['judge_id'];
			}
			$data['judgename'] = "Judge " . $judge_id;				
			
			$data['contestant_id'] = $contestant_id;
			$data['judge_id'] = $judge_id;
			
			$data['title'] = "Candidate Swimwear Category";
			if($this->form_validation->run() == FALSE){
				$this->load->view("header", $data);
				$this->load->view('new_swimwear_entry', $data);
				$this->load->view("footer");
			}else{
				$hasSwimwear = $this->candidates_model->hasSwimwear($contestant_id, $judge_id);
				if(!$hasSwimwear){
			
					$info['contestant_id'] = $contestant_id;
					$info['judge_id'] = $judge_id;
					$info['fitness'] = $_POST['fitness'];
					$info['cut_and_style'] = $_POST['cut_and_style'];
					$info['confidence'] = $_POST['confidence'];
					$info['grooming_and_fashion_style'] = $_POST['grooming'];
					$info['poise_bearing_projection'] = $_POST['poise'];
					$info['total'] = $info['fitness'] + $info['cut_and_style'] + $info['confidence'] + $info['grooming_and_fashion_style'] + $info['poise_bearing_projection'];
					$this->swimwear_model->new_swimwear_judge_entry($info);
				}
				redirect("judge_page/list_contestants/" . $judge_id);
				
			}
	}


	public function new_production_entry($contestant_id = NULL, $judge_id = NULL){
			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');		
			//mastery of steps  30%
			//gracefulness 25%
			//performance 20%
			//POISE, BEARING AND PROJECTION 15%
			//overall impact 10%
			
			$candidate = $this->candidates_model->get_candidate_by_id($contestant_id);
			$this->form_validation->set_message('less_than', '%s must be within the specified range');
			$this->form_validation->set_message('greater_than', '%s must be within the specified range');
			$this->form_validation->set_rules('mastery', 'Mastery of Steps', 'required|numeric|less_than[31]|greater_than[-1]|is_natural');


			$this->form_validation->set_rules('gracefulness', 'Gracefulness', 'required|numeric|less_than[26]|greater_than[-1]|is_natural');

			$this->form_validation->set_rules('performance', 'Performance', 'required|numeric|less_than[21]|greater_than[-1]|is_natural');

			$this->form_validation->set_rules('poise', 'Poise, Bearing and Projection', 'required|numeric|less_than[16]|greater_than[-1]|is_natural');

			$this->form_validation->set_rules('impact', 'Overall Impact', 'required|numeric|less_than[11]|greater_than[-1]|is_natural');
			if(is_null($contestant_id)){
				$contestant_id = $_POST['contestant_id'];
				$judge_id = $_POST['judge_id'];
			}
			$data['contestant_id'] = $contestant_id;
			$data['judge_id'] = $judge_id;
			$data['judgename'] = "Judge " . $judge_id;				
			
			$data['title'] = "Candidate Production Number Category";
			$data['picture_sub'] = $candidate['picture_sub'];
			if($this->form_validation->run() == FALSE){
				$this->load->view("header", $data);
				$this->load->view('new_production_entry', $data);
				$this->load->view("footer");
			}else{
				$hasProduction = $this->candidates_model->hasProduction($contestant_id, $judge_id);
				if(!$hasProduction){
			
					$info['contestant_id'] = $contestant_id;
					$info['judge_id'] = $judge_id;
					$info['mastery_of_steps'] = $_POST['mastery'];
					$info['gracefulness'] = $_POST['gracefulness'];
					$info['performance'] = $_POST['performance'];
					$info['poise_bearing_projection'] = $_POST['poise'];
					$info['overall_impact'] = $_POST['impact'];
					$info['total'] = $info['mastery_of_steps'] + $info['gracefulness'] + $info['performance'] + $info['poise_bearing_projection'] + $info['overall_impact'];
					$this->production_model->new_production_judge_entry($info);
				}
				redirect("judge_page/list_contestants/" . $judge_id);

			}
	}


	public function new_tribal_entry($contestant_id = NULL, $judge_id = NULL){
			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');		
			
			//creativity  30%
			//fitness 25%
			//cut and style 20%
			//color combination 15%
			//poise 10%
			
			
			$this->form_validation->set_message('less_than', '%s must be within the specified range');
			$this->form_validation->set_message('greater_than', '%s must be within the specified range');
			$this->form_validation->set_rules('creativity', 'Creativity', 'required|numeric|less_than[31]|greater_than[-1]|is_natural');


			$this->form_validation->set_rules('fitness', 'Fitness', 'required|numeric|less_than[26]|greater_than[-1]|is_natural');

			$this->form_validation->set_rules('cut_and_style', 'Cut and Style', 'required|numeric|less_than[21]|greater_than[-1]|is_natural');

			$this->form_validation->set_rules('color_combination', 'Color Combination', 'required|numeric|less_than[16]|greater_than[-1]|is_natural');

			$this->form_validation->set_rules('poise', 'Poise, Bearing and Projection', 'required|numeric|less_than[11]|greater_than[-1]|is_natural');

			$candidate = $this->candidates_model->get_candidate_by_id($contestant_id);
			$data['picture_sub'] = $candidate['picture_sub'];
			if(is_null($contestant_id)){
				$contestant_id = $_POST['contestant_id'];
				$judge_id = $_POST['judge_id'];
			}
			$data['judgename'] = "Judge " . $judge_id;				
			$data['contestant_id'] = $contestant_id;
			$data['judge_id'] = $judge_id;
			$data['title'] = "Candidate Tribal Costume Category";
			if($this->form_validation->run() == FALSE){
				$this->load->view("header", $data);
				$this->load->view('new_tribal_entry', $data);
				$this->load->view("footer");
			}else{
				$hasTribal = $this->candidates_model->hasTribal($contestant_id, $judge_id);
				if(!$hasTribal){
					$info['contestant_id'] = $contestant_id;
					$info['judge_id'] = $judge_id;
					$info['creativity'] = $_POST['creativity'];
					$info['fitness'] = $_POST['fitness'];
					$info['cut_and_style'] = $_POST['cut_and_style'];
					$info['color_combination'] = $_POST['color_combination'];
					$info['poise_bearing_projection'] = $_POST['poise'];
					$info['total'] = $info['creativity'] + + $info['fitness'] + $info['cut_and_style'] + $info['color_combination'] + $info['poise_bearing_projection'];
					$this->tribal_model->new_tribal_judge_entry($info);
				}
				redirect("judge_page/list_contestants/" . $judge_id);
			}
	}
	
	
	public function list_contestants($judge_id = NULL){
			$rSess = $this->session->all_userdata();
			if(!isset($rSess['username'])){
				redirect("judge_page/login");
			}

			$tmpl = array (
                    'table_open'          => '<table class="table1">',

                    'table_close'         => '</table>'
              );	
			$this->table->set_template($tmpl);      
			$candidates = $this->candidates_model->get_candidates();
			
			$i = 0;
						
			foreach($candidates as $row){
				$new_row = $row;
				$contestant_id = $new_row['contestant_id'];
				$new_row['picture_main'] = "<img src='/pageant/images/" . $new_row['picture_main'] . "' width='60px' />";
				$new_row['contestant_id'] = "<h1>" . $new_row['contestant_id'] ."</h1>";
				$hasTribal = $this->candidates_model->hasTribal($contestant_id, $judge_id);
				if(!$hasTribal){
					$tribalclass = "button-link";
				}else{
					$tribalclass = "button-link-red";

				}
				$hasProduction = $this->candidates_model->hasProduction($contestant_id, $judge_id);
				if(!$hasProduction){
					$pclass = "button-link";
				}else{
					$pclass = "button-link-red";

				}
				$hasSwimwear = $this->candidates_model->hasSwimwear($contestant_id, $judge_id);
				if(!$hasSwimwear){
					$swimclass = "button-link";
				}else{
					$swimclass = "button-link-red";

				}
				$hasGown = $this->candidates_model->hasGown($contestant_id, $judge_id);
				if(!$hasGown){
					$gclass = "button-link";
				}else{
					$gclass = "button-link-red";

				}
				$hasInterview = $this->candidates_model->hasInterview($contestant_id, $judge_id);
				if(!$hasInterview){
					$iclass = "button-link";
				}else{
					$iclass = "button-link-red";

				}
				
				$new_row['categories'] = "<a href='/pageant/index.php/judge_page/new_tribal_entry/" . $contestant_id . "/" . $judge_id . "' class='$tribalclass'>TRIBAL</a>&nbsp;<a href='/pageant/index.php/judge_page/new_swimwear_entry/" . $contestant_id . "/" . $judge_id . "' class='$swimclass'>SWIMWEAR</a>&nbsp;<a href='/pageant/index.php/judge_page/new_production_entry/" . $contestant_id . "/" . $judge_id . "' class='$pclass'>PRODUCTION</a>&nbsp;<a href='/pageant/index.php/judge_page/new_gown_entry/" . $contestant_id . "/" . $judge_id . "' class='$gclass'>GOWN</a>&nbsp;<a href='/pageant/index.php/judge_page/new_interview_entry/" . $contestant_id . "/" . $judge_id . "' class='$iclass'>INTERVIEW</a>";
				
				$candidates[$i] = $new_row;
				$i++;
			}
			
			$this->table->set_heading('Contestant No.', 'Picture', 'Name', 'Categories');
			$data['candidates'] = $this->table->generate($candidates);
			$data['judgename'] = "Judge " . $judge_id;
			$data['judge_id'] = $judge_id;
			$this->load->view("header", $data);
			$this->load->view("contestants_list", $data);
			$this->load->view("footer");
			
	
	}
	
	public function list_finalists(){

			$tmpl = array (
                    'table_open'          => '<table class="table1">',

                    'table_close'         => '</table>'
              );	
			$this->table->set_template($tmpl);      
			$candidates = $this->candidates_model->get_finalists();
			$i = 0;
						
			foreach($candidates as $row){
				$new_row = $row;
				$contestant_id = $new_row['contestant_id'];
				$new_row['picture_main'] = "<img src='/pageant/images/" . $new_row['picture_main'] . "' width='100px' />";
				$new_row['contestant_id'] = "<h1>" . $new_row['contestant_id'] ."</h1>";
				
				$candidates[$i] = $new_row;
				$i++;
			}
			$this->table->set_heading('Contestant No.', 'Picture', 'Name', 'Total');
			$data['candidates'] = $this->table->generate($candidates);
			$this->load->view("header3");
			$this->load->view("contestants_list", $data);
			$this->load->view("footer");
			
	
	}	
    public function list_candidates_ranking(){
			$tmpl = array (
                    'table_open'          => '<table class="table1" width="780px">',

                    'table_close'         => '</table>'
              );	
			$this->table->set_template($tmpl);      
			
			$candidates = $this->candidates_model->get_candidates_ranking();
			
			$i = 0;
						
			foreach($candidates as $row){
				$new_row = $row;
				$contestant_id = $new_row['contestant_id'];
				$tot = $this->candidates_model->get_candidate_final_tribal_by_id($contestant_id);
				$new_row['final'] = 0.0;
				if(count($tot)){
					$new_row['tribal'] = number_format($tot['tot'], 2);					
					$new_row['final'] += 0.15 * $new_row['tribal'] ;
				}else{
					$new_row['tribal'] = "na";
				}	
				$tot = $this->candidates_model->get_candidate_final_production_by_id($contestant_id);
				if(count($tot)){
					$new_row['production'] = number_format($tot['tot'], 2);
					$new_row['final'] += 0.15 * $new_row['production'] ;
				}else{
					$new_row['production'] = "na";
				}	
				$tot = $this->candidates_model->get_candidate_final_gown_by_id($contestant_id);
				if(count($tot)){
					$new_row['gown'] = number_format($tot['tot'], 2);
					$new_row['final'] += 0.15 * $new_row['gown'] ;
				}else{
					$new_row['gown'] = "na";
				}	
				$tot = $this->candidates_model->get_candidate_final_swimwear_by_id($contestant_id);
				if(count($tot)){
					$new_row['swimwear'] = number_format($tot['tot'], 2);
					$new_row['final'] += 0.15 * $new_row['swimwear'] ;
				}else{
					$new_row['swimwear'] = "na";
				}	
				$tot = $this->candidates_model->get_candidate_final_interview_by_id($contestant_id);
				if(count($tot)){
					$new_row['interview'] = number_format($tot['tot'], 2);
					$new_row['final'] += 0.2 * $new_row['interview'] ;
				}else{
					$new_row['interview'] = "na";
				}	
				$tot = $this->candidates_model->get_candidate_final_talent_by_id_2($contestant_id);
				if(count($tot)){
					$new_row['talent'] = number_format($tot['tot'], 2);
					$new_row['final'] += 0.2 * $new_row['talent'] ;

				}else{
					$new_row['talent'] = "na";
				}	
				$new_row['final'] = number_format($new_row['final'], 2);
				$new_row['tribal'] = "<a href='/pageant/index.php/judge_page/list_by_candidate_tribal/" . $contestant_id . "'>" . $new_row['tribal'] . "</a>";
				$new_row['production'] = "<a href='/pageant/index.php/judge_page/list_by_candidate_production/" . $contestant_id . "'>" . $new_row['production'] . "</a>";
				$new_row['gown'] = "<a href='/pageant/index.php/judge_page/list_by_candidate_gown/" . $contestant_id . "'>" . $new_row['gown'] . "</a>";
				$new_row['swimwear'] = "<a href='/pageant/index.php/judge_page/list_by_candidate_swimwear/" . $contestant_id . "'>" . $new_row['swimwear'] . "</a>";
				$new_row['interview'] = "<a href='/pageant/index.php/judge_page/list_by_candidate_interview/" . $contestant_id . "'>" . $new_row['interview'] . "</a>";
				$new_row['contestant_id'] = "<h1>" . $new_row['contestant_id'] ."</h1>";
				$candidates[$i] = $new_row;
				$info['final'] = $new_row['final'];
				$info['contestant_id'] = $contestant_id;
				$this->candidates_model->update_categories($info);
				$i++;
			}
			
			$this->table->set_heading('Contestant No.', 'Name', 'Tribal (15%)','Production (15%)','Gown (15%)','Swimwear (15%)','Interview (20%)','Talent (20%)', 'Final');
			$data['candidates'] = $this->table->generate($candidates);
			//$data['judgename'] = "Judge " . $judge_id;				
			
			$this->load->view("header", $data);
			$this->load->view("contestants_list", $data);
			$this->load->view("footer");
			

    }
	public function list_top3($judge_id = NULL){
	
			$tmpl = array (
                    'table_open'          => '<table class="table1" width="780px">',

                    'table_close'         => '</table>'
              );	
			$this->table->set_template($tmpl);      
			$candidates = $this->candidates_model->get_candidates_top3();
			
			$i = 0;
						
			foreach($candidates as $row){
				$new_row = $row;
				$contestant_id = $new_row['contestant_id'];
				$new_row['picture_main'] = "<img src='/pageant/images/" . $new_row['picture_main'] . "' width='60px' />";
				$new_row['contestant_id'] = "<h1>" . $new_row['contestant_id'] ."</h1>";
				$hasTop3 = $this->candidates_model->hasTop3($contestant_id, $judge_id);
				if(!$hasTop3){
					$t3class = "button-link";
				}else{
					$t3class = "button-link-red";

				}
				
				$new_row['categories'] = "<a href='/pageant/index.php/judge_page/new_top3_entry/" . $contestant_id . "/" . $judge_id . "' class='$t3class'>TOP 3</a>";
				
				$candidates[$i] = $new_row;
				$i++;
			}
			
			$this->table->set_heading('Contestant No.', 'Picture', 'Name', 'Categories');
			$data['candidates'] = $this->table->generate($candidates);
			$data['judgename'] = "Judge " . $judge_id;	
			$data['judge_id'] = $judge_id;
						
			$this->load->view("header", $data);
			$this->load->view("contestants_list", $data);
			$this->load->view("footer");
			
	
	}


	public function list_by_candidate_tribal($candidate_id = NULL){
	
			$tmpl = array (
                    'table_open'          => '<table class="table1">',

                    'table_close'         => '</table>'
              );	
			$this->table->set_template($tmpl);      
			$candidates = $this->candidates_model->get_candidate_tribals($candidate_id);
			$total = $this->candidates_model->get_candidate_final_tribal_by_id($candidate_id);
			$i = 0;						
			foreach($candidates as $row){
				$new_row = $row;
				$new_row['total'] = number_format($new_row['total'], 2);				
				$candidates[$i] = $new_row;
				$i++;
			}			
			if($i > 0){
				$candidates[] = array('Average', number_format($total['tot'], 2));
			}else{
				$candidates = array();
			}
			$this->table->set_heading('Judge No.', 'Total');
			$data['candidates'] = $this->table->generate($candidates);
			$data['candidatedata'] = $this->candidates_model->get_candidate_by_id($candidate_id);
			$data['title'] = "Tribal Costume Category";
			$this->load->view("header2");
			$this->load->view("contestants_ranking", $data);
			$this->load->view("footer");
			
	
	}
	public function list_by_candidate_gown($candidate_id = NULL){
	
			$tmpl = array (
                    'table_open'          => '<table class="table1">',

                    'table_close'         => '</table>'
              );	
			$this->table->set_template($tmpl);      
			$candidates = $this->candidates_model->get_candidate_gowns($candidate_id);
			$total = $this->candidates_model->get_candidate_final_gown_by_id($candidate_id);
			$i = 0;						
			foreach($candidates as $row){
				$new_row = $row;
				$new_row['total'] = number_format($new_row['total'], 2);				
				$candidates[$i] = $new_row;
				$i++;
			}			
			if($i > 0){
				$candidates[] = array('Average', number_format($total['tot'], 2));
			}else{
				$candidates = array();
			}
			$this->table->set_heading('Judge No.', 'Total');
			$data['candidates'] = $this->table->generate($candidates);
			$data['candidatedata'] = $this->candidates_model->get_candidate_by_id($candidate_id);
			$data['title'] = "Evening Gown Category";
			$this->load->view("header2");
			$this->load->view("contestants_ranking", $data);
			$this->load->view("footer");
			
	
	}

	public function list_by_candidate_swimwear($candidate_id = NULL){
	
			$tmpl = array (
                    'table_open'          => '<table class="table1">',

                    'table_close'         => '</table>'
              );	
			$this->table->set_template($tmpl);      
			$candidates = $this->candidates_model->get_candidate_swimwears($candidate_id);
			$total = $this->candidates_model->get_candidate_final_swimwear_by_id($candidate_id);
			$i = 0;						
			foreach($candidates as $row){
				$new_row = $row;
				$new_row['total'] = number_format($new_row['total'], 2);				
				$candidates[$i] = $new_row;
				$i++;
			}			
			if($i > 0){
				$candidates[] = array('Average', number_format($total['tot'], 2));
			}else{
				$candidates = array();
			}
			$this->table->set_heading('Judge No.', 'Total');
			$data['candidates'] = $this->table->generate($candidates);
			$data['candidatedata'] = $this->candidates_model->get_candidate_by_id($candidate_id);
			$data['title'] = "Swimwear Category";
			$this->load->view("header2");
			$this->load->view("contestants_ranking", $data);
			$this->load->view("footer");
			
	
	}

	public function list_by_candidate_production($candidate_id = NULL){
	
			$tmpl = array (
                    'table_open'          => '<table class="table1">',

                    'table_close'         => '</table>'
              );	
			$this->table->set_template($tmpl);      
			$candidates = $this->candidates_model->get_candidate_productions($candidate_id);
			$total = $this->candidates_model->get_candidate_final_production_by_id($candidate_id);
			$i = 0;						
			foreach($candidates as $row){
				$new_row = $row;
				$new_row['total'] = number_format($new_row['total'], 2);				
				$candidates[$i] = $new_row;
				$i++;
			}			
			if($i > 0){
				$candidates[] = array('Average', number_format($total['tot'], 2));
			}else{
				$candidates = array();
			}
			$this->table->set_heading('Judge No.', 'Total');
			$data['candidates'] = $this->table->generate($candidates);
			$data['candidatedata'] = $this->candidates_model->get_candidate_by_id($candidate_id);
			$data['title'] = "Production Number Category";
			$this->load->view("header2");
			$this->load->view("contestants_ranking", $data);
			$this->load->view("footer");
			
	
	}


	public function list_by_candidate_interview($candidate_id = NULL){
	
			$tmpl = array (
                    'table_open'          => '<table class="table1">',

                    'table_close'         => '</table>'
              );	
			$this->table->set_template($tmpl);      
			$candidates = $this->candidates_model->get_candidate_interviews($candidate_id);
			$total = $this->candidates_model->get_candidate_final_interview_by_id($candidate_id);
			$i = 0;						
			foreach($candidates as $row){
				$new_row = $row;
				$new_row['total'] = number_format($new_row['total'], 2);				
				$candidates[$i] = $new_row;
				$i++;
			}			
			if($i > 0){
				$candidates[] = array('Average', number_format($total['tot'], 2));
			}else{
				$candidates = array();
			}
			$this->table->set_heading('Judge No.', 'Total');
			$data['candidates'] = $this->table->generate($candidates);
			$data['candidatedata'] = $this->candidates_model->get_candidate_by_id($candidate_id);
			$data['title'] = "Interview Category";
			$this->load->view("header2");
			$this->load->view("contestants_ranking", $data);
			$this->load->view("footer");
			
	
	}
	
	public function logout(){
		$this->session->unset_userdata('username');
		redirect("judge_page/login");
	}
	

}
