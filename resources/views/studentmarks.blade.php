<div class="d-flex  align-items-center container ">
  <div class="row ">
    <form class="kt-form" action="{{ url('addstudentmarks') }}" method="post" enctype="multipart/form-data" autocomplete="off">
      {{ csrf_field() }}
      <h3 style="text-align:center">Add Student Marks</h3>
      <div class="form-group">
        <label for="exampleFormControlInput1">Student Name</label>
        <select name="student_id" class="form-control" required>
          <option value="">@lang('language.OPTION_SELECT')</option>
          @foreach($students as $student)
            <option value="{{ $student['id'] }}">{{ $student['name'] }}</option>
          @endforeach
        </select>
      </div>
      <div class="form-group">
        <label for="exampleFormControlSelect1">Term</label>
        <select name="term" class="form-control" required>
        <option value="">@lang('language.OPTION_SELECT')</option>
        <option value="One">@lang('language.OPTION_ONE')</option>
        <option value="Two">@lang('language.OPTION_TWO')</option>
        </select>
      </div>
      <div class="form-group">
        <label for="exampleFormControlSelect1">Marks</label>
        <div>
          <label for="exampleFormControlSelect1">Maths</label>
          <input type="number" class="form-control" name="maths" placeholder="Maths" required>
         <label for="exampleFormControlSelect1">Science</label>
          <input type="number" class="form-control" name="science" placeholder="Science" required>
          <label for="exampleFormControlSelect1">History</label>
          <input type="number" class="form-control" name="history" placeholder="History" required>
        </div>
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-primary">Add Marks</button>
      </div>
    </form>
  </div>
</div>
