@extends('admin.base')
@section('content')
<main id="main" class="main">
    <div class="pagetitle">
      <h1>Student Data</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="">Home</a></li>
          <li class="breadcrumb-item">Manage Students</li>
          <li class="breadcrumb-item active">Roll Generate</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Search Student</h5>
              <!-- Table with stripped rows -->
              <div class="card-body">
                <form method="post" action="{{route('students.roll.store')}}" id="rollGenerate">
                    @csrf
                 <div class="row g-3">
                  <div class="col-md-3">
                      <div class="form-floating">
                          <select name="class_id" class="form-select" id="class_id" aria-label="Class">
                              <option value="">Select Class</option>
                              @foreach($classes as $class)
                              <option value="{{$class->class_id}}" >{{$class->class_name}}</option>
                              @endforeach
                          </select>
                              <label for="class_id">Select Class <font style="color: red">*</font></label>
                          <font style="color: red">{{($errors->has('class_id'))?($errors->first('class_id')):''}}</font>
                      </div>
                  </div>
                  <div class="col-md-3">
                      <div class="form-floating">
                          <select name="year_id" class="form-select" id="year_id" aria-label="Year">
                              <option value="">Select Year</option>
                              @foreach($years as $year)
                              <option value="{{$year->year_id}}" >{{$year->year}}</option>
                              @endforeach
                          </select>
                              <label for="year_id">Year <font style="color: red">*</font></label>
                          <font style="color: red">{{($errors->has('year_id'))?($errors->first('year_id')):''}}</font>
                      </div>
                  </div>
                  <div class="col-md-2" style="padding-top: 10px;">
                    <a class="btn btn-primary" type="submit" name="search" id="search">Search</a>
                  </div>
                 </div><br>

                 <div class="row d-none" id="roll-generate">
                    <div class="col-md-12">
                        <table class="table table-bordered table-striped dt-responsive" style="width: 100%;">
                        <thead>
                            <tr>
                                <th>ID No</th>
                                <th>Student Name</th>
                                <th>Father's Name</th>
                                <th>Gender</th>
                                <th>Roll No</th>
                            </tr>
                        </thead>
                        <tbody id="roll-generate-tr">

                        </tbody>
                        </table>
                    </div>
                 </div>
                 <button type="submit" class="btn btn-success">Generate Roll</button>
                </form>
              </div>

            </div>
          </div>

        </div>
      </div>
    </section>
    <script type="text/javascript">
    $('#search').click(function(){
        var year_id = $('#year_id').val();
        var class_id = $('#class_id').val();
        $('.notifyjs-corner').html('');
        if(year_id==''){
            $.notify("Year Required",{globalPosition: 'top right',class:'error'});
            return false;
        }
        if(class_id==''){
            $.notify("Class Required",{globalPosition: 'top right',class:'error'});
            return false;
        }
        $.ajax({
            url:"{{route('students.roll.getStudent')}}",
            type:"GET",
            data: {'year_id': year_id,'class_id':class_id},
            success:function(data){
                $('#roll-generate').removeClass('d-none');
                var html = '';
                $.each(data,function(key,v){
                    html +=
                    '<tr>'+
                    '<td>'+v.student.student_id+'<input type="hidden" name="reg_id[]" value="'+v.reg_id+'"></td>'+
                    '<td>'+v.student.student_name+'</td>'+
                    '<td>'+v.student.father_name+'</td>'+
                    '<td>'+v.student.gender+'</td>'+
                    '<td><input type="text" class="form-control" name="roll[]" value="'+v.roll+'"></td>'+
                    '</tr>';
                });
                html = $('#roll-generate-tr').html(html);
            }
        });
    });
</script>
<script>
  $(function () {
    $('#rollGenerate').validate({
      rules: {
        "roll[]": {
          required: true,
        },
      },
      messages: {
        "roll[]": {
          required: "Please enter a roll no ",
        },
      },
      errorElement: 'span',
      errorPlacement: function (error, element) {
        error.addClass('invalid-feedback');
        element.closest('.form-group').append(error);
      },
      highlight: function (element, errorClass, validClass) {
        $(element).addClass('is-invalid');
      },
      unhighlight: function (element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
      }
    });
  });
</script>

</main><!-- End #main -->
@endsection