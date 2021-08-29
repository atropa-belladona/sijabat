<?= $this->extend('users/layout'); ?>

<?= $this->section('breadcrumbs'); ?>
<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="<?= route_to('home'); ?>">Home</a></li>
  <li class="breadcrumb-item active">Daftar Pengguna</li>
</ol>
<?= $this->endSection() ?>

<?= $this->section('content'); ?>
<div class="content">
  <div class="row">
    <div class="col mb-2">
      <a href="<?= route_to('user_create'); ?>" class="btn btn-link btn-sm bg-gradient-primary"><i class="fas fa-fw fa-user-plus"></i> Tambah Pengguna</a>
    </div>
  </div>
  <div class="row">
    <div class="col">
      <table class="table table-sm table-success datatable" style="width: 100%;">
        <thead class="bg-gradient-dark text-white">
          <tr>
            <th class="text-center">No.</th>
            <th class="text-left">Nama</th>
            <th class="text-center">Role</th>
            <th class="text-center">Status</th>
            <th class="text-center">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 1 ?>
          <?php foreach ($users as $user) : ?>
            <tr>
              <td class="align-middle text-center"><?= $i++; ?></td>
              <td class="align-middle text-left"><?= $user->name; ?></td>
              <td class="align-middle text-center"><?= ucfirst($user->role_name) . ' ' . $user->fakultas; ?></td>
              <td class="align-middle text-center">
                <?= ($user->active == 1) ? 'aktif' : 'non aktif'; ?>
              </td>
              <td class="align-middle text-center">
                <?php if (in_groups('administrator') and user()->level >= $user->level) : ?>
                  <button type="button" class="btn btn-sm btn-warning"><i class="fas fa-fw fa-edit"></i></button>
                <?php endif ?>
              </td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>