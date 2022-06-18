@extends('admin.base')
@section('content')
<main id="main" class="main">
<div class="card">
            <div class="card-body">
              <h5 class="card-title">
              @if(!isset($editData->year_id))  
              Add Year
              @else
              Update Year
              @endif
              <a href="{{route('setups.year.view')}}" class="btn btn-success float-right btn-sm"><i class="fa fa-list"></i> View Years</a>
              </h5>
              <form class="row g-3" method="POST" action="{{(@$editData->year_id)?route('setups.year.update',$editData->year_id):route('setups.year.store')}}">
                @csrf
                <div class="col-md-5">
                    <div class="form-floating">
                        <input name="year" type="text" value="{{$editData->year}}" class="form-control" id="floatingYear" placeholder="Year">
                        <label for="floatingYear">Year</label>
                        <font style="color: red">{{($errors->has('year'))?($errors->first('year')):''}}</font>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="text-center">
                    <button type="submit" name="submit" class="btn btn-primary">
                      @if(!isset($editData->year_id))
                        Submit
                        @else
                        Update
                        @endif
                      </button>
                    </div>
                </div>
              </form><!-- End floating Labels Form -->

            </div>
          </div>

</main><!-- End #main -->
@endsection