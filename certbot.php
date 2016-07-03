<?php
	//Config
	DEFINE('CERTBOT_PATH',"/root/");
	if (file_exists(CERTBOT_PATH."/certbot-auto")) {
		if (isset($_POST["createCert"])) {
			$domain = $_POST["domain"];
			$acc = $_POST["acc"];
			$email = $_POST["email"];
			$error = false;

			if (strlen($domain) ==0) {
				echo "<pre>Invalid domain name</pre>";
				$error = true;
			}
			if (strlen($acc)==0) {
				echo "<pre>Please enter an account</pre>";
				$error = true;
			}
			if(strlen($email)==0 || filter_var($email,FILTER_VALIDATE_EMAIL)===false ){
				echo "<pre>Please enter an email</pre>";
				$error = true;
			}
			
			if (!error) {
				$command = "cd ".CERTBOT_PATH." && ./certbot-auto certonly --email $email --agree-tos --renew-by-default --webroot  -w /home/$acc/public_html/ -d $domain && cp -f /etc/letsencrypt/live/$domain/fullchain.pem /etc/pki/tls/certs/$domain.crt && cp -f /etc/letsencrypt/live/$domain/privkey.pem /etc/pki/tls/private/$domain.key && cp -f /etc/letsencrypt/live/$domain/chain.pem /etc/pki/tls/certs/$domain.bundle";
				echo "<pre>";
				echo shell_exec($command);
				echo "</pre>";
			}
		}
	}else{
		echo "<pre> CERTBOT not installed in '".CERTBOT_PATH."' please configure file</pre>";
	}
	$users = scandir('//home//');
	//Add any directrories which are not cwp-users in this array
	$misc_users = ['.','..','ts3srv'];
	$drop_down = array();
	foreach ($users as $user) {
		if (!in_array($user,$misc_users) ) {
			array_push($drop_down,$user);
		}
	}
	echo "<br>";
 ?>
 <h3>Certbot Module</h3>
	<p>
		Welcome to the certbot module for CWP

		This relies on CERTBOT already being installed on your system, please configure this file by changing:
		<code>DEFINE('CERTBOT_PATH',"/root/")</code>
		To wherever Certbot is installed
	</p>
 <div style="width: 200px;">
 	<form method="post">
 		 <label for="domain">Domain Name:</label>
 		 <br>
 		<input type="text" name="domain" placeholder="Domain Name... ">
 		<br>
 		<label for="acc">Account Name:</label>
 		<select class="" name="acc">
 			<?php foreach ($drop_down as $user): ?>
 				<option value="<? echo $user ?>"><? echo $user ?></option>
 			<?php endforeach; ?>
 		</select>
 		<br>
 		<label for="email">Email:</label>
 		<br>
 		<input type="text" name="email" placeholder="Email...">
 		<br>
 		<button name="createCert" style="margin-top: 10px;">Create</button>
 	</form>
 </div>
