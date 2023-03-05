<!DOCTYPE html>
<html>
    <head>
        <title></title>
    </head>

    <body>
        <?php
            $sql = "SELECT * fwa_rquest WHERE status='Pending';";
            $result = $conn-> query($sql);

            if(!empty($result) && $result -> num_rows > 0) {
                while ($row = $result -> fetch_assoc()){
                    echo $row['employeeID'];
                }
            }
            else{
                echo "No result";
            }

            $conn-> close();
        ?>
        
</body>
</html>
