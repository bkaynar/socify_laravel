<?php $__env->startSection('content'); ?>
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

                    <form data-action="<?php echo e(route('guncelleme-ekle')); ?>" enctype="multipart/form-data" class="forms-sample" id="guncellemeEkle" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="row mb-3">
                            <label for="saat" class="col-sm-3 col-form-label">Android Version</label>
                            <div class="col-sm-9">
                                <input type="text" name="android" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="saat" class="col-sm-3 col-form-label">iOS Version</label>
                            <div class="col-sm-9">
                                <input type="text" name="ios" class="form-control">
                            </div>
                        </div><div class="row mb-3">
                            <label for="saat" class="col-sm-3 col-form-label">Mesaj</label>
                            <div class="col-sm-9">
                                <input type="text" name="aciklama" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="saat" class="col-sm-3 col-form-label">Android Link</label>
                            <div class="col-sm-9">
                                <input type="text" name="playstore_link" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="saat" class="col-sm-3 col-form-label">iOS Link</label>
                            <div class="col-sm-9">
                                <input type="text" name="appstore_link" class="form-control">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary me-2">Güncelleme Ekle</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('custom-scripts'); ?>
    <script>
        $(document).ready(function (){
            var form="#guncellemeEkle"

            $('#guncellemeEkle').submit(function (e){
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

<?php $__env->stopPush(); ?>

<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/shiningm/ahisocitify.shiningmoony.com.tr/resources/views/pages/guncelleme/guncelleme-ekle.blade.php ENDPATH**/ ?>