$(function(){

      $.ajax({
        type: 'GET',
        url: 'product', //ProductControllerのsearchメソッドにアクセス
        data:{},//わたす検索ワードを設定
        dataType: 'json', //Json形式で取得
        timeout: 3000
       })
       .done(function (data) {
              console.log(data);

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
                          <td>${data.data[0].id}<td>
                          <td>${data.data[0].product_name}<td>
                          <td><img src="${data.data[0].img_path}" width=100 height=100></td> 
                          <td>${data.data[0].price}<td>
                          <td>${data.data[0].stocks}<td>
                          <td>${data.data[0].company}<td>
                          <td>${data.data[0].comment}<td>
                        </tr>
                      </tbody>
                  </table>
              </div>
              
              `;
              $("#showList").append(html);
        })
       .fail(function (err) {
        // 通信失敗時の処理
        alert('ファイルの取得に失敗しました。');
      });

    });
