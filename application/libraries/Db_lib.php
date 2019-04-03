<?php
if (!defined('BASEPATH'))
 exit('No direct script access allowed');
/**
 * Library Class
 *
 * @categoryLibrary
 * @DeveloperJaywant Narwade Technopia
 * @Updated on 16 mar 2016
 * This class basically deals with the database
 * It is required to load "database" Library ( of codeigniter ) 
 * in order to use this class and its methods
 *
 * */
class Db_lib {
 private $CI;
 private $table;
 private $primary;
 function __construct() {
 // get instance of codeigniter
 $this->CI = & get_instance();
 }
 //Load Blank Record
 function loadBlank($table) {
 //initialize table name
 $this->table = $table;

 //get all column names from initialized table
 $strSql = "SELECT column_name, column_key FROM information_schema.columns WHERE table_name='{$this->table}'";
 $query = $this->CI->db->query($strSql);
 if ($query->num_rows() > 0) {
 foreach ($query->result_array() as $fieldName) {
 $arrResult[$fieldName["column_name"]] = "";
 if ($fieldName["column_key"] == "PRI") {
 $pri[] = $fieldName['column_name'];
 }
 }
 //store primary key column
 $this->primary = $pri[0];
 }
 return $arrResult;
 }

 // Fetch Single Record
 function fetchSingle($strTableName, $strWhere = NULL, $arrFields = NULL, $intDebug = 0) {
 if ($arrFields == NULL)
 $strColsList = '*';
 else
 $strColsList = $arrFields;
 
 

 $strSql = 'SELECT ' . $strColsList . ' FROM ' . $strTableName;
 if ($strWhere != NULL)
 $strSql .= ' WHERE ' . $strWhere;

 if ($intDebug == 1) {
 echo $strSql;
 }

 $query = $this->CI->db->query($strSql);

 if ($query->num_rows() > 0)
 return $arrResult = $query->row_array();

 return 0;
 }

 // Fetch Multiple Records
 function fetchMultiple($strTableName, $strWhere = NULL, $arrFields = NULL, $intDebug = 0) {
 if ($arrFields == NULL)
 $strColsList = '*';
 else
 $strColsList = $arrFields;

 $strSql = 'SELECT ' . $strColsList . ' FROM ' . $strTableName;
 if ($strWhere != NULL)
 $strSql .= ' WHERE ' . $strWhere;

 if ($intDebug == 1)
 echo $strSql;

 $query = $this->CI->db->query($strSql);

 if ($query->num_rows() > 0)
 return $arrResult = $query->result_array();

 return 0;
 }

 //Insert Record
 function insert($strTableName, $arrData, $intDebug = 0) {
 if (count($arrData) == 0) {
 //return 0;
 }
 
 foreach($arrData as $k => $v)
 $arrData[$k] = htmlspecialchars($v,ENT_QUOTES);

 $arrInsert = $this->match($strTableName, $arrData);

 if (count($arrInsert) == 0) {
 //return 0;
 }

 if ($intDebug == 1) {
 echo $this->CI->db->insert_string($strTableName, $arrInsert);
 exit();
 }

 $this->CI->db->insert($strTableName, $arrInsert);
 return $this->CI->db->insert_id();
 }

 //Insert Multiple Records In Single Query
 function insert_batch($strTableName, $arrData, $intDebug = 0) {
 if (count($arrData) == 0) {
 //return 0;
 }

 
 foreach($arrData as $key => $data) 
 foreach($data as $k => $v)
 $arrData[$key][$k] = htmlspecialchars($v,ENT_QUOTES);
 
 
 
 foreach ($arrData as $array_row) {
 $arrInsert[] = $this->match($strTableName, $array_row);
 }

 if (count($arrInsert) == 0) {
 //return 0;
 }

 $this->CI->db->trans_begin();

 $this->CI->db->insert_batch($strTableName, $arrInsert);

 if ($intDebug == 1) {
 echo $this->CI->db->last_query();
 $this->CI->db->trans_rollback();
 exit();
 }
 $this->CI->db->trans_commit();

 return $this->CI->db->affected_rows();
 }

 //Update Record
 function update($strTableName, $arrData, $strWhere, $intDebug = 0) {
 if (count($arrData) == 0) {
 //return 0;
 }

 foreach($arrData as $k => $v)
 $arrData[$k] = htmlspecialchars($v,ENT_QUOTES);
 
 $arrUpdate = $this->match($strTableName, $arrData);
 if (count($arrUpdate) == 0) {
 //return 0;
 $select = "";
 } else {
 $select = implode(",", array_keys($arrUpdate));
 }

 if ($intDebug == 1) {
 echo $this->CI->db->update_string($strTableName, $arrUpdate, $strWhere);
 exit();
 }

 /* --- Checking For Same Data ( existing record and data to be updated ) --- */
 $existData = $this->fetchSingle($strTableName, $strWhere, $select);

 if ($existData === $arrUpdate) // if same then no need to update it. Return updation success.
 return 1;
 /* ------------------------------------------------------------------- */

 $this->CI->db->update($strTableName, $arrUpdate, $strWhere);
 if ($this->CI->db->affected_rows() != 0) {
 return 1;
 }
 return 0;
 }

 //Delete Record
 function delete($strTableName, $strWhere) {
 $this->CI->db->where($strWhere);
 $this->CI->db->delete($strTableName);

 if ($this->CI->db->affected_rows() != 0) {
 return 1;
 }
 return 0;
 }

 //Delete All Records
 function empty_table($strTableName) {
 $this->CI = & get_instance();

 $this->CI->db->empty_table($strTableName);

 if ($this->CI->db->affected_rows() != 0) {
 return 1;
 }
 return 0;
 }

 //Truncate Table
 function truncate($strTableName) {
 $this->CI->db->truncate($strTableName);
 return 1;
 }

 //Match Data fields with table columns
 private function match($strTableName, $arrData) {
 $query = $this->CI->db->query('DESC ' . $strTableName);

 $arrTableColumns = array();
 if ($query->num_rows() > 0) {
 foreach ($query->result_array() as $row) {
 $arrTableColumns[trim($row['Field'])] = trim($row['Field']);
 }
 }

 $arrQdata = array();
 foreach ($arrData as $column => $value) {
 foreach ($arrTableColumns as $tableKey => $tableValue) {
 if (trim($column) == trim($tableKey)) {
 $arrQdata[$column] = $value;
 break;
 }
 }
 }
 return $arrQdata;
 }

}