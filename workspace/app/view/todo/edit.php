<?php
require_once('./../../controller/TodoController.php');

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller = new TodoController();
    $controller->update();
    exit;
}

$controller = new TodoController();
$data = $controller->edit();
$todo = $data['todo'];
$params = $data['params'];

session_start();
$error_msgs = $_SESSION['error_msgs'];
unset($_SESSION['error_msgs']);

?>
<html>
<head>
    <meta charset="UTF-8">
    <title>TODOリスト</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="./../../public/css/main.css">
</head>
<body>
    <h1>編集</h1>
    <form action="./edit.php" method="post">
        <div>
            <div>タイトル</div>
            <input name="title" type="text" value="<?php if(isset($params['title'])):?><?php echo $params['title'];?><?php else:?><?php echo $todo['title'];?><?php endif;?>">
        </div>
        <div>
            <div>詳細</div>
            <textarea name="detail"><?php if(isset($params['detail'])):?><?php echo $params['detail'];?><?php else:?><?php echo $todo['detail'];?><?php endif;?></textarea>
        </div>
        <input type="hidden" name="todo_id" value="<?php echo $todo['id'];?>">
        <button type="submit">更新</button>
    </form>
    <?php if($error_msgs):?>
        <div>
            <ul>
                <?php foreach ($error_msgs as $error_msg): ?>
                    <li><?php echo $error_msg;?></li>
                <?php endforeach;?>
            </ul>
        </div>
    <?endif;?>
</body>
</html>