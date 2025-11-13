<!DOCTYPE html>
<html>
<head>
    <title>Panel Administrador</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 8px;
        }
        th {
            background: #f3f3f3;
        }
        button {
            margin: 2px;
            padding: 5px 10px;
        }
        .modal {
            display: none;
            position: fixed;
            z-index: 100;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0,0,0,0.6);
        }
        .modal-content {
            background-color: #fff;
            margin: 8% auto;
            padding: 20px;
            width: 400px;
            border-radius: 10px;
        }
    </style>
</head>
<body>
<a href="{{ route('administrador.panel') }}">⬅ Volver al panel</a>
<h3>⚙️ Gestión de Ofertas</h3>

<button onclick="abrirModalCrear()">➕ Nueva Oferta</button>

<table id="tabla-ofertas">
    <thead>
        <tr>
            <th>ID</th>
            <th>Título</th>
            <th>Empresa</th>
			<th>Descripción</th>
            <th>Modalidad</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($ofertas as $oferta)
        <tr data-id="{{ $oferta->id_oferta }}">
            <td>{{ $oferta->id_oferta }}</td>
            <td>{{ $oferta->titulo }}</td>
            <td>{{ $oferta->empresa->nombre_empresa ?? 'Sin empresa' }}</td>
			<td>{{ $oferta->descripcion }}</td>
            <td>{{ $oferta->modalidad }}</td>
            <td>{{ $oferta->estado }}</td>
            <td>
                <button onclick="editarOferta({{ $oferta->id_oferta }})">✏️ Editar</button>
                <button onclick="eliminarOferta({{ $oferta->id_oferta }})">🗑️ Eliminar</button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<!-- MODAL CREAR / EDITAR -->
<div id="modalOferta" class="modal">
    <div class="modal-content">
        <h3 id="tituloModal">Nueva Oferta</h3>
        <form id="formOferta">
            <input type="hidden" id="id_oferta">

            <label>Título:</label><br>
            <input type="text" id="titulo" required><br><br>

            <label>Descripción:</label><br>
			<input type="text" id="descripcion" required><br><br>

            <label>Modalidad:</label><br>
            <input type="text" id="modalidad"><br><br>
			
			<label>Estado:</label><br>
            <input type="text" id="estado" required><br><br>

            <label>Empresa:</label><br>
            <select id="id_empresa" required>
                <option value="">Seleccione</option>
                @foreach ($empresas as $empresa)
                    <option value="{{ $empresa->id_empresa }}">{{ $empresa->nombre_empresa }}</option>
                @endforeach
            </select><br><br>

            <button type="submit">Guardar</button>
            <button type="button" onclick="cerrarModal()">Cancelar</button>
        </form>
    </div>
</div>

<script>
    const modal = document.getElementById('modalOferta');
    const form = document.getElementById('formOferta');
    const csrf = document.querySelector('meta[name="csrf-token"]').content;

    function abrirModalCrear() {
        document.getElementById('tituloModal').innerText = 'Nueva Oferta';
        form.reset();
        document.getElementById('id_oferta').value = '';
        modal.style.display = 'block';
    }

    function cerrarModal() {
        modal.style.display = 'none';
    }

    function editarOferta(id) {
        const fila = document.querySelector(`tr[data-id='${id}']`);
        document.getElementById('id_oferta').value = id;
        document.getElementById('titulo').value = fila.children[1].innerText;
		document.getElementById('descripcion').value = fila.children[3].innerText;
        document.getElementById('modalidad').value = fila.children[4].innerText;
		document.getElementById('estado').value = fila.children[5].innerText;
        document.getElementById('id_empresa').value = [...document.getElementById('id_empresa').options]
            .find(o => o.text === fila.children[2].innerText)?.value || '';
        document.getElementById('tituloModal').innerText = 'Editar Oferta';
        modal.style.display = 'block';
    }

    form.addEventListener('submit', async (e) => {
        e.preventDefault();
        const id = document.getElementById('id_oferta').value;
        const data = {
            titulo: document.getElementById('titulo').value,
            descripcion: document.getElementById('descripcion').value,
            modalidad: document.getElementById('modalidad').value,
			estado: document.getElementById('estado').value,
            id_empresa: document.getElementById('id_empresa').value,
        };

        const url = id ? `/administrador/ofertas/actualizar/${id}` : `/administrador/ofertas/crear`;

        const res = await fetch(url, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': csrf,
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        });

        const result = await res.json();
        if (result.success) {
            alert(result.message);
            location.reload();
        } else {
            alert('Error al guardar la oferta');
        }
    });

    async function eliminarOferta(id) {
        if (!confirm('¿Eliminar esta oferta?')) return;

        const res = await fetch(`/administrador/ofertas/eliminar/${id}`, {
            method: 'DELETE',
            headers: { 'X-CSRF-TOKEN': csrf }
        });

        const result = await res.json();
        if (result.success) {
            alert(result.message);
            location.reload();
        } else {
            alert('Error al eliminar la oferta');
        }
    }
</script>

</body>
</html>

