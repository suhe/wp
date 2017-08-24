<?php
class Controller {
	public function __construct() {
		$GLOBALS['instance'][] = &$this;
	}
}
