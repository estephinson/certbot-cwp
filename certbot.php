<?php
	//Config
	DEFINE('CERTBOT_PATH',"/root/");
	if (file_exists(CERTBOT_PATH."/certbot-auto")) {
		if (isset($_POST["createCert"])) {
			$domain = $_POST["domain"];
			$acc = $_POST["acc"];
			$email = $_POST["email"];
			if (strlen($domain) ==0) {
				break;
			}
			$command = "cd ".CERTBOT_PATH." && ./certbot-auto certonly --email $email --agree-tos --renew-by-default --webroot  -w /home/$acc/public_html/ -d $domain && cp -f /etc/letsencrypt/live/$domain/fullchain.pem /etc/pki/tls/certs/$domain.crt && cp -f /etc/letsencrypt/live/$domain/privkey.pem /etc/pki/tls/private/$domain.key && cp -f /etc/letsencrypt/live/$domain/chain.pem /etc/pki/tls/certs/$domain.bundle";
			echo "<pre>";
			echo shell_exec($command);
			echo "</pre>";
		}
	}else{
		echo "<pre> CERTBOT not installed in '".CERTBOT_PATH."' please configure file</pre>";
	}


	echo "<br>";
 ?>
	<p>
		Welcome to the certbot module for CWP

		This relies on CERTBOT already being installed on your system, please configure this file by changing:
		<code>DEFINE('CERTBOT_PATH',"/root/")</code>
		To wherever Certbot is installed
	</p>
 <form method="post">
	 <label for="domain">Domain Name:</label>
 	<input type="text" name="domain" placeholder="Domain Name... ">
	<br>
	<label for="acc">Account Name:</label>
 	<input type="text" name="acc" placeholder="Account Name...">
	<br>
	<label for="email">Email:</label>
 	<input type="text" name="email" placeholder="Email...">
	<br>
 	<button name="createCert">Create</button>
 </form>
