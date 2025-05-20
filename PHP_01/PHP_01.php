<?php

function validate(array $array): array
{
    $result = [];
    if (empty($array['nama'])) {
        array_push($result, [
            "field" => 'nama',
            "message" => 'nama tidak boleh kosong'
        ]);
    }
    if (!ctype_alpha($array['nama']) && !empty($array['nama'])) {
        array_push($result, [
            "field" => 'nama',
            "message" => 'nama hanya boleh berisi huruf'
        ]);
    }

    if (empty($array['alamat'])) {
        array_push($result, [
            "field" => 'alamat',
            "message" => 'alamat tidak boleh kosong'
        ]);
    }

    if (empty($array['no_telepon'])) {
        array_push($result, [
            "field" => 'no_telepon',
            "message" => 'no telepon tidak boleh kosong'
        ]);
    }
    if (!ctype_digit($array['no_telepon']) && !empty($array['no_telepon'])) {
        array_push($result, [
            "field" => 'no_telepon',
            "message" => 'no telepon hanya boleh berisi huruf'
        ]);
    }

    if (empty($array['jenis_kelamin'])) {
        array_push($result, [
            "field" => 'jenis_kelamin',
            "message" => 'jenis kelamin tidak boleh kosong'
        ]);
    }

    return $result;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP_01</title>
</head>

<body>
    <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && count(validate($_POST))) : ?>
        <ul>
            <?php foreach (validate($_POST) as $error) : ?>
                <li>
                    <?= $error['message']?>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
    <form action="" method="post">
        <table>
            <tr>
                <td>
                    <label for="nama">Nama</label>
                </td>
                <td>
                    <input type="text" name="nama" id="nama">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="alamat">Alamat</label>
                </td>
                <td>
                    <input type="text" name="alamat" id="alamat">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="no_telepon">No Telepon</label>
                </td>
                <td>
                    <input type="text" name="no_telepon" id="no_telepon">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                </td>
                <td>
                    <select id="jenis_kelamin" name="jenis_kelamin">
                        <option value="">-- Pilih Jenis Kelamin --</option>
                        <option value="laki-laki">Laki-laki</option>
                        <option value="perempuan">Perempuan</option>
                    </select>
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