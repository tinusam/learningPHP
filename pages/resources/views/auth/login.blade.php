<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="/css/main.css" rel="stylesheet">

</head>


<body>
    <div class="container">
        {{-- <img src="/images/background3.webp" alt="Cover Image"/> --}}
        <div class="row">
            <div class="col-s1 " style="margin-top:100px;">
                
                {{-- <div class="card-panel teal lighten-4"></div> --}}
                
                {{-- <img src="/images/background3.webp" alt="Cover" class=" " max-width: 100%  height:auto>  --}}
      
                
                {{-- <img class="responsive-img" src="background1.jpg"> --}}
                <h3>LogIn </h3>
                <hr>
                <form action="{{route('loginUser')}}" method="post">
                    @if(Session::has('success'))
                    <div class="alert alert-success">{{Session::get('success')}}</div>
                    @endif
                    @if(Session::has('fail'))
                    <div class="alert alert-danger">{{Session::get('fail')}}</div>
                    @endif
                    @csrf
                    
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" placeholder="Enter Email"
                        name="email" value="{{old('email')}}"> 
                        <span class="text-danger">@error('email') {{$message}} @enderror</span><br>
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" placeholder="Enter Password" 
                        name="password" value="{{old('password')}}"> 
                        <span class="text-danger">@error('password') {{$message}} @enderror</span><br>
                    </div>

                    <div class="form-group">
                        <button class="btn btn-block btn-primary" type="submit">Login</button>
                    </div>
                    <br>
                    <a href="registration"> Register Here!</a>
                </form>
            </div>
        </div>
    </div>

</body>
   
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
            
</html>