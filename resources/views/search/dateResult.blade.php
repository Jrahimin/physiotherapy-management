@extends('layouts.app')

@section('style')
	*{font-family:bangla;}
	table{width:90%;height:auto;border-radius:8px;background:white;}
	.resultwrapper{width:92%;background:rgb(20,103,171);color:white;font-weight:bold;font-size:1.3em;}
	.myresultwrapper{width:92%;background:white;color:black;font-size:1.3em;border:solid 1px rgb(100,100,100);border-top:none;}
	.leftresult{float:left;}.rightresult{float:right;}
	.myresultdiv{width:92%;background:white;color:black;border-top:none;border-radius:8px;}	.printbutton{width:80px;color:white;background:rgb(34,103,179);border-radius:5px;font-size:1.2em;padding:8px;cursor:pointer;}
	@if($date===0)
		.leftresult{width:25%;padding:5px;}.rightresult{width:25%;padding:5px;}
	@elseif($date===1)
		.leftresult{width:20%;padding:5px;}.rightresult{width:20%;padding:5px;}
	@endif

	.mywrapper{width:70%;padding:80px 0;background:white;border-radius:20px;margin:0 auto;}
	.idpara{display:inline-block;border:solid 1px black;border-radius:5px;padding:3px;}
@endsection

@section('title')

	খোঁজের ফলাফল

@endsection

@section('content')

	<div class="container">
		<br/><br/>

		<center>
			@if(!$patients->isEmpty())

				<div class="myresultdiv">

					<center><h2 style="padding-top:14px;">খোঁজের ফলাফল</h2>
						<hr/>

						<table width="90%">
							<tr>
								<td>
									<br/><br/>
									<center>
										<div class="resultwrapper" style="border-right:none;">

											<div class="leftresult">
												রোগীর আইডি<br/>
											</div>

											<div class="leftresult" style="border-right:none;border-left:none;">
												রোগীর নাম<br/>
											</div>

											@if($date===1)
												<div class="rightresult">
													রেজিস্ট্রেশনের তারিখ <br>
												</div>
											@endif

											<div class="rightresult">
												অগ্রিম/বকেয়া<br/>
											</div>

											<div class="rightresult">
												প্রদানকৃত টাকা<br/>
											</div>


											<br/><br/>

										</div>


									</center>
								</td>
							</tr>

							<?php

							$total=0;
							$totalDueOrAdvance = 0;
							?>


							@foreach($patients as $patient)
								<tr>
									<td>
										<center>
											<div class="myresultwrapper">

												<div class="leftresult">
													<a href="{{route('search.id',['id'=>$patient->id])}}">{{$patient->id}}</a>
												</div>



												<div class="leftresult">
													{{$patient->name}}
												</div>
												<?php
												$patientTotal=0;
												$patientTotalAdvanceOrDue = 0;
												foreach ($patient->payments as $payment)
												{
													$patientTotal = $patientTotal + $payment->amount;
													$patientTotalAdvanceOrDue = $patientTotalAdvanceOrDue + $payment->due_or_advance;
												}
												$total=$total+$patientTotal;
												$totalDueOrAdvance = $totalDueOrAdvance + $patientTotalAdvanceOrDue;
												?>
												@if($date==1)

													<div class="rightresult">
														{{$patient->date}}
													</div>
												@endif

												<div class="rightresult">
													@if($patientTotalAdvanceOrDue>0) অগ্রিম @else বকেয়া @endif {{$patientTotalAdvanceOrDue}} টাকা
												</div>

												<div class="rightresult">
													{{$patientTotal}}
												</div>

												<br/><br/>

											</div>



										</center>
									</td>
								</tr>
							@endforeach

							<tr>
								<td>
									<center>
										<div class="myresultwrapper">

											<div class="leftresult">
												মোট রোগী : {{$numberOfPatients}} জন
											</div>

											<div class="leftresult">

											</div>

											<div class="leftresult">
												মোট :  {{$total}} টাকা
											</div>

											<div class="leftresult">
												মোট : @if($totalDueOrAdvance>0) অগ্রিম @else বকেয়া @endif {{$totalDueOrAdvance}} টাকা
											</div>

											<div class="rightresult">

											</div>


											<br/><br/>

										</div>



									</center>
								</td>
							</tr>

							<tr>
								<td>
									<br/><br/><br/>
								</td>
							</tr>


						</table>

						<br/><br/>

						<form>
							<p style="text-align:right;padding-right:20px;">
								<input type="submit" class="printbutton" id="printbutton" formtarget="_blank" value="প্রিন্ট"/>
							</p>
						</form>
						<br/><br/>

				</div>

		</center>

		@else
			<div class="mywrapper">
				<p style="color: brown; font-size: 24px; font-weight: bold;text-align:center;">দুঃখিত! খোঁজকৃত বিষয়ে প্রদর্শন করার মতো কোন ফলাফল নেই...</p>
			</div>
		@endif

		<br/><br/><br/>

	</div>


@endsection
    