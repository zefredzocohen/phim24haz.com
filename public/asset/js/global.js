jQuery(document).ready(function(){
	//--Tìm kiếm
	var fixKeyword=function (str) {  
		str= str.toLowerCase();   
		str= str.replace(/[^\s0-9a-zA-ZấầẩẫậẤẦẨẪẬắằẳẵặẮẰẲẴẶáàảãạâăÁÀẢÃẠÂĂếềểễệẾỀỂỄỆéèẻẽẹêÉÈẺẼẸÊíìỉĩịÍÌỈĨỊốồổỗộỐỒỔÔỘớờởỡợỚỜỞỠỢóòỏõọôơÓÒỎÕỌÔƠứừửữựỨỪỬỮỰúùủũụưÚÙỦŨỤƯýỳỷỹỵÝỲỶỸỴđĐ]+/g," "); 
		str= str.replace(/^\s+|\s+$/g,""); 
		str= str.replace(/\s{1,}/g,"+"); 		
		return str;  
	}   
	jQuery('#form-search').submit(function(){
		var keywordObj=jQuery(this).find('input[name=keyword]')[0];
		
		if(typeof keywordObj !='undefined' && keywordObj!=null){
			var keyword=jQuery(keywordObj).val();
			keyword=fixKeyword(keyword);
			keyword=jQuery.trim(keyword);
			if(keyword==''){
				alert('Bạn chưa nhập từ khóa. (Không tính các ký tự đặc biệt vào độ dài từ khóa)');
				jQuery(keywordObj).focus();
				return false;
			}
			window.location.replace('/phim24haz.com/tim-kiem/'+keyword+'/');
		}
		return false;
	});
});
   