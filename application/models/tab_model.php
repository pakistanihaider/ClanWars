<?php
/**
 * Created by JetBrains PhpStorm.
 * User: SBPS
 * Date: 8/19/13
 * Time: 3:41 PM
 * To change this template use File | Settings | File Templates.
 */
class Tab_Model extends MY_Model{


    function __construct(){
        parent::__construct();
    }

    //This Gets all the Menus in the Specified Role
    public function check_allow($arr){
        $count=0;
        foreach($arr as $key=> $value){
            $actual_array[$count++] = $value->RoleID;
        }
        $this->db->select('*');
        $this->db->from('cw_group_roles_form_view');
        $this->db->where_in('FormRoleID',$actual_array);
        $query=$this->db->get();
//        print_r($query->result());
//        exit;
        return $query->result();
    }// end of authenticate function

    //This Function will retrieve all the tabs in database
    public function get_tabs(){
        $this->db->select('*');
        $this->db->from('cw_tabs');
        $this->db->order_by('TabOrder');
        $query = $this->db->get();
        return $query->result();
    }
}