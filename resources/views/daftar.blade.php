<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kukuh Agung</title>
</head>
<body>
    <form action="/kirim" method="POST">
        @csrf
        <label for="">Nama</label> <br>
        <input type="text" name="nama" id=""> <br> <br>
        <label for="">Alamat</label> <br>
        <textarea name="alamat" id="" cols="30" rows="10"></textarea> <br> <br>

        <input type="submit" value="kirim">
    </form>
</body>
</html>