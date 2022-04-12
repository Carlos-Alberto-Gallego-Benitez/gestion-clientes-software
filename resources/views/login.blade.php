<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Animado</title>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js" integrity="sha512-n/4gHW3atM3QqRcbCn6ewmpxcLAHGaDjpEBu4xZd47N0W2oQ+6q7oc3PXstrJYXcbNU1OHdQ1T7pAP+gi5Yu8g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    
</head>
<body>
    <img class="wave" src="storage/wave.png">
    <div class="container">
        <div class="img">
            <img src="storage/undraw_in_sync_xwsa.svg">
        </div>
        <div class="login-container">
         <form action="{{route('usuarios.store')}}" id="formulario"  method="POST" enctype="multipart/form-data" >
             @csrf        
              <img class="avatar" src="storage/avatar_male.svg">
                <h2>Bienvenido</h2>
                <div class="input-div one">
                    <div class="i">
                        <i class="fas fa-user"></i>
                    </div>
                    <div>
                        <h5>Usuario</h5>
                        <input class="input" id="name" name="Correo" type="text">
                      
                    </div>
                   
                </div>
                @error('Correo')
                    <small class="text-danger">
                        {{$message}}
                    </small>
                @enderror

                <div class="input-div two">
                    <div class="i">
                        <i class="fas fa-lock"></i>
                    </div>
                    <div>
                        <h5>Contraseña</h5>
                        <input class="input" id="pass" name="Password" type="password">                    
                    </div>
                   
                </div>
                @error('Password')
                    <small class="text-danger">
                        {{$message}}
                     </small>
                @enderror
                <font color="Red" style="margin-top:12px;" ><p id="mensaje"></p></font>
                <button type="submit" class="btn" > Login</button>
            </form>
        </div>
    </div>
    <script type="text/javascript" src="js/main.js">
    </script>
</body>
</html>