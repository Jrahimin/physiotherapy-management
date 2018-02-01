@extends('layouts.app')

@section('style')
    *{font-family:bangla;}
    table{width:90%;height:auto;border-radius:8px;background:white;}
	.myTable, .myTable tr, .myTable td{padding-left:10px;padding-top:10px;margin:0 auto;}
    .resultwrapper{width:92%;background:rgb(20,103,171);text-align:center;color:white;
	font-weight:bold;font-size:1.3em;padding:5px;}
    .myresultwrapper{width:92%;background:white;color:black;font-size:1.3em;border:solid 1px rgb(100,100,100);border-top:none;}
	.myresultdiv{width:92%;background:white;color:black;border-top:none;border-radius:8px;}
    .leftresult{float:left;}.rightresult{float:right;} .leftresult, .rightresult{width:25%;padding:8px 0;}
	.mywrapper{width:70%;padding:80px 0;background:white;border-radius:20px;margin:0 auto;}
	.idpara{display:inline-block;border:solid 1px black;border-radius:5px;padding:3px;}
	.headtd{text-align:right;font-size:1.4em;font-weight:bold} .heading{font-weight:bold;}	
	.heading, .desc{font-size:1.3em;display:inline-block;}
	.nametd{padding-left:24px;font-size:1.3em;} .prescriptiontable p{padding:5px;}
	.prescriptiontable{border:solid 1px rgb(150,150,150);}	
 .printbutton{width:80px;color:white;background:rgb(34,103,179);border-radius:5px;font-size:1.2em;padding:8px;cursor:pointer;}	
	@media(max-width:500px){
		.headtd{font-size:1.1em;} .nametd{font-size:1.em;}
	}
	
@endsection

@section('title')

    খোঁজের ফলাফল

@endsection

@section('content')

    <div class="container">
        <br/><br/>

		<center>
			<div class="myresultdiv">
			
			<br/><br/><br/>
			
					 @if(!empty($patient))
						
					<center>
				
					<table width="90%">
						<tr>
							<td width ="25%">
								@if($pic==2)
									<img alt="{{$patient->name}} এর ছবি" src="{{asset('image')}}/{{$patient->image_path}}" style="width:100%; margin-left: 6%; margin-bottom: 3%">
								@endif
							</td>
							
							<td width="75%">
								
								<center>
									
										
									<table width="80%">
										<tr>
											<td width="34%" class="headtd">রোগীর নাম : </td>
											<td class="nametd">{{$patient->name}}</td>
										</tr>
										<tr>
											<td width="34%" class="headtd">রোগীর বয়স : </td>
											<td class="nametd">{{$patient->age}}</td>
										</tr>
										<tr>
											<td width="34%" class="headtd">রোগীর ফোন নাম্বার :</td>
											<td class="nametd">{{$patient->phone}}</td>
										</tr>
										<tr>
											<td width="34%" class="headtd">ডাক্তারের নাম :</td>
											<td class="nametd">{{$patient->doctor->name}}</td>
										</tr>
										<tr>
											<td width="34%" class="headtd">তারিখ :</td>
											<td class="nametd">{{$patient->date}}</td>
										</tr>
										<tr>
											<td width="34%" class="headtd">@if($due_or_advance>0)মোট এডভান্স @else মোট বকেয়া@endif :</td>
											<td class="nametd">{{$due_or_advance}} টাকা</td>
										</tr>
									</table>	
								
								</center>
								
							</td>
						</tr>
					</table>
					
					<br/><br/>
					
						{{--<div style="width:91.6%;">

							<table width="100%" class="prescriptiontable" style="padding:5px;">
										
										<tr>
											<td colspan="4">
												<div class="resultwrapper" style="width:100%;">
													প্রেসক্রিপশন
												</div>
											</td>									
										</tr>
					
										@foreach($patient->prescriptions as $prescription)
											<tr>
												<td>
													<p class="heading">
														প্রেসক্রিপশন আইডি :
													</p>
													&nbsp;
													<p class="desc">
														{{$prescription->id}}
													</p>
												</td>
												
												<td colspan="3" style="text-align:right;">
													<p class="heading">
														তারিখ :
													</p>
													&nbsp;
													<p class="desc">
														{{$prescription->date}}
													</p>
												</td>
											</tr>
											<tr>
												<td>
													<p class="heading">
														প্রধান রোগ :
													</p>
													&nbsp;
													<p class="desc">
														{{$prescription->main_disease}}
													</p>
												</td>

												<td colspan="3" style="text-align:right;">
													<p class="heading">
														উপ-রোগ :
													</p>
													&nbsp;
													<p class="desc">
														{{$prescription->sub_disease}}
													</p>
												</td>
											</tr>
											<tr>
												<td colspan="4">
													<p class="heading">
														হিস্টোরি :
													</p>
													&nbsp;
													<p class="desc">
														{{$prescription->history}}
													</p>
												</td>

											</tr>
											<tr>
												<td width="40%"></td>
												<td width="20%"></td>
												<td width="14%"></td>
												<td width="26%"></td>
											</tr>

											<tr>
												<td colspan="4">
													<p class="heading">
														থেরাপিসমূহ :
													</p>
													&nbsp;
													<p class="desc">
														{{$prescription->therapy}}
													</p>
												</td>

											</tr>

											<tr>
												<td colspan="4">
													<p class="heading">
														থেরাপির সময় ও পরিমাণ :
													</p>
													&nbsp;
													<p class="desc">
														{{$prescription->therapy_details}}
													</p>
												</td>
											</tr>
										@endforeach
							</table>
							
						</div>--}}
						
					</center>
										
					<center>

					<table width="90%">
					
						<tr>
							<td>
								<br/><br/>
								<center>
									<div class="resultwrapper" style="border-right:none;">


										<div class="leftresult" style="border-right:none;border-left:none;">
													থেরাপি<br/>
										</div>

										<div class="leftresult" >
											থেরাপি প্রদানকারী<br/>
										</div>

										<div class="rightresult" >
													থেরাপি মূল্য<br/>
										</div>

										<div class="rightresult" style="border-right:none;">
													থেরাপির তারিখ ও সময়<br/>
										</div>

										<br/><br/>

									</div>


								</center>
							</td>
						</tr>

						<?php
						$totalAmount=0;
						?>

						@foreach($patient->payments as $payment)
							<tr>
								<td>
									<center>
										<div class="myresultwrapper">


											<div class="leftresult">
												@foreach($payment->prescription->therapies as $therapy)
													{{$therapy->name}},
												@endforeach
											</div>

											<div class="leftresult">
												{{$payment->user->name}}
											</div>

											<div class="rightresult">
												{{$payment->amount}}
											</div>

											<div class="rightresult">
												{{$payment->date}} ({{$payment->time}})
											</div>
											<?php

												$totalAmount=$totalAmount+$payment->amount;
											?>


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
								
											</div>
											
											<div class="rightresult">
												মোট : {{$totalAmount}}
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
				
				<br/><br/>
                     
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
		
		</center>
			
       
        <br/><br/><br/>

    </div>


@endsection

