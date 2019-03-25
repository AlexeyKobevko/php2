let $pageNumber = 0;
$('.btn').click(() => {
    $pageNumber++;
    console.log($pageNumber);
    $.post({
        url: '/test.php',
        data: {
            apiMethod: 'pagination',
            getData: {
                page: $pageNumber,
            }},
        success: function (data) {
            // if (data === 'OK') {
            console.log(data);
            // } else {
            //     alert(data);
            // }
        }
    });
});