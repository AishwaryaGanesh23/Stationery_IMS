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
        <li class="dropdown" id="profile-messages">
            <a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i
                    class="far fa-user"></i> <span class="text">Welcome User</span><b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li><a href="#"><i class="fas fa-user"></i> My Profile</a></li>
                <li class="divider"></li>
                <li><a href="#"><i class="fas fa-check"></i> My Tasks</a></li>
                <li class="divider"></li>
                <li><a href="login.html"><i class="fas fa-sign-out-alt"></i> Log Out</a></li>
            </ul>
        </li>


    </ul>
</div>

<!--sidebar-menu-->
<div id="sidebar">
    <ul>
        <li>
            <a href="homepage.php"><i class="fas fa-home"></i><span>Dashboard</span></a>
        </li>

        <li>
            <a href="add_employee.php"><i class="fas fa-users"></i><span>Employees</span></a>
        </li>

        <li>
            <a href="add_unit.php"><i class="fas fa-ruler"></i><span>Units</span></a>
        </li>

        <li>
            <a href="add_supplier.php"><i class="fas fa-truck"></i><span>Suppliers</span></a>
        </li>

        <li class="submenu"><a href="#"><i class="fas fa-list"></i> <span>Forms</span> <span
                class="label label-important">3</span></a>
            <ul>
                <li><a href="form-common.html">Basic Form</a></li>
                <li><a href="form-validation.html">Form with Validation</a></li>
                <li><a href="form-wizard.html">Form with Wizard</a></li>
            </ul>
        </li>

    </ul>
</div>
<!--sidebar-menu-->
<div id="search">

        <a href="index.html" style="color:white"><i class="fas fa-sign-out-alt"></i><span>LogOut</span></a>

</div>
