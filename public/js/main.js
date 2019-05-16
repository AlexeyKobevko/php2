$(document).ready(() => {

    function request(path, data, cb) {
        $.post({
            url: path,
            data: data,
            success: function (data) {
                //Вариант с json
                if (data.error) {
                    message(`Error: ${data.error_text}`);
                    $message_field.text();
                } else {
                    cb(data.data);
                }
            }
        })
    }

    function message(message) {
        $message_field.text(message);

        setTimeout(() => {
            $message_field.text('');
        }, 3000);
    }

    function getProducts() {
        fetch(`/catalog.php?rowProducts=1&page=${++loadedPage}`)
            .then(response => response.json())
            .then(data => {
                if (data.length) {
                    $productsList.append(data);
                } else {
                    $moreBtn.hide();
                }
            });
    }

    function login() {
        const $login = $('#login').val();
        const $password = $('#password').val();

        request('/api/profile/signIn', {
            login: $login,
            password: $password
        }, function (data) {
            location.reload();
        });

        // fetch(`/profile/signIn`,
        //     {
        //         headers: { 'Content-Type': 'application/json' },
        //         method: 'POST',
        //         body: JSON.stringify({login: $login, password: $password})
        //     })
        //     .then((response) => response.json())
        //     .then(data => {
        //         console.log(data);
        //     })
    }

    function logout() {
        request('/api/profile/signOut', {}, () => location.reload());
    }

    const $productsList = $('.catalog');
    const $moreBtn = $('.pag-next');
    let loadedPage = 0;

    $moreBtn.on('click', getProducts);

    const $message_field = $('.errors');

    $('#loginBtn').on('click', login);

    $('#logoutBtn').on('click', logout);


});
