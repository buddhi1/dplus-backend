<?php

class ItemController extends BaseController {
	public function getAllItems() {
		return View::make('AllItems');
	}
}