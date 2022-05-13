<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.rtl.min.css" integrity="sha384-+qdLaIRZfNu4cVPK/PxJJEy0B0f3Ugv8i482AKY7gwXwhaCroABd086ybrVKTa0q" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
    <style>
        .todo-item{
            display: flex !important;
            margin: 8px 0;
            border-radius: 0;
            background: #f7f7f7;
        }
        .todo-item.completed div{
            text-decoration: line-through;
            
        }
        .todo-item-remove{
            visibility: hidden;
        }
        .todo-item:hover .todo-item-remove{
            visibility :visible;
        }
    </style>
    <title>Tasks</title>
</head>
<body>




    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="card mt-3">
                    <div class="card-header pt-3">
                        <form action="task/create" method="post">
                        <div class="input-group">
                            <input type="text" class="form-control" name="description" placeholder="مهمة جديدة" required>
                            <button type="submit" class="btn btn-success">حفظ</button>

                        </div>
                        </form>
                    </div>
                    <div class="card-body pt-3">
                        <ul class="nav nav-pills justify-content-center mb-3">
                            <li class="nav-item">
                                <a href="<?= home()?>" class="nav-link <?php if(!isset($_GET['completed'] )) echo 'active';?>">الكل</a>
                            </li>
                            <li class="nav-item">
                                <a href="?completed=0" class="nav-link <?= \app\core\Request::get('completed')?'':'active'?>">قيد التنفيذ</a>
                            </li>
                            <li class="nav-item">
                                <a href="?completed=1" class="nav-link <?= \app\core\Request::get('completed')?'active':''?>">مكتملة</a>
                            </li>
                        </ul>
                        <?php foreach($tasks as $task) :?>
                            <div class="todo-item p-2 <?= !$task->completed ? : 'completed'?>">
                                <div class="p-1">
                                    <a href="task/update?id=<?=$task->id?>&completed=<?= $task->completed ? '0' : '1' ?>">
                                        <i class="bi fd-5 <?= $task->completed ? 'bi-check-square':'bi-clock text-secondary'?>"></i>
                                    </a>
                                </div>
                                <div class="flex-fill m-auto p-2">
                                    <?php echo $task->description ?>
                                </div>
                                <div class="mb-2">
                                    <a href="task/delete?id=<?= $task->id ?>" class="todo-item-remove">
                                    <i class="bi bi-trash text-danger fs-4"></i>
                                    </a>
                                </div>
                            </div>
                        <?php endforeach?>
                    </div>
                </div>
            </div>
        </div>

    </div>

</body>
</html>