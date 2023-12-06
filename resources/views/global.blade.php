<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Global page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        .nav-pills .nav-item:hover {
            background-color: #007bff; 
        }
    </style>
</head>
<body>
<div class="container m-4">
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
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>