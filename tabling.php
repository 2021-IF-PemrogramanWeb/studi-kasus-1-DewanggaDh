

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Table</title>
  </head>
  <body>
    <nav class="navbar navbar-light bg-light">
        <img class="text-left ml-2" src="logo.jpg" height="200" alt="Logo Self-Made">
        <h1 class="text-center h1 mb-3 font-weight-normal">PT Tali Sepatu</h1>
        <form class="text-right">
        <a href="grafik.php" class="text-rigth btn btn-secondary btn-sm mb-3" role="button" aria-disabled="true">GRAPH</a>
            <br>
            <a href="logout.php" class="btn btn-sm btn-secondary" role="button" aria-disabled="true">LOGOUT</a>
            <br>
<p class="mt-5 mr-3">
            <script> document.write(new Date().getDate() + "-" + (new Date().getMonth() + 1) + "-" + new Date().getFullYear()); </script>
        </p>
            
        </form>
        
      </nav>

      <div class="mt-3 mb-1 text-center">
        <button class="btn btn-sm btn-primary" type="button">EXPORT TABLE</button>
      </div>

      <div class="table-responsive-sm text-center mt-3" style="max-width:800px;margin:auto;">
        <table class="table  table-bordered" style="border-color:black">
            <thead class="thead-light">
                <tr style="background-color:aqua;">
                  <th scope="col">No</th>
                  <th scope="col">On</th>
                  <th scope="col">Off</th>
                  <th scope="col">Ack By</th>
                  <th scope="col">Reason</th>
                </tr>
              </thead>
              <tbody>
                  <?php
                  $link = mysqli_connect("localhost", "id17847623_root", "DataDataData-2", "id17847623_tali_sepatu");
                  if($link === false){
                      die("Error, error di mana?" . mysqli_connect_error());
                  }
                  $sql = "select reason_table.No_ID, reason_table.On_Date, reason_table.Off_Date, reason_table.Ack_by, reason_list.Reason_name as Reason1 from reason_table join reason_list on reason_table.Reason=reason_list.No_Reason";
                  if($result = mysqli_query($link, $sql)){
                      if(mysqli_num_rows($result) > 0){
                          while($row = mysqli_fetch_array($result)){
                              echo "<tr>";
                                echo "<td>" . $row['No_ID'] . "</td>";
                                echo "<td>" . $row['On_Date'] . "</td>";
                                echo "<td>" . $row['Off_Date'] . "</td>";
                                echo "<td>" . $row['Ack_by'] . "</td>";
                                echo "<td>" . $row['Reason1'] . "</td>";
                              echo "</tr>";
                          }
                      }
                      else {
                          echo "Nggak ada meja";
                      }
                      }
                      else {
                       echo "Ada yang salah" . mysqli_error($link);
                      }
                      mysqli_close($link);
                  ?>
                
              </tbody>
        </table>
      </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
   
  </body>
</html>
