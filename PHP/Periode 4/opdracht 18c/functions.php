<?php
function dbSelect($database = 'default')
{
    require 'profile.php';
    // stel $db in zodat we de juiste database kunnen gebruiken 

    $dsn = "mysql:host=$host;dbname={$database}";


    // Maak verbinding met database
    try {
        $conn = new PDO($dsn, $username, $password, $options);
        return $conn;
    } catch (PDOException $e) {
        die("Connection failed: " . $e->getMessage());
    }
}

session_start();
  /* Casus 3: Statistiekensysteem
Maak casus 3 het statistiekensysteem van paragraaf 10.2 Casussen

Doelstelling: Ontwikkel een statistiekensysteem waarbij de gegevens van bezoekers worden opgeslagen in een database en de beheerder deze gegevens kan filteren op maand en land.

Video-instructie case  3 statistiekensysteem en imagemap voor het project Escape room:
Les - PROGR1 JLSVSOD1C,JLSVSOD1B,JLSVSOD1A Programmeren 1-20250605_105943-Opname van vergadering.mp4
Koppelingen naar een externe site.

Vereiste gegevens:

    Land (het land mag verzonnen worden)
    IP-adres (dit mag het lokale adres zijn of verzonnen worden. Om het lokale ipadres te achterhalen gebruik je:
    $ipadres = gethostbyname(gethostname());
    Provider
    Browser
    Datum/tijd van het bezoek
    Website waarvandaan de bezoeker is gekomen

Functionaliteiten:

    Opslag van de bezoekersgegevens in een database.
    Filteroptie voor de beheerder om gegevens op maand en land te filteren.
    Minimaal 100 records in de database.

Stappenplan

    Database Ontwerp
        Maak een database genaamd statistiekensysteem.
        Maak een tabel genaamd bezoekers met de volgende velden:
            id (int, primary key, auto-increment)
            land (varchar(100))
            ip_adres (varchar(45))
            provider (varchar(100))
            browser (varchar(100))
            datum_tijd (datetime)
            referer (varchar(255))
            (Done)
 */

 // spam is gebruikt bij http_referer dus we gebruiken met sessies (session[HTTP_REFERER])
// $ipadres = gethostbyname(gethostname()); doen we niet. Is server IP, niet die van de gebruiker

if(!isset($_SESSION['HTTP_REFERER'])) {
    $previous_website = "./exampleuwu.php";
} else {
    $previous_website = $_SESSION['HTTP_REFERER'];
}

$ipadres = $_SERVER['REMOTE_ADDR'];
// provider
$provider = $_SERVER['HTTP_HOST'];
// huidie browser
$browser = $_SERVER['HTTP_USER_AGENT'];

// referentie vorige website

// huidige datum met tijd
$datum_tijd = date('Y-m-d H:i:s');

var_dump($ipadres);
var_dump($provider);
var_dump($browser);
var_dump($datum_tijd);
var_dump($previous_website);







?>




