create database restaurante
use restaurante
CREATE TABLE platos (
  nombre      VARCHAR(100) PRIMARY KEY,
  precio      DECIMAL(6,2) NOT NULL,
  cantidad    INT
)
CREATE TABLE mesas (
  id          INT AUTO_INCREMENT PRIMARY KEY
)
CREATE TABLE mesa_plato (
  id_mesa       INT NOT NULL,
  nombre_plato  VARCHAR(100) NOT NULL,
  PRIMARY KEY (id_mesa, nombre_plato),
  FOREIGN KEY (id_mesa) REFERENCES mesas(id) ON DELETE CASCADE,
  FOREIGN KEY (nombre_plato) REFERENCES platos(nombre) ON DELETE CASCADE
)
INSERT INTO platos(nombre, precio) VALUES
("Ensalada", 10.00),
("Hamburguesa", 7.00),
("Pasta", 6.50),
("Pizza", 8.00),
("Sopa", 4.00);
INSERT INTO mesas(id) VALUES
(1),
(2),
(3),
(4),
(5);
