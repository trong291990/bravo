<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Bravo Tours | Administration</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link href="{{asset('/css/plugins/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('/css/lte.css')}}" rel="stylesheet" type="text/css" />
    </head>
    <body class="bg-black" style="min-height: 690px">
        <div class="form-box" id="login-box">
            <div class="header">Sign In</div>
            <form action="<?php echo route('admin.login') ?>" method="post">
                <div class="body bg-gray">
                    @include('partials/_flash_messages')
                    <p>Please enter your credentials</p>
                    <div class="form-group">
                        <input type="text" name="email" class="form-control" placeholder="Email"/>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" autocomplete='off' class="form-control" placeholder="Password"/>
                    </div>          
                    <div class="form-group">
                        <input type="checkbox" name="remember_me" value="1"/> Rememberme
                    </div>
                </div>
                <div class="footer">                                                               
                    <button type="submit" class="btn bg-olive btn-block">Sign In</button>  
                    <p><a href="#">Forgot Password</a></p>
                </div>
            </form>
        </div>
        <script src="{{asset('js/plugins/jquery-1.10.2.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('js/plugins/bootstrap.min.js')}}" type="text/javascript"></script>
    </body>
</html>
