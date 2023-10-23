<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesheet.css">
    <title>Parcijalni ispit 2</title>
</head>

<body>
    <div class="grid">
        <div class="slot">
            <form method="post">
                <label for="word">Upišite riječ</label></br>
                <input type="text" name="word" /></br>
                <button type="submit">Pošalji</button>
            </form>

            <?php
            if (empty($_POST['word'])) {
                echo 'Potrebno je upisati riječ.';
            }
            ?>
        </div>
        <div class="table">
            <table>
                <tr>
                    <th>Riječ</th>
                    <th>Broj slova</th>
                    <th>Broj suglasnika</th>
                    <th>Broj samoglasnika</th>
                </tr>
                <?php
                include_once 'functions.php';
                //Dohvatiti što je u datoteci json upisano
                $words_json = file_get_contents('words.json');
                $words = json_decode($words_json, true);
                // Provjeriti je li formom nešto poslano, ako je dodajem u niz i datoteku
                if (!empty($_POST['word'])) {
                    $word = $_POST['word'];
                    $words[] = [
                        'rijec' => $word,
                        'br_slova' => strlen($word),
                        'br_samoglasnici' => brSamoglasnika($word),
                        'br_suglasnici' => brSuglasnika($word)
                    ];
                    $words_json = json_encode($words);
                    file_put_contents('words.json', $words_json);
                }
                //Ispisujem sve iz niza/datoteke u tablicu
                foreach ($words as $word) {
                ?>
                    <tr>
                        <td><?php echo $word['rijec']; ?></td>
                        <td><?php echo $word['br_slova']; ?></td>
                        <td><?php echo $word['br_suglasnici']; ?></td>
                        <td><?php echo $word['br_samoglasnici']; ?></td>
                    </tr>
                <?php }; ?>
            </table>
        </div>
    </div>

</body>

</html>