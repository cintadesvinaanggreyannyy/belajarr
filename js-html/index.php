<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hitung Rata-Rata Nilai</title>
</head>
<body>
    <h1>Hitung Rata-Rata Nilai</h1>
    <form method="post" action="">
        <label for="values">Masukkan nilai (pisahkan dengan koma):</label><br>
        <input type="text" id="values" name="values" placeholder="Contoh: 80,90,70,85" required><br><br>
        
        <button type="submit" name="calculate_average">Hitung</button>
    </form>
    
    <h2>Hasil:</h2>
    <?php
    if (isset($_POST['calculate_average'])) {
        $values = $_POST['values'];
        $valuesArray = array_map('trim', explode(',', $values));

        // Validasi nilai input
        $isValid = true;
        foreach ($valuesArray as $value) {
            if (!is_numeric($value)) {
                $isValid = false;
                break;
            }
        }

        if ($isValid) {
            $total = array_sum($valuesArray);
            $count = count($valuesArray);
            $average = $total / $count;

            echo "<p>Rata-rata nilai adalah " . number_format($average, 2) . "</p>";
        } else {
            echo "<p>Masukkan nilai yang valid! Pastikan hanya angka yang dipisahkan dengan koma.</p>";
        }
    }
    ?>
</body>
</html>