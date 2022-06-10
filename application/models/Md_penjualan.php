<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Md_penjualan extends CI_Model
{
  function __construct()
  {
    parent::__construct();
  }


  public function insert($data)
  {
    $this->db->insert("sell", $data);

    return $this->db->affected_rows();
  }

  public function get($id = "")
  {
    if (!empty($id)) {
      $this->db->where("sell_id", $id);
    }
    return $this->db->get("sell");
  }


  public function delete($id)
  {
    $this->db->where("sell_id", $id)->delete("sell");
    return $this->db->affected_rows();
  }

  public function update($id, $data)
  {
    $this->db->where("sell_id", $id)->update("sell", $data);
    return $this->db->affected_rows();
  }


  public function getRole($role)
  {
    $this->db->where('role', $role);
    return $this->get();
  }


  public function insertItem($data)
  {
    $this->db->insert_batch("sell_item", $data);

    return $this->db->affected_rows();
  }

  public function getItem($id = "", $itm = "")
  {
    if (!empty($id)) {
      $this->db->where("sell_id", $id);
    }
    if (!empty($itm)) {
      $this->db->where("item_id", $itm);
    }
    $this->db->join("uom", "size=uom_id", "left");
    return $this->db->get("sell_item");
  }

  public function getUom()
  {
    return $this->db->get("uom");
  }
}
