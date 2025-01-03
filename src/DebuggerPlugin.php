<?php declare(strict_types=1);

namespace Debugger;

use Api\IPlugin;
use Api\ICheck;
use Base3\ServiceLocator;

class DebuggerPlugin implements IPlugin, ICheck {

	private $servicelocator;

	public function __construct() {
		$this->servicelocator = ServiceLocator::getInstance();
	}

	// Implementation of IBase

	public function getName() {
		return "debuggerplugin";
	}

	// Implementation of IPlugin

	public function init() {

		$this->servicelocator

			->set($this->getName(), $this, ServiceLocator::SHARED);
	}

	// Implementation of ICheck

	public function checkDependencies() {
		return array(
			"freetemplateplugin_installed" => $this->servicelocator->get('freetemplateplugin') ? "Ok" : "freetemplatepageplugin not installed"
		);
	}

}

