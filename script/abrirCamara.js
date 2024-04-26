let videoStream; // Variable global para almacenar el flujo de video
let videoElement; // Variable global para almacenar el elemento de video
let mediaStreamTrack; // Variable global para almacenar el objeto MediaStreamTrack
let photoDataUrl; // Variable global para almacenar la URL de la foto capturada

// Función para abrir la cámara y tomar una foto
function capturePhoto() {
    navigator.mediaDevices.getUserMedia({ video: true })
        .then(function(stream) {
            videoStream = stream;
            videoElement = document.createElement('video');
            document.body.appendChild(videoElement);
            videoElement.srcObject = stream;
            videoElement.play();

            // Obtener el objeto MediaStreamTrack
            const [track] = stream.getVideoTracks();
            mediaStreamTrack = track;
        })
        .catch(function(error) {
            console.error('Error al acceder a la cámara: ', error);
        });
}

// Función para guardar la foto y cerrar la cámara
function savePhoto() {
    if (videoElement) {
        const canvas = document.createElement('canvas');
        canvas.width = videoElement.videoWidth;
        canvas.height = videoElement.videoHeight;
        const ctx = canvas.getContext('2d');
        ctx.drawImage(videoElement, 0, 0, canvas.width, canvas.height);
        photoDataUrl = canvas.toDataURL('image/jpeg');

        // Detener el flujo de video
        if (mediaStreamTrack) {
            mediaStreamTrack.stop();
        }

        // Detener el video
        videoElement.pause();
        videoElement.src = '';
        videoStream.getTracks().forEach(track => track.stop());

        // Descargar la foto
        downloadPhoto();
    } else {
        console.error('No hay video disponible para guardar una foto.');
    }
}

// Función para descargar la foto cuando se presiona el botón de guardar
function downloadPhoto() {
    if (photoDataUrl) {
        const link = document.createElement('a');
        link.href = photoDataUrl;
        link.download = 'foto.jpg';
        link.click();
    } else {
        console.error('No hay foto disponible para descargar.');
    }
}
