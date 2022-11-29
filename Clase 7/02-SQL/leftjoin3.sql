SELECT 
lmsusuarios.usuario,
lmsusuarios.nombre
FROM `lmsmatriculas` 
LEFT JOIN lmsusuarios
ON lmsmatriculas.FK_lmsusuarios_usuario = lmsusuarios.Identificador
