<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <title>Share Expenses</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="../css/default.css" rel="stylesheet" type="text/css"/>
        <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
        <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
        <!------ Include the above in your HEAD tag ---------->

        <!-- All the files that are required -->
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
        <link href='http://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.13.1/jquery.validate.min.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="text-center">
                <div class="logo1">SHARE EXPENSES</div>
            </div> 

        <div class="flex-center position-ref full-height">
             
       

            <!-- Main Form -->
            <div class="text-center" style="margin-top: -150px;">
                <div class="logo">Register</div>
                <!-- Main Form -->
                <div class="login-form-1">
                    <form id="register-form" action="{{ URL::to('/register/adduser') }}" method="post" class="text-left">
                        {{ csrf_field() }}
                        <div class="login-form-main-message"></div>
                        <div class="main-login-form">
                            <div class="login-group" style="height: 400px;">
                                <div class="form-group">
                                    <label for="reg_username" class="sr-only">Email address</label>
                                    <input type="text" class="form-control" id="reg_username" name="username" placeholder="username">
                                </div>
                                <div class="form-group">
                                    <label for="reg_password" class="sr-only">Password</label>
                                    <input type="password" class="form-control" id="reg_password" name="password" placeholder="password">
                                </div>
                                <div class="form-group">
                                    <label for="reg_password_confirm" class="sr-only">Password Confirm</label>
                                    <input type="password" class="form-control" id="reg_password_confirm" name="confirmpassword" placeholder="confirm password">
                                </div>

                                <div class="form-group">
                                    <label for="reg_email" class="sr-only">Email</label>
                                    <input type="text" class="form-control" id="reg_email" name="emailid" placeholder="email">
                                </div>
                                <div class="form-group">
                                    <label for="reg_fullname" class="sr-only">Mobile No</label>
                                    <input type="text" class="form-control" id="" name="mobileno" placeholder="mobile no">
                                </div>

                                <div class="form-group login-group-checkbox" >
                                    <input type="radio" class=""  id="male" name="gender" value="male" placeholder="username">
                                    <label for="male">male</label>
                                    <input type="radio" class="" id="female" name="gender" value="female" placeholder="username">
                                    <label for="female">female</label>
                                </div>

                            </div>
                            <button type="submit" class="login-button"><i class="fa fa-chevron-right"></i></button>
                        </div>
                        <div class="etc-login-form">
                            <h4>already have an account? <a href="/">login here</a></h4>
                        </div>
                    </form>
                </div>
                <!-- end:Main Form -->
            </div>
            <!-- end:Main Form -->
        </div>

    </div>
</body>
</html>
