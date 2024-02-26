@extends('layout.master')

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Topluluk</a></li>
            <li class="breadcrumb-item active" aria-current="page">Topluluk Ekle</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">

                    <h6 class="card-title">Topluluk Ekle</h6>

                    <form data-action="{{route('topluluk-ekle')}}" enctype="multipart/form-data" class="forms-sample"
                          id="toplulukEkle" method="POST">
                        @csrf
                        <div class="row mb-3">
                            <label for="saat" class="col-sm-3 col-form-label">Topluluk Adı</label>
                            <div class="col-sm-9">
                                <input type="text" name="adi" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="saat" class="col-sm-3 col-form-label">Topluluk Açıklaması</label>
                            <div class="col-sm-9">
                                <input type="text" name="aciklama" class="form-control">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="saat" class="col-sm-3 col-form-label">Kullanıcı Adı</label>
                            <div class="col-sm-9">
                                <input type="text" name="kullanici_adi" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="saat" class="col-sm-3 col-form-label">Şifre</label>
                            <div class="col-sm-9">
                                <input type="password" name="sifre" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="saat" class="col-sm-3 col-form-label">Fotoğraf</label>
                            <div class="col-sm-9">
                                <input type="file" name="fotograf" class="form-control">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary me-2">Topluluk Ekle</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
@push('custom-scripts')
    <script>
        $(document).ready(function () {
            var form = "#toplulukEkle"

            $('#toplulukEkle').submit(function (e) {
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
                        $('#toplulukEkle').trigger('reset');
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
