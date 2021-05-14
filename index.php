<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reg</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/style.css">
</head>
<body>
    <main class="main">
        <section class="section-registration registration">
            <h2 class="registration__title title">Регистрация</h2>
            <form class="registration-form form" action="check.php" method="post">
                <div class="form__group">
                    <label class="form__group__text" for="name">Имя</label>
                    <input class="form__group__input input" type="text" name="name" id="name"
                    required minlength="2" maxlength="50">
                    <label class="form__group__text" for="login">Логин</label>
                    <input class="form__group__input input" type="text" name="login" id="login"
                    required minlength="2" maxlength="50">
                    <label class="form__group__text" for="pass">Пароль</label>
                    <input class="form__group__input input input-pass" type="password" name="pass" id="pass"
                    required minlength="6" maxlength="32">
                    <label class="registration__check__label check__label">
                        <input class="check__input check-pass" type="checkbox">
                        <span class="registration__check__fake check__fake"></span>
                        <span class="check__text">Показать пароль?</span>
                    </label>
                </div>
                <button class="form__btn btn" type="submit">Добавить</button>
            </form>
        </section>
    
        <section class="section-users users">
            <header class="users__header">
                <h2 class="users__title title">Список пользователей</h2>
                <form class="users__form" action="" method="post">
                    <input class="search-input input" type="search">
                    <img class="search-img" src="/assets/img/loupe.svg" alt="Лупа">
                </form>
            </header>
            <form class="table__form" action="delete.php" method="post">
            <table class="users__table">
                <thead>
                    <tr>
                        <th>
                            <label class="check__label">
                                <input class="check__input" type="checkbox">
                                <span class="check__fake"></span>
                            </label>
                        </th>
                        <th data-type="number">Id</th>
                        <th data-type="string">Имя</th>
                        <th data-type="string">Логин</th>
                        <th data-type="string">Пароль</th>
                    </tr>
                </thead>
                <?php
                // Подключение к БД
                require_once 'connection.php';
                $mysql = new mysqli($host, $user, $password, $database); 

                // Получаю все данные из таблицы
                $query = "SELECT * FROM `users`";
                $result = mysqli_query($mysql, $query) or die("Ошибка " . mysqli_error($link));

                if($result)
                {
                    foreach ($result as $result_row) {
                        echo "<tr>";
                        echo "<td><label class=check__label><input class=check__input name='delete_row[]' value='" . $result_row["id"] . "' type=checkbox><span class=check__fake></span></label></td>";
                        echo "<td>" . $result_row["id"] . "</td>";
                        echo "<td>" . $result_row["name"] . "</td>";
                        echo "<td>" . $result_row["login"] . "</td>";
                        echo "<td>" . $result_row["pass"] . "</td>";
                        echo "</tr>";
                    }
                    // очищаем результат
                    mysqli_free_result($result);
                }

                $mysql->close();
                ?>
                </table>
                <button class="users__btn btn" type="submit" disabled>Удалить</button>
                </form>
        </section>
    </main>

    <script>
    </script>
    <script src="./assets/js/table.js"></script>
    <script src="./assets/js/pass.js"></script>
</body>
</html>