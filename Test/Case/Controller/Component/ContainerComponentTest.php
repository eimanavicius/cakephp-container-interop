<?php

use Interop\Container\ContainerInterface;

App::uses('ComponentCollection', 'Controller');
App::uses('Component', 'Controller');
App::uses('ContainerComponent', 'ContainerInterop.Controller/Component');
App::uses('ClassRegistry', 'Utility');

class ContainerComponentTest extends CakeTestCase {

	/**
	 * @var ContainerInterface|PHPUnit_Framework_MockObject_MockObject
	 */
	public $container;

	/**
	 * @var \ContainerComponent
	 */
	public $component;

	/**
	 * @var mixed
	 */
	public $containerBackup;

	public function setUp() {
		parent::setUp();
		$this->containerBackup = ClassRegistry::getObject(ContainerInterface::CLASS);
		$this->container = $this->getMockForAbstractClass(ContainerInterface::CLASS);
		$this->replaceContainer($this->container);
		$this->component = new ContainerComponent(new ComponentCollection(), []);
	}

	public function tearDown() {
		$this->container = null;
		$this->component = null;
		if ($this->containerBackup) {
			$this->replaceContainer($this->containerBackup);
			$this->containerBackup = null;
		}
		parent::tearDown();
	}

	public function replaceContainer($container) {
		ClassRegistry::removeObject(ContainerInterface::CLASS);
		ClassRegistry::addObject(ContainerInterface::CLASS, $container);
	}

	public function testHasContainerInstanceFromClassRegistry() {
		$this->assertSame($this->container, $this->component->getContainer());
	}

	public function testGetsServiceFromContainer() {
		$serviceId = 'some-service-id';
		$service = new stdClass();

		$this->container
			->expects($this->once())
			->method('get')
			->with($serviceId)
			->will($this->returnValue($service));

		$this->assertSame($service, $this->component->get($serviceId));
	}

	public function testTrueWhenContainerHaveService() {
		$serviceId = 'some-existing-service-id';

		$this->container
			->expects($this->once())
			->method('has')
			->with($serviceId)
			->will($this->returnValue(true));

		$this->assertTrue($this->component->has($serviceId));
	}

	public function testFalseWhenContainerDoNotHaveService() {
		$serviceId = 'some-non-existing-service-id';

		$this->container
			->expects($this->once())
			->method('has')
			->with($serviceId)
			->will($this->returnValue(false));

		$this->assertFalse($this->component->has($serviceId));
	}
}
