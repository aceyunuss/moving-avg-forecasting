<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Md_peramalan extends CI_Model
{
  function __construct()
  {
    parent::__construct();
  }


  public function insert($data)
  {
    $this->db->insert("forecast", $data);

    return $this->db->insert_id();
  }

  public function get($id = "")
  {
    if (!empty($id)) {
      $this->db->where("forecast_id", $id);
    }
    return $this->db->get("forecast");
  }

  public function delete($id)
  {
    $this->db->where("forecast_id", $id)->delete("forecast");
    $this->db->where("forecast_id", $id)->delete("forecast_detail");
    return $this->db->affected_rows();
  }

  public function update($id, $data)
  {
    $this->db->where("forecast_id", $id)->update("forecast", $data);
    return $this->db->affected_rows();
  }

  public function insertDetail($data)
  {
    $this->db->insert_batch("forecast_detail", $data);

    return $this->db->affected_rows();
  }

  public function getDetail($id = "", $det = "")
  {
    if (!empty($id)) {
      $this->db->where("forecast_id", $id);
    }
    if (!empty($det)) {
      $this->db->where("detail_id", $det);
    }
    return $this->db->get("forecast_detail");
  }

}
