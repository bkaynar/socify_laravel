@extends('layout.master')

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Ziyaret</a></li>
            <li class="breadcrumb-item active" aria-current="page">Ziyaretler</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Ziyaretler</h6>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Ziyaret Sayısı</th>
                                <th>Son Ziyaret</th>
                                <th>Tarih</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($ziyaretciKaydi as $ziyaret)
                                <tr>
                                    <!--web.php sayfasından gelen veriyi foreach ile göstereceğiz -->
                                    <td>{{$ziyaret->visitor_count}}</td>
                                    <td>{{$ziyaret->updated_at}}</td>
                                    <td>{{$ziyaret->created_at}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
