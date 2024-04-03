<?php

namespace Debugger\Content;

use ModuledPage\Page\AbstractModuleContent;

class PhpinfoPageModule extends AbstractModuleContent {

	// Implementation of IPageModule

	public function getHtml() {
		ob_start();
		phpinfo();
		$content = ob_get_contents();
		ob_end_clean();
		return $content;
	}

}

