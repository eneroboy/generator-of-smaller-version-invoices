<?php
/*

Kod zapożyczony z http://funkcje.net/view/2/8/1628/index.html
Stworzony przez Igora, http://funkcje.net/uzytkownik/igor

*/
if (!function_exists('odmiana')) {
  function odmiana($odmiany, $int){ // $odmiany = Array('jeden','dwa','pięć')
    $txt = $odmiany[2];
    if ($int == 1) $txt = $odmiany[0];
    $jednosci = (int) substr($int,-1);
    $reszta = $int % 100;
    if (($jednosci > 1 && $jednosci < 5) &! ($reszta > 10 && $reszta < 20))
      $txt = $odmiany[1];
    return $txt;
  }
}

if(!function_exists('str_split')){
  function str_split($string,$len = 1) {
        if ($len < 1) return false;
    for($ii=0, $rt = Array();$ii<ceil(strlen($string)/$len);$ii++)
      $rt[$ii] = substr($string, $len*$ii, $len);
    return($rt);
  }
}

$slowa = Array(
  'minus',

  Array(
    'zero',
    'jeden',
    'dwa',
    'trzy',
    'cztery',
    'pięć',
    'sześć',
    'siedem',
    'osiem',
    'dziewięć'),

  Array(
    'dziesięć',
    'jedenaście',
    'dwanaście',
    'trzynaście',
    'czternaście',
    'piętnaście',
    'szesnaście',
    'siedemnaście',
    'osiemnaście',
    'dziewiętnaście'),

  Array(
    'dziesięć',
    'dwadzieścia',
    'trzydzieści',
    'czterdzieści',
    'pięćdziesiąt',
    'sześćdziesiąt',
    'siedemdziesiąt',
    'osiemdziesiąt',
    'dziewięćdziesiąt'),

  Array(
    'sto',
    'dwieście',
    'trzysta',
    'czterysta',
    'pięćset',
    'sześćset',
    'siedemset',
    'osiemset',
    'dziewięćset'),

  Array(
    'tysiąc',
    'tysiące',
    'tysięcy'),

  Array(
    'milion',
    'miliony',
    'milionów'),

  Array(
    'miliard',
    'miliardy',
    'miliardów'),

  Array(
    'bilion',
    'biliony',
    'bilionów'),

  Array(
    'biliard',
    'biliardy',
    'biliardów'),

  Array(
    'trylion',
    'tryliony',
    'trylionów'),

  Array(
    'tryliard',
    'tryliardy',
    'tryliardów'),

  Array(
    'kwadrylion',
    'kwadryliony',
    'kwadrylionów'),

  Array(
    'kwintylion',
    'kwintyliony',
    'kwintylionów'),

  Array(
    'sekstylion',
    'sekstyliony',
    'sekstylionów'),

  Array(
    'septylion',
    'septyliony',
    'septylionów'),

  Array(
    'oktylion',
    'oktyliony',
    'oktylionów'),

  Array(
    'nonylion',
    'nonyliony',
    'nonylionów'),

  Array(
    'decylion',
    'decyliony',
    'decylionów')
);



function liczbaa($int){ // odmiana dla liczb < 1000
  global $slowa;
  $wynik = '';
  $jj = abs((int) $int);

  if ($jj == 0) return $slowa[1][0];
  $jednosci = $jj % 10;
  $dziesiatki = ($jj % 100 - $jednosci) / 10;
  $setki = ($jj - $dziesiatki*10 - $jednosci) / 100;

  if ($setki > 0) $wynik .= $slowa[4][$setki-1].' ';

  if ($dziesiatki > 0)
        if ($dziesiatki == 1) $wynik .= $slowa[2][$jednosci].' ';
  else
    $wynik .= $slowa[3][$dziesiatki-1].' ';

  if ($jednosci > 0 && $dziesiatki != 1) $wynik .= $slowa[1][$jednosci].' ';
  return $wynik;
}

function slownie($int){

  global $slowa;

  $in = preg_replace('/[^-\d]+/','',$int);
  $out = '';

  if ($in{0} == '-'){
    $in = substr($in, 1);
    $out = $slowa[0].' ';
  }

  $txt = str_split(strrev($in), 3);

  if ($in == 0) $out = $slowa[1][0].' ';

  for ($ii = count($txt) - 1; $ii >= 0; $ii--){
    $liczbaa = (int) strrev($txt[$ii]);
    if ($liczbaa > 0)
      if ($ii == 0)
        $out .= liczbaa($liczbaa).' ';
          else
        $out .= ($liczbaa > 1 ? liczbaa($liczbaa).' ' : '')
          .odmiana( $slowa[4 + $ii], $liczbaa).' ';
  }
  return trim($out);
}
function kwotaslownie($kwota){
  $kwota = explode('.', $kwota);
 
  $zl = preg_replace('/[^-\d]+/','', $kwota[0]);
  $gr = preg_replace('/[^\d]+/','', substr(isset($kwota[1]) ? $kwota[1] : 0, 0, 2));
  while(strlen($gr) < 2) $gr .= '0';

  return slownie($zl) . ' ' . odmiana(Array('złoty', 'złote', 'złotych'), $zl) .
      (intval($gr) == 0 ? '' :
      ' ' . slownie($gr) . ' ' . odmiana(Array('grosz', 'grosze', 'groszy'), $gr));
}
?>