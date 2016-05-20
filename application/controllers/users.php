<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Users extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// $this->output->enable_profiler(TRUE);
		$this->load->model("User");
		$this->load->helper(array('form', 'url'));
	}
	public function index()
	{
		$this->load->view('/users/index');
	}
	public function signin()
	{
		if($this->session->userdata('loggin') == true)
		{
			redirect('/dashboards');
		}
		$this->load->view('users/signin');
	}
	public function signin_user()
	{
		$post = $this->input->post();
		$user = $this->User->validate_login($post);

        if(isset($user['id']) && $post['password'] == $user['password'])
        {
			$this->session->set_userdata('user_id', $user['id']);
			$this->session->set_userdata('user_level', $user['user_level']);
			$this->session->set_userdata('loggin', true);
			redirect('/dashboards');
        }
		else
		{	
			if(validation_errors())
			{
				$errors = array(validation_errors());				
			}
			else
			{
				$errors = array("Invalid username or password, please register or try again!");
			}	
			$this->session->set_flashdata('errors', $errors);
			redirect('/users/signin');
		}
	}

	public function register()
	{
		if($this->session->userdata('loggin') == true)
		{
			redirect('/dashboards');
		}
		$this->load->view('users/register');
	}
	public function create_user()
	{
		$post = $this->input->post();
		$check = $this->User->validate_user($post);
		if($check == "valid")
		{//passed validation
			$user_id = $this->User->add_user($post);
			if(!$this->session->userdata('user_level'))
			{
				$user = $this->User->get_user_by_id($user_id);
				$this->session->set_userdata('user_id', $user['id']);
				$this->session->set_userdata('user_level', $user['user_level']);
				$this->session->set_userdata('loggin', true);				
			}
			redirect('/dashboards');
		}
		else
		{//failed on validations
			$errors = array(validation_errors());
			$this->session->set_flashdata('errors', $errors);
			if(!$this->session->userdata('user_level'))
			{
				redirect('/users/register');
			}
			else
			{
				redirect('/users/add_new');
			}
		}
	} 

	public function add_new()
	{
		$this->load->view('users/new');
	}

	public function edit($id)
	{		
		$data['edit_user'] = FALSE;	
		$data['edit_profile'] = FALSE;	
		if(!$this->is_login())
		{
			redirect('/');
		}
		else
		{
			if(is_numeric($id) && $this->is_admin() === TRUE)
			{
				$user = $this->User->get_user_by_id($id);	
				if($user)
				{
					$data['edit_user'] = TRUE;
					$data['user'] = $user;
					// var_dump($data);die;
					$this->load->view('users/edit', $data);
				}
				else
				{
					redirect('/dashboards');
				}
			}
			elseif(is_numeric($id) && $this->is_admin() !== TRUE)
			{
				redirect('/dashboards');
			}
			else
			{
				$data['edit_profile'] = TRUE;
				$data['user'] = $this->User->get_user_by_id($this->session->userdata('user_id'));
				// var_dump($data);die;
				$this->load->view('users/edit', $data);
			}		
		}
	}

	public function is_admin()
	{
		if($this->session->userdata('user_level') == 'admin')
		{
			return true;
		}
	}

	public function is_login()
	{
		if($this->session->userdata('loggin') == 'true')
		{
			return true;
		}
	}		

	public function update_profile()
	{
		$user_data = $this->input->post();
		$this->load->library('form_validation');
		//array key exist allows you to check if certain index exist on an array
		if(array_key_exists("email", $user_data))
		{
			$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
			$this->form_validation->set_rules('firstname', 'First name', 'trim|required|min_length[2]');
			$this->form_validation->set_rules('lastname', 'Last name', 'trim|required|min_length[2]');
			if(array_key_exists("user_level", $user_data))
			{
				$this->form_validation->set_rules('user_level', 'User Level', 'trim|required');				
			}
		}
		elseif(array_key_exists("password", $user_data))
		{
	       $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]|matches[password_confirmation]');
 	       $this->form_validation->set_rules('password_confirmation', 'Password Confirmation', 'required');
		}
		elseif(array_key_exists("description", $user_data))
		{
			$this->form_validation->set_rules('description', 'Description', 'trim|required');
		}

		if(!isset($user_data['edit_user']))
		{		
			$user_data['id'] = $this->session->userdata['user_id'];	
			if($this->form_validation->run() === FALSE)
			{
				$this->session->set_flashdata('messages',validation_errors());
			}
			else
			{
				$this->User->update_user_by_id($user_data);	
				$this->session->set_flashdata('messages',"User information was updated successfully!");
			}
			redirect("/users/edit/my");
		}
		else
		{
			$user_data['id'] = $user_data['user_id'];
			$id = $user_data['user_id'];
			if($this->form_validation->run() === FALSE)
			{
				$this->session->set_flashdata('messages',validation_errors());
			}
			else
			{
				$this->User->update_user_by_id($user_data);
				$this->session->set_flashdata('messages',"User information was updated successfully!");
			}
			redirect("/users/edit/$id");
		}	
	}


	public function do_upload()
	{
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '100';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			$error = array('messages' => $this->upload->display_errors());
			$this->session->set_flashdata($error);
		}
		else
		{
			$data = $this->upload->data();
			$user['img'] = "/uploads/".$data['file_name'];
			$user['id'] = $this->input->post('user_id');
			if($this->User->update_user_by_id($user)){
				$this->session->set_flashdata('messages',"Your profile picture was updated successfully!");
			}
		}
		redirect("/users/edit/my");
	}

	public function destroy($id)
	{
		$this->User->del_user_by_id($id);	
		redirect('/dashboards');
	}
	public function signoff()
	{
		$this->session->sess_destroy();
		redirect('/');
	}
}