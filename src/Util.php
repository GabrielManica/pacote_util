<?php

if(!function_exists('_limpar'))
{
    function _limpar($var)
	{
		$var = strtr(strtoupper($var), array(
			"." => NULL,
			"-" => NULL,
			"/" => NULL,
			")" => NULL,
			" " => NULL,
			"(" => NULL
		));
		$var = trim($var);
		return $var;
	}
}