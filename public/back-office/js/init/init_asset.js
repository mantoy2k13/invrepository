function submitAsset(e, formNameId){
    $('#'+formNameId).parsley().validate();
    if($('#'+formNameId).parsley().isValid()) {
        var formUrl = $('#'+formNameId).attr('action');
        var formData  = $('#'+formNameId).serializeArray();
        formData.push({name: 'asset_description', value: $('#asset_description').code()});
        $(e).buttonLoader('start');
        $.ajax({
            type: 'POST',
            url: formUrl,
            data: formData,
            success:(res)=>{
                toastr.success(res.msg);
                setTimeout(function(){ location.reload(); }, 500);
            },
            error: function (res) {
                $(e).buttonLoader('stop');
                toastr.error('A problem occured. Please refresh your page and try again.');
                console.log(res.responseJSON.message);
            }
        });
    }
}

function loadAssets(url, filter){
    let table = $('#assetsTable').DataTable({
        'ajax': url + filter,
        'columns': [
            { 'data': 'asset_name' },
            { 'data': 'asset_description' },
            { 'data': 'asset_price' },
            { 'data': 'asset_quantity' },
            { 'data': 'created_at' },
            { 'data': 'asset_img', orderable: false, searchable: false  },
            { 'data': 'action', orderable: false, searchable: false }
        ],
        'paging': true,
        'lengthChange': true,
        'searching': true,
        "order": [
            [0, "asc"]
        ],
        "bDestroy": true,
        'info': true,
        'autoWidth': false,
        "columnDefs": [
            { "className": 'text-center', "targets": 2 },
            { "className": 'text-center', "targets": 5 },
            { "className": 'text-center', "targets": 6 }
        ],
        fnDrawCallback: function() {
            $('.image-popup').magnificPopup({
                type: 'image',
                closeOnContentClick: true,
                mainClass: 'mfp-fade',
                gallery: {
                    enabled: true,
                    navigateByImgClick: true,
                    preload: [0, 1] // Will preload 0 - before current, and 1 after the current image
                }
            });
        }
    });
}

function deleteAsset(id, name){
    swal({
        title: "Delete "+name+"?",
        text: "This item will be move to trash.",
        type: "warning",
        showCancelButton: true,
        showLoaderOnConfirm: true,
        confirmButtonText: "Move to Trash",
        closeOnConfirm: false,
        confirmButtonColor: "#e11641"
    }, ()=>{
        $.ajax({
            type: 'POST',
            url: $('#delete_url').val(),
            data: {id:id},
            success:(res)=>{
                swal('Moved to Trash', res.msg, 'success');
                loadAssets($('#assets_view_url').val(), "");
            },
            error: function (res) {
                swal('Error!', 'A problem occured. Please refresh your page and try again.', 'error');
                console.log(res.responseJSON.message);
            }
        });
    });
}

function watchVideo(url){
	document.getElementById("video-content").innerHTML = '<iframe src="'+url+'?rel=0&autoplay=1&controls=1&showinfo=0&suggestion=0" frameborder="0" allowfullscreen></iframe>';
	var element = document.getElementById("video-banner-text");
  	element.classList.add("d-none");
}
