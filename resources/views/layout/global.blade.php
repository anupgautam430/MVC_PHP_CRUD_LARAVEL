<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Global page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
   <style>
        body{
            background-color: lightblue;
        }

        ul {
           list-style-type: none;
           margin: 0;
           padding: 0;
        }
        nav {
            position: relative;
            top: 0;
            bottom: 0;
            height: 100vh;
            left: 0;
            background: #fff;
            width: 250px;
            overflow: hidden;
            box-shadow: 0 20px 35px rgba(0, 0, 0, 0.1);
        }

        a {
         position: relative;
         color: rgb(85, 83, 83);
         font-size: 14px;
         display: table;
         width: 280px;
         padding: 10px;
         margin: 10px;
        }

        a:hover{
        background: #eee;
        }

        .content {
            flex: 1; 
            padding: 8px; 
            margin: 4px;
        }
        .head {
            background-color: #ECEFBE;
            padding: 0px;
            margin: 0px;
        }

   </style>     
</head>
<body>
    <div>
            <div class="head"><h2 class="text-center">@yield('controllerName')</h2></div>
        <div class="row">
            <div class="col-md-2">
                <nav>
                    <ul>
                        <li>
                            <a href="{{ route('post.index') }}"><i class="bi bi-person-rolodex"></i> POST</a>
                        </li>
                        <li>
                            <a href="{{ route('visitor.index') }}"><i class="bi bi-person-circle"></i> VISITOR</a>
                        </li>
                        <li>
                            <a href="{{ route('officer.index') }}"><i class="bi bi-building-fill"></i> OFFICER</a>
                        </li>
                        <li>
                            <a href="{{ route('workofday.index') }}"><i class="bi bi-calendar"></i> WORK OF DAY</a>
                        </li>
                        <li>
                            <a href="{{ route('activity.index') }}"><i class="bi bi-activity"></i> ACTIVITY</a>
                        </li>
                        <li>
                            <a href="{{ route('appointments.index') }}"><i class="bi bi-cpu-fill"></i> APPOINTMENT</a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="content">
            <div>
                @yield('content')
            </div>
        </div>
        </div>
       
       
     
    </div>
   



<!-- <div class="container m-4 mx-auto">
    <ul class="nav flex-column nav-pills gap-2 p-1 small bg-primary rounded-5 shadow-sm" id="pillNav2" role="tablist" style="--bs-nav-link-color: var(--bs-white); --bs-nav-pills-link-active-color: var(--bs-primary); --bs-nav-pills-link-active-bg: var(--bs-white);">
        <li class="nav-item" role="presentation">
            <a class="nav-link active rounded-5 text-center text-dark" id="post-tab" href="{{ route('post.index') }}">POST</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link active rounded-5 text-center text-dark" id="post-tab" href="{{ route('visitor.index') }}">VISITOR</a>
        </li>
        <li class="nav-item bg-primary" role="presentation">
            <a class="nav-link active rounded-5 text-center text-dark" id="post-tab" href="{{ route('officer.index') }}">OFFICER</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link active rounded-5 text-center text-dark" id="post-tab" href="{{ route('workofday.index') }}">WORK DAYS</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link active rounded-5 text-center text-dark" id="post-tab" href="{{ route('activity.index') }}">ACTIVITY</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link active rounded-5 text-center text-dark" id="post-tab" href="{{ route('appointments.index') }}">APPOINTMENT</a>
        </li>
    </ul>
</div> -->


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>