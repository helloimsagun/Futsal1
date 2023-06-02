function showbookSuccessModal() {
    $('#bookSuccessModal').modal('show');
    clearUrlParameter('bookSuccess');
}
function showsuccessDeleteModal() {
    $('#successDeleteModal').modal('show');
    clearUrlParameter('successDelete');
}
function clearUrlParameter(parameter) {
    const url = new URL(window.location.href);
    url.searchParams.delete(parameter);
    const newUrl = url.href.split('?')[0]; // Remove any remaining query parameters
    window.history.replaceState({}, document.title, newUrl);
}
$(document).ready(function () {
    // Check if the URL contains the success parameter
    const urlParams = new URLSearchParams(window.location.search);
    const bookSuccess = urlParams.get('bookSuccess');
    const successDelete =urlParams.get('successDelete');
    if (bookSuccess === 'true') {
        showbookSuccessModal();
    }
    if (successDelete === 'true') {
        showsuccessDeleteModal();
    }
});

function closebookSuccessModal() {
    $('#bookSuccessModal').modal('hide');
}
function closesuccessDeleteModal() {
    $('#successDeleteModal').modal('hide');
}
