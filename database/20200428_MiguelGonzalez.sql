ALTER TABLE `bibliotecavirtual`.`usuario` 
DROP FOREIGN KEY `FK_USUARIO_PRIVILEGIO_USUARIO`;
ALTER TABLE `bibliotecavirtual`.`usuario` 
CHANGE COLUMN `i_IdPrivilegio` `i_IdPrivilegio` INT(11) NULL ;
ALTER TABLE `bibliotecavirtual`.`usuario` 
ADD CONSTRAINT `FK_USUARIO_PRIVILEGIO_USUARIO`
  FOREIGN KEY (`i_IdPrivilegio`)
  REFERENCES `bibliotecavirtual`.`privilegio_usuario` (`id`);
