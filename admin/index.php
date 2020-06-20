<?php
    require_once ("api.php");
    $startDate = '';
    $endDate = '';
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $range = $_POST["range"];
        if($range == "custom") {
            $startDate = date("Y-m-d H:m:s", strtotime('0 hour', strtotime($_POST["startDate"])));
            $endDate = date("Y-m-d H:m:s", strtotime('0 hour', strtotime($_POST["endDate"])));
        } else if($range != "0") {
            $startDate =  date("Y-m-d H:m:s", strtotime($range, strtotime(date("Y-m-d H:m:s"))));
            $endDate = date("Y-m-d H:m:s");
        }
    }
?>

<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Dashboard</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <!-- <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico"> -->
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i,800" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- adminpro icon CSS
		============================================ -->
    <link rel="stylesheet" href="css/adminpro-custon-icon.css">
    <!-- meanmenu icon CSS
		============================================ -->
    <link rel="stylesheet" href="css/meanmenu.min.css">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- modals CSS
		============================================ -->
    <link rel="stylesheet" href="css/modals.css">
    <!-- jvectormap CSS
		============================================ -->
    <link rel="stylesheet" href="css/jvectormap/jquery-jvectormap-2.0.3.css">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="css/data-table/bootstrap-table.css">
    <link rel="stylesheet" href="css/data-table/bootstrap-editable.css">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="css/normalize.css">
    <!-- charts CSS
		============================================ -->
    <link rel="stylesheet" href="css/c3.min.css">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="css/style.css">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- modernizr JS
		============================================ -->
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
    <!-- <script type="text/javascript" src="js/jsonFetch.js"></script> -->
</head>

<body>
    <!-- Header Top area Start-->
    <div class="header-top-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-5 col-sm-0 col-xs-12">
                    <div class="header-top-menu">
                        <ul class="nav navbar-nav mai-top-nav">
                            <li class="nav-item"><a href="index.php" class="nav-link"><h1>Posts Admin Panel</h1></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header Top area End-->

    <!-- Content area Start-->
    <!-- Main Dashboard Start -->
    <div>
        <br><br>
        <!-- Participant Data Start-->
        <div class="admin-dashone-data-table-area mg-b-40">
            <div class="container  tab-content">
                <div class="row tab-pane in active" id="all">
                    <div class="col-lg-12">
                        <div class="sparkline8-list shadow-reset">
                            <div class="sparkline8-hd">
                                <div class="main-sparkline8-hd">
                                    <h1>Users List</h1>
                                    <div class="sparkline8-outline-icon">
                                        <span class="sparkline8-collapse-link"><i class="fa fa-chevron-up"></i></span>
                                        <span class="sparkline8-collapse-close"><i class="fa fa-times"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="sparkline8-graph">
                                <div class="datatable-dashv1-list custom-datatable-overright">
                                    <table id="auth_table" data-toggle="table" data-pagination="true" data-search="true"
                                        data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="false"
                                        data-key-events="true" data-resizable="true" data-cookie="true"
                                        data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true"
                                        data-toolbar="#toolbar">
                                        <thead>
                                        <tr>
                                            <th data-field="id">Author ID</th>
                                            <th data-field="fname">First Name</th>
                                            <th data-field="lname">Last Name</th>
                                            <th data-field="phone">Phone</th>
                                            <th data-field="posts">No. of Posts</th>
                                            <th data-field="comments">No. of Comments</th>
                                            <th data-field="likes">No. of Likes</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $data = readAllAuthors();
                                                $data = json_decode($data,true);
                                                $data = $data['authors'];
                                                foreach ($data as $value) {
                                                    echo "<tr><td>" . $value["id"] . "</td><td>" . $value["firstName"] . "</td><td>" . $value["lastName"] . "</td><td>" . $value["phone"] . "</td><td>" . $value["numPosts"] . "</td><td>" . $value["numComments"] . "</td><td>" . $value["numLikes"] . "</td></tr>";
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Participant Data End-->

        <!-- Participant Data Start-->
        <div class="admin-dashone-data-table-area mg-b-40">
            <div class="container  tab-content">
                <div class="row tab-pane in active" id="all">
                    <div class="col-lg-12">
                        <div class="sparkline8-list shadow-reset">
                            <div class="sparkline8-hd">
                                <div class="main-sparkline8-hd">
                                    <h1>Post List</h1>
                                    <div class="sparkline8-outline-icon">
                                        <span class="sparkline8-collapse-link"><i class="fa fa-chevron-up"></i></span>
                                        <span class="sparkline8-collapse-close"><i class="fa fa-times"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="sparkline8-graph">
                                <div class="datatable-dashv1-list custom-datatable-overright">
                                    <table id="post_table" data-toggle="table" data-pagination="true" data-search="true"
                                        data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="false"
                                        data-key-events="true" data-resizable="true" data-cookie="true"
                                        data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true">
                                        <thead>
                                        <tr>
                                            <th data-field="id">Post ID</th>
                                            <th data-field="title">Title</th>
                                            <!-- <th data-field="lname">Description</th> -->
                                            <th data-field="authorId">Author Id</th>
                                            <th data-field="datePub">Date Published</th>
                                            <th data-field="comments">No. of Comments</th>
                                            <th data-field="likes">No. of Likes</th>
                                            <th data-field="view-more">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $data = readAllPosts($startDate, $endDate);
                                                $data = json_decode($data,true);
                                                $data = $data['posts'];
                                                foreach ($data as $value) {
                                                    echo "<tr><td>" . $value["id"] . "</td><td>" . $value["title"] . "</td><td>" . $value["authorId"] . "</td><td>" . $value["datePublished"] . "</td><td>" . $value["numComments"] . "</td><td>" . $value["numLikes"] . "</td><td>". "<button><a href=\"Post.php?id=" . $value["id"] . "\"> View More </a></button></td></tr>";
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="sparkline8-hd">
                                <div class="main-sparkline8-hd">
                                    <form action="index.php" method="POST" class="row">
                                        <div class="form-group col-lg-6">
                                            <select class="form-control" onchange="myfunction()" id="mySelect" name="range">
                                                <option value="0">Show All</option>
                                                <option value="-12 hour">Last 12 Hours</option>
                                                <option value="-1 day">Last Day</option>
                                                <option value="-3 day">Last 3 Days</option>
                                                <option value="-1 week">Last Week</option>
                                                <option value="-1 month">Last Month</option>
                                                <option value="custom">Custom Range</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <input class="form-control" style="color: blue" type="submit" value="Filter Posts">
                                        </div>
                                        <div id="custom-range" style="display: none;">
                                            <div class="form-group col-lg-6">
                                                <label for="startDate">Start Date - Time</label>
                                                <input class="form-control" type="datetime-local" name="startDate">
                                            </div>
                                            <div class="form-group col-lg-6">
                                                <label for="endDate">End Date - Time</label>
                                                <input class="form-control" type="datetime-local" name="endDate">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Participant Data End-->
        <!-- Main Dashboard End -->
    </div>

    <script type="text/javascript">
        function myfunction() {
            var x = document.getElementById("mySelect").value;
            if(x=='custom') {
                document.getElementById("custom-range").style.display = "block";
            } else {
                document.getElementById("custom-range").style.display = "none";
            }
        }
    </script>
    <!-- jquery ============================================ -->
    <script src="js/vendor/jquery-1.11.3.min.js"></script>
    <!-- bootstrap JS ============================================ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- meanmenu JS ============================================ -->
    <script src="js/jquery.meanmenu.js"></script>
    <!-- mCustomScrollbar JS ============================================ -->
    <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
    <!-- sticky JS ============================================ -->
    <script src="js/jquery.sticky.js"></script>
    <!-- scrollUp JS ============================================ -->
    <script src="js/jquery.scrollUp.min.js"></script>
    <!-- scrollUp JS ============================================ -->
    <script src="js/wow/wow.min.js"></script>
    <!-- counterup JS ============================================ -->
    <script src="js/counterup/jquery.counterup.min.js"></script>
    <script src="js/counterup/waypoints.min.js"></script>
    <script src="js/counterup/counterup-active.js"></script>
    <!-- jvectormap JS ============================================ -->
    <script src="js/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="js/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="js/jvectormap/jvectormap-active.js"></script>
    <!-- peity JS ============================================ -->
    <script src="js/peity/jquery.peity.min.js"></script>
    <script src="js/peity/peity-active.js"></script>
    <!-- sparkline JS ============================================ -->
    <script src="js/sparkline/jquery.sparkline.min.js"></script>
    <script src="js/sparkline/sparkline-active.js"></script>
    <!-- flot JS ============================================ -->
    <script src="js/flot/jquery.flot.js"></script>
    <script src="js/flot/jquery.flot.tooltip.min.js"></script>
    <script src="js/flot/jquery.flot.spline.js"></script>
    <script src="js/flot/jquery.flot.resize.js"></script>
    <script src="js/flot/jquery.flot.pie.js"></script>
    <script src="js/flot/jquery.flot.symbol.js"></script>
    <script src="js/flot/jquery.flot.time.js"></script>
    <script src="js/flot/dashtwo-flot-active.js"></script>
    <!-- data table JS ============================================ -->
    <script src="js/data-table/bootstrap-table.js"></script>
    <script src="js/data-table/tableExport.js"></script>
    <script src="js/data-table/data-table-active.js"></script>
    <script src="js/data-table/bootstrap-table-editable.js"></script>
    <script src="js/data-table/bootstrap-editable.js"></script>
    <script src="js/data-table/bootstrap-table-resizable.js"></script>
    <script src="js/data-table/colResizable-1.5.source.js"></script>
    <script src="js/data-table/bootstrap-table-export.js"></script>
    <!-- main JS============================================ -->
    <script src="js/main.js"></script>

</body>
</html>