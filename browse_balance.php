<?php
    session_start();

    if(!isset($_SESSION['logged_in'])){
        header('Location: index.php');
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Najlepsza aplikacja finansowa - dodaj przych&oacute;d</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> 
</head>

<body>
    <header class="container">
        <nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark row">
            <a class="navbar-brand mb-0 h1 col-lg-1" href="user_menu.php">NAF.pl</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse col-lg-8" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="user_menu.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="currentColor" class="bi bi-house-door" viewBox="0 0 16 16">
                                <path
                                    d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146zM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4H2.5z" />
                            </svg> Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="add_income.php"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                <path
                                    d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                            </svg> Dodaj przych&oacute;d</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="add_expense.php"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                <path
                                    d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                            </svg> Dodaj wydatek</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="browse_balance.php"><svg xmlns="http://www.w3.org/2000/svg"
                                width="16" height="16" fill="currentColor" class="bi bi-clipboard-data"
                                viewBox="0 0 16 16">
                                <path
                                    d="M4 11a1 1 0 1 1 2 0v1a1 1 0 1 1-2 0v-1zm6-4a1 1 0 1 1 2 0v5a1 1 0 1 1-2 0V7zM7 9a1 1 0 0 1 2 0v3a1 1 0 1 1-2 0V9z" />
                                <path
                                    d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z" />
                                <path
                                    d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z" />
                            </svg> Przegl&aogon;daj bilans</a>
                    </li>
                </ul>
            </div>
            <div class="collapse navbar-collapse col-lg-3" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="settings.php"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                height="16" fill="currentColor" class="bi bi-gear" viewBox="0 0 16 16">
                                <path
                                    d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z" />
                                <path
                                    d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z" />
                            </svg> Ustawienia</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                height="16" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z" />
                                <path fill-rule="evenodd"
                                    d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
                            </svg> Wyloguj si&eogon;</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>    
    <section class="container bg-light text-dark d-flex flex-row justify-content-end align-items-center">
        <div class="my-3">
            <table>
                <tr>
                    <td>
                        <label for="period" class="font-weight-bold"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="currentColor" class="bi bi-calendar-range" viewBox="0 0 16 16">
                                <path d="M9 7a1 1 0 0 1 1-1h5v2h-5a1 1 0 0 1-1-1zM1 9h4a1 1 0 0 1 0 2H1V9z" />
                                <path
                                    d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z" />
                            </svg> Okres:</label>
                    </td>
                    <td>
                        <form method="post" action="" name="choice">
                            <?php
                                if(isset($_POST['period'])) $selected = $_POST['period'];
                            ?>
                            <select name="period" id="period" class="form-control m-1" onchange='onChangeFun()'>
                                <option value="" disabled hidden selected>Wybierz tutaj</option>
                                <option <?php if(isset($selected) && $selected == 1){echo("selected");}?> value="1">Bierz&aogon;cy miesi&aogon;c</option>
                                <option <?php if(isset($selected) && $selected == 2){echo("selected");}?> value="2">Poprzedni miesi&aogon;c</option>
                                <option <?php if(isset($selected) && $selected == 3){echo("selected");}?> value="3">Bierz&aogon;cy rok</option>
                                <option <?php if(isset($selected) && $selected == 4){echo("selected");}?> value="4">Niestandardowy</option>
                            </select>
                            <div class="modal" tabindex="-1" id="myModal">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Wybierz okres:</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form method="post" action="">
                                            <div class="modal-body d-flex flex-column align-items-center">
                                                <p>Od: <input type="date" name="date1"> Do: <input type="date" name="date2"></p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Anuluj</button>
                                                <button type="submit" class="btn btn-primary">Potwierd&zacute;</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </form> 
                    </td>
                </tr>
            </table>
        </div>
    </section>
    <section class="container bg-light text-dark d-flex flex-column align-items-center">        
        <?php
            require_once "connect.php";
            mysqli_report(MYSQLI_REPORT_STRICT);
                                
            try {
                $connection = new mysqli($host, $db_user, $db_password, $db_name);
                                
                if ($connection -> connect_errno != 0){
                    throw new Exception(mysqli_connect_errno());
                } else {
                    if(isset($_POST['period'])){
                        $date1 = "";
                        $date2 = "";

                        if($_POST['period'] == 1){
                            $date1 = date("Y-m-01");
                            $date2 = date('Y-m-01', strtotime("+1 months", strtotime($date1)));
                        } else if($_POST['period'] == 2){
                            $date2 = date("Y-m-01");
                            $date1 = date('Y-m-01', strtotime("-1 months", strtotime($date2)));
                        } else if($_POST['period'] == 3){                                    
                            $date1 = date("Y-01-01");
                            $date2 = date("Y-m-d");
                        } else if($_POST['period'] == 4){
                            if($_POST['date1'] < $_POST['date2']){
                                $date1 = $_POST['date1'];
                                $date2 = $_POST['date2'];
                            } else {
                                $date1 = $_POST['date2'];
                                $date2 = $_POST['date1'];
                            }
                        }
                        echo "<h2>Okres: ".$date1." do ".$date2."</h2>";

                        $id = $_SESSION['id'];                    
        
                        $result = $connection -> query("SELECT amount, category, income_date, comment FROM incomes 
                        WHERE user_id = $id AND DATE(income_date) BETWEEN DATE('$date1') AND DATE('$date2') ORDER BY income_date DESC");
                        $incomes = $result -> fetch_all();

                        $result = $connection -> query("SELECT amount, category, expense_date, payment, comment FROM expenses 
                        WHERE user_id = $id AND DATE(expense_date) BETWEEN DATE('$date1') AND DATE('$date2') ORDER BY expense_date DESC");
                        $expenses = $result -> fetch_all();

                        if(empty($incomes) && empty($expenses)){
                            echo '<h4 class="text-danger">Brak danych w tym okresie.</h4><br>';
                            exit();
                        }

                        $dates_e = array_column($expenses, 2);

                        array_multisort($dates_e, SORT_DESC, $expenses);


                        $dates_i = array_column($incomes, 2);

                        array_multisort($dates_i, SORT_DESC, $incomes);

                        $sum = 0;

                        echo '<table class="table table-striped table-bordered table-hover table-responsive-lg">
                        <thead class="bg-dark text-light">
                            <tr>
                                <td><b>Rodzaj transakcji</b></td>
                                <td><b>Kwota</b></td>
                                <td><b>Data transakcji</b></td>
                                <td><b>Kategoria</b></td>
                                <td><b>Rodzaj p&lstrok;atno&sacute;ci</b></td>
                                <td><b>Komentarz</b></td>
                            </tr>
                        </thead>
                        <tbody>';

                        foreach($incomes as $income){
                            echo "<tr><td>Przych&oacute;d</td><td class='text-success'>{$income[0]}</td><td>{$income[2]}</td><td>{$income[1]}</td><td>-</td><td>{$income[3]}</td></tr>";

                            $sum += $income[0];
                        } 

                        foreach($expenses as $expense) {
                            echo "<tr><td>Wydatek</td><td class='text-danger'>-{$expense[0]}</td><td>{$expense[2]}</td><td>{$expense[1]}</td><td>{$expense[3]}</td><td>{$expense[4]}</td></tr>";

                            $sum -= $expense[0];
                        }
                        

                        echo '</tbody>
                            <tfoot class="bg-dark text-light">
                                <tr>
                                    <td><b>Suma</b></td>
                                    <td>'.$sum.'</td>
                                </tr>
                            </tfoot>
                        </table>';

                        $result = $connection -> query("SELECT DISTINCT category, SUM(amount) FROM incomes 
                        WHERE user_id = $id AND DATE(income_date) BETWEEN DATE('$date1') AND DATE('$date2') GROUP BY category ORDER BY SUM(amount) DESC");
                        $income_sums = $result -> fetch_all();

                        $result = $connection -> query("SELECT DISTINCT category, SUM(amount) FROM expenses 
                        WHERE user_id = $id AND DATE(expense_date) BETWEEN DATE('$date1') AND DATE('$date2') GROUP BY category ORDER BY SUM(amount) DESC");
                        $expense_sums = $result -> fetch_all();
                    }   
                    $connection -> close();
                }
            } catch(Exception $e){
                echo '<span class="error">Błąd serwera! Przepraszamy za niedogodności i prosimy o wizytę w innym terminie!</span>';
                echo '<br />Informacja developerska: '.$e;
            }
        ?>
        <script type="text/javascript">
            google.charts.load('current', {'packages':['corechart']});
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {

                var data = google.visualization.arrayToDataTable([
                ['Kategoria', 'Kwota'],
                <?php
                    foreach($income_sums as $income_sum){
                        echo "['".$income_sum[0]."', ".$income_sum[1]."],";
                    }
                ?>
                ]);

                var options = {
                title: 'Przychody'
                };

                var chart = new google.visualization.PieChart(document.getElementById('piechart1'));

                chart.draw(data, options);
            }
        </script>
        <?php
            if(isset($income_sums)){
                echo '<div id="piechart1" style="width: 900px; height: 500px;"></div>';
            }
        ?>
        <script type="text/javascript">
            google.charts.load('current', {'packages':['corechart']});
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {

                var data = google.visualization.arrayToDataTable([
                ['Kategoria', 'Kwota'],
                <?php
                    foreach($expense_sums as $expense_sum){
                        echo "['".$expense_sum[0]."', ".$expense_sum[1]."],";
                    }
                ?>
                ]);

                var options = {
                title: 'Wydatki'
                };

                var chart = new google.visualization.PieChart(document.getElementById('piechart2'));

                chart.draw(data, options);
            }
        </script>
        <?php
            if(isset($expense_sums)){
                echo '<div id="piechart2" style="width: 900px; height: 500px;"></div>';
            }
        ?>
        <?php
            if(isset($sum)){
                if($sum >= 0)
                    echo '<h4 class="text-success">Gratulacje. &Sacute;wietnie zarz&aogon;dzasz finansami!</h4><br>';
                else 
                    echo '<h4 class="text-danger">Uwa&zdot;aj, wpadasz w d&lstrok;ugi!</h4><br>';
            }
        ?>        
    </section>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
        crossorigin="anonymous"></script>
    <script src="app.js"></script>
</body>

</html>