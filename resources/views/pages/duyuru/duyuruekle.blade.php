@extends('layout.master')

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Birim</a></li>
            <li class="breadcrumb-item active" aria-current="page">Duyuru Ekle</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">

                    <h6 class="card-title">Birimler</h6>

                    <form data-action="{{route('duyuru-ekle')}}" enctype="multipart/form-data" class="forms-sample" id="duyuruEkle" method="POST">
                        @csrf
                        <div class="row mb-3">
                            <label for="saat" class="col-sm-3 col-form-label">Duyuru Başlık</label>
                            <div class="col-sm-9">
                                <input type="text" name="baslik" class="form-control">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="saat" class="col-sm-3 col-form-label">İçerik</label>
                            <div class="col-sm-9">
                                <input type="text" name="icerik" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="saat" class="col-sm-3 col-form-label">Link</label>
                            <div class="col-sm-9">
                                <input type="text" name="link" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="saat" class="col-sm-3 col-form-label">Birim</label>
                            <div class="col-sm-9">
                                <select name="birim_id" class="form-control">
                                    <option value="">Seçiniz</option>
                                    @foreach($birimler as $birim)
                                        <option value="{{$birim->id}}">{{$birim->ad}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary me-2">Duyuru Ekle</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
@push('custom-scripts')
    <script>
        $(document).ready(function (){
            var form="#duyuruEkle"

            $('#duyuruEkle').submit(function (e){
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
                        $('#duyuruEkle').trigger('reset');
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
