<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
  <h3 style="text-align: center;">Absensi Siswa Untuk Seluruh Kelas</h3>
  <br>
	<table class="table table-striped table-bordered table-hover table-checkable order-column valign-middle" id="example4">
		<thead>
			<tr>
                <th> No </th>
				<th> Nama Lengkap </th>
				<th> Kelas </th>
				<th> Tanggal </th>
				<th> Absensi </th>
				<th> Keterangan </th>
			</tr>
		</thead>
        @php
        $no=1;
        @endphp
		@foreach($data as $row)
		<tbody>
			<tr class="odd gradeX">
                <td>{{ $no++ }}</td>
				<td>{{ $row->username }}</td>
				<td>{{ $row->kelas }}</td>
				<td>{{ $row->date }}</td>
				<td>{{ $row->absensi }}</td>
				<td class="left">{{ $row->keterangan }}</td>
				</tr>
			</tbody>
			@endforeach
		</table>
</body>
</html>