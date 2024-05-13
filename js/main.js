'use strict';

(function ($) {

    /*------------------
        Preloader
    --------------------*/
    $(window).on('load', function () {
        $(".loader").fadeOut();
        $("#preloder").delay(200).fadeOut("slow");

        /*------------------
            Gallery filter
        --------------------*/
        $('.featured__controls li').on('click', function () {
            $('.featured__controls li').removeClass('active');
            $(this).addClass('active');
        });
        if ($('.featured__filter').length > 0) {
            var containerEl = document.querySelector('.featured__filter');
            var mixer = mixitup(containerEl);
        }
    });

    /*------------------
        Background Set
    --------------------*/
    $('.set-bg').each(function () {
        var bg = $(this).data('setbg');
        $(this).css('background-image', 'url(' + bg + ')');
    });

    //Humberger Menu
    $(".humberger__open").on('click', function () {
        $(".humberger__menu__wrapper").addClass("show__humberger__menu__wrapper");
        $(".humberger__menu__overlay").addClass("active");
        $("body").addClass("over_hid");
    });

    $(".humberger__menu__overlay").on('click', function () {
        $(".humberger__menu__wrapper").removeClass("show__humberger__menu__wrapper");
        $(".humberger__menu__overlay").removeClass("active");
        $("body").removeClass("over_hid");
    });

    /*------------------
		Navigation
	--------------------*/
    $(".mobile-menu").slicknav({
        prependTo: '#mobile-menu-wrap',
        allowParentLinks: true
    });

    /*-----------------------
        Categories Slider
    ------------------------*/
    $(".categories__slider").owlCarousel({
        loop: true,
        margin: 0,
        items: 4,
        dots: false,
        nav: true,
        navText: ["<span class='fa fa-angle-left'><span/>", "<span class='fa fa-angle-right'><span/>"],
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
        smartSpeed: 1200,
        autoHeight: false,
        autoplay: true,
        responsive: {

            0: {
                items: 1,
            },

            480: {
                items: 2,
            },

            768: {
                items: 3,
            },

            992: {
                items: 4,
            }
        }
    });


    $('.hero__categories__all').on('click', function(){
        $('.hero__categories ul').slideToggle(400);
    });

    /*--------------------------
        Latest Product Slider
    ----------------------------*/
    $(".latest-product__slider").owlCarousel({
        loop: true,
        margin: 0,
        items: 1,
        dots: false,
        nav: true,
        navText: ["<span class='fa fa-angle-left'><span/>", "<span class='fa fa-angle-right'><span/>"],
        smartSpeed: 1200,
        autoHeight: false,
        autoplay: true
    });

    /*-----------------------------
        Product Discount Slider
    -------------------------------*/
    $(".product__discount__slider").owlCarousel({
        loop: true,
        margin: 0,
        items: 3,
        dots: true,
        smartSpeed: 1200,
        autoHeight: false,
        autoplay: true,
        responsive: {

            320: {
                items: 1,
            },

            480: {
                items: 2,
            },

            768: {
                items: 2,
            },

            992: {
                items: 3,
            }
        }
    });

    /*---------------------------------
        Product Details Pic Slider
    ----------------------------------*/
    $(".product__details__pic__slider").owlCarousel({
        loop: true,
        margin: 20,
        items: 4,
        dots: true,
        smartSpeed: 1200,
        autoHeight: false,
        autoplay: true
    });

    /*-----------------------
		Price Range Slider
	------------------------ */
    var rangeSlider = $(".price-range"),
        minamount = $("#minamount"),
        maxamount = $("#maxamount"),
        minPrice = rangeSlider.data('min'),
        maxPrice = rangeSlider.data('max');
    rangeSlider.slider({
        range: true,
        min: minPrice,
        max: maxPrice,
        values: [minPrice, maxPrice],
        slide: function (event, ui) {
            minamount.val('$' + ui.values[0]);
            maxamount.val('$' + ui.values[1]);
        }
    });
    minamount.val('$' + rangeSlider.slider("values", 0));
    maxamount.val('$' + rangeSlider.slider("values", 1));

    /*--------------------------
        Select
    ----------------------------*/
    $("select").niceSelect();

    /*------------------
		Single Product
	--------------------*/
    $('.product__details__pic__slider img').on('click', function () {

        var imgurl = $(this).data('imgbigurl');
        var bigImg = $('.product__details__pic__item--large').attr('src');
        if (imgurl != bigImg) {
            $('.product__details__pic__item--large').attr({
                src: imgurl
            });
        }
    });

    /*-------------------
		Quantity change
	--------------------- */
    var proQty = $('.pro-qty');
    proQty.prepend('<span class="dec qtybtn">-</span>');
    proQty.append('<span class="inc qtybtn">+</span>');
    proQty.on('click', '.qtybtn', function () {
        var $button = $(this);
        var oldValue = $button.parent().find('input').val();
        if ($button.hasClass('inc')) {
            var newVal = parseFloat(oldValue) + 1;
        } else {
            // Don't allow decrementing below zero
            if (oldValue > 0) {
                var newVal = parseFloat(oldValue) - 1;
            } else {
                newVal = 0;
            }
        }
        $button.parent().find('input').val(newVal);
    });

  /*-------------------------------------------
  ---------------------------------------------
  ------------------------------------------- */



  var featuredItems = [];

    // Function to generate the shopping cart menu
    function generateShoppingCartMenu() {
        var shoppingCartMenu = $('<ul>'); // Initialize shopping cart menu as a jQuery object
        var total = 0; // Initialize total

        // Create a dropdown menu for table numbers
        var tableNumberDropdown = $('<select>').attr('id', 'table-number');
        for(var i = 1; i <= 10; i++) {
            var option = $('<option>').attr('value', i).text('Masa ' + i);
            tableNumberDropdown.append(option);
        }

        // Append the dropdown menu to the shopping cart menu
        shoppingCartMenu.append($('<li>').append(tableNumberDropdown));

        // Loop through the featuredItems array and append each item to the shoppingCartMenu
        for(var i = 0; i < featuredItems.length; i++) {
            var item = $('<li>'); // Create a new list item as a jQuery object
            var img = $('<img>').attr('src', featuredItems[i].img).css({width: '50px', height: '50px'}); // Create an image element for the item
            var span = $('<span>').text(featuredItems[i].name + ' - ₺' + featuredItems[i].price + ' x '); // Create a span element for the item details
            var quantity = $('<input>').attr({type: 'number', min: '1', 'data-index': i}).addClass('quantity').val(featuredItems[i].quantity); // Create an input element for the quantity
            var removeButton = $('<button>').attr('data-index', i).addClass('remove-item').text('X'); // Create a button element for removing the item

            // Append the elements to the list item
            item.append(img, span.append(quantity), removeButton);

            // Append the list item to the shopping cart menu
            shoppingCartMenu.append(item);

            total += featuredItems[i].price * featuredItems[i].quantity;
        }

        // Append the total to the shopping cart menu
        shoppingCartMenu.append($('<li>').text('Toplam Tutar: ₺' + total.toFixed(2)));

        // Create an "Order" button
        var orderButton = $('<button>').attr('id', 'order-button').text('Sipariş Ver').css({
            backgroundColor: 'green',
            color: 'white',
            padding: '10px 20px',
            border: 'none',
            borderRadius: '5px',
            cursor: 'pointer',
            fontSize: '16px',
            marginTop: '10px'
        });
        shoppingCartMenu.append($('<li>').append(orderButton));

        // Set the HTML of the 'shopping-cart-menu' div to the shopping cart menu
        $('#shopping-cart-menu').empty().append(shoppingCartMenu);
    }

    $(document).on('click', '.complete-order-button', function() {
    // Get the order ID from the button that was clicked
    var orderId = $(this).data('order-id');

    // Get the existing orders from local storage
    var existingOrders = JSON.parse(localStorage.getItem('orders')) || [];

    // Find the index of the order with the given ID
    var orderIndex = existingOrders.findIndex(order => order.id === orderId);

    // If the order was found, mark it as completed
    if (orderIndex !== -1) {
        existingOrders[orderIndex].completed = true;
    }

    // Save the updated orders back to local storage
    localStorage.setItem('orders', JSON.stringify(existingOrders));

    // Regenerate the orders list
    generateOrdersList();
});

    // Items in the Featured Section have a class 'featured__item'
    $('.featured__item__pic__hover li a').click(function(e) {
        e.preventDefault();
        var itemName = $(this).closest('.featured__item').find('.featured__item__text h6 a').text();
        var itemPrice = parseFloat($(this).closest('.featured__item').find('.featured__item__text h5').text().replace('₺', ''));
        var itemImg = $(this).closest('.featured__item').find('.featured__item__pic').data('setbg');

        // Check if the item is already in the cart
    var itemInCart = featuredItems.find(item => item.name === itemName);

    if (itemInCart) {
        // If the item is already in the cart, increase the quantity
        itemInCart.quantity++;
    } else {
        // If the item is not in the cart, add a new item with a quantity of 1
        var item = { name: itemName, price: itemPrice, img: itemImg, quantity: 1 };
        featuredItems.push(item);
    }

    // Update counter
    var counter = $('#counter');
    var currentCount = parseInt(counter.text());
    counter.text(currentCount + 1);

    // Store the current table number
    var currentTableNumber = $('#table-number').val();

    // Generate the shopping cart menu
    generateShoppingCartMenu();

    // Restore the table number
    $('#table-number').val(currentTableNumber);
});


    $('#counter').parent().click(function(e) {
        e.preventDefault();

        // Generate the shopping cart menu
        generateShoppingCartMenu();

        // Toggle the visibility of the shopping cart menu
        var right = $('#shopping-cart-menu').css('right') === '0px' ? '-350px' : '0px';
        $('#shopping-cart-menu').show().animate({ right: right }, 'slow');
    });

    $(document).on('click', '.remove-item', function() {
        var index = $(this).data('index');
    
        // Update counter before removing the item
        var counter = $('#counter');
        var currentCount = parseInt(counter.text());
        currentCount -= featuredItems[index].quantity;
        counter.text(currentCount);
    
        // Remove the item from the featuredItems array
        featuredItems.splice(index, 1);
    
        // Store the current table number
        var currentTableNumber = $('#table-number').val();
    
        // Generate the shopping cart menu
        generateShoppingCartMenu();
    
        // Restore the table number
        $('#table-number').val(currentTableNumber);
    });
    
    $(document).on('change', '.quantity', function() {
    var index = $(this).data('index');
    var quantity = parseInt($(this).val());

    // Update the quantity of the item in the featuredItems array
    featuredItems[index].quantity = quantity;

    // Update counter
    var counter = $('#counter');
    var currentCount = 0;
    for(var i = 0; i < featuredItems.length; i++) {
        currentCount += featuredItems[i].quantity;
    }
    counter.text(currentCount);

    // Store the current table number
    var currentTableNumber = $('#table-number').val();

    // Generate the shopping cart menu
    generateShoppingCartMenu();

    // Restore the table number
    $('#table-number').val(currentTableNumber);
});
    
    $(document).on('click', '.delete-button', function() {
    // Get the index of the item to delete
    var index = $(this).data('index');

    

    // Update counter
    var counter = $('#counter');
    var currentCount = parseInt(counter.text());
    counter.text(currentCount + 1);

    // Store the current table number
    var currentTableNumber = $('#table-number').val();

    // Generate the shopping cart menu
    generateShoppingCartMenu();

    // Restore the table number
    $('#table-number').val(currentTableNumber);
});


$(document).on('click', '#order-button', function() {
    // Get the current Masa
    var currentMasa = $('#table-number').val();

    // Create an object to store the order details and the Masa
    var order = {
        id: Date.now(), // Use the current timestamp as a unique order ID
        masa: currentMasa,
        items: featuredItems
    };

    // Get the existing orders from local storage
    var existingOrders = JSON.parse(localStorage.getItem('orders')) || [];

    // Add the new order to the existing orders
    existingOrders.push(order);

    // Convert the orders array to a JSON string so that it can be stored in the local storage
    localStorage.setItem('orders', JSON.stringify(existingOrders));

    alert("Sipariş Verildi!")

    // Clear the featuredItems array
    featuredItems = [];

    // Update the counter
    $('#counter').text(0);

    // Regenerate the shopping cart menu
    generateShoppingCartMenu();
});

$(document).on('click', '.complete-order-button', function() {
    // Get the order ID from the button that was clicked
    var orderId = $(this).data('order-id');

    // Get the existing orders from local storage
    var existingOrders = JSON.parse(localStorage.getItem('orders')) || [];

    // Find the index of the order with the given ID
    var orderIndex = existingOrders.findIndex(order => order.id === orderId);

    // If the order was found, mark it as completed
    if (orderIndex !== -1) {
        existingOrders[orderIndex].completed = true;
    }

    // Save the updated orders back to local storage
    localStorage.setItem('orders', JSON.stringify(existingOrders));

    // Regenerate the orders list
    generateOrdersList();
});

})(jQuery);