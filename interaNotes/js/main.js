$(document).ready(function() {
    function setHeight() {
        windowHeight = $(window).innerHeight();
        $('.container-fluid').css('min-height', windowHeight-($('footer').height() + $('nav').height() + 26));
    };
    setHeight();

    $(window).resize(function() {
        setHeight();
    });
});

'use strict';

;( function ( document, window, index )
{
    var inputs = document.querySelectorAll( '.inputfile' );
    Array.prototype.forEach.call( inputs, function( input )
    {
        var label	 = input.nextElementSibling,
        labelVal = label.innerHTML;

        input.addEventListener( 'change', function( e )
        {
            var fileName = '';
            if( this.files && this.files.length > 1 )
            fileName = ( this.getAttribute( 'data-multiple-caption' ) || '' ).replace( '{count}', this.files.length );
            else
            fileName = e.target.value.split( '\\' ).pop();

            if( fileName )
            label.querySelector( 'span' ).innerHTML = fileName;
            else
            label.innerHTML = labelVal;
        });

        // Firefox bug fix
        input.addEventListener( 'focus', function(){ input.classList.add( 'has-focus' ); });
        input.addEventListener( 'blur', function(){ input.classList.remove( 'has-focus' ); });
    });
}( document, window, 0 ));


function adjustHeightTextArea(el){
    el.style.height = (el.scrollHeight > el.clientHeight) ? (el.scrollHeight)+"px" : "215px";
}

function adjustHeightTextAreaLittle(el){
    el.style.height = (el.scrollHeight > el.clientHeight) ? (el.scrollHeight)+"px" : "100px";
}


$('input').focus(function(){
    $(this).parents('.form-group').addClass('focused');
});

$('input').blur(function(){
    var inputValue = $(this).val();
    if ( inputValue == "" ) {
        $(this).removeClass('filled');
        $(this).parents('.form-group').removeClass('focused');
    } else {
        $(this).addClass('filled');
    }
});

// WARNING: Fonction affichage div : pop up
$('.popUp').click(function(){
    $('.box').toggle();
});

// WARNING: tooltip
$(document).ready(function() {
    $('[data-toggle=tooltip]').tooltip();
});
