### Setup

#### Update Apache's `httpd.conf`


1. Uncomment the following line:
```
LoadModule rewrite_module modules/mod_rewrite.so
```

2. Update directory to public folder:
```
<Directory "/Applications/MAMP/htdocs/comp3013/public">

    Options Indexes FollowSymLinks MultiViews

    AllowOverride All

    Order allow,deny
    Allow from all

    XSendFilePath "/Applications/MAMP/htdocs"

</Directory>
```
