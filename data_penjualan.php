<?php
  extract($_GET);
  extract($_POST);
  include "koneksi.php";
?>
<html>
  <head>
    <title>Aplikasi Forecasting</title>
    <script src="css/3.3.5"></script>
    <style>
      body {
        background-color: #e5e5f7;
        opacity: 0.8;
        background: radial-gradient(circle, transparent 20%, #e5e5f7 20%, #e5e5f7 80%, transparent 80%, transparent), radial-gradient(circle, transparent 20%, #e5e5f7 20%, #e5e5f7 80%, transparent 80%, transparent) 47.5px 47.5px, linear-gradient(#9fdbef 3.8000000000000003px, transparent 3.8000000000000003px) 0 -1.9000000000000001px, linear-gradient(90deg, #9fdbef 3.8000000000000003px, #e5e5f7 3.8000000000000003px) -1.9000000000000001px 0;
        background-size: 95px 95px, 95px 95px, 47.5px 47.5px, 47.5px 47.5px;
      }
    </style>
  </head>

  <body class="p-5 h-screen bg-gray-100">
  <button>
    <a href="./index.php" class="flex items-center p-2 font-semibold bg-gray-100 rounded-lg hover:bg-gray-300">
      <img src="./css/exit.svg" class="h-5 w-5 mr-1">
      Kembali
    </a> 
  </button>

  <h1 class="text-xl mb-2 text-center text-cyan-700 font-bold">Aplikasi Forecasting</h1>
    <div class="mx-12 overflow-hidden rounded-lg border border-gray-300">
    <table class="w-full">
      <thead class="bg-gray-50 border-b-2 border-gray-200">
        <tr>
          <th class="p-3 text-sm font-semibold tracking-wide">No</th>
          <th class="p-3 text-sm font-semibold tracking-wide">Time Series</th>
          <th class="p-3 text-sm font-semibold tracking-wide">X</th>
          <th class="p-3 text-sm font-semibold tracking-wide">Penjualan (Y)</th>
          <th class="p-3 text-sm font-semibold tracking-wide">XX</th>
          <th class="p-3 text-sm font-semibold tracking-wide">XY</th>
        </tr>
      </thead>  
      <tbody>
      <?php
        $total_x = 0;
        $total_y = 0;
        $total_xx = 0;
        $total_xy = 0;
        $x = 0; 
        $no = 1;
        $color = "gray-100";
        
        $sql = "SELECT * FROM penjualan ORDER BY id_jual ASC";
        $qr = mysqli_query($conn_forecasting, $sql) or die("Gagal Query" . mysqli_error($conn_forecasting));
        
        while ($hs = mysqli_fetch_assoc($qr)) {
            $minggu = $hs['minggu'];
            $bulan = $hs['bulan'];
            $tahun = $hs['tahun'];
            $jumlah = $hs['jumlah'];
            $y = $jumlah;             
            $xx = $x * $x;
            $xy = $x * $y;
        
            $total_x += $x;
            $total_y += $y;
            $total_xx += $xx;
            $total_xy += $xy;
          
            if ($no % 2 == 0) {
              $color = "white";
            } else {
              $color = "gray-100";
            }
            
            echo "<tr class=\"bg-$color\">
                    <td class=\"p-2 text-sm text-center text-gray-800\">$no</td>
                    <td class=\"p-2 text-sm text-center text-gray-800\">Minggu ke-$minggu Bulan $bulan $tahun</td>
                    <td class=\"p-2 text-sm text-center text-gray-800\">$x</td>
                    <td class=\"p-2 text-sm text-center text-gray-800\">$y</td>
                    <td class=\"p-2 text-sm text-center text-gray-800\">$xx</td>
                    <td class=\"p-2 text-sm text-center text-gray-800\">$xy</td>
                  </tr>";
        
            $no++;
            $x++;
        }
        
        // Menghitung rata-rata
        $jumlah_data = $no; 
        $rata_x = round($total_x / $jumlah_data, 2);
        $rata_y = round($total_y / $jumlah_data, 2);
        ?>
        <tr class="bg-gray-100">
          <td class="p-2 font-semibold text-sm text-center text-gray-800">Jumlah</td><td></td>
          <td class="p-2 font-semibold text-sm text-center text-gray-800"><?php echo $total_x; ?></td>
          <td class="p-2 font-semibold text-sm text-center text-gray-800"><?php echo $total_y; ?></td>
          <td class="p-2 font-semibold text-sm text-center text-gray-800"><?php echo $total_xx; ?></td>
          <td class="p-2 font-semibold text-sm text-center text-gray-800"><?php echo $total_xy; ?></td>
        </tr>
        <tr class="bg-white">
          <td class="p-2 font-semibold text-sm text-center text-gray-800">Rata-rata</td><td></td>
          <td class="p-2 font-semibold text-sm text-center text-gray-800"><?php echo $rata_x; ?></td>
          <td class="p-2 font-semibold text-sm text-center text-gray-800"><?php echo $rata_y; ?></td>
          <td class="p-2 font-semibold text-sm text-center text-gray-800">&nbsp;</td>
          <td class="p-2 font-semibold text-sm text-center text-gray-800">&nbsp;</td>
        </tr>
        </tbody>  
      </table>
    </div>
        
    <?php
      #Rumus Regresi Linear
      $b1 = (($x * $total_xy) - ($total_x * $total_y)) / (($x * $total_xx) - ($total_x * $total_x));
      $b1 = round($b1, 2);
      $b0 = ($total_y - ($b1 * $total_x)) / $x;
      $b0 = round($b0, 2);
      echo "<h1 class=\"text-xl m-2 text-center font-bold text-emerald-700\">Rumus Regresi Linear</h1>";
      echo "<p class=\"text-l mt-2 mb-4 font-semibold text-center\">Y = " . "$b0 + $b1" . "x
            <br>";
    ?>
    <?php
      if (isset($prediksi) && $prediksi) {
        // Lakukan prediksi hanya jika $prediksi telah didefinisikan dan bernilai true
        $x += $list_pilihan;
        $y = round($b0 + ($b1 * $x), 2);
        echo "<p class=\"text-center font-semibold pb-8\">Hasil prediksi penjualan untuk <span class=\"text-emerald-800\">$list_pilihan </span>minggu kedepan adalah <span class=\"text-emerald-800\">$y</span> buah.</p>";
    }
    ?>
  </body>
</html>