<?php
require "fpdf.php";
$db = new PDO('mysql:host=localhost;dbname=mediclock_db','root','');

class myPDF extends FPDF{
    function header(){
          $this->Image('../assets/logo.png',6,6);
          $this->SetFont('Arial','B',14);
          $this->Cell(276,5,'Feedback Report',0,0,'C');
          $this->Ln();
          $this->SetFont('Times','',12);
          $this->Cell(276,10,'Life Click Corporation',0,0,'C');
          $this->Ln(20);
    }
    function footer(){
      $this->SetY(-15);
      $this->SetFont('Arial','',8);
      $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    }
    function headerTable(){
      $this->SetFont('Times','B',12);
      $this->Cell(15,10,'ID',1,0,'C');
      $this->Cell(50,10,'First Name',1,0,'C');
      $this->Cell(50,10,'Last Name',1,0,'C');
      $this->Cell(50,10,'Contact No.',1,0,'C');
      $this->Cell(55,10,'Email',1,0,'C');
      $this->Cell(60,10,'Feedback',1,0,'C');
      $this->Ln();
    }
    function viewTable($db){
        $this->SetFont('Times','',12);
        $stmt = $db->query('select *from feedbacks');
        while($data =$stmt->fetch(PDO::FETCH_OBJ)){
            $this->Cell(15,10,$data->id,1,0,'C');
            $this->Cell(50,10,$data->firstName,1,0,'L');
            $this->Cell(50,10,$data->lastName,1,0,'L');
            $this->Cell(50,10,$data->contactNo,1,0,'L');
            $this->Cell(55,10,$data->email,1,0,'L');
            $this->Cell(60,10,$data->feedback,1,0,'L');
            $this->Ln();
        }
    }
}

$pdf = new myPDF();
$pdf->AliasNbPages();
$pdf->AddPage('L','A4',0);
$pdf->headerTable();
$pdf->viewTable($db);
$pdf->Output();
 ?>
