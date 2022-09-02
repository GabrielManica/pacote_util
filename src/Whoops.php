<?php
$ini = parse_ini_file('app/config/application.ini', true);

if (!empty(self::$ini['general']['debug']) && $ini['general']['debug'] == '1')
{
    $handler = new \Whoops\Handler\PrettyPageHandler;
    $handler->setEditor("vscode");
    $whoops = new \Whoops\Run;
    $whoops->prependHandler($handler);
    $whoops->register();
}