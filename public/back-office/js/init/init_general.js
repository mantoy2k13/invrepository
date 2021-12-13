jQuery(document).ready(function($) {
    $('.image-popup').magnificPopup({
        type: 'image',
        closeOnContentClick: true,
        mainClass: 'mfp-fade',
        gallery: {
            enabled: true,
            navigateByImgClick: true,
            preload: [0,1] // Will preload 0 - before current, and 1 after the current image
        }
    });
    $('.datatables').DataTable();
    // Summer Note
    $('.summernote').summernote({
        height: 350,                 // set editor height
        minHeight: null,             // set minimum height of editor
        maxHeight: null,             // set maximum height of editor
        focus: false                 // set focus to editable area after initializing summernote
    });
});

function previewImage(e, parent){
    const file = e.files[0];
    if (file){
        if(file.size <= 3000000) { // 3MB
            let reader = new FileReader();
            reader.onload = function(event){
                console.log(event.target.result);
                $(parent).html(
                    '<div class="uploaded-files-wrapper img-responsive">'+
                        '<img src="'+event.target.result+'" alt="" >'+
                        '<div class="uploaded-files-body">'+
                            '<i class="ti-export"></i>'+
                            ' <p class="text-black">Click to Change Image</p>'+
                        '</div>'+
                        '<input id="uploadFiles" type="file" accept=".gif, .png, .jpg, .jpeg" onchange="previewImage(this, \'.asset-image-upload\')">'+
                        '<input name="asset_image" value="'+event.target.result+'" hidden>' +
                    '</div>'
                );
            }
            reader.readAsDataURL(file);
        }else{
            toastr.error('Image should less than or equal to 3 MB or 3000kb');
        }
    }else{
        toastr.error('Image should less than or equal to 3 MB or 3000kb');
    }
}