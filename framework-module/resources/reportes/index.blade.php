{{-- framework-module/resources/reportes/index.blade.php --}}
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reporte de Editoriales - Framework</title>
</head>
<body>
    <h1>Módulo Framework - Lista de Editoriales</h1>
    <ul>
        @foreach($editoriales as $editorial)
            <li>{{ $editorial->nombre }} - {{ $editorial->pais }}</li>
        @endforeach
    </ul>
</body>
</html>