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


// morris chart


function drawLineCharts() {
    //lấy dữ liệu từ form
    let form = $('#line-charts:first');
    //print check
    console.log(form.find('#startDate').val());
    console.log(form.find('#endDate').val());
//import data from form
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
        .done((charts) => {
            let lineChart = charts[0];
            console.log(lineChart);

            $('#area-chart').empty();    //xóa biểu đồ cũ

            new Morris.Area({
                data: lineChart.data,

                element: 'area-chart',
                xkey: lineChart.xkey,
                xLabels: lineChart.xLabels,
                // xLabelFormat: (x) => {
                //     x
                // },
                ykeys: lineChart.ykeys,
                postUnits: ' 000 VND',
                labels: lineChart.labels,
            });

            let donutChart = charts[1];
            console.log(donutChart);

            new Morris.Donut({
                data: donutChart.data,

                element: 'donut-chart',
                resize: true
            })
        })
        .fail(() => {

        })
}
