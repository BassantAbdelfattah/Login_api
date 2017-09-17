
<?php
$url='https://www.linkedin.com/oauth/v2/accessToken';
$field=array('grant_type'=>urlencode('authorization_code'),
	'code'=>$_GET['code'],
	'redirect_uri'=>urldecode('http://login.api.net/callback.php'),
	'client_id'=>urldecode('78pohz7xcak9yu'),
	'client_secret'=>urldecode('xZV2KHBwKqVNPICw'));
$field_string="";
foreach ($field as $key => $value) {
	$field_string=$field_string.$key.'='.$value."&";

}
$field_string=rtrim($field_string,'&');
	$ch=curl_init();
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
	curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,false);
	curl_setopt($ch,CURLOPT_URL,$url);
	curl_setopt($ch,CURLOPT_POST,count($field));//3dd el fields
	curl_setopt($ch,CURLOPT_POSTFIELDS,$field_string);//
	$result=curl_exec($ch);
	$result = json_decode($result,true); //3shan yt7wl l array
	curl_close($ch);


	$ch=curl_init();
	curl_setopt($ch, CURLOPT_URL, 'https://api.linkedin.com/v1/people/~:(email-address,firstName,id,picture-url)?format=json');
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer '.$result['access_token'],'Connection: Keep-Alive'));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

		$response=curl_exec($ch);
		$response = json_decode($response,true);
	 	$email=$response['emailAddress'];
		$name=$response['firstName'];
		$id=$response['id'];
		$image=$response['pictureUrl'];
		header("Location:send.php?id=".$id."&name=".$name."&image=".$image."&email=".$email."");

	
	
	
	curl_close($ch);
?>
