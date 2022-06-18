@extends('admin.base')
@section('content')
<main id="main" class="main">
<div class="card">
            <div class="card-body">
              <h5 class="card-title">Add Class
              <a href="{{route('setups.class.view')}}" class="btn btn-success float-right btn-sm"><i class="fa fa-list"></i> View Classes</a>
              </h5>

              <form class="row g-3" method="POST" action="{{route('setups.class.store')}}">
                @csrf
                <div class="col-md-5">
                    <div class="form-floating">
                        <input name="class_name" type="text" class="form-control" id="floatingName" placeholder="Class Name">
                        <label for="floatingName">Class Name</label>
                        <font style="color: red">{{($errors->has('class_name'))?($errors->first('class_name')):''}}</font>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="form-floating">
                        <input name="class_symbol" type="text" class="form-control" id="floatingSymbol" placeholder="Class Number">
                        <label for="floatingSymbol">Class Symbol</label>
                        <font style="color: red">{{($errors->has('class_symbol'))?($errors->first('class_symbol')):''}}</font>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="text-center">
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
              </form><!-- End floating Labels Form -->

            </div>
          </div>

</main><!-- End #main -->
@endsection