<?php
echo "<h3>Guión Resuelto</h3>";
if ($mysqli = new mysqli("localhost", "root", "")) {
    echo "Conexión establecida" . "<br> ";
    $sql = "CREATE DATABASE IF NOT EXISTS `foc3` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;";
    if ($mysqli->query($sql) === TRUE) {
        echo "BD creada con éxito" . "<br> ";
        $mysqli->select_db("foc3");
        //Crear tabla
        $sql = "CREATE TABLE IF NOT EXISTS autor (
                id integer PRIMARY KEY AUTO_INCREMENT,
                nombre varchar(15),
                apellidos varchar(25),
                nacionalidad varchar(10))ENGINE = InnoDB 
                ;
                
                CREATE TABLE IF NOT EXISTS libro (
                    id integer PRIMARY KEY AUTO_INCREMENT,
                    titulo varchar(50),
                    f_publicacion date,
                    id_autor integer Not null,
                    foreign key (id_autor) references autor(id) ON DELETE CASCADE )
                    ENGINE = InnoDB;
                ";
        if ($mysqli->query($sql) === TRUE) {
            echo "Tabla creada" . "<br>";
            //Insertar datos iniciales
            $sql_insert = "INSERT INTO autor (nombre, apellidos, nacionalidad)
            VALUES ('Isaac','Asimov','Rusia');
            INSERT INTO autor (nombre, apellidos, nacionalidad)
            VALUES ('J.R.R.','Tolkien','Inglaterra');
INSERT INTO libro (titulo, f_publicacion, id_autor)
            VALUES ('La Comunidad del Anillo','1954-07-29','1');
INSERT INTO libro (titulo, f_publicacion, id_autor)
             VALUES ('El Hobbit','1937-09-21','1');
  INSERT INTO libro (titulo, f_publicacion, id_autor)
              VALUES ('El Hobbit','1937-09-21','1');

INSERT INTO libro (titulo, f_publicacion, id_autor)
               VALUES ('Un guijarro en el cielo','1950-01-19','2');
     INSERT INTO libro (titulo, f_publicacion, id_autor)
                VALUES ('Fundación','1951-06-01','2');
   INSERT INTO libro (titulo, f_publicacion, id_autor)
                 VALUES ('Yo, robot','1950-12-02','2');
 INSERT INTO libro (titulo, f_publicacion, id_autor)
                  VALUES ('El Hobbit','1937-09-21','1');";

            if ($mysqli->query($sql_insert)) {
                echo "Inserción realizada con éxito" . "<br> ";
            } else echo "Error insertando datos" . "<br> ";
        } else echo "Error creando tabla" . "<br> ";
    } else echo "Error al crear BD" . "<br> ";
} else echo "Error de conexión a BD" . "<br> ";
