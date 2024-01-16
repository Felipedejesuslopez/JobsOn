let currentFormPart = 0;
const formParts = document.querySelectorAll('.form-part');
const progressBar = document.querySelector('.progress-bar');
const prevBtn = document.getElementById('prevBtn');
const nextBtn = document.getElementById('nextBtn');
const submitBtn = document.getElementById('submitBtn');

function changeFormPart(n) {
    if (currentFormPart >= 0 && currentFormPart < formParts.length) {
        formParts[currentFormPart].classList.remove('active');
        currentFormPart += n;
        if (currentFormPart < 0) {
            currentFormPart = 0;
        } else if (currentFormPart >= formParts.length) {
            currentFormPart = formParts.length - 1;
        }
        formParts[currentFormPart].classList.add('active');

        progressBar.style.width = (currentFormPart / (formParts.length - 1)) * 100 + '%';

        prevBtn.disabled = currentFormPart === 0;
        nextBtn.disabled = currentFormPart === formParts.length - 1;

        if (currentFormPart === formParts.length - 1) {
            nextBtn.style.display = 'none';
            submitBtn.style.display = 'inline-block';
        } else {
            nextBtn.style.display = 'inline-block';
            submitBtn.style.display = 'none';
        }
    }
}