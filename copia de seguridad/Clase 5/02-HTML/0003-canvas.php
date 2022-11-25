<html>
    <body>
        <style>
            html,body{padding:0px;margin:0px;}
            #lienzo{border:1px solid black;}
        </style>
        <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
        <canvas id="lienzo"></canvas>
        <script>
            var contexto = document.getElementById("lienzo").getContext("2d")
            
            contexto.fillRect(10,10,20,20)
            contexto.fillStyle = "red"
            contexto.fillRect(15,15,25,25)
            
            contexto.beginPath()
            contexto.arc(100,100,30,0,Math.PI/2,true)
            contexto.fill()
            $(document).ready(function(){
                $("canvas").mousemove(function(e){
                    contexto.fillRect(e.pageX,e.pageY,3,3)
                })
            })
            
        </script>
    </body>
</html>