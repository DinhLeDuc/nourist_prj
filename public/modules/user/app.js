const API_V1 = '/api/v1/';

const LOADING_TEMP = '<div class="loading"><img src="/images/loading.gif"><p>Đang tải dữ liệu...</p></div>';

$(document).ready(function () {
    $('.datepicker').datepicker({'overrideBrowserDefault': true});

    $('.q').change(function () {
        _searchFood();
    });

    $('.slider-wrapper.m-t-20.q-slide').mouseup(function () {
        _searchFood();
    });

    function _searchFood() {
        let q_cond = $('form.searchbox-form').serialize();
        let q = $('form.filter-form').serialize();

        let $searchResult = $('div#searchResult.list-result');
        $searchResult.empty();
        $searchResult.append(LOADING_TEMP);
        goToByScroll('.tab-result.col-md-8.p-right-0');

        if( window.loadFoodTask){
            window.loadFoodTask.abort();
        }

        window.loadFoodTask =  $.get(API_V1.concat('foods?').concat(q).concat('&').concat(q_cond), function (res) {
            window.loadFoodTask = null;

            $searchResult.empty();
            $searchResult.append(res);
        });
    }
});