
<?php $__env->startSection('title', 'Profile - Purchasing App'); ?>

<?php $__env->startSection('contents'); ?>
  <div class="page-wrapper">
    <?php if(session('status')): ?>
    <div id="alert" class="alert alert-success">
      <?php echo e(session('status')); ?>

    </div>
    <?php endif; ?>
    <div class="page-breadcrumb">
      <div class="row">
          <div class="col-7 align-self-center">
              <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Profile</h4>
              <div class="d-flex align-items-center">
                  <nav aria-label="breadcrumb">
                      <ol class="breadcrumb m-0 p-0">
                          <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>" class="text-muted">Home</a></li>
                          <li class="breadcrumb-item text-muted active" aria-current="page">Profile</li>
                      </ol>
                  </nav>
              </div>
          </div>
      </div>
    </div>
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-lg-6 col-md-12">
            <div class="card">
                <div class="card-body">
                  <div class="text-center">
                    <img src="<?php echo e($user->photo ? Storage::disk('public')->url($user->photo) : asset('images/users/profile-pic.jpg')); ?>" alt="user" class="rounded-circle"
                    width="150">
                  <h4 class="page-title text-truncate text-dark font-weight-medium mt-3"><?php echo e($user->name); ?></h4>
                    <p><?php echo e($user->email); ?></p>
                    <p><?php echo e($user->phone); ?></p>
                    <p><?php echo e($user->address); ?></p>
                  </div>
                  <hr>
                  <h6 class="font-weight-bold">Bio:</h6>
                <p><?php echo e($user->bio); ?></p>
                </div>
              </div>
              <div class="col-4">
                <button class="btn btn-primary btn-rounded" type="button" data-toggle="collapse" data-target="#form-profile" aria-expanded="false" aria-controls="form-profile">
                  Update Profile
                </button>
              </div>
          </div>
          <div class="col-lg-6 col-md-12">
            <div class="card">
              <div class="card-body collapse" id="form-profile">
                <form method="POST" enctype="multipart/form-data"
                action="<?php echo e(route('profile.update', $user['id'])); ?>">
                <?php echo method_field('PUT'); ?>
                <?php echo csrf_field(); ?>
                <div class="row">
                  <div class="col-md-12">
                    <div class="mb-3">
                      <small>* is required</small>
                    </div>
                    <div class="row">
                      <div class="col-12">
                        <div class="form-group">
                          <label for="name">Name *</label>
                          <input type="text" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="name"
                            name="name" value="<?php echo e(isset($user) ? $user['name'] : old('name')); ?>"
                            autocomplete="off">
                          <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                          <div class="invalid-feedback">
                            <?php echo e($message); ?>

                          </div>
                          <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                      </div>
                      <div class="col-12">
                        <div class="form-group">
                          <label for="email">Email</label>
                          <input type="text" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="email"
                            name="email" value="<?php echo e(isset($user) ? $user['email'] : old('email')); ?>"
                            autocomplete="off" readonly>
                          <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                          <div class="invalid-feedback">
                            <?php echo e($message); ?>

                          </div>
                          <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="phone">Phone</label>
                      <input type="number" class="form-control <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="phone"
                        name="phone" value="<?php echo e(isset($user) ? $user['phone'] : old('phone')); ?>"
                        autocomplete="off">
                      <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                      <div class="invalid-feedback">
                        <?php echo e($message); ?>

                      </div>
                      <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="form-group">
                      <label for="address">Address</label>
                      <textarea class="form-control" id="address" name="address"><?php echo e(isset($user) ? $user['address'] : old('address')); ?></textarea>
                    </div>
                    <div class="form-group">
                      <label for="bio">Bio</label>
                      <textarea class="form-control" id="bio" name="bio" rows="3"><?php echo e(isset($user) ? $user['bio'] : old('bio')); ?></textarea>
                    </div>
                    <div class="form-group d-flex flex-column">
                      <label>Photo</label>
                      <input type="file" name="photo" accept=".png, .jpg, .jpeg"/>
                      </div>
                      <?php $__errorArgs = ['photo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                      <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="password">New Password</label>
                    <input type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="password"
                      name="password" value="<?php echo e(old('password')); ?>"
                      autocomplete="off">
                    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="invalid-feedback">
                      <?php echo e($message); ?>

                    </div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                  </div>
                  <div class="form-group">
                    <label for="password_confirmation">Confirm password_confirmation</label>
                    <input type="password" class="form-control <?php $__errorArgs = ['password_confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="password_confirmation"
                      name="password_confirmation" value="<?php echo e(old('password_confirmation')); ?>"
                      autocomplete="off">
                    <?php $__errorArgs = ['password_confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="invalid-feedback">
                      <?php echo e($message); ?>

                    </div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                  </div>
                  <hr>
                  <div>
                    <button type="submit" class="btn btn-primary btn-rounded">Save</button>
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

<?php $__env->startSection('scripts'); ?>
<script type="text/javascript">
  $(function() {
    let alert = $('#alert').length;
        if (alert > 0) {
            setTimeout(() => {
                $('#alert').remove();
            }, 3000);
        }
  });
</script>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.template.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\application\TenApp\resources\views/profile/index.blade.php ENDPATH**/ ?>