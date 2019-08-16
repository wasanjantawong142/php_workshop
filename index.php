<!doctype html>
<html lang="en">
<?php include "./component/userHead.php"  ?>

<body>
    <div class="container h-100">
        <div class="d-flex justify-content-center h-100">
            <div class="user_card">
                <div class="d-flex justify-content-center">
                    <div class="brand_logo_container">
                        <img id="super_logo" src="./img/user/logo_login.png" class="brand_logo" alt="Logo">
                    </div>
                </div>
                <div class="d-flex justify-content-center form_container">
                    <form action="BEindex.php" method="post">
                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input required type="text" name="username" class="form-control input_user" value="" placeholder="username">
                        </div>
                        <div class="input-group mb-2">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input required type="password" name="password" class="form-control input_pass" value="" placeholder="password">
                        </div>

                        <div class="row">
                            <div class="col-md-5">
                                <a href="register.php">
                                    <button type="button" name="button" class="btn btn-success btn-size">Register</button>
                                </a>
                            </div>
                            <div class="offset-md-2 col-md-5">
                                <button type="submit" name="button" class="btn btn-primary btn-size">Login</button>
                            </div>
                        </div>

                    </form>
                </div>
                <br>
                <div class="container">

                </div>


            </div>
        </div>
    </div>

    <style>
        /* Coded with love by Mutiullah Samim */
        /* div {
            border: 1px solid red;
        } */

        .btn-size {
            width: 100%;
        }

        body,
        html {
            margin: 0;
            padding: 0;
            height: 100%;
            background: #60a3bc !important;
        }

        .user_card {
            height: 315px;
            width: 350px;
            margin-top: auto;
            margin-bottom: auto;
            background: #f39c12;
            position: relative;
            display: flex;
            justify-content: center;
            flex-direction: column;
            padding: 10px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            -webkit-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            -moz-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            border-radius: 5px;

        }

        .brand_logo_container {
            position: absolute;
            height: 170px;
            width: 170px;
            top: -75px;
            border-radius: 50%;
            background: #60a3bc;
            padding: 10px;
            text-align: center;
        }

        .brand_logo {
            height: 193px;
            width: 149px;
        }

        .form_container {
            margin-top: 100px;
        }

        .login_btn {
            width: 100%;
            background: #c0392b !important;
            color: white !important;
        }

        .login_btn:focus {
            box-shadow: none !important;
            outline: 0px !important;
        }

        .login_container {
            padding: 0 2rem;
        }

        .input-group-text {
            background: #c0392b !important;
            color: white !important;
            border: 0 !important;
            border-radius: 0.25rem 0 0 0.25rem !important;
        }

        .input_user,
        .input_pass:focus {
            box-shadow: none !important;
            outline: 0px !important;
        }

        .custom-checkbox .custom-control-input:checked~.custom-control-label::before {
            background-color: #c0392b !important;
        }
    </style>

    <script>
        setInterval(() => {
            $("#super_logo").animate({marginTop: "-110px"}, 800).animate({marginTop: "0px"}, 600)
        }, 2200);
    </script>

</body>

</html>