function get_scale(scale) {
	console.log(scale);
	var scale_split = scale.split(" ");
	document.getElementById('scale_root').value = scale_split[0];
	document.getElementById('scale_name').value = scale_split[1];
    document.getElementById('get_scale').submit();
}