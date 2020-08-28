<?php $__env->startSection('content'); ?>

<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
<div class="container-fluid app-body settings-page">
	<h3>Buffer posts</h3>
	<div class="container">
	<form method="post" action="<?php echo e(route('buffer.post.search')); ?>">
		<?php echo e(csrf_field()); ?>

		<div class="raw">
			<div class="col-md-3">
				<input class="form-control" type="text" name="search_name" id="search_name" placeholder="Search" aria-label="Search">
			</div>
			<div class="col-md-3">
				<input class="date form-control" type="text" name="search_date" id="search_date">
			</div>
			<div class="col-md-3">
				<select class="browser-default custom-select" name="search_group" id="search_group">
				  <option value="306">All group</option>
				  <option value="2">Content Upload</option>
				  <option value="3">Content Curation</option>
				  <option value="3">Rss Automation</option>
				</select>
			</div>
			<div class="col-md-3">
				<input type="submit" name="submit" value="Search">
			</div>
		</div>

	</form>


      <table class="table table-striped">
         <thead>
         <tr>
            <th>Group name</th>
            <th>Group Type</th>
            <th>Account Name</th>
            <th>Post Text</th>
            <th>Time</th>
         </tr>
         </thead>
         <tbody>
            <?php $__currentLoopData = $buffer_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
               <td><?php echo e($data->groupInfo->name); ?></td>
               <td><?php echo e($data->groupInfo->type); ?></td>
               <td>
				<img src="<?php echo e($data->accountInfo->avatar); ?>" alt="Avatar" style="width:70px;border-radius: 50%;">
               </td>
               <td><?php echo e($data->post_text); ?></td>
               <td><?php echo e($data->created_at->format('Y-m-d')); ?></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
         </tbody>
      </table>
      <?php echo e($buffer_data->links()); ?>

   </div>

  
<script type="text/javascript">
    $('.date').datepicker({  
       format: 'mm-dd-yyyy'
     });  
</script> 

  
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>