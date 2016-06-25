<?php

class Usuario{

	private $user;
	private $pass;

	public function getUser() {
		return $this->user;
	}

	public function setUser($user) {
		$this->user = $user;
	}

	public function getPass() {
		return $this->pass;
	}

	public function setPass($pass) {
		$this->pass = $pass;
	}

}

?>