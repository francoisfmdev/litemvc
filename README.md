htaccess content 
RewriteEngine On
RewriteBase /lightmvc/
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^ index.php [QSA,L] 
