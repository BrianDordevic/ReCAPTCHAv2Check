<?php
/*

Credit: Miroslav Sapic

*/

function checkReCaptcha($captcha) {
	$url = "https://www.google.com/recaptcha/api/siteverify";
	$secretkey = "//------- YOUR SECRET KEY -----------//";
	if(!empty($captcha)){
		$data = array('secret' => $secretkey, 'response' => $captcha);

		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);  
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
		$res = curl_exec($ch);
		curl_close($ch);

		$responseData = json_decode($res, true);
		if ($responseData['success'])
			return true;
		else
			return false;
	}else
		return false;
}
?>
