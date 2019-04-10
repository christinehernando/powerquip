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
        document.getElementById('inventorytool_name').innerHTML = this.parentElement.parentElement.parentElement.parentElement.previousElementSibling.previousElementSibling.textContent;
		document.getElementById('inventorytools_update').innerHTML = this.parentElement.previousElementSibling.previousElementSibling.textContent;
        document.getElementById('inventorytools_update_from').innerHTML = this.parentElement.previousElementSibling.textContent;
       let tool_id = this.parentElement.previousElementSibling.previousElementSibling.previousElementSibling.textContent;
        document.getElementById('howmygash').action = "/inventorytools/"+tool_id;


        

	});
});


document.querySelectorAll('.borrow-approve').forEach(function(btn){
    btn.addEventListener('click', function(){
        
    })
})