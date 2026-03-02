<?php
error_reporting(0);
ob_start();

header('Content-Type: application/json');
$skip_die = true;
include '../../config.php';

if (!$connection) {
    ob_clean();
    echo json_encode(['status' => 'error', 'message' => 'فشل الاتصال بقاعدة البيانات. ملاحظة: InfinityFree لا تسمح بالاتصالات الخارجية. يرجى التجربة على الخادم المباشر.']);
    exit();
}

if (isset($_POST['send'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $location = $_POST['location'];
    $guests = $_POST['guests'];
    $arrivals = $_POST['arrivals'];
    $leaving = $_POST['leaving'];
    $package = $_POST['package_name'] ?? '';
    if ($package === '') {
        $package = 'Custom Request';
    }

    $total_price = $_POST['total_amount'] ?? 0;
    $payment_status = $_POST['payment_status'] ?? 'Paid';

    $request = " insert into book_form(name, email, phone, address, location, guests, arrivals, leaving, package, price, status) values('$name','$email','$phone','$address','$location','$guests','$arrivals','$leaving', '$package', '$total_price', '$payment_status') ";
    if (mysqli_query($connection, $request)) {
        $booking_id = mysqli_insert_id($connection);
        ob_clean();
        echo json_encode(['success' => true, 'booking_id' => $booking_id]);
    }
    else {
        ob_clean();
        echo json_encode(['success' => false, 'message' => mysqli_error($connection)]);
    }
    exit();
}
else {
    ob_clean();
    echo json_encode(['success' => false, 'message' => 'طلب غير صالح']);
}
?>
