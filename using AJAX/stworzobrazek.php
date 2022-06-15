<?php 

//$image = imagecreate( 800,600 );
//imagefilledrectangle( $image, 0,0, 800,600, kolor( $image, 'abcdef' ) );
$image = imagecreatefromjpeg("rachunek.jpg");


$czcionka = './courier.ttf';

$nazwaSprzedawcy = $_POST['nazwaSprzedawcy'] ; // 48 znaków
$nazwaSprzedawcy = trim(preg_replace('/\s\s+/', ' ', $nazwaSprzedawcy));
if (strlen($nazwaSprzedawcy) >= 24){
  $nazwaSprzedawcy1 = substr($nazwaSprzedawcy, 0, 24);
  if(substr($nazwaSprzedawcy, 22, 23) == " "){
    $nazwaSprzedawcy2 = substr($nazwaSprzedawcy, 24, strlen($nazwaSprzedawcy)-1);
  } else {
    $gdzieSpacja = strrpos($nazwaSprzedawcy1, " ");
    $nazwaSprzedawcy1 = substr($nazwaSprzedawcy, 0, $gdzieSpacja);
    $nazwaSprzedawcy2 = substr($nazwaSprzedawcy, $gdzieSpacja+1, strlen($nazwaSprzedawcy)-1);
  }

  imagettftext($image, 14, 0, 9, 29, kolor($image, 'abc'), $czcionka, $nazwaSprzedawcy1);
  imagettftext($image, 14, 0, 9, 50, kolor($image, 'abc'), $czcionka, $nazwaSprzedawcy2);
} else {
  imagettftext($image, 14, 0, 9, 30, kolor($image, 'abc'), $czcionka, $nazwaSprzedawcy);
}

$ulicaSprzedawcy = $_POST['ulicaSprzedawcy']; 
$miejscowoscSprzedawcy = $_POST['miejscowoscSprzedawcy']; 

imagettftext($image, 14, 0, 9, 73, kolor($image, 'abc'), $czcionka, $ulicaSprzedawcy); 
imagettftext($image, 14, 0, 9, 95, kolor($image, 'abc'), $czcionka, $miejscowoscSprzedawcy); 

$nazwaMiejscowosci = $_POST['nazwaMiejscowosci'];
imagettftext($image, 11, 0, 370, 22, kolor($image, 'abc'), $czcionka, $nazwaMiejscowosci); 

$dataWystawieniaRachunku = $_POST['dataWystawieniaRachunku'];
imagettftext($image, 11, 0, 657, 22, kolor($image, 'abc'), $czcionka, $dataWystawieniaRachunku);

$nazwaOdbiorcy = $_POST['nazwaOdbiorcy'];
//$nazwaOdbiorcy = strtr($nazwaOdbiorcy, "\n", " ");
$nazwaOdbiorcy = trim(preg_replace('/\s\s+/', ' ', $nazwaOdbiorcy));
if (strlen($nazwaOdbiorcy) > 70){
  $nazwaOdbiorcy1 = substr($nazwaOdbiorcy, 0, 69);
  if(substr($nazwaOdbiorcy, 69, 70) == " "){
    $nazwaOdbiorcy2 = substr($nazwaOdbiorcy, 69, strlen($nazwaOdbiorcy)-1);
  } else {
    $gdzieSpacja1 = strrpos($nazwaOdbiorcy1, " ");
    $nazwaOdbiorcy1 = substr($nazwaOdbiorcy, 0, $gdzieSpacja1);
    $nazwaOdbiorcy2 = substr($nazwaOdbiorcy, $gdzieSpacja1+1, strlen($nazwaOdbiorcy)-1);
  }
  
  //$nazwaOdbiorcy2 = substr($nazwaOdbiorcy, 69, strlen($nazwaOdbiorcy)-1);
  imagettftext($image, 13, 0, 62, 155, kolor($image, 'abc'), $czcionka, $nazwaOdbiorcy1);
  imagettftext($image, 13, 0, 35, 185, kolor($image, 'abc'), $czcionka, $nazwaOdbiorcy2);
} else {
  imagettftext($image, 13, 0, 62, 155, kolor($image, 'abc'), $czcionka, $nazwaOdbiorcy);
}

$numerRachunku1 = $_POST['numerRachunku1'];
$numerRachunku2 = $_POST['numerRachunku2']; 
switch (strlen($numerRachunku1)) {
  case "1": $numerRachunku1 = "000" . $numerRachunku1; break;
  case "2": $numerRachunku1 = "00" . $numerRachunku1; break;
  case "3": $numerRachunku1 = "0" . $numerRachunku1; break; 
}
$zawartoscNumeruRachunku = $numerRachunku1 . "/R/" . $numerRachunku2;
imagettftext($image, 27, 0, 550, 92, kolor($image, 'abc'), $czcionka, $zawartoscNumeruRachunku); 

$liczbaProduktow = intval($_POST['liczbaProduktow']);
$sumaWartosciProduktow = 0;
$yProduktu = 273;
for ($i = 1; $i <= $liczbaProduktow; $i++){
    $ilosc = $_POST["ilosc" . $i];  
    $cena = $_POST["cena" . $i];
    $nazwa =  $_POST["nazwa" . $i];

    imagettftext($image, 11, 0, 10, $yProduktu, kolor($image, 'abc'), $czcionka, $nazwa);
    imagettftext($image, 11, 0, wymiarX($czcionka,11,$ilosc,380), $yProduktu, kolor($image, 'abc'), $czcionka, $ilosc);
    imagettftext($image, 11, 0, 395, $yProduktu, kolor($image, 'abc'), $czcionka, "szt");

    $cenaProduktuString = strval(  number_format(floatval($_POST["cena" . $i]),2) );
    $cenaProduktuGrosze = substr($cenaProduktuString, -2, 2);
    imagettftext($image, 11, 0, 560, $yProduktu, kolor($image, 'abc'), $czcionka, $cenaProduktuGrosze);
    $cenaProduktuZlote = substr($cenaProduktuString, 0,-3);
    imagettftext($image, 11, 0, wymiarX($czcionka,11,$cenaProduktuZlote,543), $yProduktu, kolor($image, 'abc'), $czcionka, $cenaProduktuZlote);

    
    $wartoscProduktuString = strval(number_format(floatval($cena) * floatval($ilosc),2));
    $wartoscProduktuZlote = substr($wartoscProduktuString, 0,-3);
    imagettftext($image, 11, 0, wymiarX($czcionka,11,$wartoscProduktuZlote,718), $yProduktu, kolor($image, 'abc'), $czcionka, $wartoscProduktuZlote);
    $wartoscProduktuGrosze = substr($wartoscProduktuString, -2, 2);
    imagettftext($image, 11, 0, 737, $yProduktu, kolor($image, 'abc'), $czcionka, $wartoscProduktuGrosze);
  
    $sumaWartosciProduktow += ($_POST["ilosc" . $i] * $_POST["cena" . $i]);
    $yProduktu = $yProduktu + 32;
}

$sumaWartosciProduktowString = strval(number_format($sumaWartosciProduktow,2));
$sumaWartosciProduktuZlote = substr($sumaWartosciProduktowString, 0,-3);
imagettftext($image, 11, 0, wymiarX($czcionka,11,$sumaWartosciProduktuZlote,718), 467, kolor($image, 'abc'), $czcionka, $sumaWartosciProduktuZlote);
$sumaWartosciProduktuGrosze = substr($sumaWartosciProduktowString, -2, 2);
imagettftext($image, 11, 0, 737, 467, kolor($image, 'abc'), $czcionka, $sumaWartosciProduktuGrosze);

include("kwotaslownie.php");
$slownie = kwotaslownie($sumaWartosciProduktow);
//imagettftext($image, 11, 0, 90, 555, kolor($image, 'abc'), $czcionka, $slownie);


if (strlen($slownie) > 49){
  $slownie1 = substr($slownie, 0, 49);
  if(substr($slownie, 48, 49) == " "){
    $slownie2 = substr($slownie, 49, strlen($slownie)-1);
  } else {
    $gdzieSpacja2 = strrpos($slownie1, " ");
    $slownie1 = substr($slownie, 0, $gdzieSpacja2);
    $slownie2 = substr($slownie, $gdzieSpacja2+1, strlen($slownie)-1);
  }
  imagettftext($image, 10, 0, 90, 555, kolor($image, 'abc'), $czcionka, $slownie1);
  imagettftext($image, 10, 0, 35, 585, kolor($image, 'abc'), $czcionka, $slownie2);
} else {
  imagettftext($image, 10, 0, 90, 555, kolor($image, 'abc'), $czcionka, $slownie);
}
/* 
$nazwaOdbiorcy1 = substr($nazwaOdbiorcy, 0, 69);
  if(substr($nazwaOdbiorcy, 69, 70) == " "){
    $nazwaOdbiorcy2 = substr($nazwaOdbiorcy, 69, strlen($nazwaOdbiorcy)-1);
  } else {
    $gdzieSpacja1 = strrpos($nazwaOdbiorcy1, " ");
    $nazwaOdbiorcy1 = substr($nazwaOdbiorcy, 0, $gdzieSpacja1);
    $nazwaOdbiorcy2 = substr($nazwaOdbiorcy, $gdzieSpacja1+1, strlen($nazwaOdbiorcy)-1);
  }
*/

//header("Content-type: image/png");
//imagepng( $image );

function wymiarX($font,$fontSize, $text, $xKoncaTekstu) {
    $wymiaryBoxa = imagettfbbox($fontSize, 0, $font, $text);
    $tekstSzerkosc = abs($wymiaryBoxa[4] - $wymiaryBoxa[0]);
    $x = $xKoncaTekstu-$tekstSzerkosc;
    return $x;
}


function kolor( $oo, $kk ) {
  return imagecolorallocate( $oo, hexdec( substr($kk,0,2) ), hexdec( substr($kk,2,2) ), hexdec( substr($kk,4,2) )); };




ob_start();
imagepng($image);
$image_data = ob_get_contents();
ob_end_clean();
$base64 = base64_encode($image_data);
echo "<img src='data:image/png;base64,$base64' alt='' />";
?>

