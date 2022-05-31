<!DOCTYPE html>
 <html lang="en">
 <head>
 <meta charset="utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <title>Register Form</title>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 <style>
     .login-form {
         width: 340px;
         margin: 50px auto;
     }
     .login-form form {
         margin-bottom: 15px;
         background: #f7f7f7;
         box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
         padding: 30px;
     }
     .login-form h2 {
         margin: 0 0 15px;
     }
     .form-control, .btn {
         min-height: 38px;
         border-radius: 2px;
     }
     .btn {
         font-size: 15px;
         font-weight: bold;
     }
 </style>
 </head>
 <body>

 <div class="login-form">

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    @if(session()->has('message'))
        <p class="alert alert-success">
            {{session()->get('message')}}
        </p>
    @endif

     <form action="{{route('admin.register.post')}}" method="POST">
        @csrf

         <h2 class="text-center">Registation Page</h2>

         <div class="form-group">
            <input id="name" type="text" class="form-control" name="name" placeholder="Name">
        </div>

         <div class="form-group">
            <input id="email" type="email" class="form-control" required name="email"  placeholder="Email">

        </div>

         <div class="form-group">
            <input id="password" type="password" class="form-control" required name="password" placeholder="Password">
        </div>

         <div class="form-group">
             <button type="submit" class="btn btn-primary btn-block">Register</button>
         </div>
     </form>

 </div>
 </body>
 </html>
