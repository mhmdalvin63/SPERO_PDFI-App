<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Absensi Event</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<style>
  body{
    font-family: 'Quicksand', sans-serif;
    width: 100vw;
}
</style>
<body>
 <p>Tunjukan Qr Code pada petugas untuk absensi kehadiran Anda. Terimakasih sudah mengikuti Event Pdfi.</p>
    <div class="qr">
        {!! $qr !!}
    </div>
</body>
</html>