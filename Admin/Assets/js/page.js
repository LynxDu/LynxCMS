var page = {
    ajaxMethod: 'POST',

    add: function() {
        var formData = new FormData();

        formData.append('title', $('#formTitle').val());
        formData.append('content', $('#formContent').val());

        $.ajax({
            url: '/lynxcms/admin/page/add/',
            type: this.ajaxMethod,
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function(){

            },
            success: function(result){
                 console.log(result);
                 window.location = '/lynxcms/admin/pages/edit/' + result;
            }
        });
    },

    update: function() {
        var formData = new FormData();

        formData.append('page_id', $('#formPageId').val());
        formData.append('title', $('#formTitle').val());
        formData.append('content', $('#formContent').val());

        $.ajax({
            url: '/lynxcms/admin/page/update/',
            type: this.ajaxMethod,
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function(){

            },
            success: function(result){
                console.log(result);
                //window.location = '/lynxcms/admin/pages/edit/' + result;
            }
        });
    }
};

console.log(page);