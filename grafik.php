<?php require_once("auth.php"); ?>

<?php
$con = mysqli_connect("localhost", "id17847623_root", "DataDataData-2", "id17847623_tali_sepatu");
if(!$con){
    echo "Ada masalah" . mysqli_error();
} else {
    $sql = "select Reason, count(DISTINCT(Reason)) as Total from reason_table group by Reason
";
    $result = mysqli_query($con, $sql);
    $chart_data="";
    while($row = mysqli_fetch_array($result)){
        $reason_name[] = $row['Reason'];
        $reason_count[] = $row['Total'];
    }
}

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet"

    href="https://cdn.jsdelivr.net/npm/cdbootstrap@1.0.0/css/bootstrap.min.css"/>

  <link

    rel="stylesheet"

    href="https://cdn.jsdelivr.net/npm/cdbootstrap@1.0.0/css/cdb.min.css" />

  <script

    src="https://cdn.jsdelivr.net/npm/cdbootstrap@1.0.0/js/cdb.min.js"></script>

  <script

    src="https://cdn.jsdelivr.net/npm/cdbootstrap@1.0.0/js/bootstrap.min.js">

  </script>

  <script src="https://kit.fontawesome.com/9d1d9a82d2.js"

  crossorigin="anonymous"></script>
    <title>Grafik Batang</title>
  </head>
  <style>

    .chart-container {
  
      width: 75%;
  
      height: 75%;
  
      margin: auto;
  
    }
  
  </style>
  <body>
    <!-- <div class="mt-5 mb-3">
        <img class="text-left ml-5" src="logo.jpg" height="200" alt="Logo Self-Made">
        <button class="text-rigth btn btn-primary">LOGIN</button>
    </div> -->

    <nav class="navbar navbar-light bg-light">
        <img class="text-left ml-2" src="logo.jpg" height="200" alt="Logo Self-Made">
        <h1 class="text-center h1 mb-3 font-weight-normal">PT Tali Sepatu</h1>
        <form class="text-right">
            <a href="tabling.php" class="text-rigth btn btn-secondary btn-sm mb-3" role="button" aria-disabled="true">TABLE</a>
            <br>
            <!-- <a href="logout.php"><button class="text-rigth btn btn-secondary btn-sm mt-3" role="button" aria-disabled="true">LOGOUT</button></a> -->
            <a href="logout.php" class="btn btn-sm btn-secondary" role="button" aria-disabled="true">LOGOUT</a>
            <br>
<p class="mt-5 mr-3">
            <script> document.write(new Date().getDate() + "-" + (new Date().getMonth() + 1) + "-" + new Date().getFullYear()); </script>
        </p>
            
        </form>
        
      </nav>
    
      <h1 class="text-center h3 mt-3 font-weight-normal">Grafik rating seminar</h1>

    <div class="card chart-container text-center mt-2">

        <canvas id="chart"></canvas>
    
      </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
   
  </body>
  <script

  src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.js">

</script>
<script>
    const ctx = document.getElementById("chart").getContext('2d');
    const myChart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: <?php echo json_encode($reason_name); ?>,
        datasets: [{
          backgroundColor: 'rgba(100, 100, 100, 10)',
          borderColor: 'rgb(256, 256, 256)',
          data: <?php echo json_encode($reason_count); ?>,
          label: 'Banyak Reason'
        }]
      },
      options: {
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: true,
            }
          }]
        }
      },
    });
</script>

</html>
