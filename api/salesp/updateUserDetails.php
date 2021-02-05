<?php
	include_once __DIR__."/../config/timezone.php";
	include_once __DIR__."/../config/salesp_security.php";
	include_once __DIR__."/../../model/OTP.php";
	include_once __DIR__."/../../model/Token.php";
	include_once __DIR__."/../../model/Response.php";
	include_once __DIR__."/../../model/User.php";
		
	if(
		isset($_POST['userMobile']) && is_numeric($_POST['userMobile']) &&
		isset($_POST['userId']) && is_numeric($_POST['userId']) && 
		isset($_POST['userName']) && 
		isset($_POST['userAddressLine1']) && 
		isset($_POST['userAddressLine2']) && 
		isset($_POST['userCity']) && 
		isset($_POST['userState']) && 
		isset($_POST['userPincode']) && 
		isset($_POST['userAadhar'])
	){
		
		$userId = $_POST['userId'];
		$userName = $_POST['userName'];
		$userAddressLine1 = $_POST['userAddressLine1'];
		$userAddressLine2 = $_POST['userAddressLine2'];
		$userCity = $_POST['userCity'];
		$userState = $_POST['userState'];
		$userPincode = $_POST['userPincode'];
		$userAadhar = $_POST['userAadhar'];
		User::updateUserDetails($userId, $userName, $userAddressLine1, $userAddressLine2, $userCity, $userState, $userPincode, $userAadhar, 1);
		echo Response::getSuccessResponse(null, 200);
		
	}else{
		echo Response::getFailureResponse(null, 409);
	}

?>