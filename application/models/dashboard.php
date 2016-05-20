<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Model {

    function create_message($data)
    {
        $query = "INSERT INTO messages(message,user_id,created_by, created_at) VALUES (?,?,?,NOW())";
        $values = array($data['message'], $data['user_id'], $data['created_by']);
        return $this->db->query($query, $values);
    }     

    function create_comment($data)
    {
        $query = "INSERT INTO comments(message_id,created_by, comment, created_at) VALUES (?,?,?,NOW())";
        $values = array($data['message_id'], $data['created_by'], $data['comment']);
        return $this->db->query($query, $values);
    }     

    function get_messages_by_user($id)
    {
        $query = "SELECT CONCAT(u2.first_name,' ', u2.last_name) AS message_by_fullname, u1.id AS user_id, messages.message, messages.created_at, messages.id AS message_id, u2.img
                FROM messages
                JOIN users u1 ON u1.id = messages.user_id 
                JOIN users u2 ON u2.id = messages.created_by 
                WHERE user_id = ?
                ORDER BY messages.created_at DESC";
        $values = array($id);
        return $this->db->query($query, $values)->result_array();
    }    

    function get_comments_by_message($message_id)
    {
        $query = "SELECT comments.created_at, comments.id AS comment_id, comments.comment, CONCAT(users.first_name,' ', users.last_name) AS comment_by_fullname, users.img
                FROM comments
                JOIN messages ON messages.id = comments.message_id
                JOIN users ON users.id = comments.created_by
                WHERE comments.message_id = ?
                ORDER BY comments.created_at ASC";
        $values = array($message_id);
        return $this->db->query($query, $values)->result_array();
    }



}
