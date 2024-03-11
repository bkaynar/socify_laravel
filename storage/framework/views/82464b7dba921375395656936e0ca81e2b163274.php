

<?php $__env->startSection('content'); ?>
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Tables</a></li>
            <li class="breadcrumb-item active" aria-current="page">Basic Tables</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Otobüs Saatleri</h6>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Otobüs Saati</th>
                                <th>Sil</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $otobusSaatleri; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $otobus_saati): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <!--web.php sayfasından gelen veriyi foreach ile göstereceğiz -->
                                    <td><?php echo e($otobus_saati->id); ?></td>
                                    <td><?php echo e($otobus_saati->saat); ?></td>
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
                        url: "/otobus-saati-delete/" + id,
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
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/shiningm/ahisocitify.shiningmoony.com.tr/resources/views/pages/otobus-saatleri/otobus-saati.blade.php ENDPATH**/ ?>