<?php
// Start the session
session_start();
?>

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
    <title>Bank Account</title>

    <style>

    li:hover{
      border-bottom: 1px solid #8fd9a8 !important ;
    }
    .active{
        border-bottom: 2px solid #feffde;
    }
    body{
        background-color: aquamarine;
      }
      
      .bg{
        width: 100%;
        z-index: -1;
        opacity: 0.5;
      }
      .box {
        width: 450px;
        margin: 0 ;
        padding: 10px 50px;
        position: absolute;
        top: 35%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: #faf3e0;
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
      
      .fixed{
        position: absolute;
        bottom: 0;
        width: 20%;
        background: #000;
      }
    
      .submitMsg{ 
    color: green;
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

            <li class="nav-item " id="Logged">
              <div class="nav-link disabled text-info"> 
              <?php
              echo $_SESSION["BankName"];
              echo '<br> ';
              echo $_SESSION["AccountNumber"];
              ?>
              </div>
              </li>
          </div>
        </div>
      </nav>
  

  <main>
       
        <form class="box" action="login.php" method="post" >
          <h3 class="h4 mb-2  fw-bold">Bank Account</h3>
          <h3 class="h4 mb-2  fw-bold">Enter your data</h3>
          
          <label for="cars">Choose a Category:</label>
          <select  name="option" class=" mb-4 form-floating" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Enter your Category"style="border: 2px solid #433d3c;border-radius: 6px;"name="cars" id="cars">
    <option value="Food">Food</option>
    <option value="Electronics">Electronics</option>
    <option value="Home Appliances">Home Appliances</option>
    <option value="Other">Other</option>
  </select>


          <div class=" mb-4 form-floating" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Description"style="border: 2px solid #433d3c;border-radius: 6px;">
          <input type="text" class="form-control" name="desc" id="desc" placeholder="Enter Description">
            <label for="desc" class="text-muted">Description</label>
          </div>
      
          <div class=" mb-4 form-floating" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Debit"style="border: 2px solid #433d3c;border-radius: 6px;">
          <input type="text" class="form-control" name="debit" id="debit" placeholder="Enter your debit">
            <label for="debit" class="text-muted">Debit</label>
          </div>

          <div class=" mb-4 form-floating" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Credit" style="border: 2px solid #433d3c;border-radius: 6px;">
          <input type="text" class="form-control" name="credit" id="credit" placeholder="Enter your credit">
            <label for="credit" class="text-muted">Credit</label>
          </div>

          <button type="submit"  name="submit" class=" mb-4 w-15 btn fw-bold btn-lg btn-outline-success submit btn-success" data-bs-toggle="tooltip" data-bs-placement="top" title="The form will get submitted">Submit</button>
          <button class=" mb-4 w-15 fw-bold style  btn btn-lg submit btn-danger"  data-bs-toggle="tooltip" data-bs-placement="bottom" title="The form data will reset" >Reset</button>
          <?php
        $insert = false;
        if(isset($_POST['submit']))
        {
            if(($_POST['credit'])!=null and $_POST['desc']!=null and $_POST['debit']!=null){
                // Set connection variables
                $conn=oci_connect("raj","raj","localhost/xe");
            
                if (!$conn)
                    echo 'Failed to connect to Oracle';
                //else
                 //echo 'Succesfully connected with Oracle DB';
        
               // Collect post variables

              //  $sql_select = "SELECT MAX(match_id) FROM matchresults where player_id = $player_id";
              //  $match = oci_parse($conn, $sql_select);
              //  oci_execute($match);
              //  $row = oci_fetch_row($match);
              //  $matchid=$row[0]+1;
              $player_id=1;
                $category = $_POST['option'];
                $bankName = $_SESSION["BankName"];
                $accountNumber = $_SESSION["AccountNumber"];
                $credit = $_POST['credit'];
                $desc = $_POST['desc'];
                $debit = $_POST['debit'];
                $sql_run = 'begin :output:=entrynoBank(:input1); end;';
                $stid1 = oci_parse($conn, $sql_run);
                oci_bind_by_name($stid1, ":input1", $player_id);
                oci_bind_by_name($stid1, ":output", $id,40);
                oci_execute($stid1);
                $sql_insert = "INSERT INTO bank VALUES (sysdate,$id+1,'$bankName','$accountNumber','$category' ,'$desc',$debit,$credit)";
                $stid = oci_parse($conn, $sql_insert);
                    if(oci_execute($stid))
                    {
                        $insert=true;   
                        echo "<p class='submitMsg'>Data Entered.</p>";         
                    }
        
               // Procedure to store in stats table
                // $sql_run = 'begin statsupdate(:playerid); end;';
                // $stid = oci_parse($conn, $sql_run);
                // oci_bind_by_name($stid,":playerid",$playerid);
                // $playerid=2;
                // if(oci_execute($stid))
                //     echo 'Your Procedure is running';
        
                // Procedure to store in achievement table
                // $sql_run = 'begin achievementupdate(:playerid); end;';
                // $stid = oci_parse($conn, $sql_run);
                // oci_bind_by_name($stid,":playerid",$playerid);
                // $playerid=2;
                // if(oci_execute($stid))
                //     echo 'Your Procedure is running';
                
                // $sql_run = 'begin arraybindpkg1.product_details(:message); end;';
                // $stid = oci_parse($conn, $sql_run);
                // oci_bind_array_by_name($stid, ":message", $array, 10, 100, SQLT_CHR);
                // oci_execute($stid);
                // foreach ($array as $result) {
                //     echo $result; 
                //     echo "<br>";
                
                ///////// Procedure to run player_id vs KD
                // $sql_run = 'begin arraytype.bestplayer(:output1,:output2); end;';
                // $stid = oci_parse($conn, $sql_run);
                // oci_bind_array_by_name($stid, ":output1", $array1, 1000, 1000, SQLT_AFC);
                // oci_bind_array_by_name($stid, ":output2", $array2, 1000, 1000, SQLT_AFC);
                // oci_execute($stid);
                // echo "Player_id   &emsp;&emsp;    KD<br>";
                // for ($x = 0; $x < count($array1); $x++) 
                // {
                //     echo "$array1[$x] &emsp; &emsp; &emsp; &emsp; &ensp;&ensp;$array2[$x]<br>";
                //   }
            
                }
              }
        
        ?>
        
        <!-- <table border="2" class="table table-dark table-hover table-sm table-striped" >
        <?php
        if($insert == true){
        echo "<p class='submitMsg'>Data Entered.</p>";  
        if(isset($_POST['submit'])){
        $select = oci_parse($conn, 'SELECT * FROM cash');
        oci_execute($select);
        while ($row = oci_fetch_array($select, OCI_ASSOC+OCI_RETURN_NULLS)) {
            echo "<tr>\n";
            foreach ($row as $item) {
                echo " <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>\n";
            }
            echo "</tr>\n";
        }
        echo "\n";
        oci_close($conn);
    }
    }
    ?>
</table> -->
        
        
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
