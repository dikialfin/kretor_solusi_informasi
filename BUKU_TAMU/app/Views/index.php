<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap demo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>

<body>

  <div class="container px-5 py-5">
    <?= form_open('/') ?>
    <div class="row d-flex justify-content-center">
      <div class="col-lg-4">
        <?php if($session->getFlashdata('success')) :?>
          <div class="alert alert-success" role="alert">
            <?= $session->getFlashdata('success');?>
          </div>
        <?php endif;?>
        <?php if($session->getFlashdata('failed')) :?>
          <div class="alert alert-danger" role="alert">
            <?= $session->getFlashdata('failed');?>
          </div>
        <?php endif;?>
        <div class="input-group mb-3">
          <span class="input-group-text" id="nama">Nama</span>
          <input type="text" class="form-control <?= validation_show_error('nama') ? 'is-invalid' : '' ?> " placeholder="Nama" aria-label="Nama" aria-describedby="nama" name="nama">
          <?php if (validation_show_error('nama')) : ?>
            <div class="invalid-feedback">
              <?= validation_show_error('nama'); ?>
            </div>
          <?php endif; ?>
        </div>
        <div class="input-group mb-3">
          <span class="input-group-text" id="email">Email</span>
          <input type="text" class="form-control <?= validation_show_error('email') ? 'is-invalid' : '' ?> " placeholder="Email" aria-label="Email" aria-describedby="email" name="email">
          <?php if (validation_show_error('email')) : ?>
            <div class="invalid-feedback">
              <?= validation_show_error('email'); ?>
            </div>
          <?php endif; ?>
        </div>
        <div class="form-floating">
          <textarea class="form-control <?= validation_show_error('pesan') ? 'is-invalid' : '' ?>" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" name="pesan"></textarea>
          <label for="floatingTextarea2">Pesan</label>
          <?php if (validation_show_error('pesan')) : ?>
            <div class="invalid-feedback">
              <?= validation_show_error('pesan'); ?>
            </div>
          <?php endif; ?>
        </div>
        <button type="submit" class="btn btn-success mt-3 float-end">Save</button>
      </div>
    </div>
    <?= form_close() ?>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>

</html>