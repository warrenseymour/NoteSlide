<?php

use lithium\net\http\Router;
use lithium\core\Environment;

Router::connect('/', 'Notes::index');

if (!Environment::is('production')) {
	Router::connect('/test/{:args}', array('controller' => 'lithium\test\Controller'));
	Router::connect('/test', array('controller' => 'lithium\test\Controller'));
}

Router::connect('/{:controller}/{:action}/{:id:[0-9a-f]{24}}.{:type}', array('id' => null));
Router::connect('/{:controller}/{:action}/{:id:[0-9a-f]{24}}');

Router::connect('/notes/{:group}', array(
    'controller' => 'notes',
    'action' => 'index'
));

/*
Router::connect('/notes/latitude:{:latitude}/longitude:{:longitude}', array(
    'controller' => 'notes',
    'action' => 'index'
));
 */
Router::connect('/{:controller}/{:action}/{:args}');

?>