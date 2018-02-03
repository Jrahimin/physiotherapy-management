@extends('layouts.app')

@section('style')

@endsection

@section('title')
	রোগীকে প্রদানকৃত থেরাপি
@endsection

@section('content')

	<div class="container">
		<br/><br/><br/>

{!! Form::open(['method'=>'POST','action'=>'PatientController@assignTherapyStore']) !!}
{{ csrf_field() }}

		<div class="mywrapper">

			 <div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">

					<div class="panel-heading">

					<p class="formheading">
						রোগীকে প্রদানকৃত থেরাপি
					</p>

				</div>

					<div class="panel-body">

						<div class="form-group">

							<label for="patient_id" class="col-md-4 control-label">থেরাপি প্রদানকারীর নাম</label>

							<div class="col-md-6">
								<select name="user_id" id="user_id">
									<option value=""> --বাছাই করুন-- </option>
									@foreach($users as $user)
										<option value="{{$user->id}}">আইডি : {{$user->id}}, {{$user->name}}</option>
									@endforeach
								</select>
							</div>
						</div> <br/><br/>

					<div class="form-group">

						<label for="patient_id" class="col-md-4 control-label">রোগী</label>

					  <div class="col-md-6">
							<select name="patient_id" id="patient_id">
									<option value=""> --বাছাই করুন-- </option>
											@foreach($patients as $patient)
											<option value="{{$patient->id}}">{{$patient->id}}: {{$patient->name}}</option>
											@endforeach
							</select>
                      </div>
					</div> <br/><br/>

					<div class="form-group">

						<label for="therapy_id" class="col-md-4 control-label">থেরাপির নাম</label>

					  <div class="col-md-6" id="therapyDiv">
							<p style="font-weight: bold"></p>
                      </div>
					</div> <br/><br/>

						<div class="form-group">

							<label for="time" class="col-md-4 control-label">সময়</label>

							<div class="col-md-6">
								<input required="required" class="form-control" name="time" type="text" id="time"  />
							</div>
						</div>
						<br/><br/>

						<div class="form-group">

							<label for="amount" class="col-md-4 control-label">টাকার পরিমাণ </label>

							<div class="col-md-6">
								<input required="required" class="form-control" name="amount" type="text" id="amount"  />
							</div>
						</div>
						<br/><br/>

						<div class="form-group">

							<label for="paid" class="col-md-4 control-label">পরিশোধ করা টাকা </label>

							<div class="col-md-6">
								<input required="required" class="form-control" name="paid" type="text" id="paid"  />
							</div>
						</div>
						<br/><br/>

						<div class="form-group">
							<label class="col-md-4 control-label" for="dueOrAdvance"></label>
						</div>
						<br/><br/>

						<input type="hidden" id="date" name="date" value="{{\Carbon\Carbon::now('asia/dacca')->toDateString()}}">

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
										<label style="color: green">রোগীর থেরাপি রেজিস্ট্রেশন সম্পন্ন হয়েছে</label>
									@elseif(Session('status')==1)
										<label style="color: darkred">দুঃখিত! দয়া করে আবার চেষ্টা করুন...</label>
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
		$(document).ready(function() {
			$('#user_id').select2();
			$('#patient_id').select2();
			$('#therapy_id').select2();
		});

				$( "#date" ).datepicker({
				changeMonth: true,
                changeYear: true,
                dateFormat: "yy/mm/dd",
                yearRange: '1990:2018'
	});

		$('#patient_id').on('change',function (e) {
			var patient_id=e.target.value;
			var therapyContent='';
			var therapyIdContent = '';
			$('#therapyDiv p').empty();
			$.ajax({

				type: "GET",
				url : "{{url('ajax-prescription-therapy')}}",
				data : {'patient_id':patient_id},
				success : function(data){

					for(var i=0;i<data.therapies.length;i++)
					{
						var count = i+1;
						therapyContent+= count+") "+data.therapies[i].name+" "+data.therapies[i].pivot.therapy_amount+" times ";
						therapyIdContent+= '<input type="hidden" name='
					}

					$('#therapyDiv p').append(therapyContent);
					$('#amount').val(data.lastAmount);

					var text = "";
					if(data.totalDueOAdvance>0)
						text = "পূর্বের অগ্রিম ";
					else
						text = "পূর্বের বকেয়া ";
					
					$("label[for='dueOrAdvance']").text(text+" "+data.totalDueOAdvance+ " টাকা");
				},
			});
		});

	</script>
@endsection