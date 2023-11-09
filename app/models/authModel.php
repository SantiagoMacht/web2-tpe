<?php
require_once "model.php";

	class authModel extends Model{
			
		public function getUser(){
			$query = $this->db->prepare('SELECT * FROM users WHERE email_user = ?');
			$query->execute([$_POST['email_user']]);

			return $query->fetch(PDO::FETCH_OBJ);
		}

	}