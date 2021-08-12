<script>
$(document).ready(function(){      
      var i=1;  
      $('#add').click(function(){  
           i++;  
           $('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added">'
           			+'<td>'+i+'</td>'
           			+'<td>'
	           			+'<div class="col-sm-12">'
	           				+'<select  type="text" class="form-control" name="jenis_dokumen'+i+'" required>'
		           				+'<option value="">-- Pilih Jenis Dokumen -- </option>'
		           				+'<option value="1">SK Rektor</option>'
		           				+'<option value="2">SK Dekan</option>'
		           				+'<option value="3">SK Direktur Pascasarjana</option>'
		           				+'<option value="4">SK Koordinator Program Studi</option>'
		           				+'<option value="5">Ijazah</option>'
		           				+'<option value="6">Sertifikat</option>'
		           				+'<option value="7">Peraturan</option>'
		           				+'<option value="8">Instruksi</option>'
		           				+'<option value="9">Surat Edaran</option>'
		           				+'<option value="10">Keputusan</option>'
		           				+'<option value="11">Surat Tugas</option>'
		           				+'<option value="12">Nota Dinas/Memo</option>'
		           				+'<option value="13">Disposisi</option>'
		           				+'<option value="14">Surat Dinas/Undangan</option>'
		           				+'<option value="15">Nota Kesepahaman</option>'
		           				+'<option value="16">Perjanjian Kerjasama</option>'
		           				+'<option value="17">Surat Kuasa</option>'
		           				+'<option value="18">Berita Acara</option>'
		           				+'<option value="19">Surat Keterangan/Pernyataan/Pengantar/Pengumuman</option>'
		           				+'<option value="20">Siaran Pers</option>'
		           				+'<option value="21">Piagam Penghargaan</option>'
	           				+'</select>'
	           			+'</div >'
           			+'</td>'
           			+'<td>'
           				+'<input type="file" name="dokumen'+i+'" class="form-control" >'
           			+'</td>'
           			+'<td>'
			        	+'<input type="text" class="form-control" name="keterangan'+i+'" >' 
			        +'</td>'
           			+'<td>'
           				+'<button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button>'
           			+'</td>'
           			+'</tr>');  
      });
      $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
      });  
});  

 

</script>




<?= $this->extend('users/layoutdosen'); ?>

<?= $this->section('breadcrumbs'); ?>
<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="<?= route_to('home'); ?>">Home</a></li>
  <li class="breadcrumb-item active">Unggah Dokumen</li>
</ol>
<?= $this->endSection() ?>

<?= $this->section('content'); ?>
<div class="content">
 <div class="row">
        <div class="col-md-9" style="font-size: 35px;"><b>UNIVERSITAS NEGERI JAKARTA</b></div>
        <!-- <div class="col-md-4" style="font-size: 25px;" ></div> -->
        <div class="col-md-12" style="font-size: 25px;" ><b>MASA PENILAIAN :  </div>
    </div>
    <br>	
    <div class="card">              
        <div class="card-header bg-primary">
        <h1 class="card-title" style="font-size: 25px;"><i class="nav-icon fas fa-book mr-1"></i> Dokumen Persyaratan Kenaikan Pangkat </h1>
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
            <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">NIP</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="nip" value="<?= (isset(user()->nip) ? user()->nip : ''); ?>" readonly>
            </div>
            </div>

            <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="nama" value="<?= (isset(user()->name) ? user()->name : ''); ?>" readonly>
            </div>
            </div>
            
            <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Unit Kerja</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="nama_unit" id="unit_kerja" value="<?= (isset(user()->kd_fakultas) ? user()->kd_fakultas : ''); ?>" readonly>
                <input type="hidden" name="id_unit_kerja" class="form-control" id="id_unit_kerja" value="" readonly>
            </div>
            </div>

            <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Tanggal Permohonan</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" name="tgl_permohonan" value="" readonly>
            </div>
            </div>                                            
            
            <form class="form-horizontal" method="POST"  enctype="multipart/form-data" action="proses_upload.php" >
            <div class="form-group row" >	
                <label for="inputEmail3" class="col-sm-2 col-form-label">Dokumen Pendukung :</label>
                <div class="col-sm-12">
                <input type="hidden" class="form-control" name="id_usulan" value="" > 
                
                <table class="table table-bordered" id="dynamic_field">  
                    <tr  align="center" style="font-weight: bold; background-color:#99c5cc">
                        <td width="5%" >No</td>
                        <td width="25%">Jenis Dokumen</td>
                        <td width="25%">Nama file</td>
                        <td width="25%">Keterangan</td>
                        <td width="15%">Aksi</td>
                    </tr>
                    <tr>
                        <td>
                            <?php 
                            // echo $no++ 
                            ?>
                        </td>
                        <td>
                            <?php 
                            // echo $listdok['ur_dokumen'] 
                            ?>
                        </td>
                        <td>
                            <!-- <a href="dokumen/ -->
                            <?php 
                            // echo $listdok['dokumen'] 
                            ?>
                            <!-- " target="_BLANK"> -->
                            <?php 
                                // echo (explode('-',$listdok['dokumen'])[1])                             
                            ?>
                            <!-- </a> -->
                                
                        </td>
                        <td>
                            <?php 
                            // echo $listdok['keterangan'] 
                            ?>
                        </td>
                        <td>
                            <!-- <a href="user.php?page=delete_dok&id_delete=  -->
                            <?php
                            // echo $listdok['id_dok']
                            ?>
                            <!-- " class="btn btn-sm btn-danger" onclick="return confirm('Yakin dokumen akan dihapus?')" -->
                            <!-- ><i class="fa fa-trash"></i> Hapus  -->
                            <!-- </a> -->
                        </td>
                    </tr>
                     <tr style="font-weight: bold; background-color:#99c5cc">
                        <td colspan=5></td>
                    </tr>
                </table>
                <button type="button" name="add" id="add" class="btn btn-sm btn-success">Tambah Dokumen</button>
                </div>                                
            </div>
                <input type="submit" name="simpan" class="btn btn-info" value="Simpan"/>
            </form>                                                          	
        </div>   
        <div class="card-footer">
        </div>
    </div> 
 
</div>
<?= $this->endSection(); ?>
