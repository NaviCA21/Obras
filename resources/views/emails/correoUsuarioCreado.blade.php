{{-- resources/views/emails/correoUsuarioCreado.blade.php --}}
<h1>¡Bienvenido al Sistema de Control de Control de Visitas de la Municipalidad Provincial de Puno, {{ $name }}!</h1>

<p>Tu cuenta ha sido creada con éxito. Aquí están tus detalles para poder ingresar:</p>

<ul>
    <li>Nombre: {{ $name }}</li>
    <li>Correo electrónico: {{ $email }}</li>
    <li>Contraseña: {{ $password }}</li>
    <li>Oficina: {{ $oficina }}</li>
    <li>Roles: {{ implode(', ', $roles->toArray()) }}</li>
    <li>Permisos: {{ implode(', ', $permissions->toArray()) }}</li>
</ul>

<p>Gracias por unirte a nuestro sistema.</p>
