<?php
    $homePage = "";
    if(isset($_SESSION["position"])) {
        if($_SESSION["position"] == "Employee") {
            $homePage = "employeeHome.php";
        } elseif($_SESSION["position"] == "Supervisor") {
            $homePage = "supervisorHome.php";
        } elseif($_SESSION["position"] == "HR Admin") {
            $homePage = "hrAdminHome.php";
        }
    }
?>
<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">FLEXIS WORK</a>
        
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="<?php echo $homePage; ?>">HOME</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="logout.php">LOG OUT</a>
            </li>
        </div>
    </nav>
</header>
