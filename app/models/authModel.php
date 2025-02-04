<?php
require_once "model.php";

	class authModel extends Model{
			
		public function getUserByEmail($email){
			$query = $this->db->prepare('SELECT * FROM users WHERE email_user = ?');
			$query->execute([$email]);

			return $query->fetch(PDO::FETCH_OBJ);
		}

		public function register($email, $password, $nombre){
			$query = $this->db->prepare('INSERT INTO users (email_user, password, Nombre) VALUES(?,?,?)');
			$query->execute([$email, $password, $nombre]);
		}
	}