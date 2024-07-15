$(".message a").click(function () {
  $("form").animate({ height: "toggle", opacity: "toggle" }, "slow");
  $("footer").animate({ opacity: "toggle" }, "slow");
});
