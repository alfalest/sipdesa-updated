<script>
//- DONUT CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
    var donutData        = {
      labels: [
          'LAKI-LAKI',
          'PEREMPUAN',
      ],
      datasets: [
        {
          data: [ <?= (isset($jml_jenis_kelamin['laki_laki'])) ? $jml_jenis_kelamin['laki_laki'] : 0 ?>  , <?= (isset($jml_jenis_kelamin['perempuan'])) ? $jml_jenis_kelamin['perempuan'] : 0 ?>],
          backgroundColor : ['#f56954','#00c0ef'],
        }
      ]
    }
    var donutOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(donutChartCanvas, {
      type: 'doughnut',
      data: donutData,
      options: donutOptions
    })

    </script>