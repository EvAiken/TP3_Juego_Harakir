<?php
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <title>Juego del Ahorcado</title>
    <link rel="stylesheet" href="<?php echo base_url("css/main.css");?>">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="<?php echo base_url('js/app.js');?>"></script>
</head>

<body>
    <div id="samurai">
        <img src="<?php echo base_url('img/Samurai0.gif');?>" id="imagen">
    </div>
    <br>
    <div class="info"></div>
    <div id="palabra">
        <div id="pregunta"><h1 id="question"></h1></div>
        <pre><h3 id="secreto"></h3></pre>
    </div>

    <div id="corasone">
        <table id="tabla">
            <tr>
                <td>
                    <img src="<?php echo base_url('img/Corazonlleno6.gif');?>" id="c6"></td>
                <td>
                    <img src="<?php echo base_url('img/Corazonlleno5.gif');?>" id="c5"></td>
            </tr>
            <tr>
                <td>
                    <img src="<?php echo base_url('img/Corazonlleno4.gif');?>" id="c4"></td>
                <td>
                    <img src="<?php echo base_url('img/Corazonlleno3.gif');?>" id="c3"></td>
            </tr>
            <tr>
                <td>
                    <img src="<?php echo base_url('img/Corazonlleno2.gif');?>" id="c2"></td>
                <td>
                    <img src="<?php echo base_url('img/Corazonlleno1.gif');?>" id="c1"></td>
            </tr>
        </table>
    </div>
    <a href="#"><img class="empezar" src="<?php echo base_url('img/empezar.gif');?>"/></a>
        <div id="letras">
            <table>
                <tr>
                    <td>
                        <button type="button" value="A">A</button>
                    </td>
                    <td>
                        <button type="button" value="B">B</button>
                    </td>
                    <td>
                        <button type="button" value="C">C</button>
                    </td>
                    <td>
                        <button type="button" value="D">D</button>
                    </td>
                    <td>
                        <button type="button" value="E">E</button>
                    </td>
                    <td>
                        <button type="button" value="F">F</button>
                    </td>
                    <td>
                        <button type="button" value="G">G</button>
                    </td>
                    <td>
                        <button type="button" value="H">H</button>
                    </td>
                    <td>
                        <button type="button" value="I">I</button>
                    </td>
                </tr>
                <tr>
                    <td>
                        <button type="button" value="J">J</button>
                    </td>
                    <td>
                        <button type="button" value="K">K</button>
                    </td>
                    <td>
                        <button type="button" value="L">L</button>
                    </td>
                    <td>
                        <button type="button" value="M">M</button>
                    </td>
                    <td>
                        <button type="button" value="N">N</button>
                    </td>
                    <td>
                        <button type="button" value="Ñ">Ñ</button>
                    </td>
                    <td>
                        <button type="button" value="O">O</button>
                    </td>
                    <td>
                        <button type="button" value="P">P</button>
                    </td>
                    <td>
                        <button type="button" value="Q">Q</button>
                    </td>
                </tr>
                <tr>
                    <td>
                        <button type="button" value="R">R</button>
                    </td>
                    <td>
                        <button type="button" value="S">S</button>
                    </td>
                    <td>
                        <button type="button" value="T">T</button>
                    </td>
                    <td>
                        <button type="button" value="U">U</button>
                    </td>
                    <td>
                        <button type="button" value="V">V</button>
                    </td>
                    <td>
                        <button type="button" value="W">W</button>
                    </td>
                    <td>
                        <button type="button" value="X">X</button>
                    </td>
                    <td>
                        <button type="button" value="Y">Y</button>
                    </td>
                    <td>
                        <button type="button" value="Z">Z</button>
                    </td>
                </tr>
            </table>
        </div>
    <div id="label"><b>Player:</b><b id="jugador"><?php echo $nombre; ?></b></div>
    <div id="label"><b>Score: </b><b id="puntos"><?php echo $puntos; ?></b></div>
    <div id="label"><b>Points: </b><b id="total">0</b></div>
     <div style="display: none" id="label"><b></b><b id="clave"><?php echo $clave; ?></b></div>
    <div id="musica"><img src="<?php echo base_url('img/silencio.png');?>" id="play"></div>
    <div><audio src="<?php echo base_url('media/cancion.mp3');?>" id="audio" autoplay="true"></audio></div>
    <div id="rendirse"><img src="<?php echo base_url('img/rendirse.png');?>"></div>
    <div id="pista"><img id="pist" src="<?php echo base_url('img/pista.gif');?>"></div>
    <div id="divpista"><h2 id="respista"></h2></div>

    <!--VENTANAS DE GANAR Y PERDER -->
    <div id="ganar">
    <center>
         <h2 class="fin">Has ganado!!!</h2>
         <br>
        <form class="final" method="POST" action="<?php echo base_url();?>">
            <br>
            <label>Player:  <?php echo $nombre;?></label>
            <input type="text" style="display: none" name="nombre" size="15" value="<?php echo $nombre; ?>"/>
            <br>
            <label>Score:  </label><label class="puntoPost"></label>
            <input class="punt" style="display: none" type="text" name="puntos" size="15" value="<?php echo $puntos; ?>" />
            <br>
            <input class="clave" style="display: none" type="text" name="clave" size="15" value="<?php echo $clave; ?>" />
            <br><br>
            <input id="label" type="submit" name="salir" value="salir"/>
            <input id="label" type="submit" name="jugar" value="jugar"/>
            <br><br><br>
        </form>
    </center>
    </div>
   <!--<div id="perder">
        <button type="button">Reintentar</button>
    </div>-->

</body>

</html>
