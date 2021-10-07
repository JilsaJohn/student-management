<div class="d-flex  align-items-center container ">
  <div class="row ">
    <form class="kt-form" method="post" enctype="multipart/form-data" autocomplete="off" action="{{ URL::to('studentlist/'.Crypt::encrypt($student['id']))}}">
      {{ csrf_field() }}
      {{ method_field('PATCH') }}
      {{ csrf_field() }}
      <h3 style="text-align:center"></h3>
      <div class="form-group">
        <label for="exampleFormControlInput1">@lang('language.NAME')</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Name" name="name" required value="{{ $student['name']}}">
      </div>
      <div class="form-group">
        <label for="exampleFormControlSelect1">@lang('language.AGE')</label>
        <input type="number" class="form-control" name="age" placeholder="Age" value="{{$student['age']}}" required >
      </div>
      <div class="form-group">
        <label for="exampleFormControlSelect1">@lang('language.GENDER')</label>
        <div class="custom-control custom-radio custom-control-inline">
          <input type="radio" id="customRadioInline1" name="gender" class="custom-control-input" value="Male" @if($student['gender'] == 'Male') checked  @endif>
          <label class="custom-control-label" for="customRadioInline1">@lang('language.MALE')</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
          <input type="radio" id="customRadioInline2" name="gender" class="custom-control-input" value="Female" @if($student['gender'] == 'Female') checked  @endif>
          <label class="custom-control-label" for="customRadioInline2">@lang('language.FEMALE')</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
          <input type="radio" id="customRadioInline3" name="gender" class="custom-control-input" value="Others" @if($student['Others'] == 'Others') checked  @endif>
          <label class="custom-control-label" for="customRadioInline3">@lang('language.OTHERS')</label>
        </div>
      </div>
      <div class="form-group">
        <label for="exampleFormControlSelect2">@lang('language.REPORTING_TEACHER')</label>
        <select name="teacher_id" class="form-control" required>
          <option value="">@lang('language.OPTION_SELECT')</option>
          @foreach($teachers as $teacher)
            <option value="{{ $teacher['id'] }}" @if($teacher['id'] == $student['teacher_id'])) selected @endif>{{ $teacher['name'] }}</option>
          @endforeach
        </select>
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-primary">@lang('language.UPDATE_DETAILS')</button>
      </div>
    </form>
  </div>
</div>
