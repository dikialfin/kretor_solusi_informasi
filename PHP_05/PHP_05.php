<?php

function drawMatrix(int $matrix)
{
    for ($row = 1; $row <= $matrix; $row++) {
        $result = "";
        for ($column = 1; $column <= $matrix; $column++) {
            if ($column == ($matrix - $row + 1)) {
                $result .= $column;
            } else {
                $result .= "*";
            }
        }

        echo $result .= "<br>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP_05</title>
</head>

<body>
    <form action="" method="post">
        <input type="text" name="matrix">
        <button type="submit">Send</button>
        <br>
        <?php
        if (isset($_POST['matrix']) && !empty($_POST['matrix'])) {
            drawMatrix($_POST['matrix']);
        }
        ?>
    </form>
</body>

</html>