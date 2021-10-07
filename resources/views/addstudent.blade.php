<div class="d-flex  align-items-center container ">
  <div class="row ">
    <form class="kt-form" action="{{ url('studentlist') }}" method="post" enctype="multipart/form-data" autocomplete="off">
      {{ csrf_field() }}
      <h3 style="text-align:center">@lang('language.ADD_STUDENT_DETAILS')</h3>
      <div class="form-group">
        <label for="exampleFormControlInput1">@lang('language.NAME')</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Name" name="name" required>
      </div>
      <div class="form-group">
        <label for="exampleFormControlSelect1">@lang('language.AGE')</label>
        <input type="number" class="form-control" name="age" placeholder="Age" required>
      </div>
      <div class="form-group">
        <label for="exampleFormControlSelect1">@lang('language.GENDER')</label>
        <div class="custom-control custom-radio custom-control-inline">
          <input type="radio" id="customRadioInline1" name="gender" class="custom-control-input" value="Male">
          <label class="custom-control-label" for="customRadioInline1">@lang('language.MALE')</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
          <input type="radio" id="customRadioInline2" name="gender" class="custom-control-input" value="Female">
          <label class="custom-control-label" for="customRadioInline2">@lang('language.FEMALE')</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
          <input type="radio" id="customRadioInline3" name="gender" class="custom-control-input">
          <label class="custom-control-label" for="customRadioInline3">@lang('language.OTHERS')</label>
        </div>
      </div>
      <div class="form-group">
        <label for="exampleFormControlSelect2">@lang('language.REPORTING_TEACHER')</label>
        <select name="teacher_id" class="form-control" required>
          <option value="">@lang('language.OPTION_SELECT')</option>
          @foreach($teachers as $teacher)
            <option value="{{ $teacher['id'] }}">{{ $teacher['name'] }}</option>
          @endforeach
        </select>
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-primary">@lang('language.ADD_STUDENT_DETAILS')</button>
      </div>
    </form>
  </div>
</div>
