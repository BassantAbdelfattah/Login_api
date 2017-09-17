<form method="get" action="send.php">

Email:<input type="text" name="email">
</br>
Passaword:<input type="Passaword" name="Passaword">
</br>
<input type="submit" name="login" value="Login">
<button type="submit"><a href="signup.php">SignUp</a></button>
</form>
</br>
<script src="https://apis.google.com/js/platform.js" async defer>
	
	</script>
	<meta name="google-signin-client_id" content="324971161513-aj9o4cr56eq7kjmgh955hi98k5fbqdvg.apps.googleusercontent.com">
	<div class="g-signin2" data-onsuccess="onSignIn"></div>
  </br>
  <a href="https://www.linkedin.com/oauth/v2/authorization?response_type=code&client_id=78pohz7xcak9yu&redirect_uri=http://login.api.net/callback.php&state=987654321&scope=r_basicprofile,r_emailaddress">Login in with Linked in </a>

<script>
		function onSignIn(googleUser) {
  var profile = googleUser.getBasicProfile();
  console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
  console.log('Name: ' + profile.getName());
  console.log('Image URL: ' + profile.getImageUrl());
  console.log('Email: ' + profile.getEmail()); // This is null if the 'email' scope is not present.
  location.href = 'send.php?id='+profile.getId()+'&name='+ profile.getName()+'&image='+profile.getImageUrl()+'&email='+profile.getEmail()+'';
}
</script>

<?php
?>