<?php

class Judges_model extends CI_Model{

	public function __construct(){
		$this->load->database();
	}
	public function get_judges(){
		$query = NULL;
		$sql = "select * from judges;";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	public function get_judge_by_id($judge_id = NULL){
		$query = NULL;
		$sql = "select * from judges where judges_id = ?;";
		$query = $this->db->query($sql, array($judge_id));
		return $query->row_array();
	}
	public function get_judge_login($info = NULL){
		$query = NULL;
		$sql = "select * from judges where username = ? and password = ?;";
		$query = $this->db->query($sql, array($info['username'], $info['password']));
		return $query->row_array();
	}
	public function get_judge_by_name($name = NULL){
		$query = NULL;
		$sql = "select * from judges where name = ?;";
		$query = $this->db->query($sql, array($name));
		return $query->row_array();
	}
}


?>