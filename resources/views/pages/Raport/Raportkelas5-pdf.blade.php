<!DOCTYPE html>
<html>
<head>
<style>
  h1 {
			font-family: Arial, sans-serif;
			font-weight: bold;
			font-size: 48px;
			color: #333;
			text-shadow: 2px 2px 4px #aaa;
			text-align: center;
			margin-top: 50px;
		}

#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>
</head>
<body>

<h1>Raport Siswa Kelas 5</h1>

<table id="customers">
<tr>
    <th rowspan="2" style="text-align:center">
        No</th>
    <th rowspan="2" style="text-align:center">
        Nama</th>
    <th colspan="3" style="text-align:center">
        Nilai Tugas & Ujian</th>
    <th rowspan="2" style="text-align:center">
        Nilai UTS</th>
    <th rowspan="2" style="text-align:center">
        Nilai UAS</th>
    <th rowspan="2" style="text-align:center">
        Nilai Raport</th>
    <th rowspan="2" style="text-align:center">
        Grade</th>
</tr>
    <tr>
        <th style="text-align:center">Tugas</th>
        <th style="text-align:center">Ujian</th>
        <th style="text-align:center">KKM</th>
    </tr>
    @php
    $key=1;
    @endphp
<<<<<<< HEAD
    @foreach ($data5 as $row)
=======
    @foreach ($data as $row)
>>>>>>> origin/master
  <tr>
    <td style="text-align:center">{{ $key++ }}</td>
    <td style="text-align:center">{{ $row->namasiswa }}</td>
    <td style="text-align:center">{{ $row->tugas }}</td>
    <td style="text-align:center">{{ $row->ujian }}</td>
    <td style="text-align:center">{{ $row->average }}</td>
    <td style="text-align:center">{{ $row->uts }}</td>
    <td style="text-align:center">{{ $row->uas }}</td>
    <td style="text-align:center">{{ $row->nilairaport }}</td>
    <td style="text-align:center">{{ $row->grade }}</td>
  </tr>
  @endforeach
</table>

</body>
</html>