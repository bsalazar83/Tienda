document.addEventListener('DOMContentLoaded', function() {
    const eliminar = document.querySelectorAll('.eliminar');
    const guardar = document.querySelectorAll('.guardar');
    const venta = document.querySelectorAll('.venta');

    eliminar.forEach(button => {
        button.addEventListener('click', function(event) {
            event.preventDefault();

            const form = button.closest('form');

            Swal.fire({
                title: "¿Estás seguro de eliminar el producto?",
                text: "¡No podrás revertir esto!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Sí, ¡elimínalo!",
                cancelButtonText: "Cancelar"
            }).then((result) => {
                if (result.isConfirmed) {
                    setTimeout(function () {
                        form.submit();
                    }, 1001);

                    Swal.fire({
                        title: "¡Eliminado!",
                        text: "Tu producto ha sido eliminado.",
                        icon: "success",
                        showConfirmButton: false,
                        timer: 1000
                    });
                }
            });
        });
    });


    guardar.forEach(button => {
        button.addEventListener('click', function(event) {
            event.preventDefault();

            const form = button.closest('form');

            Swal.fire({
                title: "¿Estás seguro de guardar el producto?",
                text: "¡No podrás revertir esto!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Sí, ¡guardalo!",
                cancelButtonText: "Cancelar"
            }).then((result) => {
                if (result.isConfirmed) {
                    setTimeout(function () {
                        form.submit();
                    }, 1001);

                    Swal.fire({
                        title: "¡Guardado!",
                        text: "Tu producto ha sido guardado.",
                        icon: "success",
                        showConfirmButton: false,
                        timer: 1000
                    });
                }
            });
        });
    });


    venta.forEach(button => {
        button.addEventListener('click', function(event) {
            event.preventDefault();

            const form = button.closest('form');

            Swal.fire({
                title: "¿El cliente ya existe en el sistema?",
                text: "Seleccione para continuar",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya existe",
                cancelButtonText: "No existe"
            }).then((result) => {
                if (result.isConfirmed) {
                    setTimeout(function () {
                        form.submit();
                    }, 1001);
                    
                    Swal.fire({
                        icon: "success",
                        title: "Redireccionando",
                        showConfirmButton: false,
                        timer: 1000
                      });
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    setTimeout(function () {
                        window.location.href = "clientes/crearCliente.php";
                    }, 1001);
                    
                    Swal.fire({
                        icon: "success",
                        title: "Redireccionando",
                        showConfirmButton: false,
                        timer: 1000
                      });
                }
            });
        });
    });
    
});
