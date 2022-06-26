<form class="form-horizontal" action="<?= route_to('dupak_store'); ?>" method="POST">
  <?= csrf_field(); ?>

  <div class="form-group row">
    <label for="masa_penilaian" class="col-md-2 col-form-label text-right">Masa Penilaian</label>
    <div class="col-lg-4 col-md-10 d-flex align-items-center">
      <input type="date" name="masa_awal" class="form-control " required>
      <span class="mx-4">s.d</span>
      <input type="date" name="masa_akhir" class="form-control" required>
    </div>
  </div>

  <hr>

  <div class="form-group row">
    <label for="nama" class="col-lg-2 col-form-label text-right">Nama</label>
    <div class="col-lg-6 col-sm-10 ">
      <input type="hidden" name="id_sdm" value="<?= $sdm->id_sdm; ?>">
      <!-- <input type="text" class="form-control" name="nama" id="nama" value="<?= $sdm->nama; ?>" required> -->
      <input type="text" class="form-control" name="nama" id="nama" value="<?= trim(trim($info->gelar_depan) . ' ' . trim(ucwords(strtolower($sdm->nama))) . ', ' . trim($info->gelar_belakang)) ?>" required>
    </div>
  </div>

  <div class="form-group row">
    <label for="tempat_lahir" class="col-lg-2 col-form-label text-right">Tempat Lahir</label>
    <div class="col-lg-2 col-md-4">
      <input type="text" id="tempat_lahir" name="tempat_lahir" class="form-control" value="<?= $sdm->tempat_lahir; ?>" required>
    </div>
    <label for="tanggal_lahir" class="col-lg-2 col-form-label text-right">Tanggal Lahir</label>
    <div class="col-lg-2 col-md-4">
      <input type="date" id="tanggal_lahir" class="form-control" name="tanggal_lahir" value="<?= $sdm->tanggal_lahir; ?>" required>
    </div>
  </div>

  <div class="form-group row">
    <label for="jenis_kelamin" class="col-lg-2 col-form-label text-right">Jenis Kelamin</label>
    <div class="col-lg-2 col-md-4">
      <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
        <option value="L" <?= $sdm->jenis_kelamin == 'L' ? 'selected' : '' ?>>Laki-laki</option>
        <option value="P" <?= $sdm->jenis_kelamin == 'P' ? 'selected' : '' ?>>Perempuan</option>
      </select>
      <!-- <input type="text" id="jenis_kelamin" class="form-control" name="jenis_kelamin" value="<?= $sdm->jenis_kelamin; ?>" required> -->
    </div>
  </div>

  <div class="form-group row">
    <label for="nip" class="col-lg-2 col-form-label text-right">NIP</label>
    <div class="col-lg-3">
      <input type="text" class="form-control" name="nip" id="nip" value="<?= $sdm->nip; ?>" required>
    </div>
    <label for="nidn" class="col-lg-1 col-form-label text-right">NIDN</label>
    <div class="col-lg-3">
      <input type="text" class="form-control" name="nidn" id="nidn" value="<?= $sdm->nidn; ?>" required>
    </div>
  </div>

  <div class="form-group row">
    <label for="no_karpeg" class="col-lg-2 col-form-label text-right">Nomor Seri KARPEG</label>
    <div class="col-sm-4">
      <input type="text" name="no_karpeg" id="no_karpeg" class="form-control" value="-">
    </div>
  </div>

  <div class="form-group row">
    <label for="fakultas" class="col-lg-2 col-form-label text-right">Fakultas</label>
    <div class="col-sm-4">
      <input type="text" name="fakultas" id="fakultas" class="form-control" value="<?= $info->fakultas ?? '' ?>">
    </div>
  </div>
  <div class="form-group row">
    <label for="unit_kerja" class="col-lg-2 col-form-label text-right">Program Studi</label>
    <div class="col-sm-4">
      <input type="text" name="unit_kerja" id="unit_kerja" class="form-control" value="<?= $penugasan->jenjang_pendidikan . ' ' . $penugasan->unit_kerja  ?>">
    </div>
  </div>


  <div class="form-group row">
    <label for="pendidikan_terakhir" class="col-lg-2 col-form-label text-right">Pendidikan Terakhir</label>
    <div class="col-lg-4 col-md-10">
      <input type="text" id="pendidikan_terakhir" class="form-control" name="pendidikan_terakhir" value="<?= $pendidikan->jenjang_pendidikan . ' ' . $pendidikan->bidang_studi ?>" required>
    </div>
  </div>

  <hr>

  <div class="form-group row">
    <label for="gol" class="col-lg-2 col-form-label text-right">Golongan</label>
    <div class="col-lg-2 col-md-4">
      <input type="text" id="gol" name="gol" class="form-control" value="<?= (isset($kepangkatan->pangkat_golongan) ? $kepangkatan->pangkat_golongan : ''); ?>" required>
    </div>
    <label for="tmt_gol" class="col-lg-2 col-form-label text-right">TMT </label>
    <div class="col-lg-2">
      <input type="date" class="form-control" name="tmt_gol" value="<?= (isset($kepangkatan->tanggal_mulai)) ? $kepangkatan->tanggal_mulai : ''; ?>" required>
    </div>
  </div>






  <div class="form-group row">
    <label for="jab_fung" class="col-lg-2 col-form-label text-right">Jabatan Fungsional</label>
    <div class="col-lg-3">
      <input type="text" name="jab_fung" id="jab_fung" class="form-control" value="<?= (isset($sdm->jabatan_fungsional)) ? $sdm->jabatan_fungsional : ''; ?>" required>
    </div>
    <label for="tmt_jab_fung" class="col-lg-1 col-form-label text-right">TMT </label>
    <div class="col-lg-2">
      <input type="date" class="form-control" name="tmt_jab_fung" value="<?= (isset($sdm->tmt_jabfung)) ? $sdm->tmt_jabfung : ''; ?>" required>
    </div>
  </div>

  <div class="form-group row">
    <label class="col-lg-2 col-form-label text-right">Masa Kerja Golongan Lama</label>

    <div class="col-sm-1">
      <input type="number" id="mk_lama_thn" name="mk_lama_thn" class="form-control" value="" required>
    </div>
    <label for="mk_lama_thn" class="col-form-label text-right">Tahun</label>

    <div class="col-sm-1">
      <input type="number" id="mk_lama_bln" name="mk_lama_bln" class="form-control" value="" required>
    </div>
    <label for="mk_lama_bln" class="col-form-label text-right">Bulan</label>
  </div>

  <div class="form-group row">
    <label for="inputEmail3" class="col-lg-2 col-form-label text-right">Masa Kerja Golongan Baru</label>

    <div class="col-sm-1">
      <input type="number" id="mk_baru_thn" name="mk_baru_thn" class="form-control" value="" required>
    </div>
    <label for="mk_baru_thn" class="col-form-label text-right">Tahun</label>

    <div class="col-sm-1">
      <input type="number" id="mk_baru_bln" name="mk_baru_bln" class="form-control" value="" required>
    </div>
    <label for="mk_baru_bln" class="col-form-label text-right">Bulan</label>
  </div>

  <hr>

  <div class="form-group row">
    <label for="mata_kuliah" class="col-lg-2 col-form-label text-right">Dalam Mata Kuliah</label>
    <div class="col-lg-6 col-sm-10 ">
      <input type="text" class="form-control" name="mata_kuliah" id="mata_kuliah" value="" required>
    </div>
  </div>

  <hr>
  <div class="form-group row">
    <div class="col offset-lg-2">
      <button type="submit" class="btn btn-success"><i class="fas fa-fw fa-save"></i> Simpan</button>
    </div>
  </div>

</form>