@extends('layout.master')

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Yurt Yemekleri</a></li>
            <li class="breadcrumb-item active" aria-current="page">Yurt Yemekleri</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Yurt Yemekleri</h6>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Tarih</th>
                                <th>1.Yemek</th>
                                <th>2.Yemek</th>
                                <th>2.Yemek(Alternatif)</th>
                                <th>3.Yemek</th>
                                <th>4.Yemek</th>
                                <th>Diğer Yemekler</th>
                                <th>Sabah/Akşam</th>
                                <th>Sil</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($yurtyemekler as $yemek)
                                <tr>
                                    <!--web.php sayfasından gelen veriyi foreach ile göstereceğiz -->
                                    <td>{{$yemek->id}}</td>
                                    <td>{{$yemek->tarih}}</td>
                                    <td>{{$yemek->corba}}</td>
                                    <td>{{$yemek->ikinci}}</td>
                                    <td>{{$yemek->ikincialternatif}}</td>
                                    <td>{{$yemek->ucuncu}}</td>
                                    <td>{{$yemek->dorduncu}}</td>
                                    <td>{{$yemek->digeryiyecekler}}</td>
                                    <td>
                                        @if($yemek->sabahaksam == 0)
                                            Kahvaltı
                                        @else
                                            Akşam
                                        @endif
                                    </td>
                                    <td><button type="button" class="btn btn-danger sil">Sil</button></td>
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
@push('custom-scripts')
    <script>
        //Silme işlemi için
        $('.sil').click(function () {
            //Sweet Alert ile silme işlemi
            Swal.fire({
                title: 'Emin misiniz?',
                text: "Bu işlemi geri alamayacaksınız!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Sil',
                cancelButtonText: 'İptal'
            }).then((result) => {
                if (result.isConfirmed) {
                    //Silme işlemi
                    let id = $(this).closest('tr').find('td:first').text();
                    let tr = $(this).closest('tr');
                    $.ajax({
                        //type Update olduğu için put
                        type: "PUT",
                        url: "/yemek-delete/" + id,
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "id": id
                        },
                        success: function (response) {
                            tr.remove();
                        }
                    });
                    Swal.fire(
                        'Silindi!',
                        'Silme işlemi başarıyla gerçekleşti.',
                        'success'
                    )
                }
            });
        });
    </script>
@endpush
