let carticon=document.querySelector('#cart-icon');
let cart=document.querySelector('.cart1');
let closecart=document.querySelector('#close-cart');

carticon.onclick=()=>{
    cart.classList.add("active");
};
closecart.onclick=()=>{
    cart.classList.remove("active");
}
if (document.readyState =='loading'){
    document.addEventListener('DOMContentLoaded',ready)
}else{
    ready();
}

function ready(){
    var removecartbuttons= document.getElementsByClassName('cart-remove');
    console.log(removecartbuttons)
    for(var i=0;i<removecartbuttons.length;i++){
        var button=removecartbuttons[i];
        button.addEventListener('click',removecartitem);
    }
    var quantityinput=document.getElementsByClassName('cart-quantity');
    for(var i=0;i<quantityinput.length;i++){
    var input=quantityinput[i];
    input.addEventListener('change',quantitychanged);
    }
    var addcart=document.getElementsByClassName('add-cart')
    for(var i=0;i<addcart.length;i++){
        var button=addcart[i];
        button.addEventListener('click',addcartclicked);
    }
    document.getElementsByClassName('btn-buy')[0].addEventListener('click',buybuttonclicked);
}
function buybuttonclicked()
{
    alert('Your order is placed');
    var cartcontent=document.getElementsByClassName('cart-content')[0];
    while(cartcontent.hasChildNodes()){
        cartcontent.removeChild(cartcontent.firstChild);
    }
}

function removecartitem(event){
    var buttonclicked=event.target;
    buttonclicked.parentElement.remove();
}
function quantitychanged(event)
{
   var input=event.target;
   if(isNaN(input.value)|| input.value<=0){
    input.value=1;
   }
   updatetotal();
}

function addcartclicked(event){
    var button=event.target;
    var shopproducts=button.parentElement;
    var title=shopproducts.getElementsByClassName('product-title')[0].innerText;
    var price=shopproducts.getElementsByClassName('price')[0].innerText;
    var productimg=shopproducts.getElementsByClassName('product-img')[0].src;
    addproducttocart(title,price,productimg);
    updatetotal();
}
function addproducttocart(title,price,productimg){
   var cartshopbox=document.createElement('div');
   cartshopbox.classList.add('cart-box');
   var cartitems=document.getElementsByClassName('cart-content')[0];
   var cartitemsname=cartitems.getElementsByClassName('cart-product-title');
   for(var i=0;i<cartitemsname.length;i++){
    if(cartitemsname[i].innerText==title){
        alert("You have already added this item to cart");
    return;
    }
    
   }
   var cartboxcontent=`<img src="${productimg}" alt="" class="cart-img"> 
   <div class="detail-box"> 
   <div class="cart-product-title">${title}</div>
   <div class="cart-price">${price}</div>
   <input disabled type="text" value="1" class="cart-quantity"></div>
    <i class="bx bxs-trash-alt cart-remove"></i>`;
cartshopbox.innerHTML=cartboxcontent;
cartitems.append(cartshopbox);
cartshopbox.getElementsByClassName('cart-remove')[0].addEventListener('click',removecartitem);
cartshopbox.getElementsByClassName('cart-quantity')[0].addEventListener('change',quantitychanged);
}


function updatetotal(){
    var cartcontent=document.getElementsByClassName("cart-content")[0];
    var cartboxes=cartcontent.getElementsByClassName("cart-box");
    var total=0;
    for(var i=0;i<cartboxes.length;i++){
        var cartbox =cartboxes[i];
        var priceelement=cartbox.getElementsByClassName("cart-price")[0];
        var quantityelement=cartbox.getElementsByClassName("cart-quantity")[0];
        var price=parseFloat(priceelement.innerText.replace("$",""));
        var quantity=quantityelement.value;
        total=total+price*quantity;
    }
        document.getElementsByClassName("total-price")[0].innerText="$"+total;
}
