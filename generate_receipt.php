<?php
session_start();
require_once 'vendor/autoload.php';
require_once 'config.php';

use Dompdf\Dompdf;
use Dompdf\Options;

// Ensure user is logged in
if (!isset($_SESSION['user_id'])) {
    die("Unauthorized access.");
}

$user_id = $_SESSION['user_id'];

// Get booking ID from query parameter
if (isset($_GET['booking_id']) && !empty($_GET['booking_id'])) {
    $booking_id = mysqli_real_escape_string($connection, $_GET['booking_id']);
}
elseif (isset($_GET['id']) && !empty($_GET['id'])) {
    $booking_id = mysqli_real_escape_string($connection, $_GET['id']);
}
else {
    die("Invalid booking ID.");
}

// Fetch booking details
$query = "SELECT * FROM book_form WHERE id = '$booking_id'";
$result = mysqli_query($connection, $query);

if (mysqli_num_rows($result) === 0) {
    die("Booking not found or unauthorized.");
}

$booking = mysqli_fetch_assoc($result);

// HTML content for the PDF
$html = '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Booking Receipt - Travel Agency</title>
    <style>
        body { font-family: "Helvetica", "Arial", sans-serif; color: #333; line-height: 1.6; }
        .receipt-container { padding: 40px; }
        .header { border-bottom: 2px solid #0078f2; padding-bottom: 20px; margin-bottom: 40px; text-align: center; }
        .header h1 { color: #0078f2; margin: 0; text-transform: uppercase; letter-spacing: 2px; }
        .header p { color: #777; margin: 5px 0 0 0; font-size: 14px; }
        .details-table { width: 100%; border-collapse: collapse; margin-bottom: 30px; }
        .details-table th, .details-table td { padding: 12px; border-bottom: 1px solid #eee; text-align: left; }
        .details-table th { background-color: #f9f9f9; width: 40%; font-weight: bold; color: #555; }
        .total-row { font-weight: bold; font-size: 18px; color: #0078f2; }
        .footer { margin-top: 50px; text-align: center; color: #888; font-size: 12px; border-top: 1px solid #eee; padding-top: 20px; }
        .status-badge { display: inline-block; padding: 5px 10px; border-radius: 4px; color: #fff; font-weight: bold; font-size: 12px; text-transform: uppercase; }
        .status-paid { background-color: #2ecc71; }
        .status-pending { background-color: #f39c12; }
    </style>
</head>
<body>
    <div class="receipt-container">
        <div class="header">
            <h1>TRAVEL AGENCY</h1>
            <p>Official Booking Receipt</p>
        </div>

        <table class="details-table">
            <tr>
                <th>Booking Reference</th>
                <td>#TA-' . str_pad($booking['id'], 6, '0', STR_PAD_LEFT) . '</td>
            </tr>
            <tr>
                <th>Date Issued</th>
                <td>' . date('F j, Y, g:i a') . '</td>
            </tr>
            <tr>
                <th>Customer Name</th>
                <td>' . htmlspecialchars($booking['name']) . '</td>
            </tr>
            <tr>
                <th>Email Address</th>
                <td>' . htmlspecialchars($booking['email']) . '</td>
            </tr>
            <tr>
                <th>Phone Number</th>
                <td>' . htmlspecialchars($booking['phone']) . '</td>
            </tr>
            <tr>
                <td colspan="2" style="background-color: #f0f8ff; font-weight: bold; text-align: center;">Trip Details</td>
            </tr>
            <tr>
                <th>Destination / Package</th>
                <td>' . htmlspecialchars($booking['location']) . '</td>
            </tr>
            <tr>
                <th>Number of Guests</th>
                <td>' . htmlspecialchars($booking['guests']) . ' Guests</td>
            </tr>
            <tr>
                <th>Arrival Date</th>
                <td>' . date('F j, Y', strtotime($booking['arrivals'])) . '</td>
            </tr>
            <tr>
                <th>Departure Date</th>
                <td>' . date('F j, Y', strtotime($booking['leaving'])) . '</td>
            </tr>
            <tr>
                <th>Payment Status</th>
                <td>';

// Status Badge Logic
$status = strtolower($booking['status']);
if ($status == 'paid') {
    $html .= '<span class="status-badge status-paid">PAID</span>';
}
else {
    $html .= '<span class="status-badge status-pending">PENDING</span>';
}

$html .= '      </td>
            </tr>
            <tr class="total-row">
                <th>Total Paid</th>
                <td>Eg ' . number_format($booking['price'], 2) . '</td>
            </tr>
        </table>

        <div class="footer">
            <p>Thank you for choosing Travel Agency for your adventure!</p>
            <p>If you have any questions, please contact us at support@travelagency.com or +201014130237</p>
        </div>
    </div>
</body>
</html>';

// Initialize Dompdf
$options = new Options();
$options->set('isHtml5ParserEnabled', true);
$options->set('isRemoteEnabled', true);
$dompdf = new Dompdf($options);

// Load HTML
$dompdf->loadHtml($html);

// Set paper size and orientation
$dompdf->setPaper('A4', 'portrait');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream("Receipt_TA-" . $booking['id'] . ".pdf", array("Attachment" => true));

exit();
?>
