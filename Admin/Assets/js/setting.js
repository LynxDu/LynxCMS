var setting = {
    ajaxMethod: 'POST',

    updates: function() {
        let formData = $('#formSetting').serialize();
        //console.log(formData);
        $.ajax({
            url: '/lynxcms/admin/settings/update/',
            type: this.ajaxMethod,
            data: formData,
            beforeSend: function(){

            },
            success: function(result){
                console.log(result);
                window.location = '/lynxcms/admin/settings/general/';
            }
        });
    }
};