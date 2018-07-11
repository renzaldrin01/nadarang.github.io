<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php  
include('connections.php');
require('fpdf181/fpdf.php');

class PDF extends FPDF 
{
function Header()
{
	$this->Image('headerhd.png',15,17,180);
	$this->SetFont('Arial','B',15);
	
	$this->Ln(20);
}

}

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->SetFont('Arial','',12);
//$pdf->SetAutoPageBreak();
session_start();
$session = $_SESSION["user_name"];
$query = mysqli_query($connections, "SELECT * FROM proposals INNER JOIN date_of_proposals ON (proposals.proposal_id = date_of_proposals.proposal_id) WHERE proposals.status='dummy' AND proposals.session='$session' LIMIT 1");//session
while ($row=mysqli_fetch_array($query)) {
	$date = date('F d, Y', strtotime($row["proposal_date"]));
	$product_name = $row["product_name"];
	$product_qty = $row["product_qty"] . ' ' . $row["qty_type"];
	$price_total = $row["price_total"];
		
	if($_SESSION["id"]==1) {
	$pdf->AddPage();
	$pdf->Image("../try.png",0,0,220,300);
	
	$pdf->Cell(40,5,'',0,1);
	$pdf->Ln(20);
}

	$pdf->AddPage();
	$pdf->Cell(20,5,'',0,0);
	$pdf->Cell(150,5,'',0,1);
	$pdf->Cell(20,3,'',0,0);
	$pdf->Cell(150,3,'',0,1);
	$pdf->Cell(20,5,'',0,0);
	$pdf->Cell(150,5,'',0,1);
	$pdf->Cell(20,3,'',0,0);
	$pdf->Cell(150,3,'',0,1);
	//Date
	$pdf->Cell(20,5,'',0,0);
	$pdf->Cell(150,5,$date,0,1);
	//spacing
	$pdf->Cell(20,5,'',0,0);
	$pdf->Cell(150,5,'',0,1);
	//Name
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(20,5,'',0,0);
	$pdf->Cell(150,5,"name",0,1,'L');
	$pdf->SetFont('Arial','',12);
	//Position
	$pdf->Cell(20,5,'',0,0);
	$pdf->Cell(150,5,"position",0,1);
	//Company
	$pdf->Cell(20,5,'',0,0);
	$pdf->Cell(150,5,"company",0,1);
	//Address
	$pdf->Cell(20,5,'',0,0);
	$pdf->Cell(150,5,"address",0,1);	
	//spacing
	$pdf->Cell(20,5,'',0,0);
	$pdf->Cell(150,5,'',0,1);	
	$pdf->Cell(20,5,'',0,0);
	$pdf->Cell(150,5,'',0,1);
	//Dear
	$pdf->Cell(20,5,'',0,0);
	$pdf->Cell(150,5,"Dear $dear,",0,1);
	//spacing
	$pdf->Cell(20,5,'',0,0);
	$pdf->Cell(150,5,'',0,1);
	//Greetings
	$pdf->Cell(20,5,'',0,0);
	$pdf->Cell(150,5,'Greetings from MEDTEK!',0,1);
	//spacing
	$pdf->Cell(20,5,'',0,0);
	$pdf->Cell(150,5,'',0,1);	
	$pdf->Cell(20,5,'',0,0);
	$pdf->Cell(150,5,'',0,1);
	//Below Something
	$pdf->Cell(20,5,'',0,0);
	$pdf->Cell(150,5,'Below herewith is the quolation for the following items for your reference:',0,1);
	//spacing
	$pdf->Cell(20,5,'',0,0);
	$pdf->Cell(150,5,'',0,1);
	//Greetings
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(26,5,'',0,0);
	$pdf->Cell(75,5,' ITEM ',1,0);
	$pdf->Cell(25,5,'UNIT ',1,0,'C');
	$pdf->Cell(30,5,'PRICE ',1,1,'C');
	$pdf->SetFont('Arial','',12);

	$pdf->Cell(26,5,'',0,0);
	$pdf->Cell(75,5,$product_name,1,0);
	$pdf->Cell(25,5,$product_qty,1,0,'C');
	$pdf->Cell(30,5,$price_total,1,1,'C');

	//spacing
	$pdf->Cell(20,5,'',0,0);
	$pdf->Cell(150,5,'',0,1);

	$data1 = array(array("We appreciate the opportunity to quote on your requirements. Should you be interested in any of our other products, we would gladly accommodate and schedule a presentation at a time most convinient to you. Please feel free to contact us at telephone numbers 8069943, 8023258 and 8069267 or e-mail us at medtek@medtek.com.ph."));

	foreach($data1 as $item){
	$cellWidth=80;//wrapped cell width
	$cellHeight=5;
	
	if($pdf->GetStringWidth($item[0]) < $cellWidth){
		$line=1;
	}else{
		$textLength=strlen($item[0]);
		$errMargin=10;		
		$startChar=0;		
		$maxChar=0;		
		$textArray=array();
		$tmpString="";		
		
		while($startChar < $textLength){ 
			while( 
			$pdf->GetStringWidth( $tmpString ) < ($cellWidth-$errMargin) &&
			($startChar+$maxChar) < $textLength ) {
				$maxChar++;
				$tmpString=substr($item[0],$startChar,$maxChar);
			}
			$startChar=$startChar+$maxChar;
			
			array_push($textArray,$tmpString);
			
			$maxChar=0;
			$tmpString='';
			
		}
		
		$line=count($textArray);
	}
	$pdf->Cell(20,5,'',0,0);
	
	//$pdf->Cell(10,($line * $cellHeight),$item[0],1,0); //adapt height to number of lines
	
	
	$xPos=$pdf->GetX();
	$yPos=$pdf->GetY();
	$pdf->MultiCell(150,$cellHeight,$item[0],0);
	$pdf->Cell(20,5,'',0,0);
	$pdf->Cell(150,5,'',0,1);
	$pdf->Cell(20,5,'',0,0);
	$pdf->Cell(150,5,'Thank you and we look forward to an engaging business relationship with you.',0);
	$pdf->Cell(20,5,'',0,1);
	$pdf->Cell(150,5,'',0,1);
	//-----------------Sincerely-------------------//
	$pdf->Cell(20,5,'',0,0);
	$pdf->Cell(150,5,"Sincerely $sincerely,",0); //
	$pdf->SetXY($xPos + $cellWidth , $yPos);
	
}
	$pdf->Image('footerhd.png',5,274,200); 

	$pdf->Cell(40,5,'',0,1);

	$del=$row["proposal_id"];
	mysqli_query($connections, "UPDATE proposals SET status='Draft' WHERE proposal_id=$del");
        mysqli_query($connections, "UPDATE date_of_proposals SET status='Draft' WHERE proposal_id=$del");

}
ob_start();
	$pdf->Output();
	ob_end_flush();

?>
</body>
</html>