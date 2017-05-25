/**
 * Created by Administrator on 2017/3/30 0030.
 */


//进度条颜色控制
var progressW = $('.progress').width();
// var progressArray = [0,126,252,378,506,630,756,882]; //节点位置
var progressArray = [0,14,28,42,56,70,84,98];//节点位置(单位百分比)
for(var item in progressArray){
    if(progressW < progressArray[item]){
        for(var i = 0; i<item; i++){
            var docN = '.progress-bar .'+"doc"+String(i+1);
            $(docN).css('background','#ff6280')
        }
        break;
    }
}


//订单步骤一(第一步跳转)
$('.order-item').on('click','dd.dd',function () {
    if($(this).hasClass('time') == true){
        $(this).addClass('dd-on').siblings().removeClass('dd-on');
        laydate();
        $(this).text('选择举行时间');
        return false;
    }
    if($(this).hasClass('video-make') == true){
        var videoSelectHidden = $('.video-select-hidden');
        if(videoSelectHidden.hasClass('none') == true){
            videoSelectHidden.removeClass('none')
        }
        else {
            videoSelectHidden.addClass('none')
        }
        return false;
    }
    $(this).addClass('dd-on').siblings().removeClass('dd-on');
});

$('.video-select-hidden').on('click','dd',function () {
    $('.video-make').text($(this).text()).addClass('dd-on').siblings().removeClass('dd-on');;
    $('.video-select-hidden').addClass('none');
});

//第一步操作
function stepNextOne() {
    if($('.block').find('dd.dd-on').length<4){
        return false
    }
    else {
        var blockOn =  $('.block .dd-on');
        var selectItem = $('.select-item');
        $('.t-thm').text(blockOn.eq(0).text());
        /*
        if(selectItem.eq(0).text() == selectItem.eq(1).text()){
            var currentSelect = selectItem.eq(0).text();
        }
        else {
            var currentSelect = selectItem.eq(0).text()+'/'+selectItem.eq(1).text()
        }
        */
        $('.t-address').text($('.address').val());
        $('.t-time').text(blockOn.eq(2).text());
        $('.t-cdt').text(blockOn.eq(3).text());
        $('.order-main').eq(1).addClass('block').siblings().removeClass('block');
        //给table表里的数据赋值
        $('#propose').append('<input type="hidden" name="address"  value="'+ $('.address').val() +'"/>');
        $('#propose').append('<input type="hidden" name="time"  value="'+ blockOn.eq(2).text() +'"/>');
        $('#propose').append('<input type="hidden" name="scene_id"  value="'+ blockOn.eq(0).attr('value') +'"/>');
        $('#propose').append('<input type="hidden" name="topic_id"  value="'+ blockOn.eq(3).attr('value')+'"/>');
    }
}
function removeStr(str)
{
    if(str.substr(str.length-1,str.length)=="/")
    {
        str=str.substr(0,str.length-1);
    }
    return str;
}
//第二步操作
function stepPrevTwo() {
    $('.order-main').eq(0).addClass('block').siblings().removeClass('block')
}

//手机号验证
function isnum(Tel){
    var re=new RegExp(/^((\d{11})|^((\d{7,8})|(\d{4}|\d{3})-(\d{7,8})|(\d{4}|\d{3})-(\d{7,8})-(\d{4}|\d{3}|\d{2}|\d{1})|(\d{7,8})-(\d{4}|\d{3}|\d{2}|\d{1}))$)$/);
    var retu=Tel.value.match(re);
    if(retu){
        $('.block input').eq(3).parent().parent().find('dd.tips').text('');
        return true;
    }else{
        $('.block input').eq(3).parent().parent().find('dd.tips').text('手机号格式错误');
        obj.focus();
        return false;
    }
}
$('.input').change(function () {
    if($(this).val() == ''){
        var tipsText = $(this).parent().attr('value');
        $(this).parent().parent().find('dd.tips').text('请输入'+tipsText)
    }
});

//第三步
function stepNextThree() {
    $('.order-main').eq(3).addClass('block').siblings().removeClass('block')
}
function stepPrevThree() {
    $('.order-main').eq(1).addClass('block').siblings().removeClass('block')
}

//第四步
function stepNextFour() {
    $('.order-main').eq(4).addClass('block').siblings().removeClass('block')
}

//第四步
function stepNextFive() {
    $('.order-main').eq(5).addClass('block').siblings().removeClass('block')
}