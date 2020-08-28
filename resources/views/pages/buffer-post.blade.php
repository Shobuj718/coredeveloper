@extends('layouts.app')
@section('content')

<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
<div class="container-fluid app-body settings-page">
	<h3>Buffer posts</h3>
	<div class="container">
	<form method="post" action="{{ route('buffer.post.search') }}">
		{{ csrf_field() }}
		<div class="raw">
			<div class="col-md-3">
				<input class="form-control" type="text" name="search_name" id="search_name" placeholder="Search" aria-label="Search">
			</div>
			<div class="col-md-3">
				<input class="date form-control" type="text" name="search_date" id="search_date">
			</div>
			<div class="col-md-3">
				<select class="browser-default custom-select" name="search_group" id="search_group">
				
				<!-- for short time i can't get below this value -->
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
            @foreach($buffer_data as $data)
            <tr>
               <td>{{ $data->groupInfo->name }}</td>
               <td>{{ $data->groupInfo->type }}</td>
               <td>
				<img src="{{ $data->accountInfo->avatar }}" alt="Avatar" style="width:70px;border-radius: 50%;">
               </td>
               <td>{{ $data->post_text }}</td>
               <td>{{ $data->created_at->format('Y-m-d') }}</td>
            </tr>
            @endforeach
         </tbody>
      </table>
      {{ $buffer_data->links() }}
   </div>

  
<script type="text/javascript">
    $('.date').datepicker({  
       format: 'mm-dd-yyyy'
     });  
</script> 

  
@endsection