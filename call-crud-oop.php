<?php 
require_once "crud-oop-class.php";

$obj = new Database();
echo "<pre>";

// $obj->insert("students",["student_name"=>"Shadi","age"=>"25","city"=>"Park Street","course"=>"3"]);
// echo "We are inserting: ";
// print_r($obj->getResults());


// $obj->update("students",["student_name"=>"Sheikh Shadi","age"=>"25","city"=>"Sylhet","course"=>"3"],"id='15'");
// echo "We are updating: ";
// print_r($obj->getResults());


// $obj->delete("students","id='7'");
// echo "We are deleting: ";
// print_r($obj->getResults());



// $obj->sql("SELECT * FROM students");
// echo "We are Selecting data using raw query: ";
// print_r($obj->getResults()); 


$join = " course ON students.course = course.course_id";
$limit = "2";
$row = "students.id, students.student_name,students.age,students.city,course.course_name";
$obj->select("students",$row ,$join,"id<'150'","id DESC",$limit);
echo "We are Selecting data from Database: <br>";
print_r($obj->getResults());



echo "Pagination: ";
echo $obj->pagination("students",$join,"id<'150'",$limit);
print_r($obj->getResults());
?>