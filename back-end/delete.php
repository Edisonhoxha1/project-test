<?php
    include('connection.php');

//  http://localhost/newMedia/delete.php?productID=000000000000593430

    $productID = $_GET['productID'];
    $query = "SELECT pID FROM product WHERE productID= $productID ";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
		while($row = mysqli_fetch_assoc($result)) {
		 $pID = $row['pID'];
         echo $pID;
		}
	}else{
		$conn->close();
	}

    //delete product     
    $sql = "DELETE FROM product WHERE pID='$pID'";

    if (mysqli_query($conn, $sql)) {
    echo "Record deleted successfully";
    }else{
    echo "Error deleting record: " . mysqli_error($conn);
    }


    //get defID      
    $getdefID_query = "SELECT defID FROM definitions WHERE pID='$pID' ";
	$getderID_result = mysqli_query($conn, $getdefID_query);

	if(mysqli_num_rows($getderID_result) > 0) {
		while($row = mysqli_fetch_assoc($getderID_result)) {
			$defID = $row['defID'];
            // echo $defID;
		}
	}else{
		$conn->close();
	}

    //delete definitions
    $deletedef = "DELETE FROM definitions WHERE defID='$defID' ";

    if (mysqli_query($conn, $deletedef)) {
        echo "Record deleted successfully";
    }else{
        echo "Error deleting record: " . mysqli_error($conn);
    }


    //delete detailsdata      
    $deletedetais = "DELETE FROM detailsdata WHERE defID='$defID'";

    if (mysqli_query($conn, $deletedetais)) {
        echo "Record deleted successfully";
    }else{
        echo "Error deleting record: " . mysqli_error($conn);
    }


    //delete headerdata
    $deleteheader = "DELETE FROM headerdata WHERE defID='$defID'";

    if (mysqli_query($conn, $deleteheader)) {
        echo "Record deleted successfully";
    }else{
        echo "Error deleting record: " . mysqli_error($conn);
    }    

?>