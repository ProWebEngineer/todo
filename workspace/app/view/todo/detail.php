<?php
require_once('./../../controller/TodoController.php');

$controler = new TodoController;
$todo = $controler->detail();
?>
<html>
<!--<head>-->
<!--    <meta charset="UTF-8">-->
<!--    <title>TODOリスト</title>-->
<!--    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">-->
<!--    <link rel="stylesheet" type="text/css" href="./../../public/css/main.css">-->
<!--</head>-->
<?php require_once('./../include/header.php');?>

<body>
<h1>詳細画面</h1>
<div>
    <div>タイトル</div>
    <div><?php echo $todo['title'];?></div>
</div>
<div>
    <div>詳細</div>
    <div><?php echo $todo['detail'];?></div>
</div>
<div>
    <div>ステータス</div>
    <div><?php echo $todo['display_status'];?></div>
</div>
<div>
    <button>
        <a href="./edit.php?todo_id=<?php echo $todo['id'];?>">編集</a>
    </button>
</div>

</body>
</html>