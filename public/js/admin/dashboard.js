var Dashboard = (function (w, $, undefined) {

    function init () {
        $('#left-panel li[data-nav="dashboard"]').addClass('active');
        chartInit();
    }

    function chartInit () {
        var plot = $.plot($("#site-stats"), [{
            data : w.pageviews,
            label : "Páginas visitadas"
        }, {
            data : w.visitors,
            label : "Visitantes"
        }], {
            series : {
                lines : {
                    show : true,
                    lineWidth : 1,
                    fill : true,
                    fillColor : {
                        colors : [{
                            opacity : 0.1
                        }, {
                            opacity : 0.15
                        }]
                    }
                },
                points : {
                    show : true
                },
                shadowSize : 0
            },
            xaxis : {
                mode: "time",
                timeformat: "%d.%m.%y",
                minTickSize: [1,"day"],
            },
            yaxes : [{
                tickLength : 5
            }],
            grid : {
                hoverable : true,
                clickable : true,
                tickColor : "#efefef",
                borderWidth : 0,
                borderColor : "#efefef",
            },
            tooltip : true,
            tooltipOpts : {
                content : "%s: %y",
                dateFormat : "%d-%m",
                defaultTheme : false
            },
            colors : ["#FF9F01", "#7e9d3a"],
        });
    }

    return {
        init : function () {
            init();
        }
    }

})(window, jQuery);

$(document).ready(function () {
    Dashboard.init();
});