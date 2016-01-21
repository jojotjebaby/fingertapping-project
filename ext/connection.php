<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=XXXXXXXXX;charset=utf8', 'USERNAME', 'PASSWORD');
}
catch (Exception $e)
{
        echo 'Exception reçue : ',  $e->getMessage(), "\n";
}
