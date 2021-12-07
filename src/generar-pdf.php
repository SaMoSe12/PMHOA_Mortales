<?php
require('includes/fpdf.php'); 
if(!isset($_GET['otro_identificacion'])){
    $_GET['otro_identificacion'] = '';
}

class PDF extends FPDF{
    protected $col = 0; // Columna en la que esta actualmente
    protected $y0; // Ordenada de la columna
    public $titulo;

    function Header($lang='esp'){
        switch ($lang){
            case 'esp':
                $this->titulo = 'Formato de Renta';
                break;
            case 'eng':
                $this->titulo = 'Lease Form';
                break;
        }
        //Logo
        $this->Image('assets/img/logo.png', 10, 6 ,30);
        $this->SetFont('Arial', 'B', 15);
        $w = $this->GetStringWidth($this->titulo)+8;
        $this -> SetX((210-$w)/2);
        $this->Cell($w, 9, $this->titulo, 0, 0, 'C');
        $this->Ln(30);
        // Salvar la ordenada
        $this->y0 = $this->GetY();
    }

    function Footer(){
        $this->SetY(-10);
        $this->SetFont('Arial', '', 10);
        $this->Cell(80, 10, mb_convert_encoding('El Dueño', 'ISO-8859-1', "UTF-8"), 0, 0, 'C');
        $this->Line(85, 285, 15, 285);
        $this->Line(170, 285, 110, 285);
        $this->Cell(90, 10, mb_convert_encoding('Arrendatario', 'ISO-8859-1', "UTF-8"), 0, 1, 'C');
    }

    function SetCol($col){
        //Posisionar en la Columna designada
        $this->col = $col;
        $x = 10+$col*85;
        $this->SetLeftMargin($x);
        $this->SetX($x);
    }
    
    function AcceptPageBreak(){
        // Aceptar o no fin de paginas.
        if($this->col<2){
            $this->SetCol($this->col+1);
            $this->SetY($this->y0);
            return false;
        }
        else{
            $this->SetCol(0);
            return true;
        }
    }
    function ChapterTitle($num, $label){
        $this->y0 = $this->GetY();
    }

    function ChapterBody($file){
        // Leer texto de archivo
        $txt = file_get_contents($file);
        $txt = mb_convert_encoding($txt, 'ISO-8859-1', "UTF-8");
        foreach ($_GET as $key => $value) {
            switch($key){
                case "nombre_arrendador":
                    $txt = str_replace('{$nombre_arrendador}', $value, $txt);
                    break;
                case "propiedad":
                    $txt = str_replace('{$propiedad}', $value, $txt);
                    break;
                case "nombre_arrendatario":
                    $txt = str_replace('{$nombre_arrendatario}', $value, $txt);
                    break;
                case "subcondominio":
                    $txt = str_replace('{$subcondominio}', $value, $txt);
                    break;
                case "otro_identificacion":
                    $txt = str_replace('{$otro_identificacion}', $value, $txt);
                    break;
                case "fecha_desde":
                    $txt = str_replace('{$fecha_desde}', $value, $txt);
                    break;
                case "fecha_hasta":
                    $txt = str_replace('{$fecha_hasta}', $value, $txt);
                    break;                
                    
            }
        }

        $this->SetFont('Arial','',10);
        // Output text in a 6 cm width column
        $this->MultiCell(80,5,$txt);
        $this->Ln();
        $this->SetCol(0);
    }

    function PrintChapter($num, $title, $file){
        // Agregar Capitulo
        $this->AddPage();
        $this->ChapterTitle($num,$title);
        $this->ChapterBody($file);
    }
}

ob_start();
$pdf = new PDF();
$titulo = "Punta Mita HOA Formato de renta";
$pdf->SetTitle($titulo);
$pdf->SetAuthor('Punta Mita HOA');
$pdf->AliasNbPages();
$pdf->PrintChapter(1, $pdf->titulo, 'assets/documents/renta.txt');

$pdf->Output($dist = 'I');

ob_end_flush();
?>