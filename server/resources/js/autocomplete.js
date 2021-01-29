
$(function(){
    $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
    });
    $.ajax({
        type: 'GET',               // POSTかGET
        datatype: 'json',          // レスポンスデータの種類
        url: '/search/sake', // リクエストを行うページ。ルーティングで設定したURL
    })
    .done(function(data){
        // 受け取ったデータを処理
        let arr = data;
        console.log(data);
        //オートコンプリート値を設定する
        for(var i=0; i<arr.length; i++) {
            let option = $('<option>');
            option.val(arr[i]);
            $("#sake-data").append(option);
        }
    })
    .fail(function(jqXHR, statusText, errorThrown){
        alert("error!");
        console.log('FAIL', jqXHR, statusText, errorThrown);
    });
});

