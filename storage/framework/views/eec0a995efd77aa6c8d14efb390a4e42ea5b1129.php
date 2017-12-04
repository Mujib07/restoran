<?php if(count($datas)>0): ?>
  <?php 
    $i=1;
    $hitung = 0;
    $jumpesan = 0;
    $jumlah = 0;
   ?>
  <?php $__currentLoopData = $datas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
      <td><?php echo e($i++); ?></td>
      <td><?php echo e($data->nama); ?></td>
      <td id="harga<?php echo e($data->notrans); ?>" data-value="<?php echo e($data->harga); ?>">Rp. <?php echo e(number_format($data->harga,0,',','.')); ?></td>
      <?php if($data->sts == 0): ?>
        <td><input type="number" value="<?php echo e($data->jml); ?>" onfocus="clearInterval(loadinterval);this.select()"  onchange="simpan_jumlah(<?php echo e($data->notrans); ?>,this)" onblur="simpan_jumlah(<?php echo e($data->notrans); ?>,this);loadinterval = setInterval('load_keranjang()',3000)" onkeyup="justnumber(this);hitung_total(<?php echo e($data->notrans); ?>,this.value);" min=1></td>
      <?php else: ?>
        <td> <?php echo e($data->jml); ?></td>
      <?php endif; ?>
      <td id="total<?php echo e($data->notrans); ?>">Rp. <?php echo e(number_format(($data->harga*$data->jml),0,',','.')); ?></td>
      <?php 
        $jumlah = $jumlah + $data->jml;
        $hitung = $hitung + ($data->harga * $data->jml);
        switch ($data->sts) {
          case 0:$sts = "Belum dipesan";break;
          case 1:$sts = "Dipesan";break;
          case 2:$sts = "Dibuat";break;
          case 3:$sts = "Selesai";$jumpesan++;break;
          case 4:$sts = "Tidak dapat dibuat";
              session()->flash('title','Pemberitahuan');
              session()->flash('type','info');
              session()->flash('message',"Hidangan $data->nama tidak dapat dibuat karena beberapa alasan, hidangan ini akan dihapus secara otomatis dari keranjang belanja anda, mohon maaf atas ketidaknyamanannya");
          break;
        }

       ?>
      <td><?php echo e($sts); ?></td>
      <?php if($data->sts==0): ?>
        <td><a href="#" class="iconprosesorder memo animasi" onclick="get_catatan(<?php echo e($data->notrans); ?>);popup('catatan',1)" type="button" id="catatan<?php echo e($data->notrans); ?>"></a></td>
        <td><a href="#" class="blacktrash iconprosesorder animasi" type="button" id="hapus<?php echo e($data->notrans); ?>" onclick="hapus_transaksi(<?php echo e($data->notrans); ?>)"></a></td>
      <?php else: ?>
        <td>-</td>
        <td>-</td>
      <?php endif; ?>
      <?php if($data->sts == 4): ?>
        <script type="text/javascript">
          hapus_transaksi(<?php echo e($data->notrans); ?>);
        </script>
      <?php endif; ?>
    </tr>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

  <script type="text/javascript">
    if(<?php echo e($jumlah); ?>>0){
      $("#notification").css("display","block");
      stop_interval();
      start_interval();
    }
    $("#notification").html(<?php echo e($jumlah); ?>);
    $("#hitungbelanja").html("Rp. <?php echo e(number_format($hitung,0,',','.')); ?>");
    $("#tempjum").val(<?php echo e($i-1); ?>);
    $("#temppesan").val(<?php echo e($jumpesan); ?>);
  </script>
<?php else: ?>
  <script type="text/javascript">
    stop_interval();
    $("#notification").css("display","none");
    $("#notification").html("0");
    $("#hitungbelanja").html("Rp. 0");
    $("#tempjum").val(0);
    $("#temppesan").val(0);
  </script>
<?php endif; ?>
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
  <?php session()->forget('message');?>
<?php endif; ?>
