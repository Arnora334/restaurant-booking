<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Laporan Pemesanan</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
  <div class="max-w-5xl mx-auto">
    <h1 class="text-2xl font-bold mb-4">Laporan Pemesanan</h1>
    <a href="index.php" class="text-blue-600 hover:underline mb-4 inline-block">&larr; Kembali</a>

    <table class="min-w-full bg-white shadow rounded overflow-hidden">
      <thead class="bg-gray-100">
        <tr>
          <th class="px-4 py-2">Pelanggan</th>
          <th class="px-4 py-2">Meja</th>
          <th class="px-4 py-2">Tanggal</th>
          <th class="px-4 py-2">Waktu</th>
          <th class="px-4 py-2">Jumlah</th>
        </tr>
      </thead>
      <tbody>
        <?php
        require 'includes/database.php';
        require 'includes/classes/Pemesanan.php';
        foreach (Pemesanan::getAllWithDetails($pdo) as $p) {
          echo "<tr class='border-t'>
            <td class='px-4 py-2'>{$p['pelanggan']}</td>
            <td class='px-4 py-2'>Meja {$p['nomor_meja']}</td>
            <td class='px-4 py-2'>{$p['tanggal']}</td>
            <td class='px-4 py-2'>{$p['waktu']}</td>
            <td class='px-4 py-2'>{$p['jumlah_orang']}</td>
          </tr>";
        }
        ?>
      </tbody>
    </table>
  </div>
</body>
</html>