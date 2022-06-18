@extends('admin.base')
@section('content')
<main id="main" class="main">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">
              Assign Class Subject
              <a href="{{route('setups.assign.subject.view')}}" class="btn btn-success float-right btn-sm"><i class="fa fa-list"></i> List Assign Classes</a>
                </h5>
        </div>
        <div class="card-body">
        <form method="POST" action="{{route('setups.assign.subject.store')}}" id="subAssignForm">
            @csrf
            <div class="add_item">
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <div class="form-floating mb-3">
                            <select name="class_id" class="form-select" id="floatingSelect" aria-label="Select Class">
                                <option value="">Select Class</option>
                                @foreach($class_masters as $class)
                                <option value="{{$class->class_id}}">{{$class->class_name}}</option>
                                 @endforeach
                            </select>
                            <label for="floatingSelect">Select Class</label>
                        </div>
                    </div>
                </div>
                <div class="row g-3">
                    <div class="form-group col-md-4">
                        <div class="form-floating mb-3">
                            <select name="subject_id[]" class="form-select" id="floatingSelectClass" aria-label="Select Subject">
                                <option value="">Select Subject</option>
                                @foreach($allSubjects as $subject)
                                <option value="{{$subject->id}}">{{$subject->name}}</option>
                                @endforeach
                            </select>
                            <label for="floatingSelectClass">Select Subject</label>
                        </div>
                    </div> 
                    <div class="form-group col-md-2">
                        <div class="form-floating mb-3">
                            <input name="full_mark[]" type="text" value="" class="form-control" id="floatingFeeAmmount" placeholder="Full Marks">
                                <label for="floatingFeeAmmount">Full Marks</label>
                                <font style="color: red">{{($errors->has('full_mark[]'))?($errors->first('full_mark[]')):''}}</font>
                        </div>
                    </div>
                    <div class="form-group col-md-2">
                        <div class="form-floating mb-3">
                            <input name="pass_mark[]" type="text" value="" class="form-control" id="floatingFeeAmmount" placeholder="Pass Mark">
                                <label for="floatingFeeAmmount">Pass Mark</label>
                                <font style="color: red">{{($errors->has('pass_mark[]'))?($errors->first('pass_mark[]')):''}}</font>
                        </div>
                    </div>
                    <div class="form-group col-md-2" style="padding-top: 10px;">
                        <span class="btn btn-success addeventmore"><i class="bi bi-plus-circle"></i></span>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="text-center">
                    <button type="submit" name="submit" class="btn btn-primary">
                        Submit
                      </button>
                </div>
            </div>
        </form>
        </div>
    </div>
    <div style="visibility: hidden;">
        <div class="row g-3" id="whole_extra_item_add">
            <div class="row g-3" id="delete_whole_extra_item_add">
                <div class="form-group col-md-4">
                    <div class="form-floating mb-3">
                        <select name="subject_id[]" class="form-select" id="floatingSelectClass" aria-label="Select Subject">
                            <option value="">Select Subject</option>
                            @foreach($allSubjects as $subject)
                            <option value="{{$subject->id}}">{{$subject->name}}</option>
                            @endforeach
                        </select>
                        <label for="floatingSelectClass">Select Subject</label>
                    </div>
                </div> 
                <div class="form-group col-md-2">
                    <div class="form-floating mb-3">
                        <input name="full_mark[]" type="text" value="" class="form-control" id="floatingFeeAmmount" placeholder="Full Marks">
                            <label for="floatingFeeAmmount">Full Marks</label>
                            <font style="color: red">{{($errors->has('full_mark[]'))?($errors->first('full_mark[]')):''}}</font>
                    </div>
                </div>
                <div class="form-group col-md-2">
                    <div class="form-floating mb-3">
                        <input name="pass_mark[]" type="text" value="" class="form-control" id="floatingFeeAmmount" placeholder="Pass Mark">
                            <label for="floatingFeeAmmount">Pass Mark</label>
                            <font style="color: red">{{($errors->has('pass_mark[]'))?($errors->first('pass_mark[]')):''}}</font>
                    </div>
                </div>            
                <div class="col-md-2" style="padding-top: 10px;">
                    <span class="btn btn-success addeventmore"><i class="bi bi-plus-circle"></i></span>
                    <span class="btn btn-danger removeeventmore"><i class="bi bi-trash"></i></span>
                </div>
            </div>
        </div>
    </div>
</main><!-- End #main -->
<!-- extra Add item -->
<script type="text/javascript">
    $(document).ready(function(){
        var counter = 0;
        $(document).on("click",".addeventmore",function(){
            var whole_extra_item_add = $("#whole_extra_item_add").html();
            $(this).closest(".add_item").append(whole_extra_item_add);
            counter++;
        });
        $(document).on("click",".removeeventmore", function(){
            $(this).closest("#delete_whole_extra_item_add").remove();
            counter -= 1;
        });
    });
</script>
<script>
  $(function () {
    $('#subAssignForm').validate({
      rules: {
        class_id: {
          required: true,
        },
        "subject_id[]": {
          required: true,
        },
        "full_mark[]": {
          required: true,
        },
        "pass_mark[]": {
          required: true,
        },
      },
      messages: {
        
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
@endsection