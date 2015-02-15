<?php

class ItemController extends BaseController {
	public function getAllItems() {
		return View::make('AllItems');
	}

	public function edit($id) {
		$item = Item::find($id);
		
		return View::make('EditItems', compact('item'));
	}
	public function update($id) {
		$input = Input::all();
		$it = Item::find($id);
		$img_name = $it->image;
		/*var_dump($input);
		die();*/
		$it->item_name = $input['item_name'];
		$it->description = $input['description'];
		$it->image = time().'.jpeg';

		$data = $input['image_input'];

		//decoding the image
		if($data){
			$imgstr = urldecode($data);
			$im = imagecreatefromjpeg($imgstr);
			imagejpeg($im, 'Uploads/graphics/items/'.time().'.jpeg', 70);
			imagedestroy($im);
		}

		$target = "Uploads/graphics/items/".$img_name;
		unlink($target);

		$saveFlag = $it->save();
		return $target;
	}

	public function destroy($id) {
		$img_name = Item::find($id)->image;
		Item::find($id)->delete();

		$target = "Uploads/graphics/items/".$img_name;
		unlink($target);
		return View::make('AllItems');
	}
}