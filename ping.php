<?php
/*
// ping 1 ip address
$ip = "10.1.1.100";
$ping = exec("ping -n 1 $ip",$output,$status) ;
echo $status; //0:successful, 1:unsuccessful
*/


/*
//ping multi ip address
$iplist =  ["google.com","10.1.1.100","google.com"] ;
$i = count($iplist);
for ($j=0;$j<$i;$j){
    $ip = $iplist[$j];
    $ping = exec("ping  -n 1 $ip",$output,$status);
    echo $status;
    echo '';
}
*/
/*
//array
$iplist = array(

array("142.250.200.238", "google"),
array("8.8.8.8","google DNS"),
array("8.8.4.4","google DNS 2"),
);
$i = count($iplist);
for ($j=0;$j<$i;$j++){
    $ip = $iplist[$j][0];
    $ping = exec("ping  -n 1 $ip",$output,$status);
    echo "ping".$iplist[$j][0].$iplist[$j][1];
    echo $status;
    echo '<br/>';
}
*/

// create a table showing the results
$iplist = array(

    array("142.250.200.238", "google"),
    array("8.8.8.8","google DNS"),
    array("8.8.4.4","google DNS 2"),
    );
    $i = count($iplist);
    $results = [];
    for ($j=0;$j<$i;$j++){
        $ip = $iplist[$j][0];
        $ping = exec("ping  -n 1 $ip",$output,$status);
        $results[] = $status; 
    }

    //table
echo '<font face=courier new>';
    echo "<table border=1 style=border-collapse:collapse>
    <th colspan=5>ping Monitoring</th>
    <tr>
<td align=right width=20>#</td>
<td width=100>IP/URL</td>
<td width=100>Status</td>
<td width=100>status Code</td>
<td width=100>Description</td>
    </tr>";
foreach ($results as $item => $k) {

echo '<tr>';
echo '<td>'.$item.'</td>';
echo '<td>'.$iplist[$item][0].'</td>';
if ($results[$item]==0){
    echo '<td style=color:green>Online</td>';
}
else { echo '<td style=color:red>Offline</td>';}
echo '<td>'.$results[$item].'</td>';
echo '<td>'.$iplist[$item][1].'</td>';
echo '</tr>';

}
echo "</table>";
echo '</font>';
echo header("refresh: 5");
?>


