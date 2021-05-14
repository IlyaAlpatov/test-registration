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

                <tr>
                    <td>
                        <label class="check__label">
                            <input class="check__input" type="checkbox">
                            <span class="check__fake"></span>
                        </label>
                    </td>
                    <td>1</td>
                    <td>Илья</td>
                    <td>Лангуст</td>
                    <td>4523</td>
                </tr>
                <tr>
                    <td>
                        <label class="check__label">
                            <input class="check__input" type="checkbox">
                            <span class="check__fake"></span>
                        </label>
                    </td>
                    <td>2</td>
                    <td>Настя</td>
                    <td>Кузя</td>
                    <td>1234</td>
                </tr>