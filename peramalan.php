<html>
  <head>
    <title>Aplikasi Forecasting</title>
    <script src="css/3.3.5"></script>
    <!-- <style>
      body {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
      }
    </style> -->
    <link rel="stylesheet" href="./css/style.css">
  </head>
  
  <body class="p-5 h-screen bg-gray-100">
  <menu>
    <div class="max-w-sm rounded-lg overflow-hidden shadow-lg bg-white p-6">
      <h1 class="text-xl mb-12 p-8 text-center text-cyan-700 font-bold">Aplikasi Forecasting</h1>    
        <form id="form1" name="form1" method="post" action="data_penjualan.php">Peramalan penjualan untuk
          <select class="ms-2 w-12 rounded-md bg-white" role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1"" name="list_pilihan" id="list_pilihan">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
          </select>
           minggu berikutnya
          <br>
          <div class="mt-4 flex justify-between">
          <button href="./index.php" class="text-cyan-800 bg-white outline-gray-500" name="prediksi" id="prediksi" value="prediksi">Kembali</button>
          <button type="submit" class="text-white bg-cyan-700 hover:bg-cyan-800 focus:ring-4 focus:ring-cyan-300 font-medium rounded-lg text-sm p-2 dark:hover:bg-cyan-700 focus:outline-none dark:focus:ring-cyan-800" name="prediksi" id="prediksi" value="prediksi">Prediksi</button>
          </div>
      </form>
    </div>
  </menu>
    
  </body>
</html>