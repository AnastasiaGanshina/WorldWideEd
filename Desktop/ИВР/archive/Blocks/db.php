<?php

require("libs/rb.php");
R::setup( 'mysql:host=a223474.mysql.mchost.ru;dbname=a223474_Log',
        'a223474_KbNg', 'Dc1234!1029384756a' );
if ( !R::testConnection() )
{
        exit ('Нет соединения с базой данных');
}

session_start(); 