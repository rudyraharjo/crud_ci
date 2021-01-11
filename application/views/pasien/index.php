<style type="text/css">
    .text-error
    {
            font-size: 12px;
            font-style: italic;
            color: red;
            letter-spacing: 0.7px;
      margin-top: 5px;
    }
  
    .mandatory
     {
            font-size: 15px;
            color: red;
    }

    #search-target {
        left: 165px;
    }
</style>
<div class="section__content section__content--p30">
    <div class="container-fluid">
        <?php echo $this->session->flashdata('notice'); ?>
        <?php echo validation_errors('<div class="alert alert-danger alert-mg-b alert-success-style4 alert-st-bg3">', '<button type="button" class="close sucess-op" data-dismiss="alert" aria-label="Close"><span class="icon-sc-cl" aria-hidden="true">&times;</span></button></div>'); ?>

        <div class="row">
            <div class="col-lg-12">
                <div class="user-data m-b-30">
                    <h3 class="title-3 m-b-30"><i class="zmdi zmdi-assignment"></i> Master Pasien</h3>
                    <div class="filters m-b-45">
                        <button data-toggle="modal" data-target="#PrimaryModalhdbgcl" data-href="#" class="btn btn-primary">Tambah</button>
                    
                    </div>
                    <div class="table-responsive table-data">
                        <table class="table" id="data">
                            <thead>
                                <tr>
                                    <td>No</td>
                                    <td>nik</td>
                                    <td>Nama Lengkap</td>
                                    <td>Jenis Kelamin</td>
                                    <td>Kelas</td>
                                    <td>Tarif / Biaya</td>
                                    <td>Jumlah Hari</td>
                                    <td>Total Tagihan</td>
                                    <!-- <td>Keterangan</td> -->
                                    <td>Action</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                /*
                                echo "<pre>";
                                print_r($offer);
                                echo "</pre>";
                                */
                                $no=$this->uri->segment(3)+0; foreach($offer as $row) { $no++ ?>
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td>
                                            <div class="table-data__info">
                                                <h6><?php echo $row['nik']; ?></h6>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="table-data__info">
                                                <h6><?php echo $row['nama_lengkap']; ?></h6>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="table-data__info">
                                                <h6><?php echo $row['jenis_kelamin']; ?></h6>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="table-data__info">
                                                <h6><?php echo $row['kelas']; ?></h6>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="table-data__info">
                                                <h6><?php echo number_format($row['tarif_biaya']); ?></h6>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="table-data__info">
                                                <h6><?php echo $row['jumlah_hari']; ?></h6>
                                            </div>
                                        </td>
                                        
                                        <td>
                                            <div class="table-data__info">
                                                <h6><?php echo number_format($row['total_tagihan']); ?></h6>
                                            </div>
                                        </td>
                                        
                                        <td>
                                            
                                                <button data-toggle="modal" data-target="#PrimaryModalhdbgclEdit" data-href="#" data-id="<?php echo $row['ID']; ?>" 
                                                data-nik="<?php echo $row['nik']; ?>" 
                                                data-nama_lengkap="<?php echo $row['nama_lengkap']; ?>"
                                                data-jenis_kelamin="<?php echo $row['jenis_kelamin']; ?>" 
                                                data-kelas="<?php echo $row['kelas']; ?>"
                                                data-tarif_biaya="<?php echo $row['tarif_biaya']; ?>"
                                                data-jumlah_hari="<?php echo $row['jumlah_hari']; ?>"
                                                data-total_tagihan="<?php echo $row['total_tagihan']; ?>"
                                                >
                                                <i class="nav-icon fas fa-edit" style="color: #5bb505;"></i></button>
                                           
                                            
                                                <button data-toggle="modal" data-target="#konfirmasi_hapus" data-href="<?php echo base_url();?>Pasien/deletePasien/?id=<?php echo $row['ID']; ?>" data-message="Apakah Anda yakin ingin menghapus Pasien dengan NIK <?php echo $row['nik']; ?> ?"  style="margin-left: 5px;">
                                                    <i class="fa fa-times" style="color: blue;"></i></button>
                                                
                                        </td>
                                    </tr>
                                    <?php } ?>
                                

                                
                            </tbody>
                        </table>
                         <div class="user-data__footer">
                             <?php echo $halaman ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="PrimaryModalhdbgcl" class="modal modal-adminpro-general default-popup-PrimaryModal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header header-color-modal bg-color-1">
                <h4 class="modal-title">Tambah Data</h4>
                <div class="modal-close-area modal-close-df">
                    <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a> 
                </div>
            </div>
            <div class="modal-body">
              
               <?php echo form_open('Pasien/add_data'); ?>
                   <div class="row clearfix">
                                
                        <div class="col-sm-12" align="left">
                            <a>NIK <font color=red>*</font> </a>
                            
                            <input type="text" name="f_nik"  class="form-control" id="js_nik" placeholder="NIK">
                            
                            <!--<span class="text-error" id="txt_statuskk_edit"></span>-->
                        </div>

                        <div class="col-sm-12" align="left">
                            <a>Nama Lengkap <font color=red>*</font> </a>
                            
                            <input type="text" name="f_nama_lengkap"  class="form-control" id="js_nama_lengkap" placeholder="Nama Lengkap">
                            
                        </div>

                        <div class="col-sm-12" align="left">
                            <a>Jenis Kelamin <font color=red>*</font> </a> <br />
                            <!--
                            <input type="text" name="js_jenis_kelamin"  class="form-control" id="js_jenis_kelamin" placeholder="Jenis Kelamin">-->
                            <input type="radio" name="f_jenis_kelamin" value="Perempuan">Perempuan
                            <input type="radio" name="f_jenis_kelamin" value="Laki - Laki">Laki - Laki
                        </div>

                        <div class="col-sm-12" align="left">
                            <a>kelas <font color=red>*</font> </a>
                            <!--<input type="text" name="js_kelas"  class="form-control" id="js_kelas" placeholder="Kelas">-->
                            <select class="form-control" id="js_kelas" name="f_kelas">
                                <option value="1">Satu</option>
                                <option value="2">Dua</option>
                                <option value="3">Tiga</option>
                            </select>
                            
                        </div>

                        <div class="col-sm-12" align="left">
                            <a>Tarif Biaya <font color=red>*</font> </a>
                            <input type="number" name="f_tarif_biaya"  class="form-control" id="js_tarif_biaya" placeholder="Tarif Biaya">
                            
                        </div>

                        <div class="col-sm-12" align="left">
                            <a>Jumlah Hari <font color=red>*</font> </a>
                            <input type="number" name="f_jumlah_hari" min="1" value="1" class="form-control" id="js_jumlah_hari" placeholder="Jumlah Hari">
                            
                        </div>

                        <div class="col-sm-12" align="left">
                            <a>Total Biaya <font color=red>*</font> </a>
                            <input type="text" name="f_total_tagihan"  class="form-control" id="js_total_tagihan" placeholder="Jumlah Hari" readonly>
                        </div>
                    
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn bg-blue " data-dismiss="modal" href="#">Batal</button>
                <button type="submit" class="btn bg-blue "  id="send_Add">Tambah</button>
                <!--<button type="submit" class="btn bg-blue " style="display:none;" id="kirim_Add">Tambah</button>-->
            </div>
               </form>
               
        
        </div>
    </div>
</div>

<div id="PrimaryModalhdbgclEdit" class="modal modal-adminpro-general default-popup-PrimaryModal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header header-color-modal bg-color-1">
                <h4 class="modal-title">Ubah Data</h4>
            </div>
            <div class="modal-body">
                <?php echo form_open('Pasien/update_data'); ?>
                <input type="hidden" name="IDNOW" id="js_get_IDNOW" />
                <div class="row clearfix">
                     
                    <div class="col-sm-12" align="left">
                        <a>NIK <font color=red>*</font> </a>
                        
                        <input type="text" name="f_nik"  class="form-control" id="js_get_nik" placeholder="NIK">
                        
                    </div>

                    <div class="col-sm-12" align="left">
                        <a>Nama Lengkap <font color=red>*</font> </a>
                        
                        <input type="text" name="f_nama_lengkap"  class="form-control" id="js_get_nama_lengkap" placeholder="Nama Lengkap">
                        
                    </div>

                    <div class="col-sm-12" align="left">
                        <a>Jenis Kelamin <font color=red>*</font> </a> <br />
                        <input type="radio" name="f_jenis_kelamin" id="js_get_jenis_kelamin" value="Perempuan">Perempuan
                        <input type="radio" name="f_jenis_kelamin" id="js_get_jenis_kelamin" value="Laki - Laki">Laki - Laki
                    </div>

                    <div class="col-sm-12" align="left">
                        <a>kelas <font color=red>*</font> </a>
                        <!--<input type="text" name="js_kelas"  class="form-control" id="js_kelas" placeholder="Kelas">-->
                        <select class="form-control" id="js_get_kelas" name="f_kelas">
                            <option value="1">Satu</option>
                            <option value="2">Dua</option>
                            <option value="3">Tiga</option>
                        </select>
                        
                    </div>

                    <div class="col-sm-12" align="left">
                        <a>Tarif Biaya <font color=red>*</font> </a>
                        <input type="number" name="f_tarif_biaya"  class="form-control" id="js_get_tarif_biaya" placeholder="Tarif Biaya">
                        
                    </div>

                    <div class="col-sm-12" align="left">
                        <a>Jumlah Hari <font color=red>*</font> </a>
                        <input type="number" name="f_jumlah_hari" min="1" value="1" class="form-control" id="js_get_jumlah_hari" placeholder="Jumlah Hari">
                        
                    </div>

                    <div class="col-sm-12" align="left">
                        <a>Total Biaya <font color=red>*</font> </a>
                        <input type="text" name="f_total_tagihan"  class="form-control" id="js_get_total_tagihan" placeholder="Jumlah Hari" readonly>
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn bg-blue " data-dismiss="modal" href="#">Batal</button>
                <button type="submit" class="btn bg-blue "  id="send_edit2">Ubah</button>
            </div>
               </form>
               
        
        </div>
    </div>
</div>

<div id="konfirmasi_hapus" class="modal modal-edu-general FullColor-popup-DangerModal fade" role="dialog">

		<div class="modal-dialog">

			<div class="modal-content">

				<div class="modal-close-area modal-close-df">

					<a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>

				</div>

				<div class="modal-body">

					<span class="educate-icon educate-warning modal-check-pro information-icon-pro"></span>

					<h2>Warning</h2>

					<div class="modal-body">
                        <b class="message"></b><br>
                    </div>

					
				</div>

				<div class="modal-footer">

					<a class="btn btn-danger btn-ok" style="background-color: red;"> Yes</a>

					<a class="btn btn-primary" data-dismiss="modal" href="#"> No</a>

				</div>

			</div>

		</div>

	</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

<script src="<?php echo base_url(); ?>assets/js/jquery-1.11.1.min.js"></script>

<script src="<?php echo base_url(); ?>assets/js-data/pasien/js-data.js"></script>



