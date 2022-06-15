<?php 
session_start();
if (!isset( $_SESSION['powrot'])) {
    echo '<html><head><meta charset="UTF-8">
    
    <style>
        body {
            font-family: Tahoma;
            padding: 0;
            background-color: wheat;
        }
        .nazwaSprzedawcy {
            width: 180px;
        }
        #glowny {
            margin-left: auto;
            margin-right: auto;
            width: 1100px;
            background-color: white;
        }
        #naglowek{
            height: 75px;
            position: relative;
            background-color: rgb(0, 114, 114);
        }
        #napisGora{
            margin: 0;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 35px;
            color: wheat;
        }
        #divFormularz{
            padding: 20px;
        }
        #numerRachunku{
            margin-top: 20px;
            margin-bottom: 20px;
        }
        #numerRachunku > * {
            display: inline;
        }
        #numerRachunku > input {
            display: inline;
            width: 100px;
        }
        #liczbaProduktow > *{
            display: inline;
        }
        #liczbaProduktow{
            margin-top: 20px;
            margin-bottom: 20px;
        }
        #daneSprzedawcy{
            border-left: 2px solid  rgb(0, 114, 114);
            padding: 10px;
        }
        #przeslijFormularz {
            background-color: rgb(0, 114, 114);
            border: none;
            color: wheat;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
        }
        #przycisk{
            margin-top: 15px;
            display: inline-block;
        }
        #produkty{
            font-size: 13px;
        }
    </style>
    <script>
    </script>
</head>
<body>
    <div id="glowny">
        <div id="naglowek"><div id="napisGora">Generator rachunku</div></div>
        <div id="divFormularz"><form method="POST" action="stworzobrazek.php">
            <div>
                <p>Dane sprzedawcy</p>
                 <div id="daneSprzedawcy">
                     <div>
                        <p style="margin: 0px 0px 15px 0px;">Nazwa firmy:</p>
                        <textarea name="nazwaSprzedawcy" rows="4" columns="6" maxlength="48" placeholder="Wpisz dane"></textarea>
                    </div> 
                    <div>
                        <p>Ulica:</p>
                        <input name="ulicaSprzedawcy" maxlength="24" placeholder="max. 24 znaki" ">
                    </div>
                    <div>
                        <p>Kod pocztowy i miejscowość:</p>
                        <input name="miejscowoscSprzedawcy" maxlength="24" placeholder="max. 24 znaki" ">
                    </div>
                </div>
            </div>
            
            <div id="numerRachunku"> 
                <p>Numer Rachunku:</p>             
                <input name="numerRachunku1" maxlength="4" placeholder="max. 4 znaki" >
                <p>/R/</p>
                <input name="numerRachunku2" maxlength="2" placeholder="max. 2 znaki" >
            </div>

            <div>                      
                <p>Miejscowość wystawienia:</p>    
                <input name="nazwaMiejscowosci" maxlength="16" placeholder="max. 16 znaków" >
            </div>  

            <div>
                <p>Data wystawienia:</p>           
                <input type="date" name="dataWystawieniaRachunku" >
            </div> 

            <div>
                <p>Nazwa i dane odbiorcy odbiorcy:</p>
                <textarea name="nazwaOdbiorcy" rows="4" columns="6" maxlength="141" placeholder="Wpisz dane"></textarea>
            </div>

            <div id="liczbaProduktow">         
                <p>Liczba produktów (od 1 do 6):</p> 
                <input type="number" min="1" max="6" name="liczba" >
            </div>

            <div id="produkty">
                <div>
                    Nazwa produktu 1: <input type="text" id="nazwa1" name="nazwa1" maxlength="31" >   
                    Ilość produktu 1: <input type="number" id="ilosc1" name="ilosc1" min="1" max="9999" >   
                    Cena produktu 1: <input type="number" id="cena1" name="cena1" step="0.01" min="0.01" max="2000000" ><br>
                </div>
                <div>
                    Nazwa produktu 2: <input type="text" id="nazwa2" name="nazwa2" maxlength="31" >   
                    Ilość produktu 2: <input type="number" id="ilosc2" name="ilosc2" min="1" max="9999" >   
                    Cena produktu 2: <input type="number" id="cena2" name="cena2" step="0.01" min="0.01" max="2000000" ><br>
                </div>
                <div>
                    Nazwa produktu 3: <input type="text" id="nazwa3" name="nazwa3" maxlength="31" >   
                    Ilość produktu 3: <input type="number" id="ilosc3" name="ilosc3" min="1" max="9999" >   
                    Cena produktu 3: <input type="number" id="cena3" name="cena3" step="0.01" min="0.01" max="2000000" ><br>
                </div>
                <div>
                    Nazwa produktu 4: <input type="text" id="nazwa4" name="nazwa4" maxlength="31" >   
                    Ilość produktu 4: <input type="number" id="ilosc4" name="ilosc4" min="1" max="9999" >   
                    Cena produktu 4: <input type="number" id="cena4" name="cena4" step="0.01" min="0.01" max="2000000" ><br>
                </div>
                <div>
                    Nazwa produktu 5: <input type="text" id="nazwa5" name="nazwa5" maxlength="31" >   
                    Ilość produktu 5: <input type="number" id="ilosc5" name="ilosc5" min="1" max="9999" >   
                    Cena produktu 5: <input type="number" id="cena5" name="cena5" step="0.01" min="0.01" max="2000000" ><br>
                </div>
                <div>
                    Nazwa produktu 6: <input type="text" id="nazwa6" name="nazwa6" maxlength="31" >   
                    Ilość produktu 6: <input type="number" id="ilosc6" name="ilosc6" min="1" max="9999" >   
                    Cena produktu 6: <input type="number" id="cena6" name="cena6" step="0.01" min="0.01" max="2000000" ><br>
                </div>
            </div>
            <div id="przycisk">
                <input id="przeslijFormularz" type="submit">
            </div>        
        </form>
        </div>
        <div id="naglowek"><div id="napisGora" style="font-size:12px">Made by Jan B ©</div></div>
    </div>
</body></html>';
} else {
    for ($i=0; $i<=8;$i++){
        $wartosc[$i] = $_SESSION['wartosc' . $i];
    }
    for ($i = 0; $i < 6; $i++){
        $cena[$i] = $_SESSION["cena".$i];
        $nazwa[$i] = $_SESSION["nazwa".$i]; 
        $ilosc[$i] = $_SESSION["ilosc".$i];
      }
    print '<html><head><meta charset="UTF-8">
    
    <style>
        body {
            font-family: Tahoma;
            padding: 0;
            background-color: wheat;
        }
        .nazwaSprzedawcy {
            width: 180px;
        }
        #glowny {
            margin-left: auto;
            margin-right: auto;
            width: 1100px;
            background-color: white;
        }
        #naglowek{
            height: 75px;
            position: relative;
            background-color: rgb(0, 114, 114);
        }
        #napisGora{
            margin: 0;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 35px;
            color: wheat;
        }
        #divFormularz{
            padding: 20px;
        }
        #numerRachunku{
            margin-top: 20px;
            margin-bottom: 20px;
        }
        #numerRachunku > * {
            display: inline;
        }
        #numerRachunku > input {
            display: inline;
            width: 100px;
        }
        #liczbaProduktow > *{
            display: inline;
        }
        #liczbaProduktow{
            margin-top: 20px;
            margin-bottom: 20px;
        }
        #daneSprzedawcy{
            border-left: 2px solid  rgb(0, 114, 114);
            padding: 10px;
        }
        #przeslijFormularz {
            background-color: rgb(0, 114, 114);
            border: none;
            color: wheat;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
        }
        #czyszczenieFormularza {
            background-color: rgb(0, 114, 114);
            border: none;
            color: wheat;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
        }
        #przycisk{
            margin-top: 15px;
            display: inline-block;
        }
        #produkty{
            font-size: 13px;
        }
    </style>
    <script>
    </script>
</head>
<body>
    <div id="glowny">
        <div id="naglowek"><div id="napisGora">Generator rachunku</div></div>
        <div id="divFormularz"><form method="POST" action="stworzobrazek.php">
            <div>
                <p>Dane sprzedawcy</p>
                 <div id="daneSprzedawcy">
                     <div>
                        <p style="margin: 0px 0px 15px 0px;">Nazwa firmy:</p>
                        <textarea name="nazwaSprzedawcy" rows="4" columns="6" maxlength="48" placeholder="Wpisz dane">'. $wartosc[0] .'</textarea>
                    </div> 
                    <div>
                        <p>Ulica:</p>
                        <input name="ulicaSprzedawcy" maxlength="24" placeholder="max. 24 znaki" value="'. $wartosc[1] .'">
                    </div>
                    <div>
                        <p>Kod pocztowy i miejscowość:</p>
                        <input name="miejscowoscSprzedawcy" maxlength="24" placeholder="max. 24 znaki" value="'. $wartosc[2] .'">
                    </div>
                </div>
            </div>
            
            <div id="numerRachunku"> 
                <p>Numer Rachunku:</p>             
                <input name="numerRachunku1" maxlength="4" placeholder="max. 4 znaki" value="'. $wartosc[3] .'">
                <p>/R/</p>
                <input name="numerRachunku2" maxlength="2" placeholder="max. 2 znaki" value="'. $wartosc[4] .'">
            </div>

            <div>                      
                <p>Miejscowość wystawienia:</p>    
                <input name="nazwaMiejscowosci" maxlength="16" placeholder="max. 16 znaków" value="'. $wartosc[5] .'">
            </div>  

            <div>
                <p>Data wystawienia:</p>           
                <input type="date" name="dataWystawieniaRachunku" value="'. $wartosc[6] .'">
            </div> 

            <div>
                <p>Nazwa i dane odbiorcy odbiorcy:</p>
                <textarea name="nazwaOdbiorcy" rows="4" columns="6" maxlength="141" placeholder="Wpisz dane">'. $wartosc[7] .'</textarea>
            </div>

            <div id="liczbaProduktow">         
                <p>Liczba produktów (od 1 do 6):</p> 
                <input type="number" name="liczba" min="1" max="6" value="'. ($wartosc[8]) .'">
            </div>

            <div id="produkty">
                <div>
                    Nazwa produktu 1: <input type="text" id="nazwa1" name="nazwa1" maxlength="31" value="'. $nazwa[0] .'">   
                    Ilość produktu 1: <input type="number" id="ilosc1" name="ilosc1" min="1" max="9999" value="'. $ilosc[0] .'">   
                    Cena produktu 1: <input type="number" id="cena1" name="cena1" step="0.01" min="0.01" max="2000000" value="'. $cena[0] .'"><br>
                </div>
                <div>
                    Nazwa produktu 2: <input type="text" id="nazwa2" name="nazwa2" maxlength="31" value="'. $nazwa[1] .'">   
                    Ilość produktu 2: <input type="number" id="ilosc2" name="ilosc2" min="1" max="9999" value="'. $ilosc[1] .'">   
                    Cena produktu 2: <input type="number" id="cena2" name="cena2" step="0.01" min="0.01" max="2000000" value="'. $cena[1] .'"><br>
                </div>
                <div>
                    Nazwa produktu 3: <input type="text" id="nazwa3" name="nazwa3" maxlength="31" value="'. $nazwa[2] .'">   
                    Ilość produktu 3: <input type="number" id="ilosc3" name="ilosc3" min="1" max="9999" value="'. $ilosc[2] .'">   
                    Cena produktu 3: <input type="number" id="cena3" name="cena3" step="0.01" min="0.01" max="2000000" value="'. $cena[2] .'"><br>
                </div>
                <div>
                    Nazwa produktu 4: <input type="text" id="nazwa4" name="nazwa4" maxlength="31" value="'. $nazwa[3] .'">   
                    Ilość produktu 4: <input type="number" id="ilosc4" name="ilosc4" min="1" max="9999" value="'. $ilosc[3] .'">   
                    Cena produktu 4: <input type="number" id="cena4" name="cena4" step="0.01" min="0.01" max="2000000" value="'. $cena[3] .'"><br>
                </div>
                <div>
                    Nazwa produktu 5: <input type="text" id="nazwa5" name="nazwa5" maxlength="31" value="'. $nazwa[4] .'">   
                    Ilość produktu 5: <input type="number" id="ilosc5" name="ilosc5" min="1" max="9999" value="'. $ilosc[4] .'">   
                    Cena produktu 5: <input type="number" id="cena5" name="cena5" step="0.01" min="0.01" max="2000000" value="'. $cena[4] .'"><br>
                </div>
                <div>
                    Nazwa produktu 6: <input type="text" id="nazwa6" name="nazwa6" maxlength="31" value="'. $nazwa[5] .'">   
                    Ilość produktu 6: <input type="number" id="ilosc6" name="ilosc6" min="1" max="9999" value="'. $ilosc[5] .'">   
                    Cena produktu 6: <input type="number" id="cena6" name="cena6" step="0.01" min="0.01" max="2000000" value="'. $cena[5] .'"><br>
                </div>
            </div>
            <div id="przycisk">
                <input id="przeslijFormularz" type="submit">
            </div>        
        </form>
            <button id="czyszczenieFormularza" onclick=\' location.href="czyszczenieFormularza.php"; \'>Wyczyść formularz</button>
        </div>
        <div id="naglowek"><div id="napisGora" style="font-size:12px">Made by Jan B ©</div></div>
    </div>
</body></html>';
}
?>
