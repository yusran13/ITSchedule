<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Project extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_project','project');
	}



	public function ajax_list()
	{
		$list = $this->project->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $project) {
			$no++;
			$row = array();
			$row[] = $project->nama_project;
			$row[] = $project->desc;
			$row[] = $project->pic;
			$row[] = $project->status;
			

			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void()" title="Approve" onclick="edit_person('."'".$project->id."'".')"><i class="glyphicon glyphicon-pencil"></i> Approve</a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->project->count_all(),
						"recordsFiltered" => $this->project->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function list_by_status($status)
	{
		$list = $this->project->get_data_by_status($status);
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $project) {
			$no++;
			$row = array();
			$logged_in = $this->session->userdata('logged_in');
			$row[] = $project->nama_project;
			$row[] = $project->desc;
			$row[] = $project->pic;
			$row[] = $project->submit;
		

			if ($this->session->userdata('nama_user')=="admin")
                $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void()" title="Approve" onclick="approve_project('."'".$project->id."'".')"><i class="glyphicon glyphicon-pencil"></i> Approve</a>';
            else 
            	$row[] = $project->status;
       
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->project->count_all($status),
						"recordsFiltered" => $this->project->count_filtered($status),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function list_not_status($status)
	{
		$list = $this->project->get_data_not_status($status);
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $project) {
			$no++;
			
			$row = array();
			$logged_in = $this->session->userdata('logged_in');
			$row[] = $project->nama_project;
			$row[] = $project->desc;
			$row[] = $project->pic;
			$row[] = $project->start;
			$row[] = $project->end;
				$today = date("y-m-d");
				$start = $project->start;
				$end   = $project->end;
				if(strtotime($today) < strtotime($start))
            		$status = "Waiting";
        		else if(strtotime($start) <= strtotime($today) && strtotime($today) <= strtotime($end))
            		$status = "Running";
        		else 
            		$status = "Finish";

            	$data2 = array(
				'status' => $status,
				);

				$this->project->update(array('id' => $project->id), $data2);

			if ($project->leader_id_leader==1)
			$row[] = "Nanang W Setiana";
			else if ($project->leader_id_leader==2)
			$row[] = "Piecessa A Nugraha";
			else 
			$row[] = "Muhammad Yusran";

			$row[] = $project->status;
			if ($this->session->userdata('nama_user')=="admin")
                $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void()" title="Edit" onclick="edit_project('."'".$project->id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>';
            else 
            	$row[] = $project->status;
          
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->project->count_all_not($status),
						"recordsFiltered" => $this->project->count_filtered_not($status),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($id)
	{
		$data = $this->project->get_by_id($id);
		echo json_encode($data);
	}

	public function ajax_add()
	{	
		$today = date ("y-m-d");
		$data = array(
				'nama_project' => $this->input->post('nama_project'),
				'desc' => $this->input->post('desc'),
				'pic' => $this->input->post('pic'),
				'submit' => $today,
				'status' => "Pending",
			);
		$insert = $this->project->save($data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update()
	{
		$today = date("y-m-d");
		$start = $this->input->post('start');
		$end   = $this->input->post('end');

		if(strtotime($today) < strtotime($start))
            $status = "Waiting";
        else if(strtotime($start) <= strtotime($today) && strtotime($today) <= strtotime($end))
            $status = "Running";
        else 
            $status = "Finish";

		$data = array(
				'nama_project' => $this->input->post('nama_project'),
				'desc' => $this->input->post('desc'),
				'pic' => $this->input->post('pic'),
				'start' => $this->input->post('start'),
				'end' => $this->input->post('end'),
				'status' => $status,
				'leader_id_leader' => $this->input->post('leader_id_leader'),
			);
		$this->project->update(array('id' => $this->input->post('id')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id)
	{
		$this->project->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}

}
