<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Dashboards extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// $this->output->enable_profiler(TRUE);
		$this->load->model("User");
		$this->load->model("Dashboard");
	}
	public function index()
	{
		$data['users'] = $this->User->get_all_users();
		$this->load->view('dashboard/show_users', $data);
	}

	public function edit_user($id)
	{
		$data['user'] = $this->User->get_User_by_id($id);
		$this->load->view('/dashboard/edit_user', $data);
	}

	public function message($id)
	{
		if ($this->session->userdata("user_id")) {
			$data['user']= $this->User->get_user_by_id($id);
			$data['messages'] = $this->Dashboard->get_messages_by_user($id);
			foreach($data['messages'] as $message){
				$message_id = $message['message_id'];
				$data['comments'][$message_id] = $this->Dashboard->get_comments_by_message($message_id);
			}
			$this->load->view('dashboard/message', $data);
		}
		else redirect('/');
	}

	public function create_message()
	{
		$data = $this->input->post();
		$id = $data['user_id'];
		$data['created_by'] = $this->session->userdata('user_id');
		$this->Dashboard->create_message($data);
		redirect("/dashboards/message/$id");
	}

	public function create_comment()
	{
		$data = $this->input->post();
		$id = $data['user_id'];
		$data['created_by'] = $this->session->userdata('user_id');
		$this->Dashboard->create_comment($data);
		redirect("/dashboards/message/$id");
	}
	





}