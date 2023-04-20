$(function(){
    $('#btn-search').click(
    function() {
      let keyword = $('#txt-search').val();
      let company = $('#changeSelect').val();
      let lowLimitPrice = $('#lowLimitPrice').val();
      let upLimitPrice = $('#upLimitPrice').val();
      let upLimitStock = $('#upLimitStock').val();
      let lowLimitStock = $('#lowLimitStock').val();

      console.log(keyword);
      console.log(company);
      console.log(lowLimitPrice);
      console.log(upLimitPrice);
      console.log(upLimitStock);
      console.log(lowLimitStock);
      

      $.ajax({
        type: 'GET',
        url: 'search', //ProductControllerのsearchメソッドにアクセス
        data:{'keyword':keyword,
              'company':company,
              'lowLimitPrice':lowLimitPrice,
              'upLimitPrice':upLimitPrice,
              'upLimitStock':upLimitStock,
              'lowLimitStock':lowLimitStock
             },//わたす検索ワードを設定
        dataType: 'json', //Json形式で取得
        timeout: 3000
       })
       .done(function (data) {
              console.log(data);
              
              console.log(Object.keys(data.data).length);
              var len = Object.keys(data.data).length;

              for(i=0;i<len;i++){
              let html =`
              <div class="flex-center position-ref full-height">
                <h1>検索結果</h1>
                <!--商品一覧表示-->

                  <table class="table table-striped">
                      <thead>
                          <tr>
                          <th scope="col">ID</th>
                          <th scope="col">商品名</th>
                          <th scope="col">画像</th>
                          <th scope="col">価格</th>
                          <th scope="col">在庫数</th>
                          <th scope="col">企業</th>
                          <th scope="col">コメント</th>
                          </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>${data.data[i].id}<td>
                          <td>${data.data[i].product_name}<td>
                          <td><img src="/manegement/public/storage/${data.data[i].img_path}" width=100 height=100></td> 
                          <td>${data.data[i].price}<td>
                          <td>${data.data[i].stocks}<td>
                          <td>${data.data[i].company}<td>
                          <td>${data.data[i].comment}<td>
                        </tr>
                      </tbody>
                  </table>
              </div>
              `;
              

              $("#search_result").append(html);
              }
        })
       .fail(function (err) {
        // 通信失敗時の処理
        alert('ファイルの取得に失敗しました。');
      });

    });
});
