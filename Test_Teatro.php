<?php
//*******************************
//hector gomez - legajo: 81039
//*******************************
include_once "teatro.php";

/**
* genera un arreglo de las funciones
* @return array  $coleccionfunciones
*/
function cargarFunciones(){
    $coleccionfunciones=array();
    $coleccionfunciones[0]= array("nombre"=> "x" , "precio" => 0);
    $coleccionfunciones[1]= array("nombre"=> "x" , "precio" => 0);
    $coleccionfunciones[2]= array("nombre"=> "x" , "precio" => 0);
    $coleccionfunciones[3]= array("nombre"=> "x" , "precio" => 0);
    return $coleccionfunciones;
}

/**
* muestra y obtiene una opcion de menú ***válida***
* @return int $opcion
*/
function seleccionarOpcion(){
    
    $opcion = 0; 
    echo "--------------------------------------------------------------\n";
    echo "\n ( 1 ) Cargar nombre y direccion del teatro ";
    echo "\n ( 2 ) modificar nombre y direccion del teatro"; 
    echo "\n ( 3 ) Cargar numero de funcion, nombre y precio de la funcion ";
    echo "\n ( 4 ) Modificar el nombre de la funcion";
    echo "\n ( 5 ) Modificar el precio de la funcion";
    echo "\n ( 6 ) Mostrar la informacion completa del teatro y las funciones";
    echo "\n ( 7 ) Salir";
    echo "\n--------------------------------------------------------------\n";  
    
    do{
        echo "Indique una opcion valida: ";
        $opcion = trim(fgets(STDIN)); 
    }while(1<$opcion && $opcion>7);
    return $opcion;
 }
 
// listado de teatro
function listadoTeatro($arrefuncionesE,$p){
   
    $n=0;  $i=0;$j=0;
    $n=count($arrefuncionesE);
    echo "Nombre del teatro: ".$p->getNombre()."\n";
    echo "Direccion del teatro: ".$p->getDireccion()."\n";
    echo "--------------------------------------\n";
    for($j=0;$j<$n;$j++){
        $cadena="numero de funcion: ".($j+1)."  "."nombre: ".$p->getFunciones()[$j]["nombre"]." precio: ".$p->getFunciones()[$j]["precio"];
        echo "\n".$cadena;
    }

}
 
function nombreTeatro($p){
    //alta de nombre teatro
    echo "\nIngrese nombre del teatro: \n";
    $nombrei = trim(fgets(STDIN));
    $p->setNombre($nombrei);
}

function direTeatro($p){
    //alta de nombre teatro
    echo "\nIngrese direccion del teatro: \n";
    $direccioni = trim(fgets(STDIN));
    $p->setDireccion($direccioni);
}

function nomydireTeatro($arrefuncionesE){
    //ingreso de datos a los parametros del objeto
    echo "Ingrese nombre del teatro: ";
    $nombrei = trim(fgets(STDIN));

    echo "\nIngrese la direccion del teatro: ";
    $direccioni = trim(fgets(STDIN));

    $p=new Teatrin($nombrei,$direccioni,$arrefuncionesE);
    //print_r($p);            
}

function moPrecio($arrefunciones,$p){
// modificacion del precio de la funcion
echo "\nIngrese el numero de funcion a buscar: ";
$numf = trim(fgets(STDIN));
$cadena="numero de funcion: ".($numf)."  ".$p->getFunciones()[$numf]["nombre"]." * ".$p->getFunciones()[$numf]["precio"]."\n";
echo $cadena;    
echo "\nIngrese el precio a modificar: ";
        $preciofunci = trim(fgets(STDIN));
        $arrefunciones[($numf-1)]["precio"]=$preciofunci;
        $p->setFunciones($arrefunciones);
       // print_r($p);
}
// modificacion nombre de la funcion
function moNonbre($arrefunciones,$p){
    echo "\nIngrese el numero de funcion a buscar: ";
    $numf = trim(fgets(STDIN));
    $cadena="numero de funcion: ".($numf)."  ".$p->getFunciones()[$numf]["nombre"]." * ".$p->getFunciones()[$numf]["precio"]."\n";
    echo $cadena;  
    echo "\nModifique el nombre de la funcion: ";
            $nomfunci = trim(fgets(STDIN));
            $arrefunciones[($numf-1)]["nombre"]=$nomfunci;
            $p->setFunciones($arrefuncionesE);
           // print_r($p);
    
}
function altaFunciones($arrefuncionesE,$p){
// carga de todo el arreglo
$n=0;  $i=0;$j=0;
$n=count($arrefuncionesE);
    for($j=0;$j<$n;$j++){
        echo "funcion-> ".($j+1)." ".$arrefuncionesE[$j]["nombre"]." - ".$arrefuncionesE[$j]["precio"]."\n";
        echo "\n funcion numero: ".($j+1);
        echo "\nIngrese el nombre de la funcion: ".($j+1)." -> ";
        $nomfunci = trim(fgets(STDIN));
        echo "\nIngrese el precio de la funcion: ".($j+1)." -> ";
        $preciofunci = trim(fgets(STDIN));
        $arrefuncionesE[($j)]["nombre"]=$nomfunci;
        $arrefuncionesE[($j)]["precio"]=$preciofunci;
    }
    $p->setFunciones($arrefuncionesE);
    //print_r($p);
}

/**main
 * array $arrefunciones
 * integer $i,$n,$j
 */

$arrefunciones=cargarFunciones();

$n=0;  $i=0;$j=0;
$n=count($arrefunciones);

    for($j=0;$j<$n;$j++){
        echo "funcion-> ".($j+1)." ".$arrefunciones[$j]["nombre"]." - ".$arrefunciones[$j]["precio"]."\n";
    }
    $p=new Teatro("","",$arrefunciones);

do{ 
    
    $opcion = seleccionarOpcion();
    switch ($opcion) {
    case 1: //
        echo "estoy en la opcion 1\n";
            //ingreso de datos a los parametros del objeto
            nombreTeatro($p);
            direTeatro($p);
            echo "\npresione tecla p/continuar ";   
            $pr = trim(fgets(STDIN));
        break;
    case 2: //
        echo "estoy en la opcion 2\n";
        
         nombreTeatro($p);
         direTeatro($p);
         echo "\npresione tecla p/continuar ";
        $pr = trim(fgets(STDIN));
    break;
    case 3: //
        echo "estoy en la opcion 3\n";
        altaFunciones($arrefunciones,$p);
        echo "\npresione tecla p/continuar ";
        $pr = trim(fgets(STDIN));
        break;
    case 4: //
        echo "estoy en la opcion 4\n";
        moNonbre($arrefunciones,$p);
        echo "\npresione tecla p/continuar ";
        $pr = trim(fgets(STDIN));
        break;
    case 5: //
        echo "estoy en la opcion 5\n";
        moPrecio($arrefunciones,$p);
        echo "\npresione tecla p/continuar ";
        $pr = trim(fgets(STDIN));
        break;
    case 6: //
        echo "estoy en la opcion 6\n";
        listadoTeatro($arrefunciones,$p);
        echo "\npresione tecla p/continuar ";
        $pr = trim(fgets(STDIN));
        break;
    
     }
}while($opcion != 7);
