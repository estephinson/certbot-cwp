#Simple install script to simplyfy installation of the certbot module


echo "Downloading certbot.php to destination..."
curl -o /usr/local/cwpsrv/htdocs/resources/admin/modules/certbot.php https://raw.githubusercontent.com/estephinson/certbot-cwp/master/certbot.php
echo "Adding certbot to 3rdparty.php so can be accessed from the webpanel..."
echo '<li><a href="index.php?module=certbot"><span class="icon16 icomoon-icon-arrow-right-3"></span>Certbot</a></li>' >> /usr/local/cwpsrv/htdocs/resources/admin/include/3rdparty.php
echo "Certbot-module installed"
