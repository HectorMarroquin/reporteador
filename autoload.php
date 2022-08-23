<?php 

function controllers_autoload($classname){

	include_once 'controllers/'. $classname.'.php';
}

spl_autoload_register('controllers_autoload');

// EN EL ARCHIVO HTACCESS DEBEMOS ACTIVAR EN RewriteEngine entrando a  sudo nano /etc/apache2/apache2.conf

//Despues Ponemos en All EL AllowOverride

/*
<Directory /var/www/>
        Options Indexes FollowSymLinks
        AllowOverride All
        Require all granted
</Directory>

*/

//Reiniciamos servidor apache y listo