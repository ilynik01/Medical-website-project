<?php

define("SALT", "oq9hr_p98q29");

function sanitizeInputVar($link, $var): string
{
	$var = stripslashes($var);
	$var = htmlentities($var);
	$var = strip_tags($var);
	$var = mysqli_real_escape_string($link, $var);
	return $var;
}

function passwordHash(string $loginPassword): string {
	$loginPassword .= SALT;
	return md5($loginPassword);
}

function loginToAccount(Person $loginData)
{
	include_once("dbconnection_data.php");

	$link = new mysqli($server, $user, $password, $database);
	if ($link -> connect_error) die("Connection to DB failed " . $link -> connect_error);

	$loginEmail = sanitizeInputVar($link, $loginData->Email);
	$loginPassword = sanitizeInputVar($link, $loginData->Password);

	$query = "SELECT ID, first_name, last_name, sex, phone, email, psw FROM account_data WHERE email = ?";
	$query = $link->prepare($query);
	$query -> bind_param("s", $loginEmail);
	$query -> execute();
	$user = $query->get_result()->fetch_assoc();

	$hashedLoginPassword = passwordHash($loginPassword);

	if ($user and $hashedLoginPassword == $user['psw']) {
		$loginData->ID = $user['ID'];
		$loginData->Firstname = $user['first_name'];
		$loginData->Lastname = $user['last_name'];
		$loginData->Sex = $user['sex'];	
		$loginData->Phone = $user['phone'];

		return $loginData;
	}
	return 0;
}

function createAccount($personData) {

	function checkIfEmailIsNotUsed($link, $loginEmail): int {
		$query = "SELECT email FROM account_data WHERE email = ?";

		$query = $link->prepare($query);
		$query -> bind_param("s", $loginEmail);
		$query -> execute();
		$responce = $query->get_result()->fetch_assoc();

		if ($responce) {
			return 0;
		}
		return 1;
	}

	function checkIfPhoneIsNotUsed($link, $loginPhone) {
		$query = "SELECT phone FROM account_data WHERE phone = ?";

		$query = $link->prepare($query);
		$query -> bind_param("s", $loginPhone);
		$query -> execute();
		$responce = $query->get_result()->fetch_assoc();

		if ($responce) {
			return 0;
		}
		return 1;
	}

	include_once("dbconnection_data.php");

	$link = new mysqli($server, $user, $password, $database);
	if ($link -> connect_error) die("Connection to DB failed " . $link -> connect_error);

	$personData->Firstname = sanitizeInputVar($link, $personData->Firstname);
	$personData->Lastname = sanitizeInputVar($link, $personData->Lastname);
	$personData->Sex = sanitizeInputVar($link, $personData->Sex);
	$personData->Phone = sanitizeInputVar($link, $personData->Phone);
	$personData->Email = sanitizeInputVar($link, $personData->Email);
	$hashedPassword = passwordHash($personData->Password);


	if (!checkIfEmailIsNotUsed($link, $personData->Email)) { return 2; }
	if (!checkIfPhoneIsNotUsed($link, $personData->Phone)) { return 1; }

	$query = "INSERT INTO account_data(first_name, last_name, sex, phone, email, psw) VALUES(?,?,?,?,?,?)";
	$query = $link->prepare($query);

	$query->bind_param(
		"ssssss",
		$personData->Firstname,
		$personData->Lastname,
		$personData->Sex,
		$personData->Phone,
		$personData->Email,
		$hashedPassword
	);

	if (!$query->execute()) { die("Failed to insert data to DB"); }
	$personData->ID = $link -> insert_id;
	$query -> close();
	$link -> close();
	return 0;
}

?>
