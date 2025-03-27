document.addEventListener('DOMContentLoaded', function() {
    const eliminar = document.querySelectorAll('.eliminar');
    const guardar = document.querySelectorAll('.guardar');

    eliminar.forEach(button => {
        button.addEventListener('click', function(event) {
            event.preventDefault();

            const form = button.closest('form');

            Swal.fire({
                title: "¿Estás seguro de eliminar el cliente?",
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
                        text: "TEl cliente ha sido eliminado.",
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
                title: "¿Estás seguro de guardar el cliente?",
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
                        text: "El cliente ha sido guardado.",
                        icon: "success",
                        showConfirmButton: false,
                        timer: 1000
                    });
                }
            });
        });
    });
    
});
