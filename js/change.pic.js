function change(num) {
    let a = document.querySelectorAll(".selection_pic");
    num--;

    document.querySelector("#main_pic").src = a[num].src;
    document.querySelector("#main_pic").alt = a[num].src;
}