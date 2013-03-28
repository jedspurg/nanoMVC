<?php
require_once('application/config.php');
session_start();
function autoloader($class){	
	$class = strtolower($class) . '.php';
	// try to include recursively the class file
	$rit = new RecursiveIteratorIterator(new RecursiveDirectoryIterator('application/'));
	foreach ($rit as $entry){
		if ($class === $entry->getFileName()){
			require_once($entry->getPathname());
			return;
		}
	}
}
spl_autoload_register('autoloader');


//grab the path info and break it apart into separate variables
$paths= explode('/', $_SERVER['PATH_INFO']);

//check the view, if empty set to default view
if($paths[1] == ''){
	$view = DEFAULT_VIEW; 
}else{
	$view = $paths[1];
}
//check to see if a method is being called and assign the $method variable
$method = $paths[2];

//check to see if any parameters are passed and assign the $parameters array
for($i=3;$i < count($paths);$i++){
	
	$parameters[] = $paths[$i];
}


//uppercase the first variable name and append Controller to it. If none, the default controller will load
$controller = ucfirst($view).'Controller';
//instantiate our controller and pass in parameters
if (class_exists($controller)) {
    new $controller($view, $method, $parameters); 
} else {
		new Controller('404');
}

