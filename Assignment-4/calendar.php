<!DOCTYPE html>



<html>
    <link rel="stylesheet" type="text/css" href="calendar.css" />
    <head>
        <title>Calendar</title>
    </head>
    <body>
        <div class="div1">
            <h1>
                <br><b>Calender</b><br>
            <?php
				date_default_timezone_set('America/New_York');
				echo "<br><b>Day</b>: " .date("l") . "<br>";
				echo "<b>Date</b>: ".date('F jS Y') . "<br>";
				echo "<b>Time</b>: ".date('h:i A'). "<br>";
				$hour = date('h');
				$daytime = date('A');
                echo "<b>Current Hour</b>: ".$hour . " " .$daytime."<br>";				
			?>    	   
			<?php 
				function returnTime($order, $hourValue, $daytimeValue){
					
					$timeValue = $hourValue + $order;
					if($daytimeValue == 'PM' && $timeValue > 12){
						$timeValue = $timeValue%12;
						$daytimeValue = 'AM';
					}
					elseif($daytimeValue == 'AM' && $timeValue > 12){
						$timeValue = $timeValue%12;
						$daytimeValue = 'PM';
					}
					
					return $timeValue;
				}
			?>
			<?php 
				function returnDayTime($order, $hourValue, $daytimeValue){
					
					$timeValue = $hourValue + $order;
					if($daytimeValue == 'PM' && $timeValue >= 12){
						$timeValue = $timeValue%12;
						if($timeValue == 0){
							$timeValue = 12;
						}
						$daytimeValue = 'AM';
					}
					elseif($daytimeValue == 'AM' && $timeValue >= 12){
						$timeValue = $timeValue%12;
						if($timeValue == 0){
							$timeValue = 12;
						}
						$daytimeValue = 'PM';
					}
					
					return $daytimeValue;
				}
			?>
			   <form action="calendar.php" method="POST">

                   <b>No.of hours to show:</b> <input style="background: #A9DFBF" type="number" name="hours">

                   <input style="background: #A9DFBF" type="submit" value="click here" name = "click here">
                   <?php
                   		echo "<input type='hidden' name='postback' value='true'>";
					?>
               </form>
            </h1>
			
			<?php 		 
				
            $hours = isset($_REQUEST['hours']) ? $_REQUEST['hours'] : '';
			?>
			
            <table id="table1">
			
			<?php
               
			    echo  "<tr class='header1'>";
                echo  "<th class='header1'><b>Time</b></th>";
                echo  "<th class='header1'><b>Person1</b></th>"; 
                echo  "<th class='header1'><b>Person2</b></th>";
				echo  "<th class='header1'><b>Person3</b></th>";
				echo  "<th class='header1'><b>Person4</b></th>";
                echo  "</tr>";
				for($rowIndex=0;$rowIndex<$hours;$rowIndex++)
				{
					  if($rowIndex%2 == 0)
				   {
						echo "<tr class='even'>";	
						echo "<td class='td1'><b>".returnTime($rowIndex, $hour, $daytime).":00 ".returnDayTime($rowIndex, $hour, $daytime)."</b></td>";
						echo "<td class='td1' </td>";
						echo "<td class='td1' </td>"; 
						echo "<td class='td1' </td>";
						echo "<td class='td1' </td>";
						echo "</tr>";
						
					}
					else{
						echo "<tr class='odd'>";
						echo "<td class='td1'><b>".returnTime($rowIndex, $hour, $daytime).":00 ".returnDayTime($rowIndex, $hour, $daytime)."</b></td>";
						echo "<td class='td1' </td>";
						echo "<td class='td1' </td>";
						echo "<td class='td1' </td>";
						echo "<td class='td1' </td>";
						echo "</tr>";
					}
					
				}
			?> 

            </table>

        </div>

    </body>

</html>