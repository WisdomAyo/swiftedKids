!function(e,t){if("object"==typeof exports&&"object"==typeof module)module.exports=t();else if("function"==typeof define&&define.amd)define([],t);else{var o=t();for(var r in o)("object"==typeof exports?exports:e)[r]=o[r]}}(self,(function(){return function(){"use strict";var e={d:function(t,o){for(var r in o)e.o(o,r)&&!e.o(t,r)&&Object.defineProperty(t,r,{enumerable:!0,get:o[r]})},o:function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},r:function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})}},t={};e.r(t),e.d(t,{autosize:function(){return l}});var o=new Map;function r(e){var t=o.get(e);t&&t.destroy()}function n(e){var t=o.get(e);t&&t.update()}var i=null;"undefined"==typeof window?((i=function(e){return e}).destroy=function(e){return e},i.update=function(e){return e}):((i=function(e,t){return e&&Array.prototype.forEach.call(e.length?e:[e],(function(e){return function(e){if(e&&e.nodeName&&"TEXTAREA"===e.nodeName&&!o.has(e)){var t,r=null,n=window.getComputedStyle(e),i=(t=e.value,function(){a({testForHeightReduction:""===t||!e.value.startsWith(t),restoreTextAlign:null}),t=e.value}),l=function(t){e.removeEventListener("autosize:destroy",l),e.removeEventListener("autosize:update",s),e.removeEventListener("input",i),window.removeEventListener("resize",s),Object.keys(t).forEach((function(o){return e.style[o]=t[o]})),o.delete(e)}.bind(e,{height:e.style.height,resize:e.style.resize,textAlign:e.style.textAlign,overflowY:e.style.overflowY,overflowX:e.style.overflowX,wordWrap:e.style.wordWrap});e.addEventListener("autosize:destroy",l),e.addEventListener("autosize:update",s),e.addEventListener("input",i),window.addEventListener("resize",s),e.style.overflowX="hidden",e.style.wordWrap="break-word",o.set(e,{destroy:l,update:s}),s()}function a(t){var o,i,l=t.restoreTextAlign,s=void 0===l?null:l,d=t.testForHeightReduction,u=void 0===d||d,f=n.overflowY;if(0!==e.scrollHeight&&("vertical"===n.resize?e.style.resize="none":"both"===n.resize&&(e.style.resize="horizontal"),u&&(o=function(e){for(var t=[];e&&e.parentNode&&e.parentNode instanceof Element;)e.parentNode.scrollTop&&t.push([e.parentNode,e.parentNode.scrollTop]),e=e.parentNode;return function(){return t.forEach((function(e){var t=e[0],o=e[1];t.style.scrollBehavior="auto",t.scrollTop=o,t.style.scrollBehavior=null}))}}(e),e.style.height=""),i="content-box"===n.boxSizing?e.scrollHeight-(parseFloat(n.paddingTop)+parseFloat(n.paddingBottom)):e.scrollHeight+parseFloat(n.borderTopWidth)+parseFloat(n.borderBottomWidth),"none"!==n.maxHeight&&i>parseFloat(n.maxHeight)?("hidden"===n.overflowY&&(e.style.overflow="scroll"),i=parseFloat(n.maxHeight)):"hidden"!==n.overflowY&&(e.style.overflow="hidden"),e.style.height=i+"px",s&&(e.style.textAlign=s),o&&o(),r!==i&&(e.dispatchEvent(new Event("autosize:resized",{bubbles:!0})),r=i),f!==n.overflow&&!s)){var c=n.textAlign;"hidden"===n.overflow&&(e.style.textAlign="start"===c?"end":"start"),a({restoreTextAlign:c,testForHeightReduction:!0})}}function s(){a({testForHeightReduction:!0,restoreTextAlign:null})}}(e)})),e}).destroy=function(e){return e&&Array.prototype.forEach.call(e.length?e:[e],r),e},i.update=function(e){return e&&Array.prototype.forEach.call(e.length?e:[e],n),e});var l=i;try{window.autosize=l}catch(o){}return t}()}));