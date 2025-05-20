<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

    <div class="container px-5 py-5">
        <?php if($session->getFlashdata('failed')) :?>
          <div class="alert alert-danger" role="alert">
            <?= $session->getFlashdata('failed');?>
          </div>
        <?php endif;?>
        <div class="row">
            <div class="col-lg-3">
                <?= form_open('/admin', 'method="get"'); ?>
                <div class="input-group mb-3">
                    <input type="date" class="form-control" placeholder="Filter By Date" aria-label="Filter By Date" aria-describedby="button-addon2" name="filter">
                    <button class="btn btn-primary" type="submit" id="button-addon2">Filter</button>
                </div>
                <?= form_close(); ?>
            </div>

            <div class="col-lg-9">
                <?= form_open('/csv', 'class="float-end"'); ?>
                    <input type="hidden" name="filter" value="<?= $filter;?>">
                    <button class="btn btn-primary" type="submit" id="button-addon2"><i class="fa fa-download"></i> .csv</span></button>
                <?= form_close(); ?>
            </div>
        </div>

        <table class="table table-striped-columns table-responsive table-bordered text-center">
            <tr>
                <th class="col-1">NO.</th>
                <th class="col-2">Nama</th>
                <th class="col-2">Email</th>
                <th class="col-6">Pesan</th>
            </tr>
            <?php if (count($data) > 0) : ?>
                <?php $no = 0; ?>
                <?php foreach ($data as $tamu) : ?>
                    <tr>
                        <td><?= $no += 1; ?></td>
                        <td><?= $tamu->nama; ?></td>
                        <td><?= $tamu->email; ?></td>
                        <td><?= $tamu->pesan; ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="4">Data Not Found</td>
                </tr>
            <?php endif; ?>
        </table>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>

</html>