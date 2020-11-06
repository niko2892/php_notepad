<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Create task</h1>
                <form action="store.php" method="post">
                    <div class="form-group">
                        <input type="text" class="form-control" name="title">
                    </div>

                    <div class="form-group">
                        <textarea name="content" class="form-control"></textarea>
                    </div>

                    <div class="form-group">
                       <button class="btn btn-success" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>