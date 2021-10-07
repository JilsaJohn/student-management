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
            <option value="{{ $student['id'] }}" @if($student['id'] == $mark['student_id'])) selected @endif>{{ $student['name'] }}</option>
          @endforeach
        </select>
      </div>
      <div class="form-group">
        <label for="exampleFormControlSelect1">Term</label>
        <select name="term" class="form-control" required>
        <option value="">@lang('language.OPTION_SELECT')</option>
        <option value="One" @if($mark['term'] == 'One' )) selected @endif>@lang('language.OPTION_ONE')</option>
        <option value="Two" @if($mark['term'] == 'Two' )) selected @endif>@lang('language.OPTION_TWO')</option>
        </select>
      </div>
      <div class="form-group">
        <label for="exampleFormControlSelect1">Marks</label>
        <div>
          <label for="exampleFormControlSelect1">Maths</label>
          <input type="number" class="form-control" name="maths" placeholder="Maths" value="{{ $mark['maths']}}" required>
         <label for="exampleFormControlSelect1">Science</label>
          <input type="number" class="form-control" name="science" placeholder="Science" value="{{ $mark['science']}}" required>
          <label for="exampleFormControlSelect1">History</label>
          <input type="number" class="form-control" name="history" placeholder="History" value="{{ $mark['history']}}" required>
        </div>
      </div>
     
      <div class="form-group">
        <button type="submit" class="btn btn-primary">Edit Marks</button>
      </div>
    </form>
  </div>
</div>