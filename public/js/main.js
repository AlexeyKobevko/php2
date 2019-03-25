// let $button = $('.pag-next').data('start');
// $('.pag-next').click(() => {
//     let btn_more = $(this);
//     let $start = parseInt($(this).attr('count_show'));
//     let $perPage  = $(this).attr('count_add');
//
//     $.ajax({
//         url: '/catalog.php',
//         type: "post",
//         dataType: "json",
//         data: {
//             "start": $start,
//             "perPage": $perPage
//         },
//         success: function (data) {
//             if(data.result === "success"){
//                 $('body').append(data.html);
//                 btn_more.val('Показать еще');
//                 btn_more.attr('count_show', (count_show+3));
//             } else {
//                 console.log('NO');
//             }
//         }
//     });
// });

// fetch('catalog.php')
//     .then(result => result.json())
//     .then(data => {
//         products = data;
//     })
//     .catch(err => {
//         console.log(err);
//     });