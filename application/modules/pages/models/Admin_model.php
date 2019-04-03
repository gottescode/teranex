<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Admin_model extends CI_Model {

    // constructor of this class
    function __construct() {
        // call parent constructor 
			parent::__construct();
	
    }

    public function findSingleTeam($strWhere = 1) {
		return $this->db_lib->fetchSingle('teranex_team', $strWhere,'');
	}
	 
	public function userRoleList($strWhere) {
		$result=$this->db_lib->fetchMultiple("user_type_master", " isActive = 1 ","");//exit; 
		return $result;
	}
	public function menuList($strWhere) {
		$result=$this->db_lib->fetchMultiple("menu_master", " active = 1 ","");//exit; 
		return $result;
	}
	public function menuListByuserRoleType($data) {
		$user_role = $data['user_role'];
		$user_type = $data['user_type'];
		$result=$this->db_lib->fetchMultiple(" user_menu_access_master as UMA LEFT JOIN menu_master MM ON UMA.menu=MM.menu_id", " user_type = {$user_type} AND  user_role = {$user_role} AND access = 1 AND active=1 ","MM.menu_id,menu_desc,menu_url,menu_for,parent_id,UMA.id,user_type,user_role,menu");
		return $result;
	}
	/* public function getUserRole($id) {
		$table = " usertype_role_association as URA LEFT JOIN role_master as rm ON rm.id = URA.role_id";
		$select = " URA.*,rm.*";
		$result=$this->db_lib->fetchMultiple($table, " URA.usertype_id = {$id} ",$select);//exit; 
		return $result;
	}	 */
	public function getUserRole($id) {
		$table = " usertype_role_association as URA LEFT JOIN role_master as rm ON rm.id = URA.role_id";
		$select = " URA.*,rm.*";
		$result=$this->db_lib->fetchMultiple($table, " URA.usertype_id = {$id} ",$select);//exit; 
		return $result;
	}
	public function getUserAccessRoles($data) {
		$user_type = $data['user_type'];
		$user_role = $data['user_role'];
		$result=$this->db_lib->fetchMultiple('user_menu_access_master'," user_type = {$user_type} AND user_role={$user_role}",$select);//exit; 
		return $result;
	}
	public function updatePublishCategory($data){
	//	print_r($data);exit;
		$user_type = $data['type']; 
		$user_role = $data['role'];
		$result = $this->db_lib->delete('user_menu_access_master', " user_type = {$user_type} AND user_role = {$user_role} " . $id);
		//exit;
		// get total records
		$ids = $data['menuaccess'];
		if(count($ids)>0){
			foreach($ids as $id){
				$dataInsert['user_type'] = $user_type;
				$dataInsert['user_role'] = $user_role;
				$dataInsert['access'] = 1;
				$dataInsert['menu'] = $id;
				$result = $this->db_lib->insert("user_menu_access_master",$dataInsert); 
			}
			return true;
		}
		return false;
	}
}
?>