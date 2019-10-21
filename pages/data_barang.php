<script>
  $(document).ready(function() {
    $('#tabel-data').DataTable( {
    } );
  } );
</script>



<script type="text/javascript">
  $(document).ready(function (){
    $(".data_grp").click(function (e){
      e.preventDefault();
      var m = $(this).attr("id");
      $.ajax({
        url: "pages/form_data_barang.php",
        type: "GET",
        data : {ID_GRP: m,},
        success: function(data){
          $(".kolom2").fadeOut(300, function(){
            $(".kolom2").html(data).delay(250).fadeIn(300);
          });
        }
      });
    });
  });
</script>



<!-- <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-treeview/1.2.0/bootstrap-treeview.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-treeview/1.2.0/bootstrap-treeview.min.css" /> -->

  <div class="col-md-1" style=""></div>
  <div class="col-md-2" style="padding: 0px;">
   <a href="index_user.php?p=data_barang" class="list-group-item active" style="font-weight: bold; text-align: center;">
     Group Barang
   </a>
   <div class="list-group" style="overflow: auto; height: 500px; border: solid 1px blue; margin-bottom:5px; background: white;">
     <div class="tampildata">

      <?php include "data_group.php"; ?>

    </div>
  </div>
</div>
<button type="button" class="btn btn-info" data-toggle="modal" style="width: 100%; margin-bottom: 5px;" data-target="#Modal_tambah_group" ><b>Tambah Group</b></button>
<!--Modal Tambah Group-->
<div id="Modal_tambah_group" class="modal fade" role="dialog" data-keyboard="false" data-backdrop="false">
  <div class="modal-dialog">
   <form method="post" class="form-grp">
    <div class="modal-content">
      <div class="modal-header" style="background:#9cd9e6;">
        <button type="button" class="close" onclick="" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" style="text-align: center;">Tambah Group</h4>
      </div>
      <div class="modal-body">
        <div class="pesan"></div>
        <table class="table table-bordered" style="font-size: 12px;">
         <tr>

          <td style="font-size: 15px; font-weight: bold;">Nama Group</td>
          <td>
            <input type="text" name="nama_grp" class="form-control" required="" id="nama_grp" onkeyup="this.value = this.value.toUpperCase()" autocomplete="off" value="">
            <div id="result" style="color: red;"></div>
          </td>
        </tr> 
        <tr>
          <td style="font-size: 15px; font-weight: bold;">Keterangan Group</td>

          <td><input type="text" name="ket_grp" class="form-control" required="" value="" id="ket_grp" autocomplete="off"></td>
        </tr>
      </table>
    </div>
    <div class="modal-footer" style="background: #eee;">
      <input type="button" value="SIMPAN" id="simpan" onclick="SimpanDataGroup()" class="btn btn-primary btn-md tombol-simpan" name="tambah">
      <div id="success"></div>
    </div>

  </div>
</form>
</div>
</div>


</div>

<div class="col-md-8" style="padding: 0px; margin-left: 5px; height: 590px; overflow: auto;">
 <!--breadcum-->	

 <div class="kolom2" style="padding-top: 0px">

  <div class="table-responsive">
   <!-- <table id="tabel-data" style="font-size : 12px;" class="demo-table"> -->
    <table class="demo-table" id="tabel-data" style="margin-bottom: 10px; width: 100%;">
      <thead>
       <tr class="info">
        <th>No</th>
        <th>Nama Barang</th>
        <th>Group Barang</th>
        <th>Ket Barang</th>
      </tr>
    </thead>
    <tbody>

     <?php
     $query=mysql_query("select * from dt_grp,dt_brg  where ID_BRG and dt_grp.ID_GRP=dt_brg.ID_GRP order by ID_BRG desc")or die(mysql_error());
     $no=1;
     while ($data = mysql_fetch_array($query)){
      ?>
      <tr>
        <td><?php echo $no;?></td> 
        <td><?php echo $data['NAMA_BRG'];?></td>
        <td><?php echo $data['NAMA_GRP'];?></td>
        <td><?php echo $data['KET_BRG'];?></td>

        <?php
        $no++;
      }
      ?>
    </tr>
  </tbody>
</table>
</div>

</div>

</div>
<div class="col-md-1" style=""></div>





<script>
  function SimpanDataGroup(){
    var nama_grp = document.getElementById("nama_grp").value;
    // var ket_grp = document.getElementById("ket_grp").value;
    
    if(nama_grp == ''){
      alert("Nama Group Harus Di isi");
      return false;
    } 

    var data = $('.form-grp').serialize();
    $.ajax({
      type: 'POST',
      url: "pages/insert_grp_brg.php",
      data: data,
      success: function(hasil) {
        if(hasil > 0) {
         alert('Nama Group Sudah Ada');
       }
       else {
         // $('.tampildata').load("pages/tampil_grp_brg.php");
         alert('Group berhasil di Tambah');history.go(0);
         document.getElementById("nama_grp").value = "";
         document.getElementById("ket_grp").value = "";
       }
     }

   });
  }



</script>