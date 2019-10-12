(function(){
    'use strict';
    document.ready(function(){
        $.ajax({
            Url:'my-config.ajax-url',
            type:'POST',
            dataType:'json',
            data:{},
            success:function(response){
                alert(response);
            }
        });
    });
})(JQuery);