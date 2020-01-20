$( document ).ready(function() {
    console.log( "ready!" );
    
    $('#admin-side-panel').css('height', window.innerHeight);
    
    $( window ).resize(function() {
        $('#admin-side-panel').css('height', window.innerHeight);
    });
});

