var plagin = {
    ajaxMethod: 'POST',

    add: function() {
        var formData = new FormData();

        formData.append('exampleFormControlFile', $('#exampleFormControlFile1').val());


        $.ajax({
            url: '/lynxcms/admin/plagins/',
            type: this.ajaxMethod,
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function(){

            },
            success: function(result){
                console.log(result);
                window.location = '/lynxcms/admin/plagins';
            }

        });
    },

    delPlagin: function() {
        var formData = new FormData();

        formData.append('checkbox', $('#checkbox1').val());

        $.ajax({
            url: '/lynxcms/admin/plagins/del/',
            type: this.ajaxMethod,
            data: formData,
            // data:$('formPlagin').serialize(),
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function(){

            },
            success: function(result){
                console.log(result);
                window.location = '/lynxcms/admin/plagins';
            }
        });
    },

    activPlagin: function() {
        var formData = new FormData();

        formData.append('CheckboxPlagins', $('#blankCheckbox').val());

        $.ajax({
            url: '/lynxcms/admin/plagins/activ/',
            type: this.ajaxMethod,
            // data: formData,
            data:$('селектор_формы').serialize(),
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function(){

            },

            success: function(result){
                console.log(result);
                window.location = '/lynxcms/admin/plagins';
            }
        });
        function showValues() {
            var fields = $(":input").serializeArray();
            $("#results").empty();
            jQuery.each(fields, function(i, field){
                $("#results").append(field.value + " ");
            });
        }

        $(":checkbox").click(showValues);
        showValues();
    }
};