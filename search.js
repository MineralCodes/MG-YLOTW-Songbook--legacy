$(document).ready(function(){
    /*$('#search').keyup(function(){
        var valThis = $(this).val().toLowerCase();
        $('ul > li').each(function(){
            alert( "Handler for .keyup() called." );
            var text = $(this).text().toLowerCase();
            (text.indexOf(valThis) == 0) ? $(this).show() : $(this).hide();            
        });
    });*/
   $('#search').on('input', function(){
   var valThis = $(this).val().toLowerCase();
    if(valThis == ""){
        $('ul > li').show();           
    } else {
        $('ul > li').each(function(){
            var text = $(this).text().toLowerCase();
            (text.indexOf(valThis) >= 0) ? $(this).show() : $(this).hide();
        });
   };
});
});

