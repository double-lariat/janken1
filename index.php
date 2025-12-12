<?php
// PHPコードブロック開始

/**
 * ゲーム一覧のデータ
 * array(
 * 'タイトル' => 'リンク先URL'
 * )
 */
$games = [
    'じゃんけんゲーム' => './janken.php',
    // 今後ゲームを追加する場合はここに追加してください
];

?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>ゲーム一覧</title>
    <style>
        body { font-family: sans-serif; text-align: center; margin-top: 50px; background-color: #f4f4f9; }
        .container { background-color: #fff; padding: 30px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); display: inline-block; width: 300px; }
        h1 { color: #333; border-bottom: 2px solid #007bff; padding-bottom: 10px; margin-bottom: 20px; }
        ul { list-style: none; padding: 0; }
        li { margin: 15px 0; }
        li a {
            text-decoration: none;
            font-size: 1.2em;
            color: #007bff;
            display: block;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            transition: background-color 0.3s, color 0.3s;
        }
        li a:hover {
            background-color: #007bff;
            color: white;
            border-color: #007bff;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>ゲーム一覧</h1>
    <ul>
        <?php foreach ($games as $title => $url): ?>
            <li>
                <a href="<?php echo htmlspecialchars($url); ?>">
                    <?php echo htmlspecialchars($title); ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</div>

</body>
</html>
