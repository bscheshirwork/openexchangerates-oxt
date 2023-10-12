Задача
-------
Нужно зарегистрироваться тут https://openexchangerates.org/signup/free, получить ключ

И сделать компонент который по этому эндпойнту получает данные

https://oxr.readme.io/docs/latest-json, результат нужен в виде DTO.

К компоненту потенциально должно быть возможно прикрутить получеение данных и из других эндпойнтов этого апи.

Инфо
------
Фреймворк для решения задачи не нужен, но проверил как сейас на 8.2.11 запускается базовый шаблон yii2

Для задачи папка `common` и комманда

`commands/OxrController.php`

добавлены и фактически используются для задачи
```
        "guzzlehttp/guzzle": "7.9.x-dev",
        "symfony/dotenv": "7.0.x-dev"
```

вызов и результат:
```
docker compose exec php dphp yii oxr
app\common\Oxr\Dto\Latest#1
(
    [disclaimer] => 'Usage subject to terms: https://openexchangerates.org/terms'
    [license] => 'https://openexchangerates.org/license'
    [timestamp] => 1697101200
    [base] => app\common\Oxr\Currency#2
    (
        [name] => 'USD'
        [value] => 'USD'
    )
    [rates] => SplObjectStorage#3
    (
        [SplObjectStorage:storage] => [
            0 => [
                'obj' => app\common\Oxr\Currency#4
                (
                    [name] => 'AED'
                    [value] => 'AED'
                )
                'inf' => app\common\Oxr\Dto\Rate#5
                (
                    [currency] => app\common\Oxr\Currency#4(...)
                    [value] => 3.67308
                )
            ]
            1 => [
                'obj' => app\common\Oxr\Currency#6
                (
                    [name] => 'AFN'
                    [value] => 'AFN'
                )
                'inf' => app\common\Oxr\Dto\Rate#7
                (
                    [currency] => app\common\Oxr\Currency#6(...)
                    [value] => 75.272056
                )
            ]
...
```