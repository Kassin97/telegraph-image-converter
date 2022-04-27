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
                    <form>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Посилання</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                   placeholder="https://telegra.ph/...">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Тип файлу</label>
                            <select class="custom-select">
                                <option value="pdf">pdf</option>
                                <option value="mobi">mobi</option>
                                <option value="epub">epub</option>
                            </select>
                        </div>

                        <button type="button" class="btn btn-dark btn-lg btn-submit">Запустити магію ❤</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</section>
</body>
</html>