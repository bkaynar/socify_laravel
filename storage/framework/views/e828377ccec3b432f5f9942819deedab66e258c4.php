

<?php $__env->startSection('content'); ?>
<div class="page-content d-flex align-items-center justify-content-center">

  <div class="row w-100 mx-0 auth-page">
    <div class="col-md-8 col-xl-6 mx-auto">
      <div class="card">
        <div class="row">
          <div class="col-md-4 pe-md-0">
            <div class="auth-side-wrapper" style="background-image: url(<?php echo e(url('https://via.placeholder.com/219x452')); ?>)">

            </div>
          </div>
          <div class="col-md-8 ps-md-0">
            <div class="auth-form-wrapper px-4 py-5">
              <a href="#" class="noble-ui-logo d-block mb-2">AHI<span>SOCITIFY</span></a>

              <form class="forms-sample" action="<?php echo e(route('login')); ?>" method="POST">
                  <?php echo csrf_field(); ?>
                <div class="mb-3">
                  <label for="userEmail" class="form-label">E-Posta Adresiniz</label>
                  <input name="email" type="email" class="form-control" id="userEmail" placeholder="E-Posta Adresiniz">
                </div>
                <div class="mb-3">
                  <label for="userPassword" class="form-label">Şifre</label>
                  <input name="password" type="password" class="form-control" id="userPassword" autocomplete="current-password" placeholder="Şifre">
                </div>
                <div>
                  <button type="submit" class="btn btn-primary me-2 mb-2 mb-md-0">Giriş Yap</button>
                </div>

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.master2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/burakkaynar/Desktop/project/socify/resources/views/pages/auth/login.blade.php ENDPATH**/ ?>