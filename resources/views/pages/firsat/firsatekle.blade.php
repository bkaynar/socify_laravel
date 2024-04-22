@extends('layout.master')

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Fırsat</a></li>
            <li class="breadcrumb-item active" aria-current="page">Fırsat Ekle</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">

                    <h6 class="card-title">Fırsat Ekle</h6>
                    <form data-action="{{route('firsat-ekle')}}" enctype="multipart/form-data" class="forms-sample"
                          id="firsatEkle" method="POST">
                        @csrf
                        <div class="row mb-3">
                            <label for="saat" class="col-sm-3 col-form-label">Fırsat Adı</label>
                            <div class="col-sm-9">
                                <input type="text" name="adi" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="saat" class="col-sm-3 col-form-label">Açıklama</label>
                            <div class="col-sm-9">
                                <input type="text" name="aciklama" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="tarihi" class="col-sm-3 col-form-label">Fotoğraf</label>
                            <div class="col-sm-9">
                                <input type="file" name="foto" class="form-control">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="tarihi" class="col-sm-3 col-form-label">Link</label>
                            <div class="col-sm-9">
                                <input type="text" name="link" class="form-control">
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
            var form = "#firsatEkle"

            $('#firsatEkle').submit(function (e) {
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
                        $('#firsatEkle').trigger('reset');
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
