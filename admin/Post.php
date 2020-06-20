<?php
    require_once "api.php";
    $post_id = $_GET["id"];
    $post_data = readPostByID($post_id);
    $post_data = json_decode($post_data,true);
    $commentChartData = getCommentsChartData($post_id);
    $likeChartData = getLikesChartData($post_id);
?>

<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Post Data</title>
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
</head>
<body>
    <!-- Header Top area Start-->
    <div class="header-top-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-5 col-sm-0 col-xs-12">
                    <div class="header-top-menu">
                        <ul class="nav navbar-nav mai-top-nav">
                            <li class="nav-item"><a href="index.php" class="nav-link"><h1>Go Back</h1></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>    <!-- Header Top area End-->
    <br><br>
 <div class="project-details-area mg-b-40">
        <div class="container">
            <div class="row">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="project-details-wrap shadow-reset">
                        <div class="row">
                            <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                                <div class="project-details-title">
                                    <h2><span class="profile-details-name-nn">Individual Post</span></h2>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="project-details-mg">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                            <div class="project-details-st">
                                                <span><strong>ID: </strong></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                            <div class="btn-group project-list-ad">
                                                <span><?php echo $post_data["id"]; ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="project-details-mg">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                            <div class="project-details-st">
                                                <span><strong>Title: </strong></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                            <div class="project-details-dt">
                                                <span><?php echo $post_data['title']; ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="project-details-mg">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                            <div class="project-details-st">
                                                <span><strong>Description:</strong></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                            <div class="project-details-dt">
                                                <span><?php echo $post_data['description']; ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="project-details-mg">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                            <div class="project-details-st">
                                                <span><strong>Author: </strong></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                            <div class="project-details-dt">
                                                <span><?php echo $post_data['author']; ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="project-details-mg">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                            <div class="project-details-st">
                                                <span><strong>Date Published: </strong></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                            <div class="project-details-dt">
                                                <span><?php echo $post_data['datePublished']; ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="project-details-mg">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                            <div class="project-details-st">
                                                <span><strong>No. of Comments:</strong></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                            <div class="project-details-dt">
                                                <span><?php echo $post_data['numComments']; ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="project-details-mg">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                            <div class="project-details-st">
                                                <span><strong>No. of Likes: </strong></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                            <div class="project-details-dt">
                                                <span><?php echo $post_data['numLikes']; ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                 <div class="project-details-mg">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                            <div class="project-details-st">
                                                <span><strong>Liked By:</strong></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                            <div class="project-details-dt">
                                                <span><?php 
                                                        $likes = $post_data['likes'];
                                                        foreach ($likes as $like) {
                                                            echo ($like['author'] . "\r" . $like['datePublished'] . "<br>");
                                                        }
                                                    ?>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="project-details-mg">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                            <div class="project-details-st">
                                                <span><strong>Comments:</strong></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                            <div class="project-details-dt">
                                                <span><?php 
                                                        $comments = $post_data['comments'];
                                                        foreach ($comments as $comment) {
                                                            echo $comment['text'] . "\r" . $comment['author'] . "\r" . $comment['datePublished'] . "\n";
                                                        }
                                                    ?>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="likes_chart"></div>
                        <br><br>
                        <div id="comments_chart"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script>
    google.charts.load('current', {packages: ['corechart', 'bar']});
    google.charts.setOnLoadCallback(drawMultSeries);

    function drawMultSeries() {
        var date = new Array();
        var data = new Array();
        <?php
            foreach ($likeChartData as $chartData) { 
                echo "date.push(\"" . $chartData['date'] . "\"); data.push(\"" . $chartData['count'] . "\");\n";
            }
        ?>
        var dataTable = new Array();
        dataTable.push(['Date', 'Like Count', { role: 'annotation' }]);
        for (var i = 0; i < date.length; i++) {
            dataTable.push(new Array(date[i], parseInt(data[i]), date[i]));
        }
        var likesData = google.visualization.arrayToDataTable(dataTable);

        var likesOptions = {
            title: 'Time vs No. of Likes',
            chartArea: {width: '80%'},
            bar: {groupWidth: "20%"},
            legend: { position: "top" },
            series: {
                0: {axis: 'Likes'},
            },
            hAxis: {
                title: 'Time',
            },
            Axes: {
                y: {
                    Likes: 'Likes Count'
                }
            }
        };

        var date = new Array();
        var data = new Array();
        <?php
            foreach ($commentChartData as $chartData) { 
                echo "date.push(\"" . $chartData['date'] . "\"); data.push(\"" . $chartData['count'] . "\");\n";
            }
        ?>
        var dataTable = new Array();
        dataTable.push(['Date', 'Comment Count', { role: 'annotation' }]);
        for (var i = 0; i < date.length; i++) {
            dataTable.push(new Array(date[i], parseInt(data[i]), date[i]));
        }
        var commentsData = google.visualization.arrayToDataTable(dataTable);

        var commentsOptions = {
            title: 'Time vs No. of Comments',
            chartArea: {width: '80%'},
            bar: {groupWidth: "20%"},
            legend: { position: "top" },
            series: {
                0: {axis: 'Comments'},
            },
            hAxis: {
                title: 'Time',
            },
            Axes: {
                y: {
                    Comments: 'Comments Count'
                }
            }
        };
        var likeChart = new google.visualization.ColumnChart(document.getElementById('likes_chart'));
        likeChart.draw(likesData, likesOptions);
        var commentChart = new google.visualization.ColumnChart(document.getElementById('comments_chart'));
        commentChart.draw(commentsData, commentsOptions);
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
