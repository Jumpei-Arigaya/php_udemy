<?php

session_start();

header('X-FREAME-OPTION:DENY');

// スーパーグローバル変数で９種類ある
// echo $_GET["your_name"];
// foreach ($_GET as $a) {
//     echo $a;
// }

echo '<pre>';
var_dump($_SESSION);
echo '</pre>';

$pageFLag = 0;

if (!empty($_POST['btn_confirm'])) {
    $pageFLag = 1;
}

if (!empty($_POST['btn_submit'])) {
    $pageFLag = 2;
}

// echo $pageFLag;
function h($str)
{
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php if ($pageFLag === 0) : ?>
        <?php
        if (!isset($_SESSION['csrfToken'])) {
            $csrfToken =  bin2hex(random_bytes(32));
            $_SESSION['csrfToken'] = $csrfToken;
        }
        $token = $_SESSION['csrfToken'];
        ?>
        <form method='POST' action="input.php">
            氏名
            <input type='text' name='your_name' value="<?php echo isset($_POST['your_name']) ? h($_POST['your_name']) : ''; ?>">
            メールアドレス
            <input type='email' name='email' value="<?php if (!empty($_POST['email'])) {
                                                        echo h($_POST['email']);
                                                    } ?>">
            ホームページ
            <input type='url' name='url' value="<?php if (!empty($_POST['url'])) {
                                                    echo h($_POST['url']);
                                                } ?>">
            性別
            <input type='radio' name='gender' value=0>男性
            <input type='radio' name='gender' value=1>女性
            <br>
            <input type='submit' name='btn_confirm' value="確認する">
            <input type='hidden' name='csrf' value="<?php echo $token; ?>">
        </form>
    <?php endif; ?>
    <?php if ($pageFLag === 1) : ?>
        <?php if ($_POST['csrf'] === $_SESSION['csrfToken']) : ?>
            <form method='POST' action="input.php">
                氏名
                <?php echo h($_POST['your_name']); ?>
                <br>
                メールアドレス
                <?php echo h($_POST['email']); ?>
                <br>
                <input type='submit' name='back' value='戻る'>
                <input type='submit' name='btn_submit' value='送信する'>
                <input type='hidden' name='your_name' value=' <?php echo h($_POST['your_name']); ?>'>
                <input type='hidden' name='email' value=' <?php echo h($_POST['email']); ?>'>
                <input type='hidden' name='csrf' value=' <?php echo h($_POST['csrf']); ?>'>
            </form>
        <?php endif; ?>
    <?php endif; ?>
    <?php if ($pageFLag === 2) : ?>
        <?php echo $_POST['csrf']; ?>
        <?php echo $_SESSION['csrfToken']; ?>
        <h1>Debug: ここに到達しました</h1> <!-- 追加 -->
        <?php if ($_POST['csrf'] === $_SESSION['csrfToken']) : ?>
            <!-- 送信が完了しました -->
            <!-- <?php unset($_SESSION['csrfToken']); ?> -->
        <?php endif; ?>
    <?php endif; ?>
    <!-- <form method='POST' action="input.php">
        氏名
        <input type='text' name='your_name'>
        <div>
            <input type='checkbox' name='sports[]' value='野球'>野球
            <input type='checkbox' name='sports[]' value='ゴルフ'>ゴルフ
            <input type='checkbox' name='sports[]' value='サッカー'>サッカー
        </div>
        <input type='submit' value='送信'>
    </form> -->
</body>

</html>