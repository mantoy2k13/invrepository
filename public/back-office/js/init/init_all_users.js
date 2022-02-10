function updateUser(e, formNameId, errDiv){
	$('#'+formNameId).parsley().validate();
    if($('#'+formNameId).parsley().isValid()) {
        var formUrl = $('#'+formNameId).attr('action');
        var formData  = $('#'+formNameId).serializeArray();
        $(e).buttonLoader('start');
        $.ajax({
            type: 'POST',
            url: formUrl,
            data: formData,
            success:(res)=>{
                $(e).buttonLoader('stop');
                if(res.status==false){
                    $('#'+errDiv).html(
                        '<div class="alert alert-danger alert-dismissable">'+
                            '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>'
                            +res.msg+
                        '</div>'
                    );
                }else{
                    if(formNameId=='updateProfileForm'){
                        $('#'+errDiv).html('');
                        toastr.success(res.msg);
                        location.reload();
                    }else{
                        $('#password').val('');
                        $('#confirm_password').val('');
                        $('#'+errDiv).html('');
                        toastr.success(res.msg);
                    }
                }
            },
            error: function (res) {
                $(e).buttonLoader('stop');
                toastr.error('A problem occured. Please refresh your page and try again.');
                console.log(res.responseJSON.message);
            }
        });
    }
}
function loadViewUser(url, filter){
    let table = $('#viewUserTable').DataTable({
        'ajax': url + filter,
        'columns': [
            { 'data': 'username' },
            { 'data': 'email' },
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
            { "className": 'text-center', "targets": 3 }
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

