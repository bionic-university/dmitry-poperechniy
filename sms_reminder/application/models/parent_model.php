<?php
    
    class Parent_model extends CI_Model 
    {

        function Parent_model()
        {
            CI_Model::__construct();
        }
        
        protected function START()
        {
            $this->db->trans_start();
        }
        
        protected FUNCTION COMMIT()
        {
            $this->db->trans_complete(); 
        }
        
        protected function get($sql, $binds = NULL)
        {
            $query = $this->db->query($sql, $binds);
            return $query->result_array();
        }
        
        protected function run($sql, $binds = NULL)
        {
            $this->db->query($sql, $binds);
        }
        
        protected function get_single_row($sql, $binds = NULL)
        {
            $tmp = $this->get($sql, $binds);
            if (count($tmp) === 0)
                return FALSE;
            
            return $tmp[0];           
        }

        protected function get_value($sql, $binds = NULL)
        {
            //array keys
            
            $temporary = $this->get_single_row($sql, $binds);
            if($temporary === FALSE)
                return FALSE;
            
            $keys = array_keys($temporary);
            $index = $keys[0];
            return $temporary[$index];           
        }           
    }    
?>
