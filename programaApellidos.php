<?php


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
 * 2
 * Metodo que intenta resolver el punto 2 EXPLICACION 3
 * visualiza el menu de opciones y retona una opcion valida
 * @return int
 */
 
function selectionarOpcion(){
    do {
        echo "INGRESE UNA OPCION" . "\n";
        echo "1) Jugar al tateti" . "\n";
        echo "2) Mostrar un juego" . "\n";
        echo "3) Mostrar el primer juego ganador" . "\n";
        echo "4) Mostrar porcentaje de Juegos ganados" . "\n";
        echo "5) Mostrar resumen de Jugador" . "\n";
        echo "6) Mostrar listado de juegos Ordenado por jugador O" . "\n";
        echo "7) Salir" . "\n";
        $opcion = trim(fgets(STDIN));
        if (!(is_int($opcion)) && !($opcion >= 1 && $opcion <= 7)) {
            echo "Opcion NO Valida." . "\n";
        }
    } while (!(is_int($opcion)) && !($opcion >= 1 && $opcion <= 7));
    return $opcion;
}
echo " ". SelectionarOpcion();


 
/**
 * 3
 * Solicita al usuario un número en el rango [$min,$max]
 * @param int $min
 * @param int $max
 * @return int 
 */
function solicitarNumeroEntre($min, $max){
    //int $numero
    $numero = trim(fgets(STDIN));
    while (!is_int($numero) && !($numero >= $min && $numero <= $max)) {
        echo "Debe ingresar un número entre " . $min . " y " . $max . ": ";
        $numero = trim(fgets(STDIN));
    }
    return $numero;
}

/**
 * 4
 * muestra en pantalla los datos del juego
 * @param int $numJuego
 * @return array
 */
function datosDelJuego($numJuego){
    //$imprimir 
    $imprimir= imprimirResultado($numJuego);
    return $imprimir;
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
 * Punto 11 - funcion de comparación
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
 * Punto 11
 * Muestra la cantidad de juegos ordenados por nombre jugador O 
 * @param array $coleccionJuegos)
 * @return array
 */ 
function ordenarColeccion($coleccionJuegos)
{
    //Esta función ordena un array tal que los índices de array mantienen sus correlaciones 
    // con los elementos del array con los que están asociados, 
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
$jugadosTotal = [];
$juego = [];
$salir = true;

/** Proceso: */
$jugadosTotal = cargarJuegos();
$separadorBotonera = "\n\n\n\n+++++++++++++++++++++++++++++++++\n";



//print_r($juego);
//imprimirResultado($juego);


/**Switch para la botonera o menu selector */
//Inicialización de variables:
$juegosTotal = cargarJuegos();
$separador = "\n\n\n\n+++++++++++++++++++++++++++++++++\n";

//Proceso:

//print_r($juego);
//imprimirResultado($juego);

do {

    echo $separadorBotonera;
    $opcion = selectionarOpcion();
    
    
    switch ($opcion) {
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

            // ACA VA LA FUNCION 10
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
            // FUNCION 11
            break;
        case 7:
            // 7) Finalizar programa:
            echo "Programa finalizado.... besito :)";
            break;
    }
} while ($opcion != 7);
