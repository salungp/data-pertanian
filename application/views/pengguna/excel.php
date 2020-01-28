<?php
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=pengguna-".date('d-m-Y-').uniqid().".xls");
?>
<table border="1">
  <thead>
  <tr>
    <th>NO</th>
    <th>NAMA</th>
    <th>ALAMAT</th>
    <th>NO HP</th>
    <th>BRANDWITH</th>
    <th>TGL PASANG</th>
    <th>IP ADDRESS</th>
  </tr>
  </thead>
  <?php $i = 1; ?>
  <tbody>
  <?php foreach ($data as $key) : ?>
    <tr>
      <td><?php echo $i++; ?></td>
      <td><?php echo $key['name']; ?></td>
      <td><?php echo $key['address']; ?></td>
      <td><?php echo $key['phone_number']; ?></td>
      <td><?php echo $key['brandwith']; ?></td>
      <td><?php echo date('d M Y', strtotime($key['tgl_pasang'])); ?></td>
      <td><?php echo $key['ip_address']; ?></td>
    </tr>
  <?php endforeach; ?>
  </tbody>
</table>