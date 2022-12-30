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
    <title>Play a Match</title>

    <style>
 li:hover{
      border-bottom: 1px solid #8fd9a8 !important ;
    }
.active{
        border-bottom: 2px solid #feffde;
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

      .Fixed{
        position: absolute;
        bottom: 0;
        right: 0;
        width: 20%;
        background: #000;
      }

      .submitMsg{ 
    color: green;
}
.errorMsg{ 
    color: red;
}

p{
    font-size: 17px;
    text-align: center;
    font-family: 'Sriracha', cursive;
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
            <img src="rk.png" alt="Our Logo" height="26" class="d-inline-block align-text-top"></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-1">
              <li class="nav-item">
                <a class="nav-link " aria-current="page" href="db.php
                " >Create Account</a>
              </li>
              
              <li class="nav-item">
                <a class="nav-link " href="login.php">Login | Sign up</a>
              </li>

              <li class="nav-item">
                <a class="nav-link active" href="match.php" >Play</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="result.php" >Match Results</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="stats.php" >Statistics</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="achieve.php" >Achievements</a>
              </li>
              <li class="nav-item">
                <a class="nav-link  " href="extra.php" >Extra Data</a>
              </li>
              <li class="nav-item " id="Logged">
              <div class="nav-link disabled text-info"> Logged in as PLAYER
              <?php
              echo $_SESSION['player_id'];
              ?>
              </div>
              </li>
          </div>
        </div>
      </nav>
      <img class="bg" src="bg.jpg" alt="PUBG Wallpaper">

      <main >
       
        <form class="box"  action="match.php" method="post">
          
          <h3 class="h4 mb-2  fw-bold">Enter the data</h3>
      
          <div class=" mb-4 form-floating" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Enter rank" style="border: 2px solid #433d3c;border-radius: 6px;">
            <input type="text" class="form-control" id="rank" name="rank" placeholder="Enter rank">
            <label for="rank" class="text-muted">Rank</label>
          </div>

          <div class=" mb-4 form-floating" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Enter kills"style="border: 2px solid #433d3c;border-radius: 6px;">
            <input type="text" class="form-control" name="kills" id="kills" placeholder="Enter kills">
            <label for="kills" class="text-muted">Kills</label>
          </div>
      
          <div class=" mb-4 form-floating" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Enter damage"style="border: 2px solid #433d3c;border-radius: 6px;">
            <input type="text" class="form-control" name="damage" id="damage" placeholder="Enter damage">
            <label for=" damage" class="text-muted">Damage</label>
          </div>

          <button type="submit"  name="submit" class=" mb-4 w-15 btn fw-bold btn-lg btn-outline-success submit btn-success" data-bs-toggle="tooltip" data-bs-placement="top" title="The form will get submitted">Submit</button>
          <button class=" mb-4 w-15 fw-bold style  btn btn-lg submit btn-danger"  data-bs-toggle="tooltip" data-bs-placement="bottom" title="The form data will reset" >Reset</button>
    
          <?php
        $insert = false;
        if(isset($_POST['submit']))
        {
            if(($_POST['rank'])!=null and $_POST['damage']!=null and $_POST['kills']!=null){
                // Set connection variables
                $conn=oci_connect("raj","raj","localhost/xe");
            
                if (!$conn)
                    echo 'Failed to connect to Oracle';
                //else
                 //echo 'Succesfully connected with Oracle DB';
        
               // Collect post variables
               $rank = $_POST['rank'];
                $damage = $_POST['damage'];
                $kills = $_POST['kills'];
                $player_id=$_SESSION['player_id'];
                
                $sql_select = "SELECT MAX(match_id) FROM matchresults where player_id = $player_id";
                $match = oci_parse($conn, $sql_select);
                oci_execute($match);
                $row = oci_fetch_row($match);
                $matchid=$row[0]+1;



                $sql_insert = "INSERT INTO matchresults VALUES ($matchid,$player_id,$rank, $kills, $damage )";
                $stid = oci_parse($conn, $sql_insert);
                    if(oci_execute($stid))
                    {
                        $insert=true;  
       
                    }
                    if($insert == true){
                      echo "<p class='submitMsg'>Match Data is Collected.</p>"; 

                // Procedure to store in stats table
                $sql_run1 = 'begin statsupdate(:playerid); end;';
                $stid1 = oci_parse($conn, $sql_run1);
                oci_bind_by_name($stid1,":playerid",$player_id);
                if(oci_execute($stid1))
                echo "<p class='submitMsg'>Stats table is updated.</p>";

                //Procedure to store in achievement table
                $sql_run2 = 'begin achievementupdate(:playerid); end;';
                $stid2 = oci_parse($conn, $sql_run2);
                oci_bind_by_name($stid2,":playerid",$player_id);
                if(oci_execute($stid2))
                echo "<p class='submitMsg'>Achievement table is updated.</p>";
                    }
            
                }
              }
        
        ?>
        </form>
      </main>
        <p class="fs-4 fw-bold fixed text-info">&copy; AU CSE 250</p>
        <p class="fs-4 fw-bold Fixed text-warning">By Raj & Krutin</p>
      

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
