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
      table {
    /* padding: 15px 5px !important; */
  border: 1px black;
    color: black;
    background: lightskyblue;
    width: 80% !important;
    position: absolute;
    font-size: smaller;
    text-align: center;
}

    </style>

  </head>
  <body class="text-center" >
    
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
                <a class="nav-link" href="db.php" >Cash Account</a>
              </li>

              <!-- <li class="nav-item">
                <a class="nav-link " href="login.php">Bank Account Entry</a>
              </li> -->
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="extra.php" target="_blank">Bank Account</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="stats.php" >Your Data</a>
              </li>
 
          </div>
        </div>
      </nav>

      <main >
   
        <form class="box" action="extra.php" method="post" >
      
        <label for="banks">Choose Bank Name: </label>
          <select  name="option1" class=" mb-4 form-floating" data-bs-toggle="tooltip" data-bs-placement="bottom" style="border: 2px solid #433d3c;border-radius: 6px;">
    <option value="KOTAK">KOTAK</option>
    <option value="SBI">SBI</option>
    <option value="AXIS BANK">AXIS BANK</option>
    <option value="IDFC FIRST">IDFC FIRST</option>
  </select>

          <label for="account">Choose Account Name:</label>
          <select  name="option2" class=" mb-4 form-floating" data-bs-toggle="tooltip" data-bs-placement="bottom" style="border: 2px solid #433d3c;border-radius: 6px;">
    <option value="RAJ">RAJ</option>
    <option value="BHAVESH">BHAVESH</option>
    <option value="PUNITA">PUNITA</option>
    <option value="Other">Other</option>
  </select>
            <ul class="navbar-nav me-auto mb-2 mb-lg-1">
            <button name="submit" type="submit">Save</button>      
          </div> 
  <br>
          <button onclick="location.href='login.php'" type="button">
         Open Account</button>


          <table border="2" class="table table-dark table-hover table-sm table-striped">

          <?php
         if(isset($_POST["submit"]))
         {
          $_SESSION['BankName']=$_POST['option1'];
          $_SESSION['AccountNumber']=$_POST['option2'];
                // Set connection variables
                // $conn=oci_connect("raj","raj","localhost/xe");
        
                // /////// Procedure to run player_id vs KD
                // $_SESSION['BankName']=$_POST['option1'];
                // $_SESSION['AccountNumber']=$_POST['option2'];
                // $sql_run = 'begin arraytype.bestplayer(:output1,:output2); end;';
                // $stid = oci_parse($conn, $sql_run);
                // oci_bind_array_by_name($stid, ":output1", $array1, 1000, 1000, SQLT_AFC);
                // oci_bind_array_by_name($stid, ":output2", $array2, 1000, 1000, SQLT_AFC);
                // oci_execute($stid);
                // echo "<tr><th>PLAYER_ID</th><th>Kill Death Ratio</th></tr>";
                // for ($x = 0; $x < count($array1); $x++)            
                // {
                //   echo "<tr>\n";
                //     echo " <td>".$array1[$x] ." <td>".$array2[$x]."</td>\n";
                //   }           
               }
              // else if(isset($_POST['proc2']))
              // {
              //         // Set connection variables
              //         $conn=oci_connect("raj","raj","localhost/xe");
              
              //         /////// Procedure to run player_id vs KD
              //         $sql_run = 'begin win.winratio(:output1,:output2); end;';
              //         $stid = oci_parse($conn, $sql_run);
              //         oci_bind_array_by_name($stid, ":output1", $array1, 1000, 1000, SQLT_AFC);
              //         oci_bind_array_by_name($stid, ":output2", $array2, 1000, 1000, SQLT_AFC);
              //         oci_execute($stid);
              //         echo "<tr><th>PLAYER_ID</th><th>Total Wins</th></tr>";
              //         for ($x = 0; $x < count($array1); $x++)            
              //         {
              //           echo "<tr>\n";
              //             echo " <td>".$array1[$x] ." <td>".$array2[$x]."</td>\n";
              //           }           
              //       }
              //       else if(isset($_POST['proc3']))
              //       {
              //               // Set connection variables
              //               $conn=oci_connect("raj","raj","localhost/xe");
                    
              //               /////// Procedure to run player_id vs KD
              //               $sql_run = 'begin achieve.no_of_achieve(:output1,:output2); end;';
              //               $stid = oci_parse($conn, $sql_run);
              //               oci_bind_array_by_name($stid, ":output1", $array1, 1000, 1000, SQLT_AFC);
              //               oci_bind_array_by_name($stid, ":output2", $array2, 1000, 1000, SQLT_AFC);
              //               oci_execute($stid);
              //               echo "<tr><th>PLAYER_ID</th><th>No. of Achievements</th></tr>";
              //               for ($x = 0; $x < count($array1); $x++)            
              //               {
              //                 echo "<tr>\n";
              //                   echo " <td>".$array1[$x] ." <td>".$array2[$x]."</td>\n";
              //                 }           
              //             }
              //             else if(isset($_POST['proc4']))
              //             {
              //                     // Set connection variables
              //                     $conn=oci_connect("raj","raj","localhost/xe");
                          
              //                     /////// Procedure to run player_id vs KD
              //                     $sql_run = 'begin highkills.highestkills(:output1,:output2); end;';
              //                     $stid = oci_parse($conn, $sql_run);
              //                     oci_bind_array_by_name($stid, ":output1", $array1, 1000, 1000, SQLT_AFC);
              //                     oci_bind_array_by_name($stid, ":output2", $array2, 1000, 1000, SQLT_AFC);
              //                     oci_execute($stid);
              //                     echo "<tr><th>PLAYER_ID</th><th>Highest kills</th></tr>";
              //                     for ($x = 0; $x < count($array1); $x++)            
              //                     {
              //                       echo "<tr>\n";
              //                         echo " <td>".$array1[$x] ." <td>".$array2[$x]."</td>\n";
              //                       }           
              //                   }
              //                   else if(isset($_POST['func1']))
              //                   {
              //                           // Set connection variables
              //                           $conn=oci_connect("raj","raj","localhost/xe");
              //                           $player_id=$_POST['player_id'];
              //                           $sql_run = 'begin :output:=F_totalmatches(:input1); end;';
              //                           $stid = oci_parse($conn, $sql_run);
              //                           oci_bind_by_name($stid, ":input1", $player_id);
              //                           oci_bind_by_name($stid, ":output", $output,40);
              //                           oci_execute($stid);
              //                           echo "<tr><th>PLAYER_ID</th><th>Total Matches</th></tr>";
              //                             echo "<tr>\n";
              //                               echo " <td>".$player_id ." <td>".$output."</td>\n";          
              //                         }
              //                         else if(isset($_POST['func2']))
              //                         {
              //                                 // Set connection variables
              //                                 $conn=oci_connect("raj","raj","localhost/xe");
              //                                 $player_id=$_POST['player_id'];
              //                                 $sql_run = 'begin :output:=F_totalwins(:input1); end;';
              //                                 $stid = oci_parse($conn, $sql_run);
              //                                 oci_bind_by_name($stid, ":input1", $player_id);
              //                                 oci_bind_by_name($stid, ":output", $output,40);
              //                                 oci_execute($stid);
              //                                 echo "<tr><th>PLAYER_ID</th><th>Total Wins</th></tr>";
              //                                   echo "<tr>\n";
              //                                     echo " <td>".$player_id ." <td>".$output."</td>\n";          
              //                               }
              //                               else if(isset($_POST['func3']))
              //                               {
              //                                       // Set connection variables
              //                                       $conn=oci_connect("raj","raj","localhost/xe");
              //                                       $player_id=$_POST['player_id'];
              //                                       $sql_run = 'begin :output:=F_totalkills(:input1); end;';
              //                                       $stid = oci_parse($conn, $sql_run);
              //                                       oci_bind_by_name($stid, ":input1", $player_id);
              //                                       oci_bind_by_name($stid, ":output", $output,40);
              //                                       oci_execute($stid);
              //                                       echo "<tr><th>PLAYER_ID</th><th>Total Kills</th></tr>";
              //                                         echo "<tr>\n";
              //                                           echo " <td>".$player_id ." <td>".$output."</td>\n";          
              //                                     }
              //                                     else if(isset($_POST['func4']))
              //                                     {
              //                                             // Set connection variables
              //                                             $conn=oci_connect("raj","raj","localhost/xe");
              //                                             $player_id=$_POST['player_id'];
              //                                             $sql_run = 'begin :output:=F_totaldeaths(:input1); end;';
              //                                             $stid = oci_parse($conn, $sql_run);
              //                                             oci_bind_by_name($stid, ":input1", $player_id);
              //                                             oci_bind_by_name($stid, ":output", $output,40);
              //                                             oci_execute($stid);
              //                                             echo "<tr><th>PLAYER_ID</th><th>Total Deaths</th></tr>";
              //                                               echo "<tr>\n";
              //                                                 echo " <td>".$player_id ." <td>".$output."</td>\n";          
              //                                           }
              //                                           else if(isset($_POST['func5']))
              //                                           {
              //                                                   // Set connection variables
              //                                                   $conn=oci_connect("raj","raj","localhost/xe");
              //                                                   $player_id=$_POST['player_id'];
              //                                                   $sql_run = 'begin :output:=F_avgdamage(:input1); end;';
              //                                                   $stid = oci_parse($conn, $sql_run);
              //                                                   oci_bind_by_name($stid, ":input1", $player_id);
              //                                                   oci_bind_by_name($stid, ":output", $output,40);
              //                                                   oci_execute($stid);
              //                                                   echo "<tr><th>PLAYER_ID</th><th>Average Damage</th></tr>";
              //                                                     echo "<tr>\n";
              //                                                       echo " <td>".$player_id ." <td>".$output."</td>\n";          
              //                                                 }
              //                                                 else if(isset($_POST['func6']))
              //                                                 {
              //                                                         // Set connection variables
              //                                                         $conn=oci_connect("raj","raj","localhost/xe");
              //                                                         $player_id=$_POST['player_id'];
              //                                                         $sql_run = 'begin :output:=F_highestdamage(:input1); end;';
              //                                                         $stid = oci_parse($conn, $sql_run);
              //                                                         oci_bind_by_name($stid, ":input1", $player_id);
              //                                                         oci_bind_by_name($stid, ":output", $output,40);
              //                                                         oci_execute($stid);
              //                                                         echo "<tr><th>PLAYER_ID</th><th>Highest Damage</th></tr>";
              //                                                           echo "<tr>\n";
              //                                                             echo " <td>".$player_id ." <td>".$output."</td>\n";          
              //                                                       }
              //                                                       else if(isset($_POST['func7']))
              //                                                       {
              //                                                               // Set connection variables
              //                                                               $conn=oci_connect("raj","raj","localhost/xe");
              //                                                               $player_id=$_POST['player_id'];
              //                                                               $sql_run = 'begin :output:=F_highestkills(:input1); end;';
              //                                                               $stid = oci_parse($conn, $sql_run);
              //                                                               oci_bind_by_name($stid, ":input1", $player_id);
              //                                                               oci_bind_by_name($stid, ":output", $output,40);
              //                                                               oci_execute($stid);
              //                                                               echo "<tr><th>PLAYER_ID</th><th>Highest kills</th></tr>";
              //                                                                 echo "<tr>\n";
              //                                                                   echo " <td>".$player_id ." <td>".$output."</td>\n";          
              //                                                             }
              //                                                             else if(isset($_POST['func8']))
              //                                                             {
              //                                                                     // Set connection variables
              //                                                                     $conn=oci_connect("raj","raj","localhost/xe");
              //                                                                     $player_id=$_POST['player_id'];
              //                                                                     $sql_run = 'begin :output:= F_KD(:input1); end;';
              //                                                                     $stid = oci_parse($conn, $sql_run);
              //                                                                     oci_bind_by_name($stid, ":input1", $player_id);
              //                                                                     oci_bind_by_name($stid, ":output", $output,40);
              //                                                                     oci_execute($stid);
              //                                                                     echo "<tr><th>PLAYER_ID</th><th>Kill death ratio</th></tr>";
              //                                                                       echo "<tr>\n";
              //                                                                         echo " <td>".$player_id ." <td>".$output."</td>\n";          
              //                                                                   }
        
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
