
(function (){
    document.addEventListener('DOMContentLoaded', () => {
        let inputFile = document.getElementById('image');
        inputFile.addEventListener('change',function(event) {
            let target = event.target;
            if (!FileReader) {
                alert('FileReader не поддерживается');
                return;
            }
            if (!target.files.length) {
                alert('Ничего не загружено');
                return;
            }
            let fileReader = new FileReader();
            let image = document.getElementById('inputImage')
            fileReader.onload = function () {
                image.src = fileReader.result;
                image.style.width = '150px';
                image.style.height = '150px';
                image.style.marginTop = '20px';
            }
            fileReader.readAsDataURL(target.files[0]);
        })
    })
}())
