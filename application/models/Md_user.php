<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Md_user extends CI_Model
{
  function __construct()
  {
    parent::__construct();
  }


  public function login($username, $password)
  {
    $this->db->where(['username' => $username,]);
    return $this->db->get("user");
  }

  public function insert($data)
  {
    $this->db->insert("user", $data);

    return $this->db->affected_rows();
  }

  public function get($id = "")
  {
    if (!empty($id)) {
      $this->db->where("usr_id", $id);
    }
    return $this->db->get("user");
  }


  public function delete($id)
  {
    $this->db->where("usr_id", $id)->delete("user");
    return $this->db->affected_rows();
  }

  public function update($id, $data)
  {
    $this->db->where("usr_id", $id)->update("user", $data);
    return $this->db->affected_rows();
  }


  public function getRole($role)
  {
    $this->db->where('role', $role);
    return $this->get();
  }
}
