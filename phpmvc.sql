CREATE DATABASE IF NOT EXISTS phpmvc CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE phpmvc;

DROP TABLE IF EXISTS jet;
CREATE TABLE jet (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    manufacturer VARCHAR(100) NOT NULL,
    country VARCHAR(100) NOT NULL,
    role VARCHAR(100) NOT NULL
) CHARACTER SET utf8mb4;

INSERT INTO jet (name, manufacturer, country, role) VALUES
('Su-30SM2', 'Sukhoi', 'Russia', 'Multirole'),
('MiG-25 Foxbat', 'Mikoyan', 'Russia', 'Interceptor'),
('Su-24MP', 'Sukhoi', 'Russia', 'Electronic Warfare'),
('Su-35S Flanker-E', 'Sukhoi', 'Russia', 'Multirole'),
('EA-18G Growler', 'Boeing', 'United States', 'Electronic Warfare'),
('F-14D Tomcat', 'Grumman', 'United States', 'Interceptor'),
('F-18E Super Hornet', 'Boeing', 'United States', 'Multirole'),
('Mirage 2000-5F', 'Dassault Aviation', 'France', 'Interceptor'),
('EF-2000 Typhoon', 'BAE Systems', 'Britain', 'Multirole'),
('J-10C', 'Chengdu Aerospace Corporation', 'China', 'Multirole'),
('JAS 39 Gripen E', 'Saab', 'Sweden', 'Multirole'),
('F-4F KWS LV Störkampfflugzeug', 'McDonnell Douglas', 'Germany', 'Multirole');