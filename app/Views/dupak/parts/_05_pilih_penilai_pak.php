<?php if (in_groups('koordinator')) : ?>
  <div class="row mb-2">
    <div class="col">
      <button type="button" class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#modal-pilih-penilai"><i class="fas fa-fw fa-plus"></i> Tambah Penilai</button>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-6 col-md-12">
      <table class="table table-sm">
        <thead>
          <tr>
            <th>Nama</th>
            <th>Sebagai</th>
            <th class="text-center">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php if ($penilai) : ?>
            <?php foreach ($penilai as $p) : ?>
              <tr>
                <td><?= $p->nama; ?></td>
                <td><?= $p->sebagai; ?></td>
                <td class="text-center">
                  <form action="<?= route_to('delete_penilai', $p->id); ?>" method="post">
                    <?= csrf_field(); ?>
                    <button type="submit" class="btn btn-xs btn-outline-danger"><i class="fas fa-times"></i></button>
                  </form>
                </td>
              </tr>
            <?php endforeach ?>
          <?php else : ?>
            <tr>
              <td colspan="2" class="text-center"> -- Belum ada Penilai PAK --</td>
            </tr>
          <?php endif ?>
        </tbody>
      </table>
    </div>
  </div>

  <hr>
<?php endif ?>