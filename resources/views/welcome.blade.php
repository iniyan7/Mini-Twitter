<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Mini Twitter</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }
            
            .duration-time{
                position: absolute;
                text-align: right;
                font-size: 15px;
                font-style: italic;
                right: 10px;
            }

            .content {
                text-align: left;
            }

            .tweet-content {
                text-indent: 50px;
            }

            .title {
                font-size: 84px;
            }

            .sub-heading .count {
                font-size: 15px;
                font-style: italic;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .btn-primary{
                background-color: cornflowerblue;
                padding: 12px 20px;
                border: none;
                border-radius: 4px;
                cursor: pointer;
                float: left;
                color: white;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            * {
              box-sizing: border-box;
            }

            .container {
              border-radius: 5px;
              background-color: #f2f2f2;
              padding: 50px;
            }

            input[type=text] {
              width: 20%;
              padding: 12px;
              border: 1px solid #ccc;
              border-radius: 4px;
              resize: vertical;
            }
            textarea {
              width: 30%;
              padding: 12px;
              border: 1px solid #ccc;
              border-radius: 4px;
              resize: vertical;
            }

            label {
              padding: 12px 12px 12px 0;
              display: inline-block;
            }

            input[type=submit] {
              background-color: cornflowerblue;
              color: white;
              padding: 12px 20px;
              border: none;
              border-radius: 4px;
              cursor: pointer;
              float: left;
            }

            input[type=submit]:hover {
              background-color: cornflowerblue;
            }
        </style>
    </head>
    <body>
        @yield('content')
        

        @yield('footer_scripts')
        <!-- <script>
          $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });
        </script> -->
        
    </body>
</html>
