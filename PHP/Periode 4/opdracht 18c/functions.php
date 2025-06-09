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
// referentie vorige website







function printData()
{
    $conn = dbSelect('statistiekensysteem');
    $sqlQuery = "SELECT * FROM bezoekers";
    $stmt = $conn->prepare($sqlQuery);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo "<table>";
    foreach ($results as $result) {
        echo "
        <tr>
            <td>{$result['land']}</td>
            <td>{$result['ip_adres']}</td>
            <td>{$result['provider']}</td>
            <td>{$result['browser']}</td>
            <td>{$result['datum_tijd']}</td>
            <td>{$result['referer']}</td>
        </tr>
        ";
    }
}


/* SERVER is what the browser tells you now. SESSION is what you remember for later.
Therefore, we will use the Server now, because each user's visit is unique.
 We will only use session if the information we need is required server side later.*/


function userVisit()
{
   
        // save visitor's data to variables: 

        if (isset($_SESSION['HTTP_REFERER'])) {
            $previous_website = $_SESSION['HTTP_REFERER'];
        } else {
            $previous_website = '$SERVER[HTTP_REFERER]';
        }
        // save current website as HTTP_REFERER
        $_SESSION['HTTP_REFERER'] = $_SERVER['REQUEST_URI'];


        $uri = basename($previous_website);


        // country
        $land = $_SERVER['HTTP_ACCEPT_LANGUAGE'];


        // ip-adres
        $ipadres = $_SERVER['REMOTE_ADDR'];
        // provider
        $provider = $_SERVER['HTTP_HOST'];


        // huidige browser
        $browser = $_SERVER['HTTP_USER_AGENT'];


        // huidige datum met tijd
        $datum_tijd = date('Y-m-d H:i:s');

        // make the sql +1 insert with current date and time and other data

        $conn = dbSelect('statistiekensysteem');
        $sqlQuery = "INSERT INTO bezoekers (land, ip_adres, provider, browser, datum_tijd, referer) 
        VALUES (:land, :ip_adres, :provider, :browser, :datum_tijd, :referer)";
        // convert full link to just the url

        $statement = $conn->prepare($sqlQuery);
        $statement->bindValue(':land', $land);
        $statement->bindValue(':ip_adres', $ipadres);
        $statement->bindValue(':provider', $provider);
        $statement->bindValue(':browser', $browser);
        $statement->bindValue(':datum_tijd', $datum_tijd);
        $statement->bindValue(':referer', $uri);
        $statement->execute();
        $visit = true;
            $_SESSION['has_visited'] = $visit;
    }
            


