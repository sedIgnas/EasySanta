<?php

spl_autoload_register('appAutoloader');

// Class autoloader
function appAutoloader($className)
{
  $path = 'app/classes/';
  $extension = ".class.php";
  $fullPath = $path . $className . $extension;

  include_once $fullPath;
}