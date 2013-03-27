<?php

class Swimwear_model extends CI_Model{

	public function __construct(){
		$this->load->database();
	}
	public function new_swimwear_judge_entry($info = NULL){
		$query = NULL;
		$sql = "INSERT INTO swimwear(contestant_id,judge_id,fitness,cut_and_style, " .
				" confidence,grooming_and_fashion_style, poise_bearing_projection, total) " .
				" VALUES(?,?,?,?,?,?,?,?)";
		$query = $this->db->query($sql, array($info['contestant_id'], $info['judge_id'], $info['fitness'], $info['cut_and_style'], $info['confidence'],
											  $info['grooming_and_fashion_style'], $info['poise_bearing_projection'], $info['total']));
	}
	public function update_swimwear_judge_entry($info = NULL){
		$query = NULL;
		$sql = "UPDATE swimwear set fitness = ?, cut_and_style = ?, confidence = ?, grooming_and_fashion_style = ?, " .
				" poise_bearing_projection = ?, total = ? where swim_id = ?";
		$query = $this->db->query($sql, array($info['fitness'], $info['cut_and_style'], $info['confidence'],
											  $info['grooming_and_fashion_style'], $info['poise_bearing_projection'], $info['total'], $info['swim_id']));
	}
	public function get_swimwear_entry_by_candidate($contestant_id = NULL){
		$query = NULL;
		$sql = "SELECT a.*, b.* from swimwear as a INNER JOIN candidates as b on a.contestant_id=b.contestant_id where a.contestant_id = ? ORDER BY a.total DESC;";
		$query = $this->db->query($sql, array($contestant_id));
		return $query->result_array();
	}
	public function get_swimwear_entry_by_judge($judge_id = NULL){
		$query = NULL;
		$sql = "SELECT a.*, b.* from swimwear as a INNER JOIN candidates as b on a.contestant_id=b.contestant_id where a.judge_id = ? ORDER BY a.total DESC;";
		$query = $this->db->query($sql, array($judge_id));
		return $query->result_array();
	}


}


?>