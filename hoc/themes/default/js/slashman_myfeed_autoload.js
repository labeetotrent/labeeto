$(document).ready(function(){

    /* Переменная-флаг для отслеживания того, происходит ли в данный момент ajax-запрос. В самом начале даем ей значение false, т.е. запрос не в процессе выполнения */
    var inProgress = false;
    /* С какой статьи надо делать выборку из базы при ajax-запросе */
    var recentFrom = 10;
    var searchFrom = 10;
    var popularFrom = 10;
    var recentFinished = false;
    var popularFinished = false;
    var searchFinished = false;
    var type;
    var startFrom;
    var finished;
    var selector;

    /* Используйте вариант $('#more').click(function() для того, чтобы дать пользователю возможность управлять процессом, кликая по кнопке "Дальше" под блоком статей (см. файл index.php) */
    $(window).scroll(function() {

        fixRightColumn();

        if($('.nav.nav-tabs li.active').attr('tab') == 'recent')
        {
            type = 'RECENT';
            startFrom = recentFrom;
            finished = recentFinished;
            selector = '#recent';
        }
        else if ($('.nav.nav-tabs li.active').attr('tab') == 'popular')
        {
            type = 'POPULAR';
            startFrom = popularFrom;
            finished = popularFinished;
            selector = '#popular';
        }
        else if ($('.nav.nav-tabs li.active').attr('tab') == 'search')
        {
            type = 'SEARCH';
            startFrom = searchFrom;
            finished = searchFinished;
            selector = '#trending';
        }

        /* Если высота окна + высота прокрутки больше или равны высоте всего документа и ajax-запрос в настоящий момент не выполняется, то запускаем ajax-запрос */
        if($(window).scrollTop() + $(window).height() >= $(document).height() - 200 && !inProgress && !finished) {


            $.ajax({
                url: 'ajax/GetPosts',
                method: 'POST',
                data: {offset: startFrom, type: 'POPULAR'},
                beforeSend:
                    function() {
                        inProgress = true;
                        $(selector).append('<div class="col-md-12 loading-spin text-center"><i class="fa fa-spin fa-refresh fa-6"></i></div>');
                    }
            }).done(function(data){

                /* Преобразуем результат, пришедший от обработчика - преобразуем json-строку обратно в массив */
                data = JSON.parse(data);

                /* Если массив не пуст (т.е. статьи там есть) */
                if (typeof data.output !== 'undefined') {
                    if(data.finished == 1)
                        finished = true;
                    /* Делаем проход по каждому результату, оказвашемуся в массиве,
                     где в index попадает индекс текущего элемента массива, а в data - сама статья */

                        /* Отбираем по идентификатору блок со статьями и дозаполняем его новыми данными */
                    $(selector).append(data.output);

                    /* По факту окончания запроса снова меняем значение флага на false */
                    // Увеличиваем на 10 порядковый номер статьи, с которой надо начинать выборку из базы
                    if($('.nav.nav-tabs li.active').attr('tab') == 'recent')
                    {
                        recentFrom += 10;
                    }
                    else if ($('.nav.nav-tabs li.active').attr('tab') == 'popular')
                    {
                        popularFrom += 10;
                    }
                    else if ($('.nav.nav-tabs li.active').attr('tab') == 'search')
                    {
                        searchFrom += 10;
                    }
                }
                $('.loading-spin').remove();
                inProgress = false;
            });
        }
    });
});



function fixRightColumn()
{
    var winTop = $(this).scrollTop();
    var winBottom = $(this).scrollTop() + $(this).height();
    var right = $('.right-content');
    var rightBottom = $(right).height();
    var shift = winTop - rightBottom + $(this).height() - 150;

    if(winBottom >= rightBottom)
    {
        right.css({
            'top': shift + 'px',
            'position' : 'relative'
        });
    }
    else
    {
        right.css({
            'top': '0px'
        });
    }
}