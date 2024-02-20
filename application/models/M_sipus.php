<?php 

class M_sipus extends CI_Model
{
	function edit_data($where, $table)
	{
		return $this->db->get_where($table, $where);
	}

	function get_data($table)
	{
		return $this->db->get($table);
	}

	function insert_data($data, $table)
	{
		$this->db->insert($table, $data);
	}

	function update_data($where, $data, $table)
	{
		$this->db->set($data);
		$this->db->where($where);
		$this->db->update($table);
	}

	function delete_data($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}

	public function detail_data($id = NULL)
	{
		$query = $this->db->get_where('data_ebook', array('id_ebook' => $id))->row();
		return $query;
	}

	public function joinKategoriebook()
	{
		$this->db->select('*');
		$this->db->from('data_ebook');
		$this->db->join('data_kategori', 'data_kategori.id_kategori = data_ebook.id_kategori', 'left');
		$query = $this->db->get();

		return $query;
	}
}
