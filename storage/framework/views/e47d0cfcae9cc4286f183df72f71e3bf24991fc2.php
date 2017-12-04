<?php $__env->startSection('popup'); ?>
  <div id="popupBox">
    
    <div id="popcatatan" class="wrapper">
      <div class="head">
        <fieldset>
          <div><label>Catatan</label></div>
          <button type="button" class="close animasi" onclick="popup('popcatatan',0)">X</button>
        </fieldset>
      </div>
      <center>
        <div id="tampil-catatan" class="wrappop">

        </div>
      </center>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('child'); ?>
  <ul class="list-button">
    <li class="firstmenu"><a class="dashboard animasi" href="dashboard">Dashboard</a></li>
    <li class="active firstmenu"><a class="kitchen animasi" href="dapur">Mode Dapur</a></li>
    <li class="firstmenu"><a class="dish animasi" href="olah-data-hidangan">Olah Hidangan</a></li>
  </ul>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
  <div class="panel-process">
    <span id="img-title" class="kitchen"></span>
    <label id="label-title">Mode Dapur | Kelola Pesanan Pelanggan</label>
  </div>
  <div id="wrapdapur" class="wrap-table">
    <div id="list-pesan">
      <div class="title-list-pesan">
        Daftar Pemesan
      </div>
      <div id="wrap-table">

      </div>
    </div>
    <div id="daftar-pesanan">
      <div class="title-list-pesan">
        Daftar Pesanan Pelanggan
      </div>
      <div id="wrap-detail">

      </div>
    </div>
  </div>
  <script type="text/javascript">
    cek_pesanan();
    setInterval("cek_pesanan()",3000);
  </script>


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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.parent-layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>