<?php 

require_once("./app/database/connect.php");

require_once("./app/database/error.php");

$comment_array = array();

// コメントデータを取得してくる
$sql = "SELECT * FROM comment";
$stmt = $pdo->prepare($sql);
$stmt->execute();

$comment_array = $stmt;

?>

<?php require_once("./parts/head.php"); ?>

<body>
    <div class="container">
        <h1>掲示板</h1>
    </div>
    <div class="container">
        <h2>投稿内容一覧</h2>
        <form class="formWrapper" action="index.php" method="POST">
            <div>
                <label>名前：</label>
                <input type="text" name="username" value="">
                <!-- <input type="hidden" name="threadID" value=""> -->
            </div>
            <div>
                <textarea class="commentTextArea" name="body"></textarea>
            </div>
            <input type="submit" value="投稿" name="submitButton">
            <!-- 位置取得用 -->
            <!-- <input type="hidden" name="position" value="0"> -->
        </form>
        <!-- バリデーションチェックのエラー文吐きだし -->
        <?php if (isset($error_message)) : ?>
            <ul class="errorMessage">
                <?php foreach ($error_message as $error) : ?>
                    <li><?php echo $error ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
        <section class="sec01 mt-5">
        <hr>
        <?php foreach($comment_array as $comment) : ?>
            <article>
                <p class="id mb-0">No:<?php echo $comment["id"]; ?></p>
                <time class="time"><?php echo $comment["post_date"]; ?></time>
                <div class="nameArea d-flex mt-3">
                    <span>名前:</span><p class="username"><?php echo $comment["username"]; ?></p>
                </div>
                    <p class="comment"><?php echo $comment["body"]; ?></p>
                    <a href="./app/database/delete.php?id=<?php echo $comment["id"]; ?>">削除する</a>
            </article>
            <hr>
            <?php endforeach ?>
        </section>
    </div>
</body>
