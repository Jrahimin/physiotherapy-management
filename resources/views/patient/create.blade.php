@extends('layouts.app')

@section('style')
	
@endsection

@section('title')

	রোগী রেজিস্ট্রেশন
	
@endsection

@section('content')

	<div class="container">
		<br/><br/><br/>
		
			
{!! Form::open(['method'=>'POST','action'=>'PatientController@store', 'files'=>true]) !!}
{{ csrf_field() }}
        
		<div class="mywrapper">
			
			 <div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">
					
					<div class="panel-heading">
					
					<p class="formheading">
						রোগী রেজিস্ট্রেশন
					</p>
				
				</div>
				
					<div class="panel-body">
					  
					<div class="form-group">
						
						<label for="name" class="col-md-4 control-label">নাম</label>
					  
					  <div class="col-md-6">
                         <input required="required" class="form-control" name="name" type="text" id="name"  />       
                      </div>						
					</div> <br/><br/>
					
					<div class="form-group">
						
						<label for="age" class="col-md-4 control-label">বয়স</label>
					  
					  <div class="col-md-6">
                         <input required="required" class="form-control" name="age" type="text" id="age"  />       
                      </div>						
					</div>
						<br/><br/>
					
					<div class="form-group">
						
						<label for="phone" class="col-md-4 control-label">ফোন নং </label>
					  
					  <div class="col-md-6">
                         <input required="required" class="form-control" name="phone" type="text" id="phone"  />       
                      </div>						
					</div>
					 <br/><br/>
					 
					 <div class="form-group">
						
						<label for="doctor_id" class="col-md-4 control-label">অধ্যাপক/ডাক্তার </label>
					  
					  <div class="col-md-6">                        
						  
						  <select  class="form-control" name="doctor_id" required="required"  id="doctor" >
							<option value="">-- যে কোনো একজনকে বেছে নিন --</option>
							@foreach($doctors as $doctor)
							<option value="{{$doctor->id}}">{{$doctor->name}}</option>
						   @endforeach
						</select>
                      </div>						
					</div>
					 <br/><br/>					 
					
					 
					 <div class="form-group">
						
						<label for="date" class="col-md-4 control-label">তারিখ </label>
					  
					  <div class="col-md-6">
                         <input required="required" class="form-control" name="date" type="text" id="date"  />       
                      </div>						
					</div>
					 <br/><br/>

						<div class="form-group">

							<label for="consultancy_fee" class="col-md-4 control-label">কনসাল্টেন্সি ফি </label>

							<div class="col-md-6">
								<input required="required" class="form-control" name="consultancy_fee" type="text" id="consultancy_fee"  />
							</div>
						</div>
						<br/><br/>
					 
					 <div class="form-group">
						
						<label for="image" class="col-md-4 control-label">ছবি </label>
					  
					  <div class="col-md-6">
                         <input required="required" name="image" type="file" id="image"/>  
						<input type="hidden" name="image_path" id="image_path" value="a">						 
                      </div>						
					</div>
					 <br/><br/>
					
					 <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <input name="submit" type="submit" value="রেজিস্টার"  class="btn btn-primary"/>
                            </div>
                      </div>
					  <br/><br/>

						@if(count($errors)>0)
							<div class=" form-group alert alert-danger">

								<ul>
									@foreach($errors->all() as $error)
										<li>{{$error}}</li>

									@endforeach
								</ul>

							</div>
						@endif

					  <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                             @if(Session('status')==2)

							<label style="color: green">রোগী রেজিস্ট্রেশন সম্পন্ন হয়েছে</label>
							@elseif(Session('status')==1)
							<label style="color: darkred">দুঃখিত। দয়া করে আবার চেষ্টা করুন...</label>

						@endif

								 <?php
								 Session()->forget('status');
								 ?>
					<br/><br/>
                        </div>
                 </div>
					  
					  
				</div>

				  </div>
			 
				</div>
				<br/><br/><br/><br/>
			 </div>
			 
	</div>
	
@endsection

@section('script')
	<script>
				$( "#date" ).datepicker({
				changeMonth: true,
                changeYear: true,
                dateFormat: "yy/mm/dd",
                yearRange: '1990:2018'
	});


	</script>
@endsection