import 'bootstrap';
import Swiper from "swiper";
import 'netlify-identity-widget'

const clickMe = document.querySelector('.test-js');

if (clickMe) {
    clickMe.addEventListener('click', () => {
        clickMe.textContent = 'it works ' + String(Date.now()).slice(-6);
    });
}

const outdated = document.querySelector('[data-phpdate]');

if (outdated) {
    const phpdate = outdated.dataset.phpdate;
    if (((Date.now() / 1000 - phpdate) / 86400) < 365) {
        outdated.style.display = 'none';
    }
}



function addClass(el, className) {
    if (el.classList) el.classList.add(className);
    else if (!hasClass(el, className)) el.className += ' ' + className;
}


// add table class to all tables
var tables = document.querySelectorAll('table:not(.table)');
for (var i = 0; i < tables.length; ++i) {
    addClass(tables[i], "table");
    addClass(tables[i], "table-striped");
    addClass(tables[i], "table-borderless");
    addClass(tables[i], "table-hover");
}


// // wrap image nodes for title/captions
// function wrapAll(nodes, wrapper) {
//     // Cache the current parent and previous sibling of the first node.
//     var parent = nodes[0].parentNode;
//     var previousSibling = nodes[0].previousSibling;

//     // Place each node in wrapper.
//     //  - If nodes is an array, we must increment the index we grab from 
//     //    after each loop.
//     //  - If nodes is a NodeList, each node is automatically removed from 
//     //    the NodeList when it is removed from its parent with appendChild.
//     for (var i = 0; nodes.length - i; wrapper.firstChild === nodes[0] && i++) {
//         if(nodes[i].getAttribute('title')){
//             wrapper.setAttribute('title', nodes[i].getAttribute('title'))
//         }
//         wrapper.setAttribute('href', nodes[i].getAttribute('src'))
//         addClass(wrapper, 'featured')
//         wrapper.appendChild(nodes[i]);
//     }

//     // Place the wrapper just after the cached previousSibling,
//     // or if that is null, just before the first child.
//     var nextSibling = previousSibling ? previousSibling.nextSibling : parent.firstChild;
//     parent.insertBefore(wrapper, nextSibling);

//     return wrapper;
// }

// var nodes = document.querySelectorAll('main img:not(.featured-image)');
// var wrapper = document.createElement('a');
// wrapAll(nodes, wrapper)

function wrap(el, wrapper) {
    el.parentNode.insertBefore(wrapper, el);
    wrapper.appendChild(el);
}

window.addEventListener('DOMContentLoaded', function() {

    var mySwiper = new Swiper ('.swiper-container', {
        // Optional parameters
        direction: 'horizontal',
        loop: true,
        autoplay: true,
        effect: 'fade',
        navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
        },
    })

    document.querySelectorAll('main img:not(.featured-image)').forEach(function(node){
        let wrapper = document.createElement('a');
        if(node.getAttribute('title')){
            wrapper.setAttribute('title', node.getAttribute('title'))
        }
        wrapper.setAttribute('href', node.dataset.imageUrl || node.getAttribute('src'))
        addClass(wrapper, 'featured')
        wrap(node, wrapper)
    });
  });


if (window.netlifyIdentity) {
    window.netlifyIdentity.on('init', (user) => {
        if (!user) {
            window.netlifyIdentity.on('login', () => {
                document.location.href = '/admin/';
            });
        }
    });
}
