<?php

	include_once('vendor/autoload.php');
	use Symfony\Component\HttpFoundation\Request;
	$request = Request::createFromGlobals();

	if ($request->getPathInfo())
	{
		$some = explode('/',$request->getPathInfo());
		if (isset($some[3]))
		{
			echo $some[3];
		}
	}
	ini_set ('display_errors',1);
	require_once 'application/bootstrap.php';
?>