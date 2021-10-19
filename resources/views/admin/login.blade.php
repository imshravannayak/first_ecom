<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Login</title>

    

    

    
    <!-- Main CSS-->
    <link href="{{asset('admin_asset/css/theme.css')}}" rel="stylesheet" media="all" >
    <link href="{{asset('admin_asset/vendor/bootstrap-4.1/bootstrap.min.css')}}" rel="stylesheet" media="all" >

</head>

<body class="animsition">
    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            {{Config::get('constant.stet_name')}}
                            <a href="#">
                                {{Config::get('constants.stet_name')}} 
                            </a>
                        </div>
                        <div class="login-form">
                            <form action="{{Route('admin.auth')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input class="au-input au-input--full" type="email" name="email" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="au-input au-input--full" type="password" name="password" placeholder="Password">
                                </div>
                                <div class="login-checkbox">
                                    <label>
                                        <input type="checkbox" name="remember">Remember Me
                                    </label>
                                    <label>
                                        <a href="#">Forgotten Password?</a>
                                    </label>
                                </div>
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">sign in</button>
                               
                                 
                            </form>
                            
                              
                        </div>
                        @if (Session::has('error'))
                        <div class="alert alert-danger" role="alert">
                            {{session('error')}}
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </div>

    
    
    

    <!-- Main JS-->
    <script src="{{ asset('admin_asset/js/main.js')}}"></script>

</body>

</html>
<!-- end document-->