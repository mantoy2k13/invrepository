function updateProfileAccount(e, formNameId, errDiv){
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