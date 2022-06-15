<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Student Details</h2>
             
  <table class="table">
    <thead>
      <tr>
        <th>#</th>
        <th>Name</th>
        <th>Age</th>
        <th>Class</th>
        <th>School Name</th>
        <th>Father`s Name</th>
        <th>Phone Number</th>
        <th>Date</th>
      </tr>
    </thead>
    <tbody>
        @foreach($student as $key=>$std)
      <tr>
        <td>{{++$key}}</td>
        <td>{{$std->name}}</td>
         <td>{{$std->age}}</td>
        <td>{{$std->class}}</td>
        <td>{{$std->school_name}}</td>
        <td>{{$std->father_name}}</td>
        <td>{{$std->phone_number}}</td>
        <td>{{ date("d-m-Y", strtotime($std->created_at))}}</td>
         
      </tr>
      @endforeach
      
    </tbody>
  </table>
</div>

</body>
</html>
