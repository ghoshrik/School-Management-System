@extends('admin.base')
@section('content')
<main id="main" class="main">
    <div class="pagetitle">
      <h1>Year Data</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Setup Managment</li>
          <li class="breadcrumb-item active">Year</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">All Year</h5>
              <a href="{{route('setups.year.add')}}" class="btn btn-success float-right btn-sm"><i class="fa fa-plus-circle"></i>Add Year</a>
              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">Sl. No</th>
                    <th scope="col">Year</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($allData as $key=> $data)
                  <tr>
                    <th scope="row">{{$key+1}}</th>
                    <td>{{$data->year}}</td>
                    <td>
                        <a title="Edit" class="btn btn-sm btn-primary" href="{{route('setups.year.edit',$data->year_id)}}"><i class="fa fa-edit"></i></a>
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