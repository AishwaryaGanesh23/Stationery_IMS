<!DOCTYPE html>
<html lang="en">
<head>
    <title>Stationery Shop Admin IMS</title>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/bootstrap-responsive.min.css"/>
    <link rel="stylesheet" href="css/fullcalendar.css"/>
    <link rel="stylesheet" href="css/matrix-style.css"/>
    <link rel="stylesheet" href="css/matrix-media.css"/>
    <script src="https://kit.fontawesome.com/c116cc5e29.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/jquery.gritter.css"/>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>
<body>


<div id="header">

    <h2 style="color: white;position: absolute">
        <a href="dashboard.html" style="color:white; margin-left: 15px; margin-top: 40px">Stationery</a>
    </h2>
</div>



<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
    <ul class="nav">
        <li><a href="../employee/homepage.php"><i class="fas fa-house-user"></i> Employee Dashboard</a></li>

    </ul>
</div>

<!--sidebar-menu-->
<div id="sidebar">
    <ul>
        <li>
            <a href="homepage.php"><i class="fas fa-home"></i><span>Homepage</span></a>
        </li>

        <li>
            <a href="add_employee.php"><i class="fas fa-users"></i><span>Employees</span></a>
        </li>

        <li>
            <a href="add_unit.php"><i class="fas fa-ruler"></i><span>Units</span></a>
        </li>

        <li>
            <a href="add_company.php"><i class="fas fa-building"></i><span>Companies</span></a>
        </li>

        <li>
            <a href="add_product.php"><i class="fas fa-box-open"></i><span>Products</span></a>
        </li>

        <li>
            <a href="add_supplier.php"><i class="fas fa-truck"></i><span>Suppliers</span></a>
        </li>

        <li>
            <a href="purchase_master.php"><i class="fas fa-money-check-alt"></i><span>Purchase Master</span></a>
        </li>

        <li>
            <a href="sales_master.php"><i class="fas fa-cash-register"></i><span>Sales Master</span></a>
        </li>


     <li class="submenu"><a href="#"><i class="fas fa-list"></i> <span>Reports</span> <span
                class="label label-important">+</span></a>
            <ul>
                <li><a href="purchase_report.php"><i class="fas fa-receipt"></i> <span> Purchase Report </span> </a></li>
                <li><a href="view_bills.php"><i class="fas fa-file-invoice-dollar"></i> <span> Sales Report </span> </a></li>
                <li><a href="stock_master.php"><i class="fas fa-warehouse"></i> <span> Stock Report </span> </a></li>
                <li>  <a href="returned_products_list.php"><i class="fas fa-undo-alt"></i> <span> Returns Report </span> </a></li>
                <li><a href="customers.php"><i class="fas fa-address-book"></i></i> <span> Customer List </span> </a></li>
            </ul>
        </li>

    </ul>
</div>
<!--sidebar-menu-->
<div id="search">

        <a href="logout.php" style="color:white"><i class="fas fa-sign-out-alt"></i><span>LogOut</span></a>

</div>
