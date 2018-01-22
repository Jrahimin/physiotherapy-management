<html>

	<head>
		<meta charset="UTF-8"/>
		<title>রোগীর পথ্য</title>
		<style>
			@font-face {
			font-family: bangla;
			src: url({{asset('bangla.ttf')}});
		}
		*{margin:0;padding:0;font-family:bangla;} body{width:100%;background:white;} .printPage{margin-top:2.4in;}
		.prewrapper{width:100%;min-height:280px;height:auto;} .heading{font-weight:bold;}
		.heading, .desc{font-size:1.2em;display:inline-block;} .this{border-top:solid 1px black;}
		.printbutton{background:white;border-radius:5px;font-size:1.2em;border:solid 1px black;padding:8px;cursor:pointer;}
	
	/*
	  @page {
  size: A4;
  margin: 0;
}*/

@media print {
  html, body {
	  padding:0;
  }
}

		</style>
	</head>
	
	<body>
		<div class="printPage" style="padding: 30px;">
				
				<div class="prewrapper">
					
					<table width="100%">
						<tr>
							<td style="font-size:1.2em;">							
								<b>প্রেসক্রিপশন নাম্বার :</b>&nbsp;# {{$prescription->id}}
							</td>
							
							<td style="font-size:1.2em;text-align:right;">
									<b>প্রেসক্রিপশন তারিখ : </b> &nbsp;{{$prescription->date}}
							</td>
						</tr>
					</table>
					
					<table width="100%" style="border:solid 1px rgb(180,180,180);margin-top:8px;padding:5px;">
							
						<tr>
							<td colspan="4">
								<p class="heading">
									রোগীর আইডি :
								</p>
								&nbsp;
								<p class="desc">
									{{$prescription->patient_id}}
								</p>
							</td>
						</tr>

							<tr>
								<td>
									<p class="heading">
										রোগীর নাম : 
									</p>
									&nbsp;
									<p class="desc">
										{{$patient->name}}
									</p>
								</td>
																
								<td>
									<p class="heading">
										বয়স :
									</p>
									&nbsp;
									<p class="desc">
										{{$patient->age}}
									</p>
								</td>
							</tr>
							
							<tr>
								<td>
									<p class="heading">
										ফোন : 
									</p>
									&nbsp;
									<p class="desc">
										{{$patient->phone}}
									</p>
								</td>
								
								<td colspan="3">
									<p class="heading">
									ডাক্তার :
								</p>
								&nbsp;
								<p class="desc">
									{{$patient->doctor->name}}
								</p>
								</td>
							</tr>
					</table>
					
					<br/>
					
					<hr/>
					
					<table width="100%" style="margin-top:8px;">
													
							<tr>
								<td>
									<p class="heading">
										প্রধান রোগ :
									</p>
									&nbsp;
									<p class="desc">
										{{$diseaseName}}
									</p>
								</td>
								
								<td colspan="3">
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
									<p class="desc" style="display:inline;">
										<?php
											$count = 0;
										?>
										@foreach($therapies as $therapy)
												<?php
													$count++;
												?>
												{{$count}}) {{$therapy->name}}
												@if(!$loop->last)
													,
												@endif
										@endforeach

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
					
					</table>
					
					<br/><br/><br/><br/><br/><br/>
                     
					 <form>
						<p style="text-align:right;padding-right:20px;">
						<input type="submit" class="printbutton" id="printbutton" value="প্রিন্ট" formtarget="_blank" onclick="prints();"/>
					 </p>
					 </form>
                            
					
					
				</div>	
				
		</div>
	
	</body>

</html>

<script>
	function prints() {
		document.getElementById("printbutton").style.display="none";
		window.print();
	}
</script>