<html lang="ru">
<head>
	<title>Результат вычислений</title>
    <!-- <meta charset='utf-8'> -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js" type="text/javascript"></script>
    <link rel="stylesheet" href="css/responseStyles.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <script language="text/javascript" src="js/script.js" type="text/javascript"></script>
</head>

<body>
    <?php
        function isCorrect(&$arr) {
            if(!array_key_exists('x', $_POST) 
            || !array_key_exists('y', $_POST)
            || !array_key_exists('r', $_POST))  return false;
            global $x, $y, $r;
            $x = $_POST['x'];
            $x = preg_replace("/\,?\.?$/","", $x);
            $x = str_replace(",",".", $x);
            $y = $_POST['y'];
            $r = $_POST['r'];
            if($x == null || $y == null || $r == null) return false;
            if(!is_numeric($x) || $x < -3 || $x > 3) return false;
            if(!is_integer($y+0) || $y < -3 || $y > 5) return false;
            $correctRs = array("1", "1.5", "2", "2.5", "3");
            if(!is_numeric($r) || !in_array($r, $correctRs)) return false;

            return true;
        }

        $correctInput = false;
        //these to be defined in isCorrect func
        $x = null;
        $y = null;
        $r = null;

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $correctInput = isCorrect($_POST);
        }
        
        $rightNumbers = false;
        if($correctInput) {
            if ($x >= 0 && $y >= 0 && $y <= -$x + $r / 2) {
                $rightNumbers = true;
            } elseif ($x <= 0 && $y >= 0 && $x >= -$r && $y <= $r / 2) {
                $rightNumbers = true;
            } elseif ($x <= 0 && $y <= 0 && ($x * $x + $y * $y) <= ($r * $r)) {
                $rightNumbers = true;
            }
        }   

        // $execTime = number_format((microtime(true) - $_SERVER["REQUEST_TIME_FLOAT"]) * 1000000, 2, ",", ".") . " мкс";
    ?>
    <script>
            <?php
            if($correctInput) {
                echo "save($x,$y,$r," . (($rightNumbers) ? 'true);' : 'false);');
            }
            ?>
    </script>
<table class="mainTable animated zoomIn fast">
    <tr>
        <td>
            <div class="rect headerRect">
                <span class="headerText">Венщиков Марат, P3201<br> Вариант 201004</span>
            </div>
        </td>
    </tr>        
    <tr class="row"><td class="rect">
        <table class="responseTable" cellspacing="15">
            <tbody>
                <tr><td colspan="3">
                    <div class="image">
                        <svg fill="none" height="200" viewBox="0 0 200 200" width="200" xmlns="http://www.w3.org/2000/svg">
                            <rect height="200" transform="translate(0 1)" width="200" />
                            <path d="m 194.326,109.039 2.045,-3.269 h 1.325 L 195,110 l 2.76,4.301 h -1.336 l -2.098,-3.328 -2.109,3.328 h -1.33 l 2.766,-4.301 -2.702,-4.23 h 1.319 z" id="path3790" style="fill:#000000" />
                            <path d="m 100,170 c -38.659251,0 -70,-31.34075 -70,-70 70,0 0,0 31.41075,0 38.65942,0 -10.7695,0 38.58925,0 0,38.65925 0,23.625 0,70 z" id="path3792" style="fill:#3e97ff;stroke-width:1.75" />
                            <path d="m 30,65 v 35 H 135 L 100,65 Z" id="path3794" style="fill:#3e97ff;stroke-width:0.75585455" sodipodi:nodetypes="ccccc" />
                            <line x1="95" x2="105" y1="65" y2="65" id="line3796" style="stroke:#000000;stroke-width:0.84002185" />
                            <line x1="135" x2="135" y1="95" y2="105" id="line3798" style="stroke:#000000;stroke-width:0.84723842" />
                            <line x1="65" x2="65" y1="95" y2="105" id="line3800" style="stroke:#000000;stroke-width:0.84723818" />
                            <line x1="170" x2="170" y1="95" y2="105" id="line3802" style="stroke:#000000;stroke-width:0.84515423" />
                            <line x1="95" x2="105" y1="30" y2="30" id="line3804" style="stroke:#000000;stroke-width:0.84002179" />
                            <path d="M 171.004,90.1543 H 169 v 3.4512 h -1.131 v -8.5312 h 2.825 c 0.961,0 1.699,0.2187 2.214,0.6562 0.52,0.4375 0.78,1.0742 0.78,1.9102 0,0.5312 -0.145,0.9941 -0.434,1.3886 -0.285,0.3946 -0.683,0.6895 -1.195,0.8848 l 2.004,3.6211 v 0.0703 h -1.207 z M 169,89.2344 h 1.729 c 0.558,0 1.002,-0.1445 1.33,-0.4336 0.332,-0.2891 0.498,-0.6758 0.498,-1.1601 0,-0.5274 -0.158,-0.9317 -0.475,-1.2129 C 171.77,86.1465 171.317,86.0039 170.723,86 H 169 Z" id="path3806" style="fill:#000000" />
                            <path d="m 109.945,65.2402 h -2.004 v 3.4512 h -1.131 v -8.5312 h 2.825 c 0.961,0 1.699,0.2187 2.214,0.6562 0.52,0.4375 0.78,1.0742 0.78,1.9102 0,0.5312 -0.145,0.9941 -0.434,1.3886 C 111.91,64.5098 111.512,64.8047 111,65 l 2.004,3.6211 v 0.0703 h -1.207 z m -2.004,-0.9199 h 1.729 c 0.558,0 1.002,-0.1445 1.33,-0.4336 0.332,-0.2891 0.498,-0.6758 0.498,-1.1601 0,-0.5274 -0.158,-0.9317 -0.475,-1.2129 -0.312,-0.2813 -0.765,-0.4239 -1.359,-0.4278 h -1.723 z m 6.317,5.1035 h -0.932 l 3.562,-9.2636 h 0.926 z m 10.207,-0.7324 h -5.59 v -0.7793 l 2.953,-3.2812 c 0.437,-0.4961 0.738,-0.8985 0.902,-1.2071 0.168,-0.3125 0.252,-0.6347 0.252,-0.9668 0,-0.4453 -0.135,-0.8105 -0.404,-1.0957 -0.27,-0.2851 -0.629,-0.4277 -1.078,-0.4277 -0.539,0 -0.959,0.1543 -1.26,0.4629 -0.297,0.3047 -0.445,0.7304 -0.445,1.2773 h -1.084 c 0,-0.7851 0.252,-1.4199 0.756,-1.9043 0.507,-0.4843 1.185,-0.7265 2.033,-0.7265 0.793,0 1.42,0.2089 1.881,0.6269 0.461,0.4141 0.691,0.9668 0.691,1.6582 0,0.8399 -0.535,1.8399 -1.605,3 l -2.286,2.4785 h 4.284 z" id="path3808" style="fill:#000000" />
                            <path d="m 130.15,89.5664 h -2.004 v 3.4512 h -1.131 v -8.5312 h 2.825 c 0.961,0 1.699,0.2187 2.214,0.6562 0.52,0.4375 0.78,1.0742 0.78,1.9102 0,0.5312 -0.145,0.9941 -0.434,1.3886 -0.285,0.3946 -0.683,0.6895 -1.195,0.8848 l 2.004,3.6211 v 0.0703 h -1.207 z m -2.004,-0.9199 h 1.729 c 0.558,0 1.002,-0.1445 1.33,-0.4336 0.332,-0.2891 0.498,-0.6758 0.498,-1.1601 0,-0.5274 -0.158,-0.9317 -0.475,-1.2129 -0.312,-0.2813 -0.765,-0.4239 -1.359,-0.4278 h -1.723 z m 6.317,5.1035 h -0.932 l 3.562,-9.2636 h 0.926 z m 10.207,-0.7324 h -5.59 v -0.7793 l 2.953,-3.2812 c 0.437,-0.4961 0.738,-0.8985 0.902,-1.2071 0.168,-0.3125 0.252,-0.6347 0.252,-0.9668 0,-0.4453 -0.135,-0.8105 -0.404,-1.0957 -0.27,-0.2851 -0.629,-0.4277 -1.078,-0.4277 -0.539,0 -0.959,0.1543 -1.26,0.4629 C 140.148,86.0274 140,86.4531 140,87 h -1.084 c 0,-0.7851 0.252,-1.4199 0.756,-1.9043 0.507,-0.4843 1.185,-0.7265 2.033,-0.7265 0.793,0 1.42,0.2089 1.881,0.6269 0.461,0.4141 0.691,0.9668 0.691,1.6582 0,0.8399 -0.535,1.8399 -1.605,3 l -2.286,2.4785 h 4.284 z" id="path3810" style="fill:#000000" />
                            <path d="m 110.586,135.509 h -2.859 v -0.884 h 2.859 z m 4.36,-0.269 h -2.004 v 3.451 h -1.131 v -8.531 h 2.824 c 0.961,0 1.699,0.219 2.215,0.656 0.519,0.437 0.779,1.074 0.779,1.91 0,0.531 -0.144,0.994 -0.433,1.389 -0.286,0.394 -0.684,0.689 -1.196,0.885 l 2.004,3.621 v 0.07 h -1.207 z m -2.004,-0.92 h 1.728 c 0.559,0 1.002,-0.145 1.33,-0.434 0.332,-0.289 0.498,-0.675 0.498,-1.16 0,-0.527 -0.158,-0.931 -0.474,-1.213 -0.313,-0.281 -0.766,-0.424 -1.36,-0.427 h -1.722 z m 6.316,5.103 h -0.932 l 3.563,-9.263 h 0.926 z m 10.207,-0.732 h -5.59 v -0.779 l 2.953,-3.282 c 0.438,-0.496 0.739,-0.898 0.903,-1.207 0.168,-0.312 0.252,-0.634 0.252,-0.966 0,-0.446 -0.135,-0.811 -0.405,-1.096 -0.269,-0.285 -0.629,-0.428 -1.078,-0.428 -0.539,0 -0.959,0.154 -1.26,0.463 -0.296,0.305 -0.445,0.731 -0.445,1.277 h -1.084 c 0,-0.785 0.252,-1.42 0.756,-1.904 0.508,-0.484 1.186,-0.726 2.033,-0.726 0.793,0 1.42,0.209 1.881,0.627 0.461,0.414 0.691,0.966 0.691,1.658 0,0.84 -0.535,1.84 -1.605,3 l -2.285,2.478 h 4.283 z" id="path3812" style="fill:#000000" />
                            <path d="m 110.945,31.2402 h -2.004 v 3.4512 h -1.131 v -8.5312 h 2.825 c 0.961,0 1.699,0.2187 2.214,0.6562 0.52,0.4375 0.78,1.0742 0.78,1.9102 0,0.5312 -0.145,0.9941 -0.434,1.3886 C 112.91,30.5098 112.512,30.8047 112,31 l 2.004,3.6211 v 0.0703 h -1.207 z m -2.004,-0.9199 h 1.729 c 0.558,0 1.002,-0.1445 1.33,-0.4336 0.332,-0.2891 0.498,-0.6758 0.498,-1.1601 0,-0.5274 -0.158,-0.9317 -0.475,-1.2129 -0.312,-0.2813 -0.765,-0.4239 -1.359,-0.4278 h -1.723 z" id="path3814" style="fill:#000000" />
                            <line x1="95" x2="105" y1="170" y2="170" id="line3816" style="stroke:#000000;stroke-width:0.84515423" />
                            <path d="m 199,100.35029 c 0.21516,-0.1953 0.21516,-0.511901 0,-0.707201 l -3.51097,-3.1819 c -0.21627,-0.1953 -0.56494,-0.1953 -0.7812,0 -0.21516,0.1952 -0.21516,0.5118 0,0.7071 l 3.12148,2.828402 -3.12148,2.828399 c -0.21516,0.1953 -0.21516,0.5119 0,0.7071 0.21626,0.1953 0.56493,0.1953 0.7812,0 z M 0,100.49669 H 198.6094 V 99.496689 H 0 Z" id="path3818" style="fill:#000000;stroke-width:1.0504216" />
                            <path d="m 100.3536,0.95452218 c -0.1953,-0.21550457 -0.5119,-0.21550457 -0.7072,0 L 96.4645,4.4662798 c -0.1953,0.2155078 -0.1953,0.5648873 0,0.7803952 0.1952,0.2154858 0.5118,0.2154858 0.7071,0 L 100,2.1251051 102.8284,5.246675 c 0.1953,0.2154858 0.5119,0.2154858 0.7071,0 0.1953,-0.2155079 0.1953,-0.5648874 0,-0.7803952 z M 100.5,200 V 1.3447099 h -1 V 200 Z" id="path3820" style="fill:#000000;stroke-width:1.05054295" />
                            <line x1="95" x2="105" y1="135" y2="135" id="line3822" style="stroke:#000000;stroke-width:0.84515423" />
                            <path d="m 107.774,6.4151395 2.226,-4.2832 h 1.278 l -2.942,5.34961 v 3.1816395 h -1.125 V 7.4815495 l -2.9411,-5.34961 h 1.2891 z" id="path3824" style="fill:#000000" />
                            <line x1="30" x2="30" y1="95" y2="105" id="line3826" style="stroke:#000000;stroke-width:0.84515423" />
                            <path d="m 57.6446,89.4239 h -2.8594 v -0.8848 h 2.8594 z m 4.3593,-0.2696 H 60 v 3.4512 h -1.1308 v -8.5312 h 2.8242 c 0.9609,0 1.6992,0.2187 2.2148,0.6562 0.5196,0.4375 0.7793,1.0742 0.7793,1.9102 0,0.5312 -0.1445,0.9941 -0.4336,1.3886 -0.2851,0.3946 -0.6835,0.6895 -1.1953,0.8848 l 2.0039,3.6211 v 0.0703 h -1.207 z M 60,88.2344 h 1.7286 c 0.5586,0 1.0019,-0.1445 1.33,-0.4336 0.3321,-0.2891 0.4981,-0.6758 0.4981,-1.1601 0,-0.5274 -0.1582,-0.9317 -0.4746,-1.2129 C 62.7696,85.1465 62.3164,85.0039 61.7227,85 H 60 Z m 6.3164,5.1035 h -0.9316 l 3.5625,-9.2636 h 0.9258 z m 10.2071,-0.7324 h -5.5899 v -0.7793 l 2.9532,-3.2812 c 0.4375,-0.4961 0.7382,-0.8985 0.9023,-1.2071 0.168,-0.3125 0.252,-0.6347 0.252,-0.9668 0,-0.4453 -0.1348,-0.8105 -0.4043,-1.0957 -0.2696,-0.2851 -0.6289,-0.4277 -1.0782,-0.4277 -0.539,0 -0.959,0.1543 -1.2597,0.4629 -0.2969,0.3047 -0.4453,0.7304 -0.4453,1.2773 h -1.084 c 0,-0.7851 0.2519,-1.4199 0.7558,-1.9043 0.5078,-0.4843 1.1856,-0.7265 2.0332,-0.7265 0.793,0 1.42,0.2089 1.8809,0.6269 0.4609,0.4141 0.6914,0.9668 0.6914,1.6582 0,0.8399 -0.5352,1.8399 -1.6055,3 l -2.2851,2.4785 h 4.2832 z" id="path3828" style="fill:#000000" />
                            <path d="M 27.64457,89.4239 H 24.7852 v -0.8848 h 2.85937 z M 32.0039,89.1543 H 30 v 3.4512 h -1.13082 v -8.5312 h 2.82422 c 0.9609,0 1.6992,0.2187 2.2148,0.6562 0.5196,0.4375 0.7793,1.0742 0.7793,1.9102 0,0.5312 -0.1445,0.9941 -0.4336,1.3886 -0.2851,0.3946 -0.6835,0.6895 -1.1953,0.8848 l 2.0039,3.6211 v 0.0703 h -1.207 z M 30,88.2344 h 1.7286 c 0.5586,0 1.0019,-0.1445 1.33,-0.4336 0.3321,-0.2891 0.4981,-0.6758 0.4981,-1.1601 0,-0.5274 -0.1582,-0.9317 -0.4746,-1.2129 C 32.7696,85.1465 32.3164,85.0039 31.7227,85 H 30 Z" id="path3830" style="fill:#000000" />
                            <path d="m 110.64,170.269 h -2.859 v -0.884 h 2.859 z M 115,170 h -2.004 v 3.451 h -1.131 v -8.531 h 2.824 c 0.961,0 1.699,0.219 2.215,0.656 0.519,0.437 0.779,1.074 0.779,1.91 0,0.531 -0.144,0.994 -0.433,1.389 -0.286,0.394 -0.684,0.689 -1.196,0.885 l 2.004,3.621 v 0.07 h -1.207 z m -2.004,-0.92 h 1.728 c 0.559,0 1.002,-0.145 1.33,-0.434 0.332,-0.289 0.498,-0.675 0.498,-1.16 0,-0.527 -0.158,-0.931 -0.474,-1.213 -0.313,-0.281 -0.766,-0.424 -1.36,-0.427 h -1.722 z" id="path3832" style="fill:#000000" />
                            <circle stroke="black" r="3" fill="red" id="dot" class="hide"/>
                            <g id="arrow" class="hide">
                                <path id="path831" d="M 0.3,0 H 20" style="fill:none;fill-opacity:0.75;fill-rule:evenodd;stroke:#ff2b06;stroke-width:1.56395113;stroke-linecap:round;stroke-linejoin:round" />
                                <path id="path869" d="M 4.3,-3 0.3,0 4.3,3" style="fill:none;fill-rule:evenodd;stroke:#ff2b06;stroke-width:1.56395113;stroke-linecap:round;stroke-linejoin:round" />
                            </g>
                        </svg>
                    </div> 
                </td></tr>
                <tr>
                    <td class="class" colspan="3" style="text-align: center;">Введённые данные</td>
                </tr>
                <tr style="text-align: center;">
                    <td width="33%">X</td>
                    <td width="33%">Y</td>
                    <td width="33%">R</td>
                </tr>
                <tr style="text-align: center;">
                    <td>
                        <?php
                            if ($correctInput) {
                                echo "<span id=\"xField\" style='text-align:center;' title=\"$x\">" . str_replace('.', ',', $x) . "</span>";
                            }
                        ?>    
                    </td>
                    <td>
                        <?php
                            if ($correctInput) {
                                echo "<span id=\"yField\" style='text-align:center;' title=\"$y\">" . str_replace('.', ',', $y) . "</span>";
                            }
                        ?>
                    </td>
                    <td>
                        <?php
                            if ($correctInput) {
                                echo "<span id=\"rField\" style='text-align:center;' title=\"$r\">" . str_replace('.', ',', $r) . "</span>";
                            }
                        ?>
                    </td>
                </tr>
                <tr><td colspan="3" style="text-align: center">
                    Результат:
                    <?php
                    if ($rightNumbers && $correctInput) {
                        echo '<span id="resultField" style="color:#008000;">попадание</span>';
                    } elseif ($correctInput) {
                        echo '<span id="resultField" style="color:#B22222;">промах</span>';
                    } else {
                        echo '<span id="resultField" style="color:#B22222;">данные неверны</span>';
                    }
                    ?>
                    <script type="text/javascript">
                        setDotCoordResponse();
                    </script>
                </tr></td>
                <tr><td colspan="3">
                    <p style="text-align: center;"><a href="index.html" class="btn" id="okBtn" onclick="okPressed()">Понятно</a></p>
                </td></tr>
            </tbody>
        </table> 
        <div class="fixer"></div>
    </td></tr> 
    <tr class="row"><td class="rect">
        <div class="additionalInfo">Время исполнения: <?php echo number_format((microtime(true) - $_SERVER["REQUEST_TIME_FLOAT"]) * 1000000, 2, ",", ".") . " мкс"; ?> </div> 
        <div class="additionalInfo">Текущее время: <span id="time"></span>
            <script type="text/javascript">
                setInterval(setTime, 1000);
                setTime();
            </script>
        </div>
    </td></tr>
    <tr class="row">
        <td class="rect" id="historyRect">
            <button type="button" class="btn extendBtn" id="histBtn" onclick="histBtnPressed();">История</button> 
            <span class="hide alert" id="histMessage">История пуста.</span>
            <div  id="histWrap">
                <div id="historyTableWrap">
                    <table id="historyTable" style="text-align: center;">
                        <thead>
                            <tr>
                                <th>X</th>
                                <th>Y</th>
                                <th>R</th>
                                <th>Результат</th width="25%">
                            </tr>
                        </thead>
                        <tbody id="historyTableBody" >
                        </tbody>
                    </table>
                </div>
                <a onclick="clearHist()" class="btn textBtn">Очистить историю</a>
            </div>
        </td>
    </tr> 
</table>
</body>
</html>

