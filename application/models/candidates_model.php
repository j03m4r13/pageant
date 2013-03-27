<?php

class Candidates_model extends CI_Model{

	public function __construct(){
		$this->load->database();
	}
	public function get_finalists(){
		$query = NULL;
		$sql = "select a.contestant_id, a.picture_main,a.name,  AVG(b.total) as tot  from candidates as a INNER JOIN top3 as b on a.contestant_id=b.contestant_id   group by a.contestant_id ORDER BY 4 DESC;";
		$query = $this->db->query($sql);
		return $query->result_array();
	
	}
	public function update_categories($info = NULL){
		$query = NULL;
		$sql = "UPDATE candidates set final = ? where contestant_id = ?";
		$query = $this->db->query($sql,array($info['final'], $info['contestant_id']));
	}
	public function get_candidates(){
		$query = NULL;
		$sql = "select contestant_id,picture_main,name from candidates;";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	public function get_candidates_top3(){
		$query = NULL;
		$sql = "select contestant_id,picture_main,name from candidates ORDER BY final DESC LIMIT 3;";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function get_candidates_ranking(){
		$query = NULL;
		$sql = "select contestant_id,name,tribal,production,gown,swimwear,interview,talent,final from candidates ORDER BY final DESC;";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function get_candidate_by_id($contestant_id = NULL){
		$query = NULL;
		$sql = "select * from candidates where contestant_id = ?;";
		$query = $this->db->query($sql, array($contestant_id));
		return $query->row_array();
	}

	public function get_candidate_by_name($name = NULL){
		$query = NULL;
		$sql = "select * from candidates where name = ?;";
		$query = $this->db->query($sql, array($name));
		return $query->row_array();
	}
	public function hasTribal($contestant_id = NULL, $judge_id){
		$query = NULL;
		$sql = "select * from tribal where contestant_id = ? and judge_id = ?;";
		$query = $this->db->query($sql, array($contestant_id, $judge_id));
		return count($query->row_array());
		
	}
	public function hasGown($contestant_id = NULL, $judge_id){
		$query = NULL;
		$sql = "select * from gown where contestant_id = ? and judge_id = ?;";
		$query = $this->db->query($sql, array($contestant_id, $judge_id));
		return count($query->row_array());
		
	}
	public function hasSwimwear($contestant_id = NULL, $judge_id){
		$query = NULL;
		$sql = "select * from swimwear where contestant_id = ? and judge_id = ?;";
		$query = $this->db->query($sql, array($contestant_id, $judge_id));
		return count($query->row_array());
		
	}
	public function hasProduction($contestant_id = NULL, $judge_id){
		$query = NULL;
		$sql = "select * from production where contestant_id = ? and judge_id = ?;";
		$query = $this->db->query($sql, array($contestant_id, $judge_id));
		return count($query->row_array());
		
	}
	public function hasInterview($contestant_id = NULL, $judge_id){
		$query = NULL;
		$sql = "select * from interview where contestant_id = ? and judge_id = ?;";
		$query = $this->db->query($sql, array($contestant_id, $judge_id));
		return count($query->row_array());
		
	}
	public function hasTop3($contestant_id = NULL, $judge_id){
		$query = NULL;
		$sql = "select * from top3 where contestant_id = ? and judge_id = ?;";
		$query = $this->db->query($sql, array($contestant_id, $judge_id));
		return count($query->row_array());
		
	}

//SCORES AND TOTALS *************	///*****************************
	public function get_candidate_final_tribal_by_id($contestant_id = NULL){
		$query = NULL;
		$sql = "select a.contestant_id,a.name, AVG(b.total) as tot from candidates as a INNER JOIN tribal as b on a.contestant_id=b.contestant_id where a.contestant_id = ? GROUP BY a.contestant_id";
		$query = $this->db->query($sql, array($contestant_id));
		return $query->row_array();
	}
	public function get_candidate_tribals($contestant_id = NULL){
		$query = NULL;
		$sql = "select b.judge_id, b.total  from candidates as a INNER JOIN tribal as b on a.contestant_id=b.contestant_id where a.contestant_id = ? ORDER BY b.judge_id ASC";
		$query = $this->db->query($sql, array($contestant_id));
		return $query->result_array();
	}

	public function get_candidate_final_production_by_id($contestant_id = NULL){
		$query = NULL;
		$sql = "select a.name,a.contestant_id, AVG(b.total) as tot from candidates as a INNER JOIN production as b on a.contestant_id=b.contestant_id where a.contestant_id = ? GROUP BY a.contestant_id";
		$query = $this->db->query($sql, array($contestant_id));
		return $query->row_array();
	}

	public function get_candidate_productions($contestant_id = NULL){
		$query = NULL;
		$sql = "select b.judge_id, b.total  from candidates as a INNER JOIN production as b on a.contestant_id=b.contestant_id where a.contestant_id = ?";
		$query = $this->db->query($sql, array($contestant_id));
		return $query->result_array();
	}

	public function get_candidate_final_gown_by_id($contestant_id = NULL){
		$query = NULL;
		$sql = "select a.name,a.contestant_id, AVG(b.total) as tot from candidates as a INNER JOIN gown as b on a.contestant_id=b.contestant_id where a.contestant_id = ? GROUP BY a.contestant_id";
		$query = $this->db->query($sql, array($contestant_id));
		return $query->row_array();
	}

	public function get_candidate_gowns($contestant_id = NULL){
		$query = NULL;
		$sql = "select b.judge_id, b.total  from candidates as a INNER JOIN gown as b on a.contestant_id=b.contestant_id where a.contestant_id = ?";
		$query = $this->db->query($sql, array($contestant_id));
		return $query->result_array();
	}
	public function get_candidate_final_swimwear_by_id($contestant_id = NULL){
		$query = NULL;
		$sql = "select a.name,a.contestant_id, AVG(b.total) as tot from candidates as a INNER JOIN swimwear as b on a.contestant_id=b.contestant_id where a.contestant_id = ? GROUP BY a.contestant_id";
		$query = $this->db->query($sql, array($contestant_id));
		return $query->row_array();
	}

	public function get_candidate_swimwears($contestant_id = NULL){
		$query = NULL;
		$sql = "select b.judge_id, b.total  from candidates as a INNER JOIN swimwear as b on a.contestant_id=b.contestant_id where a.contestant_id = ?";
		$query = $this->db->query($sql, array($contestant_id));
		return $query->result_array();
	}

	public function get_candidate_final_interview_by_id($contestant_id = NULL){
		$query = NULL;
		$sql = "select a.name,a.contestant_id, AVG(b.total) as tot from candidates as a INNER JOIN interview as b on a.contestant_id=b.contestant_id where a.contestant_id = ? GROUP BY a.contestant_id";
		$query = $this->db->query($sql, array($contestant_id));
		return $query->row_array();
	}

	public function get_candidate_interviews($contestant_id = NULL){
		$query = NULL;
		$sql = "select b.judge_id, b.total  from candidates as a INNER JOIN interview as b on a.contestant_id=b.contestant_id where a.contestant_id = ?";
		$query = $this->db->query($sql, array($contestant_id));
		return $query->result_array();
	}

	public function get_candidate_final_talent_by_id($contestant_id = NULL){
		$query = NULL;
		$sql = "select a.name,a.contestant_id, AVG(b.total) as tot from candidates as a INNER JOIN talent as b on a.contestant_id=b.contestant_id where a.contestant_id = ? GROUP BY a.contestant_id";
		$query = $this->db->query($sql, array($contestant_id));
		return $query->row_array();
	}
	public function get_candidate_final_talent_by_id_2($contestant_id = NULL){
		$query = NULL;
		$sql = "select name,contestant_id, talent as tot from candidates where contestant_id = ?";
		$query = $this->db->query($sql, array($contestant_id));
		return $query->row_array();
	}

	public function get_candidate_talent($contestant_id = NULL){
		$query = NULL;
		$sql = "select a.name,a.contestant_id, b.total  from candidates as a INNER JOIN talent as b on a.contestant_id=b.contestant_id where a.contestant_id = ?";
		$query = $this->db->query($sql, array($contestant_id));
		return $query->result_array();
	}

	public function get_candidate_top3($contestant_id = NULL){
		$query = NULL;
		$sql = "select b.judge_id, b.total  from candidates as a INNER JOIN top3 as b on a.contestant_id=b.contestant_id where a.contestant_id = ?";
		$query = $this->db->query($sql, array($contestant_id));
		return $query->result_array();
	}
	public function get_candidate_final_top3_by_id($contestant_id = NULL){
		$query = NULL;
		$sql = "select a.name,a.contestant_id, AVG(b.total) as tot from candidates as a INNER JOIN top3 as b on a.contestant_id=b.contestant_id where a.contestant_id = ? GROUP BY a.contestant_id";
		$query = $this->db->query($sql, array($contestant_id));
		return $query->row_array();
	}

}


?>