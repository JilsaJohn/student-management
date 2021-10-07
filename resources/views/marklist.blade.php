<h1 class="text-center" >STUDENT MARK LIST</h1>
<a href="{{ url('create')}}" class="btn btn-primary  active float-right aclass" role="button" aria-pressed="true">@lang('language.STUDENT_ADD')</a>
<table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Maths</th>
      <th scope="col">Science</th>
      <th scope="col">History</th>
      <th scope="col">Term</th>
      <th scope="col">Total Marks</th>
      <th scope="col">Created On</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @php $i=1; @endphp
    @foreach($marks as $mark)
    <tr>
      <td scope="row">{{ $i }}</td>
      <td>{{ $mark['Student']['name'] }}</td>
      <td>{{ $mark['maths'] }}</td>
      <td>{{ $mark['science'] }}</td>
      <td>{{ $mark['history'] }}</td>
      <td>{{ $mark['term'] }}</td>
      <td>{{ $mark['total'] }}</td>
      <td>{{ $mark['created_at'] }}</td>
      <td>
        <a href="{{ url('markedit/'.Encrypt($mark['id']))}}" class="btn btn-secondary">Edit</a>
        <a href="{{ url('markdelete/'.Encrypt($mark['id']))}}" class="btn btn-danger">Delete</a>
      </td>
    </tr>
    @php $i++; @endphp
    @endforeach
  </tbody>
</table>
