$(document).ready(() => {
    function getProducts() {
        fetch(`/catalog.php?rowProducts=1&page=${++loadedPage}`)
            .then((response) => response.text())
            .then(data => {
                if (data.length) {
                    $productsList.append(data);
                } else {
                    $moreBtn.hide();
                }
            });
    }

    const $productsList = $('.catalog');
    const $moreBtn = $('.pag-next');
    let loadedPage = 0;

    $moreBtn.on('click', getProducts);
});
