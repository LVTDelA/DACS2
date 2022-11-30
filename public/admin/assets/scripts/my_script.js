// = = = = = = = = = = = = = = = = changeImg = = = = = = = = = = = = = = = =
function changeImg(input) {
    //Nếu như tồn thuộc tính file, đồng nghĩa người dùng đã chọn file mới
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        //Sự kiện file đã được load vào website
        reader.onload = function (e) {
            //Thay đổi đường dẫn ảnh
            $(input).siblings('.thumbnail').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
//Khi click #thumbnail thì cũng gọi sự kiện click #image
$(document).ready(function () {
    $('.thumbnail').click(function () {
        $(this).siblings('.image').click();
    });

    drawLineCharts();
});

function drawLineCharts() {
    let form = $('#line-charts:first');

    console.log(form.find('#startDate').val());
    console.log(form.find('#endDate').val());

    let dataParam = {
        statisticsBy: form.find('select').val(),
        startDate: form.find('#startDate').val(),
        endDate: form.find('#endDate').val()
    };

    $.ajax({
        method: 'GET',
        url: 'admin/manage/dataChartLine',
        data: dataParam
    })
        .done((chart) => {
            console.log(chart);

            $('#chart').empty();

            new Morris.Area({
                data: chart.data,

                element: 'chart',
                xkey: chart.xkey,
                xLabels: chart.xLabels,
                // xLabelFormat: (x) => {
                //     x
                // },
                ykeys: chart.ykeys,
                postUnits: ' 000 VND',
                labels: chart.labels,

            });
        })
        .fail(() => {

        })
}
