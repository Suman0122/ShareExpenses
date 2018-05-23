<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Share Expenses</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>

        <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        `       <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
        <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
        <!------ Include the above in your HEAD tag ---------->

        <!-- All the files that are required -->
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
        <link href='http://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.13.1/jquery.validate.min.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <style>
            .bg{
                background-color: #ccc;
                background-repeat: no-repeat;
                width: 100%;
                height: 100%;
            }
            .btn-primary-outline{
                background-color: transparent;
                border-color: #ccc;
                color: #000;
            }
        </style>
        <style>
            section
            {
                background:yellow;
            }
            .banner
            {
                background:red;
                min-height:200px;
            }
            .banner .row
            {
                text-align:center;
                margin-top:50px;
            }
            .banner h1
            {
                color:white;
            }



            /***********************************************************************
            *  OPAQUE NAVBAR SECTION
            ***********************************************************************/
            .opaque-navbar {
                background-color: rgba(0,0,0,0.5);
                /* Transparent = rgba(0,0,0,0) / Translucent = (0,0,0,0.5)  */
                height: 60px;
                border-bottom: 0px;
                transition: background-color .5s ease 0s;
            }

            .opaque-navbar.opaque {
                background-color: black;
                height: 60px;
                transition: background-color .5s ease 0s;
            }

            ul.dropdown-menu {
                background-color: black;
            }


            @media (max-width: 992px) {
                body
                {

                }
                .opaque-navbar {
                    background-color: black;
                    height: 60px;
                    transition: background-color .5s ease 0s;
                }

            }
        </style>
    </head>
    <body class="bg">
        <div class="navbar navbar-inverse navbar-fixed-top opaque-navbar">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navMain">
                        <span class="glyphicon glyphicon-chevron-right" style="color:white;"></span>

                    </button>
                    <a class="navbar-brand" href="mainpage">{{ Session::get('user.name') }}</a>
                </div>
                <div class="collapse navbar-collapse" id="navMain">
                    <ul class="nav navbar-nav pull-right">
                        <li class="active"><a href="logout">Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <br><br><br><br>
        <h2 align="center"> ADD PAYMENT </h2>
        <br><br>
        <form id="register-form" action="{{ URL::to('creategroup/addpayment') }}" method="post" class="text-left">
                {{ csrf_field() }}
            <div class="col-md-12 form-group" >
                <div class="col-md-offset-2 col-md-2">
                    <label>Total Amount Paid</label>

                </div>
                <div class="col-md-5">
                    <input type="text" name="totalamount" class="form-control">
                </div>
                <br><br><br>
                
                <div class="col-md-offset-2 col-md-2">
                    <label>Date</label>

                </div>
                <div class="col-md-5">
                    <input type="date" name="paiddate" class="form-control">
                </div>
                <br><br><br>
                <div class="col-md-offset-2 col-md-2">
                    <label>Recieved By</label>

                </div>
                <div class="col-md-5">
                    <select name="receiveby" class="form-control" required>
                        @foreach($user as $u)
                        <option value="{{ $u->gmid }}"> {{ $u->membername }} </option>
                        @endforeach
                    </select>
        <!--                    <input type="text" name="" class="form-control">-->
                </div>
                <br><br><br>
                <div class="col-md-offset-2 col-md-2">
                    <label>Paid By</label>

                </div>
                <div class="col-md-5">
                    <select name="paidby" class="form-control" required>
                        @foreach($user as $u)
                        <option value="{{ $u->gmid }}"> {{ $u->membername }} </option>
                        @endforeach
                    </select>
        <!--                    <input type="text" name="" class="form-control">-->
                </div>
                <br><br><br>
                <div class="col-md-offset-2 col-md-2">
                    <label>Remark</label>

                </div>
                <div class="col-md-5">
                    <input type="text" name="remark" class="form-control">
                </div>

                <br><br><br><br>
                <div class="col-md-offset-4 col-md-5">
                    <input type="submit" class="btn btn-secondary btn-block">
                </div>



            </div>

        </form>
    </body>
</html>
<!-- Where all the magic happens -->
<!-- LOGIN FORM -->



