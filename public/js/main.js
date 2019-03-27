$(document).ready(() => {
    function getProducts() {
        $.ajax(
            {
                url: `/catalog.php?rowProducts=1&page=${++loadedPage}`,
                success: function (data) {
                    if (data.length) {
                        $productsList.append(data);
                    } else {
                        $moreBtn.hide();
                    }
                }
            }
        );
    }

    const $productsList = $('.catalog');
    const $moreBtn = $('.pag-next');
    let loadedPage = 0;

    $moreBtn.on('click', getProducts);
});
