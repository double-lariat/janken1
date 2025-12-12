<?php
// PHPコードブロック開始

/**
 * 処理の流れ
 * 1. ユーザーの選択（手）をGETパラメータから取得する
 * 2. コンピュータの選択（手）をランダムに決定する
 * 3. ユーザーとコンピュータの手を比較し、勝敗を判定する
 * 4. 結果をHTMLとして出力する
 */

// ----------------------------------------------------
// 1. 定義と初期値
// ----------------------------------------------------

// じゃんけんの手を定義
// キーは値、バリューは表示名
const HANDS = [
    'rock'    => 'グー',
    'scissors' => 'チョキ',
    'paper'    => 'パー',
];

// 結果メッセージを格納する変数
$message = '';
// ユーザーとコンピュータの選択を格納する変数
$user_hand_name = '';
$computer_hand_name = '';

// ----------------------------------------------------
// 2. ユーザーとコンピュータの選択、勝敗判定ロジック
// ----------------------------------------------------

// ユーザーの選択を取得 (GETパラメータ 'choice' が存在し、かつ有効な手であるか確認)
$user_choice = $_GET['choice'] ?? null;

if ($user_choice !== null && isset(HANDS[$user_choice])) {
    // ユーザーが有効な手を選択した場合

    // 2-1. コンピュータの選択（ランダム）
    $computer_choice = array_rand(HANDS);

    // 2-2. 表示用の手の名前を設定
    $user_hand_name = HANDS[$user_choice];
    $computer_hand_name = HANDS[$computer_choice];

    // 2-3. 勝敗判定ロジック
    // 引き分け
    if ($user_choice === $computer_choice) {
        $message = '引き分けです！';
    }
    // ユーザーの勝ち (グー > チョキ, チョキ > パー, パー > グー)
    elseif (
        ($user_choice === 'rock' && $computer_choice === 'scissors') ||
        ($user_choice === 'scissors' && $computer_choice === 'paper') ||
        ($user_choice === 'paper' && $computer_choice === 'rock')
    ) {
        $message = 'あなたの勝ちです！おめでとうございます🎉';
    }
    // コンピュータの勝ち
    else {
        $message = 'コンピュータの勝ちです...残念😢';
    }

} elseif ($user_choice !== null) {
    // 無効な手が指定された場合
    $message = '無効な選択です。グー、チョキ、パーのいずれかを選択してください。';
} else {
    // 最初のアクセス時または選択がない場合
    $message = 'じゃんけん... ポン！';
}

// ----------------------------------------------------
// 3. HTML出力
// ----------------------------------------------------
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>じゃんけんゲーム</title>
    <style>
        body { font-family: sans-serif; text-align: center; margin-top: 50px; background-color: #f4f4f9; }
        .container { background-color: #fff; padding: 30px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); display: inline-block; }
        h1 { color: #333; }
        .result { margin: 20px 0; padding: 15px; border: 2px solid #ddd; border-radius: 5px; background-color: #e9ecef; }
        .result strong { font-size: 1.2em; display: block; margin-bottom: 5px; color: #007bff; }
        .hands button { font-size: 24px; padding: 15px 30px; margin: 10px; cursor: pointer; border: none; border-radius: 8px; transition: background-color 0.3s; }
        .hands button:hover { opacity: 0.8; }
        .rock { background-color: #ff6347; color: white; } /* Tomato */
        .scissors { background-color: #ffa500; color: white; } /* Orange */
        .paper { background-color: #1e90ff; color: white; } /* Dodger Blue */
    </style>
</head>
<body>

<div class="container">
    <h1>じゃんけんゲーム</h1>

    <div class="result">
        <?php if (!empty($user_hand_name) && !empty($computer_hand_name)): ?>
            <p><strong>あなたの手:</strong> <?php echo htmlspecialchars($user_hand_name); ?></p>
            <p><strong>コンピュータの手:</strong> <?php echo htmlspecialchars($computer_hand_name); ?></p>
            <hr>
        <?php endif; ?>
        <h2><?php echo htmlspecialchars($message); ?></h2>
    </div>

    <div class="hands">
        <p>あなたの手を選んでください:</p>
        <a href="?choice=rock"><button class="rock">グー (✊)</button></a>
        <a href="?choice=scissors"><button class="scissors">チョキ (✌️)</button></a>
        <a href="?choice=paper"><button class="paper">パー (🖐️)</button></a>
    </div>
</div>

</body>
</html>
