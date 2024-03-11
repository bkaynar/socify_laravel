

<?php $__env->startSection('content'); ?>
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

                    <form data-action="<?php echo e(route('yemek-ekle')); ?>" enctype="multipart/form-data" class="forms-sample" id="yemekEkle" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="row mb-3">
                            <label for="saat" class="col-sm-3 col-form-label">1.Yemek</label>
                            <div class="col-sm-9">
                                <input type="text" name="yemek1" class="form-control">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="saat" class="col-sm-3 col-form-label">2.Yemek</label>
                            <div class="col-sm-9">
                                <input type="text" name="yemek2" class="form-control">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="saat" class="col-sm-3 col-form-label">3.Yemek</label>
                            <div class="col-sm-9">
                                <input type="text" name="yemek3" class="form-control">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="saat" class="col-sm-3 col-form-label">4.Yemek</label>
                            <div class="col-sm-9">
                                <input type="text" name="yemek4" class="form-control">
                            </div>
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
<?php $__env->stopSection(); ?>
<?php $__env->startPush('custom-scripts'); ?>
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

<?php $__env->stopPush(); ?>

<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/shiningm/ahisocitify.shiningmoony.com.tr/resources/views/pages/yemek/yemekekle.blade.php ENDPATH**/ ?>