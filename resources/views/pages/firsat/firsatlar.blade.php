@extends('layout.master')

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Anasayfa</a></li>
            <li class="breadcrumb-item active" aria-current="page">Fırsatlar</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Fırsatlar</h6>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Adı</th>
                                <th>Fotoğraf</th>
                                <th>Öncelik</th>
                                <th>Sil</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($firsatlar as $firsat)
                                <tr>
                                    <!--web.php sayfasından gelen veriyi foreach ile göstereceğiz -->
                                    <td class="mx-auto">{{$firsat->id}}</td>
                                    <td>{{$firsat->adi}}</td>
                                    <td><img src="{{asset($firsat->foto)}}" alt="{{$firsat->adi}}"
                                             style="width: 100px; height: 100px;"></td>
                                    <td>
                                        @if($firsat->oncelik == 1)
                                            <button type="button" class="btn btn-success oncelik">Öncelikli</button>
                                        @else
                                            <button type="button" class="btn btn-danger oncelik">Öncelikli Değil
                                            </button>
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
        function siralama() {
            var table = $("table tbody");
            table.find('tr').sort(function(a, b) {
                var keyA = $(a).find('.oncelik').hasClass('btn-success');
                var keyB = $(b).find('.oncelik').hasClass('btn-success');
                return (keyA === keyB) ? 0 : keyA ? -1 : 1;
            }).appendTo(table);
        }
        $(document).ready(function () {
            siralama();
        });
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
                        url: "/firsat-delete/" + id,
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
        function oncelikliButon(tr, oncelik) {
            if (oncelik == 1) {
                tr.find('.oncelik').removeClass('btn-danger').addClass('btn-success').text('Öncelikli');
            } else {
                tr.find('.oncelik').removeClass('btn-success').addClass('btn-danger').text('Öncelikli Değil');
            }
        }
        //Öncelik işlemi için
        $('.oncelik').click(function () {
            let id = $(this).closest('tr').find('td:first').text();
            let tr = $(this).closest('tr');
            $.ajax({
                //type Update olduğu için put
                type: "PUT",
                url: "/firsat-oncelik/" + id,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "id": id
                },
                success: function (response) {
                    oncelikliButon(tr, response.oncelik); // Butonun durumunu güncelle
                    if (response.oncelik == 1) {
                        Swal.fire(
                            'Öncelikli!',
                            'Fırsat başarıyla öncelik verildi.',
                            'success'
                        )
                    } else {
                        Swal.fire(

                            'Öncelikli Değil!',
                            'Fırsatın önceliği kaldırıldı.',
                            'error'
                        )
                    }
                    siralama();
                }
            });
        });

    </script>
@endpush
