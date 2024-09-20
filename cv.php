<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Curriculum Vitae - <?php echo htmlspecialchars($_POST['nombre']); ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body { font-family: 'Roboto', sans-serif; background-color: #f9f9f9; color: #333; padding: 40px; }
        .container { max-width: 900px; margin: 0 auto; background-color: #fff; padding: 20px; border-radius: 8px; }
        header { text-align: center; padding-bottom: 30px; background-color: #333; color: white; padding: 40px; border-radius: 8px; }
        h1 { font-size: 28px; margin-bottom: 10px; }
        h2 { font-size: 18px; color: #ccc; }
        .main-content { display: flex; justify-content: space-between; gap: 40px; }
        .left-column, .right-column { width: 48%; }
        section { margin-bottom: 30px; }
        h3 { font-size: 20px; margin-bottom: 10px; color: #2c3e50; }
        p, ul { font-size: 15px; color: #666; }
        ul { list-style-type: none; padding-left: 0; }
        ul li { margin-bottom: 10px; }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1><?php echo htmlspecialchars($_POST['nombre']); ?></h1>
            <h2><?php echo htmlspecialchars($_POST['ocupacion']); ?></h2>
        </header>

        <div class="main-content">
            <div class="left-column">
                <section class="contact">
                    <h3><i class="fas fa-address-book"></i> Contacto</h3>
                    <p><i class="fas fa-phone"></i> <?php echo htmlspecialchars($_POST['contacto']); ?></p>
                </section>
                
                <section class="languages">
                    <h3><i class="fas fa-language"></i> Nacionalidad</h3>
                    <p><?php echo htmlspecialchars($_POST['nacionalidad']); ?></p>
                </section>
                
                <section class="languages">
                    <h3><i class="fas fa-language"></i> Nivel de Inglés</h3>
                    <p><?php echo htmlspecialchars($_POST['ingles']); ?></p>
                </section>

                <section class="skills">
                    <h3><i class="fas fa-tasks"></i> Aptitudes</h3>
                    <p><?php echo htmlspecialchars($_POST['aptitudes']); ?></p>
                </section>
                
                <section class="skills">
                    <h3><i class="fas fa-tasks"></i> Habilidades</h3>
                    <ul>
                        <?php
                        if (!empty($_POST['habilidades'])) {
                            foreach ($_POST['habilidades'] as $habilidad) {
                                echo "<li>" . htmlspecialchars($habilidad) . "</li>";
                            }
                        }
                        ?>
                    </ul>
                </section>
            </div>

            <div class="right-column">
                <section class="profile-summary">
                    <h3>Perfil Profesional</h3>
                    <p><?php echo nl2br(htmlspecialchars($_POST['perfil'])); ?></p>
                </section>

                <section class="experience">
                    <h3>Lenguajes de Programación</h3>
                    <ul>
                        <?php
                        if (!empty($_POST['lenguajes'])) {
                            foreach ($_POST['lenguajes'] as $lenguaje) {
                                echo "<li>" . htmlspecialchars($lenguaje) . "</li>";
                            }
                        }
                        ?>
                    </ul>
                </section>
            </div>
        </div>
    </div>
</body>
</html>