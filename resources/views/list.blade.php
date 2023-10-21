<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col-md-12">

        <form action="{{route('getData')}}" method="POST" enctype="multipart/form-data">
          @csrf

          <div class="form-group" style="display: flex; float:right;">
            <input type="text" class="form-control" name="searchKeyword" id="searchKeyword" value="" placeholder="Search">
            <button type="submit" class="btn btn-primary">Search</button>
          </div>

        </form>
      </div>

    </div>
    <div class="row">
      <table class="table table-bordered dataTable no-footer">
        <thead>
          <tr>
            <th>No.</th>
            <th>Case title</th>
            <th>Admin name</th>
            <th>Case Image</th>
            <th>Created date</th>
          </tr>
        </thead>
        <tbody>

          @if(isset($data) && count($data)>0)
          @foreach($data as $key => $cases)
          <tr>
            <td>{{$key+1}}</td>
            <td>{{ $cases['name'] }}</td>
            <td>{{ $cases['admin'] }}</td>
            <td><img src="{{ $cases['image'] }}" alt="image" height="100px" width="100px"></td>
            <td>{{ date("d-m-Y", strtotime($cases['createdat'])) }}</td>
          </tr>
          @endforeach
          @else
          <tr>
            <td colspan="5">No data found.</td>
          </tr>
          @endif
        </tbody>
      </table>
    </div>
  </div>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script>
    $(function() {
      // var url = "{{url('')}}";
      var table = $("#example").DataTable({
        processing: true,
        serverSide: true,
        "bFilter": false,
        "bPaginate": false,
        ajax: base_url + "/student-profile-data-table",
        columns: [{
            data: "DT_RowIndex",
            name: "DT_RowIndex",
          },
          {
            data: "student_name",
            name: "student_name",
          },
          {
            data: "student_mobile",
            name: "student_mobile",
          },
          {
            data: "student_address",
            name: "student_address",
          },
          {
            data: "student_class",
            name: "student_class",
          },
          {
            data: "sports_name",
            name: "sports_name",
          },
          {
            data: "action",
            name: "action",
            orderable: false,
            searchable: false,
          },
        ],
      });

      function reload_table() {
        table.DataTable().ajax.reload(null, false);
      }
    });
  </script>
</body>

</html>