<?php


    include ('Connectdb.php');
    $sql='SELECT * FROM Podcasters';
    $result = $conn->prepare($sql);
    $result->execute();
     unset($data);
     $i=0;
     $data = array();
        echo '<table>';
        echo '<tr>';
        echo '<th>Show</th><th>Topic</th><th>Host_Name</th>';
        echo '</tr>';
        foreach ($result->fetchAll(PDO::FETCH_ASSOC) as $row) {
        echo '<tr>';
        echo '<td>'.$row['Show'] ."</td><td>". $row['Topic']."</td><td>".$row['Host_Names'].'</td>';
        echo '</tr>';
        // print_r($row);
     }
     echo '</table>';
 echo ($number);
 $number++;
 echo ($number);

//  $dbh->query("UPDATE runningNo SET MAX = '{$number}' WHERE Name= 'R'");	





    // $rs=$conn->query($sql);
    // if($rs === false) {
    //   trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
    // } else {
    //   $rows_returned = $rs->num_rows;
    // }
    
    // $rs->data_seek(0);
    //    echo '<table>';
    //    echo '<tr>';
    //    echo '<th>Name</th><th>Registered</th>';
    //    echo '</tr>';
    // while($row = $rs->fetch_assoc()){
    //    echo '<tr>';
    //    echo '<td>'.$row['firstname'] ."  ". $row['lastname']."</td><td>".$row['registered'].'</td>';
    //    echo '</tr>';
    // }
    //    echo '</table>';