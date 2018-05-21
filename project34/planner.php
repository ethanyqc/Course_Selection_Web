<html>
<head>
  <title>Course Suggestion Website</title>
</head>
<style>.error {color: #FF0000;}</style>
<body style="background-color: ivory;">


<?php

// Estlablish and Create connection
$conn = new mysqli("localhost", "cs377", "cs377_s17","CourseDB");

// Check connection
if  (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
 //exit();
}
?>


<?php
  if(isset($_POST['submit']))
  {

    $major = $_POST['major'];
    $major2 = $_POST['major2'];

    if($major==""){
    $err = "One major is required";
    $major2="";
    }

    $course = $_POST['courseT'];
    $year = $_POST['year'];
    $semester = $_POST['semester'];

    if($year==0||$semester==""){
    $err2 = "Year and semester is required";
    $year=0;
    $semester="";
    }

    $gradYear = $_POST['gradYear'];
    $gradSem = $_POST['gradSem'];

    if($gradYear==0||$gradSem==""){
    $err3 = "Year and semester is required";
    $gradSem="";
    $gradYear=0;
    }
    else if($gradYear<$year){
    $err3 = "Graduation year must after current year";
    $gradSem="";
    $gradYear=0;



    }

$select="SELECT distinct rcourseID ";
$from="FROM requirment ";
$where="WHERE (requirment.majorName ='".$major. "' AND requirment.majorOrMinor ='".$major2. "')";
$whereor="or (requirment.majorName ='".$major2. "' AND requirment.majorOrMinor ='".$major. "')";
$query = $select.$from.$where.$whereor;

$select1="SELECT distinct ecourseID ";
$from1="FROM elective ";
$where1="WHERE (elective.majorName ='".$major. "' AND elective.majorOrMinor ='".$major2. "')";
$whereor1="or (elective.majorName ='".$major2. "' AND elective.majorOrMinor ='".$major. "')";
$query2 = $select1.$from1.$where1.$whereor1;

$select6="SELECT NumMajorEle ";
$from6="FROM major ";
$where6="WHERE major.majorName='".$major."'";
$query6 = $select6.$from6.$where6;

$select7="SELECT NumMajorOrMinorEle ";
$from7="FROM major ";
$where7="WHERE major.majorOrMinor='".$major2."'";
$query7 = $select7.$from7.$where7;

if ( ! ( $result7 = mysqli_query($conn, $query7)) )
 {
 printf("Error: %s\n", mysqli_error($conn));
 exit(1);
 }

if ( ! ( $result6 = mysqli_query($conn, $query6)) )
 {
 printf("Error: %s\n", mysqli_error($conn));
 exit(1);
 }

if ( ! ( $result2 = mysqli_query($conn, $query2)) )
 {
 printf("Error: %s\n", mysqli_error($conn));
 exit(1);
 }

 if ( ! ( $result = mysqli_query($conn, $query)) )
 {
 printf("Error: %s\n", mysqli_error($conn));
 exit(1);
 }

    }
?>

<h2>COURSE SUGGESTION FORM</h2>
<br>

<form action="info.php" method="post">
<h3>What is your major:</h3>

  <select name="major">
    <option value="">Select...</option>
    <option value="BS MATH">BS Mathmatics</option>
    <option value="BA MATH">BA Mathmatics</option>
    <option value="BS APPMATH">BS Applied Mathmatics</option>
    <option value="BS CS">BS Computer Science</option>
    <option value="BA CS">BA Computer Science</option>
    <option value="BS MATH/CS">BS Math/CS</option>
  </select><span class="error">* <?php echo $err;?></span>

  <br>

  <h3>What is your second major or minor(if you have one):</h3>

  <select name="major2">
    <option value="">Select...</option>
    <option value="BS MATH">BS Mathmatics</option>
    <option value="BA MATH">BA Mathmatics</option>
    <option value="BS APPMATH">BS Applied Mathmatics</option>
    <option value="BS CS">BS Computer Science</option>
    <option value="BA CS">BA Computer Science</option>
    <option value="MIN MATH">Minor Mathmatics</option>
    <option value="MIN APPMATH">Minor Applied Mathmatics</option>
    <option value="MIN CS">Minor Computer Science</option>
    <option value="MIN CSINFO">Minor Computer Infomatics</option>
  </select>
  <br>

  <h3>What course have you taken(hold command key to select multiples):</h3>

  <select multiple="multiple" name="courseT[]" size=10>
    <option value="CS 170"> Intro to Computer Science I</option>
    <option value="CS 171"> Intro to Computer Science II</option>
    <option value="CS 224"> Discrete Structures</option>
    <option value="CS 255"> Computer Organization / Assembly Programming</option>
    <option value="CS 323"> Data Structures and Algorithms</option>
    <option value="CS 325"> Artificial Intelligence</option>
    <option value="CS 329"> Computational Linguistics</option>
    <option value="CS 355"> Computer Architecture</option>
    <option value="CS 370">Computer Science Practicum</option>
    <option value="CS 377">Database Systems</option>
    <option value="CS 378">Data Mining</option>
    <option value="CS 424">Theory of Computing</option>
    <option value="CS 450">Systems Programming</option>
    <option value="CS 452">Operating Systems</option>
    <option value="CS 453">Computer Security</option>
    <option value="CS 455">Intro to Computer Networking</option>
    <option value="CS 456">Compiler Construction</option>
    <option value="MATH 111">Calculus I </option>
    <option value="MATH 112">Calculus II</option>
    <option value="MATH 211">Multivariable Calculus</option>
    <option value="MATH 212">Differential Equations</option>
    <option value="MATH 221">Linear Algebra</option>
    <option value="MATH 250">Foundations of Mathematics</option>
    <option value="MATH 270">History and Philosphy of Math</option>
    <option value="MATH 315">Numerical Analysis</option>
    <option value="MATH 318">Complex Variables</option>
    <option value="MATH 321">Abstract Vector Spaces</option>
    <option value="MATH 328">Number Theory</option>
    <option value="MATH 330">Intro to Combinatorics</option>
    <option value="MATH 344">Differential Geometry</option>
    <option value="MATH 345">Mathematical Modeling</option>
    <option value="MATH 346">Intro to Optimization Theory</option>
    <option value="MATH 347">Intro to Nonlinear Optimization</option>
    <option value="MATH 351">Partial Differential Equations</option>
    <option value="MATH 352">PDE's in Action</option>
    <option value="MATH 361">Probability and Statistics I </option>
    <option value="MATH 362">Probability and Statistics II</option>
    <option value="MATH 411">Real Analysis I</option>
    <option value="MATH 412">Real Analysis II</option>
    <option value="MATH 421">Abstract Algebra I</option>
    <option value="MATH 422">Abstract Algebra II</option>
    <option value="MATH 425">Mathematical Economics</option>
  </select>
  <br>

  <h3>What is your current semster and year:</h3>
  Semester:
  <select name="semester">
    <option value="">Select...</option>
    <option value="S">Spring</option>
    <option value="F">Fall</option>
  </select><span class="error">* <?php echo $err2;?></span><br>
  Year:
  <select name="year">
    <option value="">Select...</option>
    <option value=2015>2015</option>
    <option value=2016>2016</option>
    <option value=2017>2017</option>
    <option value=2018>2018</option>
    <option value=2019>2019</option>
    <option value=2020>2020</option>
    <option value=2021>2021</option>
  </select><br>


  <h3>When are you plan to graduate:</h3>
  Semester:
  <select name="gradSem">
    <option value="">Select...</option>
    <option value="S">Spring</option>
    <option value="F">Fall</option>
  </select><span class="error">* <?php echo $err3;?></span><br>
  Year:
  <select name="gradYear">
    <option value="">Select...</option>
    <option value=2017>2017</option>
    <option value=2018>2018</option>
    <option value=2019>2019</option>
    <option value=2020>2020</option>
    <option value=2021>2021</option>
  </select><br><br><br>

  <input type="submit" name="submit" value="Submit" >
</form>

<br><br>

<h2>COURSE PLANNING</h2>

<?php
echo "<h3>Duration Until Graduation</h3>";
$dur=0;
if($gradYear>=$year){
    if($semester=="S"&&$gradSem=="F"){
    $dur=($gradYear-$year)*2+1;
    }
    else if($semester=="F"&&$gradSem=="S"){
    $dur=($gradYear-$year)*2-1;;
    }
    else{
    $dur=($gradYear-$year)*2;
    }

}
echo $dur." Semesters";
echo " to graduate for degree: ".$major."  ".$major2;

?>





</body>
</html>
