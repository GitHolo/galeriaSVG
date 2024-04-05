<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeria zdjęć</title>
    <style>
        .gallery {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            margin-top: 20px;
        }
        .gallery img {
            margin: 10px;
            max-width: 300px;
            max-height: 300px;
            cursor: pointer;
        }
        .fullscreen {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.9);
            display: none;
            justify-content: center;
            align-items: center;
            z-index: 9999;
        }
        .fullscreen img {
            max-width: 90%;
            max-height: 90%;
        }
    </style>
</head>
<body>
    <h1>Galeria zdjęć</h1>
    <div class="gallery">
        <?php
        $directory = "D:/Users/mfelczak348/Desktop/z/images/";
        $images = scandir($directory);
        foreach ($images as $image) {
            $extension = pathinfo($image, PATHINFO_EXTENSION);
            if (in_array($extension, array('jpg', 'jpeg', 'png', 'gif', 'svg'))) {
                echo '<img src="' . './images/' . $image . '" alt="' . $image . '" onclick="showFullscreen(this.src)">';
            }
        }
        ?>
    </div>
    <div class="fullscreen" onclick="hideFullscreen()">
        <img id="fullscreen-image" src="" alt="Fullscreen Image">
    </div>
    <script>
        function showFullscreen(src) {
            var fullscreenDiv = document.querySelector('.fullscreen');
            var fullscreenImage = document.getElementById('fullscreen-image');
            fullscreenImage.src = src;
            fullscreenDiv.style.display = 'flex';
        }

        function hideFullscreen() {
            var fullscreenDiv = document.querySelector('.fullscreen');
            fullscreenDiv.style.display = 'none';
        }
    </script>
</body>
</html>
