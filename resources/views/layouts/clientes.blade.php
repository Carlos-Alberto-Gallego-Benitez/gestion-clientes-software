<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title></title>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>  
        <link href="{{asset('css/styleloyout.css')}}" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="index.html">Prueba Selección</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="#">Settings</a>
                        <a class="dropdown-item" href="#">Activity Log</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="login.html">Logout</a>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <a class="nav-link mt-4" href="index.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Clientes
                            </a>
                            <div class="sb-sidenav-menu-heading">Interface</div>
                            <a class="nav-link collapsed" href="http://127.0.0.1:8000/clientes/create" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Registrar                              
                            </a>
                        
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Pages
                           </a>
                            <div class="sb-sidenav-menu-heading">Addons</div>
                            <a class="nav-link" href="charts.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Charts
                            </a>
                            <a class="nav-link" href="tables.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Tables
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid mt-5">
                        <ol class="breadcrumb mb-4 text-center">
                            <li class="breadcrumb-item active text-center">Gestión de Clientes </li>
                        </ol>

                        @if ($action == 'index')
                        @if (session('info') == 'ok')
                        <script>
                          Swal.fire({
                          icon: 'success',
                          title: 'Registro Exitoso',                        
                          showConfirmButton: false,
                          timer: 2500
                         })      
                      </script>
                      @endif

                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Tabla de Clientes
                            </div>
            
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Nombre</th>
                                                <th>Imagen</th>
                                                <th>Cédula</th>
                                                <th>Correo</th>
                                                <th>Teléfono</th>
                                                <th>Observaciones</th>
                                                <th>Editar</th>
                                                <th>Ver</th>
                                                <th>Eliminar</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                               <th>Nombre</th>
                                                <th>Imagen</th>
                                                <th>Cédula</th>
                                                <th>Correo</th>
                                                <th>Teléfono</th>
                                                <th>Observaciones</th>
                                                <th>Editar</th>
                                                <th>Ver</th>
                                                <th>Eliminar</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                           @foreach ($clientes as $vacation)
                                                
                                                <tr>
                                                   <td>{{$vacation -> Nombre}}</td>
                                                   <td>
                                                     <img src="{{ asset('storage'). '/'. $vacation -> Imagen}}" width="100" />
                                                   </td>
                                                   <td>{{$vacation -> Cedula}}</td>
                                                   <td>{{$vacation -> Correo}}</td>
                                                   <td>{{$vacation -> Telefono}}</td>
                                                   <td>{{$vacation -> Observacion}}</td>
                                                   <td>
                                                       <a href="{{route('clientes.edit',$vacation -> id)}}" class="btn btn-primary" style="margin-top: 34px;">Editar</a>
                                                   </td>
                                                   <td>
                                                       <a href="{{route('clientes.show',$vacation -> id)}}" class="btn btn-primary" style="margin-top: 34px;">Ver</a>
                                                   </td>
                                                   <td>
                                                       <a href="{{route('clientes.delete',$vacation -> id)}}" class="btn btn-primary" style="margin-top: 34px;">Eliminar</a>
                                                   </td>
                                                </tr>
                                           @endforeach        
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        @endif  
                        @if ($action == 'registro') 
                        <form action="{{route('clientes.store')}}" method="POST" enctype="multipart/form-data" >   
                        @csrf
                        <div class="row">
                             <div class="form-group">
                                 <div class="col-sm-10">
                                 <label for="fname">Nombre</label>
                                  <input type="text" name="Nombre" class="form-control" id="">
                                  @error('Nombre')
                                  <small class="text-danger">
                                    {{$message}}
                                   </small>
                                  @enderror
                               </div>
                             </div>

                             <div class="form-group">
                                 <div class="col-sm-10">
                                 <label for="fname">Imagen</label>
                                  <input type="file" name="Imagen" class="form-control" id="">
                                  @error('Imagen')
                                  <small class="text-danger">
                                    {{$message}}
                                   </small>
                                  @enderror
                               </div>
                             </div>

                             <div class="form-group">
                                 <div class="col-sm-10">
                                 <label for="fname">Cédula</label>
                                  <input type="text" name="Cedula" class="form-control" id="">
                                  @error('Cedula')
                                  <small class="text-danger">
                                    {{$message}}
                                   </small>
                                  @enderror
                               </div>
                             </div>

                             <div class="form-group">
                                 <div class="col-sm-10">
                                 <label for="fname">Correo</label>
                                  <input type="text" name="Correo" class="form-control" id="">
                                  @error('Correo')
                                  <small class="text-danger">
                                    {{$message}}
                                   </small>
                                  @enderror
                               </div>
                             </div>

                               <div class="form-group">
                                 <div class="col-sm-10">
                                 <label for="fname">Teléfono</label>
                                  <input type="text" name="Telefono" class="form-control" id="">
                                  @error('Telefono')
                                  <small class="text-danger">
                                    {{$message}}
                                   </small>
                                  @enderror

                               </div>
                             </div>

                              <div class="form-group">
                                 <div class="col-sm-10">
                                 <label for="fname">Observación</label>
                                  <input type="text" name="Observacion" class="form-control" id="">
                                  @error('Observacion')
                                  <small class="text-danger">
                                    {{$message}}
                                   </small>
                                  @enderror
                               </div>
                             </div>

                            <div class="form-group">
                                <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary" style="margin-top: 34px;">Guardar</button>
                               </div>
                            </div>    
                        </div>
                        </form>
                        @endif     



                        @if ($action == 'editar') 
                        <form action="{{route('clientes.update', $cliente->id)}}" method="POST" enctype="multipart/form-data" >   
                        @csrf
                        @method('PUT')
                        <div class="row">
                             <div class="form-group">
                                 <div class="col-sm-10">
                                 <label for="fname">Nombre</label>
                                  <input type="text" name="Nombre" value="{{old('Nombre', $cliente->Nombre)}}" class="form-control" id="">
                                  @error('Nombre')
                                  <small class="text-danger">
                                    {{$message}}
                                   </small>
                                  @enderror
                               </div>
                             </div>

                             <div class="form-group">
                                 <div class="col-sm-10">
                                 <label for="fname">Imagen</label>
                                  <input type="file" name="Imagen" value="{{old('Imagen', $cliente->Imagen)}}" class="form-control" id="">
                                  <img src="{{ asset('storage'). '/'. $cliente->Imagen}}" width="60" />
                                  @error('Imagen')
                                  <small class="text-danger">
                                    {{$message}}
                                   </small>
                                  @enderror
                               </div>
                             </div>

                             <div class="form-group">
                                 <div class="col-sm-10">
                                 <label for="fname">Cédula</label>
                                  <input type="text" name="Cedula" value="{{old('Cedula', $cliente->Cedula)}}" class="form-control" id="">
                                  @error('Cedula')
                                  <small class="text-danger">
                                    {{$message}}
                                   </small>
                                  @enderror
                               </div>
                             </div>

                             <div class="form-group">
                                 <div class="col-sm-10">
                                 <label for="fname">Correo</label>
                                  <input type="text" name="Correo" value="{{old('Correo', $cliente->Correo)}}" class="form-control" id="">
                                  @error('Correo')
                                  <small class="text-danger">
                                    {{$message}}
                                   </small>
                                  @enderror
                               </div>
                             </div>

                               <div class="form-group">
                                 <div class="col-sm-10">
                                 <label for="fname">Teléfono</label>
                                  <input type="text" name="Telefono" value="{{old('Telefono', $cliente->Telefono)}}" class="form-control" id="">
                                  @error('Telefono')
                                  <small class="text-danger">
                                    {{$message}}
                                   </small>
                                  @enderror

                               </div>
                             </div>

                              <div class="form-group">
                                 <div class="col-sm-10">
                                 <label for="fname">Observación</label>
                                  <input type="text" name="Observacion" value="{{old('Observacion', $cliente->Observacion)}}" class="form-control" id="">
                                  @error('Observacion')
                                  <small class="text-danger">
                                    {{$message}}
                                   </small>
                                  @enderror
                               </div>
                             </div>

                            <div class="form-group">
                                <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary" style="margin-top: 34px;">Guardar</button>
                               </div>
                            </div>    
                        </div>
                        </form>
                        @endif   

                        @if ($action == 'ver') 
                        <form action="{{route('clientes.update', $cliente->id)}}" method="POST" enctype="multipart/form-data" >   
                        @csrf
                        @method('PUT')
                        <div class="row">
                             <div class="form-group">
                                 <div class="col-sm-10">
                                 <label for="fname">Nombre</label>
                                  <input type="text" disabled name="Nombre" value="{{old('Nombre', $cliente->Nombre)}}" class="form-control" id="">
                                  @error('Nombre')
                                  <small class="text-danger">
                                    {{$message}}
                                   </small>
                                  @enderror
                               </div>
                             </div>

                             <div class="form-group">
                                 <div class="col-sm-10">
                                 <label for="fname">Imagen</label>
                                  <img src="{{ asset('storage'). '/'. $cliente->Imagen}}" width="60" />
                                  @error('Imagen')
                                  <small class="text-danger">
                                    {{$message}}
                                   </small>
                                  @enderror
                               </div>
                             </div>

                             <div class="form-group">
                                 <div class="col-sm-10">
                                 <label for="fname">Cédula</label>
                                  <input type="text" disabled name="Cedula" value="{{old('Cedula', $cliente->Cedula)}}" class="form-control" id="">
                                  @error('Cedula')
                                  <small class="text-danger">
                                    {{$message}}
                                   </small>
                                  @enderror
                               </div>
                             </div>

                             <div class="form-group">
                                 <div class="col-sm-10">
                                 <label for="fname">Correo</label>
                                  <input type="text" disabled name="Correo" value="{{old('Correo', $cliente->Correo)}}" class="form-control" id="">
                                  @error('Correo')
                                  <small class="text-danger">
                                    {{$message}}
                                   </small>
                                  @enderror
                               </div>
                             </div>

                               <div class="form-group">
                                 <div class="col-sm-10">
                                 <label for="fname">Teléfono</label>
                                  <input type="text" disabled name="Telefono" value="{{old('Telefono', $cliente->Telefono)}}" class="form-control" id="">
                                  @error('Telefono')
                                  <small class="text-danger">
                                    {{$message}}
                                   </small>
                                  @enderror

                               </div>
                             </div>

                              <div class="form-group">
                                 <div class="col-sm-10">
                                 <label for="fname">Observación</label>
                                  <input type="text" disabled name="Observacion" value="{{old('Observacion', $cliente->Observacion)}}" class="form-control" id="">
                                  @error('Observacion')
                                  <small class="text-danger">
                                    {{$message}}
                                   </small>
                                  @enderror
                               </div>
                             </div>

                            <div class="form-group">
                                <div class="col-sm-10">
                                <button type="submit" disabled class="btn btn-primary" style="margin-top: 34px;">Guardar</button>
                               </div>
                            </div>    
                            <div class="form-group">
                                <div class="col-sm-10">
                                <a type="submit" href="http://127.0.0.1:8000/clientes" class="btn btn-primary" style="margin-top: 34px;">Retroceder</a>
                               </div>
                            </div>  
                        </div>
                        </form>
                        @endif
                          
                     
                    </div>
                </main>
                
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script type="text/javascript" src="../js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="../assets/demo/chart-area-demo.js"  type="text/javascript"></script>
        <script src="../assets/demo/chart-bar-demo.js"  type="text/javascript"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="../assets/demo/datatables-demo.js"  type="text/javascript"></script>
    </body>
</html>
