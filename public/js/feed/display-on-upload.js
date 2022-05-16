// display image on targeted element upon upload
var loadFile = function(event) {
	var image = document.getElementById('thumbnail');
	image.src = URL.createObjectURL(event.target.files[0]);
};