<?= $this->extend('users/layout'); ?>

<?= $this->section('breadcrumbs'); ?>
<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="<?= route_to('home'); ?>">Home</a></li>
  <li class="breadcrumb-item"><a href="<?= route_to('user_list'); ?>">Daftar Pengguna</a></li>
  <li class="breadcrumb-item active"><a href="<?= route_to('user_list'); ?>"></a> Buat Baru</li>
</ol>
<?= $this->endSection() ?>

<?= $this->section('content'); ?>
<div class="content">

  <form id="tambah-pengguna" class="form" method="POST" action="<?= route_to('user_store'); ?>">
    <?= csrf_field(); ?>

    <div class="form-group row">
      <label for="nama" class="form-control-label col-md-2 text-right text-bold"><sup class="text-danger">*</sup>Nama</label>
      <div class="col-md-6">
        <input type="text" id="nama" class="form-control form-control-sm <?= (session('errors.nama')) ? 'is-invalid' : ''; ?>" name="nama" value="<?= old('nama') ?>">
        <div class="invalid-feedback">
          <?= session('errors.nama') ?>
        </div>
      </div>
    </div>

    <div class="form-group row">
      <label for="nip" class="form-control-label col-md-2 text-right text-bold">NIP</label>
      <div class="col-md-3">
        <input type="text" id="nip" maxlength="18" class="form-control form-control-sm <?= (session('errors.nip')) ? 'is-invalid' : ''; ?>" name="nip" maxlength="18" value="<?= old('nip') ?>">
        <div class="invalid-feedback">
          <?= session('errors.nip') ?>
        </div>
      </div>
    </div>

    <div class="form-group row">
      <label for="email" class="form-control-label col-md-2 text-right text-bold">Email</label>
      <div class="col-md-6">
        <input type="text" id="email" class="form-control form-control-sm <?= (session('errors.email')) ? 'is-invalid' : ''; ?>" name="email" value="<?= old('email') ?>">
        <div class="invalid-feedback">
          <?= session('errors.email') ?>
        </div>
      </div>
    </div>
    <div class="form-group row">
      <label for="username" class="form-control-label col-md-2 text-right text-bold"><sup class="text-danger">*</sup>Username</label>
      <div class="col-md-4">
        <input type="text" id="username" class="form-control form-control-sm <?= (session('errors.username')) ? 'is-invalid' : ''; ?>" name="username" value="<?= old('username') ?>">
        <div class="invalid-feedback">
          <?= session('errors.username') ?>
        </div>
      </div>
    </div>
    <div class="form-group row">
      <label for="password1" class="form-control-label col-md-2 text-right text-bold"><sup class="text-danger">*</sup>Password</label>
      <div class="col-md-3">
        <input type="password" id="password1" class="form-control form-control-sm <?= (session('errors.password1')) ? 'is-invalid' : ''; ?>" name="password1" value="">
        <div class="invalid-feedback">
          <?= session('errors.password1') ?>
        </div>
      </div>
      <label for="password2" class="form-control-label col-md-2 text-right text-bold"><sup class="text-danger">*</sup>Ketik Ulang Password</label>
      <div class="col-md-3">
        <input type="password" id="password2" class="form-control form-control-sm <?= (session('errors.password2')) ? 'is-invalid' : ''; ?>" name="password2" value="">
        <div class="invalid-feedback">
          <?= session('errors.password2') ?>
        </div>
      </div>
    </div>

    <div class="form-group row">
      <label for="role" class="form-control-label col-md-2 text-right text-bold"><sup class="text-danger">*</sup>Role</label>
      <div class="col-md-4">
        <select name="role" id="role" class="form-control form-control-sm selectpicker show-tick <?= (session('errors.role')) ? 'is-invalid' : ''; ?>" data-size="10" data-live-search="true">
          <option value="">Pilih Role...</option>
          <?php foreach ($roles as $role) : ?>
            <option value="<?= $role->name; ?>" <?= (old('role') == $role->name) ? 'selected' : ''; ?> data-subtext="<?= ' (' . $role->description . ')'; ?>"><?= ucfirst($role->name); ?></option>
          <?php endforeach ?>
        </select>
        <div class="invalid-feedback">
          <?= session('errors.role') ?>
        </div>
      </div>
    </div>

    <div class="form-group row fakultas" style="display: none;">
      <label for="role" class="form-control-label col-md-2 text-right text-bold"><sup class="text-danger">*</sup>Fakultas</label>
      <div class="col-md-4">
        <select name="fakultas" id="fakultas" class="form-control form-control-sm selectpicker show-tick <?= (session('errors.fakultas')) ? 'is-invalid' : ''; ?>" data-size="10" data-live-search="true">
          <option value="">Pilih Fakultas...</option>
          <?php foreach ($fakultas as $fak) : ?>
            <option value="<?= $fak->id; ?>" <?= (old('fakultas') == $fak->id) ? 'selected' : ''; ?>><?= ucfirst($fak->nama); ?></option>
          <?php endforeach ?>
        </select>
        <div class="invalid-feedback">
          <?= session('errors.fakultas') ?>
        </div>
      </div>
    </div>

    <hr>
    <div class="form-group row">
      <div class="offset-2 col">
        <button type="submit" class="btn btn-sm bg-gradient-success"><i class="fas fa-fw fa-save"></i> Simpan</button>
      </div>
    </div>
  </form>
</div>
<?= $this->endSection(); ?>

<!-- Script Section -->
<?= $this->section('script'); ?>
<script>
  $(function() {
    if ($('#role').val() == 'verifikator' || $('#role').val() == 'operator') {
      $('.fakultas').show();
    }

  });

  $('#role').on('change', function() {
    var role = $(this).val();

    if (role == 'verifikator' || role == 'operator') {
      $('.fakultas').show();

    } else {
      $('#fakultas').val('');
      $('.fakultas').hide();
    }

  });
</script>
<?= $this->endSection(); ?>