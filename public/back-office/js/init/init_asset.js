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
            { 'data': 'asset_img' },
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