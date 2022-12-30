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
    <title> Results</title>

    <style>
 li:hover{
      border-bottom: 1px solid #8fd9a8 !important ;
    }
.active{
        border-bottom: 2px solid #feffde;
    }
      
.bg {
  background-image: url("bg.jpg");
  min-height: 500px;
  opacity: 1;
  background-attachment: fixed;
  background-position: center;
 background-repeat: no-repeat;
  background-size: cover; 
}

.sticky
{
position: sticky;
}
.box {
     width: 150px; 
    margin: 0;
    padding: 100px 700px;
    /* position: absolute; */
    top: 350%;
    left: 50% !important;
    /* transform: translate(-50%, -50%); */
    /* background: #c8e0e4; */
    text-align: center;
    color: transparent;
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
        position: sticky;
        bottom: 0;
        left: 0px;
        width: 20%;
        background: #000;
      }

      .Fixed{
        position: sticky;
        bottom: 0;
        left: 100%;
        width: 20%;
        background: #000;
      }
      #Logged { background-color: #393e46;
      padding : 0 15px;
      position: fixed;
      right: 0;
      }

      table {
  border: 1px black;
    width: 150% !important;
    font-size: larger;
    text-align: center;
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
                <a class="nav-link " aria-current="page" href="db.php" >Create Account</a>
              </li>

              <li class="nav-item">
                <a class="nav-link " href="login.php">Login | Sign up</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="match.php" >Play</a>
              </li>

              <li class="nav-item">
                <a class="nav-link active" href="result.php" >Match Results</a>
              </li>

              <li class="nav-item">
                <a class="nav-link " href="stats.php" >Statistics</a>
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
      <main>
      <section class="bg" >

       
        <form class="box" action="result.php" method="post" >

            <!-- <h3 class="h4 mb-2  fw-bold">Welcome to Game Database</h3>
            
  
            <div class=" mb-4 form-floating" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Enter your in-game Name"style="border: 2px solid #433d3c;border-radius: 6px;">
              <input type="text" class="form-control" id="floatingName" placeholder="Enter your name">
              <label for="floatingName" class="text-muted">Name</label>
            </div>
        
          <button type="button" class=" mb-4 w-15 btn fw-bold btn-lg btn-outline-success submit btn-success" data-bs-toggle="tooltip" data-bs-placement="top" title="The form will get submitted" type="submit">Submit </button> -->
          
          <!-- <button type="button" class=" mb-4 w-15 fw-bold style  btn btn-lg submit btn-danger"  data-bs-toggle="tooltip" data-bs-placement="bottom" title="The form data will reset" type="reset">Reset </button> -->
          <table border="2" class="table table-dark table-hover table-th table-striped" >
          <tr><th>MATCH_ID</th><th>PLAYER_ID</th> <th>RANK</th><th>KILLS</th><th>DAMAGE</th></tr>
        <?php

        $player_id=$_SESSION['player_id'];
        $conn=oci_connect("raj","raj","localhost/xe"); 
        $stid="SELECT * FROM matchresults where player_id= $player_id order by match_id";
        $select = oci_parse($conn,$stid);
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
    ?>
    </table> 
          </form>

      </section>
      <p class="fs-4 fw-bold fixed text-info">&copy; AU CSE 250</p>
        <p class="fs-4 fw-bold Fixed text-warning ">By Raj & Krutin</p>
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
