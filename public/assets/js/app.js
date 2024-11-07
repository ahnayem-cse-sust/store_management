function H(e, o) {
    var a = {
        series: [
            { name: "Net Profit", type: "column", data: [22, 34, 56, 37, 35, 21, 34, 60, 78, 56, 53, 89] },
            { name: "Sales", type: "column", data: [42, 50, 70, 57, 55, 58, 43, 80, 54, 23, 34, 77] },
            { name: "Total", type: "line", data: [25, 36, 58, 39, 38, 25, 37, 62, 56, 25, 37, 79] },
        ],
        chart: { height: 300, foreColor: "rgba(142, 156, 173, 0.9)" },
        stroke: { width: [0, 2, 4], curve: "smooth" },
        grid: { borderColor: "transparent" },
        colors: [e || "#4d65d9", "#d7d7d9", "#e4e7ed"],
        plotOptions: { bar: { endingShape: "rounded", horizontal: !1, columnWidth: "30%" } },
        dataLabels: { enabled: !1 },
        legend: { show: !0, position: "top", labels: { color: "rgba(142, 156, 173, 0.9)" }, fontFamily: "Hind Siliguri" },
        stroke: { show: !0, width: 4, colors: ["transparent"] },
        yaxis: {
            title: { style: { color: "#adb5be", fontSize: "14px", fontFamily: "Hind Siliguri", fontWeight: 600, cssClass: "apexcharts-yaxis-label" } },
            labels: { rotate: -90, style: { fontFamily: "Hind Siliguri", cssClass: "summaryyaxis" } },
        },
        xaxis: {
            type: "month",
            categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
            axisBorder: { show: !0, color: "rgba(119, 119, 142, 0.05)", offsetX: 0, offsetY: 0 },
            axisTicks: { show: !0, borderType: "solid", color: "rgba(119, 119, 142, 0.05)", width: 6, offsetX: 0, offsetY: 0 },
            labels: { rotate: -90, style: { fontFamily: "Hind Siliguri", cssClass: "summaryxaxis" } },
        },
        markers: { size: 0 },
    };
    (document.getElementById("salessummary").innerHTML = ""),
        new ApexCharts(document.querySelector("#salessummary"), a).render(),
        $("#circle1")
            .circleProgress({ value: 0.7, size: 60, fill: { color: ["#ff9b21"] } })
            .on("circle-animation-progress", function (e, o) {
                $(this)
                    .find("strong")
                    .html(Math.round(70 * o) + "<i>%</i>");
            }),
        $("#circle2")
            .circleProgress({ value: 0.85, size: 60, fill: { color: ["#19b159"] } })
            .on("circle-animation-progress", function (e, o) {
                $(this)
                    .find("strong")
                    .html(Math.round(85 * o) + "<i>%</i>");
            }),
        $("#circle3")
            .circleProgress({ value: 0.85, size: 60, fill: { color: ["#01b8ff"] } })
            .on("circle-animation-progress", function (e, o) {
                $(this)
                    .find("strong")
                    .html(Math.round(90 * o) + "<i>%</i>");
            });
}
var g,
    D = document.getElementById("sales-summary");
function F(e, o) {
    (g.data.datasets = [
        { label: "Sales", data: [27, 16, 27, 22, 14, 18, 27, 21, 14, 27, 20, 27], backgroundColor: e, borderWidth: 1, hoverBackgroundColor: e, hoverBorderWidth: 0, borderColor: e, hoverBorderColor: e, barPercentage: 0.15 },
        {
            label: "Profits",
            data: [44, 24, 39, 30, 31, 32, 39, 28, 24, 39, 31, 39],
            backgroundColor: o(e, 0.2) || "#9fa8e0",
            borderWidth: 1,
            hoverBackgroundColor: o(e, 0.2) || "#9fa8e0",
            hoverBorderWidth: 0,
            borderColor: o(e, 0.2) || "#9fa8e0",
            hoverBorderColor: o(e, 0.2) || "#9fa8e0",
            barPercentage: 0.15,
        },
    ]),
        g.update();
}
function N(e, o) {
    if (
        ((document.querySelector(".bg-primary-light-1").style.background = o(e, 0.7)),
        (document.querySelector(".bg-primary-light-2").style.background = o(e, 0.5)),
        (document.querySelector(".bg-primary-light-3").style.background = o(e, 0.2)),
        new Morris.Donut({
            element: "revenuemorrischart",
            data: [
                { label: "clients", value: 15 },
                { label: "sales", value: 42 },
                { label: "shares", value: 20 },
                { label: "profits", value: 23 },
            ],
            colors: [o(e, 0.7) || "#7886d3", e, o(e, 0.2) || "#d8dcf3", o(e, 0.5) || "#9fa8e0"],
            labelColor: "#77778e",
            resize: !0,
        }),
        document.querySelectorAll("#revenuemorrischart svg").length >= 2)
    ) {
        let e = document.querySelectorAll("#revenuemorrischart svg");
        for (var a = 0; a <= e.length - 1; a++) 0 == a || e[a].remove();
    }
}
D &&
    (g = new Chart(D, {
        type: "bar",
        data: {
            labels: ["Jan", "Feb", "Mar", "Apr", "May", "June", "July", "Aug", "Sep", "Oct", "Nov", "Dec"],
            datasets: [
                {
                    label: "Sales",
                    data: [27, 16, 27, 22, 14, 18, 27, 21, 14, 27, 20, 27],
                    backgroundColor: "#9fa8e0",
                    borderWidth: 1,
                    hoverBackgroundColor: "#9fa8e0",
                    hoverBorderWidth: 0,
                    borderColor: "#9fa8e0",
                    hoverBorderColor: "#9fa8e0",
                    barPercentage: 0.15,
                },
                {
                    label: "Profits",
                    data: [44, 24, 39, 30, 31, 32, 39, 28, 24, 39, 31, 39],
                    backgroundColor: "#9fa8e0",
                    borderWidth: 1,
                    hoverBackgroundColor: "#9fa8e0",
                    hoverBorderWidth: 0,
                    borderColor: "#9fa8e0",
                    hoverBorderColor: "#9fa8e0",
                    barPercentage: 0.15,
                },
            ],
        },
        options: {
            responsive: !0,
            maintainAspectRatio: !1,
            plugins: { layout: { padding: { left: 0, right: 0, top: 0, bottom: 0 } }, tooltips: { enabled: !1 }, legend: { display: !0 }, elements: { point: { radius: 0 } } },
            scales: {
                y: {
                    gridLines: { display: !0, drawBorder: !1, zeroLineColor: "rgba(142, 156, 173,0.1)", color: "rgba(142, 156, 173,0.1)" },
                    scaleLabel: { display: !1 },
                    ticks: { beginAtZero: !0, stepSize: 10, max: 50, fontColor: "#8492a6", fontFamily: "Hind Siliguri" },
                },
                x: {
                    barPercentage: 0.15,
                    barValueSpacing: 3,
                    barDatasetSpacing: 3,
                    barRadius: 5,
                    stacked: !0,
                    ticks: { beginAtZero: !0, fontColor: "#8492a6", fontFamily: "Hind Siliguri" },
                    gridLines: { color: "rgba(142, 156, 173,0.1)", display: !1 },
                },
            },
        },
    })),
    $(function () {
        $(document).on("click", "#myonoffswitch1", function () {
            var e, o, a, t, r;
            if (this.checked) {
                $("body").addClass("dark-menu"),
                    $("body").addClass("light-theme"),
                    $("#myonoffswitch5").prop("checked", !0),
                    $("#myonoffswitch6").prop("checked", !0),
                    $("body").removeClass("dark-theme"),
                    $("body").removeClass("color-header"),
                    $("body").removeClass("header-dark"),
                    $("body").removeClass("color-menu"),
                    $("body").removeClass("light-menu"),
                    localStorage.setItem("dashplexlighttheme", !0),
                    localStorage.removeItem("dashplexdarktheme"),
                    localStorage.removeItem("dashplexprimaryColor"),
                    localStorage.removeItem("dashplexprimaryHoverColor"),
                    localStorage.removeItem("dashplexprimaryBorderColor"),
                    null == (e = document.querySelector("html")) || e.style.removeProperty("--dark-body"),
                    null == (o = document.querySelector("html")) || o.style.removeProperty("--dark-theme"),
                    null == (a = document.querySelector("html")) || a.style.removeProperty("--primary-bg-color"),
                    null == (t = document.querySelector("html")) || t.style.removeProperty("--primary-hover-color"),
                    null == (r = document.querySelector("html")) || r.style.removeProperty("--primary-border-color"),
                    localStorage.removeItem("dashplexdarkPrimary"),
                    localStorage.removeItem("dashplexprimaryBorderColor"),
                    localStorage.removeItem("dashplexprimaryHoverColor"),
                    localStorage.removeItem("dashplexbgColor"),
                    $("#myonoffswitch1").prop("checked", !0),
                    $("#myonoffswitch3").prop("checked", !1),
                    $("#myonoffswitch8").prop("checked", !1);
                (document.querySelector(":root").style = ""), y();
            } else $("body").removeClass("lighttheme"), localStorage.removeItem("dashplexlighttheme");
            h();
        }),
            $(document).on("click", "#myonoffswitch2", function () {
                var e, o, a, t;
                if (this.checked) {
                    $("body").addClass("dark-theme"),
                        $("body").addClass("dark-menu"),
                        $("#myonoffswitch5").prop("checked", !0),
                        $("#myonoffswitch8").prop("checked", !0),
                        $("body").removeClass("light-theme"),
                        $("body").removeClass("light-menu"),
                        $("body").removeClass("color-menu"),
                        $("body").removeClass("color-header"),
                        $("body").removeClass("header-light"),
                        localStorage.setItem("dashplexdarktheme", !0),
                        localStorage.setItem("dashplexdarkheader", !0),
                        localStorage.removeItem("dashplexlighttheme"),
                        localStorage.removeItem("dashplexprimaryColor"),
                        localStorage.removeItem("dashplexprimaryHoverColor"),
                        localStorage.removeItem("dashplexprimaryBorderColor"),
                        localStorage.removeItem("dashplexdarkPrimary"),
                        null == (e = document.querySelector("html")) || e.style.removeProperty("--primary-bg-color", localStorage.darkPrimary),
                        null == (o = document.querySelector("html")) || o.style.removeProperty("--primary-bg-hover", localStorage.darkPrimary),
                        null == (a = document.querySelector("html")) || a.style.removeProperty("--primary-bg-border", localStorage.darkPrimary),
                        null == (t = document.querySelector("html")) || t.style.removeProperty("--dark-primary", localStorage.darkPrimary),
                        localStorage.removeItem("dashplexprimaryColor"),
                        localStorage.removeItem("dashplexprimaryHoverColor"),
                        localStorage.removeItem("dashplexprimaryBorderColor"),
                        $("#myonoffswitch3").prop("checked", !1),
                        $("#myonoffswitch6").prop("checked", !1),
                        h();
                    (document.querySelector(":root").style = ""), y();
                } else $("body").removeClass("dark-theme"), localStorage.removeItem("dashplexdarktheme");
                h();
            }),
            $(document).on("click", "#myonoffswitch3", function () {
                this.checked &&
                    ($("body").addClass("light-menu"),
                    $("body").removeClass("color-menu"),
                    $("body").removeClass("dark-menu"),
                    localStorage.setItem("dashplexlightmenu", !0),
                    localStorage.removeItem("dashplexcolormenu"),
                    localStorage.removeItem("dashplexdarkmenu"));
            }),
            $(document).on("click", "#myonoffswitch4", function () {
                this.checked &&
                    ($("body").addClass("color-menu"),
                    $("body").removeClass("dark-menu"),
                    $("body").removeClass("light-menu"),
                    localStorage.setItem("dashplexcolormenu", !0),
                    localStorage.removeItem("dashplexdarkmenu"),
                    localStorage.removeItem("dashplexlightmenu"));
            }),
            $(document).on("click", "#myonoffswitch5", function () {
                this.checked &&
                    ($("body").addClass("dark-menu"),
                    $("body").removeClass("color-menu"),
                    $("body").removeClass("light-menu"),
                    localStorage.setItem("dashplexdarkmenu", !0),
                    localStorage.removeItem("dashplexcolormenu"),
                    localStorage.removeItem("dashplexlightmenu"));
            }),
            $(document).on("click", "#myonoffswitch6", function () {
                this.checked &&
                    ($("body").addClass("header-light"),
                    $("body").removeClass("color-header"),
                    $("body").removeClass("header-dark"),
                    localStorage.setItem("dashplexlightheader", !0),
                    localStorage.removeItem("dashplexcolorheader"),
                    localStorage.removeItem("dashplexdarkheader"));
            }),
            $(document).on("click", "#myonoffswitch7", function () {
                this.checked &&
                    ($("body").addClass("color-header"),
                    $("body").removeClass("header-light"),
                    $("body").removeClass("header-dark"),
                    localStorage.setItem("dashplexcolorheader", !0),
                    localStorage.removeItem("dashplexlightheader"),
                    localStorage.removeItem("dashplexdarkheader"));
            }),
            $(document).on("click", "#myonoffswitch8", function () {
                this.checked &&
                    ($("body").addClass("header-dark"),
                    $("body").removeClass("color-header"),
                    $("body").removeClass("header-light"),
                    localStorage.setItem("dashplexdarkheader", !0),
                    localStorage.removeItem("dashplexlightheader"),
                    localStorage.removeItem("dashplexcolorheader"));
            }),
            $(document).on("click", "#myonoffswitch9", function () {
                this.checked &&
                    ($("body").addClass("layout-fullwidth"),
                    document.querySelector("body").classList.contains("horizontal") && !document.querySelector("body").classList.contains("login-img") && checkHoriMenu(),
                    $("body").removeClass("layout-boxed"));
            }),
            $(document).on("click", "#myonoffswitch10", function () {
                this.checked && ($("body").addClass("layout-boxed"), document.querySelector("body").classList.contains("horizontal") && checkHoriMenu(), $("body").removeClass("layout-fullwidth"));
            }),
            $(document).on("click", "#myonoffswitch11", function () {
                this.checked && ($("body").addClass("fixed-layout"), $("body").removeClass("scrollable-layout"));
            }),
            $(document).on("click", "#myonoffswitch12", function () {
                this.checked && ($("body").addClass("scrollable-layout"), $("body").removeClass("fixed-layout"));
            }),
            $(document).on("click", "#myonoffswitch13", function () {
                this.checked &&
                    ($("body").addClass("default-menu"),
                    $("body").removeClass("closed-menu"),
                    $("body").removeClass("icontext-menu"),
                    $("body").removeClass("icon-overlay"),
                    $("body").removeClass("main-sidebar-hide"),
                    $("body").removeClass("hover-submenu"),
                    $("body").removeClass("hover-submenu1"),
                    localStorage.setItem("dashplexdefaultmenu", !0),
                    localStorage.removeItem("dashplexclosedmenu"),
                    localStorage.removeItem("dashplexicontextmenu"),
                    localStorage.removeItem("dashplexsideiconmenu"),
                    localStorage.removeItem("dashplexhoversubmenu"),
                    localStorage.removeItem("dashplexhoversubmenu1"));
            }),
            $(document).on("click", "#myonoffswitch16", function () {
                this.checked &&
                    ($("body").addClass("closed-menu"),
                    $("body").addClass("main-sidebar-hide"),
                    $("body").removeClass("default-menu"),
                    $("body").removeClass("icontext-menu"),
                    $("body").removeClass("icon-overlay"),
                    $("body").removeClass("hover-submenu"),
                    $("body").removeClass("hover-submenu1"),
                    localStorage.setItem("dashplexclosedmenu", !0),
                    localStorage.removeItem("dashplexdefaultmenu"),
                    localStorage.removeItem("dashplexicontextmenu"),
                    localStorage.removeItem("dashplexsideiconmenu"),
                    localStorage.removeItem("dashplexhoversubmenu"),
                    localStorage.removeItem("dashplexhoversubmenu1"));
            }),
            $(document).on("click", "#myonoffswitch17", function () {
                this.checked &&
                    ($("body").addClass("hover-submenu"),
                    $("body").addClass("main-sidebar-hide"),
                    $("body").removeClass("default-menu"),
                    $("body").removeClass("icontext-menu"),
                    $("body").removeClass("icon-overlay"),
                    $("body").removeClass("closed-menu"),
                    $("body").removeClass("hover-submenu1"),
                    localStorage.setItem("dashplexhoversubmenu", !0),
                    localStorage.removeItem("dashplexdefaultmenu"),
                    localStorage.removeItem("dashplexclosedmenu"),
                    localStorage.removeItem("dashplexicontextmenu"),
                    localStorage.removeItem("dashplexsideiconmenu"),
                    localStorage.removeItem("dashplexhoversubmenu1"),
                    !0 !== document.querySelector(".page").classList.contains("main-signin-wrapper") && hovermenu());
            }),
            $(document).on("click", "#myonoffswitch18", function () {
                this.checked &&
                    ($("body").addClass("hover-submenu1"),
                    $("body").addClass("main-sidebar-hide"),
                    $("body").removeClass("default-menu"),
                    $("body").removeClass("icontext-menu"),
                    $("body").removeClass("icon-overlay"),
                    $("body").removeClass("closed-menu"),
                    $("body").removeClass("hover-submenu"),
                    localStorage.setItem("dashplexhoversubmenu1", !0),
                    localStorage.removeItem("dashplexdefaultmenu"),
                    localStorage.removeItem("dashplexclosedmenu"),
                    localStorage.removeItem("dashplexicontextmenu"),
                    localStorage.removeItem("dashplexsideiconmenu"),
                    localStorage.removeItem("dashplexhoversubmenu"),
                    !0 !== document.querySelector(".page").classList.contains("main-signin-wrapper") && hovermenu());
            }),
            $(document).on("click", "#myonoffswitch14", function () {
                this.checked &&
                    ($("body").addClass("icontext-menu"),
                    $("body").addClass("main-sidebar-hide"),
                    $("body").removeClass("default-menu"),
                    $("body").removeClass("icon-overlay"),
                    $("body").removeClass("closed-menu"),
                    $("body").removeClass("hover-submenu"),
                    $("body").removeClass("hover-submenu1"),
                    localStorage.setItem("dashplexicontextmenu", !0),
                    localStorage.removeItem("dashplexdefaultmenu"),
                    localStorage.removeItem("dashplexclosedmenu"),
                    localStorage.removeItem("dashplexsideiconmenu"),
                    localStorage.removeItem("dashplexhoversubmenu"),
                    localStorage.removeItem("dashplexhoversubmenu1"),
                    !0 !== document.querySelector(".page").classList.contains("main-signin-wrapper") && icontext());
            }),
            $(document).on("click", "#myonoffswitch15", function () {
                this.checked &&
                    ($("body").addClass("icon-overlay"),
                    hovermenu(),
                    $("body").addClass("main-sidebar-hide"),
                    $("body").removeClass("default-menu"),
                    $("body").removeClass("icontext-menu"),
                    $("body").removeClass("closed-menu"),
                    $("body").removeClass("hover-submenu"),
                    $("body").removeClass("hover-submenu1"),
                    localStorage.setItem("dashplexsideiconmenu", !0),
                    localStorage.removeItem("dashplexdefaultmenu"),
                    localStorage.removeItem("dashplexclosedmenu"),
                    localStorage.removeItem("dashplexicontextmenu"),
                    localStorage.removeItem("dashplexhoversubmenu"),
                    localStorage.removeItem("dashplexhoversubmenu1"));
            }),
            $(document).on("click", "#myonoffswitch01", function () {
                if (this.checked) {
                    $("body").addClass("leftmenu"),
                        $("body").addClass("main-body"),
                        $("body").removeClass("horizontalmenu"),
                        $("body").removeClass("horizontalmenu-hover"),
                        $(".main-content").addClass("side-content"),
                        $(".main-header").removeClass(" hor-header"),
                        $(".main-header").addClass("sticky"),
                        $(".main-content").removeClass("hor-content"),
                        $(".main-container").removeClass("container"),
                        $(".main-container-1").removeClass("container"),
                        $(".main-container").addClass("container-fluid"),
                        $(".main-menu").removeClass("main-navbar hor-menu "),
                        $(".main-menu").addClass("main-sidebar main-sidebar-sticky side-menu"),
                        $(".main-container-1").addClass("main-sidebar-header"),
                        $(".main-body-1").addClass("main-sidebar-body"),
                        $(".menu-icon").addClass("sidemenu-icon"),
                        $(".menu-icon").removeClass("hor-icon"),
                        localStorage.setItem("dashplexleftmenu", !0),
                        localStorage.removeItem("dashplexhorizontalmenuhover"),
                        localStorage.removeItem("dashplexhorizontalmenu"),
                        HorizontalHovermenu(),
                        ActiveSubmenu();
                    var e = window.location.pathname.split("/");
                    $(".main-menu li a").each(function () {
                        var o = $(this).attr("href");
                        if (o && e[e.length - 1] == o)
                            return (
                                $(this).addClass("active"),
                                $(this).parent().prev().addClass("active"),
                                $(this).parent().parent().prev().addClass("active"),
                                $(this).parent().parent().parent().parent().prev().addClass("active"),
                                $(this).parent().parent().parent().parent().parent().addClass("is-expanded"),
                                $(this).parent().parent().prev().click(),
                                $(this)
                                    .parent()
                                    .parent()
                                    .slideDown(300, function () {}),
                                $(this)
                                    .parent()
                                    .parent()
                                    .parent()
                                    .parent()
                                    .slideDown(300, function () {}),
                                $(this)
                                    .parent()
                                    .parent()
                                    .parent()
                                    .parent()
                                    .slideDown(300, function () {}),
                                !1
                            );
                    });
                } else $("body").removeClass("leftmenu"), $("body").addClass("horizontalmenu");
            }),
            $(document).on("click", "#myonoffswitch02", function () {
                this.checked
                    ? (window.innerWidth >= 992 &&
                          (document.querySelectorAll(".sub-nav-sub").forEach((e) => {
                              e.style.display = "";
                          }),
                          document.querySelectorAll(".nav-sub").forEach((e) => {
                              e.style.display = "";
                          })),
                      checkHoriMenu(),
                      $("body").addClass("horizontalmenu"),
                      $("body").removeClass("horizontalmenu-hover"),
                      $("body").removeClass("leftmenu"),
                      $("body").removeClass("main-body"),
                      $(".main-content").addClass("hor-content"),
                      $(".main-header").addClass("hor-header"),
                      $(".main-header").removeClass("sticky"),
                      $(".main-content").removeClass("side-content"),
                      $(".main-container").addClass("container"),
                      $(".main-container-1").addClass("container"),
                      $(".main-container").removeClass("container-fluid"),
                      $(".main-menu").addClass("main-navbar hor-menu"),
                      $(".main-menu").removeClass("ps"),
                      $(".main-menu").removeClass("main-sidebar main-sidebar-sticky side-menu"),
                      $(".main-container-1").removeClass("main-sidebar-header"),
                      $(".main-body-1").removeClass("main-sidebar-body"),
                      $(".menu-icon").removeClass("sidemenu-icon"),
                      $(".menu-icon").addClass("hor-icon"),
                      $("body").removeClass("default-menu"),
                      $("body").removeClass("closed-leftmenu"),
                      $("body").removeClass("icontext-menu"),
                      $("body").removeClass("main-sidebar-hide"),
                      $("body").removeClass("main-sidebar-open"),
                      $("body").removeClass("icon-overlay"),
                      $("body").removeClass("hover-submenu"),
                      $("body").removeClass("hover-submenu1"),
                      localStorage.setItem("dashplexhorizontalmenu", !0),
                      localStorage.removeItem("dashplexhorizontalmenuhover"),
                      localStorage.removeItem("dashplexleftmenu"),
                      HorizontalHovermenu())
                    : ($("body").removeClass("horizontalmenu"), $("body").addClass("leftmenu"));
            }),
            $(document).on("click", "#myonoffswitch03", function () {
                this.checked
                    ? (window.innerWidth >= 992 &&
                          (document.querySelectorAll(".sub-nav-sub").forEach((e) => {
                              e.style.display = "";
                          }),
                          document.querySelectorAll(".nav-sub").forEach((e) => {
                              e.style.display = "";
                          })),
                      checkHoriMenu(),
                      $("body").addClass("horizontalmenu"),
                      $("body").addClass("horizontalmenu-hover"),
                      $("body").removeClass("leftmenu"),
                      $("body").removeClass("main-body"),
                      $(".main-content").addClass("hor-content"),
                      $(".main-header").addClass("hor-header"),
                      $(".main-menu").removeClass("ps"),
                      $(".main-header").removeClass("sticky"),
                      $(".main-content").removeClass("side-content"),
                      $(".main-container").addClass("container"),
                      $(".main-container-1").addClass("container"),
                      $(".main-container").removeClass("container-fluid"),
                      $(".main-menu").addClass("main-navbar hor-menu"),
                      $(".main-menu").removeClass("main-sidebar main-sidebar-sticky side-menu"),
                      $(".main-container-1").removeClass("main-sidebar-header"),
                      $(".main-body-1").removeClass("main-sidebar-body"),
                      $(".menu-icon").removeClass("sidemenu-icon"),
                      $(".menu-icon").addClass("hor-icon"),
                      $("body").removeClass("default-menu"),
                      $("body").removeClass("closed-leftmenu"),
                      $("body").removeClass("icontext-menu"),
                      $("body").removeClass("main-sidebar-hide"),
                      $("body").removeClass("main-sidebar-open"),
                      $("body").removeClass("icon-overlay"),
                      $("body").removeClass("hover-submenu"),
                      $("body").removeClass("hover-submenu1"),
                      localStorage.setItem("dashplexhorizontalmenuhover", !0),
                      localStorage.removeItem("dashplexhorizontal"),
                      localStorage.removeItem("dashplexleftmenu"),
                      HorizontalHovermenu())
                    : ($("body").removeClass("horizontalmenu"), $("body").removeClass("horizontalmenu-hover"), $("body").addClass("leftmenu"));
            }),
            $(function () {
                $("body").hasClass("horizontalmenu") &&
                    (window.innerWidth >= 992 &&
                        (document.querySelectorAll(".sub-nav-sub").forEach((e) => {
                            (e.style.display = ""), e.parentElement.classList.remove("show");
                        }),
                        document.querySelectorAll(".nav-sub").forEach((e) => {
                            (e.style.display = ""), e.parentElement.classList.remove("show");
                        })),
                    $("body").addClass("horizontalmenu"),
                    $("body").removeClass("leftmenu"),
                    $("body").removeClass("main-body"),
                    $(".main-content").addClass("hor-content"),
                    $(".main-header").addClass(" hor-header"),
                    $(".main-header").removeClass("sticky"),
                    $(".main-content").removeClass("side-content"),
                    $(".main-container").addClass("container"),
                    $(".main-container-1").addClass("container"),
                    $(".main-menu").removeClass("ps"),
                    $(".main-container").removeClass("container-fluid"),
                    $(".main-menu").addClass("main-navbar hor-menu"),
                    $(".main-menu").removeClass("main-sidebar main-sidebar-sticky side-menu"),
                    $(".main-container-1").removeClass("main-sidebar-header"),
                    $(".main-body-1").removeClass("main-sidebar-body"),
                    $(".menu-icon").removeClass("sidemenu-icon"),
                    $(".menu-icon").addClass("hor-icon"),
                    $("body").removeClass("default-menu"),
                    $("body").removeClass("closed-leftmenu"),
                    $("body").removeClass("icontext-menu"),
                    $("body").removeClass("main-sidebar-hide"),
                    $("body").removeClass("main-sidebar-open"),
                    $("body").removeClass("icon-overlay"),
                    $("body").removeClass("hover-submenu"),
                    $("body").removeClass("hover-submenu1"));
            }),
            $(document).on("click", "#myonoffswitch20", function () {
                var e;
                if (this.checked) {
                        localStorage.setItem("dashplexrtl", !0),
                        localStorage.removeItem("dashplexltr"),
                        $("head link#style").attr("href", $(this)),
                        null == (e = document.getElementById("style")) || e.setAttribute("href", "https://laravel8.spruko.com/dashplex/build/assets/plugins/bootstrap/css/bootstrap.rtl.min.css");
                    var o = $(".owl-carousel");
                    $.each(o, function (e, o) {
                        var a = $(o).data("owl.carousel");
                        (a.settings.rtl = !0), (a.options.rtl = !0), $(o).trigger("refresh.owl.carousel");
                    }),
                        document.querySelector("body").classList.contains("horizontal") && !document.querySelector("body").classList.contains("login-img") && checkHoriMenu();
                }
            }),
            $(document).on("click", "#myonoffswitch19", function () {
                var e, o;
                if (this.checked) {
                        localStorage.setItem("dashplexltr", !0),
                        localStorage.removeItem("dashplexrtl"),
                        $("head link#style").attr("href", $(this)),
                        null == (e = document.getElementById("style")) || e.setAttribute("href", "https://laravel8.spruko.com/dashplex/build/assets/plugins/bootstrap/css/bootstrap.min.css");
                    var a = $(".owl-carousel");
                    $.each(a, function (e, o) {
                        var a = $(o).data("owl.carousel");
                        (a.settings.rtl = !1),
                            (a.options.rtl = !1),
                            $(o).trigger("refresh.owl.carousel"),
                            document.querySelector("body").classList.contains("horizontal") && !document.querySelector("body").classList.contains("login-img") && checkHoriMenu();
                    });
                } else
                        localStorage.setItem("dashplexltr", "false"),
                        $("head link#style").attr("href", $(this)),
                        null == (o = document.getElementById("style")) || o.setAttribute("href", "https://laravel8.spruko.com/dashplex/build/assets/plugins/bootstrap/css/bootstrap.rtl.min.css");
            });
    }),
    $(function () {
        var e;
        if ($("body").hasClass("rtl")) {
                localStorage.setItem("dashplexrtl", !0),
                localStorage.removeItem("dashplexltr"),
                $("head link#style").attr("href", $(this)),
                null == (e = document.getElementById("style")) || e.setAttribute("href", "https://laravel8.spruko.com/dashplex/build/assets/plugins/bootstrap/css/bootstrap.rtl.min.css");
            var o = $(".owl-carousel");
            $.each(o, function (e, o) {
                var a = $(o).data("owl.carousel");
                (a.settings.rtl = !0), (a.options.rtl = !0), $(o).trigger("refresh.owl.carousel");
            }),
                document.querySelector("body").classList.contains("horizontal") && !document.querySelector("body").classList.contains("login-img") && checkHoriMenu();
        }
        $(function () {
            $("body").hasClass("horizontalmenu") &&
                (window.innerWidth >= 992 &&
                    (document.querySelectorAll(".sub-nav-sub").forEach((e) => {
                        e.style.display = "";
                    }),
                    document.querySelectorAll(".nav-sub").forEach((e) => {
                        e.style.display = "";
                    })),
                $("body").addClass("horizontalmenu"),
                $("body").removeClass("leftmenu"),
                $("body").removeClass("main-body"),
                $(".main-content").addClass("hor-content"),
                $(".main-header").addClass(" hor-header"),
                $(".main-menu").removeClass("ps"),
                $(".main-header").removeClass("sticky"),
                $(".main-content").removeClass("side-content"),
                $(".main-container").addClass("container"),
                $(".main-container-1").addClass("container"),
                $(".main-container").removeClass("container-fluid"),
                $(".main-menu").addClass("main-navbar hor-menu"),
                $(".main-menu").removeClass("main-sidebar main-sidebar-sticky side-menu"),
                $(".main-container-1").removeClass("main-sidebar-header"),
                $(".main-body-1").removeClass("main-sidebar-body"),
                $(".menu-icon").removeClass("sidemenu-icon"),
                $(".menu-icon").addClass("hor-icon"),
                $("body").removeClass("default-menu"),
                $("body").removeClass("closed-leftmenu"),
                $("body").removeClass("icontext-menu"),
                $("body").removeClass("main-sidebar-hide"),
                $("body").removeClass("main-sidebar-open"),
                $("body").removeClass("icon-overlay"),
                $("body").removeClass("hover-submenu"),
                $("body").removeClass("hover-submenu1"));
        }),
            $(function () {
                $("body").hasClass("horizontalmenu-hover") &&
                    (window.innerWidth >= 992 &&
                        (document.querySelectorAll(".sub-nav-sub").forEach((e) => {
                            e.style.display = "";
                        }),
                        document.querySelectorAll(".nav-sub").forEach((e) => {
                            e.style.display = "";
                        })),
                    $("body").addClass("horizontalmenu"),
                    $("body").addClass("horizontalmenu-hover"),
                    $("body").removeClass("leftmenu"),
                    $("body").removeClass("main-body"),
                    $(".main-content").addClass("hor-content"),
                    $(".main-header").addClass("hor-header"),
                    $(".main-menu").removeClass("ps"),
                    $(".main-header").removeClass("sticky"),
                    $(".main-content").removeClass("side-content"),
                    $(".main-container").addClass("container"),
                    $(".main-container-1").addClass("container"),
                    $(".main-container").removeClass("container-fluid"),
                    $(".main-menu").addClass("main-navbar hor-menu"),
                    $(".main-menu").removeClass("main-sidebar main-sidebar-sticky side-menu"),
                    $(".main-container-1").removeClass("main-sidebar-header"),
                    $(".main-body-1").removeClass("main-sidebar-body"),
                    $(".menu-icon").removeClass("sidemenu-icon"),
                    $(".menu-icon").addClass("hor-icon"),
                    $("body").removeClass("default-menu"),
                    $("body").removeClass("closed-leftmenu"),
                    $("body").removeClass("icontext-menu"),
                    $("body").removeClass("main-sidebar-hide"),
                    $("body").removeClass("main-sidebar-open"),
                    $("body").removeClass("icon-overlay"),
                    $("body").removeClass("hover-submenu"),
                    $("body").removeClass("hover-submenu1"),
                    !0 !== document.querySelector(".page").classList.contains("main-signin-wrapper") && (checkHoriMenu(), HorizontalHovermenu()));
            }),
            $("body").hasClass("closed-menu") && ($("body").addClass("closed-menu"), $("body").addClass("main-sidebar-hide")),
            $("body").hasClass("icon-overlay") && ($("body").addClass("icon-overlay"), $("body").addClass("main-sidebar-hide")),
            $("body").hasClass("icontext-menu") && (!0 !== document.querySelector(".page").classList.contains("main-signin-wrapper") && icontext(), $("body").addClass("icontext-menu"), $("body").addClass("main-sidebar-hide")),
            $("body").hasClass("hover-submenu") && (!0 !== document.querySelector(".page").classList.contains("main-signin-wrapper") && hovermenu(), $("body").addClass("hover-submenu"), $("body").addClass("main-sidebar-hide")),
            $("body").hasClass("hover-submenu1") && (!0 !== document.querySelector(".page").classList.contains("main-signin-wrapper") && hovermenu(), $("body").addClass("hover-submenu1"), $("body").addClass("main-sidebar-hide")),
            h();
    });
let A = document.querySelector("#resetAll");
function M() {
    var e, o, a, t, r, l, s, n, d, c, m, i, u, h, p, b, v, g, f;
    localStorage.clear(),
        (document.querySelector("html").style = ""),
        y(),
        $("#myonoffswitch1").prop("checked", !0),
        $("#myonoffswitch19").prop("checked", !0),
        $("#myonoffswitch5").prop("checked", !0),
        $("#myonoffswitch6").prop("checked", !0),
        $("#myonoffswitch9").prop("checked", !0),
        $("#myonoffswitch01").prop("checked", !0),
        $("#myonoffswitch11").prop("checked", !0),
        $("#myonoffswitch13").prop("checked", !0),
        $("#myonoffswitch05").prop("checked", !0),
        $("#myonoffswitch02").prop("checked", !1),
        null == (e = $("body")) || e.addClass("dark-menu"),
        null == (o = $("body")) || o.addClass("leftmenu"),
        null == (a = $("body")) || a.addClass("main-body"),
        null == (t = $("body")) || t.removeClass("dark-theme"),
        null == (r = $("body")) || r.removeClass("light-menu"),
        null == (l = $("body")) || l.removeClass("color-menu"),
        null == (s = $("body")) || s.removeClass("header-dark"),
        null == (n = $("body")) || n.removeClass("gradient-header"),
        null == (d = $("body")) || d.removeClass("light-header"),
        null == (c = $("body")) || c.removeClass("color-header"),
        null == (m = $("body")) || m.removeClass("layout-boxed"),
        null == (i = $("body")) || i.removeClass("icontext-menu"),
        null == (u = $("body")) || u.removeClass("icon-overlay"),
        null == (h = $("body")) || h.removeClass("closed-menu"),
        null == (p = $("body")) || p.removeClass("hover-submenu"),
        null == (b = $("body")) || b.removeClass("hover-submenu1"),
        null == (v = $("body")) || v.removeClass("scrollable-layout"),
        null == (g = $("body")) || g.removeClass("main-sidebar-hide"),
        localStorage.setItem("dashplexltr", !0),
        localStorage.removeItem("dashplexrtl"),
        $("head link#style").attr("href", $(this)),
        null == (f = document.getElementById("style")) || f.setAttribute("href", "https://laravel8.spruko.com/dashplex/build/assets/plugins/bootstrap/css/bootstrap.min.css");
    var C = $(".owl-carousel");
    $.each(C, function (e, o) {
        var a = $(o).data("owl.carousel");
        (a.settings.rtl = !1),
            (a.options.rtl = !1),
            $(o).trigger("refresh.owl.carousel"),
            document.querySelector("body").classList.contains("horizontal") && !document.querySelector("body").classList.contains("login-img") && checkHoriMenu();
    }),
        $("body").removeClass("horizontalmenu"),
        $("body").removeClass("horizontalmenu-hover"),
        $(".main-content").addClass("side-content"),
        $(".main-header").removeClass(" hor-header"),
        $(".main-header").addClass("sticky"),
        $(".main-content").removeClass("hor-content"),
        $(".main-container").removeClass("container"),
        $(".main-container-1").removeClass("container"),
        $(".main-container").addClass("container-fluid"),
        $(".main-menu").removeClass("main-navbar hor-menu "),
        $(".main-menu").addClass("main-sidebar main-sidebar-sticky side-menu"),
        $(".main-container-1").addClass("main-sidebar-header"),
        $(".main-body-1").addClass("main-sidebar-body"),
        $(".menu-icon").addClass("sidemenu-icon"),
        $(".menu-icon").removeClass("hor-icon"),
        localStorage.setItem("dashplexleftmenu", !0),
        localStorage.removeItem("dashplexhorizontalmenuhover"),
        localStorage.removeItem("dashplexhorizontalmenu"),
        HorizontalHovermenu(),
        ActiveSubmenu();
    var S = window.location.pathname.split("/");
    $(".main-menu li a").each(function () {
        var e = $(this).attr("href");
        if (e && S[S.length - 1] == e)
            return (
                $(this).addClass("active"),
                $(this).parent().prev().addClass("active"),
                $(this).parent().parent().prev().addClass("active"),
                $(this).parent().parent().parent().parent().prev().addClass("active"),
                $(this).parent().parent().parent().parent().parent().addClass("is-expanded"),
                $(this).parent().parent().prev().click(),
                $(this)
                    .parent()
                    .parent()
                    .slideDown(300, function () {}),
                $(this)
                    .parent()
                    .parent()
                    .parent()
                    .parent()
                    .slideDown(300, function () {}),
                $(this)
                    .parent()
                    .parent()
                    .parent()
                    .parent()
                    .slideDown(300, function () {}),
                !1
            );
    });
}
function h() {
    document.querySelector("body").classList.contains("dark-theme") && $("#myonoffswitch2").prop("checked", !0),
        document.querySelector("body").classList.contains("horizontalmenu") && $("#myonoffswitch02").prop("checked", !0),
        document.querySelector("body").classList.contains("horizontalmenu-hover") && $("#myonoffswitch03").prop("checked", !0),
        document.querySelector("body").classList.contains("rtl") && $("#myonoffswitch20").prop("checked", !0),
        document.querySelector("body").classList.contains("header-light") && $("#myonoffswitch6").prop("checked", !0),
        document.querySelector("body").classList.contains("color-header") && $("#myonoffswitch7").prop("checked", !0),
        document.querySelector("body").classList.contains("header-dark") && $("#myonoffswitch8").prop("checked", !0),
        document.querySelector("body").classList.contains("light-menu") && $("#myonoffswitch3").prop("checked", !0),
        document.querySelector("body").classList.contains("color-menu") && $("#myonoffswitch4").prop("checked", !0),
        document.querySelector("body").classList.contains("dark-menu") && $("#myonoffswitch5").prop("checked", !0),
        document.querySelector("body").classList.contains("default-menu") && $("#myonoffswitch13").prop("checked", !0),
        document.querySelector("body").classList.contains("icontext-menu") && $("#myonoffswitch14").prop("checked", !0),
        document.querySelector("body").classList.contains("icon-overlay") && $("#myonoffswitch15").prop("checked", !0),
        document.querySelector("body").classList.contains("closed-menu") && $("#myonoffswitch16").prop("checked", !0),
        document.querySelector("body").classList.contains("hover-submenu") && $("#myonoffswitch17").prop("checked", !0),
        document.querySelector("body").classList.contains("hover-submenu1") && $("#myonoffswitch18").prop("checked", !0);
}
A &&
    A.addEventListener("click", () => {
        M();
    }),
    h(),
    !localStorage.getItem("dashplexrtl") && localStorage.getItem("dashplexltr"),
    !localStorage.getItem("dashplexlight") && localStorage.getItem("dashplexdark"),
    !localStorage.getItem("dashplexvertical") && !localStorage.getItem("dashplexhorizontalmenu") && localStorage.getItem("dashplexhorizontalmenuhover"),
    !localStorage.getItem("dashplexdefaultmenu") &&
        !localStorage.getItem("dashplexclosedmenu") &&
        !localStorage.getItem("dashplexicontextmenu") &&
        !localStorage.getItem("dashplexsideiconmenu") &&
        !localStorage.getItem("dashplexhoversubmenu") &&
        localStorage.getItem("dashplexhoversubmenu1"),
    !localStorage.getItem("dashplexfullwidth") && localStorage.getItem("dashplexboxedwidth"),
    !localStorage.getItem("dashplexfixed") && localStorage.getItem("dashplexscrollable"),
    !localStorage.getItem("dashplexlightmenu") && !localStorage.getItem("dashplexcolormenu") && !localStorage.getItem("dashplexdarkmenu") && localStorage.getItem("dashplexgradientmenu"),
    !localStorage.getItem("dashplexlightheader") && !localStorage.getItem("dashplexcolorheader") && !localStorage.getItem("dashplexdarkheader") && localStorage.getItem("dashplexgradientheader");
let p = document.querySelector("#colorID");
null == p || p.addEventListener("input", J);
let f = document.querySelector("#bgID");
null == f || f.addEventListener("input", R);
const B = (e) => {
    const o = document.querySelector(":root");
    Object.keys(e).forEach((a) => {
        o.style.setProperty(a, e[a]);
    });
};
function W(e) {
    e.forEach((e) => {
        e.addEventListener("input", (e) => {
            const o = `--primary-${e.target.getAttribute("data-id")}`,
                a = `--primary-${e.target.getAttribute("data-id1")}`,
                t = `--primary-${e.target.getAttribute("data-id2")}`;
            B({ [o]: e.target.value, [a]: e.target.value + 95, [t]: e.target.value });
        });
    });
}
function T(e) {
    e.forEach((e) => {
        e.addEventListener("input", (e) => {
            const o = `--dark-${e.target.getAttribute("data-id3")}`,
                a = `--dark-${e.target.getAttribute("data-id4")}`;
            B({ [o]: e.target.value + "dd", [a]: e.target.value });
        });
    });
}
function O() {
    var e, o, a, t;
    localStorage.dashplexprimaryColor &&
        (document.querySelector("html").style.setProperty("--primary-bg-color", localStorage.dashplexprimaryColor),
        document.querySelector("html").style.setProperty("--primary-bg-hover", localStorage.dashplexprimaryHoverColor),
        document.querySelector("html").style.setProperty("--primary-bg-border", localStorage.dashplexprimaryBorderColor)),
        localStorage.dashplexbgColor &&
            (document.body.classList.add("dark-theme"),
            document.body.classList.remove("light-theme"),
            $("#myonoffswitch2").prop("checked", !0),
            $("#myonoffswitch5").prop("checked", !0),
            $("#myonoffswitch8").prop("checked", !0),
            document.querySelector("html").style.setProperty("--dark-body", localStorage.dashplexbgColor),
            document.querySelector("html").style.setProperty("--dark-theme", localStorage.dashplexthemeColor)),
        localStorage.dashplexlighttheme &&
            (null == (e = document.querySelector("body")) || e.classList.add("light-theme"),
            null == (o = document.querySelector("body")) || o.classList.remove("dark-theme"),
            $("#myonoffswitch1").prop("checked", !0),
            $("#myonoffswitch3").prop("checked", !0),
            $("#myonoffswitch6").prop("checked", !0)),
        localStorage.dashplexdarktheme && (null == (a = document.querySelector("body")) || a.classList.add("dark-theme"), null == (t = document.querySelector("body")) || t.classList.remove("light-theme")),
        localStorage.dashplexleftmenu && document.querySelector("body").classList.add("leftmenu"),
        localStorage.dashplexhorizontalmenu && document.querySelector("body").classList.add("horizontalmenu"),
        localStorage.dashplexhorizontalmenuhover && document.querySelector("body").classList.add("horizontalmenu-hover"),
        //localStorage.dashplexrtl && document.querySelector("body").classList.add("rtl"),
        localStorage.dashplexclosedmenu && document.querySelector("body").classList.add("closed-menu"),
        localStorage.dashplexicontextmenu && (document.querySelector("body").classList.add("icontext-menu"), !0 !== document.querySelector(".page").classList.contains("main-signin-wrapper") && icontext()),
        localStorage.dashplexsideiconmenu && (document.querySelector("body").classList.add("icon-overlay"), document.querySelector("body").classList.add("main-sidebar-hide")),
        localStorage.dashplexhoversubmenu && (document.querySelector("body").classList.add("hover-submenu"), document.querySelector("body").classList.add("main-sidebar-hide")),
        localStorage.dashplexhoversubmenu1 && (document.querySelector("body").classList.add("hover-submenu1"), document.querySelector("body").classList.add("main-sidebar-hide")),
        localStorage.dashplexlightmenu && (document.querySelector("body").classList.add("light-menu"), document.querySelector("body").classList.remove("dark-menu")),
        localStorage.dashplexcolormenu && (document.querySelector("body").classList.add("color-menu"), document.querySelector("body").classList.remove("dark-menu")),
        localStorage.dashplexdarkmenu && document.querySelector("body").classList.add("dark-menu"),
        localStorage.dashplexlightheader && document.querySelector("body").classList.add("header-light"),
        localStorage.dashplexcolorheader && document.querySelector("body").classList.add("color-header"),
        localStorage.dashplexdarkheader && document.querySelector("body").classList.add("header-dark");
}
function J() {
    h();
    var e = document.getElementById("colorID").value;
    localStorage.setItem("dashplexprimaryColor", e), localStorage.setItem("dashplexprimaryHoverColor", e + 95), localStorage.setItem("dashplexprimaryBorderColor", e), y();
}
function R() {
    var e = document.getElementById("bgID").value;
    localStorage.setItem("dashplexbgColor", e + "dd"),
        localStorage.setItem("dashplexthemeColor", e),
        y(),
        document.body.classList.add("dark-theme"),
        document.body.classList.remove("light-theme"),
        $("#myonoffswitch2").prop("checked", !0),
        $("#myonoffswitch5").prop("checked", !0),
        $("#myonoffswitch8").prop("checked", !0),
        localStorage.setItem("dashplexdarktheme", !0),
        y();
}
!(function () {
    const e = document.querySelectorAll("input.color-primary-light"),
        o = document.querySelectorAll("input.background-primary-light");
    W(e), T(o), O(), h();
})();
const U = (e) => /^#([A-Fa-f0-9]{3,4}){1,2}$/.test(e),
    Y = (e, o) => e.match(new RegExp(`.{${o}}`, "g")),
    _ = (e) => parseInt(e.repeat(2 / e.length), 16),
    X = (e, o) => (typeof e < "u" ? e / 255 : "number" != typeof o || o < 0 || o > 1 ? 1 : o);
function u(e, o) {
    if (!U(e)) return null;
    const a = Math.floor((e.length - 1) / 3),
        t = Y(e.slice(1), a),
        [r, l, s, n] = t.map(_);
    return `rgba(${r}, ${l}, ${s}, ${X(n, o)})`;
}
let c;
function y() {
    let e = getComputedStyle(document.documentElement).getPropertyValue("--primary-bg-color").trim();
    (c = localStorage.getItem("dashplexprimaryColor") || e),
        null !== document.querySelector("#salessummary") && H(c),
        null !== document.querySelector("#sales-summary") && F(c, u),
        null !== document.querySelector("#revenuemorrischart") && N(c, u);
    let o = u(c || e, 0.1);
    document.querySelector("html").style.setProperty("--primary01", o);
    let a = u(c || e, 0.2);
    document.querySelector("html").style.setProperty("--primary02", a);
    let t = u(c || e, 0.3);
    document.querySelector("html").style.setProperty("--primary03", t);
    let r = u(c || e, 0.4);
    document.querySelector("html").style.setProperty("--primary04", r);
    let l = u(c || e, 0.5);
    document.querySelector("html").style.setProperty("--primary05", l);
    let s = u(c || e, 0.6);
    document.querySelector("html").style.setProperty("--primary06", s);
    let n = u(c || e, 0.7);
    document.querySelector("html").style.setProperty("--primary07", n);
    let d = u(c || e, 0.8);
    document.querySelector("html").style.setProperty("--primary08", d);
    let m = u(c || e, 0.9);
    document.querySelector("html").style.setProperty("--primary09", m);
    let i = u(c || e, 0.05);
    document.querySelector("html").style.setProperty("--primary005", i);
}
y(),
    $(function () {
        $("#global-loader").fadeOut("slow");
        const e = "div.card";
        $(document).on("click", '[data-bs-toggle="card-remove"]', function (o) {
            return $(this).closest(e).remove(), o.preventDefault(), !1;
        }),
            $(document).on("click", '[data-bs-toggle="card-collapse"]', function (o) {
                return $(this).closest(e).toggleClass("card-collapsed"), o.preventDefault(), !1;
            }),
            $(document).on("click", '[data-bs-toggle="card-fullscreen"]', function (o) {
                return $(this).closest(e).toggleClass("card-fullscreen").removeClass("card-collapsed"), o.preventDefault(), !1;
            }),
            window.matchMedia("(min-width: 992px)").matches && ($(".main-navbar .active").removeClass("show"), $(".main-header-menu .active").removeClass("show")),
            $(".main-header .dropdown > a").on("click", function (e) {
                e.preventDefault(), $(this).parent().toggleClass("show"), $(this).parent().siblings().removeClass("show");
            }),
            $(".mobile-main-header .dropdown > a").on("click", function (e) {
                e.preventDefault(), $(this).parent().toggleClass("show"), $(this).parent().siblings().removeClass("show");
            }),
            $(".main-navbar .with-sub").on("click", function (e) {
                e.preventDefault(), $(this).parent().toggleClass("show"), $(this).parent().siblings().removeClass("show");
            }),
            $(".dropdown-menu .main-header-arrow").on("click", function (e) {
                e.preventDefault(), $(this).closest(".dropdown").removeClass("show");
            }),
            $("#mainSidebarToggle").on("click", function (e) {
                e.preventDefault(), $("body.horizontalmenu").toggleClass("main-navbar-show");
            }),
            $("#mainContentLeftShow").on("click touch", function (e) {
                e.preventDefault(), $("body").addClass("main-content-left-show");
            }),
            $("#mainContentLeftHide").on("click touch", function (e) {
                e.preventDefault(), $("body").removeClass("main-content-left-show");
            }),
            $("#mainContentBodyHide").on("click touch", function (e) {
                e.preventDefault(), $("body").removeClass("main-content-body-show");
            }),
            $("body").append('<div class="main-navbar-backdrop"></div>'),
            $(".main-navbar-backdrop").on("click touchstart", function () {
                $("body").removeClass("main-navbar-show");
            }),
            $(document).on("click touchstart", function (e) {
                if ((e.stopPropagation(), $(e.target).closest(".main-header .dropdown").length || $(".main-header .dropdown").removeClass("show"), window.matchMedia("(min-width: 992px)").matches))
                    $(e.target).closest(".main-navbar .nav-item").length || $(".main-navbar .show").removeClass("show"),
                        $(e.target).closest(".main-header-menu .nav-item").length || $(".main-header-menu .show").removeClass("show"),
                        $(e.target).hasClass("main-menu-sub-mega") && $(".main-header-menu .show").removeClass("show");
                else if (!$(e.target).closest("#mainMenuShow").length) {
                    $(e.target).closest(".main-header-menu").length || $("body").removeClass("main-header-menu-show");
                }
            }),
            $("#mainMenuShow").on("click", function (e) {
                e.preventDefault(), $("body").toggleClass("main-header-menu-show");
            }),
            $(".main-header-menu .with-sub").on("click", function (e) {
                e.preventDefault(), $(this).parent().toggleClass("show"), $(this).parent().siblings().removeClass("show");
            }),
            $(".main-header-menu-header .close").on("click", function (e) {
                e.preventDefault(), $("body").removeClass("main-header-menu-show");
            }),
            [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]')).map(function (e) {
                return new bootstrap.Popover(e);
            }),
            [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]')).map(function (e) {
                return new bootstrap.Tooltip(e);
            }),
            $(".toast").toast();
        var o = document.getElementById("liveToastBtn"),
            a = document.getElementById("liveToast");
        o &&
            o.addEventListener("click", function () {
                new bootstrap.Toast(a).show();
            }),
            $(window).on("scroll", function (e) {
                $(this).scrollTop() > 0 ? $("#back-to-top").fadeIn("slow") : $("#back-to-top").fadeOut("slow");
            }),
            $(document).on("click", "#back-to-top", function (e) {
                return $("html, body").animate({ scrollTop: 0 }, 0), !1;
            }),
            $(document).on("click", ".fullscreen-button", function () {
                $("html").addClass("fullscreen"),
                    (void 0 !== document.fullScreenElement && null === document.fullScreenElement) ||
                    (void 0 !== document.msFullscreenElement && null === document.msFullscreenElement) ||
                    (void 0 !== document.mozFullScreen && !document.mozFullScreen) ||
                    (void 0 !== document.webkitIsFullScreen && !document.webkitIsFullScreen)
                        ? document.documentElement.requestFullScreen
                            ? document.documentElement.requestFullScreen()
                            : document.documentElement.mozRequestFullScreen
                            ? document.documentElement.mozRequestFullScreen()
                            : document.documentElement.webkitRequestFullScreen
                            ? document.documentElement.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT)
                            : document.documentElement.msRequestFullscreen && document.documentElement.msRequestFullscreen()
                        : ($("html").removeClass("fullscreen"),
                          document.cancelFullScreen
                              ? document.cancelFullScreen()
                              : document.mozCancelFullScreen
                              ? document.mozCancelFullScreen()
                              : document.webkitCancelFullScreen
                              ? document.webkitCancelFullScreen()
                              : document.msExitFullscreen && document.msExitFullscreen());
            }),
            $(document).on("change", ".file-browserinput", function () {
                var e = $(this),
                    o = e.get(0).files ? e.get(0).files.length : 1,
                    a = e.val().replace(/\\/g, "/").replace(/.*\//, "");
                e.trigger("fileselect", [o, a]);
            }),
            $(".cover-image").each(function () {
                var e = $(this).attr("data-image-src");
                typeof e < "u" && !1 !== e && $(this).css("background", "url(" + e + ") center center");
            }),
            $(document).on("click", '[data-bs-toggle="collapse"]', function () {
                $(this).toggleClass("active").siblings().removeClass("active");
            }),
            $(".clickable-row").on("click", function () {
                window.location = $(this).data("href");
            });
        var t = location.pathname
            .split("/")
            .slice(-1)[0]
            .replace(/^\/|\/$/g, "");
        $(".main-navbar .nav li a").each(function () {
            !(function (e) {
                "" === t
                    ? -1 !== e.attr("href").indexOf("#") &&
                      (e.parents(".main-navbar .nav-item").last().removeClass("active"), e.parents(".main-navbar .nav-sub").length && e.parents(".main-navbar .nav-sub-item").last().removeClass("active"))
                    : -1 !== e.attr("href").indexOf(t) && (e.parents(".main-navbar .nav-item").last().addClass("active"), e.parents(".main-navbar .nav-sub").length && e.parents(".main-navbar .nav-sub-item").last().addClass("active"));
            })($(this));
        }),
            $(window).on("scroll", function (e) {
                $(window).scrollTop() >= 66 ? $(".main-header").addClass("fixed-header") : $(".main-header").removeClass("fixed-header");
            }),
            $(".layout-setting").on("click", function (e) {
                document.querySelector("body").classList.contains("dark-theme")
                    ? ($("body").removeClass("dark-theme"),
                      $("body").addClass("light-theme"),
                      $("#myonoffswitch3").prop("checked", !0),
                      $("#myonoffswitch6").prop("checked", !0),
                      localStorage.setItem("dashplexlighttheme", !0),
                      localStorage.removeItem("dashplexdarktheme"),
                      $("#myonoffswitch1").prop("checked", !0))
                    : ($("body").addClass("dark-theme"),
                      $("body").removeClass("light-theme"),
                      $("#myonoffswitch5").prop("checked", !0),
                      $("#myonoffswitch8").prop("checked", !0),
                      localStorage.setItem("dashplexdarktheme", !0),
                      localStorage.removeItem("dashplexlighttheme"),
                      $("#myonoffswitch2").prop("checked", !0));
            });
    });
