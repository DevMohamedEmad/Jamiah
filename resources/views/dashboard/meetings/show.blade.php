@extends('layouts.main')
@section('content')
<div class="container">
  <div class="row">
    <div class="fo">
      <div class="addr my-3">
        <p class="fw-bold">إحصائيات الاجتماع :
          <strong>{{ $meeting->name }}</strong>
      </div>
      <div class="form1 m-4 ">
        <div>


          <!-- /.progress-group -->
          <table class="table caption-top">
            <thead class="text-center">
              <tr>
                <th scope="col">اسم المرفق</th>
                <th scope="col">موافق</th>
                <th scope="col"> تحفظ</th>
                <th scope="col">رفض</th>
              </tr>
            </thead>
            <tbody>
                @foreach($votes as $vote)
                <tr class="text-center w-100">
                    <td class="w-25">
                        <p class="text-center">
                          <strong>{{ $vote['name'] }}</strong>
                        </p>
                    </td>
                    <td class="w-25" >
                        <div class="progress-group">
                            <div class="">
                              <span class="float-right"><b>{{$vote['accept'] }}</b>/{{ $vote['total'] }}</span>
                            </div>
                            <div class="progress progress-sm">
                              @if ($vote['total'] != 0)
                              <div class="progress-bar bg-success  " style="width: {{($vote['accept'] / $vote['total'] )*100}}%"></div>
                              @endif
                            </div>
                          </div>
                    </td>
                    <td class="w-25">
                        <div class="progress-group">
                            <div class=" d-flex     justify-content-between">
                              <span class="float-right"><b>{{ $vote['save'] }}</b>/{{ $vote['total'] }}</span>
                            </div>
                            <div class="progress progress-sm">

                              @if ($vote['total'] != 0)
                              <div class="progress-bar bg-warning" style="width: {{ $vote['save']*100/ $vote['total']  }}%"></div>
                              @endif
                            </div>
                          </div>
                    </td>
                    <td class="w-25 ">
                        <div class="progress-group">
                            <div class=" d-flex     justify-content-between">
                              <span class="float-right"><b>{{ $vote['reject'] }}</b>/{{$vote['total']}}</span>
                            </div>
                            <div class="progress progress-sm">
                              @if ($vote['total'] != 0)
                              <div class="progress-bar bg-danger" style="width: {{ $vote['reject']*100/ $vote['total']  }}%"></div>
                              @endif
                            </div>
                          </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
    </table>
          <!-- /.progress-group -->
          <!-- /.progress-group -->
        </div>
      </div>
      <div class="addr my-3">
        <a href=""><button onclick="window.print()" type="button" class="btn bg-c">طباعة</button></a>
      </div>
    </div>
  </div>
</div>
</div>
@endsection
