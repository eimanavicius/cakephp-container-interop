<?php

use Interop\Container\ContainerInterface;

App::uses('Component', 'Controller');

class ContainerComponent extends Component implements ContainerInterface {

	/**
	 * @var \Interop\Container\ContainerInterface
	 */
	protected $_container;

	public function __construct(\ComponentCollection $collection, array $settings) {
		$this->_container = ClassRegistry::getObject(ContainerInterface::CLASS);
		parent::__construct($collection, $settings);
	}

	public function get($id) {
		return $this->_container->get($id);
	}

	public function has($id) {
		return $this->_container->has($id);
	}

	/**
	 * @return \Interop\Container\ContainerInterface
	 */
	public function getContainer() {
		return $this->_container;
	}
}
