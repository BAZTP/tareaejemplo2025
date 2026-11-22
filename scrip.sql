-- Crear base de datos
CREATE DATABASE IF NOT EXISTS empresa;

-- Seleccionar la base de datos para usarla
USE empresa;
-- Crear la tabla de usuarios
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
-- Crear la tabla de productos
CREATE TABLE productos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    descripcion TEXT NOT NULL,
    precio DECIMAL(10, 2) NOT NULL,
    fecha_agregado TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Crear la tabla de contactos
CREATE TABLE contactos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    mensaje TEXT NOT NULL,
    fecha_contacto TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO usuarios (nombre, email, password) VALUES
('Bryan', 'bryan@tecno.com', 'Admin'),
('Alejandra', 'ale@tecno.com', 'Admin');

INSERT INTO productos (nombre, descripcion, precio) VALUES
('Financieras', 'Optimice y automatice las finanzas, 
el control y la gestión de activos. Los productos de gestión 
financiera le permiten dar soporte a los procesos de negocio 
críticos para las funciones corporativas esenciales.', 19.99),

('Prevención de ataques DDoS', 'Proporcione seguridad contextual 
a través de una solución,que entregue información a profundidad 
sobre varios elementos (por ejemplo, usuarios, dispositivos y 
aplicaciones) que se comunican con su Data Center.	', 29.99),

('Plataforma (IaaS) en Ecuador', 'Nuestra Plataforma como Servicio
 permite cubrir los requerimientos de cómputo bajo demanda, en un 
 tiempo mucho menor al tradicional, estamos conscientes de las necesidades 
 de nuestros clientes por ello los servicios están concebidos con capacidades 
 de crecimiento flexibles, de clase mundial, tecnología de punta, monitoreo 
 24×7, en uno de los centros de datos más avanzados del país.', 49.99);

 ('Redes Inalámbricas WLAN / Smart WIFI', 'Redes Inalámbricas para pequeñas, 
 medianas y Grandes empresas. Alcance velocidades equiparables a la red cableada 
 para optimizar costos y espacio con equipos de última generación y reconocidos 
 como líderes a nivel mundial.', 49.99);
