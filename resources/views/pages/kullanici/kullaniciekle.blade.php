@extends('layout.master')

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Kullanıcı</a></li>
            <li class="breadcrumb-item active" aria-current="page">Kullanıcı Ekle</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">

                    <h6 class="card-title">Kullanıcılar</h6>
                    <form data-action="{{route('kullanici-ekle')}}" enctype="multipart/form-data" class="forms-sample"
                          id="kullaniciEkle" method="POST">
                        @csrf
                        <div class="row mb-3">
                            <label for="saat" class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-9">
                                <input type="email" name="email" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="saat" class="col-sm-3 col-form-label">Adı</label>
                            <div class="col-sm-9">
                                <input type="text" name="name" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="saat" class="col-sm-3 col-form-label">Şifre</label>
                            <div class="col-sm-9">
                                <input type="password" name="password" class="form-control">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary me-2">Kullanıcı Ekle</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
@push('custom-scripts')
    <script>
        $(document).ready(function () {
            var form = "#kullaniciEkle"

            $('#kullaniciEkle').submit(function (e) {
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
                        $('#kullaniciEkle').trigger('reset');
                    },
                    error: function (data) {
                        //kanka autosave var
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
