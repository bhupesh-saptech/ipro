<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class : User_model (User Model)
 * User model class to get to handle user related data 
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class User_model extends CI_Model
{
    /**
     * This function is used to get the user listing count
     * @param string $searchText : This is optional search text
     * @return number $count : This is row count
     */
    function userListingCount($searchText)
    {
        $this->db->select('a.user_id, a.email, a.name, a.mobile, a.isAdmin, a.createdDtm, Role.role');
        $this->db->from('users as BaseTbl');
        $this->db->join('tbl_roles as Role', 'Role.role_id = a.role_id','left');
        if(!empty($searchText)) {
            $likeCriteria = "(a.email  LIKE '%".$searchText."%'
                            OR  a.name  LIKE '%".$searchText."%'
                            OR  a.mobile  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->where('a.deleted', 0);
        // $this->db->where('a.role_id !=', 1);
        $query = $this->db->get();
        
        return $query->num_rows();
    }
    
    /**
     * This function is used to get the user listing count
     * @param string $searchText : This is optional search text
     * @param number $page : This is pagination offset
     * @param number $segment : This is pagination limit
     * @return array $result : This is result
     */
    function userListing($searchText, $page, $segment)
    {
        $this->db->select('a.user_id, a.email, a.name, a.mobile, a.isAdmin, a.createdDtm, 
        Role.role, Role.status as roleStatus');
        $this->db->from('users as BaseTbl');
        $this->db->join('tbl_roles as Role', 'Role.role_id = a.role_id','left');
        if(!empty($searchText)) {
            $likeCriteria = "(a.email  LIKE '%".$searchText."%'
                            OR  a.name  LIKE '%".$searchText."%'
                            OR  a.mobile  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->where('a.deleted', 0);
        // $this->db->where('a.role_id !=', 1);
        $this->db->order_by('a.user_id', 'DESC');
        $this->db->limit($page, $segment);
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
    }
    
    /**
     * This function is used to get the user roles information
     * @return array $result : This is result of the query
     */
    function getUserRoles()
    {
        $this->db->select('role_id, role_nm, role_st');
        $this->db->from('roles');
        $query = $this->db->get();
        
        return $query->result();
    }

    /**
     * This function is used to check whether email id is already exist or not
     * @param {string} $email : This is email id
     * @param {number} $user_id : This is user id
     * @return {mixed} $result : This is searched result
     */
    function checkEmailExists($email, $user_id = 0)
    {
        $this->db->select("email");
        $this->db->from("users");
        $this->db->where("email", $email);   
        $this->db->where("deleted", 0);
        if($user_id != 0){
            $this->db->where("user_id !=", $user_id);
        }
        $query = $this->db->get();

        return $query->result();
    }
    
    
    /**
     * This function is used to add new user to system
     * @return number $insert_id : This is last inserted id
     */
    function addNewUser($userInfo)
    {
        $this->db->trans_start();
        $this->db->insert('users', $userInfo);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
    
    /**
     * This function used to get user information by id
     * @param number $user_id : This is user id
     * @return array $result : This is user information
     */
    function getUserInfo($user_id)
    {
        $this->db->select('user_id, name, email, mobile, isAdmin, role_id');
        $this->db->from('users');
        $this->db->where('deleted', 0);
        $this->db->where('user_id', $user_id);
        $query = $this->db->get();
        
        return $query->row();
    }
    
    
    /**
     * This function is used to update the user information
     * @param array $userInfo : This is users updated information
     * @param number $user_id : This is user id
     */
    function editUser($userInfo, $user_id)
    {
        $this->db->where('user_id', $user_id);
        $this->db->update('users', $userInfo);
        
        return TRUE;
    }
    
    
    
    /**
     * This function is used to delete the user information
     * @param number $user_id : This is user id
     * @return boolean $result : TRUE / FALSE
     */
    function deleteUser($user_id, $userInfo)
    {
        $this->db->where('user_id', $user_id);
        $this->db->update('users', $userInfo);
        
        return $this->db->affected_rows();
    }


    /**
     * This function is used to match users password for change password
     * @param number $user_id : This is user id
     */
    function matchOldPassword($user_id, $oldPassword)
    {
        $this->db->select('user_id, pass_wd');
        $this->db->where('user_id', $user_id);        
        $this->db->where('deleted', 0);
        $query = $this->db->get('users');
        
        $user = $query->result();

        if(!empty($user)){
            if(verifyHashedPassword($oldPassword, $user[0]->password)){
                return $user;
            } else {
                return array();
            }
        } else {
            return array();
        }
    }
    
    /**
     * This function is used to change users password
     * @param number $user_id : This is user id
     * @param array $userInfo : This is user updation info
     */
    function changePassword($user_id, $userInfo)
    {
        $this->db->where('user_id', $user_id);
        $this->db->where('deleted', 0);
        $this->db->update('users', $userInfo);
        
        return $this->db->affected_rows();
    }


    /**
     * This function is used to get user login history
     * @param number $user_id : This is user id
     */
    function loginHistoryCount($user_id, $searchText, $fromDate, $toDate)
    {
        $this->db->select('a.user_id, a.sessionData, a.machineIp, a.userAgent, a.agentString, a.platform, a.createdDtm');
        if(!empty($searchText)) {
            $likeCriteria = "(a.sessionData LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        if(!empty($fromDate)) {
            $likeCriteria = "DATE_FORMAT(a.createdDtm, '%Y-%m-%d' ) >= '".date('Y-m-d', strtotime($fromDate))."'";
            $this->db->where($likeCriteria);
        }
        if(!empty($toDate)) {
            $likeCriteria = "DATE_FORMAT(a.createdDtm, '%Y-%m-%d' ) <= '".date('Y-m-d', strtotime($toDate))."'";
            $this->db->where($likeCriteria);
        }
        if($user_id >= 1){
            $this->db->where('a.user_id', $user_id);
        }
        $this->db->from('tbl_last_login as BaseTbl');
        $query = $this->db->get();
        
        return $query->num_rows();
    }

    /**
     * This function is used to get user login history
     * @param number $user_id : This is user id
     * @param number $page : This is pagination offset
     * @param number $segment : This is pagination limit
     * @return array $result : This is result
     */
    function loginHistory($user_id, $searchText, $fromDate, $toDate, $page, $segment)
    {
        $this->db->select('a.user_id, a.sessionData, a.machineIp, a.userAgent, a.agentString, a.platform, a.createdDtm');
        $this->db->from('tbl_last_login as BaseTbl');
        if(!empty($searchText)) {
            $likeCriteria = "(a.sessionData  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        if(!empty($fromDate)) {
            $likeCriteria = "DATE_FORMAT(a.createdDtm, '%Y-%m-%d' ) >= '".date('Y-m-d', strtotime($fromDate))."'";
            $this->db->where($likeCriteria);
        }
        if(!empty($toDate)) {
            $likeCriteria = "DATE_FORMAT(a.createdDtm, '%Y-%m-%d' ) <= '".date('Y-m-d', strtotime($toDate))."'";
            $this->db->where($likeCriteria);
        }
        if($user_id >= 1){
            $this->db->where('a.user_id', $user_id);
        }
        $this->db->order_by('a.id', 'DESC');
        $this->db->limit($page, $segment);
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
    }

    /**
     * This function used to get user information by id
     * @param number $user_id : This is user id
     * @return array $result : This is user information
     */
    function getUserInfoById($user_id)
    {
        $this->db->select('user_id, name, email, mobile, role_id');
        $this->db->from('users');
        $this->db->where('deleted', 0);
        $this->db->where('user_id', $user_id);
        $query = $this->db->get();
        
        return $query->row();
    }

    /**
     * This function used to get user information by id with role
     * @param number $user_id : This is user id
     * @return aray $result : This is user information
     */
    function getUserInfoWithRole($user_id)
    {
        $this->db->select('a.user_id, a.email, a.name, a.mobile, a.isAdmin, a.role_id, b.role');
        $this->db->from('users as BaseTbl');
        $this->db->join('tbl_roles as Roles','b.role_id = a.role_id');
        $this->db->where('a.user_id', $user_id);
        $this->db->where('a.deleted', 0);
        $query = $this->db->get();
        
        return $query->row();
    }

}

  