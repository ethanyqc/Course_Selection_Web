
<?php require('planner.php') ?>


<?php
echo "<h3>Course Suggestion</h3>";
echo "<br>";
echo "YOU STILL NEED TO TAKE THE FOLLOWING REQUIRMENT:";
echo "<br>";
$n=0;
while ( $row = mysqli_fetch_assoc( $result ) )
{
 foreach ($row as $key => $value)
 {

 //echo "<br>";
  $sol[$n]=$value ;
  $n++;
 //print ($key . ": " . $value . "\n");
 //echo "<br>";
 }

 }

for($i=0;$i<count($course);$i++){
  for($j=0;$j<$n;$j++){
    if($course[$i]==$sol[$j]){
      unset($sol[$j]);
    }
  }
}
//$sol[]=courses requred
foreach ($sol as &$c) {
  print ("=> " . $c . "\n");
  echo "<br>";
}
echo "<br>";
echo "<br>";


?>

<?php
$me=0;
while ( $row = mysqli_fetch_assoc( $result6 ) )
{
 foreach ($row as $key => $value)
 {

 //echo "<br>";
  $me=$value ;
 // $a++;
 //print ($key . ": " . $value . "\n");
 //echo "<br>";
 }

 }

$mme=0;
while ( $row = mysqli_fetch_assoc( $result7 ) )
{
 foreach ($row as $key => $value)
 {

 //echo "<br>";
  $mme=$value ;
 // $b++;
 //print ($key . ": " . $value . "\n");
 //echo "<br>";
 }

 }



echo "<br>";
echo "YOU STILL NEED TO CHOOSE FROM THE FOLLOWING ELECTIVES:";
echo "<br>";
$l=0;
while ( $row = mysqli_fetch_assoc( $result2 ) )
{
 foreach ($row as $key => $value)
 {

 //echo "<br>";
  $sol2[$l]=$value ;
  $l++;
 //print ($key . ": " . $value . "\n");
 //echo "<br>";
 }

 }
$count=0;
for($i=0;$i<count($course);$i++){
  for($j=0;$j<$n;$j++){
    if($course[$i]==$sol2[$j]){
      unset($sol2[$j]);
      $count++;
    }
  }
}

foreach ($sol2 as &$c) {
  print ("=> " . $c . "\n");
  echo "<br>";
}
echo "<br>";
echo "<br>";
if($me[0]+$mme[0]-$count<=0){
echo "YOU STILL NEED TO TAKE: 0 course from the list of electives";
}
else{
  echo "YOU STILL NEED TO TAKE: ";
  echo $me[0]+$mme[0]-$count." course from the list of electives";

}
echo "<br>";

$select8="SELECT courseID ";
$from8="FROM course ";
$where8="WHERE course.offerSem='F' OR course.offerSem='S'OR course.offerSem='R'";
$query8 = $select8.$from8.$where8;

if ( ! ( $result8 = mysqli_query($conn, $query8)) )
 {
 printf("Error: %s\n", mysqli_error($conn));
 exit(1);
 }

$c=0;
 while ( $row = mysqli_fetch_assoc( $result8 ) )
{
 foreach ($row as $key => $value)
 {

 //echo "<br>";
  $sfonly[$c]=$value ;
  $c++;
 //print ($key . ": " . $value . "\n");
 //echo "<br>";
 }
 //sfonly[]=courses thats only in Spring or Fall or Rare
 //sol[]=required courses thats still need to take 
 //sol1[]=electives that need to choose from

 }



$select9="SELECT distinct rCourseID  ";
$from9="FROM requirment,major,prerequisite ";
$where9="WHERE requirment.majorName=major.majorName AND requirment.majorOrMinor=major.majorOrMinor 
AND requirment.rCourseID=pCourseID AND ";
$whereor9="((requirment.majorName='".$major."'AND requirment.majorOrMinor='".$major2."')OR 
(requirment.majorName='".$major2."'AND requirment.majorOrMinor='".$major."'))";
$query9 = $select9.$from9.$where9.$whereor9;

if ( ! ( $result9 = mysqli_query($conn, $query9)) )
 {
 printf("Error: %s\n", mysqli_error($conn));
 exit(1);
 }

 echo "<h3>Prereq course that need to be taken for your major(priority)</h3>";

 while ( $row = mysqli_fetch_assoc( $result9 ) ){
 foreach ($row as $key => $value)
 {

 //echo "<br>";
  print($value);
  echo "<br>";
 //print ($key . ": " . $value . "\n");
 //echo "<br>";
 }
 //sfonly[]=courses thats only in Spring or Fall or Rare
 //sol[]=required courses thats still need to take 
 //sol1[]=electives that need to choose from
}


echo "<h3>Required course only in Spring or Fall or Rarely offered</h3>";
foreach ($sol as &$a) {
  foreach ($sfonly as &$b) {
  if($a==$b){
    print($a);
    echo "<br>";
  }
  }
}

echo "<h3>Elective course only in Spring or Fall or Rarely offered</h3>";
foreach ($sol2 as &$a) {
  foreach ($sfonly as &$b) {
  if($a==$b){
    print($a);
    echo "<br>";
  }
  }
}







?>



<?php
echo "<br>";
echo "<br>";
echo "<h2>COURSE INFORMATION</h2>";
echo "<h3>Required Course Infos:</h3>";
echo "<br>";
foreach ($sol as &$c) {
  print ("=> " . $c . "\n");
  echo "<br>";


$select2="SELECT * ";
$from2="FROM course ";
$where2="WHERE courseID='".$c."'";
$query3 = $select2.$from2.$where2;

if ( ! ( $result3 = mysqli_query($conn, $query3)) )
 {
 printf("Error: %s\n", mysqli_error($conn));
 exit(1);
 }

 while ( $row = mysqli_fetch_assoc( $result3 ) )
{
 foreach ($row as $key => $value)
 {


 print ($key . ": " . $value . "\n");
 echo "<br>";
 }
 print ("============================");
 echo "<br>";

 }


}

?>

<?php
echo "<br>";
echo "<h3>Elective Course Infos:</h3>";
echo "<br>";
foreach ($sol2 as &$c) {
  print ("=> " . $c . "\n");
  echo "<br>";


$select3="SELECT * ";
$from3="FROM course ";
$where3="WHERE courseID='".$c."'";
$query4 = $select3.$from3.$where3;

if ( ! ( $result4 = mysqli_query($conn, $query4)) )
 {
 printf("Error: %s\n", mysqli_error($conn));
 exit(1);
 }

 while ( $row = mysqli_fetch_assoc( $result4 ) )
{
 foreach ($row as $key => $value)
 {


 print ($key . ": " . $value . "\n");
 echo "<br>";
 }
 print ("=======================");
 echo "<br>";

 }


}

?>








