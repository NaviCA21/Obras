<!DOCTYPE html>
<html>
<head>
    <title>Acta N° {{ $registro->idControl }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header h1 {
            margin-bottom: 5px;
        }
        .header p {
            margin-top: 0;
        }
        .content {
            text-align: justify;
            margin-bottom: 40px;
        }
        .footer {
            text-align: center;
            margin-top: 80px;
        }
        .footer p {
            margin: 5px 0;
        }
        .signature {
            display: inline-block;
            margin-right: 20px;
            margin-top: 40px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Acta de Visita N° {{ $registro->idControl }}</h1>
            <p>ACTA DE VISITA INOPINADA MUNICIPALIDAD PROVINCIAL DE PUNO</p>
        </div>
        <div class="content">
            @php
                $dias = [
                    'Monday' => 'Lunes',
                    'Tuesday' => 'Martes',
                    'Wednesday' => 'Miércoles',
                    'Thursday' => 'Jueves',
                    'Friday' => 'Viernes',
                    'Saturday' => 'Sábado',
                    'Sunday' => 'Domingo'
                ];
                $dia = $dias[$registro->created_at->format('l')];
            @endphp
            <p>En la ciudad de Puno, siendo las {{ $registro->created_at->format('H:i:s') }} horas del día {{ $dia }}, se llevó a cabo una visita inopinada con los siguientes datos:</p>
            <ul>
                <li>Documento Nacional de Identidad del Visitante: {{ $registro->dni }}</li>
                <li>Nombre completo del Visitante: {{ $registro->visitante }}</li>
                <li>Usuario que hace el registro: {{ $registro->usuario->name  }}</li>
                @if ($registro->usuario->oficina)
                    <li>Oficina de ingreso del Visitante: {{ $registro->usuario->oficina->nombreOficina }}</li>
                @else
                    <li>Oficina de ingreso del Visitante: [Sin oficina asignada]</li>
                @endif
                <li>Hora de ingreso del Visitante: {{ $registro->created_at }}</li>
                <li>Hora de salida del Visitante: {{ $registro->updated_at }}</li>
                <!-- Herramientas -->
                <li>Herramientas del Visitante:</li>
                @if ($registro->herramientas->count() > 0)
                    <ul>
                        @foreach ($registro->herramientas as $herramienta)
                            <li>Marca: {{ $herramienta->marca }} </li><li> Nombre: {{ $herramienta->nombreHerramienta }}</li><li> Serie: {{ $herramienta->serie }}</li><br>
                        @endforeach
                    </ul>
                @else
                    <ul>
                        <li>No se registraron herramientas</li>
                    </ul>
                @endif
                <li>Sexo del Visitante: {{ $registro->sexo }}</li>
                <li>Entidad de origen del Visitante: {{ $registro->entidad }}</li>
                <li>Motivo de visita del Visitante: {{ $registro->motivo }}</li>
                <li>Observaciones al Visitante: {{ $registro->observacion }}</li>
                {{-- @if ($registro->img_path)
                    <img src="{{ $registro->img_path }}" alt="Foto del visitante">
                @else
                    <p>No se encontró la foto del visitante</p>
                @endif
                <!-- Mostrar la ruta de la imagen -->
                <p>Ruta de la imagen: {{ $registro->img_path }}</p> --}}

            </ul>
        </div>
        <div class="footer">
            <div class="signature">
                <p>Firma 1: ______________________</p>
                <p>Nombre del jefe</p>
                <p>Cargo del jefe</p>
            </div>
            <div class="signature">
                <p>Firma 2: ______________________</p>
                <p>Nombre de alguien</p>
                <p>Cargo de alguien</p>
            </div>
            <div class="signature">
                <p>Firma 3: ______________________</p>
                <p>Nombre de alguien 2</p>
                <p>Cargo de alguien 2</p>
            </div>
        </div>
    </div>
</body>
</html>
