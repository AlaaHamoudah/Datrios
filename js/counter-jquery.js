(function($){
	$.fn.counter = function(){
		this.each(function(){
			var $this = $(this);
			//var $spanVal = $("<span class='CoSpan'></span>");
			var $upCount = $("<a class='CoUp'></a>");
			var $downCount = $("<a class='CoDown'></a>");
			var SValue = parseInt($this.val());
			var VMax = parseInt($this.attr("max"))
			var VMin = parseInt($this.attr("min"))
			//$this.css("display","none");
			//$spanVal.insertAfter($this);
			$upCount.insertAfter($this);
			$downCount.insertAfter($upCount);
			//$spanVal.text(SValue);
			$upCount.click(function(){
				SValue = parseInt($this.val());
				if(SValue+1<=VMax){
					SValue++;
					$this.val(SValue);
				}
				//$spanVal.text(SValue);
				return false;
			});
			$downCount.click(function(){
				SValue = parseInt($this.val());
				if(SValue-1>=VMin){
					SValue--;
					$this.val(SValue);
				}
				//$spanVal.text(SValue);
				return false;
			});
			$this.keydown(function(event){
				if((event.keyCode>=48 && event.keyCode<=57) || event.keyCode==8 || event.ctrlKey == true){
					SValue = parseInt($this.val());
				}else{
					return false;
				}
			});
			$this.keyup(function(){
				if($this.val()==""){
					$this.val("0")
				}
				SValue = parseInt($this.val());
				if(SValue>VMax){
					SValue = VMax;
				}else if(SValue<VMin){
					SValue = VMin;
				}
				$this.val(SValue);
			});
		});
		
	}
})(jQuery )