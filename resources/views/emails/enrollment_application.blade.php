<!DOCTYPE html>
<html>
<head>
    <title>Nueva Solicitud de Matrícula</title>
</head>
<body>
    <p>Se ha recibido una nueva solicitud de matrícula con los siguientes datos:</p>
    <ul>
        <li><strong>Nombre:</strong> {{ $enrollmentData['first_name'] }}</li>
        <li><strong>Apellido:</strong> {{ $enrollmentData['last_name'] }}</li>
        <li><strong>Correo electrónico:</strong> {{ $enrollmentData['email'] }}</li>
        <li><strong>Teléfono:</strong> {{ $enrollmentData['phone'] }}</li>
    </ul>
</body>
</html>
