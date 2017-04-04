<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="main.css">
        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    </head>
    <body>
        <div id="header"></div>
        <script>
            $("#header").load("Header.html");
        </script>
        <div class="TitleBlock">
            <div id="BlurDiv"></div>
            <hr>
            <hr class="mid">
            <hr class="small">
            <div class="content">
                <h1>Portfolio</h1>
                <div>
                    <div class="MiniHeader" align="center">
                        <button class="smallTab" id=Blender>Blender Renders</button>
                        <button class="smallTab" id="SketchBook">SketchBook</button>
                    </div>
                    <hr>
                    <div id="Display" align="left">
                        <button id="DisplayBtn">X</button>
                        <img id="Preview" style="max-width: 100%; max-height: 100%;">
                    </div>
                    <div id="BlenderDiv" style="display:inline;" align="center">
                        <p>This is Blender stuff!</p>
                        <?php
                        $dir = '../Client/Images/Blender';
                        $images = scandir($dir, 1);
                        foreach($images as $img){
                            if(strpos($img, '.') !== (int) 0) {
                                echo '<img src="/' .$dir. '/' .$img. '"/onclick="Expand(this.src)"/>';
                            }
                        }
                        ?>
                    </div>
                    <div id="SketchDiv" style="display:none;" align="center">
                        <p>These are sketches I drew!</p>
                        <?php
                        $dir = '../Client/Images/Sketches';
                        $images = scandir($dir, 1);
                        foreach($images as $img){
                            if(strpos($img, '.') !== (int) 0) {
                                echo '<img src="/' .$dir. '/' .$img. '"/onclick="Expand(this.src)"/>';
                            }
                        }
                        ?>
                    </div>
                    <script>
                        var blenderBtn = document.getElementById("Blender");
                        var sketchBtn = document.getElementById("SketchBook");
                        var closeBtn = document.getElementById("DisplayBtn");
                        
                        var blenderDiv = document.getElementById("BlenderDiv");
                        var sketchDiv = document.getElementById("SketchDiv");
                        var displayDiv = document.getElementById("Display");
                        var displayImg = document.getElementById("Preview");
                        var blurDiv = document.getElementById("BlurDiv");
                        
                        blenderBtn.style.backgroundColor = "#a9a";
                        
                        blenderBtn.onclick = function(){
                            blenderBtn.style.backgroundColor = "#a9a";
                            sketchBtn.style.backgroundColor = "#bbb";
                            
                            blenderDiv.style.display = "inline";
                        sketchDiv.style.display = "none";
                        };
                        sketchBtn.onclick = function(){
                            blenderBtn.style.backgroundColor = "#bbb";
                            sketchBtn.style.backgroundColor = "#a9a";
                            
                            blenderDiv.style.display = "none";
                            sketchDiv.style.minHeight = "2em";
                            sketchDiv.style.display = "inline";
                            sketchDiv.style.verticalAlign =  "top";
                        };
                        closeBtn.onclick = function(){
                            displayDiv.style.display = "none";
                            blurDiv.style.display = "none";
                        };
                        function Expand(src){
                            displayImg.src = src;
                            displayDiv.style.display = "inline";
                            blurDiv.style.display = "inline";
                            displayDiv.style.top = (window.pageYOffset + 100) + "px";
                            if(displayImg.offsetWidth > displayImg.offsetHeight){
                                displayDiv.style.width = "50%";
                                displayDiv.style.height = "auto";
                            }else{
                                displayDiv.style.width = "auto";
                                displayDiv.style.height = (window.innerWidth * .65) + "px";
                            }
                            displayDiv.style.left = ((window.innerWidth - displayImg.offsetWidth) / 2) + "px";
                            displayDiv.style.right = displayDiv.style.left;
                            $(document).on('keyup',function(evt) {
                                if (evt.keyCode == 27) {
                                    displayDiv.style.display = "none";
                                    blurDiv.style.display = "none";
                                }
                            });
                        }
                    </script>
                </div>
            </div>
        </div>
    </body>
</html>
