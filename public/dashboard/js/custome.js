window.addEventListener('load', () => {
    const loader = document.getElementById('loader');
    setTimeout(() => {
        loader.classList.add('fadeOut');
    }, 300);
});


function previewImages(imageInputId, imageTagId, isMultiple) {
    const fileInput = document.getElementById(imageInputId);
    const imageTag = document.getElementById(imageTagId);

    fileInput.addEventListener('change', function (e) {
        const files = fileInput.files;
        if (!isMultiple) {
            if (files.length === 1) {
                imageTag.src = URL.createObjectURL(files[0]);
            }
        } else {
            imageTag.empty();
            for (let i = 0; i < files.length; i++) {
                imageTag.append(`<img src=${URL.createObjectURL(files[i])} alt="preview image" style="max-height: 100px;> class='img-responsive'`)
            }
        }
    })
}


