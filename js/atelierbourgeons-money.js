/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function() {
   $('.Price-JPY').each( function (idx, elem) {
       
       console.log(window.fx.convert(elem.getAttribute('price'), {from: "EUR", to: "JPY"}));
   });
});