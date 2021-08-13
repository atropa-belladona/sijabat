<?= $this->extend('users/layoutdosen'); ?>

<?= $this->section('breadcrumbs'); ?>
<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="= route_to('home'); ?>">Home</a></li>
  <li class="breadcrumb-item active">Rekap Dosen</li>
</ol>
<?= $this->endSection() ?>

<?= $this->section('content'); ?>
<div class="content">
  <div class="row">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12 ml-3">
            <table>
              <tr style="text-align: center;">
                <td><img src="<?= base_url(); ?>/img/logo-unj.png" width="60"></td>
                <td>&nbsp;&nbsp;&nbsp;</td>
                <td style="font-family: Arial; font-size: 35px;">Daftar Usul Penetapan Angka Kredit (DUPAK)</td>
              </tr>
            </table>
          </div>
        </div>
        <hr>
      </div><!-- /.container-fluid -->
      <div class="card-footer  ">
        <input type="button" class="float-right" value="Halaman sebelumnya" onclick="history.back(-1)" />
      </div>
      <div class="container-fluid">
        <div class="row">
          <div class="col-12 ml-4">

            <div class="card">              
              <div class="card-header bg-info">
                <h1 class="card-title" style="font-size: 35px; font-weight: bold;"><i class="nav-icon fas fa-book mr-1"></i> UNSUR PENILAIAN</h1>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>

              <div class="card-body">
                <div>
                  <h4>
                  <table>
                    <tr>
                      <td><b>NAMA</b></td>
                      <td>&nbsp;:</td>
                      <td>&nbsp;&nbsp;&nbsp;<?= (isset(user()->name) ? user()->name : ''); ?></td>
                    </tr>
                    <tr>
                      <td><b>NIP</b></td>
                      <td>&nbsp;:</td>
                      <td>&nbsp;&nbsp;&nbsp;<?= (isset(user()->nip) ? user()->nip : ''); ?></td>
                    </tr>
                    <tr>
                      <td ><b>INSTANSI</b></td>
                      <td >&nbsp;:</td>
                      <td >&nbsp;&nbsp;&nbsp;Universitas Negeri Jakarta</td>
                    </tr>
                    <tr>
                      <td ><b>MASA PENILAIAN</b></td>
                      <td >&nbsp;:</td>
                      <td >&nbsp;&nbsp;&nbsp;&nbsp;<b>s.d</b>&nbsp;</td>
                    </tr>
                  </table>
                </div>
                <div>
                  <table border="1" bordercolor="#dedcdc" >
                    <tr>
                      <td rowspan="4" style="font-weight: bold; text-align: center; width: 80px; background: #c2c0c0">NO</td>
                      <td colspan="7" style="font-weight: bold; text-align: center; background: #c2c0c0">UNSUR YANG DINILAI</td>
                      <td rowspan="4" style="font-weight: bold; text-align: center; background: #c2c0c0">AKSI</td>
                    </tr>
                    <tr>
                      <td rowspan="3" width="35%" style="font-weight: bold; text-align: center; width: 550px; background: #c2c0c0">UNSUR, SUB UNSUR DAN BUTIR KEGIATAN</td>
                      <td colspan="6" style="font-weight: bold; text-align: center; background: #c2c0c0">ANGKA KREDIT MENURUT</td>
                    </tr>
                    <tr>
                      <td colspan="3" style="font-weight: bold; text-align: center; background: #c2c0c0">INSTANSI PENGUSUL</td>
                      <td colspan="3" style="font-weight: bold; text-align: center; background: #c2c0c0">TIM PENILAI</td>
                    </tr>
                    <tr>
                      <td style="font-weight: bold; text-align: center; background: #c2c0c0">LAMA</td>
                      <td style="font-weight: bold; text-align: center; background: #c2c0c0">BARU</td>
                      <td style="font-weight: bold; font-weight: bold; text-align: center; background: #c2c0c0">JUMLAH</td>
                      <td style="font-weight: bold; text-align: center; background: #c2c0c0">LAMA</td>
                      <td style="font-weight: bold; text-align: center; background: #c2c0c0">BARU</td>
                      <td style="font-weight: bold; text-align: center; background: #c2c0c0">JUMLAH</td>
                    </tr>
                    <tr style="font-weight: bold; background: #999999;">
                      <td style="text-align: center;">1</td>
                      <td style="text-align: center;">2</td>
                      <td style="text-align: center;">3</td>
                      <td style="text-align: center;">4</td>
                      <td style="text-align: center;">5</td>
                      <td style="text-align: center;">6</td>
                      <td style="text-align: center;">7</td>
                      <td style="text-align: center;">8</td>
                      <td style="text-align: center;">9</td>
                    </tr>
                    <tr>
                      <td style="text-align: center; width: 5;"><b>I</b></td>
                      <td style="padding: 10px" colspan="8"><b>PENDIDIKAN</b></td>
                    </tr>
                    <tr>
                      <td style="text-align: center">A</td>
                      <td style="padding: 10px" colspan="8">Pendidikan Formal</td>
                    </tr>
                    <tr>
                      <td></td>
                      <td style="padding: 10px; width: 300px;">1. Doktor (S3)</td>
                      <td style="text-align: center; width: 80px;"></td>
                      <td style="text-align: center; width: 80px;"></td>
                      <td style="text-align: center; width: 80px;"></td>
                      <td style="text-align: center; width: 80px;"></td>
                      <td style="text-align: center; width: 80px;"></td>
                      <td style="text-align: center; width: 80px;"></td>
                      <td style="text-align: center; width: 250px;">
                      </td>
                    </tr>
                    <tr>
                      <td></td>
                      <td style="padding: 10px">2. Magister (S2)</td>
                      <td style="text-align: center;"></td>
                      <td style="text-align: center;"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center; width: 80px;"></td>
                      <td style="text-align: center; width: 80px;"></td>
                      <td style="text-align: center; width: 200px;">
                       </td>
                    </tr>
                    <tr>
                      <td style="text-align: center">B</td>
                      <td style="padding: 10px" colspan="8">Pendidikan dan pelatihan Prajabatan</td>
                    </tr>
                    <tr>
                      <td></td>
                      <td style="padding: 10px; text-align: justify;">Pendidikan dan Pelatihan Jabatan golongan III</td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center;"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center; width: 80px;"></td>
                      <td style="text-align: center; width: 80px;"></td>
                      <td style="text-align: center; width: 200px;">
                       </td>
                    </tr>
                    <strong>
                    <tr style="background: #999999;">
                      <td style="text-align: center"></td>
                      <td style="padding: 10px; text-align: center;"><b>Jumlah Pelaksanaan Pendidikan</b></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center;"><b></b></td>
                      <td style="text-align: center"><b></b></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center; width: 80px;"><b></b></td>
                      <td style="text-align: center; width: 80px;"><b></b></td>
                      <td style="text-align: center; width: 200px;"></td>
                    </tr>
                    </strong>
                    <tr>
                      <td style="text-align: center; width: 5;"><b>II</b></td>
                      <td colspan="8" style="padding: 10px"><b>PELAKSANAAN PENDIDIKAN</b></td>
                    </tr>
                    <tr>
                      <td style="text-align: center;">A</td>
                      <td style="padding: 10px" colspan="8">Pendidikan dan pelatihan Prajabatan</td>
                    </tr>
                    <tr>
                      <td></td>
                      <td style="padding: 10px; text-align: justify;">Melaksanakan perkulihan/tutorial dan membimbing, menguji serta menyelenggarakan pendidikan di laboratorium, praktek keguruan bengkel/studio/kebun percobaan/teknologi pengajaran dan praktek lapangan</td>
                      <td style="text-align: center; font-weight: bold;"></td>
                      <td style="text-align: center;"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center; width: 80px;"></td>
                      <td style="text-align: center; width: 80px;"></td>
                      <td style="text-align: center; width: 200px;">
                       </td>         
                    </tr>
                    <tr>
                      <td style="text-align: center;">B</td>
                      <td style="padding: 10px" colspan="8">Membimbing Seminar</td>
                    </tr>
                    <tr>
                      <td></td>
                      <td style="padding: 10px; text-align: justify;">Membimbing mahasiswa seminar</td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center;"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center; width: 80px;"></td>
                      <td style="text-align: center; width: 80px;"></td>
                      <td style="text-align: center; width: 200px;">
                         </td>
                    </tr>
                    <tr>
                      <td style="text-align: center;">C</td>
                      <td style="padding: 10px" colspan="8">Membing kuliah kerja nyata, pratek kerja nyata, praktek kerja lapangan </td>
                    </tr>
                    <tr>
                      <td></td>
                      <td style="padding: 10px; text-align: justify;">Membimbing mahasiswa kuliah kerja nyata, pratek kerja nyata, praktek kerja lapangan </td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center;"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center; width: 80px;"></td>
                      <td style="text-align: center; width: 80px;"></td>
                      <td style="text-align: center; width: 200px;">

                         </td>
                    </tr>
                    <tr>
                      <td style="text-align: center">D</td>
                      <td style="padding: 10px" colspan="8" >Membimbing dan ikut membimbing dalam menghasilkan disertasi, thesis, skripsi dan laporan akhir studi</td>
                    </tr>
                    <tr>
                      <td></td>
                      <td style="padding: 10px;" colspan="8">1. Penguji (Ketua)</td>
                    </tr>
                    <tr>
                      <td></td>
                      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;a. Disertasi</td>
                      <td style="text-align: center;"></td>
                      <td style="text-align: center;"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center; width: 80px;"></td>
                      <td style="text-align: center; width: 80px;"></td>
                      <td style="text-align: center; width: 200px;">

                         </td>
                    </tr>
                    <tr>
                      
                      <td></td>
                      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;b. Thesis</td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center;"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center; width: 80px;"></td>
                      <td style="text-align: center; width: 80px;"></td>
                      <td style="text-align: center; width: 200px;">
 
                         </td>
                    </tr>
                    <tr>

                      <td></td>
                      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;c. Skripsi</td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center;"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center; width: 80px;"></td>
                      <td style="text-align: center; width: 80px;"></td>
                      <td style="text-align: center; width: 200px;">

                         </td>
                    </tr>
                    <tr>

                      <td></td>
                      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;d. Laporan Akhir</td>
                      <td style="text-align: center;"></td>
                      <td style="text-align: center;"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center; width: 80px;"></td>
                      <td style="text-align: center; width: 80px;"></td>
                      <td style="text-align: center; width: 200px;">

                         </td>
                    </tr>
                    <tr>
                      <td></td>
                      <td style="padding: 10px;" colspan="7">2. Pembimbing Pendaping/Pembantu (Anggota)</td>
                    </tr>
                    <tr>
                      <td></td>
                      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;a. Disertasi</td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center;"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center; width: 80px;"></td>
                      <td style="text-align: center; width: 80px;"></td>
                      <td style="text-align: center; width: 200px;">
                         </td>
                    </tr>
                    <tr>

                      <td></td>
                      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;b. Thesis</td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center;"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center; width: 80px;"></td>
                      <td style="text-align: center; width: 80px;"></td>
                      <td style="text-align: center; width: 200px;">
                        




                         </td>
                    </tr>
                    <tr>

                      <td></td>
                      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;c. Skripsi</td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center;"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center; width: 80px;"></td>
                      <td style="text-align: center; width: 80px;"></td>
                      <td style="text-align: center; width: 200px;">
                        




                         </td>
                    </tr>
                    <tr>

                      <td></td>
                      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;d. Laporan Akhir</td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center;"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center; width: 80px;"></td>
                      <td style="text-align: center; width: 80px;"></td>
                      <td style="text-align: center; width: 200px;">
                        




                         </td>
                    </tr>
                    <tr>
                      <td style="text-align: center">E</td>
                      <td style="padding: 10px" colspan="8">Bertugas sebagai penguji pada ujian akhir (Skripsi)</td>
                    </tr>
                    <tr>

                      <td></td>
                      <td style="padding: 10px">1. Ketua Penguji</td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center;"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center; width: 80px;"></td>
                      <td style="text-align: center; width: 80px;"></td>
                      <td style="text-align: center; width: 200px;">
                        




                         </td>
                    </tr>
                    <tr>

                      <td></td>
                      <td style="padding: 10px">2. Anggota Penguji</td>
                      <td style="text-align: center"></td>                      
                      <td style="text-align: center;"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center; width: 80px;"></td>
                      <td style="text-align: center; width: 80px;"></td>
                      <td style="text-align: center; width: 200px;">
                        




                         </td>
                    </tr>
                    <tr>
                      <td style="text-align: center;">F</td>
                      <td style="padding: 10px" colspan="8">Membina kegiatan mahasiswa</td>
                    </tr>
                    <tr>

                      <td></td>
                      <td style="padding: 10px; text-align: justify;">Melakukan pembinaan kegiatan mahasiswa di bidang Akademik dan kemahasiswaan</td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center;"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center; width: 80px;"></td>
                      <td style="text-align: center; width: 80px;"></td>
                      <td style="text-align: center; width: 200px;">
                        




                         </td>
                    </tr>
                    <tr>
                      <td style="text-align: center;">G</td>
                      <td style="padding: 10px" colspan="8">Mengembangkan program kuliah</td>
                    </tr>
                    <tr>

                      <td></td>
                      <td style="padding: 10px; text-align: justify;">Melakukan kegiatan pengembangan program kuliah</td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center;"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center; width: 80px;"></td>
                      <td style="text-align: center; width: 80px;"></td>
                      <td style="text-align: center; width: 200px;">
                        




                         </td>
                    </tr>
                    <tr>
                      <td style="text-align: center">H</td>
                      <td style="padding: 10px" colspan="8">Bertugas sebagai penguji pada ujian akhir</td>
                    </tr>
                    <tr>

                      <td></td>
                      <td style="padding: 10px">1. Buku Ajar</td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center;"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center; width: 80px;"></td>
                      <td style="text-align: center; width: 80px;"></td>
                      <td style="text-align: center; width: 200px;">
                        




                         </td>
                    </tr>
                    <tr>

                      <td></td>
                      <td style="padding: 10px">2. Diktat, modul, petunjuk praktikum, model, alat bantu, audio visual, <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;naskah tutorial </td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center;"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center; width: 80px;"></td>
                      <td style="text-align: center; width: 80px;"></td>
                      <td style="text-align: center; width: 200px;">
                        




                         </td>
                    </tr>
                    <tr>
                      <td style="text-align: center;">I</td>
                      <td style="padding: 10px">Menyampaikan Orasi Ilmiah</td>
                    </tr>
                    <tr>

                      <td></td>
                      <td style="padding: 10px; text-align: justify;">Melakukan kegiatan orasi ilmiah pada perguruan tinggi tiap tahun</td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center;"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center; width: 80px;"></td>
                      <td style="text-align: center; width: 80px;"></td>
                      <td style="text-align: center; width: 200px;">
                        




                       </td>
                    </tr>
                    <tr>
                      <td style="text-align: center">J</td>
                      <td style="padding: 10px" colspan="8">Menduduki jabatan pimpinan perguruan tinggi</td>
                    </tr>
                    <tr>

                      <td></td>
                      <td style="padding: 10px">1. Rektor</td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center;"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center; width: 80px;"></td>
                      <td style="text-align: center; width: 80px;"></td>
                      <td style="text-align: center; width: 200px;">
                        




                       </td>
                    </tr>
                    <tr>

                      <td></td>
                      <td style="padding: 10px">2. Pembantu rektor/dekan/direktur program pasca sarjana</td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center;"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center; width: 80px;"></td>
                      <td style="text-align: center; width: 80px;"></td>
                      <td style="text-align: center; width: 200px;">
                        




                       </td>
                    </tr>
                    <tr>

                      <td></td>
                      <td style="padding: 10px">3. Ketua sekolah tinggi/pembantu dekan/asisten direktur program pasca <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;sarjana/direktur politeknik</td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center;"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center; width: 80px;"></td>
                      <td style="text-align: center; width: 80px;"></td>
                      <td style="text-align: center; width: 200px;">
                        




                       </td>
                    </tr>
                    <tr>

                      <td></td>
                      <td style="padding: 10px">4. Pembantu ketua sekolah tinggi/pembantu direktur politeknik</td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center;"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center; width: 80px;"></td>
                      <td style="text-align: center; width: 80px;"></td>
                      <td style="text-align: center; width: 200px;">
                        





                       </td>
                    </tr>
                    <tr>

                      <td></td>
                      <td style="padding: 10px">5. Direktur Akademi</td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center;"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center; width: 80px;"></td>
                      <td style="text-align: center; width: 80px;"></td>
                      <td style="text-align: center; width: 200px;">
                        




                       </td>
                    </tr>
                    <tr>

                      <td></td>
                      <td style="padding: 10px">6. Pembantu direktur akademi/ketua jurusan/bagian pada Universitas/institut<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/sekolah tinggi</td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center;"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center; width: 80px;"></td>
                      <td style="text-align: center; width: 80px;"></td>
                      <td style="text-align: center; width: 200px;">
                        




                       </td>
                    </tr>
                    <tr>

                      <td></td>
                      <td style="padding: 10px">7. Ketua jurusan pada politeknik/akademi/sekretaris jurusan/bagian pada <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;universitas/institut/sekolah tinggi</td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center;"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center; width: 80px;"></td>
                      <td style="text-align: center; width: 80px;"></td>
                      <td style="text-align: center; width: 200px;">
                        




                         </td>
                    </tr>
                    <tr>

                      <td></td>
                      <td style="padding: 10px">8. Sekretaris jurusan pada politeknik/akademik dan kepala laboratorium <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;universitas/institut/sekolah tinggi/politeknik/akademi</td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center;"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center; width: 80px;"></td>
                      <td style="text-align: center; width: 80px;"></td>
                      <td style="text-align: center; width: 200px;">
                        




                       </td>
                    </tr>
                    <tr>
                      <td style="text-align: center">K</td>
                      <td style="padding: 10px" colspan="8">Bertugas sebagai penguji pada ujian akhir</td>
                    </tr>
                    <tr>

                      <td></td>
                      <td style="padding: 10px">1. Pembimbing Pencangkokan</td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center;"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center; width: 80px;"></td>
                      <td style="text-align: center; width: 80px;"></td>
                      <td style="text-align: center; width: 200px;">
                        




                       </td>
                    </tr>
                    <tr>

                      <td></td>
                      <td style="padding: 10px">2. Reguler</td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center;"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center; width: 80px;"></td>
                      <td style="text-align: center; width: 80px;"></td>
                      <td style="text-align: center; width: 200px;">
                        




                       </td>
                    </tr>
                    <tr>
                      <td style="text-align: center">L</td>
                      <td style="padding: 10px" colspan="8">Melaksanakan kegiatan Detasering dan pencangkokan Akademik Dosen</td>
                    </tr>
                    <tr>

                      <td></td>
                      <td style="padding: 10px">1. Detasering</td>
                      <td style="text-align: center"></td>
                     <td style="text-align: center; font-weight: bold;"></td>
                      <td style="text-align: center; font-weight: bold;"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center; width: 200px;">
                        




                       </td>
                    </tr>
                    <tr>

                      <td></td>
                      <td style="padding: 10px">2. Pencangkokan</td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center;"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center; width: 80px;"></td>
                      <td style="text-align: center; width: 80px;"></td>
                      <td style="text-align: center; width: 200px;">
                        




                       </td>
                    </tr>
                    <tr>
                      <td style="text-align: center">M</td>
                      <td style="padding: 10px" colspan="8">Melakukan kegiatan pengembangan diri untuk meningkatkan kompetensi</td>
                    </tr>
                    <tr>

                      <td></td>
                      <td style="padding: 10px">1. Lamanya lebih dari 960 jam</td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center;"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center; width: 80px;"></td>
                      <td style="text-align: center; width: 80px;"></td>
                      <td style="text-align: center; width: 200px;">
                        




                       </td>
                    </tr>
                    <tr>
                      

                      <td></td>
                      <td style="padding: 10px">2. Lamanya 641-960 jam</td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center;"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center; width: 80px;"></td>
                      <td style="text-align: center; width: 80px;"></td>
                      <td style="text-align: center; width: 200px;">
                        




                       </td>
                    </tr>
                    <tr>

                      <td></td>
                      <td style="padding: 10px">3. Lamanya 481-640 jam</td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center;"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center; width: 80px;"></td>
                      <td style="text-align: center; width: 80px;"></td>
                      <td style="text-align: center; width: 200px;">
                        




                       </td>
                    </tr>
                    <tr>

                      <td></td>
                      <td style="padding: 10px">4. Lamanya 161-480 jam</td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center;"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center; width: 80px;"></td>
                      <td style="text-align: center; width: 80px;"></td>
                      <td style="text-align: center; width: 200px;">
                        




                       </td>
                    </tr>
                    <tr>

                      <td></td>
                      <td style="padding: 10px">5. Lamanya 81-160 jam</td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center; font-weight: bold;"></td>
                      <td style="text-align: center; font-weight: bold;"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center; width: 200px;">
                        




                       </td>
                    </tr>
                    <tr>

                      <td></td>
                      <td style="padding: 10px">6. Lamanya 31-80 jam</td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center;"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center; width: 80px;"></td>
                      <td style="text-align: center; width: 80px;"></td>
                      <td style="text-align: center; width: 200px;">
                        




                       </td>
                    </tr>
                    <tr>

                      <td></td>
                      <td style="padding: 10px">7. Lamanya 10-30 jam</td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center;"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center; width: 80px;"></td>
                      <td style="text-align: center; width: 80px;"></td>
                      <td style="text-align: center; width: 200px;">
                        




                       </td>
                    </tr>
                    <tr style="background: #999999;">

                      <td style="text-align: center"></td>
                      <td style="padding: 10px; text-align: center;"><b>Jumlah Pelaksanaan Pendidikan</b></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center;"><b></b></td>
                      <td style="text-align: center"><b></b></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center; width: 80px;"><b></b></td>
                      <td style="text-align: center; width: 80px;"><b></b></td>
                      <td style="text-align: center; width: 200px;"></td>
                    </tr>
                    <tr>
                    <tr>
                      <td style="text-align: center; width: 5;"><b>III</b></td>
                      <td colspan="7" style="padding: 10px"><b>PELAKSANAAN PENELITIAN</b></td>
                    </tr>
                    <tr>
                      <td style="text-align: center;">A</td>
                      <td style="padding: 10px" colspan="8">Menghasilkan karya ilmiah </td>
                    </tr>
                    <tr>
                      <td></td>
                      <td style="padding: 10px;" colspan="8">1. Hasil penelitian atau pemikiran yang dipublikasikan</td>
                    </tr>
                    <tr>
                      <td></td>
                      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;a. Dalam bentuk :</td>
                      <td style="padding: 10px;" colspan="7"></td>                     
                    </tr>
                    <tr>
                      

                      <td></td>
                      <td >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1). Monograf</td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center;"></td>
                      <td style="text-align: center;"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center">                        
                       

                         </td>
                    </tr>
                    <tr>
                      

                      <td></td>
                      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2). Buku referensi</td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center;"></td>
                      <td style="text-align: center;"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center">
                        




                         </td>
                    </tr>
                    <tr>
                      <td></td>
                      <td colspan="8" style="padding: 10px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;b. Jurnal ilmiah :</td>
                    </tr>
                    <tr>
                      

                      <td></td>
                      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1). Internasional Bereputasi (Scopus)</td>
                      <td style="text-align: center"></td>                      
                      <td style="text-align: center;"></td>
                      <td style="text-align: center;"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center">
                        




                         </td>
                    </tr>                    
                    <tr>
                      

                      <td></td>
                      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2). Internasional Bereputasi</td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center;"></td>
                      <td style="text-align: center;"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center">
                        




                         </td>
                    </tr>                    
                    <tr>
                      

                      <td></td>
                      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3). Nasional terakreditasi</td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center;"></td>
                      <td style="text-align: center;"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center">
                        




                         </td>
                    </tr>                    
                    <tr>
                      

                      <td></td>
                      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;4). Tidak terakreditasi</td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center;"></td>
                      <td style="text-align: center;"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center">
                        




                         </td>
                    </tr>                    
                    <tr>
                      

                      <td></td>
                      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;5). Nasional Berbahasa Inggris</td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center;"></td>
                      <td style="text-align: center;"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center">
                        




                         </td>
                    </tr>                    
                    <tr>
                      <td></td>
                      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;c. Seminar (Prosiding) :</td>
                      <td style="padding: 10px;" colspan="8"></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1). Disajikan tingkat:</td>
                      <td style="padding: 10px;" colspan="7"></td>
                    </tr>
                    <tr>
                      

                      <td></td>
                      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;a). Internasional</td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center;"></td>
                      <td style="text-align: center;"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center">
                        




                         </td>
                    </tr>
                    <tr>
                      

                      <td></td>
                      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;b). Nasional</td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center;"></td>
                      <td style="text-align: center;"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center">
                        




                         </td>
                    </tr>
                    <tr>
                      <td></td>
                      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2). Poster tingkat:</td>
                      <td style="padding: 10px;" colspan="6"></td>
                    </tr>
                    <tr>
                      

                      <td></td>
                      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;a). Internasional</td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center;"></td>
                      <td style="text-align: center;"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center">
                        




                         </td>
                    </tr>
                    <tr>
                      

                      <td></td>
                      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;b). Nasional</td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center;"></td>
                      <td style="text-align: center;"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center">
                        




                         </td>
                    </tr>
                    <tr>
                      

                      <td></td>
                      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;d. Dalam koran/majalah populer/umum/makalah</td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center;"></td>
                      <td style="text-align: center;"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center">
                        




                         </td>
                    </tr>
                    <tr>
                      

                      <td></td>
                      <td style="padding: 10px;">2. Hasil penelitian atau hasil pemikiran yang tidak di publikasikan (tersimpan <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;di perpustakaan perguruan tinggi)</td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center;"></td>
                      <td style="text-align: center;"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                    </tr>
                    <tr>
                      <td style="text-align: center;">B</td>
                      <td style="padding: 10px" colspan="8">Menerjemahkan / menyadur buku ilmiah</td>
                    </tr>
                    <tr>
                      

                      <td></td>
                      <td style="padding: 10px; text-align: justify;">Diterbitkan dan diedarkan secara nasional.</td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center;"></td>
                      <td style="text-align: center;"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center">
                        




                         </td>
                    </tr>
                    <tr>
                      <td style="text-align: center;">C</td>
                      <td style="padding: 10px">Mengedit/menyunting karya ilmiah</td>
                    </tr>
                    <tr>
                      

                      <td></td>
                      <td style="padding: 10px; text-align: justify;">Diterbitkan dan diedarkan secara nasional.</td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center;"></td>
                      <td style="text-align: center;"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center">
                        




                         </td>
                    </tr>
                    <tr>
                      <td style="text-align: center">D</td>
                      <td style="padding: 10px" colspan="8">Membuat rencana dan karya teknologi yang dipatenkan</td>
                    </tr>
                    <tr>
                      

                      <td></td>
                      <td style="padding: 10px">1. Internasional</td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center;"></td>
                      <td style="text-align: center;"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>                  
                      <td style="text-align: center">
                        




                         </td>
                    </tr>
                    <tr>
                      

                      <td></td>
                      <td style="padding: 10px">2. Nasional</td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center;"></td>
                      <td style="text-align: center;"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center">
                        




                         </td>
                    </tr>
                    <tr>
                      <td style="text-align: center">E</td>
                      <td style="padding: 10px" colspan="8">Membuat rancangan dan karya teknologi, rancangan dan karya seni monumental/seni pertunjukan/karya sastra</td>
                    </tr>
                    <tr>
                      

                      <td></td>
                      <td style="padding: 10px">1. Tingkat Internasional</td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center;"></td>
                      <td style="text-align: center;"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center">
                        




                         </td>
                    </tr>
                    <tr>
                      

                      <td></td>
                      <td style="padding: 10px">2. Tingkat Nasional</td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center;"></td>
                      <td style="text-align: center;"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center">
                        




                         </td>
                    </tr>
                    <tr>
                      

                      <td></td>
                      <td style="padding: 10px">3. Tingkat Lokal</td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center;"></td>
                      <td style="text-align: center;"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center">
                        




                         </td>
                    </tr>
                    <tr style="background: #999999;">
                      

                      <td style="text-align: center"></td>
                      <td style="padding: 10px; text-align: center;"><b>Jumlah Pelaksanaan Penelitian</b></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center;"><b></b></td>
                      <td style="text-align: center;"><b></b></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"><b></b></td>
                      <td style="text-align: center"><b></b></td>
                      <td style="text-align: center"></td>
                    </tr>
                    <tr>
                      <td style="text-align: center; width: 5;"><b>IV</b></td>
                      <td colspan="8" style="padding: 10px"><b>PELAKSANAAN PENGABDIAN KEPADA MASYARAKAT</b></td>
                    </tr>
                    <tr>
                      <td style="text-align: center;">A</td>
                      <td style="padding: 10px" colspan="8">Menduduki jabatan pimpinan</td>
                    </tr>
                    <tr>
                      

                      <td></td>
                      <td style="padding: 10px; text-align: justify;">Menduduki jabatan pimpinan pada lembaga pemerintahan/pejabat negara yang harus dibebaskan dari jabatan organiknya</td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center;"></td>
                      <td style="text-align: center;"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center; width: 200px;">
                        




                         </td>
                    </tr>
                    <tr>
                      <td style="text-align: center;">B</td>
                      <td style="padding: 10px" colspan="8">Melaksankan pengembangan hasil pendidikan dan penelitian</td>
                    </tr>
                    <tr>
                      

                      <td></td>
                      <td style="padding: 10px; text-align: justify;">Melaksanakan pengembangan hasil pendidikan dan penelitian yang dapat dimanfaatkan oleh masyarakat</td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center;"></td>
                      <td style="text-align: center;"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center; width: 200px;">
                        




                         </td>
                    </tr>
                    <tr>
                      <td style="text-align: center;">C</td>
                      <td style="padding: 10px" colspan="8">Memberi latihan/penyuluhan/penataran/ceramah pada masyarakat</td>
                    </tr>
                    <tr>
                      <td></td>
                      <td style="padding: 10px;" colspan="8">1. Terjadwal/terprogram <tr>
                      <td></td>
                      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;a. Dalam satu semester atau lebih</td>
                      <td style="padding: 10px" colspan="7"></td>
                    </tr>
                    <tr>
                      

                      <td></td>
                      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1). Tingkat Internasional</td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center;"></td>
                      <td style="text-align: center;"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center; width: 200px;">
                        




                         </td>
                    </tr>
                    <tr>
                      
  
                      <td></td>
                      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2). Tingkat Nasional</td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center;"></td>
                      <td style="text-align: center;"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center; width: 200px;">
                        




                         </td>
                    </tr>
                    <tr>
                      
  
                      <td></td>
                      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3). Tingkat Lokal</td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center;"></td>
                      <td style="text-align: center;"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center; width: 200px;">
                        




                         </td>
                    </tr>
                    <tr>
                      <td></td>
                      <td style="padding: 10px;" colspan="8"><tr>
                      <td></td>
                      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;b. Kurang dari satu semester dan minimal satu bulan</td>
                      <td style="text-align: center" colspan="7"></td>
                    <tr>
                      

                      <td></td>
                      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1). Tingkat Internasional</td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center;"></td>
                      <td style="text-align: center;"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center; width: 200px;">
                        




                         </td>
                    </tr>
                    <tr>
                      

                      <td></td>
                      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2). Tingkat Nasional</td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center;"></td>
                      <td style="text-align: center;"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center; width: 200px;">
                        




                         </td>
                    </tr>
                    <tr>
                      

                      <td></td>
                      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3). Tingkat Lokal</td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center;"></td>
                      <td style="text-align: center;"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <<td style="text-align: center; width: 200px;">
                        




                         </td>
                    </tr>
                    <tr>
                      

                      <td></td>
                      <td style="padding: 10px">2. Insidental</td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center;"></td>
                      <td style="text-align: center;"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center; width: 200px;">
                        




                         </td>
                    </tr>
                    <tr>
                      <td style="text-align: center">D</td>
                      <td style="padding: 10px" colspan="8">Memberi pelayanan kepada masyarakat atau kegiatan lain yang menunjang pelaksanaan tugas umum pemerintah dan pembangunan</td>
                    </tr>
                    <tr>
                      

                      <td></td>
                      <td style="padding: 10px">1. Berdasarkan bidang keahlian</td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center;"></td>
                      <td style="text-align: center;"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center; width: 200px;">
                        




                         </td>
                    </tr>
                    <tr>
                      

                      <td></td>
                      <td style="padding: 10px">2. Berdasarkan penugasan lembaga perguruan tinggi</td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center;"></td>
                      <td style="text-align: center;"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center; width: 200px;">
                        




                         </td>
                    </tr>
                    <tr>
                      

                      <td></td>
                      <td style="padding: 10px">3. Berdasarkan fungsi/jabatan</td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center;"></td>
                      <td style="text-align: center;"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center; width: 200px;">
                        




                         </td>
                    </tr>
                    <tr>
                      <td style="text-align: center">E</td>
                      <td style="padding: 10px" colspan="8">Membuat/menulis karya pengabdian </td>
                    </tr>
                    <tr>
                      

                      <td></td>
                      <td style="padding: 10px">Membuat/menulis karya pengabdian pada masyarakat yang tidak dipublikasikan</td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center;"></td>
                      <td style="text-align: center;"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center; width: 200px;">
                        




                         </td>
                    </tr>
                    <tr style="background: #999999">
                      

                      <td style="text-align: center"></td>
                      <td style="padding: 10px; text-align: center;" ><b>Jumlah Pelaksanaan P2M</b></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center;"><b></b></td>
                      <td style="text-align: center;"><b></b></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"><b></b></td>
                      <td style="text-align: center"><b></b></td>
                      <td style="text-align: center"></td>
                    </tr>
                     <tr style="background: #999900">

                      <td style="text-align: center"></td>
                      <td style="padding: 10px; text-align: center; " ><b>Jumlah Pelaksanaan Unsur Utama</b></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center; font-weight: bold;"></td>
                      <td style="text-align: center; font-weight: bold;"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center; font-weight: bold;"></td>
                      <td style="text-align: center; font-weight: bold;"></td>
                      <td style="text-align: center"></td>
                    </tr>
                    <tr>
                      <td style="text-align: center; width: 5;"><b>V</b></td>
                      <td colspan="8" style="padding: 10px"><b>PENUNJANG TUGAS DOSEN</b></td>
                    </tr>
                    <tr>
                      <td style="text-align: center;">A</td>
                      <td style="padding: 10px" colspan="8">Menjadi anggota dalam suatu Panitia/Badan pada perguruan tinggi</td>
                    </tr>
                    <tr>
                      

                      <td></td>
                      <td style="padding: 10px">1. Sebagai ketua/wakil ketua merangkap anggota</td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center; font-weight: bold;"></td>
                      <td style="text-align: center; font-weight: bold;"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center; width: 200px;">
                        

                         </td>
                    </tr>
                    <tr>
                      

                      <td></td>
                      <td style="padding: 10px">2. Sebagai anggota</td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center; font-weight: bold;"></td>
                      <td style="text-align: center; font-weight: bold;"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center; width: 200px;">
                        

                         </td>
                    </tr>
                    <tr>
                      <td style="text-align: center;">B</td>
                      <td style="padding: 10px" colspan="8">Menjadi anggota panitia/badan pada lembaga pemerintah</td>
                    </tr>
                    <tr>
                      <td style="text-align: center;"></td>
                      <td style="padding: 10px" colspan="8">1. Panitia Pusat</td>
                    </tr>
                    <tr>
                      

                      <td style="text-align: center;"></td>
                      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;a. Ketua/Wakil Ketua</td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center; font-weight: bold;"></td>
                      <td style="text-align: center; font-weight: bold;"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center; width: 200px;">
                        

                         </td>
                    </tr>
                    <tr>
                      

                      <td style="text-align: center;"></td>
                      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;b. Anggota</td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center; font-weight: bold;"></td>
                      <td style="text-align: center; font-weight: bold;"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center; width: 200px;">
                        

                         </td>
                    </tr>
                    <tr>
                      <td style="text-align: center;"></td>
                      <td style="padding: 10px" colspan="8">1. Panitia Daerah</td>
                    </tr>
                    <tr>
                      

                      <td style="text-align: center;"></td>
                      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;a. Ketua/Wakil Ketua</td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center; font-weight: bold;"></td>
                      <td style="text-align: center; font-weight: bold;"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center; width: 200px;">
                          

                         </td>
                    </tr>
                    <tr>
                      

                      <td style="text-align: center;"></td>
                      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;b. Anggota</td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center; font-weight: bold;"></td>
                      <td style="text-align: center; font-weight: bold;"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center; width: 200px;">
                        

                         </td>
                    </tr>
                    <tr>
                      <td style="text-align: center;">C</td>
                      <td style="padding: 10px" colspan="8">Menjadi anggota organisasi profesi</td>
                    </tr>
                    <tr>
                      <td style="text-align: center;"></td>
                      <td style="padding: 10px" colspan="8">1. Tingkat Internasional</td>
                    </tr>
                    <tr>
                      

                      <td style="text-align: center;"></td>
                      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;a. Pengurus</td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center; font-weight: bold;"></td>
                      <td style="text-align: center; font-weight: bold;"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center; width: 200px;">
                        

                         </td>
                    </tr>
                    <tr>
                      

                      <td style="text-align: center;"></td>
                      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;b. Anggota atas permintaan</td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center; font-weight: bold;"></td>
                      <td style="text-align: center; font-weight: bold;"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center; width: 200px;">
                        

                         </td>
                    </tr>
                    <tr>
                      

                      <td style="text-align: center;"></td>
                      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;c. Anggota</td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center; font-weight: bold;"></td>
                      <td style="text-align: center; font-weight: bold;"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center; width: 200px;">
                        

                         </td>
                    </tr>
                    <tr>
                      <td style="text-align: center;"></td>
                      <td style="padding: 10px" colspan="8">1. Tingkat Nasional</td>
                    </tr>
                    <tr>
                      

                      <td style="text-align: center;"></td>
                      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;a. Pengurus</td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center; font-weight: bold;"></td>
                      <td style="text-align: center; font-weight: bold;"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center; width: 200px;">
                        

                         </td>
                    </tr>
                    <tr>
                      

                      <td style="text-align: center;"></td>
                      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;b. Anggota atas permintaan</td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center; font-weight: bold;"></td>
                      <td style="text-align: center; font-weight: bold;"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center; width: 200px;">
                        

                         </td>
                    </tr>
                    <tr>
                      

                      <td style="text-align: center;"></td>
                      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;c. Anggota</td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center; font-weight: bold;"></td>
                      <td style="text-align: center; font-weight: bold;"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center; width: 200px;">
                        

                         </td>
                    </tr>
                    <tr>
                      <td style="text-align: center;">D</td>
                      <td style="padding: 10px" colspan="8">Mewakili perguruan tinggi/lembaga pemerintah</td>
                    </tr>
                    <tr>
                      

                      <td></td>
                      <td style="padding: 10px; text-align: justify;">Mewakili perguruan tinggi/lembaga pemerintah duduk dalam panitia antar lembaga</td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center; font-weight: bold;"></td>
                      <td style="text-align: center; font-weight: bold;"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center; width: 200px;">
                        

                         </td>
                    </tr>
                    <tr>
                      <td style="text-align: center;">E</td>
                      <td style="padding: 10px" colspan="8">Menjadi anggota delegasi nasional ke pertemuan internasional</td>
                    </tr>
                    <tr>
                      

                      <td></td>
                      <td style="padding: 10px">1. Sebagai ketua delegasi</td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center; font-weight: bold;"></td>
                      <td style="text-align: center; font-weight: bold;"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center; width: 200px;">
                        

                         </td>
                    </tr>
                    <tr>
                      

                      <td></td>
                      <td style="padding: 10px">2. Sebagai anggota delegasi</td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center; font-weight: bold;"></td>
                      <td style="text-align: center; font-weight: bold;"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center; width: 200px;">
                        

                         </td>
                    </tr>
                    <tr>
                      <td style="text-align: center;">F</td>
                      <td style="padding: 10px" colspan="8">Berperan serta aktif dalam pertemuan ilmiah</td>
                    </tr>
                    <tr>
                      <td style="text-align: center;"></td>
                      <td style="padding: 10px" colspan="8">1. Tingkat internasional/nasional/regional sebagai :</td>
                    </tr>
                    <tr>
                      

                      <td style="text-align: center;"></td>
                      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;a. Ketua</td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center; font-weight: bold;"></td>
                      <td style="text-align: center; font-weight: bold;"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center; width: 200px;">
                        

                         </td>
                    </tr>
                    <tr>
                      

                      <td style="text-align: center;"></td>
                      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;b. Anggota</td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center; font-weight: bold;"></td>
                      <td style="text-align: center; font-weight: bold;"></td>
                      <td style="text-align: center"></td>                      
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center; width: 200px;">
                        

                         </td>
                    </tr>
                    <tr>
                      <td style="text-align: center;"></td>
                      <td style="padding: 10px" colspan="8">2. Di lingkungan perguruan tinggi sebagai</td>
                    </tr>
                    <tr>
                      

                      <td style="text-align: center;"></td>
                      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;a. Ketua</td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center; font-weight: bold;"></td>
                      <td style="text-align: center; font-weight: bold;"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center; width: 200px;">
                        

                         </td>
                    </tr>
                    <tr>
                      

                      <td style="text-align: center;"></td>
                      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;b. Anggota</td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center; font-weight: bold;"></td>
                      <td style="text-align: center; font-weight: bold;"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center; width: 200px;">
                        

                         </td>
                    </tr>
                    <tr>
                      <td style="text-align: center;">G</td>
                      <td style="padding: 10px" colspan="8">Mendapat penghargaan/ tanda jasa</td>
                    </tr>
                    <tr>
                      <td style="text-align: center;"></td>
                      <td style="padding: 10px" colspan="8">1. Penghargaan/tanda jasa Satya Lancana Karya Satya</td>
                    </tr>
                    <tr>
                      

                      <td style="text-align: center;"></td>
                      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;a. 30 (tiga puluh) tahun</td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center; font-weight: bold;"></td>
                      <td style="text-align: center; font-weight: bold;"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center; width: 200px;">
                        

                         </td>
                    </tr>
                    <tr>
                      

                      <td style="text-align: center;"></td>
                      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;b. 20 (dua puluh) tahun</td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center; font-weight: bold;"></td>
                      <td style="text-align: center; font-weight: bold;"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center; width: 200px;">
                        

                         </td>
                    </tr>
                    <tr>
                      

                      <td style="text-align: center;"></td>
                      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;b. 10 (sepuluh puluh) tahun</td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center; font-weight: bold;"></td>
                      <td style="text-align: center; font-weight: bold;"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center; width: 200px;">
                        

                         </td>
                    </tr>
                    <tr>
                      <td style="text-align: center;"></td>
                      <td style="padding: 10px" colspan="8">2. Memperoleh pengharagaan lainnya</td>
                    </tr>
                    <tr>
                      

                      <td style="text-align: center;"></td>
                      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;a. Tingkat internasional</td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center; font-weight: bold;"></td>
                      <td style="text-align: center; font-weight: bold;"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center; width: 200px;">
                        

                         </td>
                    </tr>
                    <tr>
                      

                      <td style="text-align: center;"></td>
                      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;b. Tingkat nasional</td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center; font-weight: bold;"></td>
                      <td style="text-align: center; font-weight: bold;"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center; width: 200px;">
                        

                         </td>
                    </tr>
                    <tr>
                      

                      <td style="text-align: center;"></td>
                      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;b. Tingkat provinsi</td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center; font-weight: bold;"></td>
                      <td style="text-align: center; font-weight: bold;"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center; width: 200px;">
                        

                         </td>
                    </tr>
                    <tr>
                      <td style="text-align: center;">H</td>
                      <td style="padding: 10px" colspan="8">Menulis buku pelajaran SLTA ke bawah yang diterbitkan dan diedarkan secara nasional</td>
                    </tr>
                    <tr>
                      

                      <td></td>
                      <td style="padding: 10px">1. Buku SLTA atau setingkat</td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center; font-weight: bold;"></td>
                      <td style="text-align: center; font-weight: bold;"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center; width: 200px;">
                        

                         </td>
                    </tr>
                    <tr>
                      

                      <td></td>
                      <td style="padding: 10px">2. Buku SLTP atau setingkat</td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center; font-weight: bold;"></td>
                      <td style="text-align: center; font-weight: bold;"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center; width: 200px;">
                        

                         </td>
                    </tr>
                    <tr>
                      

                      <td></td>
                      <td style="padding: 10px">3. Buku SD atau setingkat</td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center; font-weight: bold;"></td>
                      <td style="text-align: center; font-weight: bold;"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center; width: 200px;">
                        

                         </td>
                    </tr>
                    <tr>
                      <td style="text-align: center;">I</td>
                      <td style="padding: 10px" colspan="8">Mempunyai prestasi di bidang olahraga/humaniora</td>
                    </tr>
                    <tr>
                      

                      <td></td>
                      <td style="padding: 10px">1. Tingkat internasional</td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center; font-weight: bold;"></td>
                      <td style="text-align: center; font-weight: bold;"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center; width: 200px;">
                        

                         </td>
                    </tr>
                    <tr>
                      

                      <td></td>
                      <td style="padding: 10px">2. Tingkat Nasional</td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center; font-weight: bold;"></td>
                      <td style="text-align: center; font-weight: bold;"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center; width: 200px;">
                        

                         </td>
                    </tr>
                    <tr>
                      

                      <td></td>
                      <td style="padding: 10px">3. Tingkat daerah/lokal</td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center; font-weight: bold;"></td>
                      <td style="text-align: center; font-weight: bold;"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center; width: 200px;">
                        

                         </td>
                    </tr>
                    <tr>
                      <td style="text-align: center;">J</td>
                      <td style="padding: 10px" colspan="8">Keanggotaan dalam tim penilaian </td>
                    </tr>
                    <tr>

                      <td></td>
                      <td style="padding: 10px">Menjadi anggota tim penilaian jabatan Akademik Dosen</td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center; font-weight: bold;"></td>
                      <td style="text-align: center; font-weight: bold;"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center; width: 200px;">
                         </td>
                    </tr>
                    <tr style="background: #999999;">
                      <td style="text-align: center"></td>
                      <td style="padding: 10px; text-align: center;" ><b>Jumlah Pelaksanaan Penunjang Tridharma Perguruan Tinggi</b></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center; font-weight: bold;"></td>
                      <td style="text-align: center; font-weight: bold;"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center"></td>
                    </tr>
                    <tr style="background: #999900;">
                      <td style="text-align: center"></td>
                      <td style="padding: 10px; text-align: center;" ><b>Jumlah Total</b></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center; font-weight: bold;"></td>
                      <td style="text-align: center; font-weight: bold;"></td>
                      <td style="text-align: center"></td>
                      <td style="text-align: center; font-weight: bold;"></td>
                      <td style="text-align: center; font-weight: bold;"></td>
                      <td style="text-align: center"></td>
                    </tr>
                    <tr>
                      <td style="text-align: center; width: 5;"><b>III</b></td>
                      <td style="padding: 10px" colspan="8"><b>LAMPIRAN PENDUKUNG DUPAK :</b></td>
                    </tr>
                    <tr>
                      <td style="text-align: center; width: 5;"></td>
                      <td style="padding: 10px" valign="top">
                        <ol style="padding: 4px;">
                          <li>Surat pernyataan telah melaksanakan kegiatan pendidikan</li>
                          <li>Surat pernyataan telah melakukan kegiatan pengajaran</li>
                          <li>Surat pernyataan telah melakukan kegiatan pengabdian kepada masyarakat</li>
                          <li>Surat pernyataan melakukan kegiatan penunjang </li>
                        </ol>
                      </td>
                      <td style="padding: 10px" colspan="6" align="center">
                        <br><br>
                        Jakarta, 25 Januari 2021<br>
                        Koordinator Program Studi<br>
                        Manajemen Pendidikan<br><br><br><br>
                        Dr. Siti Zulikha, S.Ag, M.Pd<br>
                        NIP 197404202008122002<br><br>

                      </td>
                    </tr>
                    <tr>
                      <td style="text-align: center; width: 5;"><b>IV</b></td>
                      <td style="padding: 10px" colspan="8"><b>Catatan Pegawai Pengusul :</b></td>
                    </tr>
                    <tr>
                      <td style="text-align: center; width: 5;"></td>
                      <td style="padding: 10px" valign="top">

                        <div >                        
                          <form method="post" action="proses_catatan." enctype="multipart/form-data" >
                            <textarea class="form-control" placeholder="Catatan Pegawai pengusul" name="catatan_pengusul" value="" rows="5" cols="100%"></textarea><br>
                            <input type="hidden" name="id_usulan" value="" >
                            <button class="btn btn-sm btn-info" type="submit" name="savu"> simpan / edit</button>                                    
                          </form>                
                        </div>

                      </td>
                      <td style="padding: 10px" colspan="6" align="center">
                        <br><br>
                        Jakarta, 25 Januari 2021<br>
                        Dekan<br><br><br><br>
                        Dr. Sofiah Hartati, M.Si<br>
                        NIP 196204221998032001<br><br>

                      </td>
                    </tr>
                    <tr>
                      <td style="text-align: center; width: 5;"><b>V</b></td>
                      <td style="padding: 10px" colspan="8"><b>Catatan Anggota Tim Penilai:</b></td>
                    </tr>
                    <tr>
                      <td style="text-align: center; width: 5;"></td>
                      <td style="padding: 10px" valign="top">
                        <div >                        
                            <textarea class="form-control" placeholder="Catatan Tim Penilai" name="catatan_penilai" rows="5" cols="100%" readonly></textarea><br>                
                        </div>

                      </td>
                      <td style="padding: 10px" colspan="6" align="center">
                        <br><br>
                        Jakarta, 25 Januari 2021<br><br><br><br><br>
                        
                        -----------------------------------<br>
                        NIP <br><br>

                        <br><br>
                        Jakarta, 25 Januari 2021<br><br><br><br><br>
                        
                        -----------------------------------<br>
                        NIP <br><br>
                      </td>
                    </tr>
                    <tr>
                      <td style="text-align: center; width: 5;"><b>V</b></td>
                      <td style="padding: 10px" colspan="8"><b>Catatan Ketua Tim Penilai:</b></td>
                    </tr>
                    <tr>
                      <td style="text-align: center; width: 5;"></td>
                      <td style="padding: 10px" valign="top">

                        <div >                        
                            <textarea class="form-control" placeholder="Catatan Ketua Tim Penilai" name="catatan_ketua" rows="5" cols="100%" readonly></textarea><br>              
                        </div>


                      </td>
                      <td style="padding: 10px" colspan="6" align="center">
                        <br><br>
                        Jakarta, 25 Januari 2021<br><br><br><br><br>
                        
                        -----------------------------------<br>
                        NIP 196204221998032001<br><br>
                      </td>
                    </tr>
                  </table>
                </div>

                <div class="card-footer">
                </div><br>
                <div class="mr-4 ">
                  <input type="button" class="float-right" value="Halaman sebelumnya" onclick="history.back(-1)" />
                </div>
              </div>              
            </div>
        </div>
      </div>
  </div>
</div>
<?= $this->endSection(); ?>