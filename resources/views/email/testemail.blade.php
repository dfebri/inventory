<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Email Notify</title>
    <style>
        body {
            background-color:#bdc3c7;
            /* margin-top:1px */
            /* margin:0; */
        }
        .card {
            background-color:#fff;
            /* padding:5px; */
            /* margin-top:5px; */
            margin:5px;
            text-align:left;
            /* margin: auto; */
            width: 580px; 
            max-width: 580px;
            /* margin-top:10%; */
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16), 0 3px 6px rgba(0, 0, 0, 0.23);
        }
        .button {
            background-color: #e7e7e7; color: black;
            border: none;
            color: black;
            padding: 8px 15px;
            border: 2px solid #008CBA;
            border-radius: 10px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 12px;
        }
        .h4{
            font-size: 12px;
            color: black;
            font-weight: bold;
            font-style: italic;
            /* margin-top: 5px; */
        }
        .p{
            font-size: 12px;
            color: black;
            font-weight: normal;
            /* margin-top: 5px; */
        }
        
    </style>
</head>

<body>
    @foreach ($data as $item)
        <div class="card">
            <p>Request dari <b>{{ $item->bk_user }}</b>, Departement <b>{{ $item->bk_tujuan }}</b></p>
            <p>Nama Barang <b>{{ $item->barang_nama }}</b>, Jumlah Barang <b>{{ $item->bk_jumlah }}</b></p>
            <hr>
        </div>
    @endforeach
    <a class="button" href="https://atkwk.my.id/admin/barang-keluar">View</a>
    <h4>by Team HRGA</h4>
</body>
</html>

