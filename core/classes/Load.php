<?php
class Load {
	static function view($viewFile,$viewVars = array()) {
		extract($viewVars);
		$viewFileCheck = explode(".",$viewFile);
		if(!isset($viewFileCheck[1])) {
			$viewFile .= ".php";
		}

		$viewFile = str_replace("::","/",$viewFile);
		require_once $GLOBALS['config']['path']['app']."views/{$viewFile}";
	}
}
