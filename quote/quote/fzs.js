
$("#fzschein").siblings().on("click", function() {
  $("#fzschein").siblings().removeClass("TabsField__selected--3vqWT");
  $("#fzschein").removeClass("TabsField__selected--3vqWT");
  $(this).toggleClass("TabsField__selected--3vqWT");

  $("#fzschein").parent().next("div").show();
  $("#fzschein").parent().next("div").next("div").hide();
});
$("#fzschein").on("click", function() {
  $("#fzschein").siblings().removeClass("TabsField__selected--3vqWT");
  $("#fzschein").removeClass("TabsField__selected--3vqWT");
  $(this).toggleClass("TabsField__selected--3vqWT");

  $("#fzschein").parent().next("div").hide();
  $("#fzschein").parent().next("div").next("div").show();
}); 


