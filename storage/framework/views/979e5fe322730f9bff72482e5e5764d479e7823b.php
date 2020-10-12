<table>
    <thead>
        <tr>
            <th><b>No</b></th>
            <th><b>Data Input</b></th>
            <th><b>Nama</b></th>
            <th><b>Status</b></th>
            <th><b>Umur</b></th>
            <th><b>Jenis Kelamin</b></th>
            <th><b>Kab/Kota</b></th>
            <th><b>Kecamatan</b></th>
            <th><b>Desa</b></th>
            <th><b>Jenis Transportasi</b></th>
            <th><b>Berkunjung Dari Negara</b></th>
            <th><b>Berkunjung Dari Daerah</b></th>
            <th><b>Lokasi Rawat</b></th>
            <th><b>Lama Pantau</b></th>
            <th><b>Tanggal PDP</b></th>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $people; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$person): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($key+1); ?></td>
            <td><?php echo e(Carbon::create($person->created_at->toDateTimeString())->isoFormat('DD/MM/YY')); ?></td>
            <td><?php echo e($person->name); ?></td>
            <td>ODP</td>
            <td><?php echo e($person->age); ?></td>
            <td><?php echo e(($person->gender == 'Laki-Laki') ? 'L' : 'P'); ?></td>
            <td>Melawi</td>
            <td><?php echo e($person->district); ?></td>
            <td><?php echo e($person->village); ?></td>
            <td><?php echo e($person->vehicle); ?></td>
            <td>indonesia</td>
            <td><?php echo e($person->track); ?></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<?php /**PATH /home/u6434366/public_html/xProductionx/covid-2020/resources/views/exports/laporanHarianProvinsiODP.blade.php ENDPATH**/ ?>