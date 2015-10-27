<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_project extends CI_Model {

	var $table = 'project';
	var $column = array('nama_project','desc','pic','status','start','end','leader_id_leader');
	var $order = array('id' => 'dsc');

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function _get_datatables_query()
	{
		
		$this->db->from($this->table);

		$i = 0;
	
		foreach ($this->column as $item) 
		{
			if($_POST['search']['value'])
				($i===0) ? $this->db->like($item, $_POST['search']['value']) : $this->db->or_like($item, $_POST['search']['value']);
			$column[$i] = $item;
			$i++;
		}
		
		if(isset($_POST['order']))
		{
			$this->db->order_by($column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} 
		else if(isset($this->order))
		{
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	function get_datatables()
	{
		$this->_get_datatables_query();
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}

	function get_data_by_status($status)
	{
		$this->_get_datatables_query();
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$this->db->where('status',$status);
		$query = $this->db->get();
		
		return $query->result();
	}

	function get_data_not_status($status)
	{
		$this->_get_datatables_query();
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$this->db->where('status !=',$status);
		$query = $this->db->get();
		
		return $query->result();
	}

	function count_filtered($status)
	{
		$this->_get_datatables_query();
		$this->db->where('status',$status);
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all($status)
	{
		$this->db->from($this->table);
		$this->db->where('status',$status);
		return $this->db->count_all_results();
	}

	function count_filtered_not($status)
	{
		$this->_get_datatables_query();
		$this->db->where('status !=',"Pending");
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all_not($status)
	{
		$this->db->from($this->table);
		$this->db->where('status !=',"Pending");
		return $this->db->count_all_results();
	}

	public function get_by_id($id)
	{
		$this->db->from($this->table);
		$this->db->where('id',$id);
		$query = $this->db->get();

		return $query->row();
	}

	public function save($data)
	{
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}

	public function update($where, $data)
	{
		$this->db->update($this->table, $data, $where);
		return $this->db->affected_rows();
	}

	public function delete_by_id($id)
	{
		$this->db->where('id', $id);
		$this->db->delete($this->table);
	}


}
