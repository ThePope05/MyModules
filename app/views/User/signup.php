<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $data['title'] ?></title>
</head>

<body>
    <h1><?= $data['title'] ?></h1>

    <form action="/User/signup" method="post">
        <div>
            <label for="name">Name</label>
            <input type="text" name="name" id="name" value="<?= $data['info']['name'] ?>">
            <span><?= $data['error']['name'] ?></span>
        </div>
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
            <label for="re_password">Password</label>
            <input type="password" name="re_password" id="re_password">
            <span><?= $data['error']['re_password'] ?></span>
        </div>
        <div>
            <button type="submit">Login</button>
        </div>
    </form>
</body>

</html>