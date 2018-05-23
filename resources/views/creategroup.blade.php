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
                    <a class="navbar-brand"  href="mainpage">{{ Session::get('user.name') }}</a>
                </div>
                <div class="collapse navbar-collapse" id="navMain">
                    <ul class="nav navbar-nav pull-right">
                        <li class="active"><a href="logout">Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <br><br><br><br>
        <h2 align="center"> CREATE GROUP </h2>
        <br><br>
        <form action="{{ URL::to('creategroup/addgroup') }}" method="post" class="">
                                {{ csrf_field() }}
            <div class="col-md-12 form-group" >
                <div class="col-md-offset-2 col-md-2">
                    <label>Add Group Name</label>
                   
                </div>
                <div class="col-md-3">
                    <input type="text" name="groupname" placeholder="enter groupname" <?php if($group != '') { ?> value="{{ $group->groupname }}" <?php } ?> class="form-control">
                </div>
                <div class="col-md-2">
                    <input type="submit" class="btn btn-secondary btn-block">
                </div>
        </form>
                <br><br><br>
            <form action="{{ URL::to('creategroup/addmember') }}" method="post" class="" id="form1">
                                {{ csrf_field() }}
                <div class="col-md-offset-2 col-md-2">
                    <label>Add Member Name</label>
                   
                </div>
                <div class="col-md-5">
                    <input type="text" name="membername" class="form-control" required="">
                </div>
                <br><br><br>
                <div class="col-md-offset-2 col-md-2">
                    <label>Share Percentage</label>
                   
                </div>
                <div class="col-md-5">
                    <input type="text" name="sharepercent" class="form-control" required="">
                </div>
                <br><br><br>
                <div class="col-md-offset-2 col-md-2">
                    <label>Mobile Number</label>
                   
                </div>
                <div class="col-md-5">
                    <input type="text" name="contactno" class="form-control" required="">
                </div>
                <br><br><br><br>
                <input type="hidden" name="gid" <?php if($group != '') { ?> value="{{ $group->gid }}" <?php } ?> class="form-control">
                <div class="col-md-offset-4 col-md-5">
                    <input type="submit" class="btn btn-secondary btn-block">
                </div>
            </form>
<!--                <input type="button" id="add" value="Add" onclick="addtext();" />
            <input type="button" id="del" value="Del" />-->
             <br><br><br>
             <form action="{{ URL::to('creategroup/addmember') }}" method="post" class="" id="form2" style="display: none">
                                {{ csrf_field() }}
                <div class="col-md-offset-2 col-md-2">
                    <label>Add Member Name</label>
                   
                </div>
                <div class="col-md-5">
                    <input type="text" name="membername" class="form-control" required="">
                </div>
                <br><br><br>
<!--                <div class="col-md-offset-2 col-md-2">
                    <label>Share Percentage</label>
                   
                </div>
                <div class="col-md-5">
                    <input type="text" name="sharepercent" class="form-control" required="">
                </div>-->
<!--                <br><br><br>-->
                <div class="col-md-offset-2 col-md-2">
                    <label>Mobile Number</label>
                   
                </div>
                <div class="col-md-5">
                    <input type="text" name="contactno" class="form-control" required="">
                </div>
                <br><br><br><br>
                <input type="hidden" name="gid" <?php if($group != '') { ?> value="{{ $group->gid }}" <?php } ?>  class="form-control">
                <div class="col-md-offset-4 col-md-5">
                    <input type="submit" class="btn btn-secondary btn-block">
                </div>
            </form>
                 
            </div>
            
        
    </body>
</html>
<!-- Where all the magic happens -->
<!-- LOGIN FORM -->



