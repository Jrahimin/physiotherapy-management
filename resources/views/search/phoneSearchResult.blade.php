@extends('layouts.app')

@section('style')
    *{font-family:bangla;}
    table{width:90%;height:auto;border-radius:8px;background:white;}
    .resultwrapper{width:92%;background:rgb(20,103,171);color:white;font-weight:bold;font-size:1.3em;}
    .detailswrapper{width:92%;font-size:1.1em;}
    .myresultwrapper{width:92%;background:white;color:black;font-size:1.3em;border:solid 1px rgb(100,100,100);border-top:none;}
	.myresultdiv{width:92%;background:white;color:black;border-top:none;border-radius:8px;}
    .leftresult{float:left;}.rightresult{float:right;} .leftresult, .rightresult{width:33%;padding:8px 0;}
	.mywrapper{width:70%;padding:80px 0;background:white;border-radius:20px;margin:0 auto;}
	.idpara{display:inline-block;border:solid 1px black;border-radius:5px;padding:3px;} .heading{font-weight:bold;}	
	.heading, .desc{font-size:1.3em;display:inline-block;}	.printbutton{width:80px;color:white;background:rgb(34,103,179);border-radius:5px;font-size:1.2em;padding:8px;cursor:pointer;}
	.myTable, .myTable tr, .myTable td{padding-left:10px;padding-top:10px;}
	table { page-break-inside:auto; }
    table tr    { page-break-inside:avoid; page-break-after:auto;page-break-after:always; }
    table thead { display:table-header-group; }
    table tfoot { display:table-footer-group; }
	
@endsection

@section('title')

    খোঁজের ফলাফল

@endsection

@section('content')

    <div class="container">
        <br/><br/>

		<center>
			<div class="myresultdiv">
			<h2 style="padding-top:14px;">খোঁজের ফলাফল</h2>
			<hr/>			
			@foreach($patients as $patient)
					<p style="display:inline;font-size:1.6em;">ফোন নাম্বার : </p>
					<h4 style="display:inline;font-style:underline;">{{$patient->phone}}</h4>
				@break
			@endforeach
			
			<br/><br/><br/>
									
					<center>
					
					@foreach($patients as $patient)
				
					<table width="90%">
						<tr>
							
							<td width="75%">
								
								<center>							
										
									<table width="80%">
									
									
											<tr>
												<td width="34%" style="text-align:right;font-size:1.4em;font-weight:bold">রোগীর আইডি : </td>
												<td style="padding-left:24px;font-size:1.3em;">{{$patient->id}}</td>
											</tr>

										<tr>
											<td width="34%" style="text-align:right;font-size:1.4em;font-weight:bold">নাম : </td>
											<td style="padding-left:24px;font-size:1.3em;">{{$patient->name}}</td>
										</tr>
										<tr>
											<td width="34%" style="text-align:right;font-size:1.4em;font-weight:bold">বয়স : </td>
											<td style="padding-left:24px;font-size:1.3em;">{{$patient->age}}</td>
										</tr>
										<tr>
											<td width="34%" style="text-align:right;font-size:1.4em;font-weight:bold">ডাক্তারের নাম :</td>
											<td style="padding-left:24px;font-size:1.3em;">{{$patient->doctor->name}}</td>
										</tr>
										<tr>
											<td width="34%" style="text-align:right;font-size:1.4em;font-weight:bold">রেজিস্ট্রেশনের তারিখ :</td>
											<td style="padding-left:24px;font-size:1.3em;">{{$patient->date}}</td>
										</tr>									
									</table>	
								
								</center>
								
							</td>
						</tr>
					</table>
					
					</center>
					<br/><br/>
					
					<center>
					

					<table width="90%">
					
						<tr>
							<td class="resultwrapper">
								<center>			
										<h3 style="font-weight:bold;padding:2px;">রোগীর বর্ণনা</h3>
										
								</center>
							</td>
						</tr>

						<tr>
							<td style="border:solid 1px black;">
								<table width="100%" class="myTable">
									<h3 style="margin-left: 1%;"><b>প্রেসক্রিপশন</b></h3>
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
										</tr>
										<tr>
							<tr>
								<td>
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
										{{$prescription->main_disease->name}}
									</p>
								</td>

								<td colspan="2">
									<p class="heading">
										উপ-রোগ : 
									</p>
									&nbsp;
									<p class="desc">
										{{$prescription->sub_disease->name}}
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
									<p class="desc" style="display:inline;">
										<?php
										$count = 0;
										?>
										@foreach($prescription->therapies as $therapy)
											<?php
											$count++;
											?>
											<br>
											{{$count}}) {{$therapy->name}} সময়ঃ {{ $therapy->pivot->therapy_time }} পরিমাণঃ {{ $therapy->pivot->therapy_amount }} বার<br>
										@endforeach
									</p>
								</td>								
								
							</tr>
						@endforeach

{{--						<tr>
							<td><h3 style="margin-left: 1%;"><b>থেরাপি সমূহ</b></h3></td>
						</tr>
						@foreach($patient->therapies as $therapy)						
							<tr>
								<td colspan="4">
									<p class="heading">
										থেরাপির নাম :
									</p>
									&nbsp;
									<p class="desc">
										{{$therapy->name}}
									</p>
								</td>								
							</tr>
							
							<tr>
								<td colspan="4">
									<p class="heading">
										 থেরাপি নেওয়ার তারিখ 
									</p>
									&nbsp;
									<p class="desc">
										{{$therapy->pivot->date}}
									</p>
								</td>								
							</tr>						
							@endforeach--}}
						
					
					</table>
							</td>                    
						</tr>

						<tr>
							<td>
								<br/><br/><br/>
							</td>
						</tr>


					</table>

					@endforeach

				</center>

					<br/><br/>
                     
					 <form>
						<p style="text-align:right;padding-right:20px;">
						<input type="submit" class="printbutton" id="printbutton" formtarget="_blank" value="প্রিন্ট"/>
					 </p>
					 </form>
                <br/><br/>
					
			</div>
		
		</center>
			
       
        <br/><br/><br/>

    </div>


@endsection
