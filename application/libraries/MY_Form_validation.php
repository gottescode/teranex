<?php

class MY_Form_validation extends CI_Form_validation {
	
	public $CI;
	
    /* function run($module = '', $group = ''){
        is_object($module) AND $this->CI = &$module;
        return parent::run($group);
    } */
	
	public function is_unique($str, $field)
	{
		sscanf($field, '%[^.].%[^.]', $table, $field);
		return is_object($this->CI->db)
			? ($this->CI->db->limit(1)->get_where($table, array($field => $str))->num_rows() === 0)
			: FALSE;
	} 
	 public function is_unique_update($str, $field){
		sscanf($field, '%[^.].%[^.].%[^.].%[^.]', $table, $field, $field_pk_key, $field_pk_val);
		return is_object($this->CI->db)
			? ($this->CI->db->limit(1)->get_where($table, 
					array(
						$field => $str, 
						"{$field_pk_key} != " => $field_pk_val
					)
				)->num_rows() === 0)
			: FALSE;
	}

}