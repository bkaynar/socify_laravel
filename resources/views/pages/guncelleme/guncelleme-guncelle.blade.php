@extends('layout.master')

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Güncelleme</a></li>
            <li class="breadcrumb-item active" aria-current="page">Güncelleme Ekle</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">

                    <h6 class="card-title">Güncellemeler</h6>

                    <form data-action="{{route('guncelleme-guncelle')}}" enctype="multipart/form-data" class="forms-sample" id="guncellemeGuncelle" method="POST">
                        @csrf
                        <div class="row mb-3">
                            <label for="saat" class="col-sm-3 col-form-label">Android Version</label>
                            <div class="col-sm-9">
                                <input type="text" name="android" class="form-control" value="{{$guncelleme->android}}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="saat" class="col-sm-3 col-form-label">iOS Version</label>
                            <div class="col-sm-9">
                                <input type="text" name="ios" class="form-control" value="{{$guncelleme->ios}}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="saat" class="col-sm-3 col-form-label">Android Link</label>
                            <div class="col-sm-9">
                                <input type="text" name="playstore_link" class="form-control" value="{{$guncelleme->playstore_link}}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="saat" class="col-sm-3 col-form-label">iOS Link</label>
                            <div class="col-sm-9">
                                <input type="text" name="appstore_link" class="form-control"    value="{{$guncelleme->appstore_link}}">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary me-2">Güncelleme Ekle</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
@push('custom-scripts')
    <script>
        $(document).ready(function (){
            var form="#guncellemeGuncelle"

            $('#guncellemeGuncelle').submit(function (e){
                e.preventDefault();
                var url=$(form).attr('data-action');
                $.ajax({
                    url:url,
                    type:"POST",
                    data:new FormData(this),
                    async:false,
                    cache:false,
                    contentType:false,
                    processData:false,
                    //sweatAlert
                    success:function (data){
                        swal.fire({
                            title:'Başarılı!',
                            text:'İşlem Başarılı Bir Şekilde Gerçekleştirildi.',
                            icon:'success',
                            confirmButtonText:'Tamam'
                        })
                        $('#guncellemeEkle').trigger('reset');
                    },
                    error:function (data){
                        print(data.responseJSON.errors)
                        //kanka autosave var
                        swal.fire({
                            title:'Hata!',
                            text:'İşlem Başarısıadsz.',
                            icon:'error',
                            confirmButtonText:'Tamam'
                        })
                    }
                })
            })
        })
    </script>

@endpush
