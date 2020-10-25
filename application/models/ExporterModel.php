<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class ExporterModel extends CI_Model
{

  public function __construct()
  {
    parent::__construct();
  }

  public function getExporter()
  {

    $query = $this->db->select('*')->from('tbl_exporter')->get()->result_array();
    return $query;
  }

  public function insert($data){
    $query = $this->db->insert('tbl_exporter', $data);
    return $query;
  }
}
