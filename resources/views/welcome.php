<html>
    <head>
        <title>Laravel</title>
    </head>
    <body>
        <?php $thispage="."; include "menubar.php"; ?>
        <div class="container" style="text-align:center;font-size:50px">
            <div id="show" class="content">
                <nav class="navbar navbar-default" role="navigation">
                    <div>
                    HELLO WORLD!!
                    </div>
                </nav>
            </div>
        </div>
    </body>
    <script>
        $("#show").height($(window).height() * 0.8);
        $("#show").css("line-height",$("#show").height()+"px");
    </script>
</html>
