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