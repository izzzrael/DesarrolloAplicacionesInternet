CREATE DATABASE biblioteca_digital;
USE biblioteca_digital;

CREATE TABLE libros (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(150) NOT NULL,
    autor VARCHAR(100) NOT NULL,
    anio INT NOT NULL,
    url_recurso VARCHAR(255) NOT NULL,
    especialidad VARCHAR(100) NOT NULL,
    editorial VARCHAR(100) NOT NULL
);