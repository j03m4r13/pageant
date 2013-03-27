<?php

class Gown_model extends CI_Model{

	public function __construct(){
		$this->load->database();
	}
	public function new_gown_judge_entry($info = NULL){
		$query = NULL;
		$sql = "INSERT INTO gown(contestant_id,judge_id,elegance,fitness,cut_and_style, " .
				" charm_and_charisma,execution_and_overall_appearance, poise_bearing_projection, total) " .
				" VALUES(?,?,?,?,?,?,?,?,?)";
		$query = $this->db->query($sql, array($info['contestant_id'], $info['judge_id'], $info['elegance'],
											  $info['fitness'], $info['cut_and_style'], $info['charm_and_charisma'],
											  $info['execution_and_overall_appearance'], $info['poise_bearing_and_projection'], $info['total']));
	}
	public function update_gown_judge_entry($info = NULL){
		$query = NULL;
		$sql = "UPDATE gown set elegance = ?, fitness = ?, cut_and_style = ?, charm_and_charisma = ?, execution_and_overall_appearance = ?, " .
				" poise_bearing_projection = ?, total = ? where gown_id = ?";
		$query = $this->db->query($sql, array($info['elegance'], $info['fitness'], $info['cut_and_style'], $info['charm_and_charisma'],
											  $info['execution_and_overall_appearance'], $info['poise_bearing_and_projection'], $info['total'], $info['gown_id']));
	}
	public function get_gown_entry_by_candidate($contestant_id = NULL){
		$query = NULL;
		$sql = "SELECT a.*, b.* from gown as a INNER JOIN candidates as b on a.contestant_id=b.contestant_id where a.contestant_id = ? ORDER BY a.total DESC;";
		$query = $this->db->query($sql, array($contestant_id));
		return $query->result_array();
	}
	public function get_gown_entry_by_judge($judge_id = NULL){
		$query = NULL;
		$sql = "SELECT a.*, b.* from gown as a INNER JOIN candidates as b on a.contestant_id=b.contestant_id where a.judge_id = ? ORDER BY a.total DESC;";
		$query = $this->db->query($sql, array($judge_id));
		return $query->result_array();
	}


}


?>