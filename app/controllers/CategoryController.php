<?php

class CategoryController extends BaseController {
	public function getAllCategories() {
		return View::make('AllCategories');
	}

	public function edit($id) {
		$category = Category::find($id);
		
		return View::make('EditCategories', compact('category'));
	}
	public function update($id) {
		$input = Input::all();
		$cat = Category::find($id);
		$img_name = $cat->image;
		/*var_dump($input);
		die();*/
		$cat->cat_name = $input['cat_name'];
		$cat->description = $input['description'];
		

		$data = $input['image_input'];

		//decoding the image
		if($data){
			$cat->image = time().'.jpeg';
			$imgstr = urldecode($data);
			$im = imagecreatefromjpeg($imgstr);
			imagejpeg($im, 'Uploads/graphics/categories/'.time().'.jpeg', 70);
			imagedestroy($im);

			$target = "Uploads/graphics/categories/".$img_name;
			unlink($target);
		}

		

		$saveFlag = $cat->save();
		return View::make('AllCategories');
	}

	public function destroy($id) {
		$img_name = Category::find($id)->image;
		Category::find($id)->delete();

		$target = "Uploads/graphics/categories/".$img_name;
		unlink($target);
		return View::make('AllCategories');
	}
}