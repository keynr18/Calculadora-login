CREATE TABLE `paises` (
  `id` int(200) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `nombrepais` varchar(30) NOT NULL,
  `taza` FLOAT(10,2) NOT NULL,
  `preciodolar` FLOAT(10,2) NOT NULL,
  `nombremoneda` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `paises` (`id`, `nombrepais`, `taza`, `preciodolar`, `nombremoneda`) VALUES (NULL, 'Argentina', '3', '4', 'ARS');
INSERT INTO `paises` (`id`, `nombrepais`, `taza`, `preciodolar`, `nombremoneda`) VALUES (NULL, 'Chile', '1', '4', 'CLP');
INSERT INTO `paises` (`id`, `nombrepais`, `taza`, `preciodolar`, `nombremoneda`) VALUES (NULL, 'Colombia', '3', '4', 'COP');
INSERT INTO `paises` (`id`, `nombrepais`, `taza`, `preciodolar`, `nombremoneda`) VALUES (NULL, 'Ecuador', '3927218', '4133914', 'USD');
INSERT INTO `paises` (`id`, `nombrepais`, `taza`, `preciodolar`, `nombremoneda`) VALUES (NULL, 'Estados Unidos', '3927218', '4133914', 'USD');
INSERT INTO `paises` (`id`, `nombrepais`, `taza`, `preciodolar`, `nombremoneda`) VALUES (NULL, 'España', '3', '4', '(€)');
INSERT INTO `paises` (`id`, `nombrepais`, `taza`, `preciodolar`, `nombremoneda`) VALUES (NULL, 'Panamà', '3927218', '4133914', 'USD');
INSERT INTO `paises` (`id`, `nombrepais`, `taza`, `preciodolar`, `nombremoneda`) VALUES (NULL, 'Peru', '3', '4', 'S');
INSERT INTO `paises` (`id`, `nombrepais`, `taza`, `preciodolar`, `nombremoneda`) VALUES (NULL, 'Portugal', '3', '4', '(€)');

CREATE TABLE `admin` (
    `id` int(100) PRIMARY KEY AUTO_INCREMENT NOT NULL,
    `usuario` varchar(10) NOT NULL,
    `pass` varchar(8) NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

