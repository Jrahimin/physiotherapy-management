@extends('layouts.app')

@section('style')
	
@endsection

@section('title')

	ডাক্তার রেজিস্ট্রেশন
	
@endsection

@section('content')

	<div class="container">
		<br/><br/><br/>
		
			
{!! Form::open(['method'=>'POST','action'=>'DoctorController@store']) !!}
{{ csrf_field() }}
        
		<div class="mywrapper">
			
			 <div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">
					
					<div class="panel-heading">
					
					<p class="formheading">
						ডাক্তার রেজিস্ট্রেশন
					</p>
				
				</div>
				
					<div class="panel-body">
					  
					<div class="form-group">
						
						<label for="name" class="col-md-4 control-label">নাম</label>
					  
					  <div class="col-md-6">
                         <input required="required" class="form-control" name="name" type="text" id="name"  />       
                      </div>
					  <br/><br/>
					  
					  <label for="designation" class="col-md-4 control-label">পদবী</label>
					  
					  <div class="col-md-6">
						<input required="required" class="form-control" name="designation" type="text" id="designation"  />
                      </div>
						
					</div>
					
					<br/><br/>
					
					 <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <input name="submit" type="submit" value="রেজিস্টার"  class="btn btn-primary"/>
                            </div>
                      </div>
					  <br/><br/>
					  
					  <div class="form-group">
						  <div class="col-md-6 col-md-offset-4">
							  @if(Session('status')==2)

								<label style="color: green">ডাক্তার রেজিস্ট্রেশন সম্পন্ন হয়েছে</label>
							  @elseif(Session('status')==1)
								<label style="color: darkred">দুঃখিত। দয়া কেরে আবার চেষ্টা করুন...</label>
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
				<br/><br/><br/>	
			 </div>
			 
	</div>
	
@endsection




