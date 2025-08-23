<!doctype html>
<html>

<head>
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
    <script type="text/javascript" src="{{asset('js/turn.min.js')}}"></script>

    <style type="text/css">
        body {
            background: #ccc;
        }

        #magazine {
            width: 576px;
            height: 752px;
        }

        #magazine .turn-page {
            background-color: #ccc;
            background-size: 100% 100%;
        }

        #magazine .cover{
            width: 100%;
            height:100%;
            position:relative;
        }

        .cover img{
            width: 100%;
            height: 100%;
            position: absolute;
        }
    </style>
</head>

<body>

    <div id="magazine">
        <div style="background-image:url(https://images.unsplash.com/photo-1596774468032-915cdd39ea39?crop=entropy&cs=srgb&fm=jpg&ixid=MnwxNDU4OXwwfDF8cmFuZG9tfHx8fHx8fHx8MTYzMjUxMjg1MQ&ixlib=rb-1.2.1&q=85);"></div>
        <div style="background-image:url(https://images.unsplash.com/photo-1596774468032-915cdd39ea39?crop=entropy&cs=srgb&fm=jpg&ixid=MnwxNDU4OXwwfDF8cmFuZG9tfHx8fHx8fHx8MTYzMjUxMjg1MQ&ixlib=rb-1.2.1&q=85);"></div>
        <div style="background-image:url(https://images.unsplash.com/photo-1596774468032-915cdd39ea39?crop=entropy&cs=srgb&fm=jpg&ixid=MnwxNDU4OXwwfDF8cmFuZG9tfHx8fHx8fHx8MTYzMjUxMjg1MQ&ixlib=rb-1.2.1&q=85);"></div>
        <div class="cover">
            <img src="https://images.unsplash.com/photo-1596774468032-915cdd39ea39?crop=entropy&cs=srgb&fm=jpg&ixid=MnwxNDU4OXwwfDF8cmFuZG9tfHx8fHx8fHx8MTYzMjUxMjg1MQ&ixlib=rb-1.2.1&q=85" alt="">
        </div>
        <div style="background-image:url(pages/05.jpg);"></div>
        <div style="background-image:url(pages/06.jpg);"></div>
    </div>


    <script type="text/javascript">
        $(window).ready(function() {
            $('#magazine').turn({
                display: 'single',
                acceleration: true,
                gradients: !$.isTouch,
                elevation: 50,
                duration:1000,
                when: {
                    turned: function(e, page) {
                        console.log(page)
                        /*console.log('Current view: ', $(this).turn('view'));*/
                    }
                }
            });
        });


        $(window).bind('keydown', function(e) {

            if (e.keyCode == 37)
                $('#magazine').turn('previous');
            else if (e.keyCode == 39)
                $('#magazine').turn('next');

        });
    </script>

</body>

</html>
