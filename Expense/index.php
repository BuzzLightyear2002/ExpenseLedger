<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PUBG Database</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto|Sriracha&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <img class="bg" src="bg.jpg" alt="PUBG Wallpaper">
    
    <?php
$insert = false;
if(isset($_POST['submit'])){
    // if(($_POST['ID'])!=null and $_POST['name']!=null and $_POST['birthdate']!=null){
    //     // Set connection variables
     //    $conn=oci_connect("raj","raj","localhost/xe");
    //     if (!$conn)
    //         echo 'Failed to connect to Oracle';
    //     else
    //      //echo 'Succesfully connected with Oracle DB';

    //     // Collect post variables
    //     $ID = $_POST['ID'];
    //     $name = $_POST['name'];
    //     $birthdate = $_POST['birthdate'];
    //     $sql_insert = "INSERT INTO player VALUES ($ID, '$name', TO_DATE('$birthdate','dd/mm/yyyy'))";
    //     $stid = oci_parse($conn, $sql_insert);
    //         if(oci_execute($stid))
    //         {
    //             $insert=true;          
    //         }

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

?>

    <div class="container">
        <h1>Welcome to PUBG Database</h3>
        <p>Enter the details to create an account: </p>
        <form action="index.php" method="post">
            <input type="text" name="ID" id="ID" placeholder="Enter your ID">
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="text" name="birthdate" id="birthdate" placeholder="Enter your birthdate">
            <button type="submit" name="submit" class="btn">Submit</button>
            <button class="btn">Reset</button>
<table border="2">
        <?php
        if($insert == true){
        echo "<p class='submitMsg'>Account is created.</p>";  
        if(isset($_POST['submit'])){
        $select = oci_parse($conn, 'SELECT * FROM player order by player_id');
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
</table>
        </form>
    </div>
    <script src="index.js"></script>
    
</body>
</html>