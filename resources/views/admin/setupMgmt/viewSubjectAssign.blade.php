@extends('admin.base')
@section('content')
<main id="main" class="main">
    <div class="pagetitle">
      <h1>Assign Subject Data</h1>
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
              <h5 class="card-title">All Assign Subject Class</h5>
              <a href="{{route('setups.assign.subject.add')}}" class="btn btn-success float-right btn-sm"><i class="fa fa-plus-circle"></i>Assign New</a>
              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">Sl. No</th>
                    <th scope="col">Class Name</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($allData as $key=> $data)
                  <tr>
                    <th scope="row">{{$key+1}}</th>
                    <td>{{$data['class_name']['class_name']}}</td>
                    <td>
                      <a title="View" class="btn btn-sm btn-success" href="{{route('setups.assign.subject.details',$data->class_id)}}"><i class="fa fa-eye"></i></a>
                      <a title="Edit" class="btn btn-sm btn-primary" href="{{route('setups.assign.subject.edit',$data->class_id)}}"><i class="fa fa-edit"></i></a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>
</main><!-- End #main -->
@endsection