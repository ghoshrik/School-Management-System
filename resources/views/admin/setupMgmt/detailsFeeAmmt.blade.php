@extends('admin.base')
@section('content')
<main id="main" class="main">
    <div class="pagetitle">
      <h1>Fee Ammount details</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="">Home</a></li>
          <li class="breadcrumb-item">Setup Managment</li>
          <li class="breadcrumb-item active">Fee Ammount</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">All Fee Ammount Details</h5>
              <a href="{{route('setups.fee.ammount.view')}}" class="btn btn-success float-right btn-sm"><i class="fa fa-list"></i>List Fee Ammount</a>
            </div>
            <div class="card-body">
                <h4>Fee Catagory: {{$feeDetails[0]['fee_catagory']['name']}}</h4>
                <table class="table datatable">
                    <thead>
                    <tr>
                        <th scope="col">Sl. No</th>
                        <th scope="col">Class</th>
                        <th scope="col">Amount</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($feeDetails as $key=> $details)
                    <tr>
                        <th scope="row">{{$key+1}}</th>
                        <td>{{$details['class_name']['class_name']}}</td>
                        <td>{{$details->ammount}}</td>
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