function jiazai(id, num) {
    $.ajax({
        type: "get",
        url: "/data/dataread.php?id=" + id + "&pg=" + num,
        async: true,
        dataType: "json",
        success: function (data) {
            if (data.status == "success") {
                $('.jz').html("<a href='javascript:void(0);' style='color: rgba(255,16,26,0.65);'>点我加载更多</a>");
                for (var i = 0; i < Object.keys(data.result).length; i++) {
                    $('.table tbody').append("<tr><td><a href=\"javascript:void(0);\" data-id=\"" + data.result[i].id + "\">" + data.result[i].title + "</a></td><td>" + data.result[i].category + "</td><td>" + data.result[i].date + "</td></tr>");
                }
            }else{
                $('.jz').text('系统繁忙请稍后再试！');
            }
        }
    });
}

$(function () {
    var num = 1;
    jiazai(id, num);
    $(document.body).on("click", ".jz a", function () {
        $('.jz').text('正在加载中...');
        num = num + 1;
        if (num == 15) {
            $('.jz').text('到底啦！！');
        } else {
            jiazai(id, num);
        }
    });
    $(document.body).on("click", "td a", function () {
        window.location = "/play/" + $(this).attr('data-id');
    });
});