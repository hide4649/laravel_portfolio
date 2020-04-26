function preview_file(id){

	// 対象要素を取得
	var target_element = document.getElementById(id);

	// 結果コードを格納する変数
	var result_code = '';

	// アップした画像の数だけ処理
	for (var i = 0; i < document.getElementById(id).files.length; i++){

		// 画像のURLを取得
		var img_url = window.URL.createObjectURL(document.getElementById(id).files[i]);

		// コードを更新
		result_code += '<img src="' + img_url + '" alt="プレビュー">';
		

		
	}

	document.getElementById('delete').classList.add('d-none');
	
	
	// プレビューを出力
	document.getElementById('preview_result')
	.innerHTML = result_code;
	
	//lavel複製
	var count = 0;
	tpl   = document.getElementById('delete');
	clone = tpl.cloneNode(true);
	// idとdisplayの設定
	clone.id            = "dispData_" + count;

	//idを変更する（後で）
	document.getElementById('input_file').add.id = "fileData_" + count;
	// 表示
	base = document.getElementById('clone')
	base.appendChild(clone);
	
	// カウンタアップ
	count++;
	

	
		
		
		//これからやること
		//cloneのinputのclassをcountに変えてそれごとに値を取得するようコードを書く
}