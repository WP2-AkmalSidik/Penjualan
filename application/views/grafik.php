<style>
    /* Tambahkan animasi CSS */
    @keyframes slideIn {
        from {
            transform: translateY(100%);
        }

        to {
            transform: translateY(0);
        }
    }

    #salesBarChart {
        animation: slideIn 1s ease-out;
    }

    #tabledata {
        animation: slideIn 1s ease-out;
    }

    #judul {
        animation: slideIn 1s ease-out;
    }

    /* Tambahkan sedikit CSS untuk penyesuaian tampilan */
    body {
        padding: 20px;
    }

    /* Warna latar belakang baris ganjil */
    tbody tr:nth-child(odd) {
        background-color: #f8f9fa;
    }

    /* Warna latar belakang baris genap */
    tbody tr:nth-child(even) {
        background-color: #e9ecef;
    }

    /* Warna latar belakang header */
    thead {
        background-color: #007bff;
        color: #ffffff;
    }
    th, td {
        width: 50px; /* Ganti dengan lebar yang diinginkan */
        text-align: center;
    }
</style>
<div class="container" id="judul">
    <div class="row">
        <div class="col-md-12">
            <h3 class="text-center">Sumber data dari <br> Dinas Perindustrian dan Perdagangan Kota Tasikmalaya</h3>
        </div>
    </div>
</div>
<div id="salesBarChartContainer">
    <div id="salesBarChart"></div>
</div>
<script>
    // Data penjualan pertahun (gantilah sesuai kebutuhan)
    var salesDataPerYear = {
        2021: [10000, 12500, 15000, 17500, 20000, 22500, 25000, 27500, 30000, 32500, 35000, 37500],
        2022: [15000, 17500, 20000, 22500, 25000, 27500, 30000, 32500, 35000, 37500, 40000, 42500],
        2023: [10000, 12000, 15000, 18000, 20000, 22000, 25000, 27000, 30000, 32000, 35000, 37000],
        // Tambahkan data penjualan untuk tahun-tahun berikutnya
    };

    // Menyiapkan data untuk plot
    var data = Object.keys(salesDataPerYear).map(function(year) {
        return {
            x: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            y: salesDataPerYear[year],
            type: 'bar',
            name: year
        };
    });

    // Layout grafik
    var layout = {
        title: {
            text: 'Total Penjualan Setiap Bulan',
            font: {
                size: 16
            },
            yref: 'paper',
            y: 0.9
        },
        xaxis: {
            title: 'Bulan'
        },
        yaxis: {
            title: 'Total Penjualan'
        },
        barmode: 'group', // Tampilkan batang tahun-tahun berbeda secara berkelompok
        annotations: [{
            text: 'PT. Batik Tasikmalya',
            showarrow: false,
            xref: 'paper',
            x: 0.5,
            yref: 'paper',
            y: 1.05,
            font: {
                size: 12,
                color: 'black'
            }
        }]
    };

    // Konfigurasi grafik
    var config = {
        responsive: true
    };

    // Inisialisasi grafik
    Plotly.newPlot('salesBarChart', data, layout, config);
</script>


<div id="salesBarChartContainer">
    <div id="salesBarChart"></div>
</div>

<br>
<br>
<br>

<div class="container" id="judul">
    <div class="row">
        <div class="col-md-12">
            <h2 class="text-center">Data penjualan PT. BATIK TASIKMALAYA</h2>
            <h3 class="text-center">Dari tahun 2021 - 2023</h3>
            <p class="text-center">Jl. Batik Raya I No. 367 RT. 001/019 Kel. Karsamenak Kec. Kawalu Kota/Kabupaten Kota Tasikmalaya Provinsi Jawa Barat.</p>
        </div>
    </div>
</div>

<br>

<div class="table-responsive" id="tabledata">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Bulan</th>
                <th>2021</th>
                <th>2022</th>
                <th>2023</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Jan</td>
                <td>10,000</td>
                <td>15,000</td>
                <td>10,000</td>
            </tr>
            <tr>
                <td>Feb</td>
                <td>12,500</td>
                <td>17,500</td>
                <td>12,000</td>
            </tr>
            <tr>
                <td>Mar</td>
                <td>15,000</td>
                <td>20,000</td>
                <td>15,000</td>
            </tr>
            <tr>
                <td>Apr</td>
                <td>17,500</td>
                <td>22,500</td>
                <td>18,000</td>
            </tr>
            <tr>
                <td>Mei</td>
                <td>20,000</td>
                <td>25,000</td>
                <td>20,000</td>
            </tr>
            <tr>
                <td>Jun</td>
                <td>22,500</td>
                <td>27,500</td>
                <td>22,000</td>
            </tr>
            <tr>
                <td>Jul</td>
                <td>25,000</td>
                <td>30,000</td>
                <td>25,000</td>
            </tr>
            <tr>
                <td>Aug</td>
                <td>27,500</td>
                <td>32,500</td>
                <td>27,000</td>
            </tr>
            <tr>
                <td>Sep</td>
                <td>30,000</td>
                <td>35,000</td>
                <td>30,000</td>
            </tr>
            <tr>
                <td>Oct</td>
                <td>32,500</td>
                <td>37,500</td>
                <td>32,000</td>
            </tr>
            <tr>
                <td>Nov</td>
                <td>35,000</td>
                <td>40,000</td>
                <td>35,000</td>
            </tr>
            <tr>
                <td>Des</td>
                <td>37,500</td>
                <td>42,500</td>
                <td>37,000</td>
            </tr>
        </tbody>
    </table>
</div>