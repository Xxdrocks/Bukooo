<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Fullscreen Loading</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>

        .swal2-popup {
            width: 100vw !important;
            height: 100vh !important;
            max-width: 100vw !important;
            padding: 0 !important;
            border-radius: 0 !important;
            display: flex;
            justify-content: center;
            align-items: center;
        }


        .swal2-slide-up {
            animation: slideUp 0.5s ease-out;
        }

        @keyframes slideUp {
            from {
                transform: translateY(100%);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }
    </style>
</head>
<body>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Swal.fire({
                html: `
                    <video autoplay loop muted style="max-width: 100%; height: auto;">
                        <source src="{{ asset('assets/loading/loading.mp4') }}" type="video/mp4">
                        Browser Anda tidak mendukung video.
                        </video>
                `,
                background: 'black',
                showConfirmButton: false,
                allowOutsideClick: false,
                customClass: {
                    popup: 'swal2-slide-up'
                },
                didOpen: () => {

                }
            });

            setTimeout(() => {
                console.log('swalclose dipanggilll')
                Swal.close();
            }, 3000);
        });
    </script>

</body>
</html>
