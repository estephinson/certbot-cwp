# certbot-cwp
Certbot module for CentOS Web Panel

Currently supporting [certbot-auto](https://certbot.eff.org/)
##Installation
Certbot module, atleast in its current form, requires that Certbot is already installed on your system.

Upload the certbot.php file to
```
/usr/local/cwpsrv/htdocs/resources/admin/modules
```
Create/Edit
```
/usr/local/cwpsrv/htdocs/resources/admin/include/3rdparty.php
```
And add the following line
```html
<li><a href="index.php?module=certbot"><span class="icon16 icomoon-icon-arrow-right-3"></span>Certbot</a></li>
```
## Configuration
To configure Cerbot Module so that it knows where to find your certbot installation, change the following:
```php
	DEFINE('CERTBOT_PATH',"/root/");
```
```php
	DEFINE('CERTBOT_PATH',"/full-install-path/");
```

##Contribute
Feel free to create a pull request if you feel you have added useful functionality
##Errors and issues
Please use the issue tracker on Github, attach your certbot.php file and any relevant information you can grab. I will try my best to fix for next release
