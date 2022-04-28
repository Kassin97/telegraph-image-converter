<!doctype html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Парсер картинок з Telegraph ❤️</title>
    <link rel="stylesheet" href="src/css/bootstrap.min.css" crossorigin="anonymous">

    <link rel="stylesheet" href="src/css/main.css">
    <link rel="icon" type="image/x-icon" href="src/img/favicon.ico">
    <script src="src/js/libs/jquery-3.6.0.min.js"></script>
    <script src="src/js/script.js"></script>
</head>
<body>
<section id="cover" class="min-vh-100">
    <div id="cover-caption">
        <div class="container">
            <div class="row text-white">
                <div class="col-xl-6 col-lg-7 col-md-9 col-sm-11 mx-auto text-center form p-4 form-container">
                    <h1 class="display-4 py-2 main-title">Парсер картинок з Telegraph</h1>
                    <p class="desc-item">Дозволяє зібрати картинки із сторінки Telegraph в один файл</p>
                    <p class="desc-item">Вставте посилання, виберіть потрібний формат файлу і жмякайте кнопку</p>
                    <form method="get" id="main-form" action="/">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Посилання</label>
                            <input type="url" class="form-control" id="exampleInputEmail1"
                                   placeholder="https://telegra.ph/..." required name="link" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Тип файлу</label>
                            <select class="custom-select" required name="file-type" autocomplete="off">
                                <option value="">не вибрано</option>
                                <option value="pdf">pdf</option>
                                <option value="mobi">mobi</option>
                                <option value="epub">epub</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-dark btn-lg btn-submit">Запустити ❤</button>
                    </form>


                    <div class="feedback">
                        <div class="feedback-title">Розроблено для <b>s0fko</b></div>
                    </div>
                    <div class="feedback">
                        <div class="feedback-title">
                            Похвалити/Посварити можна <a target="_blank" href="https://t.me/roman_komarnytsky">тут</a>
                        </div>
                    </div>



                </div>
            </div>
        </div>
    </div>
</section>

<div class="loading">
    <div class="loader"></div>
</div>
</body>
</html>