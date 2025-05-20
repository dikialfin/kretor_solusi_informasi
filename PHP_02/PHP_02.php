<?php

    function stringReverse(string $string): string {
        $result = "";

        for ($index=strlen($string)-1; $index >= 1; $index--) { 
           $result .= $string[$index];
        }

        return $result;
    }

    function isValid(string $username, string $password): bool {
        if (
            (stringReverse($username) == stringReverse("kreators")) &&
            (stringReverse($password) == stringReverse("kreators")) 
        ) {
            return true;
        }
        return false;
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP_02</title>
</head>

<body>
    <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['username']) && !empty($_POST['password'])) : ?>
        <?php if(!isValid($_POST['username'],$_POST['password'])) :?>
            <b>USERNAME/PASSWORD salah</b>
            <?php else :?>
                <b>Welcome <?= $_POST['username']?></b>
        <?php endif;?>

    <?php endif; ?>
    <form action="" method="post">
        <table>
            <tr>
                <td>
                    <label for="username">Username</label>
                </td>
                <td>
                    <input type="text" name="username" id="username">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="password">Password</label>
                </td>
                <td>
                    <input type="password" name="password" id="password">
                </td>
            </tr>
            <tr>
                <td></td>
                <td><button type="submit">Submit</button></td>
            </tr>
        </table>
    </form>
</body>

</html>