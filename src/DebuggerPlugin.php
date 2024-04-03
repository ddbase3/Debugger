<?php

namespace Debugger;

use Api\IPlugin;
use Api\ICheck;

class DebuggerPlugin implements IPlugin, ICheck {

	private $servicelocator;

	public function __construct() {
		$this->servicelocator = \Base3\ServiceLocator::getInstance();
	}

	// Implementation of IBase

	public function getName() {
		return "debuggerplugin";
	}

	// Implementation of IPlugin

	public function init() {

		$this->servicelocator
			->set($this->getName(), $this, true)
			;

	}

	// Implementation of ICheck

	public function checkDependencies() {
		return array(
			"freetemplateplugin_installed" => $this->servicelocator->get('freetemplateplugin') ? "Ok" : "freetemplatepageplugin not installed"
		);
	}

}

