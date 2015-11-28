<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
	<link rel="stylesheet" href="./css/layout.css" type="text/css" />

    <script type="text/javascript">
        const CANVAS_X = 50;
        const CANVAS_Y = 50;
        const CANVAS_W = 200;
        const CANVAS_H = 200;
        const IMAGE_W  = 100;
        const IMAGE_H  = 100;
        
        function outlineCanvas(id)
        {
            var canvas  = document.getElementById(id);
            var context = canvas.getContext("2d");
            context.strokeStyle = "black";
            context.strokeRect(0, 0, CANVAS_W, CANVAS_H);
            return context;
        }
        
        function draw()
        {
            var con1 = outlineCanvas("canvas1");
            var con2 = outlineCanvas("canvas2");
            var con3 = outlineCanvas("canvas3");
            var con4 = outlineCanvas("canvas4");
            
            var image = new Image();
            image.src = "./images/fiveguys-burger.jpg";
            
            con1.drawImage(image, CANVAS_X, CANVAS_Y, 
                                  IMAGE_W, IMAGE_H);
            
            con2.save();
            con2.rotate(Math.PI/4);
            con2.drawImage(image, CANVAS_X, CANVAS_Y, 
                                  IMAGE_W, IMAGE_H);
            con2.restore();
            
            con3.save();
            con3.rotate(Math.PI/8);
            con3.drawImage(image, CANVAS_X, CANVAS_Y, 
                                  IMAGE_W, IMAGE_H);
            con3.restore();
            
            con4.save();
            con4.translate(100, 100);
            con4.rotate(Math.PI/8);
            con4.drawImage(image, -IMAGE_W/2, -IMAGE_H/2, 
                                  IMAGE_W, IMAGE_H);
            con4.restore();
        } 
        
        function drawGradients() {
            var linear = document.getElementById("linear");
           
            // Linear gradient
            var con = linear.getContext("2d");
            lGrad = con.createLinearGradient(10, 0, 0, 100);
            
            lGrad.addColorStop(0,   "#FF0000");
            lGrad.addColorStop(0.5, "#00FF00");
            lGrad.addColorStop(1,   "#0000FF");
            
            con.fillStyle = lGrad;
            con.fillRect(0, 0, 200, 200);
        }
    </script>	
    
    <title>Zelp: Pictures</title>
</head>

<body onload="drawGradients(); draw()">
    <canvas id="linear" height="200" width="200">
        <p>Canvas not supported.</p>
    </canvas>
    <img src="./images/chinese-noodles.jpg" alt="Noodles" style="width:200px;height:200px;">
    <img src="./images/fiveguys-burger.jpg" alt="Burger" style="width:200px;height:200px;">
    <br>
    <canvas id = "canvas1"
            height = "200"
            width = "200">
        <p>Canvas not supported!</p>
    </canvas>
    
    <canvas id = "canvas2"
            height = "200"
            width = "200">
        <p>Canvas not supported!</p>
    </canvas>
    
    <canvas id = "canvas3"
            height = "200"
            width = "200">
        <p>Canvas not supported!</p>
    </canvas>
    
    <canvas id = "canvas4"
            height = "200"
            width = "200">
        <p>Canvas not supported!</p>
    </canvas>
</body>

</html>