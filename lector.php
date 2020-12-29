<?php

//Incluimos la libreria
include 'SimpleXLSX.php';

//Funcion para leer el archivo
function file_reading(){
    //Leemos el archivo 
    if ( $xlsx_file = SimpleXLSX::parse('Non residents quarterly template.xlsx') ) {
        //echo"<pre>";
        //var_dump($xlsx_file->rows());
        //echo"</pre>";

    } else {
        echo SimpleXLSX::parseError();
    }
    //Retornamos el archivo en forma de array
    return $xlsx_file;
}


//Creamos el arreglo asociativo con los datos requeridos
function array_creating(){
    $xlsx=file_reading();
    //Se crea el arreglo asociativo
    $data= array(
        'B1' => $xlsx->getCell(0,'B1'),
        'B2' => $xlsx->getCell(0,'B2'),
        'B3' => $xlsx->getCell(0,'B3'),
        'B4' => $xlsx->getCell(0,'B4'),
        'B5' => $xlsx->getCell(0,'B5'),
        'B11' => $xlsx->getCell(0,'B11'),
        'B12' => $xlsx->getCell(0,'B12'),
        'B13' => $xlsx->getCell(0,'B13'),
        'B14' => $xlsx->getCell(0,'B14'),
        'B15' => $xlsx->getCell(0,'B15'),
        'B16' => $xlsx->getCell(0,'B16'),
        'B18' => $xlsx->getCell(0,'B18'),
        'B19' => $xlsx->getCell(0,'B19'),
        'B20' => $xlsx->getCell(0,'B20'),
        'B30' => $xlsx->getCell(0,'B30'),
        'C7' => $xlsx->getCell(0,'C7'),
        'C25' => $xlsx->getCell(0,'C25'),
        'D3' => $xlsx->getCell(0,'D3'),
        'D7' => $xlsx->getCell(0,'D7'),
        'D21' => $xlsx->getCell(0,'D21'),
        'D23' => $xlsx->getCell(0,'D23'),
        'D25' => $xlsx->getCell(0,'D25'),
        'D28' => $xlsx->getCell(0,'D28'),
        'E3' => $xlsx->getCell(0,'E3')
    );
    echo"<pre>";
    var_dump($data);
    echo"</pre>";
    //Se retorna lo obtenido 
    return $data;
}
array_creating();

function replace_data(){
    $data=array_creating();

    $path="modelo210.txt"; //Sustituir en caso de ser necesario
    $content=file_get_contents($path, FILE_USE_INCLUDE_PATH); //Template
    
    echo $content;
    echo "<br>";
    echo "<br>";

    //Reemplazamos
    $content = str_replace("{B1}", $data['B1'], $content);
    $content = str_replace("{B2}", $data['B2'], $content);
    $content = str_replace("{B3}", $data['B3'], $content);
    $content = str_replace("{B4}", $data['B4'], $content);
    $content = str_replace("{B5}", $data['B5'], $content);
    $content = str_replace("{B11}", $data['B11'], $content);
    $content = str_replace("{B12}", $data['B12'], $content);
    $content = str_replace("{B13}", $data['B13'], $content);
    $content = str_replace("{B14}", $data['B14'], $content);
    $content = str_replace("{B15}", $data['B15'], $content);
    $content = str_replace("{B16}", $data['B16'], $content);
    $content = str_replace("{B18}", $data['B18'], $content);
    $content = str_replace("{B19}", $data['B19'], $content);
    $content = str_replace("{B20}", $data['B20'], $content);
    $content = str_replace("{B30}", $data['B30'], $content);
    $content = str_replace("{C7}", $data['C7'], $content);
    $content = str_replace("{C25}", $data['D25'], $content);
    $content = str_replace("{D3}", $data['D3'], $content);
    $content = str_replace("{D7}", $data['D7'], $content);
    $content = str_replace("{D21}", $data['D21'], $content);
    $content = str_replace("{D23}", $data['D23'], $content);
    $content = str_replace("{D25}", $data['D25'], $content);
    $content = str_replace("{D28}", $data['D28'], $content);
    $content = str_replace("{E3}", $data['E3'], $content);
    echo $content;
    //Abrimos el archivo para escritura
    $new_file = fopen("resultado.txt", "w");
    fwrite($new_file, $content);
    fclose($new_file);

   return $content;
}
replace_data();
 

 















?>



