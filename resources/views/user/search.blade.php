@extends('layouts.app')

@section('style')

	*{font-family:bangla;}
	#therapyDiv, #doctorDiv, #patientIdDiv, #dateDiv ,#prescriptionDiv ,#phoneDiv {display:none;}

@endsection

@section('title')

	ইউজার খোঁজ করুন
	
@endsection

@section('content')


		<div class="container">
				<br/><br/><br/>
		
{!! Form::open(['method'=>'POST','action'=>'UserController@searchResult']) !!}
{{ csrf_field() }}
        
		<div class="mywrapper">
			
			 <div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">
					
					<div class="panel-heading">
					
					<p class="formheading">
						ইউজার খোঁজ করুন
					</p>
				
				</div>
				
					<div class="panel-body">
					  
					<div class="form-group">
						
						<label for="name" class="col-md-4 control-label">ইউজারের ধরণ</label>
					  
					  <div class="col-md-6">
					  
						<select name="type_id">
								<option value=" ">বাছাই করুন </option>
								@foreach($types as $type)								
									<?php
									
										switch ($type->name) {											
										case "Admin":
											echo "<option value=\"$type->id\">এডমিন</option>";
											break;
										case "User":
											echo "<option value=\"$type->id\">ইউজার</option>";
											break;
										}
									?>
										
								@endforeach
						</select>
					
                      </div>
					  
					</div> <br/><br/>
					 
					
					 <br/><br/>					 
					 
						<div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <input name="submit" type="submit" value="খোঁজ করুন"  class="btn btn-primary"/>
                            </div>
						</div>
					  <br/><br/>				 
					  
					  
				</div>

				  </div>
			 
				</div>
				<br/><br/><br/><br/>
			 </div>
			 
	</div>

@endsection