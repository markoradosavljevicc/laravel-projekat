@extends('layouts.app')

@section('title', 'Kontrolna tabla')

@section('content')
<div style="height: 80px;"></div>

<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Dobrodošli, {{ Auth::user()->name }}</h2>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="btn btn-danger">Izloguj se</button>
        </form>
    </div>

    @if (Auth::user()->role->name === 'admin' && isset($users))
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Korisnici</h5>
                <a href="{{ route('users.create') }}" class="btn btn-success btn-sm">+ Dodaj korisnika</a>
            </div>
            <div class="card-body table-responsive">
                <table id="users-table" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Ime</th>
                            <th>Email</th>
                            <th>Uloga</th>
                            <th>Akcije</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->role->name }}</td>
                                <td>
                                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary btn-sm">Izmeni</a>
                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Obriši</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            @if(isset($chartData) && count($chartData) > 1)
                <div class="card mt-4">
                    <div class="card-header">
                        <h5>Statistika narudžbina po mesecima</h5>
                    </div>
                    <div class="card-body">
                        <div id="chart_div" style="height: 400px;"></div>
                    </div>
                </div>
            @endif
        </div>
    @elseif (Auth::user()->role->name === 'editor')
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Kotlovi</h5>
                <a href="{{ route('kotlovi.create') }}" class="btn btn-success btn-sm">+ Dodaj kotao</a>
            </div>
            <div class="card-body table-responsive">
                <table id="kotlovi-table" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Naziv</th>
                            <th>Tip</th>
                            <th>Cena</th>
                            <th>Istaknuto</th>
                            <th>Akcije</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($kotlovi as $kotao)
                            <tr>
                                <td>{{ $kotao->id }}</td>
                                <td>{{ $kotao->naziv }}</td>
                                <td>{{ $kotao->tip }}</td>
                                <td>{{ number_format($kotao->cena, 2) }} RSD</td>
                                <td>{{ $kotao->featured ? 'Da' : 'Ne' }}</td>
                                <td>
                                    <a href="{{ route('kotlovi.edit', $kotao->id) }}" class="btn btn-primary btn-sm">Izmeni</a>
                                    <form action="{{ route('kotlovi.destroy', $kotao->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm">Obriši</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Servisi</h5>
                <a href="{{ route('servis.create') }}" class="btn btn-success btn-sm">+ Dodaj servis</a>
            </div>
            <div class="card-body table-responsive">
                <table id="servisi-table" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Naziv</th>
                            <th>Opis</th>
                            <th>Telefon</th>
                            <th>Adresa</th>
                            <th>Akcije</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($servis as $servis)
                            <tr>
                                <td>{{ $servis->id }}</td>
                                <td>{{ $servis->naziv }}</td>
                                <td>{{ $servis->opis }}</td>
                                <td>{{ $servis->telefon }}</td>
                                <td>{{ $servis->adresa }}</td>
                                <td>
                                    <a href="{{ route('servis.edit', $servis->id) }}" class="btn btn-primary btn-sm">Izmeni</a>
                                    <form action="{{ route('servis.destroy', $servis->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm">Obriši</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @elseif(Auth::user()->role->name === 'user')
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Moje narudžbine</h5>
            </div>
            <div class="card-body table-responsive">
                <table id="narudzbine-table" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Kotao</th>
                            <th>Količina</th>
                            <th>Napomena</th>
                            <th>Akcije</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($narudzbine as $n)
                            <tr>
                                <td>{{ $n->kotao->naziv }}</td>
                                <td>{{ $n->kolicina }}</td>
                                <td>{{ $n->napomena }}</td>
                                <td>
                                    <form action="{{ route('narudzbine.destroy', $n) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm">Obriši</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">Nema narudžbina.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    @endif
</div>
@endsection

@push('scripts')
<!-- Google Chart -->
<script src="https://www.gstatic.com/charts/loader.js"></script>
<script>
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
        let data = google.visualization.arrayToDataTable(@json($chartData));
        let options = {
            title: 'Broj narudžbina po mesecima',
            curveType: 'function',
            legend: { position: 'bottom' },
            colors: ['#FFA500']
        };
        let chart = new google.visualization.LineChart(document.getElementById('chart_div'));
        chart.draw(data, options);
    }
</script>

<!-- DataTables -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function () {
        $('#users-table').DataTable();
        $('#kotlovi-table').DataTable();
        $('#servisi-table').DataTable();
        $('#narudzbine-table').DataTable();
    });
</script>
@endpush
