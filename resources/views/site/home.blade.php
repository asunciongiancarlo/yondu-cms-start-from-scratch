<!doctype html>
<html lang="en">
    <head>
        <title>{{ $APP_TITLE }}</title>
        @include('site.partials.meta')
        @include('site.partials.styles')
        @include('site.partials.upperscripts')
    </head>
    <body>          
        @yield('sitecontent');
        @include('site.partials.footer');
        <!--test-->
    </body>
    @include('site.partials.scripts')

</html>
