<?php

use Interop\Container\ContainerInterface;

App::uses('Component', 'Controller');

class ContainerComponent extends Component implements ContainerInterface {

/**
 * @var \Interop\Container\ContainerInterface
 */
	protected $_container;

/**
 * Takes Container from ClassRegistry
 *
 * {@inheritDoc}
 */
	public function __construct(\ComponentCollection $collection, array $settings) {
		$this->_container = ClassRegistry::getObject(ContainerInterface::CLASS);
		parent::__construct($collection, $settings);
	}

/**
 * {@inheritDoc}
 */
	public function get($id) {
		return $this->_container->get($id);
	}

/**
 * {@inheritDoc}
 */
	public function has($id) {
		return $this->_container->has($id);
	}

/**
 * Return Container object that is used.
 *
 * @return \Interop\Container\ContainerInterface
 */
	public function getContainer() {
		return $this->_container;
	}
}
