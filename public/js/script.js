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
	if(maxWidth > img.width){
		canvas.width = img.width;
		canvas.height = img.height
	}else{
		canvas.width = maxWidth;
		canvas.height = (img.height / img.width) * maxWidth;
	}

	if(canvas.height > maxHeight){
		canvas.width = (canvas.width / canvas.height) * maxHeight;
		canvas.height = maxHeight;
	}

	ctx = canvas.getContext("2d");

	ctx.drawImage(img,0,0,canvas.width,canvas.height);
	uploadImage = canvas.toDataURL('Image/jpeg',.7);
	uploadImage = encodeURIComponent(uploadImage);
	document.getElementById('image_input').value = uploadImage;
}
 
document.getElementById('category').onchange = function(){
	console.log(this.value);
	sendRequestToServerPost(http_path+'/loadItem','cat_id='+this.value,handleResponce);
}

	var handleResponce = function(res){
		var items = JSON.parse(res);
		
		document.getElementById("item").options.length=0;
		for(var i=0; items.length;++i){
			
			var option = document.createElement("option");
			option.text = items[i]['item_name'];
			option.value = items[i]['id'];
			var select = document.getElementById("item");
			select.appendChild(option);
		}		
	}

var loadItem = function(){	
	console.log('dfgdf');
	sendRequestToServerPost(http_path+'/loadItem','cat_id='+document.getElementById('category').value,handleResponce);
}

