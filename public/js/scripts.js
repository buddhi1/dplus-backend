var fr;
var img;
var uploadImage;

document.getElementById('image').onchange = function(){
	var file = this.files[0];
	fr = new FileReader();
	fr.onload = loadPhoto;  
	fr.readAsDataURL(file);
};

loadPhoto = function(){
	img = new Image();
	img.onload = drawImage;
	img.src = fr.result;
}

drawImage = function(){

	canvas = document.getElementById('image-canvas');

	var maxWidth = 640;
	var maxHeight = 480;

	//setting the width and height of the canvas
	if(maxWidth > img.width) {
		canvas.width = img.width;
		canvas.height = img.height
	} else {
		canvas.width = maxWidth;
		canvas.height = (img.height / img.width) * maxWidth;
	}

	if(canvas.height > maxHeight){
		canvas.width = (canvas.width / canvas.height) * maxHeight;
		canvas.height = maxHeight;
	}

	//drawing the image on the canvas
	ctx = canvas.getContext("2d");

	ctx.drawImage(img,0,0,canvas.width,canvas.height);

	//encoding the image to a DataURL
	uploadImage = canvas.toDataURL('Image/jpeg',.7);
	uploadImage = encodeURIComponent(uploadImage);
	document.getElementById('image_input').value = uploadImage;
}