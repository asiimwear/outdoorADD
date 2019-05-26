<?php
    require('connect.php');
    $output = '';
    if(isset($_POST["query"]))
    {
    	$search = mysqli_real_escape_string($con, $_POST["query"]);
    	$query = "
    	SELECT * FROM spaces
    	WHERE location LIKE '%".$search."%'
    	";
    }
    else
    {
    	$query = "
    	SELECT * locations ORDER BY id";
    }

    $result = mysqli_query($con, $query);
    if(mysqli_num_rows($result) > 0)
    {
        $output .= "<div id='res' class='res table-responsive'>
                      <table class='table table bordered'>
                        ";

        while($row = mysqli_fetch_array($result))
        {
            $output .= "
            <tr>
              <td><a href='book.php?id=".$row["id"]."'>".$row["name"]. " - " .$row["location"] ."</a></td>
            </tr>";
        }

        echo $output;

    }
    else{
        // echo "data not found";
    }
?>
