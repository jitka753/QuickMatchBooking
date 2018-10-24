 @extends('layouts.appAdmin')

@section('content')
    @section('content')
    <div class="row">
    <h5 class="card-title">Statistics</h5>
                  <table class="table table-bordered">
                    <tr>
                    <td><h5><strong>{{number_format($percentAvailable),10,2}} % </strong></h5></td>
                    <td><h5>of time-slots is available.</h5></td>
                    </tr>

                    <tr>
                        <td> <h5> <strong>{{number_format($percentBooked),10,2 }} %</strong></h5></td>
                        <td> <h5> of time-slots is booked.</h5></td>
                        </tr>
                  </table>
    </div>
                  <div class="card-footer">
                  <table class="table table-bordered">
                        {{-- <tr>
                          <td> <strong>{{$students}} </strong></td>
                          <td><strong>students</strong> have signed up. </td>
                        </tr> --}}

                        <tr>
                            <td><strong>{{$companies}}</strong></td>
                            <td><strong>companies</strong> are participating on the event.</td>
                          </tr>

                          <tr>
                              <td><strong>{{$timeslots}}</strong></td>
                              <td> of <strong>time-slots in total.</strong></td>
                            </tr>
                          
                            <tr>
                                <td> <strong>{{$available}}</strong></td>
                                <td><strong>available time-slots</strong>.</td>
                              </tr>

                              <tr>
                                  <td><strong>{{$taken}}</strong></td>
                                  <td> <strong>booked time-slots</strong>.</td>
                                </tr>
                  </table>
                 
           
          
        </div>
      </div>
    
@endsection