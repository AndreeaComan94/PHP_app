<?php

include_once "User.php";

interface IUserDao {
	public function addUser(User $user);
	public function updateUser(User $user);
}
?>