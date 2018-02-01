@extends('layouts.app')

@section('style')
	*{font-family:bangla;}
	table{width:90%;height:auto;border-radius:8px;background:white;}
	.resultwrapper{width:92%;background:rgb(20,103,171);color:white;font-weight:bold;font-size:1.3em;}
	.myresultwrapper{width:92%;background:white;color:black;font-size:1.3em;border:solid 1px rgb(100,100,100);border-top:none;}
	.leftresult{float:left;}.rightresult{float:right;}
		.leftresult, .rightresult{width:16%;padding:8px 0;}
	.mywrapper{width:70%;padding:80px 0;background:white;border-radius:20px;margin:0 auto;}
	.myresultdiv{width:92%;background:white;color:black;border-top:none;border-radius:8px;}
	.idpara{display:inline-block;border:solid 1px black;border-radius:5px;padding:3px;}	.printbutton{width:80px;color:white;background:rgb(34,103,179);border-radius:5px;font-size:1.2em;padding:8px;cursor:pointer;}	
@endsection

@section('title')

	খোঁজের ফলাফল
	
@endsection

@section('content')

	<div class="container">
		<br/><br/>
			
			<div class="myresultdiv">
				<center><h2 style="padding-top:14px;">খোঁজের ফলাফল</h2>
			<hr/>
				@if($date===1)
				@foreach($payments as $payment)
						<p style="display:inline;font-size:1.6em;">থেরাপির তারিখ ও সময়: </p>
						<h4 style="display:inline;font-style:underline;">{{ $payment->date }}</h4>
					@break
				@endforeach
				@endif
			</center>
			
			<br/><br/>

				@if($payments)
			<center>
				<table width="90%">
					<tr>
						<td>
							<br/><br/>
								<center>
									<div class="resultwrapper" style="border-right:none;">
					
										<div class="leftresult">
												রোগীর নাম<br/>
										</div>

										<div class="leftresult" style="border-right:none;border-left:none;">
												থেরাপি<br/>
										</div>

										<div class="leftresult" style="border-right:none;border-left:none;">
											থেরাপি প্রদানকারী<br/>
										</div>
										
										<div class="rightresult" >
												টাকার পরিমাণ<br/>
										</div>										
										
										@if($date===0)
										<div class="rightresult" style="border-right:none;">
												থেরাপির তারিখ<br/>
										</div>	
										@endif
										<div class="rightresult">
												রোগীর আইডি<br/>
										</div>

										@if($verify==2)
										<div class="rightresult">
											থেরাপি যাচাই<br/>
										</div>
										@endif
										<br/><br/>
								
									</div>
									
									
								</center>
						</td>
					</tr>
					<?php

						$totalAmount=0;
					?>

				@foreach($payments as $payment)
						<tr>
							<td>
								<center>
									<div class="myresultwrapper">

										<div class="leftresult">
												{{$payment->patient->name}}
										</div>
										
										<div class="leftresult">
												@foreach($payment->prescription->therapies as $therapy)
													{{$therapy->name}},
												@endforeach
											@if($payment->status==1) <img style="width: 14%; height: 14%;" src="{{asset("ok.png")}}"> @endif
										</div>

										<div class="leftresult">
											{{$payment->user->name}}
										</div>

									<?php
										$patientId=$payment->patient->id;
										?>
										
										<div class="rightresult">
											{{$payment->amount}}
										</div>

										@if($date===0)
										<div class="rightresult">
												{{$payment->date}}
										</div>
										@endif

										<div class="rightresult">
												<p class="idpara">
													<a target="_blank" href="{{route('search.id',['id'=>$patientId])}}">{{$patientId}}</a>
												</p>
										</div>

										@if($verify==2)
										<div class="rightresult">
												@if($payment->status==0)
												{!! Form::open(['method'=>'POST','action'=>'PatientController@assignTherapyStatus']) !!}
												{{ csrf_field() }}
														<input type="hidden" name="payment_id" id="payment_id" value="{{$payment->id}}">

											<div class="form-group">

													<input name="submit" type="submit" style="font-size:1em;" value="যাচাইভুক্ত করুন"  class="btn btn-success"/>

											</div>
												</form>
												@else
													<h4 style="color: green">যাচাই করা হয়েছে</h4>
												@endif
										</div>
										@endif
										
										
										<?php
										$totalAmount= $totalAmount+ $payment->amount;
										?>
									
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
									
									</div>
									
									<div class="leftresult">
									
									</div>
									
									<div class="rightresult">
										মোট : {{$totalAmount}}</td>
									
									</div>
									
									<div class="rightresult">
									
									</div>
									
									<div class="rightresult">
									
									</div>								
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
			
			</center>
			
			
				<br/>
                     
					 <form>
						<p style="text-align:right;padding-right:20px;">
						<input type="submit" class="printbutton" id="printbutton" formtarget="_blank" value="প্রিন্ট"/>
					 </p>
					 </form>
                <br/><br/>

		@else
			<div class="mywrapper">
				<p style="color: brown; font-size: 24px; font-weight: bold;text-align:center;">দুঃখিত! খোঁজকৃত বিষয়ে প্রদর্শন করার মতো কোন ফলাফল নেই...</p>
			</div>
		@endif
			
			</div>			
			
		<br/><br/><br/>
	
	</div>


@endsection


       