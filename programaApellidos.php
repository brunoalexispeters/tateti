<?php
include_once("tateti.php");

/*
La librería tateti posee la definición de constantes y funciones necesarias
para jugar al tateti.
Puede ser utilizada por cualquier programador para incluir en sus programas.
*/

/**************************************/
/***** DATOS DE LOS INTEGRANTES *******/
/**************************************/

// Luis Lopez**  Legajo FAI 3027 - mail: lucho38812@gmail.com - usuario github: lucholopez02
//Bruno Peters** Legajo FAI 3600 - mail: brunoalexis95@gmail.com - usuario github: brunoalexispeters
// German Ariel Metzger** Legajo FAI - 3521 - mail: metzgergerman@gmail.com usuario github: GermanMetzger


/**************************************/
/***** DEFINICION DE FUNCIONES ********/
/**************************************/

/**
 * 1
 * ejemplos de juego
 * @return array $coleccionjuegos
 */

function cargarJuegos (){
    $coleccionJuegos[0] = ["jugadorCruz" => "juan", "jugadorCirculo" => "pepe", "puntosCruz" => 5, "puntosCirculo" => 0];
    $coleccionJuegos[1] = ["jugadorCruz"=> "juan" , "jugadorCirculo" => "lucho", "puntosCruz"=> 1, "puntosCirculo" => 1];
    $coleccionJuegos[2] = ["jugadorCruz"=> "lucho" , "jugadorCirculo" => "bruno", "puntosCruz"=> 1, "puntosCirculo" => 1];
    $coleccionJuegos[3] = ["jugadorCruz"=> "lucho" , "jugadorCirculo" => "juan", "puntosCruz"=> 5, "puntosCirculo" => 0];
    $coleccionJuegos[4] = ["jugadorCruz"=> "bruno" , "jugadorCirculo" => "bruno", "puntosCruz"=> 1, "puntosCirculo" => 1];
    $coleccionJuegos[5] = ["jugadorCruz"=> "juan" , "jugadorCirculo" => "pedro", "puntosCruz"=> 1, "puntosCirculo" => 1];
    $coleccionJuegos[6] = ["jugadorCruz"=> "pedro" , "jugadorCirculo" => "juan", "puntosCruz"=> 5, "puntosCirculo" => 0];
    $coleccionJuegos[7] = ["jugadorCruz"=> "lucho" , "jugadorCirculo" => "juan", "puntosCruz"=> 1, "puntosCirculo" => 1];
    $coleccionJuegos[8] = ["jugadorCruz"=> "lucho" , "jugadorCirculo" => "juan", "puntosCruz"=> 1, "puntosCirculo" => 1];
    $coleccionJuegos[9] = ["jugadorCruz"=> "pedro" , "jugadorCirculo" => "bruno", "puntosCruz"=> 5, "puntosCirculo" => 0];
    $coleccionJuegos[10] = ["jugadorCruz"=> "miguel" , "jugadorCirculo" => "lucho", "puntosCruz"=> 1, "puntosCirculo" => 1];
    $coleccionJuegos[11] = ["jugadorCruz"=> "juan" , "jugadorCirculo" => "miguel", "puntosCruz"=> 1, "puntosCirculo" => 1];
        return ($coleccionJuegos);
}

 /**
 * FUNCION N° 2
 * Muestra el menu y retorna la opcion seleccionada
 * @return int
 */
function seleccionarOpcion()
{
    // array $menu,
    // int $opcion
    // inicio una array $menu donde están todas las opciones
    $seleccionarMenu = [
        "1) Jugar Tateti",
        "2) Mostrar un juego",
        "3) Mostrar el primer juego ganado",
        "4) Mostrar porcentaje de Juegos ganados",
        "5) Mostrar resumen de Jugador",
        "6) Mostrar listado de juegos Ordenado por jugador O",
        "7) Salir"
    ];
    echo "Selecciona una opción del Menú: \n";
    foreach ($seleccionarMenu as $key ) {
        echo $key . "\n";
    }
    
    // solicito que ingrese una opcion entre 1 y 7 usando la funcion del archivo tateti.php
    $opcion = solicitarNumeroEntre(1,7);
    return $opcion;
}
 
 /**
 * FUNCION N°3
 * Implementar una función que solicite al usuario un número entre un rango de valores.Si el número ingresado por el usuario no es válido, la función se encarga de volver a pedirlo.La función retorna un número válido.
 * @param int $min
 * @param int $max
 * @return int
 */
function numeroEntre($min,$max)
{
   //se invoca a la funcion  solicitarNumeroEntre  de tateti que cumple con esta tarea
   return solicitarNumeroEntre($min,$max);

}

 /**
 * FUNCION N°4
 * Mostrar datos de un juego dado con formato 
 * @param array $juegosTotal
 * @param int $numeroJuego
 */
function datosDelJuego($juegosTotal, $numeroJuego)
{

    $nombreX = strtoupper($juegosTotal[$numeroJuego]["jugadorCruz"]);
    $nombreO = strtoupper($juegosTotal[$numeroJuego]["jugadorCirculo"]);
    $puntosX = $juegosTotal[$numeroJuego]["puntosCruz"];
    $puntosO = $juegosTotal[$numeroJuego]["puntosCirculo"];

    // si son iguales es empate, sino asigno ganador a $resultado
    if ($puntosX == $puntosO) {
        $resultado = "(empate)";
    }elseif ($puntosX > $puntosO) {
        $resultado = "(ganó X)";
    }else {
        $resultado = "(ganó O)";
    }
    // imprimo el resultado del juego
    echo "****************************\n";
    echo "Juego TATETI: " . $numeroJuego . " " . $resultado . "\n";
    echo "Jugador X: " . $nombreX . " obtuvo " . $puntosX . "\n";
    echo "Jugador O: " . $nombreO . " obtuvo " . $puntosO . "\n";
    echo "****************************\n"; 
}

/**
 * 5
 * retorna la coleccion modificada de juegos
 * @param array $coleccionJuejos
 * @param array $juego
 * @return array
 */
function agregarJuego ($coleccionJuegos,$juego){
    //int $contador
    $contador=count($coleccionJuegos);
    $coleccionJuegos[$contador]=$juego;
    return $coleccionJuegos;
}

/**
 * 6
 * retorna el primer juego ganado 
 * @param array $juegoGanado
 * @param string $clavejugador
 * @return int
 */
function primerJuegoGanado ($juegoGanado,$claveJugador){
    $recorridoParcial=count($juegoGanado);
    $i=0;
    $ganador=false;
    $indice=-1;
    while ($i < $recorridoParcial && !$ganador) {
       if ($juegoGanado[$i]["jugadorCruz"]==$claveJugador) {
           if ($juegoGanado[$i]["jugadorCruz"]>$juegoGanado[$i]["jugadorCirculo"]) {
               $ganador=true;
               $indice=$i;
           }
       }elseif ($juegoGanado[$i]["jugadorCirculo"]==$claveJugador) {
           if ($juegoGanado[$i]["jugadorCruz"]<$juegoGanado[$i]["jugadorCirculo"]) {
               $ganador=true; 
               $indice=$i;
           }
       }
    $i++;   
    }
    return $indice;
}

/**
 * 7
 * retorna el resumen del jugador
 * @param array $juegosJugados
 * @param string $claveNombre
 * @return array
 */
function resumenJugador ($juegosJugados,$claveNombre){
    $nombre="";
    $juegoGanado=0;
    $juegoPerdidos=0;
    $juegosEmpatados=0;
    $puntosAcumulados=0;

    $juegosJugados=["nombre"=>" ", "juegosGanados"=>0 , "juegosPerdidos"=> 0, "juegosEmpatados"=>0 , "puntosAcumulados"=>0];


    $exaustivo=count($juegosJugados);

    for ($i=0; $i <$exaustivo ; $i++) { 
        $jugadorCruz = $juegosJugados[$i]["jugadorCruz"];
        $jugadorCirculo = $juegosJugados[$i]["jugadorCirculo"];
        $puntosCruz = $juegosJugados[$i]["puntosCruz"];
        $puntosCirculo = $juegosJugados[$i]["puntosCirculo"];

        if ($juegosJugados[$i]["jugadorCruz"] == $claveNombre) {
           $nombre=$claveNombre;
           if ($juegosJugados[$i]["puntosCruz"] > $juegosJugados[$i]["puntosCirculo"]) {
               $juegoGanado=$juegoGanado+1;
               $puntosAcumulados=$puntosAcumulados+$puntosCruz;
           }
           if ($juegosJugados[$i]["puntosCruz"] < $juegosJugados[$i]["puntosCirculo"]) {
               $juegoPerdidos=$juegoPerdidos+1; 
           }
           if ($juegosJugados[$i]["puntosCruz"] == $juegosJugados[$i]["puntosCirculo"]){
                $juegosEmpatados=$juegosEmpatados+1;
                $puntosAcumulados=$puntosAcumulados+$puntosCruz;
           }


        }
    }
}

/**
 * Muestra el resumen de un jugador,y lo muestra por pantalla
 * @param array $resumen
 * 
 */
function mostrarResumenPantalla($resumen){

    echo "Jugador: ".$resumen["nombre"]."\n";
    echo "Ganó: ".$resumen["juegosGanados"]." juegos \n";
    echo "Perdió: ".$resumen["juegosPerdidos"]." juegos \n";
    echo "Empató: ".$resumen["juegosEmpatados"]." juegos \n";
    echo "Total de puntos acumulados: ".$resumen["puntosAcumulados"]." puntos \n";

}

/**
 * FUNCION N°8
 * Funcion que pide y verifica que se ingrese un simbolo X o O
 * @return string
 */
function obtenerSimbolo(){
    //string $simbolo, boolean $validarSimbolo ;

    // Inicialización de variables
    $validarSimbolo = false;

     do{  
        echo"Ingrese un simbolo 'X' o 'O': ";
        $simbolo = strtoupper(trim(fgets(STDIN))); //strtoupper convierte a todos los carácteres en mayúsculas
        if($simbolo  == "X" || $simbolo == "O"){
            $validarSimbolo  = true;
        }else{
            echo"Simbolo inválido.\n";
        }
    // Se repetirá hasta que el usuario ingrese X o O
    }while ($validarSimbolo == false);
    
    return $simbolo;   
}

/**
 * FUNCION N°9
 * Funcion que dada una colección de juegos retorna la cantidad de juegos ganados (sin empates)
 * @param array $colecJuegos
 * @return integer
 */
function totalGanadas($coleccionJuegos){
    // int $contGanados, $nJuegos, $i

    // Inicialización de variables y obtención de la cantidad de elementos mediante count
    $nJuegos= count($coleccionJuegos);
    $contGanados = 0;

    // Recorrido exhaustivo. Revisará todas las partidas y sumará uno por cada victoria
    for ($i = 0; $i<$nJuegos; $i++){
        if ($coleccionJuegos[$i]["puntosCruz"] > $coleccionJuegos[$i]["puntosCirculo"]){
            $contGanados++;
        } elseif($coleccionJuegos[$i]["puntosCruz"] < $coleccionJuegos[$i]["puntosCirculo"]){
            $contGanados++;
        }
    }

    return $contGanados;
}
 /**
 * Punto 10
 * Verifica cuantos juegos ganó según X o O
 * @param array $coleccionJuegos
 * @param string $simbolo
 * @return int
 */
function cantGanados($coleccionJuegos, $simbolo)
{
    // int $juegosGanados, $puntos, $puntosOpuesto
    // string $simbolo, $simboloOpuesto
    $juegosGanadosO = 0; // contador
    $juegosGanadosX = 0;  // contador

    if (strtoupper($simbolo) === "X") {
        $simbolo = "Cruz";
        $simboloOpuesto = "Circulo";
    }else {
        $simbolo = "Circulo";
        $simboloOpuesto = "Cruz";
    }

    for ($i=0; $i < count($coleccionJuegos); $i++) { 
        if (!($coleccionJuegos[$i]["puntos".$simbolo]) === ($coleccionJuegos[$i]["puntos".$simboloOpuesto])) {
            $puntos = $coleccionJuegos[$i]["puntos".$simbolo];
            $puntosOpuesto = $coleccionJuegos[$i]["puntos".$simboloOpuesto];

            if ($puntos > $puntosOpuesto) {
                $juegosGanados++;
            }
        }
    }
    return $juegosGanados;
}

/**
 * FUNCION N°10 - funcion de comparación
 * Compara de a 2 claves para determinar cual es mayor 
 * @param string $a
 * @param string $b
 * @return int
 */ 
function comparar($a, $b) {
    if ($a["jugadorCirculo"] == $b["jugadorCirculo"]) {
        $orden = 0;
    }
    elseif (($a["jugadorCirculo"] < $b["jugadorCirculo"])) {
        $orden =-1;
    } else {
        $orden =1;
    }
    return $orden;
}

/**
 * FUNCION N°11
 * Muestra la cantidad de juegos ordenados por nombre jugador O 
 * @param array $coleccionJuegos)
 * @return array
 */ 
function ordenarColeccion($coleccionJuegos)
{

    // usando una función de comparación definida por el usuario.
    uasort($coleccionJuegos, 'comparar');
    //  muestra información sobre una variable en una forma que es legible por humanos
    print_r($coleccionJuegos);
}
 
/**************************************/
/*********** PROGRAMA PRINCIPAL *******/
/**************************************/

/** Declaración de variables: */
//DECLARAR VARIABLES
/** Inicialización de variables: */
$juegosTotal = [];
$juego = [];
$salir = true;

/** Proceso: */


//print_r($juego);
//imprimirResultado($juego);


/**Switch para la botonera o menu selector */
//Inicialización de variables:
$juegosTotal = cargarJuegos();
$separador = "\n\n\n\n+++++++++++++++++++++++++++++++++\n";

do {

    echo $separador;
    $elegir = seleccionarOpcion();
    
    
    switch ($elegir) {
        case 1: 
            // 1) Jugar:
            $juego = jugar();
            $juegosTotal = agregarJuego($juegosTotal, $juego);
            $indice = count($juegosTotal) - 1;
            datosDelJuego($juegosTotal, $indice);
            // print_r($indice);
            break;
        case 2: 
            // 2) Mostrar un juego:
            echo "Ingresar el número de juego entre 0 y ".(count($juegosTotal)-1)."\n";
            $numero = solicitarNumeroEntre(0, count($juegosTotal));
            datosDelJuego($juegosTotal, $numero);
            break;
        case 3: 
            // 3) Mostrar el primer juego ganado:
            echo "Ingrese el nombre del jugador: \n";
            $nombreJugador = strtoupper(trim(fgets(STDIN)));
            $indicePrimerJuego = primerJuegoGanado($juegosTotal, $nombreJugador);
            if ($indicePrimerJuego != -1) {
                mostrarJuego($juegosTotal, $indicePrimerJuego);
            }else{
                echo "El jugador " . $nombreJugador . " no ganó ningún juego\n";
            }
            break;
        case 4:
            // 4) Mostrar porcentaje de Juegos ganados según el simbolo seleccionado:
            $simbolo = obtenerSimbolo();
            $juegosGanados = totalGanadas($juegosTotal);

            $cantGanados = cantGanados($juegosTotal, $simbolo);
            $porcentajeGanados = $cantGanados*100/$juegosGanados;
            echo "El porcentaje de juegos ganados por " . $simbolo . " es del " . round($porcentajeGanados, 2) . "%.\n";
            break;
            break;
        case 5:
            // 5) Mostrar resumen de Jugador:
            echo "Ingrese el nombre del Jugador: ";
            $nombreJugador = strtoupper(trim(fgets(STDIN)));
            $resumen = resumenJugador($juegosTotal, $nombreJugador);

            if ($resumen["juegosPerdidos"] === 0 && $resumen["puntosAcumulados"] === 0) {
                echo "No hay registro del jugador. ". $nombreJugador ."\n";
            }else {
                
                echo "*************************************\n"; // separador
                echo "Jugador: " . $resumen["nombre"] . "\n";
                echo "Ganó: " . $resumen["juegosGanados"] . " juegos\n";
                echo "Perdió: " . $resumen["juegosPerdidos"] . " juegos\n";
                echo "Empató " . $resumen["juegosEmpatados"] . " juegos\n";
                echo "Total de puntos acumulados: " . $resumen["puntosAcumulados"] . " puntos\n";
                echo "*************************************\n"; // separador
            }
            break;
        case 6:
                // 6) Mostrar listado de juegos Ordenado por jugador O:
                ordenarColeccion($juegosTotal);
            break;
        case 7:
            // 7) Finalizar programa:
            echo "Programa finalizado.... besito :)";
            break;
    }
} while ($elegir != 7);
