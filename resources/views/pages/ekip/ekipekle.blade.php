@extends('layout.master')

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Ekip</a></li>
            <li class="breadcrumb-item active" aria-current="page">Ekip Ekle</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">

                    <h6 class="card-title">Ekip Üyesi Ekle</h6>

                    <form data-action="{{route('ekip-ekle')}}" enctype="multipart/form-data" class="forms-sample"
                          id="ekipEkle" method="POST">
                        @csrf
                        <div class="row mb-3">
                            <label for="adsoyad" class="col-sm-3 col-form-label">Adı Soyadı</label>
                            <div class="col-sm-9">
                                <input type="text" name="adsoyad" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="unvan" class="col-sm-3 col-form-label">Ünvan</label>
                            <div class="col-sm-9">
                                <input type="text" name="unvan" class="form-control">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="aciklama" class="col-sm-3 col-form-label">Açıklama</label>
                            <div class="col-sm-9">
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" name="aciklama"></textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="saat" class="col-sm-3 col-form-label">Fotoğraf</label>
                            <div class="col-sm-9">
                                <input type="file" name="resim" class="form-control">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary me-2">Ekip Üyesi Ekle</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
@push('custom-scripts')
    <script>
        $(document).ready(function () {
            var form = "#ekipEkle"

            $('#ekipEkle').submit(function (e) {
                e.preventDefault();
                var url = $(form).attr('data-action');
                $.ajax({
                    url: url,
                    type: "POST",
                    data: new FormData(this),
                    async: false,
                    cache: false,
                    contentType: false,
                    processData: false,
                    //sweatAlert
                    success: function (data) {
                        swal.fire({
                            title: 'Başarılı!',
                            text: 'İşlem Başarılı Bir Şekilde Gerçekleştirildi.',
                            icon: 'success',
                            confirmButtonText: 'Tamam'
                        })
                        $('#ekipEkle').trigger('reset');
                    },
                    error: function (data) {
                        console.log(data);
                        swal.fire({
                            title: 'Hata!',
                            text: 'İşlem Başarısıadsz.',
                            icon: 'error',
                            confirmButtonText: 'Tamam'
                        })
                    }
                })
            })
        })
    </script>

@endpush
