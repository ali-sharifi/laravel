<!DOCTYPE html>
<html>
<head>
    <title>Note-to-myself</title>

</head>
<body>
<div>

</div>


</body>
</html>

<!DOCTYPE html>
<html>
<head>
    <title>Laravel</title>

    <link href="//fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link href="site.css" type="text/css">

    <style>
        html, body {
            height: 100%;
        }

        body {
            margin: 0;
            padding: 0;
            width: 100%;
            display: table;
            font-weight: 100;
            font-family: 'Lato';
        }



        .content {
            //text-align: center;
            display: inline-block;
        }

        .title {
           // font-size: 36px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="content">
        <div class="title">  @yield('content')</div>
    </div>
</div>

@yield('footer')
</body>
</html>
