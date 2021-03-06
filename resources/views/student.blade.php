<!doctype html> 
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Student Management System</title>
    <style>
      input[type=text], select {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
      }

      input[type=submit] {
        width: 100%;
        background-color: #4CAF50;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        border-radius: 4px;
        cursor: pointer;
      }

      input[type=submit]:hover {
        background-color: #45a049;
      }

      div {
        width: 70%;
        border-radius: 5px;
        background-color: #f2f2f2;
        padding: 1px;
        margin: 40px;

      }
      .aclass{
        margin: 10px;
      }
    </style>
  </head>
  <body>
    <!-- layout for index -->
    @if($layout=='index')
      <div class='container-fluid'>
        <section class="col">
          @include('studentlist')
        </section>
        <section class="col"></section>
      </div>
    <!-- layout for create -->
    @elseif($layout == 'create')
      <section class="col">
        @include('addstudent')
      </section>
      <section class="col"></section>
    <!-- layout for student mark -->
    @elseif($layout == 'studentmarks')
      <section class="col">
        @include('studentmarks')
      </section>
      <section class="col"></section>
    <!-- layout for mark list -->
    @elseif($layout == 'marklist')
      <section class="col">
        @include('marklist')
      </section>
      <section class="col"></section>
    <!-- layout for edit mark -->
    @elseif($layout == 'editmark')
      <section class="col">
        @include('editmark')
      </section>
      <section class="col"></section>
    <!-- layout for show --> 
    @elseif($layout == 'show')
      <section class="col">
        @include('studentlist')
      </section>
      <section class="col"></section>
    <!-- layout for dashboard -->
    @elseif($layout == 'dashboard')
      <section class="col">
        @include('studentlist')
      </section>
      <section class="col"></section>
      <!-- layout for edit -->
    @elseif($layout == 'edit')
      <section class="col">
        @include('editstudent')
      </section>
      <section class="col"></section>
    @endif

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>