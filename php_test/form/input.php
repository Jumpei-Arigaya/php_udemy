<?php
// スーパーグローバル変数で９種類ある
// echo $_GET["your_name"];
// foreach ($_GET as $a) {
//     echo $a;
// }

echo '<pre>';
var_dump($_POST);
echo '</pre>';

$pageFLag = 0;

if (!empty($_POST['btn_confirm'])) {
    $pageFLag = 1;
}

if (!empty($_POST['btn_submit'])) {
    $pageFLag = 2;
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
        <form method='POST' action="input.php">
            氏名
            <input type='text' name='your_name' value="<?php echo isset($_POST['your_name']) ? $_POST['your_name'] : ''; ?>">
            メールアドレス
            <input type='email' name='email' value="<?php if (!empty($_POST['email'])) {
                                                        echo $_POST['email'];
                                                    } ?>">
            <br>
            <input type='submit' name='btn_confirm' value="確認する">
        </form>
    <?php endif; ?>
    <?php if ($pageFLag === 1) : ?>
        <form method='POST' action="input.php">
            氏名
            <?php echo $_POST['your_name']; ?>
            <br>
            メールアドレス
            <?php echo $_POST['email']; ?>
            <br>
            <input type='submit' name='back' value='戻る'>
            <input type='submit' name='btn_submit' value='送信する'>
            <input type='hidden' name='your_name' value=' <?php echo $_POST['your_name']; ?>'>
            <input type='hidden' name='email' value=' <?php echo $_POST['email']; ?>'>
        </form>
    <?php endif; ?>
    <?php if ($pageFLag === 2) : ?>
        送信が完了しました
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