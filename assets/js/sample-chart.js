var sampleChartClass;

(function ($) {
    $(document).ready(function () {
        var ctx = document.getElementById("lineChart");
        sampleChartClass.ChartData(ctx);

        // var pieChart = document.getElementById("my");
    });

    sampleChartClass = {
        ChartData: function (ctx) {
            new Chart(ctx, {
                type: "bar",
                data: {
                    labels: [
                        "Barang-Stok",
                        "Barang-Masuk",
                        "Barang-Keluar",
                        "Request",
                        // "Purple",
                        // "Orange",
                    ],
                    datasets: [
                        {
                            label: "# of Votes",
                            data: [12, 19, 3, 5],
                            borderWidth: 1,
                        },
                    ],
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true,
                        },
                    },
                },
            });
        },
    };
})(jQuery);
