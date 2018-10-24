@extends('layouts.app')
@section('content')

<div class="row">
    <div class="col-md-4 offset-md-4">
        <h1 class="text-center">My Bookings</h1>
    </div>
    <div class="col-md-2 offset-md-2">
        <!--select event -->
        <label>Select event: {!! Form::select('dropdownCity', $eventsDropDown) !!}</label>
    </div>
</div>
<div class="text-center">
    <div class="alert alert-default alert-dismissible fade show" role="alert">
        <strong>Rules:</strong>
        Maximum one booking per company.
        Maximum one interview per time-slot.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
      </div>
</div>
<!--loop companies, beginning of form -->
 @if(count($companies) >0)

<form name="myForm" id="myForm" method="POST" action="{{ route('updatemybooking') }}" onsubmit="return validateForm()">
    {{ csrf_field() }}

    <!-- access user id-->
    @guest

    @else
    <input type="hidden" name="id" value="{{Auth::user()->id}}">
    @endguest

    @php $companyTime=-1;
    $bookingId=-1;
    @endphp
    <input type="hidden" name="id_event" value="1">
    @foreach($companies as $company)
    @php $companyTime++;
    @endphp
    <ul class="list-group list-group-flush">
        <li class="list-group-item" id="tableRow_{{$company->id_company}}">
            <div class="container">
                <div class="row">
                    <div class="col-md-1">
                        <button type="button" class="btn btn-primary span4" data-toggle="modal" data-target="#exampleModalCenter_{{$company->id_company}}">Details</button>
                    </div>
                    <div class="col-md-6">
                        <h3>{{$company->companyName}}</h3>
                    </div>
                </div>
                <br>


                <div class="row">
                <table class="table  table-bordered ">
                    @php
                    $row_count=0;
                    $col_count=0;
                    //while($rowpost = mysqli_fetch_array($respost)) {
                    if($row_count%4==0){
                    echo "<tr>";
                        $col_count=1; }
                        @endphp
                        <!-- loop through time-slots-->
                        <tbody>
                            {{-- @foreach($time_slots[{{$company->id_company}}] as $time_slot) --}}
                            @php @endphp
                            <div class="col-sm-3">
                                <tr>
                                    @foreach($time_slots as $time_slot)
                                    @if(($company->id_company) === ($time_slot->id_company))

                                    <!-- time-formatting, add 5 minutes to each time-->
                                    @php
                                    $cleantime=substr(($time_slot->time_slot_value),0,5);
                                    $endTime = strtotime("+5 minutes", strtotime($time_slot->time_slot_value));
                                    $counter = 0;
                                    @endphp
                                    <input type="hidden" name="id_booking" value="{{$time_slot->id_booking}}">
                                    <td class='span4'>
                                        <label>

                                            <!--add invisible radio button behind each table cell-->
                                            <input type="checkbox" class="radio click-input" name="{{$company->id_company}}"
                                                data-booking_id="{{$time_slot->id_booking}}" value="{{$time_slot->id_time_slot}}" />
                                            <div class="oneField">
                                                {{($cleantime)}} - {{date('g:i', $endTime)}}
                                            </div>
                                        </label>
                                    </td>

                                    @php
                                    if($col_count==9){
                                    echo "
                                </tr>";
                                }
                                $row_count++;
                                $col_count++;
                                @endphp
                                @endif
                                @endforeach

                        </tbody>

                </table>
              </div>
                <?php if($company_time[$company->id_company]['booking'] != 0) :?>

                @php
                $cleantime=substr(($company_time[$company->id_company]['timeslot']),0,5);
                $endTime = strtotime("+5 minutes", strtotime($company_time[$company->id_company]['timeslot']));
                @endphp

                <!-- $x = SELECT id_time_slot FROM bookings WHERE ...........

    change $x id_time_slot to real time.
    -->     <div class="container">
                <div class="col-md-3,1 pull-right">
                    <label>Booked time: </label>
                    {{ $company_time[$company->id_company]['timeslot'] }} - {{date('g:i', $endTime)}}

                    <a href="{{ route('cancelbooking', ['booking' => $company_time[$company->id_company]['booking']]) }}"
                        class="btn btn-primary cancel">Cancel</a>
                    <?php else: ?>
                    <input type="hidden" name="company_{{$company->id_company}}" id="company_{{$company->id_company}}">
                    <?php endif; ?>
                </div>
                <span id="spnText"></span>
        </li>


        <!-- Modal pop up window-->

        <div class="modal fade" id="exampleModalCenter_{{$company->id_company}}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">


                        <!-- display company name/details-->
                        <h5 class="modal-title" id="exampleModalLongTitle">{{$company->companyName}}</h5>

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        {{$company->companyDescription}}
                        <hr>
                        <h5>Website link</h5>
                        <p><a href="{{$company->companyWebLink}}">{{$company->companyWebLink}}</a></p>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        <!--submit form -->
        <footer class="fixed-bottom">
            <div class="container">
                <button type="submit" class="btn btn-primary btn-lg btn-block">Submit</button>
            </div>
        </footer>
</form>


<script type="text/javascript">
    $('.click-input').click(function () {
        if ($(this).is(":checked")) {
            $('#company_' + $(this).attr('name')).val($(this).data('booking_id'));
        } else {
            $('#company_' + $(this).attr('name')).val('');
        }
    });
</script>

@endif

@endsection