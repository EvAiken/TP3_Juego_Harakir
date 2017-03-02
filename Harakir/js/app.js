$(document).ready(function() {

    /* Añadidos campos para recoger la informacion del servidor */
    var $nom = document.getElementById('jugador').innerHTML;
    var $punt = document.getElementById('puntos').innerHTML;
    var $cla = document.getElementById('clave').innerHTML;
    $('#cla').hide();
    var respuesta = new Array();
    var errores = 0;
    var puntuacion = 6; /* Añadido puntuacion = vidas */
    var texto1 = document.createTextNode("Tu puntuación total es 0 puntos");
    //Declaramos nuestras frases que hay que descubrir
    secretas = {
        0: "Godzilla",
        1: "Kendo",
        2: "Geisha",
        3: "Monte Fuji",
        4: "Samurai",
        5: "Tokio",
        6: "Kamikaze",
        7: "Onigiri",
        8: "Hachiko",
        9: "Bento",
        10: "Cerezo en flor",
        11: "Ninjutsu",
        12: "Kimono",
        13: "Sushi",
        14: "Shibuya",
        15: "Origami"
    };
    /* Añadido peticion service para obtener json de palabras y tratar datos */
     function peticionPalabras(){
        $.post("http://52.56.42.239/Harakir/servicePalabras.php", function(data){
         data = JSON.parse(data);
        var azar = Math.floor((Math.random() * 15) + 1);
        $('#question').text(data[$azar].inicial);
        //console.log(data[azar].inicial);
	//console.log(data[azar].palabras);
	//console.log(data[azar].pista);	
         });
         return false;
    }

/* Añadido Boton empezar, muestra teclado, corazones y llama a la funcion peticion de datos del jugador*/
   
    $('.empezar').click(function(){
        $('.empezar').hide();
        $('#pregunta').show();
        $('#letras').show();
        $('#corasone').show();
        $('#total').text("6");
        //peticionPalabras();

    });

    //Audio
        $('#play').click(function(){
        var song = document.getElementById("audio");
            if (song.paused) {
                song.play();
                document.getElementById("play").src="http://52.56.42.239/Harakir/img/silencio.png";
            }
            else {
                song.pause();
                document.getElementById("play").src="http://52.56.42.239/Harakir/img/play.png";
            }
        });


    //Convertimos todo a mayusculas
    for (var i = 0; i < 16; i++) {
        secretas[i] = secretas[i].toUpperCase();
    };

    //Generamos un numero al azar para elegir una frase
    var azar = Math.floor((Math.random() * 15) + 1);
     //Preguntas 
        switch (azar){
            case 0:
                $('#question').text("Monstruo del cine japones");
                break;
            case 1:
                $('#question').text("Arte marcial con espada");
                break;
            case 2:
                $('#question').text("Mujer de compañia japonesa");
                break;
            case 3:
                $('#question').text("Paisaje famoso");
                break;
            case 4:
                $('#question').text("Soldado japones de la epoca feudal");
                break;
             case 5:
                $('#question').text("Capital de Japon");
                break;
             case 6:
                $('#question').text("Conocido avion suicida japones");
                break;
             case 7:
                $('#question').text("Bola de arroz japonesa");
                break;
             case 8:
                $('#question').text("Perro que tiene una estatua en la estacion de Shibuya");
                break;
             case 9:
                $('#question').text("Almuerzo preparado a mano");
                break;
             case 10:
                $('#question').text("Lo mas famoso para ver en primavera");
                break;
             case 11:
                $('#question').text("Arte marcial del espionaje y guerrilla");
                break;
             case 12:
                $('#question').text("Prenda de vestir tipica japonesa");
                break;
             case 13:
                $('#question').text("Comida tipica japonesa que consiste en pescado crudo");
                break;
             case 14:
                $('#question').text("Barrio mas famosos de Tokyo");
                break;
             case 15:
                $('#question').text("Tecnica de papiroflexia");
                break;

        }
        switch (azar){
            case 0:
                $("#respista").text("Lucha contra King Kong");
                break;
            case 1:
                $("#respista").text("Esgrima japones");
                break;
            case 2:
                $('#respista').text("Baila, canta, recita poemas, sirve el te...");
                break;
            case 3:
                $('#respista').text("Es una montaña que aún tiene nieve");
                break;
            case 4:
                $('#respista').text("Porta una katana y armadura");
                break;
             case 5:
                $('#respista').text("No es Kyoto");
                break;
             case 6:
                $('#respista').text("Esta palabra la gritaban los pilotos");
                break;
             case 7:
                $('#respista').text("Se suele hacer con pescado o carne y algas");
                break;
             case 8:
                $('#respista').text("Tiene una pelicula dramatica muy famosa");
                break;
             case 9:
                $('#respista').text("Se suelen hacer con formas y dibujos");
                break;
             case 10:
                $('#respista').text("Sus hojas son rosas");
                break;
             case 11:
                $('#respista').text("Los ninjas lo practican");
                break;
             case 12:
                $('#respista').text("Aunque sea un atuendo formal femenino, también lo usan los hombres");
                break;
             case 13:
                $('#respista').text("Seguro que lo pides al ir a un restaurante japones");
                break;
             case 14:
                $('#respista').text("Contiene una de las estaciones más famosas de japon");
                break;
             case 15:
                $('#respista').text("Figuritas de papel");
                break;

        }
    for (var i = 0; i < secretas[azar].length; i++) {
        if (secretas[azar].charAt(i) != ' ') respuesta[i] = '_ ';
        else respuesta[i] = '\n'
         $('#secreto').append(respuesta[i]);
};



    //Cada vez que cliquen una letra entra qui
    $('button').click(function(event) {
        //Sacamos la tecla que se pulso
        var ban = false;
        $('#secreto').empty();
        //Comparamos si la letra que se eligio esta en la frase y se va agregado
        for (var i = 0; i < secretas[azar].length; i++) {
            if (secretas[azar].charAt(i) == $(this).val()) {
                respuesta[i] = $(this).val();
                ban = true;
            }
            $('#secreto').append(respuesta[i]);
        };

        //Si la letra no esta en la frase...aumentamos los errores y cambiamos la imagen
        $("#pist").click(function(){
        puntuacion--;
        $("#divpista").fadeIn("slow");
        $("#total").text(puntuacion);
        $('#pist').hide();
    });
        //Si llegas a 5 errores el juego termina
        if (!ban) {
            errores++;
            puntuacion--;
            if(puntuacion <=5){
                $("#total").text(puntuacion);
            }
            else {
            $("#total").text(puntuacion); //(Ojo!! Innecesario!!)
        };
            $('#imagen').attr("src", "http://52.56.42.239/Harakir/img/Samurai" + errores + ".gif");
            $("#c" + errores).attr('src', 'http://52.56.42.239/Harakir/img/Corazonvacio' + errores + '.gif');
            if (errores >= 6) {
                $("#c6").attr('src', 'http://52.56.42.239/Harakir/img/Corazonvacio6.gif');
                $(".fin").text("Has perdido, la palabra era: " + secretas[azar]);
                $("#ganar").fadeIn();
                $final = parseInt(puntuacion) + parseInt($punt);
                $('#puntos').text($final);
                $('.punt').attr('value',$final);
                $('#total').text(0);
                
                //$('.cla').attr('placeholder','lalala');
                //alert('Buuuu Perdiste la frase era: ' + secretas[azar]);
    
                //location.href = "index.html";
            }

        }
        //Si la letra esta en la frase entonces comprobamos si acertaste la palabra
        else {
            var ban2 = true;
            for (var i = 0; i <= respuesta.length; i++) {
                if (respuesta[i] == '_ ') {
                    ban2 = false;
                    break;
                }
            };

            if (ban2) {
                $final = puntuacion + parseInt($punt);
                $('#puntos').text($final);
                $('.punt').attr('value',$final);
		$('.puntoPost').text($final);
                $('#total').text(0);

               $(".fin").text("Has ganado");
               $("#ganar").fadeIn();

                //alert('WoW Ganaste :)');

                //alert("Tu puntuacion total es " + puntuacion);
                //location.href = "index.html";

            }
        }
        //Desactivamos la letra que ya se pulso

        $(this).css('background-color', 'darkred');
        $(this).attr('disabled', 'disabled');
        //var texto2 = document.createTextNode("Tu puntuación total es ");

        $('#rendirse').click(function(){
            window.refresh();
        })
    });
});
