
<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 id="judul">
        Table Data
        
      </h1>      
    </section>

    <!-- Main content -->
    <section class="content container-fluid" >

      <!--------------------------
        | Your Page Content Here |
        -------------------------->    
<!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title" id="judul2"></h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
              
              <button class="btn btn-primary" id="tambah_data"  onclick="tambah()">Tambah Data</button> 
              
<div class="table-responisve">
<table id="tbl_datanya" class="table  table-striped table-bordered"  cellspacing="0" width="100%">
      <thead>
        <tr>
              
              <th>No</th>
              <th width="10px">FID</th>           
              <th>Nama</th>                                                   
              <th>Jabatan</th>                     
              <th>OPD</th>                     
              <th>Gaji Pokok</th>                     
              <th>Photo</th>                     
              <th>Password</th>                     
              <th>Shift</th>                     
              <th>Action</th>                     
              
              
        </tr>
      </thead>
      <tbody>
        <?php         
        $no = 0;

        foreach($all as $x)
        {
          $btn = "<button class='btn btn-warning btn-xs' onclick='edit($x->id);return false;'>Edit</button>
                  <button class='btn btn-danger btn-xs' onclick='hapus($x->id);return false;'>Hapus</button>    ";
          $no++;
          
            echo (" 
              
              <tr>
                <td>$no</td>
                <td>$x->FID</td>
                <td>$x->Nama <br> <i>$x->NIK</i></td>                
                
                <td>$x->JABATAN</td>                
                
                <td>$x->OPD</td>                
                <td>".rupiah($x->COSTUM_7)."</td>                
                <td>$x->PHOTO</td>                
                <td>$x->COSTUM_6</td>                           
                <td>$x->nama_sift<br>$x->masuk - $x->keluar

                </td>                           
                
                <td>
                  $btn
                </td>
              </tr>
          ");
          
        }
        
        
        ?>
      </tbody>
  </table>
</div>

<a href="<?php echo(base_url())?>index.php/staff/data_xl" target="blank" class="btn btn-primary">Excel</a>

        </div>
        
      </div>
      <!-- /.box -->

</section>
    <!-- /.content -->




<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Form Data</h4>
      </div>
      <div class="modal-body">
          <form id="form_tambah_admin">
            <input type="hidden" name="id" id="id" class="form-control" readonly="readonly">            

            <div class="col-sm-4">Nama </div>
            <div class="col-sm-8"><input type="text" name="Nama" id="Nama" required="required" class="form-control" placeholder="Nama"></div>
            <div style="clear: both;"></div><br>

            <div class="col-sm-4">FID </div>
            <div class="col-sm-8"><input type="text" name="FID" id="FID" required="required" class="form-control" placeholder="FID"></div>
            <div style="clear: both;"></div><br>

            <div class="col-sm-4">NIP </div>
            <div class="col-sm-8"><input type="text" name="NIK" id="NIK" required="required" class="form-control" placeholder="NIP"></div>
            <div style="clear: both;"></div><br>

            <div class="col-sm-4">Jabatan </div>
            <div class="col-sm-8"><input type="text" name="JABATAN" id="JABATAN" required="required" class="form-control" placeholder="Jabatan"></div>
            <div style="clear: both;"></div><br>

            <div class="col-sm-4">Gaji Pokok </div>
            <div class="col-sm-8"><input type="text" name="COSTUM_7" id="COSTUM_7" required="required" class="form-control nomor" placeholder="Isi 0 jika tidak digunakan untuk pemotongan"></div>
            <div style="clear: both;"></div><br>

            <div class="col-sm-4">Sift </div>
            <div class="col-sm-8">
              <select name="COSTUM_8" id="COSTUM_8" required="required" class="form-control">
                <option value=""> -- Pilih Sift -- </option>
                <?php 
                foreach ($sift as $sf) {
                  echo "<option value='$sf->id'>$sf->nama_sift $sf->masuk - $sf->keluar</option>";
                }
                ?>
              </select>
              </div>
            <div style="clear: both;"></div><br>

            
            

            <div class="col-sm-4">Password </div>
            <div class="col-sm-8"><input type="text" name="COSTUM_6" id="COSTUM_6"  class="form-control" placeholder="Password/Isi jika mau ganti saja"></div>
            <div style="clear: both;"></div><br>
        
          <div class="col-sm-4">Gambar</div>
            <div class="col-sm-8">
              <input class="form-control" name="PHOTO" id="PHOTO" type="file" accept="image/jpeg,image/gif,image/png,application/pdf,image/x-eps">
            </div>
            <div style="clear: both;"></div><br>



        
        

            <div id="t4_info_form"></div>
            <button type="submit" class="btn btn-primary"> Simpan </button>
          </form>

          <div style="clear: both;"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>


<script>
console.log("<?php echo $this->router->fetch_class();?>");
var classnya = "<?php echo $this->router->fetch_class();?>";


hanya_nomor(".nomor");
function edit(id)
{
  $.get("<?php echo base_url()?>index.php/"+classnya+"/by_id/"+id,function(e){
    //console.log(e[0].id);
    $("#id").val(e[0].id);
    $("#FID").val(e[0].FID);
    $("#Nama").val(e[0].Nama);
    $("#NIK").val(e[0].NIK);
    $("#JABATAN").val(e[0].JABATAN);
    $("#COSTUM_7").val(e[0].COSTUM_7);
    $("#COSTUM_8").val(e[0].COSTUM_8);

    
    
  })
  $("#myModal").modal('show');
}

function tambah()
{
    $("#id").val('');
    
    
  $("#myModal").modal('show');
}

function hapus(id)
{
  if(confirm("Anda yakin menghapus?"))
  {
    $.get("<?php echo base_url()?>index.php/"+classnya+"/hapus/"+id,function(e){
      eksekusi_controller('<?php echo base_url()?>index.php/'+classnya+'/data',document.title);
    })  
  }
  
}

$("#form_tambah_admin").on("submit",function(){
  $("#t4_info_form").html('Loading...');
  if($("#pass_admin").val() != $("#conf_pass_admin").val())
  {
    
    $("#t4_info_form").html("<div class='alert alert-warning'>Password dan Confirm Password tidak sama.</div>").fadeIn().delay(3000).fadeOut();
    return false;
  }

  var ser = $(this).serialize();

      $.ajax({
            url: "<?php echo base_url()?>index.php/"+classnya+"/simpan_form",
            type: "POST",
            contentType: false,
            processData:false,
            data:  new FormData(this),
            beforeSend: function(){
                //alert("sedang uploading...");
            },
            success: function(e){
                console.log(e);
                $("#t4_info_form").html("<div class='alert alert-success'>Berhasil.</div>").fadeIn().delay(3000).fadeOut();
                  setTimeout(function(){
                    $("#myModal").modal('hide');
                  },3000);

                
            },
            error: function(er){
                $("#t4_info_form").html("<div class='alert alert-warning'>Ada masalah! "+er+"</div>");
            }           
       });
  return false;
})


$("#myModal").on("hidden.bs.modal", function () {
  eksekusi_controller('<?php echo base_url()?>index.php/'+classnya+'/data',document.title);
});

$(document).ready(function(){

  $('#tbl_datanya').dataTable();

});
$("#judul2").html("DataTable "+document.title);
</script>
