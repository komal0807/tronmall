var loader = '<img src="includes/images/loader.gif" style="height: 28px;">';
function home() { window.location.href = "/"; }
$('.openair').click(function () {
	$("#openair").empty(); $("#openair").append(loader);
	$(".openair").addClass("clickOff");
	var airId = $("#airId").val();
	var Mob = $(".xbox").val();
	var response== "Err001";
	$.ajax({
		url: "open_now", type: "post", data: { "air": 1, "airId": airId, "Mob": Mob, },
		success: function (response) {
			if (response == "true") {
				$(".smg").load('smg');
			}
			else if (response == "Err001") {
				$("#openair").empty(); $("#openair").html('Open');
				$(".smg").empty(); $('.smg').append('<div class="col-12 conod LR"><div class="tffm ssmg" Style="top: 320px;">This reward has finished</div></div>');
				setTimeout(function () { $('.smg').empty(); }, 1000); $(".openair").removeClass("clickOff");
			}
			else {
				$("#openair").empty(); $("#openair").html('Open');
				$(".smg").empty(); $('.smg').append('<div class="col-12 conod LR"><div class="tffm ssmg" Style="top: 320px;">' + response + '</div></div>');
				setTimeout(function () { $('.smg').empty(); }, 1000); $(".openair").removeClass("clickOff");
			}
		}
	});
});
function copyGLink() {
	mylink = (window.location).href;
	var rlink = document.createElement("textarea");
	document.body.appendChild(rlink);
	rlink.value = mylink;
	rlink.focus();
	rlink.select();
	document.execCommand("copy");
	document.body.removeChild(rlink);
	$('#glink').html('Sucessfully');

}