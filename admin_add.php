<?php
session_start();

// Проверяем, авторизован ли пользователь
if(!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] !== true) {
    // Если пользователь не авторизован, перенаправляем его на страницу авторизации
    header("Location: login.php");
    exit;
}

// ID авторизованного пользователя
$userId = $_SESSION['userId'];

// Подключение к базе данных
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sova";

$conn = new mysqli($servername, $username, $password, $dbname);

// Проверяем соединение
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Получаем данные пользователя из базы данных
$sql = "SELECT u.isAdmin, g.name, g.image, g.price FROM users u
        JOIN goods g WHERE u.id = $userId";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Пользователь найден
    $row = $result->fetch_assoc();
    if($row['isAdmin'] == "true") {
        // Пользователь является администратором, отображаем содержимое страницы
        echo '
        <!DOCTYPE html>
        <html lang="ru">
          <head>
            <meta charset="UTF-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1.0" />
            <title>Админ – Sova</title>
            <link rel="stylesheet" href="css/reset.css" />
            <link rel="stylesheet" href="css/main.css" />
          </head>
          <body>
            <header class="header__admin">
              <a href="admin.php" class="header__admin-logo">SOVÁ</a>
            </header>
            <form action="add_good.php" method="post" class="admin__add-page" enctype="multipart/form-data">
              <label href="#" class="add__photo">
                <img
                  class="add__photo-img"
                  src="img/icons/buttons/big-plus.png"
                  alt=""
                />
                <input
                  type="file"
                  name="image"
                  accept="image/png, image/jpeg"
                />
                <h4 class="add__photo-title">Добавить фото</h4>
              </label>
              <div class="add__info">
                <div class="add__rating">
                  <a href="#" class="add__rating-link"
                    ><svg
                      width="38"
                      height="38"
                      viewBox="0 0 38 38"
                      fill="none"
                      xmlns="http://www.w3.org/2000/svg"
                      xmlns:xlink="http://www.w3.org/1999/xlink"
                    >
                      <rect width="38" height="38" fill="url(#pattern0_124_23)" />
                      <defs>
                        <pattern
                          id="pattern0_124_23"
                          patternContentUnits="objectBoundingBox"
                          width="1"
                          height="1"
                        >
                          <use xlink:href="#image0_124_23" transform="scale(0.01)" />
                        </pattern>
                        <image
                          id="image0_124_23"
                          width="100"
                          height="100"
                          xlink:href="data:image/png;base64,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"
                        />
                      </defs>
                    </svg>
                  </a>
                  <a href="#" class="add__rating-link"
                    ><svg
                      width="38"
                      height="38"
                      viewBox="0 0 38 38"
                      fill="none"
                      xmlns="http://www.w3.org/2000/svg"
                      xmlns:xlink="http://www.w3.org/1999/xlink"
                    >
                      <rect width="38" height="38" fill="url(#pattern0_124_23)" />
                      <defs>
                        <pattern
                          id="pattern0_124_23"
                          patternContentUnits="objectBoundingBox"
                          width="1"
                          height="1"
                        >
                          <use xlink:href="#image0_124_23" transform="scale(0.01)" />
                        </pattern>
                        <image
                          id="image0_124_23"
                          width="100"
                          height="100"
                          xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGQAAABkCAYAAABw4pVUAAAAAXNSR0IArs4c6QAABz9JREFUeAHtnXuMXUMcx29Lver9DBqp7fbMb+5qPTakQqgQj4RoJB4RqWgoUZQQDSqoEP/Rf8j+1fAHSRP+8WdJQ19nZq42S1Yopai2VEuLenT5MnMfu9vde89rzj3n3DtNbrp77sxvfvP5zm/Oa+a3pZL75wg4Ao6AI+AIOAKOgCPgCDgCjoAjEJkAKt7J+hO5oquQDgFI70UIeiEd685qJAJY33ciJO2DYL+6KImELp3CkPx5SEL1w5al04qzGooAKj3HQbCfRwShvVgz64RQlV0h+wQg6NlRYlSjRNEz9ltyFgMJwO89FortGSeIoF+w6bzjAw24AnYJQPKnx4kxci5Zarc1Z60lAQyVj4agXS0E2Y217JiWRtyX9ghA0ZPNxahfcdET9lp0lpoSwODsqRD0Y7Ag7CcXJU0x2vsCgi8JFqMWJYI/bq9lZ2kcARMdkn4ILwjt0uebcYbcATsEIOmx0GI0rrjoUTutOytjCGD19CMg6fvogng7Uek/aowx90tyAlD8kehi1M4lij+c3ANnoUGgFh3bYgsi2Q6sn3Zkw6D7IRkBSPZQfDHqV1z0YDIvXG1DAF/0Hg5J3yUXhG13UWJhUEHxRYnFaFxx8fstuNS9JlDpnwLBtloTRLBvdcR1L9GEPYdg91kTox4liu5N6FZ3VjfRIekr64II9g2Gyod1J9UEvf7/JvAe62LUo0TwuxO41n1Vq+cO2pKeIGyri5II4wqKLUhNjHqUSHZXBJe6tyhWlg6BZJ+nLojgX2L13EO7l3SInpuFC5ItTl2MkShZrNsM4VrnFjF33mpmDyTdUHvZNACfVkHQFgj6t31iNF71orZ6pQLFV0KxlyD4fPjU3zFvHPUJExq64ldB0kJIWj4K+j+ZQG9ExSghwhyrLjWqQLA3zAAS7GYj1uDsqbkKG3MlNBq6HlnSe9eMdEnDhYIeRpiJymixfFoLSQNjxErzyTI2sjMaI11D12EtaQiSHegK6BMJEeaYYNvNrDBaLFnui30hAcHnQbC/HPSIU1yQWJqp4PNiTXfmbllQseb8ICBZfq8vWhQ9EEuMeiUIut1NTxaiRA9sxRbUuSb6H4rf5kRJJMowBN2ZSISDK0Nf7gn2tzunRBZmGJLdcTBPK79D0PUQ9KcTJaQo1Yuim6zAb2YEyrsOkv5wogSIosVQ7MZmHK0eh6K5ZpNlllcs+W57P3y62ir0IGOQ/DKz+zXfYGqbQQNGs80+CPa7vpEO4pfK91DsEkja66avmuCC/QafXZEK7LBGzYM2yXZ3vSh6b6Ogi8NyS7UcVPn81lvM2jhl2Jx+wtrSW7OVd1GqkKMah99Xhl5DG7YTnVJO7+YS3rlRebWlPCoexdsyUNQI0lsdaFZb4MZtBII8K2txcx9BejYo98Xl1NZ62EDTkcYit7yIpBfbfdTX21aoSRtDpXwW9MqOvEC05Ydea6xm9iTlk0l9VPjp1beLRT1HHOw32wy/d1omMG01Cv+c0yDYJ4WPFEGfYb13pi0umdrBuhmnQtFgYUVR/FMd7ZlCtN24zmMFQbJ4orBNHZupzoii0/HZOsGmb2dfRydE0ysBM1udGEc8vSihk5ea6odvBYqO6qN7n8+xPX3nxl6qm3DiRECYOp28uQeSv1K4CJHs5dyMaNuOQLL3CieIT6tsc8iNPUhvZ+EEkWxHbgDadMTkZw8zZ+exzMbeU2yyyIUt/a65eNFRe5alaG4uINp0Qi8yLq4gfJFNFrmwBcVfK6wgkr+aC4g2nYDga4orCPvQJotc2EKRlwopticXEG05oV/qFDc6aif2TnkXokWFZNcWXhBB19gaoJnbiZnetf3rclvfA3VOullIWpFihAxD0evmk+527BWZj2xbDkCSSkUQkwFiZNUgNszkZtt2GhkhBElbPDK1A5QmQ68Kbz0dRJue9Gb9indps45BeheaJAY229TbDFCa3KzNwhzXC8qsiSHIhyxfGbbzte0SH1hrv9I7I2zbuS1nEhAkH6lDZtMpSpPidNRkohC0MbEw7dqiFqeTYetAsqWxQVQzki7UObTCttesHFCaZESVbHMCf55qZr8wxyHprRgAtkHnzUohpWs1fSCfD0lfR/ZLeG8WBnwzRyHp4/AdZ7tNVp00s+nUHIVOIWVSR0V4aaZosFk/C3G8OhpDJLDRV2E601AGf+6u+gfG+BLoLWlB5zq91bnSP6UQ8CdyUu+faNnJ6sb6Ab3+d6L67TwGQSeZQSFpf0uf/b5yO/2y2hYkv3XizrED1Qxt7GyrDVowVnsQurx5aip2i4VmsjEByZaNEcSkJ+Ir9S6rbDwK32pt09EAxj+OeS68lZyVhKR3GoLoxxwVfkHOXAx0x0y7Oote/XGM770dWCmvBaCv+QWtg6TL8+pjWL/g8zmQ9L7OKRy2Tq7KmRuxrFJMpEjC3PXHfGKQolvOtCPgCDgCjoAj4Ag4Ao6AI+AIOAKxCfwHz/oKuLATzFIAAAAASUVORK5CYII="
                        />
                      </defs>
                    </svg>
                  </a>
                  <a href="#" class="add__rating-link"
                    ><svg
                      width="38"
                      height="38"
                      viewBox="0 0 38 38"
                      fill="none"
                      xmlns="http://www.w3.org/2000/svg"
                      xmlns:xlink="http://www.w3.org/1999/xlink"
                    >
                      <rect width="38" height="38" fill="url(#pattern0_124_23)" />
                      <defs>
                        <pattern
                          id="pattern0_124_23"
                          patternContentUnits="objectBoundingBox"
                          width="1"
                          height="1"
                        >
                          <use xlink:href="#image0_124_23" transform="scale(0.01)" />
                        </pattern>
                        <image
                          id="image0_124_23"
                          width="100"
                          height="100"
                          xlink:href="data:image/png;base64,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"
                        />
                      </defs>
                    </svg>
                  </a>
                  <a href="#" class="add__rating-link"
                    ><svg
                      width="38"
                      height="38"
                      viewBox="0 0 38 38"
                      fill="none"
                      xmlns="http://www.w3.org/2000/svg"
                      xmlns:xlink="http://www.w3.org/1999/xlink"
                    >
                      <rect width="38" height="38" fill="url(#pattern0_124_23)" />
                      <defs>
                        <pattern
                          id="pattern0_124_23"
                          patternContentUnits="objectBoundingBox"
                          width="1"
                          height="1"
                        >
                          <use xlink:href="#image0_124_23" transform="scale(0.01)" />
                        </pattern>
                        <image
                          id="image0_124_23"
                          width="100"
                          height="100"
                          xlink:href="data:image/png;base64,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"
                        />
                      </defs>
                    </svg>
                  </a>
                  <a href="#" class="add__rating-link"
                    ><svg
                      width="38"
                      height="38"
                      viewBox="0 0 38 38"
                      fill="none"
                      xmlns="http://www.w3.org/2000/svg"
                      xmlns:xlink="http://www.w3.org/1999/xlink"
                    >
                      <rect width="38" height="38" fill="url(#pattern0_124_23)" />
                      <defs>
                        <pattern
                          id="pattern0_124_23"
                          patternContentUnits="objectBoundingBox"
                          width="1"
                          height="1"
                        >
                          <use xlink:href="#image0_124_23" transform="scale(0.01)" />
                        </pattern>
                        <image
                          id="image0_124_23"
                          width="100"
                          height="100"
                          xlink:href="data:image/png;base64,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"
                        />
                      </defs>
                    </svg>
                  </a>
                </div>
                <a href="#" class="add__title">Название</a>
                <a href="#" class="add__price">Цена</a>
                <ul class="add__specs">
                  <li class="add__specs-item">
                    <span class="add__specs-left">Материал</span>
                    <span class="add__specs-separator"></span>
                    <span class="add__specs-right"
                      ><a href="#" class="add__specs-link add__specs-link--material"
                        >Добавить</a
                      ></span
                    >
                  </li>
                  <li class="add__specs-item">
                    <span class="add__specs-left">Примерный вес</span>
                    <span class="add__specs-separator"></span>
                    <span class="add__specs-right"
                      ><a href="#" class="add__specs-link add__specs-link--weight"
                        >Добавить</a
                      ></span
                    >
                  </li>
                  <li class="add__specs-item">
                    <span class="add__specs-left">Вставка</span>
                    <span class="add__specs-separator"></span>
                    <span class="add__specs-right"
                      ><a href="#" class="add__specs-link add__specs-link--inserts"
                        >Добавить</a
                      ></span
                    >
                  </li>
                  <li class="add__specs-item">
                    <span class="add__specs-left">Для кого</span>
                    <span class="add__specs-separator"></span>
                    <span class="add__specs-right"
                      ><a href="#" class="add__specs-link add__specs-link--gender"
                        >Добавить</a
                      ></span
                    >
                  </li>
                  <li class="add__specs-item">
                    <span class="add__specs-left">Бренд</span>
                    <span class="add__specs-separator"></span>
                    <span class="add__specs-right"
                      ><a href="#" class="add__specs-link add__specs-link--brand"
                        >Добавить</a
                      ></span
                    >
                  </li>
                </ul>
                <button type="submit" class="add__save">Сохранить</button>
              </div>
            </form>
          </body>
          <script src="js/jquery-3.7.1.min.js"></script>
          <script src="js/admin.js"></script>
          <script src="js/main.js"></script>
        </html>
        ';
    } else {
        // Пользователь не является администратором, перенаправляем его на другую страницу
        echo 'Вы не являетесь администратором!';
        exit;
    }
} else {
    // Пользователь не найден, перенаправляем его на страницу авторизации
    header("Location: login.php");
    exit;
}

$conn->close();
?>


