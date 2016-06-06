<?php

use Interop\Container\ContainerInterface;

App::uses('ClassRegistry', 'Utility');

$containerFile = Configure::read(ContainerInterface::CLASS) ?: APP . 'Config/container.php';

ClassRegistry::addObject(ContainerInterface::CLASS, require $containerFile);
ClassRegistry::map('container', ContainerInterface::CLASS);
