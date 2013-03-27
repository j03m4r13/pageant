<?php

class Production_model extends CI_Model{

	public function __construct(){
		$this->load->database();
	}
	public function new_production_judge_entry($info = NULL){
		$query = NULL;
		$sql = "INSERT INTO production(contestant_id,judge_id,mastery_of_steps,gracefulness,performance,poise_bearing_projection,overall_impact, total) " .
				" VALUES(?,?,?,?,?,?,?,?)";
		$query = $this->db->query($sql, array($info['contestant_id'], $info['judge_id'], $info['mastery_of_steps'],
											  $info['gracefulness'], $info['performance'], $info['poise_bearing_projection'],
											  $info['overall_impact'],  $info['total']));
	}
	public function get_production_entry_by_candidate($contestant_id = NULL){
		$query = NULL;
		$sql = "SELECT a.*, b.* from production as a INNER JOIN candidates as b on a.contestant_id=b.contestant_id where a.contestant_id = ? ORDER BY a.total DESC;";
		$query = $this->db->query($sql, array($contestant_id));
		return $query->result_array();
	}
	public function get_production_entry_by_judge($judge_id = NULL){
		$query = NULL;
		$sql = "SELECT a.*, b.* from production as a INNER JOIN candidates as b on a.contestant_id=b.contestant_id where a.judge_id = ? ORDER BY a.total DESC;";
		$query = $this->db->query($sql, array($judge_id));
		return $query->result_array();
	}


}


?>