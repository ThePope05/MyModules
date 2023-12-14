<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $data['title'] ?></title>
</head>

<body>
    <h1><?= $data['title'] ?></h1>

    <form action="/User/login" method="post">
        <div>
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="<?= $data['info']['email'] ?>">
            <span><?= $data['error']['email'] ?></span>
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" name="password" id="password">
            <span><?= $data['error']['password'] ?></span>
        </div>
        <div>
            <button type="submit">Login</button>
        </div>
    </form>
</body>

</html>