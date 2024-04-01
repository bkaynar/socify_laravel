@extends('layout.master')

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Storyler</a></li>
            <li class="breadcrumb-item active" aria-current="page">Story Ekle</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">

                    <h6 class="card-title">Storyler</h6>

                    <form data-action="{{route('story-ekle')}}" enctype="multipart/form-data" class="forms-sample"
                          id="storyEkle" method="POST">
                        @csrf
                        <div class="row mb-3">
                            <label for="title" class="col-sm-3 col-form-label">Story Adı</label>
                            <div class="col-sm-9">
                                <input type="text" name="title" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="Küçük Foto" class="col-sm-3 col-form-label">Küçük Foto</label>
                            <div class="col-sm-9">
                                <input type="file" name="ana_foto" class="form-control">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="Fotoğraf" class="col-sm-3 col-form-label">Fotoğraf</label>
                            <div class="col-sm-9">
                                <input type="file" name="fotograf" class="form-control">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary me-2">Story Ekle</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
@push('custom-scripts')
    <script>
        $(document).ready(function () {
            var form = "#storyEkle"

            $('#storyEkle').submit(function (e) {
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
                        $('#storyEkle').trigger('reset');
                    },
                    error: function (data) {
                        print(data.responseJSON.errors)
                        //kanka autosave var
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
