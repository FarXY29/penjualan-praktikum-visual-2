<?php defined('BASEPATH') or exit('No direct script access allowed');
class Satuan_model extends CI_Model
{
    protected $_table = 'satuan';
    protected $primary = 'id';
    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function save()
    {
        $data = array(
            'name' => htmlspecialchars($this->input->post('name'), true),
            'deskripsi' => htmlspecialchars($this->input->post('deskripsi'), true)
        );
        return $this->db->insert($this->_table, $data);
    }
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id" => $id])->row();
    }

    public function editData()
    {
        $id = $this->input->post('id');
        $data = array(
            'name' => htmlspecialchars($this->input->post('name'), true),
            'diskripsi' => htmlspecialchars($this->input->post('diskripsi'), true)
        );
        return $this->db->set($data)->where($this->primary, $id)->update($this->_table);
    }

    public function delete($id)
    {
        $this->db->where('id', $id)->delete($this->_table);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata("success", "Data Satuan Berhasil DiDelete");
        }
    }
}
