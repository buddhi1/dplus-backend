<?php

class ImageController extends BaseController {



public function addShow()
{

	return View::make('image.add');
}
public function add()
{	
	$data = Input::get('image_input');
	if($data){

		$imgstr = urldecode($data);

		$im = imagecreatefromjpeg($imgstr);
		imagejpeg($im, 'Uploads/graphics/images/'.time().'.jpeg', 70);
		imagedestroy($im);
		
		$image = new Image;
		$image->description = Input::get('description');
		$image->img_name = time().'.jpeg';
		$image->item_id = Input::get('item');
		$saveFlag = $image->save();	
			if($saveFlag){
				return 'Image Uploaded Successfully';
			}

		}
	
}
public function getAllImages(){
	$item_id=1;


	$images = Image::where('item_id','=',$item_id)->get();

	for ($i=0; $i<sizeof($images) -1  ; $i++) {
		$imagesTOJason[$i]= array('id' => $images[$i]['id'], 'img_name' => $images[$i]['img_name']);
	}
	return Response::json($imagesTOJason);
}

public function getImageData(){
	$id=12;
	
	$imageData = Image::where('id','=',$id)->get();
		
		$data[0][] = array('id' => $imageData[0]['id'] ,'img_name' => $imageData[0]['img_name'] ,'description' => $imageData[0]['description'] );
 
	return Response::json($data);
}

public function thumbnailShow(){
	$id = 13;

	$image = Image::where('id','=',$id)->get();
	
	echo "<img src='Uploads/images/".$image[0]['img_name']."' />";
}

public function viewAllImages(){

	return View::make('image.view');
}
}