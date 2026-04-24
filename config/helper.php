<?php
function alert($icon, $title, $text, $redirect) {
    echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
    echo "<script>
    document.addEventListener('DOMContentLoaded', function() {
        Swal.fire({
            icon: '$icon',
            title: '$title',
            text: '$text'
        }).then(() => {
            window.location = '$redirect';
        });
    });
    </script>";
}
?>