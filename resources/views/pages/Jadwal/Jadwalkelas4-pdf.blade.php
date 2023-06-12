<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
  <h3 style="text-align: center;">Jadwal Mata Pelajaran Kelas 4</h3>
  <br>
	<table class="table table-striped table-bordered table-hover table-checkable order-column valign-middle" id="example4">
		<thead>
			<tr>
				<th> Waktu </th>
				<th> Senin </th>
				<th> Selasa </th>
				<th> Rabu </th>
				<th> Kamis </th>
				<th> Jumat </th>
				<th> Sabtu </th>
			</tr>
		</thead>
		@foreach($data4 as $row)
		<tbody>
			<tr class="odd gradeX">
				<td>{{ $row->waktu_pelajaran }}</td>
				<td>{{ $row->senin }}</td>
				<td>{{ $row->selasa }}</td>
				<td>{{ $row->rabu }}</td>
				<td class="left">{{ $row->kamis }}</td>
				<td>{{ $row->jumat }}</td>
				<td>{{ $row->sabtu }}</td>
				</tr>
			</tbody>
			@endforeach
		</table>
</body>
</html>