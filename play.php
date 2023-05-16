<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (count($_POST["ime"]) >= 3 && count($_POST["priimek"]) >= 3) {
        $_SESSION["uporabniki"] = array();
        for ($i = 0; $i < 3; $i++) {
            $uporabnik = array(
                "ime" => $_POST["ime"][$i],
                "priimek" => $_POST["priimek"][$i]
            );
            $_SESSION["uporabniki"][] = $uporabnik;
        }
    }
}

if (!isset($_SESSION["uporabniki"])) {
    header("Location: index.php");
    exit();
}

$kocke = array();
$rezultati = array();
foreach ($_SESSION["uporabniki"] as $uporabnik) {
    $stevila = array();
    $sestevek = 0;
    for ($i = 0; $i < 3; $i++) {
                $stevilo = rand(1, 6);
        $stevila[] = $stevilo;
        $sestevek += $stevilo;
    }
    $kocke[] = $stevila;
    $rezultati[] = $sestevek;
}

$zmagovalci = array();
$najvecji_rezultat = max($rezultati);
foreach ($_SESSION["uporabniki"] as $indeks => $uporabnik) {
    if ($rezultati[$indeks] == $najvecji_rezultat) {
        $zmagovalci[] = $uporabnik["ime"] . " " . $uporabnik["priimek"];
    }
}

header("Refresh: 10; URL=index.php");
?>

<!DOCTYPE html>
<html>
<head>
    <title>IGRALNE KOCKE - REZULTATI</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            background-image: url("images/casino_background.jpg");
            background-size: cover;
        }
        .dice-animation {
            width: 100px;
            height: 100px;
            background-image: url("images/dice-anim.gif");
            background-size: cover;
            display: inline-block;
            animation: diceRoll 1s steps(6) infinite;
        }
        @keyframes diceRoll {
            from { background-position: 0 0; }
            to { background-position: -600px 0; }
        }
        .dice-img {
            width: 50px;
            height: 50px;
        }
    </style>
</head>
<body>
    <h1>Igralne kocke - Rezultati</h1>
    <table>
        <tr>
            <th>Ime</th>
            <th>Priimek</th>
            <th>Kocke</th>
            <th>Skupni rezultat</th>
        </tr>
        <?php foreach ($_SESSION["uporabniki"] as $indeks => $uporabnik): ?>
        <tr>
            <td><?php echo $uporabnik["ime"]; ?></td>
            <td><?php echo $uporabnik["priimek"]; ?></td>
            <td>
                <?php foreach ($kocke[$indeks] as $stevilo): ?>
                    <img class="dice-img" src="http://193.2.139.22/dice/dice<?php echo $stevilo; ?>.gif" alt="dice<?php echo $stevilo; ?>">
                <?php endforeach; ?>
            </td>
            <td><?php echo $rezultati[$indeks]; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>

    <h2>Zmagovalec je:</h2>
    <?php if (count($zmagovalci) > 0): ?>
        <p><?php echo implode(", ", $zmagovalci); ?></p>
    <?php else: ?>
        <p>Ni zmagovalca.</p>
    <?php endif; ?>

    <p>Preusmerjanje nazaj na začetno stran...</p>

    <script>
        setTimeout(function() {
            window.location.href = "index.php";
        }, 10000);
    </script>
</body>
</html>

