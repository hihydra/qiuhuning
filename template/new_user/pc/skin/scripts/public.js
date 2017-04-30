/**
 * Created by Administrator on 2017/4/4 0004.
 */
//动态效果
$('img[jh-img="an"]').hover(function () {
    $(this).animate({
        marginLeft:'-25px',
        marginTop:'-25px',
        height:'+=50px',
        width:'+=50px'
    })
},function () {
    $(this).animate({
        marginLeft:'0',
        marginTop:'0',
        height:'-=50px',
        width:'-=50px'
    })
});
function CheckForm()
{
    if(!tel()){
        return false;
    }
}
function tel(){
    var myreg = /^(((13[0-9]{1})|(15[0-9]{1})|(18[0-9]{1}))+\d{8})$/;
    if(!myreg.test($('#tel').val()))
    {
        alert('请输入有效的手机号码！');
        $('#tel').focus();
        return false;
    }else{
        return true;
    }
}
function getCode(url,mobile,obj){
    if(tel()){
        $.post(url,{'mobile':mobile.val()},function(data){
            settime(obj);
        },'text');
    }
}
var countdown=60;
function settime(obj) {
    tel();
    if (countdown == 0) {
        obj.removeAttribute("disabled");
        obj.value="获取验证码";
        countdown = 60;
        return;
    } else {
        obj.setAttribute("disabled", true);
        obj.value="重新发送(" + countdown + ")";
        countdown--;
    }
setTimeout(function() {
    settime(obj) }
    ,1000)
}