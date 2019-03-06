<!DOCTYPE html>
<html lang="js">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>book_sharing</title>

    <link rel="icon" href="/favicon.ico" type="image/vnd.microsoft.icon">
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    @yield("css")
</head>
<body>
    <div class="container">
        @yield("content")
    </div>
    <script src="/assets/js/jquery-3.3.1.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
    @yield("js")
</body>
</html>