function showInvestmentModal(){
    $('#addCashModal').modal('show');
}
function submitCash(e, formID){
    $('#'+formID).parsley().validate();
    if($('#'+formID).parsley().isValid()) {
        var formUrl = $('#investUrl').val();
        $(e).buttonLoader('start');
        $.ajax({
            type: 'POST',
            url: formUrl,
            data: $('#'+formID).serialize(),
            success:(res)=>{
                if(res.status ==false){
                    toastr.error(res.msg);
                    $(e).buttonLoader('stop');
                }else{
                    toastr.success(res.msg);
                    setTimeout(function(){ location.reload(); }, 500);
                }                
                console.log(res);
                // 
            },
            error: function (res) {
                $(e).buttonLoader('stop');
                toastr.error('A problem occured. Please refresh your page and try again.');
                console.log(res.responseJSON.message);
            }
        });
    }
}