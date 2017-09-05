<?php 
/*
THIS FILE IS FOR EXAMPLE PURPOSES ONLY
*/


include './server/Adl/Configuration.php';
include './server/Adl/Config/Parser.php';
include './server/Adl/Config/JasperServer.php';
include './server/Adl/Integration/RequestJasper.php';

# Recebe objeto e passa os valores para as variaveis abaixo #

ini_set('memory_limit', '4095M');

    $jasper = new Adl\Integration\RequestJasper();
    /*
      To send output to browser
     */
    header('Content-type: application/pdf');
    //$parametro = array("id" => $id, "NumeroMic" => $mic_id, "Flag" => $flag);
    //echo $jasper->run('/Reports/Catalogo', 'PDF');
    /*
      To Save content to a file in the disk
      The path where the file will be saved is registered into config/data.ini
     */
    echo $jasper->run('/reports/interactive/teste','PDF',null);


/*
Copyright (C) 2011 Adler Brediks Medrado

Permission is hereby granted, free of charge, to any person obtaining a copy of
this software and associated documentation files (the "Software"), to deal in
the Software without restriction, including without limitation the rights to
use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies
of the Software, and to permit persons to whom the Software is furnished to do
so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.
*/
?>