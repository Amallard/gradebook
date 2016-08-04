<?php

class User {
	
	// Init DB var
	private $db;
	
	// Constructor
	public function __construct() {
		$this->db= new Database;
	}
	
	// Register user
	public function register($data) {
		
		// Insert query
		$this->db->query('INSERT INTO users (name, email, password) 
						  VALUES (:name, :email, :password)');
						  
		// Bind values
		$this->db->bind(':name', $data['name']);
		$this->db->bind(':email', $data['email']);
		$this->db->bind(':password', $data['password']);
		
		// Execute
		if ($this->db->execute()) {			
			return true;
		} else {
			return false;
		}
	}
	
	// User login
	public function login($email, $password) {
		$this->db->query("SELECT * FROM users WHERE email = :email");
		
		// Bind values
		$this->db->bind(':email', $email);
		
		// Assign row
		$row = $this->db->single();
		
		if (password_verify($password, $row->password)) {
			$this->setUserData($row);
			return true;
		} else {
			return false;
		}
		
		// Check rows
		if ($this->db->rowCount() > 0) {
			$this->setUserData($row);
			return true;
		} else {
			return false;
		}
	}
	
	// Set user data
	private function setUserData($row) {
		$_SESSION['is_logged_in'] = true;
		$_SESSION['user_id'] = $row->id;
		$_SESSION['name'] = $row->name;
		$_SESSION['email'] = $row->email;
	}
	
	
		// User logout
	public function logout() {
		unset($_SESSION['is_logged_in']);
		unset($_SESSION['user_id']);
		unset($_SESSION['email']);
		unset($_SESSION['name']);
		return true;
	}
	
}
