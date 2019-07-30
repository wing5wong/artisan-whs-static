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
    <script src="https://unpkg.com/netlify-cms@2.9.6/dist/netlify-cms.js"></script>
    <script>
        
        CMS.registerPreviewStyle("{{mix('/css/main.css', 'assets/build')}}");
        
        CMS.registerPreviewStyle("/assets/fonts/gotham/gotham-light/font.css");
        CMS.registerPreviewStyle("/assets/fonts/gotham/gotham-book/font.css");
            CMS.registerPreviewStyle("/assets/css/customisations.css");
            CMS.registerPreviewStyle("/assets/css/admin.css");
    </script>
</body>
</html>
