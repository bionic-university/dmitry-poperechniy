<?php

/**
 * Class Parent_model
 */
class Parent_model extends CI_Model
{
    function Parent_model()
    {
        CI_Model::__construct();
    }

    /**
     * Start Transaction
     */
    protected function START()
    {
        $this->db->trans_start();
    }

    /**
     * Complete Transaction
     */
    protected FUNCTION COMMIT()
    {
        $this->db->trans_complete();
    }

    /**
     * Get Runction
     *
     * @param $sql
     * @param null $binds
     * @return mixed
     */
    protected function get($sql, $binds = null)
    {
        $query = $this->db->query($sql, $binds);
        return $query->result_array();
    }

    /**
     * Run Function
     *
     * @param $sql
     * @param null $binds
     */
    protected function run($sql, $binds = null)
    {
        $this->db->query($sql, $binds);
    }

    /**
     * Get Single Row Function
     *
     * @param $sql
     * @param null $binds
     * @return bool
     */
    protected function get_single_row($sql, $binds = null)
    {
        $tmp = $this->get($sql, $binds);
        if (count($tmp) === 0) {
            return false;
        }

        return $tmp[0];
    }

    /**
     * Get Value Function
     *
     * @param $sql
     * @param null $binds
     * @return bool
     */
    protected function get_value($sql, $binds = null)
    {
        $temporary = $this->get_single_row($sql, $binds);
        if ($temporary === false) {
            return false;
        }
        $keys = array_keys($temporary);
        $index = $keys[0];

        return $temporary[$index];
    }
}
