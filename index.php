<?php

session_start();

// all require stuff to work!!
require_once 'init/10_database.php';
require_once 'init/20_imports.php';



// query params with 'c' means controller and 'a' means action
// controller is alwayse the controller of the views
// and the action is alwayse the method of the controller, which has be called before render HTML

// check controller name is given? if not use 'pages' as default!
$controllerName = $_GET['c'] ?? 'pages';

// check action name is given? if not use 'index' as default!
$actionName = $_GET['a'] ?? 'index';

// generate the correct controller path and check file exists?
$controllerPath = __DIR__.'/controller/'.$controllerName.'_controller.php';

if(file_exists($controllerPath))
{
	include_once $controllerPath;

	// example of included controller name is PagesController in default
	$controllerClassName = '\\app\\controller\\'.ucfirst($controllerName).'Controller';

	// is the class name a valid name in our context?
	if(class_exists($controllerClassName))
	{
		// generate the controller as an object from the class name
		$controllerInstance = new $controllerClassName($actionName, $controllerName);

		// check index action is availible
		$actionMethodName = 'action'.ucfirst($actionName);

		if(method_exists($controllerInstance, $actionMethodName))
		{
			// call the action method and render HTML !!!
			$controllerInstance->{$actionMethodName}();
			$controllerInstance->renderHTML();
		}
		else
		{
			header('Location: index.php?c=pages&a=error404');
		}
	}
	else
	{
		header('Location: index.php?c=pages&a=error404');
	}
}
else
{
	header('Location: index.php?c=pages&a=error404');
}