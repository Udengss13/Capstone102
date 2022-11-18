<?php 

    require('php/connection.php'); 
    $service = $_POST['service'];
    $querymenu = "SELECT * FROM available_appointment WHERE DATE(date_appointment)>=NOW() AND `service`='$service'"; 
    $resultmenu = mysqli_query($con, $querymenu);  
?>

<div class="row">
    <div class="col-3"> <label> Available Schedule: </label></div>
    <div class="col-5 ">
        <select class="form-control" required name="schedule">
            <option value="">Select Schedule</option>
            <?php while($rowmenu =  mysqli_fetch_array($resultmenu)){ ?>
                <option value="<?php echo $rowmenu['date_appointment']; ?>" data-time="<?php echo $rowmenu['time']; ?>"><?php echo date('F d,Y h:ia',strtotime($rowmenu['date_appointment'].' '.$rowmenu['time'])); ?></option>
            <?php } ?>
        </select>
    </div>
</div>
