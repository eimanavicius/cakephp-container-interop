<?php

use Interop\Container\ContainerInterface;

App::uses('ClassRegistry', 'Utility');

class ClassRegistryConfigTest extends CakeTestCase {

	public function setUp() {
		parent::setUp();
		ClassRegistry::flush();
		require dirname(dirname(__DIR__)) . '/Config/bootstrap.php';
	}

	public function testContainerIsRegisteredUnderContainerName() {
		$this->assertTrue(ClassRegistry::isKeySet('container'));
	}

	public function testContainerIsRegisteredUnderFullClassName() {
		$this->assertTrue(ClassRegistry::isKeySet(ContainerInterface::CLASS));
	}
}
