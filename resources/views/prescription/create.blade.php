@extends('layouts.app')

@section('style')

@endsection

@section('title')
    প্রেসক্রিপশন
@endsection

@section('content')

    <div class="container">
        <br/><br/><br/>

        {!! Form::open(['method'=>'POST','action'=>'PrescriptionController@store']) !!}
        {{ csrf_field() }}

        <div class="mywrapper">

            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">

                    <div class="panel-heading">

                        <p class="formheading">
										প্রেসক্রিপশন
                        </p>

                    </div>

                    <div class="panel-body">

                        <div class="form-group">

                            <label for="patient_id" class="col-md-4 control-label">রোগীর নাম</label>

                            <div class="col-md-6">
                                <select class="col-md-12" name="patient_id" id="patient_id">
                                    <option value=""> --বাছাই করুন-- </option>
                                    @foreach($patients as $patient)
                                        <option value="{{$patient->id}}">id: {{$patient->id}} {{$patient->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div> <br/><br/>

                        <div class="form-group">

                            <label for="main_disease_id" class="col-md-4 control-label">প্রধান রোগ</label>

                            <div class="col-md-6">
                                <select class="col-md-12" name="main_disease_id" id="main_disease_id">
                                    <option value=""> --বাছাই করুন-- </option>
                                    @foreach($diseases as $disease)
                                        <option value="{{$disease->id}}">{{$disease->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div> <br/><br/>

                        <div class="form-group">

                            <label for="sub_disease_id" class="col-md-4 control-label">উপ-রোগ</label>

                            <div class="col-md-6">
                                <select class="col-md-8" name="sub_disease_id" id="sub_disease_id">
                                    <option value="">--বাছাই করুন--</option>

                                </select>
                            </div>
                        </div>
                        <br/><br/>

                        <div class="form-group">

                            <label for="history" class="col-md-4 control-label">হিস্টোরি</label>

                            <div class="col-md-6">
                                <input required="required" class="form-control" name="history" type="text" id="history"  />
                            </div>
                        </div>
                        <br/><br/>

                        <input type="hidden" name="therapy" value="none">
                        <div class="form-group">

                            <label for="therapy_id" class="col-md-4 control-label">থেরাপির নাম</label>

                            <div class="col-md-6">
                                <select class="col-md-12" name="therapy_ids[]" id="therapy_id_0">
                                    <option value="">--বাছাই করুন-- </option>
                                    @foreach($therapies as $therapy)
                                        <option value="{{$therapy->id}}">{{$therapy->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <br/><br/>

                        <div class="form-group">

                            <label for="therapy_time" class="col-md-4 control-label">থেরাপি প্রদানের সময়</label>

                            <div class="col-md-6">
                                <input required="required" class="form-control" name="therapy_times[]" type="text"/>
                            </div>
                        </div>
                        <br/><br/>

                        <div class="form-group">

                            <label for="therapy_amount" class="col-md-4 control-label">পরিমাণ (সংখ্যায়)</label>

                            <div class="col-md-6">
                                <input required="required" class="form-control" name="therapy_amounts[]" type="text"/>
                            </div>
                        </div>
                        <br/><br/>

                        <div id="addTherapyDiv">

                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <br/><br/>
                                <input name="addTherapyBtn" id="addTherapyBtn" type="button" value="আরো থেরাপি"  class="btn btn-primary"/>
                            </div>
                        </div>
                        <br/><br/>

                        <input type="hidden" id="date" name="date" value="{{\Carbon\Carbon::now('asia/dacca')->toDateString()}}">

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
								<br/><br/>
                                <input name="submit" type="submit" value="রেজিস্টার"  class="btn btn-primary" formtarget="_blank"/>
                            </div>
                        </div>
                        <br/><br/>

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
        var count;
        var therapyDetailsDiv = '<div class="form-group"><label for="therapy_time" class="col-md-4 control-label">থেরাপি প্রদানের সময়</label><div class="col-md-6"><input required="required" class="form-control" name="therapy_times[]" type="text"/></div></div><br><br><div class="form-group"><label for="therapy_amount" class="col-md-4 control-label">পরিমাণ</label><div class="col-md-6"><input required="required" class="form-control" name="therapy_amounts[]" type="text"/></div></div><br><br>';
        $(document).ready(function() {
            count = 0;
            $('#therapy_id').select2();
            $('#patient_id').select2();
        });

        $('#addTherapyBtn').click(function () {
            count++;
            console.log(count);
            $.ajax({
                type: "GET",
                url : "{{url('ajax-therapies')}}",
                data: '',
                success : function(data){
                    console.log(data[0].name);
                    var option1 = '<option value="">--বাছাই করুন-- </option>';
                    therapyDiv ='<div class="form-group"><label for="therapy_id_'+ count +'" class="col-md-4 control-label">থেরাপির নাম</label><div class="col-md-6"><select class="col-md-12" name="therapy_ids[]" id="therapy_id_'+ count +'"></select></div></div><br><br>';
                    console.log(therapyDiv);
                    for(var i=0;i<data.length;i++)
                    {
                        option1 +='<option value="'+data[i].id+'">'+data[i].name+'</option>';
                    }

                    $('#addTherapyDiv').append(therapyDiv, therapyDetailsDiv);
                    $('#therapy_id_'+ count +'').append(option1);
                },
            });

            var append1 = '';
           $('#addTherapy').append('');
        });

        $('#main_disease_id').on('change',function (e) {

            //console.log(e);
            var parent_id=e.target.value;
            var option=' ';
            $('#sub_disease_id').empty();
            $.ajax({

                type: "GET",
                url : "{{url('ajax-subDisease')}}",
                data : {'parent_id':parent_id},
                success : function(data){
                    //  console.log('success');
                    console.log(data);
                    option+='<option value="" selected disabled>--বাছাই করুন--</option>';
                    for(var i=0;i<data.length;i++)
                    {
                        option+='<option value="'+data[i].id+'">'+data[i].name+'</option>';
                    }

                    $('#sub_disease_id').append(option);
                },
                error:function()
                {

                }

            });
        });
    </script>

    <script>
        $( "#date" ).datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: "yy/mm/dd",
            yearRange: '1990:2018'
        });
    </script>
@endsection