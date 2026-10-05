<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Moje pliki</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php

echo "<h1>MOJE PLIKI</h1>";

echo "Aktualny katalog: ";
echo getcwd();

echo "<h2>ZAWARTOŚĆ KATALOGU</h2>";

$pliki = scandir("dokumenty");
echo "<table>";
echo "<tr>";
echo "<th>Nazwa</th>";
echo "<th>Typ</th>";
echo "</tr>";

foreach($pliki as $plik)
{
    if($plik != "." && $plik != "..")
    {
        echo "<tr>";

        echo "<td>";
        echo $plik;
        echo "</td>";

        echo "<td>";

        if(is_file("dokumenty/" . $plik))
        {
            echo "PLIK";
        }

        if(is_dir("dokumenty/" . $plik))
        {
            echo "KATALOG";
        }

        echo "</td>";

        echo "</tr>";
    }
}
echo "</table>";
if(isset($_POST["utworz"]))
{
    $nazwa = $_POST["nazwa"];

    if(file_exists("dokumenty/" . $nazwa))
    {
        echo "Taki katalog już istnieje!";
    }
    else
    {
        mkdir("dokumenty/" . $nazwa);
        echo "Katalog został utworzony!";
    }
}
?>
<h2>UTWÓRZ KATALOG</h2>
<form action="index.php" method="POST">

    <label>Nazwa katalogu:</label>
    <input type="text" name="nazwa">

    <input type="submit" name="utworz" value="Utwórz">

</form>

</body>
</html>
