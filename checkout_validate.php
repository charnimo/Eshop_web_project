<?php
require('fpdf/fpdf.php');

libxml_use_internal_errors(true); // to suppress warnings
error_reporting(E_ERROR | E_PARSE);
// PDF setup

$pdf=new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 18);
if ($_SERVER["REQUEST_METHOD"] == "POST" ) {

    $firstname = $_POST['firstName'];
    $lastname = $_POST['lastName'];
    $username= $_POST['username'];  
    $email = $_POST['email'];
    $address= $_POST['address'];
    $country= $_POST['country'];
    $cc_name= $_POST['cc-name'];


    $pdf->MultiCell(0,10,"name : $lastname $firstname");
    $pdf->MultiCell(0,10,"email : $email");
    $pdf->MultiCell(0,10,"address : $address");
    $pdf->MultiCell(0,10,"account number : $cc_name");
    //echo"azeazeaze\n";
    //echo$firstname;
    //echo "\n";
    //echo$lastname;
    //echo "<br>";

    $dochtml = new domDocument();
    $html_content = file_get_contents('Checkout.php');
    $dochtml->loadHTML($html_content);
    $l = $dochtml->getElementById('cart_elements');
    $elements= $l->getElementsByTagName('li');
    foreach ($elements as $li){
        $pdf->SetFont('Arial', 'B', 18);

        $name=$li->getElementsByTagName('div');
        $name=$name->item(0)->nodeValue;
        $pdf->MultiCell(0,5,"$name");
        
        //echo $name;
        //echo "   :   ";
        $name=$li->getElementsByTagName('span');
        $name=$name->item(0)->nodeValue;
        $pdf->MultiCell(0,5,"$name",0,'C');

        //echo $name;
        //echo "<br>";
        $name=$li->getElementsByTagName('strong');
        $name=$name->item(0)->nodeValue;
        $pdf->MultiCell(0,5,"$name",0,"C");

        //echo $name;
        //echo "<br>";


    }
}



#$pdf->Cell(60,20,"$name"); 

$pdf->Output();

?>