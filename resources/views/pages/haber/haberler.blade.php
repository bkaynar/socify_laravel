@extends('layout.master')

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Anasayfa</a></li>
            <li class="breadcrumb-item active" aria-current="page">Haberler</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Haberler</h6>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Fotoğraf</th>
                                <th>Başlık</th>
                                <th>Sil</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($haberler as $haber)
                                <tr>
                                    <!--web.php sayfasından gelen veriyi foreach ile göstereceğiz -->
                                    <td class="mx-auto">{{$haber->id}}</td>

                                    <td><img src="{{asset($haber->resim_yolu)}}" alt="{{$haber->baslik}}"
                                             style="width: 100%; height: 200px;"></td>
                                    <td>{{$haber->baslik}}</td>
                                    <td>
                                        <button type="button" class="btn btn-danger sil">Sil</button>
                                    </td>
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
        $('.sil').click(function () {
            //Sweet Alert ile silme işlemi
            let tr = $(this).closest('tr'); // Satırı seç

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
                    let id = tr.find('td:first').text();
                    $.ajax({
                        //type Update olduğu için put
                        type: "PUT",
                        url: "/haber-delete/" + id,
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "id": id
                        },
                        //response code 200 ise
                        success: function (response) {
                            tr.remove();
                            Swal.fire(
                                'Silindi!',
                                'Haber başarıyla silindi.',
                                'success'
                            )
                        },
                    });
                }
            });
        });

    </script>
@endpush
