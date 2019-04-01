function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#book_image_preview')
                .attr('src', e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
    }
}

document.querySelectorAll('.inventorytools-btn').forEach(function(btn){
	btn.addEventListener('click',function(){
		
	});
});