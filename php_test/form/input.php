<?php

session_start();

require 'varidation.php';

header('X-FREAME-OPTION:DENY');

// スーパーグローバル変数で９種類ある
// echo $_GET["your_name"];
// foreach ($_GET as $a) {
//     echo $a;
// }

// echo '<pre>';
// var_dump($_POST['gender']);
// echo '</pre>';
// echo isset($_POST['gender']);
// echo isset($_POST['gender']);

echo $_POST['gender'];

$pageFLag = 0;
$erros = varidation($_POST);

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
            <br>
            ホームページ
            <input type='url' name='url' value="<?php if (!empty($_POST['url'])) {
                                                    echo h($_POST['url']);
                                                } ?>">
            <br>
            性別
            <input type='radio' name='gender' value='0' <?php if (isset($_POST['gender']) && $_POST['gender'] === '0') {
                                                            echo 'checked';
                                                        } ?>>
            男性

            <input type='radio' name='gender' value='1' <?php if (isset($_POST['gender']) && $_POST['gender'] === '1') {
                                                            echo 'checked';
                                                        } ?>>
            女性


            <br>
            年齢
            <select name="age">
                <option value="1">〜19歳</option>
                <option value="2">20歳〜29歳</option>
                <option value="3">30歳〜39歳</option>
                <option value="4">40歳〜49歳</option>
                <option value="5">50歳〜59歳</option>
                <option value="6">60歳〜69歳</option>
            </select>
            <br>
            電話番号
            <input type='text' name='phone' value="<?php if (!empty($_POST['phone'])) {
                                                        echo h($_POST['phone']);
                                                    } ?>">
            <br>
            お問い合わせ内容
            <textarea name='contact'>
                <?php if (!empty($_POST['contact'])) {
                    echo h($_POST['contact']);
                } ?>
            </textarea>
            <br>
            注意事項のチェック
            <input type='checkbox' name='cation' value='1'>注意事項にチェックする
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
                <br>
                ホームページ
                <?php echo h($_POST['url']); ?>
                <br>
                <br>
                性別
                <?php
                if ($_POST['gender'] === '0') {
                    echo '〜19歳';
                };
                if ($_POST['gender'] === '1') {
                    echo '女性';
                };
                ?>
                年齢
                <?php
                if ($_POST['age'] === '1') {
                    echo '男性';
                };
                if ($_POST['age'] === '2') {
                    echo '20歳〜29歳';
                };
                if ($_POST['age'] === '3') {
                    echo '30歳〜39歳';
                };
                if ($_POST['age'] === '4') {
                    echo '40歳〜49歳';
                };
                if ($_POST['age'] === '5') {
                    echo '50歳〜59歳';
                };
                if ($_POST['age'] === '6') {
                    echo '60歳〜69歳';
                };
                ?>
                <br>
                <input type='submit' name='back' value='戻る'>
                <input type='submit' name='btn_submit' value='送信する'>
                <input type='hidden' name='your_name' value=' <?php echo h($_POST['your_name']); ?>'>
                <input type='hidden' name='email' value=' <?php echo h($_POST['email']); ?>'>
                <input type='hidden' name='gender' value=' <?php echo h($_POST['gender']); ?>'>
                <input type='hidden' name='age' value=' <?php echo h($_POST['age']); ?>'>
                <input type='hidden' name='contact' value=' <?php echo h($_POST['contact']); ?>'>
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