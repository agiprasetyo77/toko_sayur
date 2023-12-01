// owl carousel banner 
$(document).ready(function(){
    $('#banner .owl-carousel').owlCarousel({
        responsiveClass : true,
        nav : true,
        loop : true,
        dots : true,
        infinite : true,
        autoplay : true,
        speed : 1000,
        autoplayspeed : 2000,
        items : 1,
        navText : [
            "<i class= 'fas fa-angle-left'></i>",
            "<i class= 'fas fa-angle-right'></i>"
        ],
        navContainer: ".owl-nav"
    });
});

// owl-carousel produk-slide
$(document).ready(function(){
    $('.slide .owl-carousel').owlCarousel({
        responsiveClass: true,
        margin: 5,
        responsive: {
            0:{
                items: 3,
                nav: true,
                loop: true,
            },
            600:{
                items: 4,
                nav: true,
                loop: true,
            },
            1000:{
                items: 4,
                nav: true,
                loop: true,
            }
        },
        navText : [
            "<i class= 'fas fa-angle-left'></i>",
            "<i class= 'fas fa-angle-right'></i>"
        ],
        navContainer: ".nav-slide"
    });
});



// owl-carousel detail-produk img-big
// $(document).ready(function(){
//     $('.img-big .owl-carousel').owlCarousel({
//         responsiveClass : true,
//         nav : true,
//         loop : true,
//         dots : true,
//         infinite : true,
//         autoplay : true,
//         speed : 1000,
//         autoplayspeed : 2000,
//         items : 1,
//         navText : [
//             "<i class= 'fas fa-angle-left'></i>",
//             "<i class= 'fas fa-angle-right'></i>"
//         ],
//         navContainer: ".nav-big"
//     });
// });

// // Pagination
// function getPageList(totalPage, page, maxLength){
//     // get page list start
//     function rage(start, end){
//         return Array.from(Array(end - start + 1), (_, i) => i + start);
//     }

//     var sideWidth = maxLength < 9 ? 1 : 2;
//     var leftWidth = (maxLength - sideWidth * 2 - 3) >> 1 ;
//     var rightWidth = (maxLength - sideWidth * 2 - 3) >> 1 ;

//     if (totalPage <= maxLength) {
//         return rage(1, totalPage);
//     }
//     if (page >= totalPage - sideWidth - 1 - rightWidth) {
//         return rage(1,sideWidth)
//         .concat(0, rage(totalPage - sideWidth - 1 - rightWidth - leftWidth, totalPage));
//     }
//     return rage(1, sideWidth).concat(0,
//         rage(page - leftWidth, page + rightWidth),0,
//         rage(totalPage - sideWidth + 1, totalPage));
// }
//     // get page list end

// $(function(){
//     var numberOfItems = $(".card-produk").length;
//     var limitPerPage = 6; //Jumlah Produk yang ada di halaman produk
//     var totalPage = Math.ceil(numberOfItems / limitPerPage);
//     var PaginationSize = 5; //jumlah angka yang ada di pagination
//     var currentPage;

//     function showPage(whichPage) {
//         if (whichPage < 1 || whichPage) return false; {
//             currentPage = whichPage;
        
//             $(".card-produk").hide()
//             .slice((currentPage - 1) * limitPerPage, currentPage * limitPerPage).show();

//             $(".pagination li").slice(1, - 1).remove();
//             getPageList(totalPage, currentPage, PaginationSize)
//             .forEach(item => {
//                 $("<li>")
//                 .addClass(".page-item")
//                 .append(
//                     $(("<a>")
//                     .addClass("page-link text-secondary")
//                     .insertBefore("page-link text-success"))
//                 )
//             })
//         }
//     }
// })

