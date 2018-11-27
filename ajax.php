<?php
//wskazanie pliku xml, który będziemy przeszukiwać
$xml=simplexml_load_file("czas.xml");
  
if(isset($_GET['action'])){
  
    //wyszukanie i zwrócenie węzłów w XML szukanych przez klienta na podstawie jego żądań
  switch ($_GET['action']) {
    case "czas":
        $result = $xml->xpath("/czasopisma/zmienne/*");
    echo json_encode($result);
        break;
    case "lata":
         $result = $xml->xpath("/czasopisma/lata/".$_GET['czasopismo']);
    echo json_encode($result);
      
        break;
      case "tresc":
      if($_GET['rok'] == "nr specjalne" || $_GET['rok'] == "nr specjalny"){
         $result = $xml->xpath("/czasopisma/".$_GET['tytul']."/*[@rok='".$_GET['rok']."']");
    echo json_encode($result);
      }
      else {
      $result = $xml->xpath("/czasopisma/".$_GET['tytul']."/*[@rok=".$_GET['rok']."]");
    echo json_encode($result);
      }
        break;
      case "all":
         $result = $xml->xpath("/czasopisma/".$_GET['tytul']."/*");
    echo json_encode($result);
      
        break;
}   
}
?> 
