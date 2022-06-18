@extends('admin.base')
@section('content')
<main id="main" class="main">
    <div class="pagetitle">
      <h1>Classes Data</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Setup Managment</li>
          <li class="breadcrumb-item active">Classes</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">All Classes</h5>
              <a href="{{route('setups.class.add')}}" class="btn btn-success float-right btn-sm"><i class="fa fa-plus-circle"></i>Add Class</a>
              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">Sl. No</th>
                    <th scope="col">Class Name</th>
                    <th scope="col">Class Symbol</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($allClasses as $key=> $class)
                  <tr>
                    <th scope="row">{{$key+1}}</th>
                    <td>{{$class->class_name}}</td>
                    <td>{{$class->class_symbol}}</td>
                    <td>
                        <a title="Edit" class="btn btn-sm btn-primary" href=""><i class="fa fa-edit"></i></a>
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