@extends('layouts.app')

@section('style')
    *{font-family:bangla;}
    table{width:90%;height:auto;border-radius:8px;background:white;}
    .resultwrapper{width:92%;background:rgb(20,103,171);color:white;font-weight:bold;font-size:1.3em;}
    .myresultwrapper{width:92%;background:white;color:black;font-size:1.3em;border:solid 1px rgb(100,100,100);border-top:none;}
    .leftresult{float:left;}.rightresult{float:right;}
    .leftresult, .rightresult{width:20%;padding:8px 0;}
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
            </center>

            <br/><br/>

            @if(!$patients->isEmpty())
                <center>
                    <table width="90%">
                        <tr>
                            <td>
                                <br/><br/>
                                <center>
                                    <div class="resultwrapper" style="border-right:none;">

                                        <div class="leftresult">
                                            রোগীর আইডি<br/>
                                        </div>

                                        <div class="leftresult">
                                            রোগীর নাম<br/>
                                        </div>

                                        <div class="leftresult">
                                            রেজিস্ট্রেশনের তারিখ<br/>
                                        </div>

                                        <div class="leftresult" >
                                            মোট পরিশোধিত টাকা<br/>
                                        </div>

                                        <div class="leftresult" >
                                            মোট অগ্রিম বা বকেয়া<br/>
                                        </div>

                                        <br/><br/>

                                    </div>

                                </center>
                            </td>
                        </tr>

                        <?php
                        $totalAmount = 0;
                        $totalPaid = 0;
                        $totalAmountAll = 0;
                        $totalPaidAll = 0;
                        ?>

                        @foreach($patients as $patient)
                            <?php
                            foreach ($patient->payments as $payment)
                            {
                                $totalAmount = $totalAmount + $payment->amount;
                                $totalPaid = $totalPaid + $payment->paid;
                            }

                            $totalAmountAll = $totalAmountAll + $totalAmount;
                            $totalPaidAll = $totalPaidAll + $totalPaid;
                            $totalAdvanceOrDue = $totalPaid - $totalAmount;
                            $totalAdvanceOrDueAll = $totalPaidAll - $totalAmountAll;
                            ?>
                            <tr>
                                <td>
                                    <center>
                                        <div class="myresultwrapper">

                                            <div class="leftresult">
                                                <p class="idpara">
                                                    <a target="_blank" href="{{route('search.id',['id'=>$patient->id])}}">{{$patient->id}}</a>
                                                </p>
                                            </div>

                                            <div class="leftresult">
                                                {{$patient->name}}
                                            </div>

                                            <div class="leftresult">
                                                {{ $patient->date }}
                                            </div>

                                            <div class="leftresult">
                                                {{ $totalPaid }}
                                            </div>

                                            <div class="leftresult">
                                                @if($totalAdvanceOrDue>0) অগ্রিম @else বকেয়া @endif {{ $totalAdvanceOrDue }} টাকা
                                            </div>

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
                                        <div class="leftresult">

                                        </div>

                                        <div class="leftresult">
                                            মোট {{ $totalPaidAll }} টাকা
                                        </div>

                                        <div class="rightresult">
                                            মোট @if($totalAdvanceOrDueAll>0) অগ্রিম @else বকেয়া @endif {{$totalAdvanceOrDueAll}} টাকা</td>
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

@endsection


