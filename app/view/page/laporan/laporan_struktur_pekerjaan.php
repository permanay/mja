<?php
require_once('../../../controller/LaporanController.php');
require_once('../../../../helper/Helper.php');
require_once('../../../../vendors/fpdf/fpdf.php');

$data = $LaporanController->index();
$dproyek = $LaporanController->dproyek[0];
$page = $LaporanController->page;

class PDF extends FPDF
{	
	public $judul;
	public $proyek;
	public $klien;
	public $data;
	public $jtabel;

	function setDataLaporan($j, $p, $k)
	{
		$this->judul = $j;
		$this->proyek = $p;
		$this->klien = $k;
	}

	function setDataTabel($h, $d)
	{
		$this->jtabel = $h;
		$this->data = $d;
	}


	// Page header
	function Header()
	{
		// Logo
		$this->Image('../../../../assets/img/logo-mja.png',10,6,20);
		// Arial bold 15
		$this->SetFont('Arial','B',12);
		// Move to the right
		$this->Cell(80);
		// Title
		$this->Cell(30,0,$this->judul,0,0,'C');

		$this->Ln(1);
		$this->Cell(80);
		$this->Cell(30,10,$this->proyek,0,0,'C');

		$this->Ln(1);
		$this->Cell(80);
		$this->Cell(30,20,$this->klien,0,0,'C');

		// Line break
		$this->Ln(25);
		$this->Line(0, 30, 220, 30);
	}

	// Page footer
	function Footer()
	{
		// Position at 1.5 cm from bottom
		$this->SetY(-15);
		// Arial italic 8
		$this->SetFont('Arial','I',8);
		// Page number
		$this->Cell(0,10,'Halaman '.$this->PageNo().'/{nb}',0,0,'C');
	}

	function FancyTable()
	{
		$header = $this->jtabel;
		$data = $this->data;

		// Colors, line width and bold font
		$this->SetFillColor(255,255,255);
		$this->SetTextColor(0,0,0);
		$this->SetDrawColor(119,119,119);
		$this->SetLineWidth(.3);
		$this->SetFont('','B');
		// Header
		$w = array(15, 135, 20, 20);
		for($i=0;$i<count($header);$i++){
			$this->Cell($w[$i],7,$header[$i],1,0,'C',true);
		}

		$this->Ln();
		// Color and font restoration
		$this->SetFillColor(222,222,222);
		$this->SetTextColor(0);
		$this->SetFont('');
		// Data
		$fill = false;
		foreach($data as $d)
		{
			if ($d['strkpek_status'] == 'top') {
				$d['strkpek_volume'] = "";
				$d['pek_satuan'] = "";
			}

			
			if ($d['strkpek_status'] == 'top') {
				$this->SetFont('','B');
				$this->Cell($w[0],6,$d['strkpek_no'],'LR',0,'L',$fill);
				$this->Cell($w[1],6,ucfirst($d['pek_nama']),'LR',0,'L',$fill);
				$this->Cell($w[2],6,$d['strkpek_volume'],'LR',0,'R',$fill);
				$this->Cell($w[3],6,$d['pek_satuan'],'LR',0,'C',$fill);
				$this->SetFont('');
			}else{
				$this->Cell($w[0],6,$d['strkpek_no'],'LR',0,'L',$fill);
				$this->Cell($w[1],6,ucfirst($d['pek_nama']),'LR',0,'L',$fill);
				$this->Cell($w[2],6,$d['strkpek_volume'],'LR',0,'R',$fill);
				$this->Cell($w[3],6,$d['pek_satuan'],'LR',0,'C',$fill);
			}
			
			$this->Ln();
			$fill = !$fill;
		}
		// Closing line
		$this->Cell(array_sum($w),0,'','T');
	}
}

// Instanciation of inherited class
$pdf = new PDF();
// header
$j = 'Struktur Pekerjaan Proyek';
$p = $dproyek['pryk_nama'];
$k = $dproyek['klien_nama'];
$pdf->setDataLaporan($j, $p, $k);

$h = array('No', 'Nama Pekerjaan', 'Volume', 'Satuan');
$d = $data['struktur_pekerjaan'];
$pdf->setDataTabel($h, $d);

// header
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);

// page

$pdf->FancyTable();

// page

$pdf->Output();

?>

