<?php
/**
 * Created by PhpStorm.
 * User: Filmy
 * Date: 2018/7/3
 * Time: 8:25
 */
include('data/pwd.php');
$pwd = isset($_POST['pwd']) ? $_POST['pwd'] : '';
?>
    <html>
    <head>
        <title>Password</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE10"/>
        <meta name="renderer" content="webkit|ie-comp|ie-stand"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Bootstrap 核心 CSS 文件 -->
        <link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="/css/style.css">
        <style>
            /*web background*/
            .container {
                display: table;
                height: 100%;
            }

            .row {
                display: table-cell;
                vertical-align: middle;
            }

            /* centered columns styles */
            .row-centered {
                text-align: center;
            }

            .col-centered {
                display: inline-block;
                float: none;
                text-align: left;
                margin-right: -4px;
            }

            .error {
                margin-top: 5px;
                text-align: center;
                color: red;
            }
        </style>
    </head>
    <body>
    <div class="container">
        <div class="row row-centered">
            <div class="well col-md-6 col-centered">
                <p>敏感资源解除限制</p>
                <form method="post" role="form">
                    <div class="input-group input-group-md">
                        <span class="input-group-addon" id="sizing-addon1"><i
                                    class="glyphicon glyphicon-lock"></i></span>
                        <input type="password" class="form-control" id="password" name="pwd" placeholder="Password"/>
                    </div>
                    <br/>
                    <button type="submit" class="btn btn-success btn-block">解 除</button>
                </form>
                <p class="error"></p>
            </div>
        </div>
    </div>
    <!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
    <script src="/js/jquery.min.js"></script>
    <!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
    <script src="//cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </body>
    </html>
<?php
if ($pwd == '') {
    exit();
} elseif ($pwd == $password) {
    setcookie("fulilunliju", $pwd, time() + 3600);
    echo "<script>$('.error').text('解锁成功,1个小时后将会再次上锁！');</script>";
    exit();
} elseif ($pwd != $password) {
    echo "<script>$('.error').text('密码错误！');</script>";
    exit();
}
?>