<?php
class Main extends Controller implements ControllerInterface {
	function index() {
		$data['text'] = "Hello Peter";
		Load::view('main::index',$data);
	}

	function foo() {
		echo 'main foo';
	}

	static function test() {
		echo 'Error';
	}
}
