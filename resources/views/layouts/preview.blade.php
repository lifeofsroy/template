<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@stack('preview-title')</title>

    <style>
        body {
            margin: 0px;
        }

        .embed-container {
            position: relative;
            padding-bottom: 100%;
            height: 0;
            overflow: hidden;
            max-width: 100%;
            min-height: 100%;
        }

        .embed-container iframe,
        .embed-container object,
        .embed-container embed {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }
    </style>

    @livewireStyles
</head>

<body>
    {{ $slot }}

    @livewireScripts
</body>

</html>
