@extends('layouts.app')

@section('style')
	*{font-family:bangla;}
	a{text-decoration:none;color:black;}
	table{width:90%;height:auto;border-radius:8px;background:white;}
	.resultwrapper{width:92%;background:rgb(20,103,171);color:white;font-weight:bold;font-size:1.3em;}
	.myresultwrapper{width:92%;background:white;color:black;font-size:1.3em;border:solid 1px rgb(100,100,100);border-top:none;}
	.leftresult{float:left;}.rightresult{float:right;} .leftresult{width:16%;} .rightresult{width:12%;}
	.generated{color:black;padding-top:12px;font-size:1.3em;}
	input[type="submit"]{margin-top:8px;}
	tr, td{text-align:center; word-wrap: break-word;} .rightresult{text-align:right;padding-right:5px;}
	
@endsection

@section('title')

	খোঁজের ফলাফল
	
@endsection

@section('content')

	<div class="container">
		<br/>
			
			<center>
				
				<table width="90%" style="background:white;">
					<tr>
						<td>						
						<br/><br/>							
							<center>
								<table width="80%">
									<tr class="resultwrapper" style="border-right:none;">

										<td class="leftresult">
											ইউজারের আইডি<br/><br/>
										</td>

										<td class="leftresult">
												নাম<br/><br/>
										</td>

										<td class="leftresult" style="border-right:none;border-left:none;">
												মেইল<br/><br/>
										</td>

										<td class="leftresult" style="border-right:none;border-left:none;">
											ধরন<br/><br/>
										</td>
										
										
										<td class="rightresult">
												পরিবর্তন<br/><br/>
										</td>
										
										<td class="rightresult">
												ডিলিট<br/><br/>
										</td>
																				
										<td class="rightresult">
												এডিট<br/><br/>
										</td>
									</tr>
									
									@foreach($users as $user)
					
										<tr>
												<td class="leftresult generated">
													{{$user->name}}<br/>
												</td>
												
												<td class="leftresult generated">
														{{$user->id}}<br/>
												</td>
												
												<td class="leftresult generated" style="border-right:none;border-left:none;">
														{{$user->email}}<br/>
												</td>

												<td class="leftresult generated" style="border-right:none;border-left:none;">
													{{$user->type->name}}<br/>
												</td>
												
												
												<td class="rightresult">
													<form action="{{route('user.change',['user'=>$user->id])}}" method="get">
														{{csrf_field()}}
														<input name="changeBtn" id="changeBtn" type="submit" class="btn btn-danger" value="ধরন পরিবর্তন">
													</form>
												</td>
												
												<td class="rightresult">
														<form action="{{route('user.delete',['user'=>$user->id])}}" method="get">
															{{csrf_field()}}
															<input type="submit" name="deleteBtn" id="deleteBtn" class="btn btn-danger" value="ডিলিট">
														</form>
												</td>
																						
												<td class="rightresult">
													<form action="{{route('user.edit',['user'=>$user->id])}}" method="get">
														{{csrf_field()}}
														<input type="submit" class="btn btn-primary" value="এডিট">
													</form>
												</td>
												
										</tr>
						
									@endforeach
					 
							 <tr>
								<td><br/><br/><br/></td>
							 </tr>
				
						</table>
							</center>
						</td>
					</tr>
				</table>
			
			</center>
		
		<br/><br/><br/>
	
	</div>


@endsection

@section('script')
	<script>
		$('#deleteBtn').click(function(event){
			if(!confirm("আপনি নিশ্চিতভাবে এই ইউজারকে ডিলেট করতে চান?")){
				event.preventDefault();
			}
		});

		$('#changeBtn').click(function(event){
			if(!confirm("আপনি নিশ্চিতভাবে ইউজারের ধরন পরিবর্তন করতে চান?")){
				event.preventDefault();
			}
		});
	</script>
@endsection

	
	
	