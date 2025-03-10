<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('Location: login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Employee Management System</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Welcome to the Employee Management System</h1>
        <h2>Select an option</h2>
        
        <!-- Navbar -->
        <ul class="navbar">
            <li><a href="display_managers.php">View Managers by Department</a></li>
            <li><a href="display_employee.php">View Employee Data</a></li>
            <li><a href="display_shift.php">View Available Shifts</a></li>
            <li><a href="display_dept.php">View Departments</a></li>
            <li><a href="display_payroll.php">View Salary Data</a></li>
            <li><a href="attendance.php">Attendance Page</a></li>
            <li><a href="logout.php">Logout</a></li>
            <li><a href="attendance_summary.php">Attendance Summary</a></li>
            <li><a href="leave_requests.php">Leave Requests & Leave Status</a></li>
            <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
                <li><a href="assign_payroll.php">Assign Payroll</a></li>
                <li><a href="add_employee.php">Add New Employee</a></li>
                <li><a href="leave_approval.php">Leave Approval</a></li>
            <?php endif; ?>
        </ul>

        <!-- Form to select employee and view their shift data -->
        <h2>View Shift Data for a Specific Employee</h2>
        <form action="display_emp_shift.php" method="GET" class="form-container">
            <input type="number" name="employee_id" placeholder="Enter Employee ID" required min="1" class="input-field">
            <button type="submit" class="button">View Shift Data for Employee</button>
        </form>
    </div>
</body>
</html>
