<?php $__currentLoopData = $datas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<script type="text/javascript">
  if(document.getElementById("t_databahan")){
    var parent = document.getElementById("tampil-data");
    var child = document.getElementById("t_databahan");
    parent.removeChild(child);
  }
</script>
<div class="panel-header">
  <button type="button" class="green save prosesbtn animasi" id="simpan" onclick="update_food(<?php echo e($data->no_hidangan); ?>)" name="button">Simpan</button>
  <button type="button" class="red back prosesbtn animasi" id="simpan" onclick="kembali()" name="button">Kembali</button>
</div>
<form id="serialdata" method="post" role="form" enctype="multipart/form-data">
  
  <div class="panel-header">
    <label for="judul">*Nama Hidangan:</label>
    <textarea id="judul" class="judul_dish animasi" onkeyup="generate_info()" onkeydown="if(event.keyCode==13)return false" oninput="autoheight()" name="nama_hidangan"></textarea>
    <script>document.getElementById("judul").value="<?php echo e($data->nama_hidangan); ?>"</script>
    <table>
      <tr><td>Dibuat<td>:<td><?php echo e($data->created_at); ?>

      <td width="20px"><td>Terakhir diubah<td>:<td><?php echo e($data->updated_at); ?>

    </table>
  </div>
  <hr>
  <div class="content-edit">
    <div class="image-config">
      <div id="info" class="image-option info">
        <b><span  style="color:yellow">Tambahkan Gambar:</span> <?php echo e($data->nama_hidangan); ?></b>
      </div>
      <div id="image-edit" class="image-edit">
        <img src="<?php echo e($url); ?>" name="img" id="img">
      </div>
      <div class="image-option">
        <button id="unggah" type="button" onclick="browse()" class="brick blackupload prosesbtn animasi" name="button">UNGGAH</button>
        <input id="mask-browse" class="mask-browse" name="maskbrowse" onchange="ValidateSingleInput(this)" type="file">
        <button id="delete-image" type="button" onclick="delete_image()" class="green1 blacktrash prosesbtn animasi" name="button">HAPUS</button>
        <input id="path" type="text" readonly>
      </div>
      <script type="text/javascript">
        var cek_gambar = $("#img").attr('src');
        if(cek_gambar!='<?php echo asset("public/gambar/notfound.png"); ?>'){
          $("#unggah").attr("disabled","disabled");
        }else{
          $("#delete-image").attr('disabled','disabled');
        }
      </script>
    </div>
    <div class="form-isian" enctype="multipart/form-data">
      <fieldset class="form-dish">
        <label for="jenis">*Jenis Hidangan:</label>
        <select id="jenis" class="animasi" name="jenis">
          <option value="">Pilih Jenis</option>
          <option value="APP">Hidangan Pembuka</option>
          <option value="MAC">Hidangan Utama</option>
          <option value="DES">Hidangan Penutup</option>
          <option value="SOF">Minuman</option>
        </select>
        <script type="text/javascript">
          document.getElementById("jenis").value="<?php echo e($data->kode_tipe); ?>";
        </script>
        <label for="harga">*Harga Hidangan:</label>
        <input id="harga" class="animasi" type="number" onkeyup="validasi(event,this)" step="1000" min=0 placeholder="Rp.0" name="harga" value="<?php echo e($data->harga); ?>">
        <label>Nama Koki Pembuat:</label>
        <input type="text" class="animasi" value="<?php echo e($data->nama); ?>" name="koki_name" readonly>
        <label for="komposisi">Komposisi:</label>
        <textarea class="animasi" id="komposisi" name="komposisi" placeholder="Ketikkan disini" rows="8" cols="80"><?php echo e($data->komposisi); ?></textarea>
        <label for="cara_buat">Cara Buat:</label>
        <textarea class="animasi" id="cara_buat" name="cara_buat" placeholder="Ketikkan disini" rows="8" cols="80"><?php echo e($data->cara_buat); ?></textarea>
      </fieldset>
    </div>
    <div class="panel-resep">
      <div class="data-resep">
        <div class="sub">Resep</div>
        <button class="btn-atur-resep brick animasi" onclick="pilih_bahan()" type="button" name="atur" id="atur">Atur</button>
        <div id="dataresep">
          <table width="100%" id="t_resep" name="t_resep">
            <?php $__currentLoopData = $recipes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $recipe): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <script>
              addNewRow('<?php echo e($recipe->no_bahan); ?>','<?php echo e($recipe->nama_bahan); ?>','<?php echo e($recipe->jumlah); ?>','<?php echo e($recipe->keterangan); ?>');
              </script>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </table>
        </div>
      </div>
    </div>
  </div>
  <input type="hidden" name="no" value="<?php echo e($data->no_hidangan); ?>">
  <input type="hidden" name="tempimg" id="tempimg" value=1>
</form>
<?php if(session()->has('message')): ?>
  <script>
  swal({
    title: "<?php echo e(session()->get('title')); ?>",
    text: "<?php echo e(session()->get('message')); ?>",
    type: "<?php echo e(session()->get('type')); ?>",
    confirmButtonColor: "#2b5dcd",
    confirmButtonText: "OK",
    closeOnConfirm: true
  });
  </script>
  <?php
    session()->forget('message');
  ?>
<?php endif; ?>
