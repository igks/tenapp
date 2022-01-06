
<?php $__env->startSection('title', 'Player'); ?>

<?php $__env->startSection('contents'); ?>
<div class="page-wrapper">
  <div class="page-breadcrumb">
    <div class="row">
        <div class="col-7 align-self-center">
          <h4 class="page-title text-truncate text-dark font-weight-medium mb-1"><?php echo e(isset($atlet) ? 'Edit Existing' : 'Add New'); ?> Player</h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0 p-0">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>" class="text-muted">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo e(route('atlets.index')); ?>" class="text-muted">Player</a></li>
                        <li class="breadcrumb-item text-muted active" aria-current="page"><?php echo e(isset($atlet) ? 'Edit' : 'Add'); ?> Player</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
  </div>
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <form method="POST" enctype="multipart/form-data"
            action="<?php echo e(isset($atlet) ? route('atlets.update', $atlet['id']) : route('atlets.store')); ?>">
            <?php echo csrf_field(); ?>
            <?php if(isset($atlet)): ?>
            <?php echo method_field('PUT'); ?>
            <?php endif; ?>
            <div class="row">
              <div class="col-md-12">
                <div class="mb-3">
                  <small>* is required</small>
                </div>

                <div class="form-group">
                  <label for="nama">Nama *</label>
                  <input type="text" class="form-control <?php $__errorArgs = ['nama'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="nama"
                   name="nama" value="<?php echo e(isset($atlet) ? $atlet['nama'] : old('nama')); ?>"
                    autocomplete="off">
                  <?php $__errorArgs = ['nama'];
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
                  <label for="tanggal_lahir">Tanggal Lahir *</label>
                  <input type="date" class="form-control <?php $__errorArgs = ['tanggal_lahir'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="tanggal_lahir"
                    name="tanggal_lahir" value="<?php echo e(isset($atlet) ? $atlet['tanggal_lahir'] : old('tanggal_lahir')); ?>"
                    autocomplete="off">
                  <?php $__errorArgs = ['tanggal_lahir'];
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
                  <label for="tempat_lahir">Tempat Lahir *</label>
                  <input type="text" class="form-control <?php $__errorArgs = ['tempat_lahir'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="tempat_lahir"
                   name="tempat_lahir" value="<?php echo e(isset($atlet) ? $atlet['tempat_lahir'] : old('tempat_lahir')); ?>"
                    autocomplete="off">
                  <?php $__errorArgs = ['tempat_lahir'];
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
                  <label for="kelamin">Jenis Kelamin *</label>
                  <select id="kelamin" name="jenis_kelamin" class="form-control select2"></select>
                  <?php $__errorArgs = ['jenis_kelamin'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                  <div class="invalid-feedback d-inline-block">
                    <?php echo e($message); ?>

                  </div>
                  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="form-group">
                  <label for="agama">Agama *</label>
                  <select id="agama" name="agama" class="form-control select2"></select>
                  <?php $__errorArgs = ['agama'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                  <div class="invalid-feedback d-inline-block">
                    <?php echo e($message); ?>

                  </div>
                  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="form-group">
                  <label for="status">Status *</label>
                  <select id="status" name="status" class="form-control select2"></select>
                  <?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                  <div class="invalid-feedback d-inline-block">
                    <?php echo e($message); ?>

                  </div>
                  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="form-group">
                  <label for="nik">NIK *</label>
                  <input type="number" class="form-control <?php $__errorArgs = ['nik'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="nik"
                    name="nik" value="<?php echo e(isset($atlet) ? $atlet['nik'] : old('nik')); ?>"
                    autocomplete="off">
                  <?php $__errorArgs = ['nik'];
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
                  <label for="alamat">Alamat Lengkap *</label>
                  <textarea class="form-control <?php $__errorArgs = ['alamat'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="alamat" name="alamat" rows="3"><?php echo e(isset($atlet) ? $atlet['alamat'] : old('alamat')); ?></textarea>
                  <?php $__errorArgs = ['alamat'];
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
                  <label for="kode_pos">Kode Pos *</label>
                  <input type="number" class="form-control <?php $__errorArgs = ['kode_pos'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="kode_pos"
                    name="kode_pos" value="<?php echo e(isset($atlet) ? $atlet['kode_pos'] : old('kode_pos')); ?>"
                    autocomplete="off">
                  <?php $__errorArgs = ['kode_pos'];
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
                  <label for="nama_sekolah">Nama Sekolah *</label>
                  <input type="text" class="form-control <?php $__errorArgs = ['nama_sekolah'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="nama_sekolah"
                   name="nama_sekolah" value="<?php echo e(isset($atlet) ? $atlet['nama_sekolah'] : old('nama_sekolah')); ?>"
                    autocomplete="off">
                  <?php $__errorArgs = ['nama_sekolah'];
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
                  <label for="club_id">Club *</label>
                  <select id="club_id" name="club_id" class="form-control select2"></select>
                  <?php $__errorArgs = ['club_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                  <div class="invalid-feedback d-inline-block">
                    <?php echo e($message); ?>

                  </div>
                  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="form-group">
                  <label for="tinggi">Tinggi Badan (Cm)*</label>
                  <input type="number" class="form-control <?php $__errorArgs = ['tinggi'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="tinggi"
                    name="tinggi" value="<?php echo e(isset($atlet) ? $atlet['tinggi'] : old('tinggi')); ?>"
                    autocomplete="off">
                  <?php $__errorArgs = ['tinggi'];
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
                  <label for="berat">Berat Badan (Kg)*</label>
                  <input type="number" class="form-control <?php $__errorArgs = ['berat'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="berat"
                    name="berat" value="<?php echo e(isset($atlet) ? $atlet['berat'] : old('berat')); ?>"
                    autocomplete="off">
                  <?php $__errorArgs = ['berat'];
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
                  <label for="telepon">Telepon/HP *</label>
                  <input type="number" class="form-control <?php $__errorArgs = ['telepon'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="telepon"
                    name="telepon" value="<?php echo e(isset($atlet) ? $atlet['telepon'] : old('telepon')); ?>"
                    autocomplete="off">
                  <?php $__errorArgs = ['telepon'];
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
                  <label for="nama_ayah">Nama Ayah</label>
                  <input type="text" class="form-control <?php $__errorArgs = ['nama_ayah'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="nama_ayah"
                   name="nama_ayah" value="<?php echo e(isset($atlet) ? $atlet['nama_ayah'] : old('nama_ayah')); ?>"
                    autocomplete="off">
                  <?php $__errorArgs = ['nama_ayah'];
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
                  <label for="nama_ibu">Nama Ibu</label>
                  <input type="text" class="form-control <?php $__errorArgs = ['nama_ibu'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="nama_ibu"
                   name="nama_ibu" value="<?php echo e(isset($atlet) ? $atlet['nama_ibu'] : old('nama_ibu')); ?>"
                    autocomplete="off">
                  <?php $__errorArgs = ['nama_ibu'];
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
                  <label for="telepon_wali">Telepon/HP Wali</label>
                  <input type="number" class="form-control <?php $__errorArgs = ['telepon_wali'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="telepon_wali"
                    name="telepon_wali" value="<?php echo e(isset($atlet) ? $atlet['telepon_wali'] : old('telepon_wali')); ?>"
                    autocomplete="off">
                  <?php $__errorArgs = ['telepon_wali'];
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
                  <label for="nama_kejuaraan">Nama Kejuaraan *</label>
                  <input type="text" class="form-control <?php $__errorArgs = ['nama_kejuaraan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="nama_kejuaraan"
                   name="nama_kejuaraan" value="<?php echo e(isset($atlet) ? $atlet['nama_kejuaraan'] : old('nama_kejuaraan')); ?>"
                    autocomplete="off">
                  <?php $__errorArgs = ['nama_kejuaraan'];
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
                  <label for="tahun_kejuaraan">Tahun Kejuaraan *</label>
                  <input type="number" class="form-control <?php $__errorArgs = ['tahun_kejuaraan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="tahun_kejuaraan"
                    name="tahun_kejuaraan" value="<?php echo e(isset($atlet) ? $atlet['tahun_kejuaraan'] : old('tahun_kejuaraan')); ?>"
                    autocomplete="off">
                  <?php $__errorArgs = ['tahun_kejuaraan'];
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
                  <label for="tingkat_kejuaraan">Tingkat Kejuaraan *</label>
                  <select id="tingkat_kejuaraan" name="tingkat_kejuaraan" class="form-control select2"></select>
                  <?php $__errorArgs = ['tingkat_kejuaraan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                  <div class="invalid-feedback d-inline-block">
                    <?php echo e($message); ?>

                  </div>
                  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="form-group">
                  <label for="tempat_kejuaraan">Tempat Kejuaraan *</label>
                  <input type="text" class="form-control <?php $__errorArgs = ['tempat_kejuaraan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="tempat_kejuaraan"
                   name="tempat_kejuaraan" value="<?php echo e(isset($atlet) ? $atlet['tempat_kejuaraan'] : old('tempat_kejuaraan')); ?>"
                    autocomplete="off">
                  <?php $__errorArgs = ['tempat_kejuaraan'];
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
                  <label for="sertifikat">Sertifikat</label>
                  <input type="text" class="form-control <?php $__errorArgs = ['sertifikat'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="sertifikat"
                   name="sertifikat" value="<?php echo e(isset($atlet) ? $atlet['sertifikat'] : old('sertifikat')); ?>"
                    autocomplete="off">
                  <?php $__errorArgs = ['sertifikat'];
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
              <hr>
              <div>
                <a href="<?php echo e(route('atlets.index')); ?>" type="button" class="btn btn-secondary btn-rounded mr-2">Back</a>
                <button type="submit" class="btn btn-primary btn-rounded">Submit</button>
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
  <script type="text/javascript">
    $(function(){
      $('#club_id').select2({
        placeholder: "Search club...",
        minimumInputLength: 2,
        ajax: {
          url: "<?php echo e(route('club-select')); ?>",
          dataType: 'json',
          delay: 250,
          data: function(params){
            return {
              q: $.trim(params.term)
            }
          },
          processResults: function (data) {
              return {
                  results: data
              };
          },
          cache: true
        }
      });
      const jenisKelamin = [{'id':'Laki - laki', 'text':'Laki - Laki'},{'id':'Perempuan', 'text':'Perempuan'}];
      $('#kelamin').select2({
        data:jenisKelamin
      });

      const agama = [{'id':'Islam', 'text':'Islam'},{'id':'Katolik', 'text':'Katolik'},{'id':'Protestan', 'text':'Protestan'},{'id':'Hindu', 'text':'Hindu'},{'id':'Buddha', 'text':'Buddha'},{'id':'Khonghucu', 'text':'Khonghucu'}];
      $('#agama').select2({
        data:agama
      });

      const status = [{'id':'Pelajar', 'text':'Pelajar'},{'id':'Mahasiswa', 'text':'Mahasiswa'}];
      $('#status').select2({
        data:status
      });

      const tingkat_kejuaraan = [{'id':'Daerah', 'text':'Daerah'},{'id':'Nasional', 'text':'Nasional'}];
      $('#tingkat_kejuaraan').select2({
        data:tingkat_kejuaraan
      });

      <?php if(isset($atlet)): ?>
        <?php
          $club = \App\Models\Club::find($atlet->club_id);
        ?>
        let club = {
            id: '<?php echo e($club->id); ?>',
            text: '<?php echo e($club->name); ?>'
        };
        let clubOption = new Option(club.text, club.id, false, false);
        $('#club_id').append(clubOption).trigger('change');
    
        $("#kelamin").val('<?php echo e($atlet->jenis_kelamin); ?>').trigger('change');
        $("#agama").val('<?php echo e($atlet->agama); ?>').trigger('change');
        $("#status").val('<?php echo e($atlet->status); ?>').trigger('change');
        $("#tingkat_kejuaraan").val('<?php echo e($atlet->tingkat_kejuaraan); ?>').trigger('change');

      <?php endif; ?>

      <?php if(old('club_id')): ?>
        <?php 
        $club = \App\Models\Club::find(old('club_id'));
        ?>
        let club = {
            id: '<?php echo e($club->id); ?>',
            text: '<?php echo e($club->name); ?>'
        };
        let clubOption = new Option(club.text, club.id, false, false);
        $('#club_id').append(clubOption).trigger('change');
      <?php endif; ?>

      <?php if(old('jenis_kelamin')): ?>
        $("#kelamin").val('jenis_kelamin').trigger('change');
      <?php endif; ?>
      <?php if(old('agama')): ?>
        $("#agama").val('agama').trigger('change');
      <?php endif; ?>
      <?php if(old('status')): ?>
        $("#status").val('status').trigger('change');
      <?php endif; ?>
      <?php if(old('tingkat_kejuaraan')): ?>
        $("#tingkat_kejuaraan").val('tingkat_kejuaraan').trigger('change');
      <?php endif; ?>
      
  })
  </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.template.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\application\TenApp\resources\views/atlet/form.blade.php ENDPATH**/ ?>