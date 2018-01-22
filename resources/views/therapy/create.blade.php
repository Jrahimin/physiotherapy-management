@extends('layouts.app')

@section('style')
	
@endsection

@section('title')

	থেরাপি রেজিস্ট্রেশন
	
@endsection

@section('content')

	<div class="container">
		<br/><br/><br/>
		
{!! Form::open(['method'=>'POST','action'=>'DiseaseController@store']) !!}
{{ csrf_field() }}
        
		<div class="mywrapper">

			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">

					<div class="panel-heading">

						<p class="formheading">
							রোগ এন্ট্রি
						</p>

					</div>

					<div class="panel-body">

						<div class="form-group">
							<label for="diseaseType" class="col-md-4 control-label">ধরন</label>

							<div class="col-md-6">
								<select name="diseaseType" id="diseaseType" required="required" onchange="showOthers(this.value)">
									<option value="">--বাছাই করুন--</option>
									<option value="1">Add Main Disease</option>
									<option value="2">Add Sub Disease</option>
								</select>
							</div>
						</div>

						<div  id="forSub" style="display: none;">

						<div class="form-group">
							<label for="parent_id" class="col-md-4 control-label">প্রধান রোগ</label>

							<div class="col-md-6">
								<select name="parent_id" id="parent_id">
									<option value="">--প্রধান রোগ নির্ধারন করুন--</option>

									@foreach($diseases as $disease)
										<option value="{{$disease->id}}">{{$disease->name}}</option>
									@endforeach
								</select>
							</div>
						</div>

							<div class="form-group">
								<label for="name1" class="col-md-4 control-label">উপরোগের নাম</label>

								<div class="col-md-6">
									<input class="form-control" name="nameSub" type="text" id="name1"  />
								</div>
							</div>

						</div>

						<div id="forMain" style="display: none;">
							<div class="form-group">
								<label for="name2" class="col-md-4 control-label">প্রধান রোগের নাম</label>

								<div class="col-md-6">
									<input class="form-control" name="nameMain" type="text" id="name2"  />
								</div>
							</div>
						</div>
						<br/><br/>

							<div class="form-group">
								<div class="col-md-6 col-md-offset-4">
									<button name="registerSub" type="submit" value="registerSub" class="btn btn-primary">রেজিস্টার</button>
								</div>
							</div>

					</div>
					</div>
					</div>
			</form>
						<br/><br/>

			{!! Form::open(['method'=>'POST','action'=>'TherapyController@store']) !!}
			{{ csrf_field() }}
			<div class="mywrapper">
			 <div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">
					
					<div class="panel-heading">
					
					<p class="formheading">
						থেরাপি রেজিস্ট্রেশন
					</p>
				
				</div>
				
					<div class="panel-body">
					  
					<div class="form-group">
						
						<label for="name" class="col-md-4 control-label">থেরাপির নাম</label>
					  
					  <div class="col-md-6">
                         <input required="required" class="form-control" name="name" type="text" id="name"  />
						 
                      </div>						
					</div> 
					 <br/><br/>
					
					 <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <input name="submit" type="submit" value="রেজিস্টার"  class="btn btn-primary"/>
                            </div>
                      </div>
						</form>
					  <br/><br/>
					  
					  <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                            @if(Session('status')==2)

								<label style="color: green">থেরাপি রেজিস্ট্রেশন সম্পন্ন হয়েছে</label>
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

	<script>
		function showOthers(type) {
			if(type==1)
			{
				$('#forMain').css("display", "block");
				$('#forSub').css("display", "none");
			}
			else if(type==2)
			{
				$('#forSub').css("display", "block");
				$('#forMain').css("display", "none");
			}
			else
			{
				$('#forMain').css("display", "none");
				$('#forSub').css("display", "none");
			}
		}
	</script>
	
@endsection

