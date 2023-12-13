<html>
<head>
  <title>Aplikasi Forecasting</title>
  <script src="css/3.3.5"></script>
  <link rel="stylesheet" href="./css/style.css">
</head>

<body class="p-5 h-screen bg-gray-100">
  <menu>
    <div class="max-w-lg rounded-lg overflow-hidden shadow-lg bg-white p-8">
      <h1 class="text-xl mb-8 p-6 text-center text-cyan-700 font-bold">Aplikasi Forecasting</h1>
      <p class="ml-4 my-4 font-semibold">Data Penjualan</p>
      <form action="simpan.php" method="post">
    <table>
      <tr>
        <td class="py-1">Minggu Ke</td>
        <td>
          <select class="ms-2 w-12 rounded-md text-center" name="list_minggu" id="list_minggu">
                          <option value="1">I</option>
                          <option value="2">II</option>
                          <option value="3">III</option>
                          <option value="4">IV</option>
                          <option value="5">V</option>
                        </select>
        </td>
      </tr>
      <tr>
        <td class="py-1">Bulan</td>
          <td>
            <select class="ms-2 w-30 rounded-md text-center" name="list_bulan" id="list_bulan">
                <option value="01">Januari</option>
                <option value="02">Februari</option>
                <option value="03">Maret</option>
                <option value="04">April</option>
                <option value="05">Mei</option>
                <option value="06">Juni</option>
                <option value="07">Juli</option>
                <option value="08">Agustus</option>
                <option value="09">September</option>
                <option value="10">Oktober</option>
                <option value="11">November</option>
                <option value="12">Desember</option>
              </select>
          </td>
      </tr>
      <tr>
        <td class="py-1">Tahun</td>
        <td>
          <input name="tahun" id="tahun" type="year" class="ms-2 w-16 rounded-md border-0 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 sm:text-sm sm:text-center sm:leading-6" placeholder="20XX">
        </td>
      </tr>
      <tr>
        <td class="w-48 py-1">Jumlah Penjualan</td>
          <td>
            <input name="jumlah" id="jumlah" type="number" class="pl-3 ms-2 w-16 rounded-md border-0 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 sm:text-sm sm:text-center sm:leading-6" placeholder="0000">
          </td>
      </tr>
    </table>
    <br>
    <div class="mt-4 flex justify-between">
      <a href="./index.php " class="p-2 bg-white text-cyan-700 font-medium rounded-lg hover:bg-gray-200">
      Kembali</a>
      <button type="submit" class="text-white bg-cyan-700 hover:bg-cyan-800 focus:ring-4 focus:ring-cyan-300 font-medium rounded-lg text-sm p-2" name="simpan" id="simpan" value="simpan">Simpan</button>
    </div>
  </form>
    </div>
  </menu>
</html>