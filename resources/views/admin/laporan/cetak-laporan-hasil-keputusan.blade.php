<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Laporan Hasil Keputusan</title>
	<style>
		*{
			font-family: 'Nunito', sans-serif;
		}
		body{
			padding-left: 50px;
			padding-right: 50px;
		}
		.container{
			margin-left: 20px;
			margin-right: 20px;
		}
		.number{
			color: #686868;
			font-weight: 400;
		}
		.number-group{
			margin-right: 30px;
			margin-left: 30px
		}
		.identity{
			padding-top: 30px;
			margin-left: 40px;
			justify-content: center;
		}
		tr td{
			font-size: 10px;
			border: 1px #9a9a9a solid;
		}
		tr th{
			font-size: 10px;
			border: 1px #9a9a9a solid;
		}
		.text-bold{
			font-weight: bold;
		}
		p{
			font-size: 12px;
			line-height: 14px;
		}
		.text-fine{
			color: #416ee8;
		}
		.text-trouble{
			color: #d11a32;
		}
    th{
      font-size: 10px;
    }
    .text-center{
      text-align: center;
    }
    .font-weight-bold{
      font-weight: bold;
    }
	</style>
</head>
<body>
	<section>
		<div class="container" style="text-align:center;">
      <h3>Laporan Hasil Keputusan</h3>
      <h3 style="margin-top:-10px;">Penentuan Karyawan Terbaik</h3>
			<hr>
		</div>
	</section>
	<section class="info">
		<div class="container" style="text-align:center;">
			<h5>Hasil Akhir Keputusan</h5>
			<table width="100%">
        <thead>
          <tr>
            <td class="text-center font-weight-bold">Nama Karyawan</td>
            <td class="text-center font-weight-bold">Nilai Akhir</td>
            <td class="text-center font-weight-bold">Ranking</td>
            <td class="text-center font-weight-bold">Keputusan</td>
          </tr>
        </thead>
        <tbody>
          <?php $i = 1 ?>
          @foreach($data as $d)
          <tr>
            <td class="text-center">{{ $d->name }}</td>
            <td class="text-center">{{ number_format((float)$d->total_sum, 3, '.', '') }}</td>
            <td class="text-center">{{ $i++ }}</td>
            <td class="text-center">
              @if($d->total_sum > 60)
                Lulus
              @elseif($d->total_sum <=60)
                Tidak Lulus
              @endif
            </td>
          </tr>
          @endforeach
        </tbody>
			</table>
		</div>
	</section>
	<section style="margin-top:20px;">
		<div class="container">
			<table style="text-align: center;" width="100%">
				<tr>
					<td width="50%" style="border:none !important;"></td>
					<td width="50%" style="border:none !important;">Jakarta, {{ date('D, d-M-Y') }}</td>
				</tr>
				<tr>
					<td width="50%" style="border:none !important;"></td>
					<td width="50%" style="border:none !important;">Hormat Kami</td>
				</tr>
				<tr>
					<td width="50%" style="border:none !important;"></td>
					<td width="50%" style="border:none !important;"></td>
				</tr>
				<tr>
					<td width="50%" style="border:none !important;"></td>
					<td width="50%" style="border:none !important;"></td>
				</tr>
				<tr>
					<td width="50%" style="border:none !important;"></td>
					<td width="50%" style="border:none !important;"></td>
				</tr>
				<tr>
					<td width="50%" style="border:none !important;"></td>
					<td width="50%" style="border:none !important;"></td>
				</tr>
				<tr>
					<td width="50%" style="border:none !important;"></td>
					<td width="50%" style="border:none !important;"></td>
				</tr>
				<tr>
					<td width="50%" style="border:none !important;"></td>
					<td width="50%" style="border:none !important;"></td>
				</tr>
				<tr>
					<td width="50%" style="border:none !important;"></td>
					<td width="50%" style="border:none !important;"></td>
				</tr>
				<tr>
					<td width="50%" style="border:none !important;"></td>
					<td width="50%" style="border:none !important;"></td>
				</tr>
				<tr>
					<td width="50%" style="border:none !important;"></td>
					<td width="50%" style="border:none !important;">( Indriansyah )</td>
				</tr>
			</table>
		</div>
	</section>
</body>
</html>