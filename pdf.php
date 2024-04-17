<?php
//============================================================+
// File name   : example_011.php
// Begin       : 2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 011 for TCPDF class
//               Colored Table (very simple table)
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Colored Table
 * @author Nicola Asuni
 * @since 2008-03-04
 */

// Include the main TCPDF library (search for installation path).
require 'TCPDF/tcpdf.php';
// require 'PHPMailer/PHPMailer.php'; // Include PHPMailer library
// require 'PHPMailer/SMTP.php';

// extend TCPF with custom functions
class MYPDF extends TCPDF {

    // Load expense data from file
    public function LoadData() {
        // Read file lines
        session_start();
        include 'dbconfig.php';
        $email = $_SESSION['email'];

        $select = "SELECT * FROM `expenses` WHERE `email` = '$email';";

        $query = mysqli_query($conn, $select);
        return $query;
    }

    // Load income data from file
    public function LoadIncomeData() {
        // Read file lines
        
        include 'dbconfig.php';
        $email = $_SESSION['email'];

        $select = "SELECT * FROM `income` WHERE `email` = '$email';";

        $query = mysqli_query($conn, $select);
        return $query;
    }

    // Colored table for expenses and income
    public function ColoredTable($header, $data) {
        // Colors, line width and bold font
        $this->SetFillColor(255, 0, 0);
        $this->SetTextColor(255);
        $this->SetDrawColor(128, 0, 0);
        $this->SetLineWidth(0.3);
        $this->SetFont('', 'B');
        // Header
        $w = array(15, 45, 60, 20, 25, 20);
        $num_headers = count($header);
        for ($i = 0; $i < $num_headers; ++$i) {
            $this->Cell($w[$i], 7, $header[$i], 1, 0, 'C', 1);
        }
        $this->Ln();
        // Color and font restoration
        $this->SetFillColor(224, 235, 255);
        $this->SetTextColor(0);
        $this->SetFont('');
        // Data
        $fill = 0;
        $num = 1;
        foreach ($data as $row) {
            $this->Cell($w[0], 6, $num, 'LR', 0, 'L', $fill);
            $this->Cell($w[1], 6, $row['name'], 'LR', 0, 'L', $fill);
            $this->Cell($w[2], 6, $row['description'], 'LR', 0, 'L', $fill);
            $this->Cell($w[3], 6, $row['category'], 'LR', 0, 'L', $fill);
            $this->Cell($w[4], 6, $row['time'], 'LR', 0, 'L', $fill);
            $this->Cell($w[5], 6, $row['amount'], 'LR', 0, 'L', $fill);

            $this->Ln();
            $num++;
            $fill = !$fill;
        }
        $this->Cell(array_sum($w), 0, '', 'T');
    }
}

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetTitle('Expense Tracker Application');
$pdf->SetSubject('Expenses and Income PDF');
$pdf->SetKeywords('expenses, income');

// set default header data
$pdf->SetHeaderData('',0, PDF_HEADER_TITLE , PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set font
$pdf->SetFont('helvetica', '', 12);

// add a page
$pdf->AddPage();

// column titles for expenses
$header_expenses = array('Sr. No.', 'Title', 'Description', 'Category', 'Date', 'Amount');

// data loading for expenses
$data_expenses = $pdf->LoadData();

// print colored table for expenses
$pdf->ColoredTable($header_expenses, $data_expenses);

// add a new page
$pdf->AddPage();

// column titles for income
$header_income = array('Sr. No.', 'Title', 'Description','Category', 'Date','Amount');

// data loading for income
$data_income = $pdf->LoadIncomeData();

// print colored table for income
$pdf->ColoredTable($header_income, $data_income);

// close and output PDF document
$pdfFilePath = 'pdf/pdf.pdf'; // Specify the file path where you want to save the PDF
$pdf->Output($pdfFilePath, 'F');

// Check if the PDF was successfully saved
if (file_exists($pdfFilePath)) {
    echo 'PDF file saved successfully.';
} else {
    echo 'Error: Unable to save PDF file.';
}

?>
