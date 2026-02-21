<?php
include '../config.php';
// Placeholder for Firebase auth check
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Admin Dashboard - Travel Agency</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
   <link rel="stylesheet" href="../css/style.css">
   <style>
      :root {
         --admin-bg: #1a1a2e;
         --admin-card: #16213e;
         --admin-text: #e94560;
      }
      body {
         background-color: var(--admin-bg);
         color: #fff;
         font-family: 'Poppins', sans-serif;
      }
      .admin-container {
         padding: 2rem;
         max-width: 1200px;
         margin: 0 auto;
      }
      .header {
         display: flex;
         justify-content: space-between;
         align-items: center;
         margin-bottom: 2rem;
         background: var(--admin-card);
         padding: 1.5rem;
         border-radius: 10px;
      }
      table {
         width: 100%;
         border-collapse: collapse;
         background: var(--admin-card);
         border-radius: 10px;
         overflow: hidden;
      }
      th, td {
         padding: 1.5rem;
         text-align: left;
         border-bottom: 1px solid #0f3460;
      }
      th {
         background: #0f3460;
         color: var(--admin-text);
         text-transform: uppercase;
         font-size: 1.2rem;
      }
      .btn-whatsapp {
         background: #25d366;
         color: #fff;
         padding: 0.5rem 1rem;
         border-radius: 5px;
         text-decoration: none;
         display: inline-flex;
         align-items: center;
         gap: 0.5rem;
      }
      .status-badge {
         padding: 0.3rem 0.8rem;
         border-radius: 20px;
         font-size: 1rem;
         font-weight: bold;
      }
      .status-new { background: #3498db; }
      .status-contacted { background: #f39c12; }
      .status-paid { background: #2ecc71; }
      .status-cancelled { background: #e74c3c; }
   </style>
</head>
<body>
   <div class="admin-container">
      <div class="header">
         <h1><i class="fas fa-user-shield"></i> Admin Dashboard</h1>
         <div class="user-info">
            <span>Welcome, Staff</span>
            <a href="#" class="btn" style="margin-left: 1rem; background: var(--admin-text);">Logout</a>
         </div>
      </div>

      <table>
         <thead>
            <tr>
               <th>ID</th>
               <th>Customer</th>
               <th>Destination</th>
               <th>Status</th>
               <th>Communication</th>
               <th>Action</th>
            </tr>
         </thead>
         <tbody>
            <?php
$select_bookings = mysqli_query($connection, "SELECT * FROM `book_form` ORDER BY id DESC");
if (mysqli_num_rows($select_bookings) > 0) {
    while ($row = mysqli_fetch_assoc($select_bookings)) {
?>
            <tr>
               <td>#<?php echo $row['id']; ?></td>
               <td>
                  <strong><?php echo $row['name']; ?></strong><br>
                  <small><?php echo $row['email']; ?></small>
               </td>
               <td><?php echo $row['location']; ?></td>
               <td>
                  <span class="status-badge status-<?php echo strtolower($row['status']); ?>">
                     <?php echo $row['status']; ?>
                  </span>
               </td>
               <td>
                  <a href="https://wa.me/<?php echo preg_replace('/[^0-9]/', '', $row['phone']); ?>" target="_blank" class="btn-whatsapp">
                     <i class="fab fa-whatsapp"></i> WhatsApp
                  </a>
               </td>
               <td>
                  <form action="update_status.php" method="post" style="display: flex; gap: 0.5rem;">
                     <input type="hidden" name="booking_id" value="<?php echo $row['id']; ?>">
                     <select name="status" style="padding: 0.5rem; border-radius: 5px; background: #0f3460; color: #fff; border: none;">
                        <option value="New" <?php if ($row['status'] == 'New')
            echo 'selected'; ?>>New</option>
                        <option value="Contacted" <?php if ($row['status'] == 'Contacted')
            echo 'selected'; ?>>Contacted</option>
                        <option value="Paid" <?php if ($row['status'] == 'Paid')
            echo 'selected'; ?>>Paid</option>
                        <option value="Cancelled" <?php if ($row['status'] == 'Cancelled')
            echo 'selected'; ?>>Cancelled</option>
                     </select>
                     <button type="submit" name="update" class="btn" style="background: var(--admin-text); cursor: pointer; border: none; padding: 0.5rem 1rem; border-radius: 5px; color: #fff;">Update</button>
                  </form>
               </td>
            </tr>
            <?php
    }
}
else {
    echo '<tr><td colspan="6" style="text-align:center;">No bookings found</td></tr>';
}
?>
         </tbody>
      </table>
   </div>
</body>
</html>
