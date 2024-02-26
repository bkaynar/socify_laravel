@extends('layout.master')

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Duyuru</a></li>
            <li class="breadcrumb-item active" aria-current="page">Duyuru</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Duyurular</h6>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Fotoğraf</th>
                                <th>Başlık</th>
                                <th>Birim</th>
                                <th>Sil</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($duyurular as $duyuru)
                                <tr>
                                    <!--web.php sayfasından gelen veriyi foreach ile göstereceğiz -->
                                    <td>{{$duyuru->id}}</td>
                                    <td><img src="{{ asset($duyuru->fotograf) }}" alt="Duyuru Fotoğrafı" style="min-width: 250px;"></td>
                                    <td>{{$duyuru->baslik}}</td>
                                    <td>{{$duyuru->birim->ad}}</td>
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
                        url: "/duyuru-delete/" + id,
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
