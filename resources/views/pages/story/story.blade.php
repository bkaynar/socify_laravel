@extends('layout.master')
@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Taksi</a></li>
            <li class="breadcrumb-item active" aria-current="page">Taksiler</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Taksiler</h6>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Ana Foto</th>
                                <th>Fotograf</th>
                                <th>İsim</th>
                                <th>Öncelikli</th>
                                <th>Aktif/Pasif</th>
                                <th>Sil</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($stories as $story)
                                <tr>
                                    <!--web.php sayfasından gelen veriyi foreach ile göstereceğiz -->
                                    <td>{{$story->id}}</td>
                                    <td><img src="{{asset($story->ana_foto)}}" alt="" width="100"></td>
                                    <td><img src="{{asset($story->fotograf)}}" alt="" width="100"></td>
                                    <td>{{$story->title}}</td>
                                    <td>
                                        @if($story->oncelik == 1)
                                            <button type="button" class="btn btn-success oncelik">Öncelikli</button>
                                        @else
                                            <button type="button" class="btn btn-danger oncelik">Öncelikli Değil
                                            </button>
                                        @endif

                                        <!-- Burada yapılacak işlem şudur
                                    aktif verisi 1 ise buton aktif olacak 0 ise pasif olacak ve basıldığında 1 ise 0, 0 ise 1 olacak
                                    -->
                                    <td>
                                        @if($story->aktif == 1)
                                            <button type="button" class="btn btn-success aktif">Aktif</button>
                                        @else
                                            <button type="button" class="btn btn-danger aktif">Pasif</button>
                                    @endif
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
        function siralama() {
            var table = $("table tbody");
            table.find('tr').sort(function(a, b) {
                var keyA = $(a).find('.oncelik').hasClass('btn-success');
                var keyB = $(b).find('.oncelik').hasClass('btn-success');
                return (keyA === keyB) ? 0 : keyA ? -1 : 1;
            }).appendTo(table);
        }

        // Sayfa yüklendiğinde ve herhangi bir güncelleme işleminden sonra tabloyu yeniden sıralamak için çağrı yapın
        $(document).ready(function() {
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
                        url: "/story-delete/" + id,
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

        // Aktif/pasif butonlarını güncellemek için işlev tanımlama
        function guncelleButon(tr, aktif) {
            if (aktif == 1) {
                tr.find('.aktif').removeClass('btn-danger').addClass('btn-success').text('Aktif');
            } else {
                tr.find('.aktif').removeClass('btn-success').addClass('btn-danger').text('Pasif');
            }
        }

        $('.aktif').click(function () {
            let id = $(this).closest('tr').find('td:first').text();
            let tr = $(this).closest('tr');
            $.ajax({
                type: "PUT",
                url: "/story-aktif/" + id,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "id": id
                },
                success: function (response) {
                    guncelleButon(tr, response.aktif); // Butonun durumunu güncelle
                    if (response.aktif == 1) {
                        Swal.fire(
                            'Aktif!',
                            'Story başarıyla aktif edildi.',
                            'success'
                        )
                    } else {
                        Swal.fire(
                            'Pasif!',
                            'Story başarıyla pasif edildi.',
                            'error'
                        )
                    }
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

        $('.oncelik').click(function () {
            siralama();
            let id = $(this).closest('tr').find('td:first').text();
            let tr = $(this).closest('tr');
            $.ajax({
                type: "PUT",
                url: "/story-oncelik/" + id,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "id": id
                },
                success: function (response) {
                    oncelikliButon(tr, response.oncelik); // Butonun durumunu güncelle
                    if (response.oncelik == 1) {
                        Swal.fire(
                            'Öncelikli!',
                            'Story başarıyla öncelik verildi.',
                            'success'
                        )
                    } else {
                        Swal.fire(

                            'Öncelikli Değil!',
                            'Story öncelikliği kaldırıldı.',
                            'error'
                        )
                    }
                    siralama();
                }
            });
            siralama();
        });
    </script>
@endpush
