<?php if(count($datas)>0): ?>
  <?php $__currentLoopData = $datas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
      <td><?php echo e($data->no_report); ?></td>
      <td><?php echo e($data->tanggal); ?></td>
      <td>Rp. <?php echo e(number_format($data->budget,0,',','.')); ?></td>
      <td>Rp. <?php echo e(number_format($data->belanja,0,',','.')); ?></td>
      <td><?php echo e($data->nama); ?></td>
      <td><button onclick="edit_data(<?php echo e($data->no_report); ?>)" class="whiteedit prosesbtn green" type="button">Edit</button></td>
      <td><button onclick="delete_data(<?php echo e($data->no_report); ?>)" class="whitetrash prosesbtn red" type="button">Hapus</button></td>
    </tr>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
