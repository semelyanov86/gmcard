<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Восстановление пароля</title>
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f4f4f4;
        }
        .email-container {
            background-color: #ffffff;
            border-radius: 8px;
            padding: 40px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        .logo {
            font-size: 24px;
            font-weight: bold;
            color: #2563eb;
            margin-bottom: 10px;
        }
        h1 {
            color: #1f2937;
            font-size: 24px;
            margin: 0 0 20px 0;
        }
        .content {
            color: #4b5563;
            font-size: 16px;
            margin-bottom: 30px;
        }
        .button-container {
            text-align: center;
            margin: 30px 0;
        }
        .button {
            display: inline-block;
            padding: 14px 32px;
            background-color: #2563eb;
            color: #ffffff !important;
            text-decoration: none;
            border-radius: 6px;
            font-weight: 600;
            font-size: 16px;
        }
        .button:hover {
            background-color: #1d4ed8;
        }
        .info {
            background-color: #f3f4f6;
            border-left: 4px solid #2563eb;
            padding: 15px;
            margin: 20px 0;
            border-radius: 4px;
        }
        .footer {
            margin-top: 40px;
            padding-top: 20px;
            border-top: 1px solid #e5e7eb;
            text-align: center;
            color: #6b7280;
            font-size: 14px;
        }
        .warning {
            color: #dc2626;
            font-size: 14px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="header">
            <div class="logo">GMCard</div>
        </div>

        <h1>Восстановление пароля</h1>

        <div class="content">
            <p>Здравствуйте!</p>
            <p>Вы получили это письмо, потому что мы получили запрос на сброс пароля для вашей учетной записи.</p>
        </div>

        <div class="button-container">
            <a href="{{ $url }}" class="button">Сбросить пароль</a>
        </div>

        <div class="info">
            <strong>Важно:</strong> Эта ссылка для сброса пароля действительна в течение {{ $expire }} минут.
        </div>

        <div class="content">
            <p>Если вы не запрашивали сброс пароля, просто проигнорируйте это письмо. Ваш пароль останется без изменений.</p>
        </div>

        <div class="warning">
            <p><strong>Не запрашивали сброс пароля?</strong> Если вы не запрашивали восстановление пароля, просто удалите это письмо.</p>
        </div>

        <div class="footer">
            <p>С уважением,<br><strong>Команда GMCard</strong></p>
            <p style="margin-top: 15px; font-size: 12px; color: #9ca3af;">
                Если кнопка не работает, скопируйте и вставьте следующую ссылку в браузер:<br>
                <a href="{{ $url }}" style="color: #2563eb; word-break: break-all;">{{ $url }}</a>
            </p>
        </div>
    </div>
</body>
</html>


