<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = htmlspecialchars($_POST['nombre']);
    $fecha_nacimiento = htmlspecialchars($_POST['fecha_nacimiento']);
    $ocupacion = htmlspecialchars($_POST['ocupacion']);
    $telefono = htmlspecialchars($_POST['telefono']);
    $email = htmlspecialchars($_POST['email']);
    $nacionalidad = htmlspecialchars($_POST['nacionalidad']);
    $nivel_ingles = htmlspecialchars($_POST['nivel_ingles']);
    $otros_idiomas = isset($_POST['otros_idiomas']) ? $_POST['otros_idiomas'] : [];
    $lenguajes_programacion = isset($_POST['lenguajes_programacion']) ? $_POST['lenguajes_programacion'] : [];
    $aptitud = htmlspecialchars($_POST['aptitud']);
    $habilidades = isset($_POST['habilidades']) ? $_POST['habilidades'] : [];
    $perfil = htmlspecialchars($_POST['perfil']);

    // Manejo de imagen
    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] == 0) {
        $imagen_nombre = $_FILES['imagen']['name'];
        $imagen_tmp = $_FILES['imagen']['tmp_name'];
        $ruta_imagen = "uploads/" . $imagen_nombre;

        // Mover la imagen subida a la carpeta 'uploads'
        move_uploaded_file($imagen_tmp, $ruta_imagen);
    } else {
        $ruta_imagen = null;
    }

    echo "<!DOCTYPE html>";
    echo "<html lang='es'>";
    echo "<head>";
    echo "<meta charset='UTF-8'>";
    echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
    echo "<title>Curriculum Vitae - $nombre</title>";
    echo "<style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        header {
            text-align: center;
            padding: 30px;
            background-color: #3498db;
            color: white;
            border-radius: 8px 8px 0 0;
        }
        h1 {
            font-size: 28px;
            margin-bottom: 10px;
        }
        h2 {
            font-size: 18px;
            color: #ccc;
        }
        .section {
            margin-bottom: 20px;
        }
        .section h3 {
            font-size: 18px;
            color: #2c3e50;
            border-bottom: 2px solid #3498db;
            padding-bottom: 5px;
        }
        .section p, ul {
            font-size: 14px;
            color: #666;
        }
        ul {
            list-style-type: none;
            padding-left: 0;
        }
        ul li {
            margin-bottom: 10px;
        }
        .imagen-perfil {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            margin: 0 auto;
            display: block;
        }
        @media (max-width: 768px) {
            .container {
                padding: 15px;
            }
            h1 {
                font-size: 24px;
            }
            h3 {
                font-size: 16px;
            }
            p, ul li {
                font-size: 13px;
            }
        }
    </style>";
    echo "</head>";
    echo "<body>";
    echo "<div class='container'>";
    
    echo "<header>";
    echo "<h1>$nombre</h1>";
    echo "<h2>$ocupacion</h2>";
    echo "</header>";

    if ($ruta_imagen) {
        echo "<img src='$ruta_imagen' alt='Foto de perfil de $nombre' class='imagen-perfil'>";
    }

    echo "<div class='section'>";
    echo "<h3>Contacto</h3>";
    echo "<p><strong>Teléfono:</strong> $telefono</p>";
    echo "<p><strong>Email:</strong> $email</p>";
    echo "<p><strong>Nacionalidad:</strong> $nacionalidad</p>";
    echo "<p><strong>Fecha de Nacimiento:</strong> $fecha_nacimiento</p>";
    echo "</div>";

    echo "<div class='section'>";
    echo "<h3>Perfil</h3>";
    echo "<p>$perfil</p>";
    echo "</div>";

    echo "<div class='section'>";
    echo "<h3>Nivel de Inglés</h3>";
    echo "<p>$nivel_ingles</p>";
    echo "</div>";

    if (!empty($otros_idiomas)) {
        echo "<div class='section'>";
        echo "<h3>Idiomas Adicionales</h3>";
        echo "<ul>";
        foreach ($otros_idiomas as $idioma) {
            echo "<li>$idioma</li>";
        }
        echo "</ul>";
        echo "</div>";
    }

    if (!empty($lenguajes_programacion)) {
        echo "<div class='section'>";
        echo "<h3>Lenguajes de Programación</h3>";
        echo "<ul>";
        foreach ($lenguajes_programacion as $lenguaje) {
            echo "<li>$lenguaje</li>";
        }
        echo "</ul>";
        echo "</div>";
    }

    echo "<div class='section'>";
    echo "<h3>Aptitudes</h3>";
    echo "<p>$aptitud</p>";
    echo "</div>";

    if (!empty($habilidades)) {
        echo "<div class='section'>";
        echo "<h3>Habilidades</h3>";
        echo "<ul>";
        foreach ($habilidades as $habilidad) {
            echo "<li>$habilidad</li>";
        }
        echo "</ul>";
        echo "</div>";
    }

    echo "</div>";
    echo "</body>";
    echo "</html>";
} else {
    echo "No se recibieron datos.";
}
?>