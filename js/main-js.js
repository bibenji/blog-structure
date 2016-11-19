$('#newsletter-btn').click(function() {
   var mail = $('#newsletter-email').val();
    if (mail != '') {
       $.ajax({
           method: "POST" ,
            url: "modules/newsletter/newsletter-ajax.php",
            data: { email: mail }
        })
        .done(function( msg ) {
            if (msg != 'Echec') {
                $('#newsletter-register').text(msg);                
            }           
        });
       
   }
    

    
});