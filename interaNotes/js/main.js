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

// Page 'Creer un examen'


function ouvrirBox(compteur) {
    $('#box'+compteur).toggle();
}

$(document).ready(function() {
    if(document.getElementById("box0") != undefined)
        $('.box').toggle();
    
});



// WARNING: tooltip
$(document).ready(function() {
    $('[data-toggle=tooltip]').tooltip();
});

$(document).ready(function () {

    //init pop-ups
    $(".popup").attr("data-close", false);

    //click on pop-up opener.
    //pop-up is expected to be a child of opener
    $(".more_info").click(function () {
        var $title = $(this).find(".popup");
        //open if not marked for closing
        if ($title.attr("data-close") === "false") {
            $title.show();
        }
        //reset popup
        $title.attr("data-close", false);
    });

    //mark pop-up for closing if clicked on
    //close is initiated by document.mouseup,
    //marker will stop opener from re-opening it
    $(".popup").click(function () {
        $(this).attr("data-close",true);
    });

    //hide all pop-ups
    $(document).mouseup(function () {
        $(".popup").hide();

    });

    //show on rollover if mouse is used
    $(".more_info").mouseenter(function () {
        var $title = $(this).find(".popup");
        $title.show();
    });

    //hide on roll-out
    $(".more_info").mouseleave(function () {
        var $title = $(this).find(".popup");
        $title.hide();
    });

});

function ajouterValeurDeParametre(event,idValeur,idListe,idExposantValeur,idUnite,idExposantUnite) {


    var valeur = document.getElementById(idValeur);
    var liste = document.getElementById(idListe);  
    var exposantValeur = document.getElementById(idExposantValeur); 
    var unite = document.getElementById(idUnite);
    var exposantUnite = document.getElementById(idExposantUnite);


    var option = document.createElement("option");
    option.text = valeur.value+" / "+exposantValeur.value+" / "+unite.value+" / "+exposantUnite.value;


    liste.add(option);
    event.preventDefault();
    valeur.value = null;
    return false;
    
}

function ajouteEvent(objet, typeEvent, nomFonction, typePropagation){
  if (objet.addEventListener){
    objet.addEventListener(typeEvent, nomFonction, typePropagation);
}
else if (objet.attachEvent)         {
    objet.attachEvent('on'+typeEvent, nomFonction);
}
}

function supprimerSelection() {
  var i = 0;
  while(document.getElementById('bouton'+i) != undefined){
    var bouton = document.getElementById('bouton'+i);
    ajouteEvent (bouton, 'click',supprimerValeur, false);
    i++;
}
}

function supprimerValeur(i) {

    var liste = document.getElementById('parametre'+i);
    
    if(liste.options.selectedIndex >= 0) {
        var optionIndex = liste.options.selectedIndex;
        liste.options[optionIndex] = null;
    } else {
        i++;
   
}
}
