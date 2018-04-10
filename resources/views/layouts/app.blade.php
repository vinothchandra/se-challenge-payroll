<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon-->
    <link rel="apple-touch-icon" sizes="180x180" href="https://s3.amazonaws.com/wave-buoyant/public/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" href="https://s3.amazonaws.com/wave-buoyant/public/favicon/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="https://s3.amazonaws.com/wave-buoyant/public/favicon/favicon-16x16.png" sizes="16x16">
    <link rel="mask-icon" href="https://s3.amazonaws.com/wave-buoyant/public/favicon/safari-pinned-tab.svg" color="#007f92">
    <meta name="theme-color" content="#ffffff">
    <meta name="msapplication-square150x150logo" content="https://s3.amazonaws.com/wave-buoyant/public/favicon/mstile-150x150.png">
    <meta name="msapplication-square310x310logo" content="https://s3.amazonaws.com/wave-buoyant/public/favicon/mstile-310x310.png">
    <meta name="msapplication-square70x70logo" content="https://s3.amazonaws.com/wave-buoyant/public/favicon/mstile-70x70.png">

    <title>Payroll </title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
  </head>

  <body  style="
    padding-top: 50px;
    padding-bottom: 20px;
">

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" 
            data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/">Wave Payroll</a>
        </div>
       <div class="navbar-form navbar-right">
          <a href="/" class="" style="font-size: 17px;"> Home</a>
          <a href="/report" class="" style="font-size: 17px;left padding-left:;padding-left: 10px;"> Report</a>
        </div>
      </div>
    </nav>

    @yield('content')

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>


    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <!-- <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script> -->
	
    @yield('page-scripts')
  </body>
</html>
