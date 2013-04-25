web 服务器配置
-------------------	

### apache
	<VirtualHost *:80>
		DocumentRoot "d:/www/linli"
		ServerName www.linli.com
		ServerAlias  www.linli.com
		
		SetEnv ENVIRONMENT development
		SetEnv ENV_DB_HOST 127.0.0.1
		SetEnv ENV_DB_USER root
		SetEnv ENV_DB_PASS 
		SetEnv ENV_DB_NAME linli
		SetEnv DEV 1
		SetEnv IS_DEV 1
		
		<Directory "d:/www/linli">
			AddDefaultCharset UTF-8
			AllowOverride All
			SetEnv ENVIRONMENT linli
			SetEnv ENV_UPLOAD_PATH 
			RewriteEngine On
			RewriteBase /
			RewriteCond %{REQUEST_FILENAME} !-f
			RewriteCond %{REQUEST_FILENAME} !-d
			RewriteRule ^(.*)$ index.php?/$1 [L]
		</Directory>
	   
	</VirtualHost>
	

## 说明

* 数据库连接参数等配置信息不要写到代码里，通过 Web Server 传递给 PHP
* 程序中,需要根据 $_SERVER['ENVIRONMENT'] 变量区分当前环境


