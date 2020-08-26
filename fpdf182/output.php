<?php
include 'fpdf.php';
Class dbObj{
    /* Database connection start */
    var $dbhost = "localhost";
    var $username = "root";
    var $password = "";
    var $dbname = "hospital_demo";
    var $conn;
    function getConnstring() {
    $con = mysqli_connect($this->dbhost, $this->username, $this->password, $this->dbname) or die("Connection failed: " . mysqli_connect_error());
    
    /* check connection */
    if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
    } else {
    $this->conn = $con;
    }
    return $this->conn;
    }
    }
class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
    $this->Image('medica.png',10,5,40);
    $this->SetFont('Arial','B',13);
    // Move to the right
    $this->Cell(80);
    // Title
    $this->Cell(100,10,'Medica Pathology department',1,0,'C');
    // Line break
    $this->Ln(20);
}
 
// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

 
$db = new dbObj();
$connString =  $db->getConnstring();
$display_heading = array('PID'=>'PID','TID'=>'TID', 'NAME'=> 'NAME','ADDRESS'=>'ADDRESS' ,'EMAIL'=>'EMAIL','PHONE'=>'PHONE','TEST'=>'TEST','PAYMENT'=>'PAYMEN','DATE'=>'DATE');
 
$result = mysqli_query($connString, "SELECT PID,TID,NAME,ADDRESS,EMAIL,PHONE,TEST,PAYMENT,DATE(DATE) FROM TEST_DETAILS") or die("database error:". mysqli_error($connString));
 
$pdf = new PDF('L','mm','A4');
//header
$pdf->AddPage();
$y_axis_initial = 40;
$pdf->SetFillColor(232, 232, 232);
$pdf->SetY($y_axis_initial);
    $pdf->SetX(5);
//foter page
$pdf->AliasNbPages();
$pdf->SetFont('Arial','B',10);
$max=25;
$i=0;
$pdf->SetFillColor(232, 232, 232);
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->SetY($y_axis_initial);
    $pdf->SetX(5);
    $pdf->Cell(10, 10, 'PID', 1, 0, 'L', 1);
    $pdf->Cell(28, 10, 'TID', 1, 0, 'L', 1);
    $pdf->Cell(27, 10, 'NAME', 1, 0, 'L', 1);
    $pdf->Cell(60, 10, 'ADDRESS', 1, 0, 'L', 1);
    $pdf->Cell(60, 10, 'EMAIL', 1, 0, 'L', 1);
    $pdf->Cell(30, 10, 'PHONE', 1, 0, 'L', 1);
    $pdf->Cell(25, 10, 'TEST', 1, 0, 'L', 1);
    $pdf->Cell(20, 10, 'PAYMENT', 1, 0, 'L', 1);
    $pdf->Cell(30, 10, 'DATE', 1, 0, 'L', 1);
    $row_height = 10;
    $y_axis = $y_axis_initial + $row_height;
while($row = $result->fetch_row())
    {
        //If the current row is the last one, create new page and print column title
        if ($i == $max)
        {
            $pdf->AddPage();

            //print column titles for the current page
            $pdf->Cell(10, 10, 'PID', 1, 0, 'L', 1);
            $pdf->Cell(28, 10, 'TID', 1, 0, 'L', 1);
            $pdf->Cell(27, 10, 'NAME', 1, 0, 'L', 1);
            $pdf->Cell(60, 10, 'ADDRESS', 1, 0, 'L', 1);
            $pdf->Cell(60, 10, 'EMAIL', 1, 0, 'L', 1);
            $pdf->Cell(30, 10, 'PHONE', 1, 0, 'L', 1);
            $pdf->Cell(25, 10, 'TEST', 1, 0, 'L', 1);
            $pdf->Cell(20, 10, 'PAYMENT', 1, 0, 'L', 1);
            $pdf->Cell(30, 10, 'DATE', 1, 0, 'L', 1);
            //Go to next row
            $y_axis = $y_axis + $row_height;

            //Set $i variable to 0 (first row)
            $i = 0;
        }

        $pid = $row[0];
        $tid = $row[1];
        $name = $row[2];
        $add = $row[3];
        $email = $row[4];
        $phone = $row[5];
        $test = $row[6];
        $pay = $row[7];
        $date = $row[8];

        $pdf->SetY($y_axis);
        $pdf->SetX(5);
             $pdf->Cell(10, 10, $pid, 1, 0, 'L', 1);
            $pdf->Cell(28, 10, $tid, 1, 0, 'L', 1);
            $pdf->Cell(27, 10, $name, 1, 0, 'L', 1);
            $pdf->Cell(60, 10, $add, 1, 0, 'L', 1);
            $pdf->Cell(60, 10, $email, 1, 0, 'L', 1);
            $pdf->Cell(30, 10, $phone, 1, 0, 'L', 1);
            $pdf->Cell(25, 10, $test, 1, 0, 'L', 1);
            $pdf->Cell(20, 10,$pay, 1, 0, 'L', 1);
            $pdf->Cell(30, 10, $date, 1, 0, 'L', 1);
;

        //Go to next row
        $y_axis = $y_axis + $row_height;
        $i = $i + 1;
    }
// foreach($header as $heading) {
// $pdf->Cell(31,10,$display_heading[$heading['Field']],2);
// }
// foreach($result as $row) {
// $pdf->Ln();
// foreach($row as $column)
// $pdf->Cell(31,10,$column,1);
// }
$pdf->Output();
?>