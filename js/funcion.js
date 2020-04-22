function mediaselect() {
    let Video = document.getElementById('V').checked;
    let Imagen = document.getElementById('I').checked;
    let Audio = document.getElementById('A').checked;
    let IyA = document.getElementById('I&A').checked;
    let UrlImagen = document.getElementById('MediaImagen');
    let UrlAudio = document.getElementById('MediaAudio');
    let UrlVideo = document.getElementById('MediaVideo');

    if (Video) {
        UrlVideo.disabled = false;
        UrlAudio.disabled = true;
        UrlImagen.disabled = true;
        UrlVideo.value = '';
        UrlAudio.value = '';
        UrlImagen.value = '';
    } else if (Imagen) {
        UrlVideo.disabled = true;
        UrlAudio.disabled = true;
        UrlImagen.disabled = false;
        UrlVideo.value = '';
        UrlAudio.value = '';
        UrlImagen.value = '';
    } else if (Audio) {
        UrlVideo.disabled = true;
        UrlAudio.disabled = false;
        UrlImagen.disabled = true;
        UrlVideo.value = '';
        UrlAudio.value = '';
        UrlImagen.value = '';
    } else if (IyA) {
        UrlVideo.disabled = true;
        UrlAudio.disabled = false;
        UrlImagen.disabled = false;
        UrlVideo.value = '';
        UrlAudio.value = '';
        UrlImagen.value = '';
    }
}
