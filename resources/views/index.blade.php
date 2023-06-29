<!doctype html>
<html>

<head>
    <title>Site Maintenance</title>
    <meta charset="utf-8" />
    <meta name="robots" content="noindex" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            text-align: center;
            padding: 20px;
            font: 20px Helvetica, sans-serif;
            color: #efe8e8;
        }

        @media (min-width: 768px) {
            body {
                padding-top: 150px;
            }
        }

        h1 {
            font-size: 50px;
        }

        article {
            display: block;
            text-align: left;
            max-width: 650px;
            margin: 0 auto;
        }

        a {
            color: #dc8100;
            text-decoration: none;
        }

        a:hover {
            color: #efe8e8;
            text-decoration: none;
        }
    </style>
</head>

<body bgcolor="2e2929">
    <article>
        <h1>We&rsquo;ll be back soon!</h1>
        <div>
            <p>Sorry for the inconvenience but we&rsquo;re performing some maintenance at the moment. We&rsquo;ll be
                back online shortly!</p>
            <p>&mdash; {{ config('app.name') }}</p>
        </div>
    </article>
</body>

</html>
