<?php
	include_once __DIR__."/../config/timezone.php";
	include_once __DIR__."/../config/user_security.php";
	include_once __DIR__."/../../model/OTP.php";
	include_once __DIR__."/../../model/Token.php";
	include_once __DIR__."/../../model/Response.php";
	include_once __DIR__."/../../model/User.php";
	
	$mobile = $_POST['mobile'];
	$token = $_POST['token'];
	$userId = Token::getTokenUserId($token, $mobile);

	$user = User::getUserById($userId);
	if($user){
		if($user->status == 1){
			$id = Securevault::getByNames(Securevault::$RAZER_PAY_ID);
			$secret = Securevault::getByNames(Securevault::$RAZER_PAY_SECRET);
			$map = array();
			$map['id'] = $id;
			$map['secret'] = $secret;
			echo Response::getSuccessResponse($map, 200);
		}else if($user->status == -1){
			echo Response::getFailureResponse(null, 408);
		}else{
			echo Response::getFailureResponse(null, 410);
		}
	}else{
		echo Response::getFailureResponse(null, 407);
	}
?>