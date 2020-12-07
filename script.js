function check(){
	if(document.getElementById("input_Search").length > 6){
		document.write('Vui lòng nhập lớn hơn 6 ký tự !');
	}else{
		document.myform.submit();
	}
}