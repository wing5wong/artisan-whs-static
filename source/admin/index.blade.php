<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin | {{ $page->site->title }}</title>
    @include('_partials.cms.identity_widget')
</head>
<body>
    <script src="https://unpkg.com/netlify-cms@2.9.0/dist/netlify-cms.js"></script>
    <script>
            CMS.registerPreviewStyle("/assets/build/css/main.css?id=61a169783ce593bce382");
    </script>
</body>
</html>
