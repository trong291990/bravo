<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Bravo Tours | Administration</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        {{ HTML::style('/shared/css/bootstrap.min.css') }}
        {{ HTML::style('/backend/css/lte.css') }}
        {{ HTML::style('/backend/css/lte-override.css') }}
    </head>
    <body class="bg-black" style="min-height: 690px">
        <div class="form-box" id="login-box">
            <div class="header">Sign In</div>
            <form action="<?php echo route('admin.login') ?>" method="post">
                <div class="body bg-gray">
                    @include('partials/_flash_messages')
                    <div class="form-group">
                        <input type="text" name="email" class="form-control" placeholder="Email"/>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" autocomplete='off' class="form-control" placeholder="Password"/>
                    </div>          
                    <div class="form-group">
                        <label>
                            <input type="checkbox" name="remember_me" value="1"/> Remember me
                        </label>
                    </div>
                </div>
                <div class="footer">                                                               
                    <button type="submit" class="btn bg-olive btn-block">Sign In</button>  
                    <p><a href="#">Forgot Password</a></p>
                </div>
            </form>
        </div>
        {{ HTML::script('shared/js/jquery-2.0.3.min.js') }}
        {{ HTML::script('shared/js/bootstrap.min.js') }}
    </body>
</html>
