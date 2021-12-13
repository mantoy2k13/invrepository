function submitAsset(e, formNameId){
    $('#'+formNameId).parsley().validate();
    if($('#'+formNameId).parsley().isValid()) {
        var formUrl = $('#'+formNameId).attr('action');
        var formData  = $('#'+formNameId).serializeArray();
        formData.push({name: 'asset_description', value: $('#asset_description').code()});
        $(e).buttonLoader('start');
        $.ajax({
            type: 'POST',
            url: formUrl, // submit_user_reviews
            data: formData,
            success:(res)=>{
                toastr.success(res.msg);
                setTimeout(function(){ location.reload(); }, 1500);
            },
            error: function (res) {
                $(e).buttonLoader('stop');
                toastr.error('A problem occured. Please refresh your page and try again.');
                console.log(res.responseJSON.message);
            }
        });
    }
}