<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Model {

    function validate_user($post)
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('firstname', 'firstname', 'trim|required|min_length[2]');
        $this->form_validation->set_rules('lastname', 'lastname', 'trim|required|min_length[2]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[2]|matches[password_confirmation]');
        $this->form_validation->set_rules('password_confirmation', 'Password Confirmation', 'required');
        if($this->form_validation->run())
        {
            return "valid";
        }
        else
        {
            $errors = array(validation_errors());
            return $errors;
        }
    }	

    function validate_login($post)
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[2]');
        if($this->form_validation->run())
		{
			$user = $this->get_user_by_email($post);
            return $user;
        }	
		else
		{
			$errors = array(validation_errors());
		 	return $errors;
		}
	}
    
    function add_user($post)
    {    	
    	$query = "INSERT INTO users (email, first_name, last_name, password, user_level, created_at) VALUES (?,?,?,?,?,NOW())";
        if($this->get_all_users())
        {
            $values = array($post['email'],$post['firstname'],$post['lastname'], $post['password'],'noraml');
        }
        else
        {
            $values = array($post['email'],$post['firstname'],$post['lastname'],$post['password'],'admin'); 
        }
        $result = $this->db->query($query, $values); 	
        $user_id = $this->db->insert_id($result);
        return $user_id;	
    }
    
    function get_all_users()
    {
        $query = "SELECT * FROM users";
        return $this->db->query($query)->result_array();
    }

    function get_user_by_id($id)
    {
        $query = "SELECT id, first_name, last_name, email, created_at, user_level, description,img FROM users WHERE id = ?";
        $values = array($id);
        return $this->db->query($query, $values)->row_array();
    }

    function get_user_by_email($post)
    {
        $query = " SELECT * FROM users WHERE email = ?";
        $values = array($post['email']);
        return $this->db->query($query, $values)->row_array();
    }

    function del_user_by_id($user_id)
    {
        $query = "DELETE FROM users WHERE id = ?";
        $values = array($user_id);
        return $this->db->query($query, $values);
    }

    function update_user_by_id($user)
    {
        if(array_key_exists("email", $user))
        {
            if(array_key_exists("user_level", $user))
            {
                $query = "UPDATE users SET email = ?, first_name = ?, last_name = ?, user_level = ?, updated_at = NOW() WHERE id = ?";
                $values = array($user['email'], $user['firstname'], $user['lastname'], $user['user_level'], $user['id']);
            }
            else
            {
                $query = "UPDATE users SET email = ?, first_name = ?, last_name = ?, updated_at = NOW() WHERE id = ?";
                $values = array($user['email'], $user['firstname'], $user['lastname'], $user['id']);         
            }
        }
        elseif(array_key_exists("password", $user))
        {
            $query = "UPDATE users SET password = ?, updated_at = NOW() WHERE id = ?";
            $values = array($user['password'], $user['id']);
        }
        elseif(array_key_exists("description", $user))
        {
            $query = "UPDATE users SET description = ?, updated_at = NOW() WHERE id = ?";
            $values = array($user['description'], $user['id']);
        }        
        elseif(array_key_exists("img", $user))
        {
            $query = "UPDATE users SET img = ?, updated_at = NOW() WHERE id = ?";
            $values = array($user['img'], $user['id']);
        }
        return $this->db->query($query, $values);
    }

    function validate_update($post)
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('firstname', 'firstname', 'trim|required|min_length[2]');
        $this->form_validation->set_rules('lastname', 'lastname', 'trim|required|min_length[2]');

        if($this->form_validation->run())
        {
            return "valid";
        }
        else
        {
            $errors = array(validation_errors());
            return $errors;
        }
    }   

    
}
