function preview_file(id){

	// 対象要素を取得
	var target_element = document.getElementById(id);

	// 結果コードを格納する変数
	var result_code = '';
  var img_id = document.getElementsByTagName('img').length;

	// アップした画像の数だけ処理
	for (var i = 0; i < target_element.files.length; i++){

		// 画像のURLを取得
		var img_url = window.URL.createObjectURL(target_element.files[i]);

		// コードを更新
		result_code += '<img class="preview" src="' + img_url + '" alt="プレビュー">'+' <button type="button" class="btn btn-primary " id="'+ img_id +'" onclick=del(this.id);>削除</button>';
		

		
	}

	//labelのimgを非表示にする
	target_element.parentNode.lastElementChild.classList.add('d-none');
	
	
	// プレビューを出力
	target_element.parentNode.parentNode.lastElementChild.insertAdjacentHTML('afterbegin',result_code);
	
}