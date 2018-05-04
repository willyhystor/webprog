<!doctype html>
<html>
    <head>
        <title>
            <?php 
            if(isset($title))
            {
                echo $title;
            }
            else
            {
                echo 'Sibuk Skripsi';
            }
            ?>
        </title> 

        @include('header.main_header_meta_tag')
        @include('header.main_header_css')
        @include('header.main_header_js')
    </head>
    
    <body>
    
        @include('header.main_header_template')

        @yield('content')

        @include('footer.main_footer_template')
        
        @include('footer.main_footer_js') 
        
    </body>
</html>