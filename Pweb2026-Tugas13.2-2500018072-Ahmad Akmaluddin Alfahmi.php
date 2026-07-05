<!DOCTYPE html>
<html>
<head>
    <title>Aplikasi Penilaian Mahasiswa</title>
    <style>
        body{
            font-family: Arial;
            background:grey;
        }

        .container{
            width:500px;
            margin:auto;
            background:white;
            padding:20px;
            margin-top:30px;
            border-radius:10px;
        }

        input{
            width:100%;
            padding:10px;
            margin-top:5px;
            margin-bottom:15px;
        }

        button{
            padding:10px 20px;
        }

        table{
            width:100%;
            border-collapse:collapse;
            margin-top:20px;
        }

        table,th,td{
            border:1px solid black;
        }

        th,td{
            padding:10px;
            text-align:center;
        }
    </style>
</head>
<body>

<div class="container">

<h2>Aplikasi Penilaian Mahasiswa</h2>

<form method="post">

<input type="text" name="nama1" placeholder="Nama Mahasiswa 1" required>
<input type="number" name="nilai1" placeholder="Nilai Mahasiswa 1" required>

<input type="text" name="nama2" placeholder="Nama Mahasiswa 2" required>
<input type="number" name="nilai2" placeholder="Nilai Mahasiswa 2" required>

<input type="text" name="nama3" placeholder="Nama Mahasiswa 3" required>
<input type="number" name="nilai3" placeholder="Nilai Mahasiswa 3" required>

<button type="submit" name="proses">Proses</button>

</form>

<?php

function grade($nilai)
{
    if($nilai>=85)
        return "A";
    elseif($nilai>=70)
        return "B";
    elseif($nilai>=60)
        return "C";
    elseif($nilai>=50)
        return "D";
    else
        return "E";
}

function rataRata($data)
{
    $jumlah=0;

    foreach($data as $d)
    {
        $jumlah+=$d["nilai"];
    }

    return $jumlah/count($data);
}

if(isset($_POST["proses"]))
{

$mahasiswa=[
[
"nama"=>$_POST["nama1"],
"nilai"=>$_POST["nilai1"]
],
[
"nama"=>$_POST["nama2"],
"nilai"=>$_POST["nilai2"]
],
[
"nama"=>$_POST["nama3"],
"nilai"=>$_POST["nilai3"]
]
];

echo "<table>";

echo "<tr>
<th>Nama</th>
<th>Nilai</th>
<th>Grade</th>
</tr>";

foreach($mahasiswa as $m)
{
echo "<tr>";
echo "<td>".$m["nama"]."</td>";
echo "<td>".$m["nilai"]."</td>";
echo "<td>".grade($m["nilai"])."</td>";
echo "</tr>";
}

echo "</table>";

echo "<h3>Rata-rata Nilai : ".rataRata($mahasiswa)."</h3>";

}

?>

</div>

</body>
</html>