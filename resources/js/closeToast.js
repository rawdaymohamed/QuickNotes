document.addEventListener('DOMContentLoaded', function () {
    const closeButtons = document.querySelectorAll('.close-toast');

    closeButtons.forEach(button => {
        button.addEventListener('click', function () {
            const toast = this.closest('#toast-success');
            if (toast) {
                toast.remove();
            }
        });
    });
});
