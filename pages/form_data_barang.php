  <?php

  include '../koneksi.php';

  $id = $_GET['ID_GRP'];
  $tampil1 = mysql_query("select * from dt_grp where ID_GRP='$id'");
  $data1 = mysql_fetch_array($tampil1);

  
 
$chek_id = mysql_query("SELECT a.id_grp FROM (SELECT * from dt_grp where PARENT_ID='$id') a
    UNION
    SELECT b.id_grp FROM (SELECT * from dt_grp where PARENT_ID IN(SELECT ID_GRP from dt_grp where PARENT_ID='$id')) b");
  $chek_num=mysql_num_rows($chek_id);



  $chek_nama_barang = mysql_query("select * from dt_brg where ID_GRP='$id'");
  $chek_nama_barang_ada=mysql_num_rows($chek_nama_barang);
  // echo "nama barang = $chek_nama_barang_ada<br>";
 // echo "ada sub group = $chek_num<br>";


 

  ?>



  <script>
  $(document).ready(function() {
    $('#tabel-data').DataTable( {
    } );
  } );
</script>	
<!-- Button Tambah group Barang -->


<ol class="breadcrumb" style="margin:0;border-radius:0; width: 100%; ">
 <li class="">Data Barang</li>
 <li class="active"><?php echo $data1['NAMA_GRP'];?></li>
</ol>
<p style="margin-top: 5px;">
 <button type="button" id="tambah_sub_group" class="btn btn-info" data-toggle="modal" data-target="#Modal_group" ><b>Tambah Sub Group</b></button>
 <!--Button tambah data barang-->
 <button type="button" id="tambah_barang" class="btn btn-info" data-toggle="modal" data-target="#Modal_barang" ><b>Tambah Barang</b></button>

 <button type="button" id="tambah_barang" class="btn btn-info" data-toggle="modal" data-target="#Modal_barang" ><b>Edit Group</b></button>
</p>
<!--- Modal Tambah Group Barang -->
<div id="Modal_group" class="modal fade" role="dialog" data-keyboard="false" data-backdrop="false">
  <div class="modal-dialog">
   <form method="post" class="form-sub-grp-brg">
    <div class="modal-content">
      <div class="modal-header" style="background:#9cd9e6;">
        <button type="button" class="close" onclick="" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" style="text-align: center;">Tambah Group Barang</h4>
      </div>
      <div class="modal-body">
        <div class="pesan"></div>
        <table class="table table-bordered" style="font-size: 12px;">
           <tr>
          <td style="font-size: 15px; font-weight: bold;">Nama Group Barang</td>
          <td>
            <input type="text" name="id_grp" class="form-control" disabled="" id="nama_grp" onkeyup="this.value = this.value.toUpperCase()" autocomplete="off" value="<?php echo $data1['NAMA_GRP'];?>">
            <div id="result" style="color: red;"></div>
          </td>
        </tr> 
         <tr>
          <td style="font-size: 15px; font-weight: bold;">Nama Sub Group Barang</td>
          <td>
            <input type="text" name="nama_grp_brg" class="form-control" required="" id="nama_grp_brg" onkeyup="this.value = this.value.toUpperCase()" autocomplete="off" value="">
            <div id="result" style="color: red;"></div>
          </td>
        </tr>	
        <tr>
          <td style="font-size: 15px; font-weight: bold;">Keterangan Barang</td>

          <td><input type="text" name="ket_brg" class="form-control" required="" value="" id="ket_brg" autocomplete="off"></td>
        </tr>
      </table>
    </div>
    <div class="modal-footer" style="background: #eee;">
      <input type="button" value="SIMPAN" id="simpan" onclick="SimpanSupGroup()" class="btn btn-primary btn-md tombol-simpan" name="tambah">
      <div id="success"></div>

    </div>
  </div>
</form>
</div>
</div>

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
<!--- Modal Tambah Data Barang -->
<?php
 if ($chek_num == '0' AND $chek_nama_barang_ada == '0') {
    // echo "Bisa tambah group dan data barang";

  } else if ( $chek_num > 0 ) {
 // echo "tidak bisa tambah barang tapi bisa tambah group";
 
while($tampil_id=mysql_fetch_array($chek_id)){
 $tsss=$tampil_id['ID_GRP'];
 $barang=mysql_query("SELECT a.*, b.* FROM dt_brg a JOIN dt_grp b ON a.ID_GRP=b.ID_GRP WHERE a.ID_GRP IN($tsss)");
 $no=1;
while ($tampil_barang=mysql_fetch_array($barang)){
  // echo "barang adalah : $tampil_barang[NAMA_BRG] - $tampil_barang[ID_GRP]<br>";
?>
   <tr>
      <td><?php echo $no;?></td> 
      <td><?php echo $tampil_barang['NAMA_BRG'];?></td>
      <td><?php echo $tampil_barang['NAMA_GRP'];?></td>
      <td><?php echo $tampil_barang['KET_BRG'];?></td>
    </tr>
<?php
}
}

   
    echo "<script>
    document.getElementById('tambah_barang').disabled = true;        
    </script>";



  } else if( $chek_num == '0' AND $chek_nama_barang_ada == '0' || $chek_nama_barang_ada > 0  ) {

    // echo "tidak bisa tambah group barang tapi tidak bisa tambah barang";
    echo "<script>
    document.getElementById('tambah_sub_group').disabled = true;
    </script>";



    ?>



  <?php
  $query=mysql_query("SELECT a.*, b.* FROM dt_brg a JOIN dt_grp b ON a.ID_GRP=b.ID_GRP WHERE a.ID_GRP='$id'")or die(mysql_error());
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

<?php
  }

  ?>

<script>
  function SimpanSupGroup(){
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