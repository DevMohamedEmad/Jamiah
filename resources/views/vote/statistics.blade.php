
@extends('layouts.main')
@section('content')

<div class="container">
    <div class="row">
        <div class="fo">

                <div class="addr my-3">
                     <a href="{{ route('create.meeting') }}"><button type="button" class="btn bg-c-blue">اصافة اجتماع جديد</button></a>
                </div>
                <div class="addr my-3"><p class="fw-bold">إحصائيات الاجتماع :
                  @if($meeting != [])
                          <strong>{{ $meeting->name }}</strong>
                          @endif</div>
                @foreach($votes as $vote)
                <div class="form1 m-4 ">
                    <div class="">
                        <p class="text-center">
                          <strong>{{ $vote['name'] }}</strong>
                        </p>
                 <!-- /.progress-group -->
                        <div class="progress-group">
                        <div class=" d-flex     justify-content-between">
                            <h5> موافق</h5>
                            <span class="float-right"><b>{{$vote['accept'] }}</b>/{{ $vote['total'] }}</span>
                        </div>
                          <div class="progress progress-sm">
                            @if ($vote['total'] != 0)
                            <div class="progress-bar bg-success  " style="width: {{($vote['accept'] / $vote['total'] )*100}}%"></div>
                            @endif
                          </div>
                        </div>
                        <!-- /.progress-group -->

                        <div class="progress-group">
                            <div class=" d-flex     justify-content-between">
                                <h5> التحفظ</h5>
                                <span class="float-right"><b>{{ $vote['save'] }}</b>/{{ $vote['total'] }}</span>
                            </div>
                          <div class="progress progress-sm">

                            @if ($vote['total'] != 0)
                            <div class="progress-bar bg-warning" style="width: {{ $vote['save']*100/ $vote['total']  }}%"></div>
                            @endif
                          </div>
                        </div>
                        <!-- /.progress-group -->
                        <div class="progress-group">
                            <div class=" d-flex     justify-content-between">
                                <h5> الرفض</h5>
                                <span class="float-right"><b>{{ $vote['reject'] }}</b>/{{$vote['total']}}</span>
                            </div>
                          <div class="progress progress-sm">
                           @if ($vote['total'] != 0)
                            <div class="progress-bar bg-danger" style="width: {{ $vote['reject']*100/ $vote['total']  }}%"></div>
                            @endif
                        </div>
                        </div>

                      </div>
                </div>
            @endforeach
             <div class="addr my-3">
                                  <a href=""><button onclick="window.print()" type="button" class="btn bg-c">طباعة</button></a>
                              </div>
            </div>
        </div>
    </div>
</div>
@endsection
