window.onload = function () {



Livewire.on('alert_update', etc4 => {
	Swal.fire({
		position: 'center',
		icon: 'success',
		title: 'Usuario editado correctamente',
		showConfirmButton: false,
		timer: 1500
	})

});
Livewire.on('alert_create', etc3 => {
	Swal.fire({
		position: 'center',
		icon: 'success',
		title: 'Usuario creado correctamente',
		showConfirmButton: false,
		timer: 1500
	})

});
Livewire.on('alert_create_rol', etc3 => {
	Swal.fire({
		position: 'center',
		icon: 'success',
		title: 'Rol creado correctamente',
		showConfirmButton: false,
		timer: 1500
	})

});
Livewire.on('alert_asig', etc3 => {
	Swal.fire({
		position: 'center',
		icon: 'success',
		title: 'Permisologia actualizada correctamente',
		showConfirmButton: false,
		timer: 1500
	})

});
Livewire.on('eliminar', id => {
Swal.fire({
	title: 'Estas seguro?',
	text: "No podrar revertir esta accion!",
	icon: 'warning',
	showCancelButton: true,
	confirmButtonColor: '#3085d6',
	cancelButtonColor: '#d33',
	confirmButtonText: 'Yes, delete it!'
  }).then((result) => {
	if (result.isConfirmed) {

		Livewire.emitTo('control.gestionusuario', 'delete', id);

	  Swal.fire(
		'Eliminado!',
		'el usuario fue eliminado',
		'success'
	  )
	}
  })


});
Livewire.on('eliminar_rol', id => {
	Swal.fire({
		title: 'Estas seguro?',
		text: "No podrar revertir esta accion!",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Yes, delete it!'
	  }).then((result) => {
		if (result.isConfirmed) {
	
			Livewire.emitTo('control.gestionrolpermisos', 'delete', id);
	
		  Swal.fire(
			'Eliminado!',
			'el rol fue eliminado',
			'success'
		  )
		}
	  })
	
	
	});
};

