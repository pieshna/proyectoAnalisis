@include('template')
@yield('header')

<body>
    @yield('nav')
    <div class="container-fluid table-responsive">
        <h1 class='text-center'>CLIENTES: </h1>
        <hr>
        @if(Session::has('Mensaje'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>{{Session::get('Mensaje')}}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        <table class="table table-hover">
            <thead>
                <tr class='bg-info'>
                    <th scope="col">Nombre</th>
                    <th scope="col">Plan</th>
                    <th scope="col">Mes</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pagos as $pago)
                <tr>
                    <td>{{$pago->nombre}}</td>
                    <td>{{$pago->megas}}</td>
                    @foreach($mes as $meses)
                    @if($pago->id===$meses->cliente)
                    <td>{{$meses->mes}}</td>
                    @endif
                    @endforeach
                    
                </tr>
                @endforeach
            </tbody>
        </table>
        <a class="btn btn-danger btn-lg col-xs-2" href="{{url('/home')}}">Inicio</a>
        <a class="btn btn-primary btn-lg col-xs-2 offset-8 float-right" href="{{url('/clientes/create')}}">Nuevo</a>
        <br><br>
    </div>
    @yield('footer')