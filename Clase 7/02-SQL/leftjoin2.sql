SELECT * FROM `lmsmatriculas` 
LEFT JOIN lmsusuarios
ON lmsmatriculas.FK_lmsusuarios_usuario = lmsusuarios.Identificador