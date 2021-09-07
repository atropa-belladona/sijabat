<?php if (in_groups('dosen') or in_groups('operator')) : ?>
  <div class="button-actions d-flex py-2">
    <button type="button" class="btn btn-sm btn-primary mr-4"><i class="fas fa-fw fa-plus"></i> Tambah Kegiatan Pendidikan</button>
    <button type="button" class="btn btn-sm btn-secondary mr-4"><i class="fas fa-fw fa-plus"></i> Tambah Kegiatan Pelaksanaan Pendidikan</button>
    <button type="button" class="btn btn-sm btn-info mr-4"><i class="fas fa-fw fa-plus"></i> Tambah Kegiatan Pelaksanaan Penelitian</button>
    <button type="button" class="btn btn-sm btn-warning mr-4"><i class="fas fa-fw fa-plus"></i> Tambah Kegiatan Pelaksanaan Pengabdian</button>
    <button type="button" class="btn btn-sm btn-success mr-4"><i class="fas fa-fw fa-plus"></i> Tambah Kegiatan Penunjang</button>
  </div>
<?php endif ?>

<hr>

<div class="kegiatan py-2">
  <table class="table table-sm table-success datatable" style="width: 100%;">
    <thead class="bg-dark text-white">
      <tr>
        <th>No.</th>
        <th>Jenis Kegiatan</th>
        <th>Nama Kegiatan</th>
        <th>Volume Kegiatan</th>
        <th>Satuan Hasil</th>
        <th>Angka Kredit</th>
      </tr>
    </thead>
    <tbody>

    </tbody>
    <tfoot class="bg-dark text-white font-weight-bold">
      <tr>
        <td class="text-center" colspan="5">Total Usulan Angka Kredit</td>
        <td></td>
      </tr>
    </tfoot>
  </table>
</div>