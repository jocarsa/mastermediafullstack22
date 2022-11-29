SELECT 
lmsusuarios.usuario AS 'usuario del alumno',
lmsusuarios.nombre AS 'nombre del alumno',
lmscursos.nombre AS 'nombre del curso'
FROM `lmsmatriculas` 

LEFT JOIN lmsusuarios
ON lmsmatriculas.FK_lmsusuarios_usuario = lmsusuarios.Identificador

LEFT JOIN lmscursos
ON lmsmatriculas.FK_lmscursos_nombre = lmscursos.Identificador
