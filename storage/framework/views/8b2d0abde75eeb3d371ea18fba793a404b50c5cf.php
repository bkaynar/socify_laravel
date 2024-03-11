<?php $__env->startSection('content'); ?>
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Güncelleme</a></li>
            <li class="breadcrumb-item active" aria-current="page">Güncellemeler</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Güncellemeler</h6>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Android V</th>
                                <th>iOS V</th>
                                <th>Android Link</th>
                                <th>iOS Link</th>
                                <th>Güncelle</th>
                                <th>Sil</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $guncellemeler; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $guncelleme): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <!--web.php sayfasından gelen veriyi foreach ile göstereceğiz -->
                                    <td><?php echo e($guncelleme->id); ?></td>
                                    <td><?php echo e($guncelleme->android); ?></td>
                                    <td><?php echo e($guncelleme->ios); ?></td>
                                    <td><?php echo e($guncelleme->playstore_link); ?></td>
                                    <td><?php echo e($guncelleme->appstore_link); ?></td>
                                    <td><button type="button" class="btn btn-info guncelle">Güncelle</button></td>
                                    <td><button type="button" class="btn btn-danger sil">Sil</button></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('custom-scripts'); ?>
    <script>
        //Silme işlemi için
        $('.sil').click(function () {
            //Sweet Alert ile silme işlemi
            Swal.fire({
                title: 'Emin misiniz?',
                text: "Bu işlemi geri alamayacaksınız!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Sil',
                cancelButtonText: 'İptal'
            }).then((result) => {
                if (result.isConfirmed) {
                    //Silme işlemi
                    let id = $(this).closest('tr').find('td:first').text();
                    let tr = $(this).closest('tr');
                    $.ajax({
                        //type Update olduğu için put
                        type: "PUT",
                        url: "/guncelleme-delete/" + id,
                        data: {
                            "_token": "<?php echo e(csrf_token()); ?>",
                            "id": id
                        },
                        success: function (response) {
                            tr.remove();
                        }
                    });
                    Swal.fire(
                        'Silindi!',
                        'Silme işlemi başarıyla gerçekleşti.',
                        'success'
                    )
                }
            });
        });
        $('.guncelle').click(
            //id yi alıp guncelemeguncelle sayfasına yönlendirme
            function () {
                let id = $(this).closest('tr').find('td:first').text();
                window.location.href = "/guncelleme-guncelle/" + id;
            }
        );
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/shiningm/ahisocitify.shiningmoony.com.tr/resources/views/pages/guncelleme/guncelleme.blade.php ENDPATH**/ ?>