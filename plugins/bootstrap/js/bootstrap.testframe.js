var frame_id = 'bs_test';
// fix to view full height of framed window
function frameSizeUpdate(){
	document.getElementById(frame_id).height = document.getElementById(frame_id).contentWindow.document.body.scrollHeight+0+'px';
}

document.getElementsByTagName('iframe')[0].onload = function() {
	frameSizeUpdate();
};

timeout = setInterval("frameSizeUpdate()",500);

