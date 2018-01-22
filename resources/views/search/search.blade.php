@extends('layouts.app')

@section('style')

	*{font-family:bangla;}
	#therapyDiv, #doctorDiv, #patientIdDiv, #dateDiv ,#prescriptionDiv ,#phoneDiv {display:none;}

@endsection

@section('title')

	খোঁজ
	
@endsection

@section('content')

	<div class="container">
		<br/><br/><br/>
		
{!! Form::open(['method'=>'POST','action'=>'SearchController@search_result']) !!}
{{ csrf_field() }}
        
		<div class="mywrapper">
			
			 <div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">
					
					<div class="panel-heading">
					
					<p class="formheading">
						খোঁজ করুন
					</p>
				
				</div>
				
					<div class="panel-body">
					  
					<div class="form-group">
						
						<label for="name" class="col-md-4 control-label">খোঁজ তালিকা</label>
					  
					  <div class="col-md-6">
                          <select name="search_type" id="search_type" required="required" onchange="showOthers(this.value)">
                            <option value="">--বাছাই করুন--</option>
                            <option value="1">থেরাপি তারিখ</option>
                            <option value="2">পেশেন্টের রেজি নং</option>
                            <option value="3">অধ্যাপক/ডাক্তার</option>
                            <option value="4">রেজিস্ট্রেশনের তারিখ</option>
							  <option value="5">প্রেসক্রিপশন</option>
							  <option value="6">মোবাইল/ফোন</option>
                        </select>
                      </div>						
					</div> <br/><br/>
					 
					 <div class="form-group searchinput" id="therapyDiv">
						
						<label for="therapyDate" class="col-md-4 control-label">থেরাপির তারিখ </label>
					  
					  <div class="col-md-6">
						<input name="therapyDate" id="therapyDate" type="text" />						 
                      </div>						
					</div>
					 <br/><br/>
					 
					  <div class="form-group searchinput" id="patientIdDiv" style="display:none;">
						
						<label for="therapyDate" class="col-md-4 control-label">রেজিস্ট্রেশন নং </label>
					  
					  <div class="col-md-6">
                          <select name="patientId" id="patientId">
                              <option value="">--বাছাই করুন--</option>
                              @foreach($patients as $patient)
                                  <option value="{{$patient->id}}">{{$patient->id}}</option>
                              @endforeach
                          </select>
                      </div>						
					</div>	
					
					 <br/><br/>
					 
					  <div class="form-group searchinput" id="doctorDiv">
						
						<label for="doctor_id" class="col-md-4 control-label">ডাক্তার/অধ্যাপক </label>
					  
					  <div class="col-md-6">
						<select name="doctor_id" id="doctor_id">
                            <option value="">--বাছাই করুন--</option>
								@foreach($doctors as $doctor)
                            <option value="{{$doctor->id}}"> {{$doctor->designation}} {{$doctor->name}}</option>
                            @endforeach
                        </select>					
                      </div>						
					</div>	
					 <br/><br/>
					 
					  <div class="form-group searchinput" id="dateDiv">
						
						<label for="date" class="col-md-4 control-label">রেজিস্ট্রেশনের তারিখ </label>
					  
					  <div class="col-md-6">
						<input name="date" id="date" type="text" /></td>
                      </div>						
					</div>	
					 <br/><br/>

						<div class="searchinput" id="prescriptionDiv">

							<label for="patient" class="col-md-2 control-label">পেশেন্ট </label>

							<div class="col-md-4">
								<select class="col-md-12" name="patient" id="patient">
									<option value="">--বাছাই করুন--</option>
									@foreach($patients as $patient)
										<option value="{{$patient->id}}"> {{$patient->id}} {{$patient->name}}</option>
									@endforeach
								</select>
							</div>

							<div class="form-group">

								<label for="prescription_id" class="col-md-2 control-label">প্রেসক্রিপশন</label>

								<div class="col-md-4">
									<select class="col-md-12" name="prescription_id" id="prescription_id">
										<option value="">--বাছাই করুন--</option>

									</select>
								</div>
							</div>

						</div>
						<br/> <br/>
						<div class="form-group searchinput" id="phoneDiv">

							<label for="phone" class="col-md-4 control-label">মোবাইল/ফোন নং </label>

							<div class="col-md-6">
								<input name="phone" id="phone" type="text" /></td>
							</div>
						</div>
						<br/> <br/>



						<div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <input name="submit" type="submit" value="খোঁজ করুন"  class="btn btn-primary" formtarget="_blank"/>
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

@section('script')

	<script>
		$(document).ready(function() {
			$('#patient').select2();
		});

		$('#patient').on('change',function (e) {

			//console.log(e);
			var patient_id=e.target.value;
			var option=' ';
			$('#prescription_id').empty();
			$.ajax({

				type: "GET",
				url : "{{url('ajax-prescription')}}",
				data : {'patient_id':patient_id},
				success : function(data){
					//  console.log('success');
					//  console.log(data);
					option+='<option value="" selected disabled>--বাছাই করুন--</option>';
					for(var i=0;i<data.length;i++)
					{
						option+='<option value="'+data[i].id+'">id: '+data[i].id+' ('+ data[i].date +')</option>';
					}

					$('#prescription_id').append(option);
				},
				error:function()
				{

				}

			});
		});
	</script>

	<script>
	
		function showOthers(searchType)
    {
		$(".searchinput").css("display","none");		
		var child = searchType-1;
		$(".searchinput:eq("+child+")").css("display","block");
	}
	
			$( "#date" ).datepicker({
				changeMonth: true,
                changeYear: true,
                dateFormat: "yy/mm/dd",
		});
		
		$( "#therapyDate" ).datepicker({
				changeMonth: true,
                changeYear: true,
                dateFormat: "yy-mm-dd",
		});
	
	</script>
	
@endsection
