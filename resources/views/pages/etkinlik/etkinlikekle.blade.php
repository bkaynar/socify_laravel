@extends('layout.master')

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Etkinlik</a></li>
            <li class="breadcrumb-item active" aria-current="page">Etkinlik Ekle</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">

                    <h6 class="card-title">Etkinlikler</h6>
                    <form data-action="{{route('etkinlik-ekle')}}" enctype="multipart/form-data" class="forms-sample"
                          id="etkinlikEkle" method="POST">
                        @csrf
                        <div class="row mb-3">
                            <label for="saat" class="col-sm-3 col-form-label">Etkinlik Adı</label>
                            <div class="col-sm-9">
                                <input type="text" name="adi" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="saat" class="col-sm-3 col-form-label">İçerik</label>
                            <div class="col-sm-9">
                                <input type="text" name="icerik" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="tarihi" class="col-sm-3 col-form-label">Etkinlik Tarihi</label>
                            <div class="col-sm-9">
                                <input type="date" name="tarihi" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="saat" class="col-sm-3 col-form-label">Fotoğraf</label>
                            <div class="col-sm-9">
                                <input type="file" name="fotograf" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="saat" class="col-sm-3 col-form-label">Birim</label>
                            <div class="col-sm-9">
                                <select name="topluluk_id" class="form-control">
                                    <option value="">Seçiniz</option>
                                    @foreach($topluluklar as $topluluk)
                                        <option value="{{$topluluk->id}}">{{$topluluk->adi}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary me-2">Etkinlik Ekle</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
@push('custom-scripts')
    <script>
        $(document).ready(function () {
            var form = "#etkinlikEkle"

            $('#etkinlikEkle').submit(function (e) {
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
                        $('#etkinlikEkle').trigger('reset');
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
