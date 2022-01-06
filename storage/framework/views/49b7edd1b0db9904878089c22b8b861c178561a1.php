
<?php $__env->startSection('title', 'Matches'); ?>

<?php $__env->startSection('contents'); ?>
<div class="page-wrapper">
  <div class="page-breadcrumb">
    <div class="row">
        <div class="col-7 align-self-center">
          <h4 class="page-title text-truncate text-dark font-weight-medium mb-1"><?php echo e(isset($match) ? 'Edit Existing' : 'Add New'); ?> Match</h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0 p-0">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>" class="text-muted">Home</a></li>
                        <li class="breadcrumb-item text-muted active" aria-current="page"><?php echo e(isset($match) ? 'Edit' : 'Add'); ?> Match</li>
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
            action="<?php echo e(isset($match) ? route('home.update', $match['id']) : route('home.store')); ?>">
            <?php echo csrf_field(); ?>
            <?php if(isset($match)): ?>
            <?php echo method_field('PUT'); ?>
            <?php endif; ?>
            <div class="row">
              <div class="col-md-12">
                <div class="mb-3">
                  <small>* is required</small>
                </div>

                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                        <label for="date">Date *</label>
                        <input type="date" class="form-control <?php $__errorArgs = ['date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="date"
                            name="date" value="<?php echo e(isset($match) ? $match['date'] : old('date')); ?>"
                            autocomplete="off">
                        <?php $__errorArgs = ['date'];
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

                    <div class="col-6">
                        <div class="form-group">
                        <label for="time">Time *</label>
                        <input type="time" class="form-control <?php $__errorArgs = ['time'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="time"
                            name="time" value="<?php echo e(isset($match) ? $match['time'] : old('time')); ?>"
                            autocomplete="off">
                        <?php $__errorArgs = ['time'];
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

                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                        <label for="location">Location *</label>
                        <input type="text" class="form-control <?php $__errorArgs = ['location'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="location"
                            name="location" value="<?php echo e(isset($match) ? $match['location'] : old('location')); ?>"
                            autocomplete="off">
                        <?php $__errorArgs = ['location'];
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

                    <div class="col-6">
                        <div class="form-group">
                        <label for="table">Table *</label>
                        <input type="text" class="form-control <?php $__errorArgs = ['table'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="table"
                            name="table" value="<?php echo e(isset($match) ? $match['table'] : old('table')); ?>"
                            autocomplete="off">
                        <?php $__errorArgs = ['table'];
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

                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="player_a_1">Player A 1 *</label>
                            <select id="player_a_1" name="player_a_1" class="form-control select2"></select>
                            <?php $__errorArgs = ['player_a_1'];
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
                    </div>

                    <div class="col-6">
                        <div class="form-group">
                            <label for="player_a_2">Player A 2 </label>
                            <select id="player_a_2" name="player_a_2" class="form-control select2"></select>
                            <?php $__errorArgs = ['player_a_2'];
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
                    </div>

                </div>

                <div class="row">
                    <div class="col-6">
                            <div class="form-group">
                                <label for="player_b_1">Player B 1 *</label>
                                <select id="player_b_1" name="player_b_1" class="form-control select2"></select>
                                <?php $__errorArgs = ['player_b_1'];
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
                    </div>
                    
                    <div class="col-6">
                            <div class="form-group">
                                <label for="player_b_2">Player B 2</label>
                                <select id="player_b_2" name="player_b_2" class="form-control select2"></select>
                                <?php $__errorArgs = ['player_b_2'];
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
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                        <label for="score_a_1">Score Team A Set 1</label>
                        <input type="number" class="form-control <?php $__errorArgs = ['score_a_1'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="score_a_1"
                            name="score_a_1" value="<?php echo e(isset($match) ? $match['score_a_1'] : old('score_a_1')); ?>"
                            autocomplete="off">
                        <?php $__errorArgs = ['score_a_1'];
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

                    <div class="col-6">
                    <div class="form-group">
                        <label for="score_b_1">Score Team B Set 1</label>
                        <input type="number" class="form-control <?php $__errorArgs = ['score_b_1'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="score_b_1"
                            name="score_b_1" value="<?php echo e(isset($match) ? $match['score_b_1'] : old('score_b_1')); ?>"
                            autocomplete="off">
                        <?php $__errorArgs = ['score_b_1'];
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

                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                        <label for="score_a_2">Score Team A Set 2</label>
                        <input type="number" class="form-control <?php $__errorArgs = ['score_a_2'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="score_a_2"
                            name="score_a_2" value="<?php echo e(isset($match) ? $match['score_a_2'] : old('score_a_2')); ?>"
                            autocomplete="off">
                        <?php $__errorArgs = ['score_a_2'];
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

                    <div class="col-6">
                    <div class="form-group">
                        <label for="score_b_2">Score Team B Set 2</label>
                        <input type="number" class="form-control <?php $__errorArgs = ['score_b_2'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="score_b_2"
                            name="score_b_2" value="<?php echo e(isset($match) ? $match['score_b_2'] : old('score_b_2')); ?>"
                            autocomplete="off">
                        <?php $__errorArgs = ['score_b_2'];
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
                
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                        <label for="score_a_3">Score Team A Set 3</label>
                        <input type="number" class="form-control <?php $__errorArgs = ['score_a_3'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="score_a_3"
                            name="score_a_3" value="<?php echo e(isset($match) ? $match['score_a_3'] : old('score_a_3')); ?>"
                            autocomplete="off">
                        <?php $__errorArgs = ['score_a_3'];
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

                    <div class="col-6">
                    <div class="form-group">
                        <label for="score_b_3">Score Team B Set 3</label>
                        <input type="number" class="form-control <?php $__errorArgs = ['score_b_3'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="score_b_3"
                            name="score_b_3" value="<?php echo e(isset($match) ? $match['score_b_3'] : old('score_b_3')); ?>"
                            autocomplete="off">
                        <?php $__errorArgs = ['score_b_3'];
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

                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                        <label for="score_a_4">Score Team A Set 4</label>
                        <input type="number" class="form-control <?php $__errorArgs = ['score_a_4'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="score_a_4"
                            name="score_a_4" value="<?php echo e(isset($match) ? $match['score_a_4'] : old('score_a_4')); ?>"
                            autocomplete="off">
                        <?php $__errorArgs = ['score_a_4'];
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

                    <div class="col-6">
                    <div class="form-group">
                        <label for="score_b_4">Score Team B Set 4</label>
                        <input type="number" class="form-control <?php $__errorArgs = ['score_b_4'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="score_b_4"
                            name="score_b_4" value="<?php echo e(isset($match) ? $match['score_b_4'] : old('score_b_4')); ?>"
                            autocomplete="off">
                        <?php $__errorArgs = ['score_b_4'];
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
                
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                        <label for="score_a_5">Score Team A Set 5</label>
                        <input type="number" class="form-control <?php $__errorArgs = ['score_a_5'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="score_a_5"
                            name="score_a_5" value="<?php echo e(isset($match) ? $match['score_a_5'] : old('score_a_5')); ?>"
                            autocomplete="off">
                        <?php $__errorArgs = ['score_a_5'];
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

                    <div class="col-6">
                    <div class="form-group">
                        <label for="score_b_5">Score Team B Set 5</label>
                        <input type="number" class="form-control <?php $__errorArgs = ['score_b_5'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="score_b_5"
                            name="score_b_5" value="<?php echo e(isset($match) ? $match['score_b_5'] : old('score_b_5')); ?>"
                            autocomplete="off">
                        <?php $__errorArgs = ['score_b_5'];
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

              </div>
              <hr>
              <div>
                <a href="<?php echo e(route('home')); ?>"  class="btn btn-secondary btn-rounded mr-2">Back</a>
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
      $('#player_a_1').select2({
        placeholder: "Search club...",
        minimumInputLength: 2,
        ajax: {
          url: "<?php echo e(route('atlet-select')); ?>",
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

      $('#player_a_2').select2({
        placeholder: "Search club...",
        minimumInputLength: 2,
        ajax: {
          url: "<?php echo e(route('atlet-select')); ?>",
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

      $('#player_b_1').select2({
        placeholder: "Search club...",
        minimumInputLength: 2,
        ajax: {
          url: "<?php echo e(route('atlet-select')); ?>",
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

      $('#player_b_2').select2({
        placeholder: "Search club...",
        minimumInputLength: 2,
        ajax: {
          url: "<?php echo e(route('atlet-select')); ?>",
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

      <?php if(isset($match)): ?>
        <?php
          $match = \App\Models\Matches::find($match->id);
          $playerA1 = \App\Models\Atlet::find($match->player_a_1);
          $playerA2 = \App\Models\Atlet::find($match->player_a_2);
          $playerB1 = \App\Models\Atlet::find($match->player_b_1);
          $playerB2 = \App\Models\Atlet::find($match->player_b_2);
        ?>

        <?php if($playerA1 != null): ?>
            let playerA1 = {
                id: '<?php echo e($playerA1->id); ?>',
                name: '<?php echo e($playerA1->nama); ?>'
            };
            let playerA1Option = new Option(playerA1.name, playerA1.id, false, false);
            $('#player_a_1').append(playerA1Option).trigger('change');
        <?php endif; ?>

        <?php if($playerA2 != null): ?>
            let playerA2 = {
                id: '<?php echo e($playerA2->id); ?>',
                name: '<?php echo e($playerA2->nama); ?>'
            };
            let playerA2Option = new Option(playerA2.name, playerA2.id, false, false);
            $('#player_a_2').append(playerA2Option).trigger('change');
        <?php endif; ?>
        
        <?php if($playerB1 != null): ?>
            let playerB1 = {
                id: '<?php echo e($playerB1->id); ?>',
                name: '<?php echo e($playerB1->nama); ?>'
            };
            let playerB1Option = new Option(playerB1.name, playerB1.id, false, false);
            $('#player_b_1').append(playerB1Option).trigger('change');
        <?php endif; ?>

        <?php if($playerB2 != null): ?>
            let playerB2 = {
                id: '<?php echo e($playerB2->id); ?>',
                name: '<?php echo e($playerB2->nama); ?>'
            };
            let playerB2Option = new Option(playerB2.name, playerB2.id, false, false);
            $('#player_b_2').append(playerB2Option).trigger('change');
       <?php endif; ?>
    <?php endif; ?>
    });
  </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.template.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\application\TenApp\resources\views/form.blade.php ENDPATH**/ ?>