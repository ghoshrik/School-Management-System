@extends('admin.base')
@section('content')
<main id="main" class="main">
    <div class="pagetitle">
      <h1>Assign Subject details</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="">Home</a></li>
          <li class="breadcrumb-item">Setup Managment</li>
          <li class="breadcrumb-item active">Assign Subject</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">All Assign Subject Details</h5>
              <a href="{{route('setups.assign.subject.view')}}" class="btn btn-success float-right btn-sm"><i class="fa fa-list"></i>List Assign Classes</a>
            </div>
            <div class="card-body">
                <h4>Class Name:<strong> {{$subDetails[0]['class_name']['class_name']}}</strong></h4>
                <table class="table datatable">
                    <thead>
                    <tr>
                        <th scope="col">Sl. No</th>
                        <th scope="col">Subject Name</th>
                        <th scope="col">Full Mark</th>
                        <th scope="col">Pass Mark</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($subDetails as $key=> $details)
                    <tr>
                        <th scope="row">{{$key+1}}</th>
                        <td>{{$details['subject_name']['name']}}</td>
                        <td>{{$details->full_mark}}</td>
                        <td>{{$details->pass_mark}}</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>    
          </div>

        </div>
      </div>
    </section>
</main><!-- End #main -->
@endsection