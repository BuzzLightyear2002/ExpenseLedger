
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6"
      crossorigin="anonymous"
    />
    <link rel="icon" href="rk.png" type="image/png type">
    <title>Your Data</title>

    <style>
       li:hover{
      border-bottom: 1px solid #8fd9a8 !important ;
    }
    .active{
        border-bottom: 2px solid #feffde;
    }
table,td{
  width: 30%;
  border: 2px solid black;
  background-color: yellowgreen;
  margin-left:  auto;
  margin-right:  auto;
}
th, td {
  padding: 5px;
}
th {
  text-align: center;
}
      .bg{
        width: 100%;
        z-index: -1;
        opacity: 0.5;
      }
      body{
        background-color: aquamarine;
        background-repeat: no-repeat;
        background-attachment: fixed;
      }
      .box {
        margin: 0 ;
        padding: 10px 50px;
        position: absolute; 
        top: 35%;
        left: 50%;
        transform: translate(-50%, -50%);
        /* background: #c8e0e4;  */
        text-align: center;
      }

      .submit {
        display: border-box;
        
        background: none;
        display: inline;
        margin: -5px 20px;
        text-align: center;
        border: 3px solid #2e92cc;
        padding: 8px 15px;
        outline: none;
        color: #393e46;
        border-radius: 35px;
        transition: 0.50s;
        cursor: pointer;
      }
      button, input, optgroup, select, textarea {
    margin: auto;
    font-family: inherit;
    font-size: inherit;
    line-height: inherit;
}
      .fixed{
        position: absolute;
        bottom: 0;
        width: 20%;
        background: #000;
      }

      .Fixed{
        position: absolute;
        bottom: 0;
        right: 0;
        width: 20%;
        background: #000;
      }
      #Logged { background-color: #393e46;
      padding : 0 15px;
      position: fixed;
      right: 0;
      }
    </style>

  </head>
  <body class="text-center">
    
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark " >
        <div class="container-fluid">
          <a class="navbar-brand" href="https://www.pubg.com">
            <img src="rk.png" alt="Our Logo" height="26" class="d-inline-block align-text-top" ></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-1">

            <li class="nav-item">
                <a class="nav-link "href="db.php" >Cash Account</a>
              </li>

              <!-- <li class="nav-item">
                <a class="nav-link " href="login.php">Bank Account Entry</a>
              </li> -->
              <li class="nav-item">
                <a class="nav-link  " href="extra.php" >Bank Account</a>
              </li>

              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="stats.php" target="_blank">Your Data</a>
              </li>
          </div>
        </div>
      </nav>

      <main >
        <form class="box" action="stats.php" method="post" >
        <label for="cars">From</label>
        <input type="date" class="form-control" name="time1" id="time1">
        <label for="cars">To</label>
        <input type="date" class="form-control" name="time2" id="time2">
        <br>
        <label for="cars">Choose a Category:</label>

          <select  name="option" class=" mb-4 form-floating" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Enter your Category"style="border: 2px solid #433d3c;border-radius: 6px;"name="cars" id="cars">
    <option value="Food">Food</option>
    <option value="Electronics">Electronics</option>
    <option value="Home Appliances">Home Appliances</option>
    <option value="Other">Other</option>
  </select>
        <br>
          <button type="submit" name="submit" title="The form will get submitted" >Submit</button>
          <button type="submit" title="The form data will reset" >Reset </button>
          <br>
          <br>
         




          <table>

        <?php
        if(isset($_POST['submit']))
        {
          echo '<tr><th>Mode</th><th>Date</th><th>Description</th><th>Debit</th> <th>Credit</th></tr>';
          $option=$_POST['option'];
          $time1 = $_POST['time1'];
          $time2 = $_POST['time2'];
        $conn=oci_connect("raj","raj","localhost/xe"); 
        
        $stid="SELECT dt,description,debit,credit FROM cash where dt between to_date('$time1','yyyy-mm-dd') and to_date('$time2','yyyy-mm-dd') and category='$option' ";
        $select = oci_parse($conn,$stid);
        oci_execute($select);

        $stid2="SELECT dt,description,debit,credit FROM bank where dt between to_date('$time1','yyyy-mm-dd') and to_date('$time2','yyyy-mm-dd')  and category='$option' ";
        $select2 = oci_parse($conn,$stid2);
        oci_execute($select2);

        while ($row = oci_fetch_array($select, OCI_ASSOC+OCI_RETURN_NULLS)) {
            echo "<tr>\n";
            echo " <td>Cash</td>";
            foreach ($row as $item) {
                echo " <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>\n";
            }
        }
        while ($row = oci_fetch_array($select2, OCI_ASSOC+OCI_RETURN_NULLS)) {
          echo "<tr>\n";
          echo " <td>Bank</td>";
          foreach ($row as $item) {
              echo " <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>\n";
          }
          echo "</tr>\n";
      }
                 $sum_cash = "SELECT sum(debit),sum(credit) FROM cash where dt between to_date('$time1','yyyy-mm-dd') and to_date('$time2','yyyy-mm-dd') and category='$option' ";
                $cash = oci_parse($conn, $sum_cash);
                oci_execute($cash);
                $row1 = oci_fetch_row($cash);

              $sum_bank = "SELECT sum(debit),sum(credit) FROM bank where dt between to_date('$time1','yyyy-mm-dd') and to_date('$time2','yyyy-mm-dd') and category='$option' ";
              $bank = oci_parse($conn, $sum_bank);
              oci_execute($bank);
              $row2 = oci_fetch_row($bank);
          $totaldebit = $row1[0] + $row2[0];
          $totalcredit = $row1[1] + $row2[1];

          echo '<tr><th>Total</th><th>';
          echo $totaldebit ;
          echo ' </th><th>';         
           echo $totalcredit ;
          echo ' </th></tr>';
 
        echo "\n";
        oci_close($conn);
      }
    ?>
    </table>
    </form>
      </main>

      

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"
      integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js"
      integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
