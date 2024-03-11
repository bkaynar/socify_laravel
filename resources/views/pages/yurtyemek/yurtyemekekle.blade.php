@extends('layout.master')

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Yemek</a></li>
            <li class="breadcrumb-item active" aria-current="page">Yemek Ekle</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">

                    <h6 class="card-title">Yemekler</h6>

                    <form data-action="{{route('yurt-yemek-ekle')}}" enctype="multipart/form-data" class="forms-sample" id="yemekEkle" method="POST">
                        @csrf
                        <div class="row mb-3">
                            <label for="saat" class="col-sm-3 col-form-label">Çorba</label>
                            <div class="col-sm-9">
                                <input type="text" name="corba" class="form-control">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="saat" class="col-sm-3 col-form-label">İkinci Yemek</label>
                            <div class="col-sm-9">
                                <input type="text" name="ikinci" class="form-control">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="saat" class="col-sm-3 col-form-label">İkinci Yemek Alternatif</label>
                            <div class="col-sm-9">
                                <input type="text" name="ikincialternatif" class="form-control">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="saat" class="col-sm-3 col-form-label">Üçünçü Yemek</label>
                            <div class="col-sm-9">
                                <input type="text" name="ucuncu" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="saat" class="col-sm-3 col-form-label">Dördünc Yemek</label>
                            <div class="col-sm-9">
                                <input type="text" name="dorduncu" class="form-control">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="saat" class="col-sm-3 col-form-label">Diğer Yiyecekler</label>
                            <div class="col-sm-9">
                                <input type="text" name="digeryiyecekler" class="form-control">
                            </div>
                        </div>
                        <!--
                        Bu alanda 2 tane radio button olacak ve sabah akşam seçilecek
                        -->
                        <div class="row mb-3">
                            <label for="saat" class="col-sm-3 col-form-label">Sabah/Akşam</label>
                            <div class="col-sm-9">
                                <input type="radio" name="sabah_aksam" value="0" class="form-check-input">Sabah
                                <input type="radio" name="sabah_aksam" value="1" class="form-check-input">Akşam
                            </div>

                            <div class="row mb-3">
                                <label for="saat" class="col-sm-3 col-form-label">Tarih</label>
                                <div class="col-sm-9">
                                    <input type="date" name="tarih" class="form-control">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary me-2">Yemek Ekle</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
@push('custom-scripts')
    <script>
        $(document).ready(function (){
            var form="#yemekEkle"

            $('#yemekEkle').submit(function (e){
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
                        $('#yemekEkle').trigger('reset');
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
