<h1 class="text-center" >@lang('language.STUDENT_LIST')</h1>
<!-- student add link -->
<a href="{{ url('create')}}" class="btn btn-primary  active float-right aclass" role="button" aria-pressed="true">@lang('language.STUDENT_ADD')</a>
<!-- student mark add link -->
<a href="{{ url('studentmarks')}}" class="btn btn-primary  active float-right aclass" role="button" aria-pressed="true">@lang('language.STUDENT_MARKS_ADD')</a>
  <!-- listing student details with edit and delete actions -->
  <table class="table">
    <thead class="thead-light">
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Name</th>
        <th scope="col">Age</th>
        <th scope="col">Gender</th>
        <th scope="col">Reporting Teacher</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @php $i=1; @endphp
      @foreach($students as $student)
      <tr>
        <td scope="row">{{ $i }}</td>
        <td>{{ $student['name'] }}</td>
        <td>{{ $student['age'] }}</td>
        <td>{{ $student['gender'] }}</td>
        <td>{{ $student['Teacher']['name'] }}</td>
        <td>
          <a href="{{ url('studentlist/'.Encrypt($student['id']).'/edit')}}" class="btn btn-secondary">Edit</a>
          {{ Form::open(array('class'=>'confirm','url' => '/studentlist/'.Encrypt($student['id']), 'method' => 'delete','style'=>'display:inline')) }}
            <button type="submit" class="btn btn-danger btn-elevate btn-icon"  onclick="return confirm('Are you sure?')"><i class="la la-trash"></i>Delete</button>
          {{ Form::close()}}
        </td>
      </tr>
      @php $i++; @endphp
      @endforeach
    </tbody>
  </table>
