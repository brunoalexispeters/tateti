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
// German Ari<el Metzger** Legajo FAI - 3521 - mail: metzgergerman@gmail.com usuario github: GermanMetzger
 
 
/**************************************/
/***** DEFINICION DE FUNCIONES ********/
/**************************************/
 
/**
 * 1
 * ejemplos de juego
 * @return array $coleccionjuegos
 */
 
function cargarJuegos (){
    $coleccionJuegos[0] = ["jugadorCruz" => "JUAN", "jugadorCirculo" => "pepe", "puntosCruz" => 5, "puntosCirculo" => 0];
    $coleccionJuegos[1] = ["jugadorCruz"=> "JUAN" , "jugadorCirculo" => "LUCHO", "puntosCruz"=> 1, "puntosCirculo" => 1];
    $coleccionJuegos[2] = ["jugadorCruz"=> "LUCHO" , "jugadorCirculo" => "BRUNO", "puntosCruz"=> 1, "puntosCirculo" => 1];
    $coleccionJuegos[3] = ["jugadorCruz"=> "LUCHO" , "jugadorCirculo" => "JUAN", "puntosCruz"=> 5, "puntosCirculo" => 0];
    $coleccionJuegos[4] = ["jugadorCruz"=> "BRUNO" , "jugadorCirculo" => "JUAN", "puntosCruz"=> 1, "puntosCirculo" => 1];
    $coleccionJuegos[5] = ["jugadorCruz"=> "JUAN" , "jugadorCirculo" => "PEDRO", "puntosCruz"=> 1, "puntosCirculo" => 1];
    $coleccionJuegos[6] = ["jugadorCruz"=> "PEDRO" , "jugadorCirculo" => "JUAN", "puntosCruz"=> 5, "puntosCirculo" => 0];
    $coleccionJuegos[7] = ["jugadorCruz"=> "LUCHO" , "jugadorCirculo" => "JUAN", "puntosCruz"=> 1, "puntosCirculo" => 1];
    $coleccionJuegos[8] = ["jugadorCruz"=> "LUCHO" , "jugadorCirculo" => "JUAN", "puntosCruz"=> 1, "puntosCirculo" => 1];
    $coleccionJuegos[9] = ["jugadorCruz"=> "PEDRO" , "jugadorCirculo" => "BRUNO", "puntosCruz"=> 5, "puntosCirculo" => 0];
    $coleccionJuegos[10] = ["jugadorCruz"=> "MIGUEL" , "jugadorCirculo" => "LUCHO", "puntosCruz"=> 1, "puntosCirculo" => 1];
    $coleccionJuegos[11] = ["jugadorCruz"=> "JUAN" , "jugadorCirculo" => "MIGUEL", "puntosCruz"=> 1, "puntosCirculo" => 1];
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
 * @param int $num
 */
function datosDelJuego($juegosTotal,$num){
    $nombreX = strtoupper($juegosTotal[$num]["jugadorCruz"]);
    $nombreO = strtoupper($juegosTotal[$num]["jugadorCirculo"]);
    $puntosX = $juegosTotal[$num]["puntosCruz"];
    $puntosO = $juegosTotal[$num]["puntosCirculo"];
 
    // empate
    if ($puntosX == $puntosO) {
        $resultado = "(empate)";
    //gana x
    }elseif ($puntosX > $puntosO) {
        $resultado = "(ganó X)";
    //gana o
    }else {
        $resultado = "(ganó O)";
    }
    // imprimo el resultado del juego
    echo "****************************\n";
    echo "Juego TATETI: " . $num . " " . $resultado . "\n";
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
function agregarJuego ($juegosTotal,$juego){
    //int $contador
    $contador=count($juegosTotal);
    $juegosTotal[$contador]=$juego;
    return $juegosTotal;
}
 

/** primera FUNCION PRIMER GANADOR N°2 
 * Este modulo pide el nombre de un jugador y recorre el arreglo parcialmente para verificar si existe en la coleccion. Retorna el nombre si existe
*@param array $juegosTotal
*@return string
*/
function verificaJugadorExiste($juegosTotal){
    //int $i
    //String $nombre
    //boolean $repetir
    
    //inicializacion
    $i = 0;
    $repetir = false;

    echo"Ingrese el nombre de un Jugador: ";
    //convierto el nobmre a mayusculas
    $nombre= strtoupper(trim(fgets(STDIN)));
    
    do{
    while(($juegosTotal[$i]["jugadorCruz"]!= $nombre && $juegosTotal[$i]["jugadorCirculo"] !=$nombre ) && $i < count($juegosTotal) ){
        $i++;
    }
    if($juegosTotal[$i]["jugadorCruz"]== $nombre){
        $nombre = $juegosTotal[$i]["jugadorCruz"];
    } else{
        $nombre = $juegosTotal[$i]["jugadorCirculo"];
    } 
    
    if($i >= count($juegosTotal)){
        echo"Este jugador No se encuentra en la colección de juegos, Por favor ingrese otro: "; 
        $nombre= strtoupper(trim(fgets(STDIN)));
        $i=0;
        $repetir = true;
    }
    }while($repetir);

    return $nombre;
    }

/** segunda FUNCION PRIMER GANADOR N°2 
 * Funcion que retorna el indice del primer juego ganado por un jugador dado
 * @param array $juegosTotal
 * @param string $nombreJugador
 * @return int
 */
function indicePrimerGanador($juegosTotal, $nombreJugador){
    //int $indice $noGano, $i  boolean $flag
   $i=0;
   $flag = true;
   do{
    if($juegosTotal[$i]["jugadorCruz"] == $nombreJugador){
          if($juegosTotal[$i]["puntosCruz"]>$juegosTotal[$i]["puntosCirculo"]){
              $indice = $i;
              $flag = false;
          }
       }elseif($juegosTotal[$i]["jugadorCirculo"] == $nombreJugador){
           if($juegosTotal[$i]["puntosCruz"]<$juegosTotal[$i]["puntosCirculo"]){
              $indice = $i;
              $flag = false;
          }
       }
       if($i >= count($juegosTotal)-1 ){
          $flag = false;
          $indice = -1; //en caso de que no haya ganado ninguna
       }
       $i++;
      }while($flag);
      
      return $indice;
   }    

 
/**
 * FUNCION 7
 * Retorna el resumen del jugador
 * @param array $juegosTotal
 * @param string $nombreJugador
 * @return array
 */
function detalleJugador($juegosTotal, $nombreJugador){
    // int $i, $cantidadIndices, $ganados, $perdidos, $empatados, $puntos
    $i = 0;
    $cantidadIndices = count($juegosTotal);
    $resumenJugador = [
        "nombre" => $nombreJugador,
        "juegosGanados" => 0,
        "juegosPerdidos" => 0,
        "juegosEmpatados" => 0,
        "puntosAcumulados" => 0
    ];
 
    for ($i=0; $i < $cantidadIndices; $i++) {
        // string $jugadorCruz, $jugadorCirculo
        // int $puntosCruz, $puntosCirculo
        $jugadorCruz = $juegosTotal[$i]["jugadorCruz"];
        $jugadorCirculo = $juegosTotal[$i]["jugadorCirculo"];
        $puntosCruz = $juegosTotal[$i]["puntosCruz"];
        $puntosCirculo = $juegosTotal[$i]["puntosCirculo"];
       
        // verifico si el jugador jugó esta partida
        if ($jugadorCruz === $nombreJugador || $jugadorCirculo === $nombreJugador) {
           
            // verifico si hay empate
            if ($puntosCruz === $puntosCirculo) {
 
                // sumo empatados y acumulo puntos
                $resumenJugador["juegosEmpatados"]++;
                $resumenJugador["puntosAcumulados"] = $resumenJugador["puntosAcumulados"] + $puntosCruz;
               
            // verifico si es jugadorCruz
            }elseif ($jugadorCruz === $nombreJugador) {
               
                // verifico si jugadorCruz ganó
                if ($puntosCruz > $puntosCirculo) {
                   
                    // sumo 1 a ganados y acumulo puntos
                    $resumenJugador["juegosGanados"]++;
                    $resumenJugador["puntosAcumulados"] = $resumenJugador["puntosAcumulados"] + $puntosCruz;
                   
                // entonces perdió jugadorCruz
                }else{
 
                    // sumo 1 a perdidos
                    $resumenJugador["juegosPerdidos"]++;
 
                }
            // jugador es jugadorCirculo
            }else{
               
                // verifico si jugadorCirculo ganó
                if($puntosCirculo > $puntosCruz){
                   
                    // sumo 1 a ganados y acumulo puntos
                    $resumenJugador["juegosGanados"]++;
                    $resumenJugador["puntosAcumulados"] = $resumenJugador["puntosAcumulados"] + $puntosCirculo;
 
                // entonces perdió jugadorCirculo
                }else {
 
                    // sumo 1 a perdidos
                    $resumenJugador["juegosPerdidos"]++;
 
                }
            }
               
        }
    }
    return $resumenJugador;

}
/**
 * PORCENTAJE GANADO
 * Este modulo solicita al usuario como dato un simbolo y muestra por pantalla_
 * El porcentaje de los juegos ganados de dicho simbolo.
 * @param array $coleccionJuegos
 */
function mostrarPorcentajeGanados($juegosTotal){
    //int $totalJuegosGanados, $acumJuegosGanadosO, $acumJuegosGanadosX
    //float $porcentaje
    //String $simbolo 

    $simbolo = obtenerSimbolo();

    if($simbolo == "X"){
        $porcentaje = cantGanados($juegosTotal, $simbolo) * 100 / totalGanadas($juegosTotal);
       echo  "El porcentaje de los juegos ganados por ". $simbolo. " es: ". $porcentaje . "% \n";

    }else{
        $porcentaje = cantGanados($juegosTotal, $simbolo) * 100 / totalGanadas($juegosTotal);
        echo "El porcentaje de los juegos ganados por". $simbolo. " es: ". $porcentaje . "% \n";
    } 
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
 * @param array $juegosTotal
 * @return int
 */
function totalGanadas($juegosTotal){
    // int $contGanados, $nJuegos, $i
 
    // Inicialización de variables y obtención de la cantidad de elementos mediante count
    $nJuegos= count($juegosTotal);
    $contGanadosX = 0;
    $contGanadosO=0;
   
    // Recorrido exhaustivo. Revisará todas las partidas y sumará uno por cada victoria
    for ($i = 0; $i<$nJuegos; $i++){
        $puntosJugadorX=$juegosTotal[$i]["puntosCruz"];
        $puntosJugadorO= $juegosTotal[$i]["puntosCirculo"];
        if ($puntosJugadorX>$puntosJugadorO ){
            $contGanadosX= $contGanadosX+1;
        } elseif($puntosJugadorX<$puntosJugadorO ){
            $contGanadosO= $contGanadosO+1;
        }
    }
    $totalGanados=$contGanadosO+$contGanadosX;
    return $totalGanados;
}
 /**
 * Punto 10
 * Verifica cuantos juegos ganó según X o O
 * @param array $coleccionJuegos
 * @param string $simbolo
 * @return int
 */
function cantGanados($juegosTotal, $simbolo)
{
    // int $juegosGanados, $puntos, $puntosOpuesto
    // string $simbolo, $simboloOpuesto
    $juegosGanados = 0;
    for ($i=0; $i < count($juegosTotal); $i++) {
       
        if ($simbolo=="X") {
            do {
                $puntosJugadorX=$juegosTotal[$i]["puntosCruz"];
        $puntosJugadorO= $juegosTotal[$i]["puntosCirculo"];
                if ($puntosJugadorX>$puntosJugadorO){
                   $juegosGanados=$juegosGanados+1;
                }
            } while ($i<count($juegosTotal));
        }else {
            do {
                $puntosJugadorX=$juegosTotal[$i]["puntosCruz"];
        $puntosJugadorO= $juegosTotal[$i]["puntosCirculo"];
                if ($puntosJugadorX>$puntosJugadorO){
                   $juegosGanados=$juegosGanados+1;
                }
            } while ($i<count($juegosTotal));
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
 
/** Proceso: */
 
 
//print_r($juego);
//imprimirResultado($juego);
 
 
/**Switch para la botonera o menu selector */
//Inicialización de variables:
//le asigno toda la biblioteca de juego precargada
$juegosTotal = cargarJuegos();
$separador = "\n\n+++++++++++++++++++++++++++++++++\n";
 
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
             //Mostrar el primer Juego Ganador
            $nombre = verificaJugadorExiste($juegosTotal); //pide el nombre de un jugador y verifica que exista en la colección
            $indice = indicePrimerGanador($juegosTotal, $nombre); //almacena indice del primer juego ganado por el jugador dado
            if($indice != -1){
                datosDelJuego($juegosTotal, $indice);
            }else{
                echo"El jugador no ganó ningún juego.\n";
            }
            echo " \n ";         
            break;
        case 4:
            //Mostrar Porcentaje de juegos Ganados
            mostrarPorcentajeGanados($juegosTotal); 
            echo " \n ";
            break;
        case 5:
            // 5) Mostrar resumen de Jugador:
            echo "Ingrese el nombre del Jugador: ";
            $nombreJugador = strtoupper(trim(fgets(STDIN)));
            $resumen = detalleJugador($juegosTotal, $nombreJugador);
 
            if ($resumen["juegosPerdidos"] === 0 && $resumen["puntosAcumulados"] === 0) {
                echo "No hay registro del jugador. ". $nombreJugador ."\n";
            }else {
                echo "Jugador: " . $resumen["nombre"] . "\n";
                echo "Ganó: " . $resumen["juegosGanados"] . " juegos\n";
                echo "Perdió: " . $resumen["juegosPerdidos"] . " juegos\n";
                echo "Empató " . $resumen["juegosEmpatados"] . " juegos\n";
                echo "Total de puntos acumulados: " . $resumen["puntosAcumulados"] . " puntos\n";
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