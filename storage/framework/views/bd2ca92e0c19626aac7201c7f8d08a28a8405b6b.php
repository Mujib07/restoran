<?php if(count($datas)>0): ?>
  <div class="panel-process">
    <span id="img-title" class="employee"></span>
    <label id="label-title">Olah Data Pegawai</label>
    <div id="shsearch"><input type="text" class="animasi" onkeyup="search_data(this,'data-table')" placeholder="Cari Pegawai" title="Mencari data pegawai"/></div>
  </div>
  <div class="wrap-table">
    <div class="option">
      <button type="button" onclick="popup('addemployee',1)" style="background-size:30px;padding-left:44px;" class="new green prosesbtn animasi">Tambah Pegawai</button>
    </div>
    <table id="data-table" class="data-table">
      <thead>
        <tr>
          <th>No</th>
          <th>NIP</th>
          <th>Nama Pegawai</th>
          <th>Jabatan</th>
          <th>Tanggal Masuk</th>
          <th colspan="2">Proses</th>
        </tr>
      </thead>
      <tbody id="bodycontent">
        <?php 
          $i=1;
         ?>
        <?php $__currentLoopData = $datas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr>
            <td><?php echo e($i++); ?></td>
            <td><?php echo e($data->NIP); ?></td>
            <td><?php echo e($data->nama); ?></td>
            <td style="text-transform:capitalize"><?php echo e(strtolower($data->jabatan)); ?></td>
            <td><?php echo e($data->masuk); ?></td>
            <td><button type="button" onclick="editpegawai('<?php echo e($data->NIP); ?>')" class="whiteedit prosesbtn green animasi">Edit</button></td>
            <td><button type="button" onclick="hapuspegawai('<?php echo e($data->NIP); ?>','<?php echo e($data->nama); ?>')" class="whitetrash prosesbtn red animasi">Hapus</button></td>
          </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </tbody>
    </table>
  </div>
<?php else: ?>
  <center>
    <div class="not-found">
      <?php echo e($pesan); ?>

      <br>
      <button type="button" style="background-size:30px;padding-left:44px;" class="new green prosesbtn animasi" onclick="popup('addemployee',1)">Tambah Pegawai</button>
    </div>
  </center>
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
