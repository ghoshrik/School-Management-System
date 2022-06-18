@extends('admin.base')
@section('content')
<main id="main" class="main">
<div class="card">
            <div class="card-body">
              <h5 class="card-title">
              @if(!isset($editData->id))  
              Add Fee Catagory
              @else
              Update Fee Catagory
              @endif
              <a href="{{route('setups.fee.catagory.view')}}" class="btn btn-success float-right btn-sm"><i class="fa fa-list"></i> List Fee Catagory</a>
              </h5>
              <form class="row g-3" method="POST" action="{{(@$editData->id)?route('setups.fee.catagory.update',$editData->id):route('setups.fee.catagory.store')}}">
                @csrf
                <div class="col-md-5">
                    <div class="form-floating">
                        <input name="name" type="text" value="{{$editData->name}}" class="form-control" id="floatingFeeCatagory" placeholder="Fee Catagory">
                        <label for="floatingFeeCatagory">Fee Catagory</label>
                        <font style="color: red">{{($errors->has('name'))?($errors->first('name')):''}}</font>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="text-center">
                    <button type="submit" name="submit" class="btn btn-primary">
                      @if(!isset($editData->id))
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