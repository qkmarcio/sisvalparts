/*
jQWidgets v4.5.0 (2017-Jan)
Copyright (c) 2011-2017 jQWidgets.
License: http://jqwidgets.com/license/
*/
!function(a){"use strict";a.jqx.jqxWidget("jqxRibbon","",{}),a.extend(a.jqx._jqxRibbon.prototype,{defineInstance:function(){var b={width:null,height:"auto",mode:"default",position:"top",selectedIndex:-1,selectionMode:"click",popupCloseMode:"click",animationType:"fade",animationDelay:400,scrollPosition:"both",disabled:!1,rtl:!1,scrollStep:10,scrollDelay:30,reorder:!1,initContent:null,_roundedCorners:!0,_removeByDrag:!1,_suppressReorder:!0,events:["select","unselect","change","_removeByDrag","reorder"]};return a.extend(!0,this,b),b},createInstance:function(){var b=this;"none"!==b.host.css("display")&&document.body.contains(b.element)!==!1||(b._initiallyHidden=!0),b._browser=a.jqx.browser,"popup"!==b.mode&&b.selectedIndex===-1&&(b.selectedIndex=0),b._originalHTML=b.element.innerHTML,b._render(!0)},render:function(){this._render()},refresh:function(a){a!==!0&&this._render()},destroy:function(){var a=this;a._removeHandlers(),a.host.remove()},selectAt:function(a){this._selectAt(a)},clearSelection:function(){this.selectedIndex!==-1&&this._clearSelection()},disableAt:function(b){var c=this;c._items[b]._disabled=!0,a(c._items[b]).addClass(c.toThemeProperty("jqx-fill-state-disabled")),b===c.selectedIndex&&c._clearSelection()},enableAt:function(b){var c=this;c._items[b]._disabled=!1,a(c._items[b]).removeClass(c.toThemeProperty("jqx-fill-state-disabled"))},hideAt:function(a){var b=this;b._items[a].style.display="none",b._checkScrollButtons(),a===b.selectedIndex?b._clearSelection():b._updatePositions()},showAt:function(a){var b=this;"horizontal"===b._orientation?b._items[a].style.display="inline-block":b._items[a].style.display="inherit",b._checkScrollButtons(),b._updatePositions()},val:function(a){var b=this;return a?void b._selectAt(a):b.selectedIndex},addAt:function(b,c){var d=this,e="jqx-ribbon-item jqx-ribbon-item-"+d.position,f="jqx-widget-content jqx-ribbon-content-section jqx-ribbon-content-section-"+d.position;d._removeHandlers();var g=document.createElement("li");g.innerHTML=c.title;var h=document.createElement("div");if("string"==typeof c.content)h.innerHTML=c.content;else if(void 0!==c.content.length)try{if(void 0!==jQuery&&c.content instanceof jQuery)a(h).append(c.content);else if(a.isArray(c.content))for(var i=0;i<c.content.length;i++)c.content[i].appendTo(h);else for(;c.content.length>0;)h.appendChild(c.content[0])}catch(a){}else h.appendChild(c.content);switch(d.position){case"top":e+=" jqx-rc-t",f+=" jqx-rc-b";break;case"bottom":e+=" jqx-rc-b",f+=" jqx-rc-t";break;case"left":e+=" jqx-rc-l",f+=" jqx-rc-r";break;case"right":e+=" jqx-rc-r",f+=" jqx-rc-l"}"popup"===d.mode&&(f+=" jqx-ribbon-content-section-popup jqx-ribbon-content-section-"+d._orientation+"-popup"),d.rtl===!0&&(e+=" jqx-ribbon-item-rtl"),g.className=d.toThemeProperty(e),h.className=d.toThemeProperty(f),d._items.length-1>=b?(d._headerElement.insertBefore(g,d._items[b]),d._contentElement.insertBefore(h,d._contentSections[b])):(d._headerElement.appendChild(g),d._contentElement.appendChild(h)),d._updateItems(),d._addHandlers(),d._checkScrollButtons(),b<=d.selectedIndex&&d.selectedIndex<d._items.length-1&&d.selectedIndex++,d._updatePositions(),d.selectedIndex<0||(d._suppressSelectionEvents=!0,d._selectAt(d.selectedIndex,d.selectedIndex,!0))},removeAt:function(b){var c=this;b===c.selectedIndex&&c._clearSelection(),a(c._items[b]).remove(),a(c._contentSections[b]).remove(),c._updateItems(!0),c._updatePositions(),c._checkScrollButtons()},updateAt:function(a,b){var c=this,d=c._items[a];d.innerHTML=b.newTitle,c._contentSections[a].innerHTML=b.newContent,d._isInitialized=!1,c.initContent&&a===c.selectedIndex&&(c.initContent(a),d._isInitialized=!0),c._updatePositions()},setPopupLayout:function(a,b,c,d){var e=this,f=e._contentSections[a];"popup"===e.mode&&(f.getAttribute("data-width")||(f.style.width&&f.setAttribute("data-width",f.style.width),f.style.height&&f.setAttribute("data-height",f.style.height)),c&&(f.style.width=e._toPx(c)),d&&(f.style.height=e._toPx(d)),f._layout=b,e._positionContent(a))},propertiesChangedHandler:function(a,b,c){c&&c.width&&c.height&&2===Object.keys(c).length&&(a.element.style.width=a._toPx(a.width),a.element.style.height=a._toPx(a.height),a._updateSize())},propertyChangedHandler:function(b,c,d,e){if(!(b.batchUpdate&&b.batchUpdate.width&&b.batchUpdate.height&&2===Object.keys(b.batchUpdate).length)&&e!==d)switch(c){case"width":case"height":b.element.style[c]=b._toPx(e),b._updateSize();break;case"position":b._render();break;case"mode":b._contentElement.style.width="auto",b._removeHandlers(null,d),b._render();break;case"selectedIndex":b._selectAt(e,d);break;case"selectionMode":b._removeHandlers(d),b._addHandlers();break;case"scrollPosition":var f=b._scrollButtonNear,g=b._scrollButtonFar;a(f).removeClass(b.toThemeProperty("jqx-ribbon-scrollbutton-"+d+" jqx-rc-tr jqx-rc-bl jqx-rc-tl")),a(g).removeClass(b.toThemeProperty("jqx-ribbon-scrollbutton-"+d+" jqx-rc-tr jqx-rc-bl jqx-rc-br")),f.className+=" "+b.toThemeProperty("jqx-ribbon-scrollbutton-"+e),g.className+=" "+b.toThemeProperty("jqx-ribbon-scrollbutton-"+e),b._scrollButtonRc(f,g),b._checkScrollButtons(),b._updatePositions();break;case"disabled":e===!0?(b._removeHandlers(),b.element.className+=" "+b.toThemeProperty("jqx-fill-state-disabled")):(b.host.removeClass(b.toThemeProperty("jqx-fill-state-disabled")),b._addHandlers());break;case"theme":a.jqx.utilities.setTheme(d,e,b.host);break;case"rtl":if(e===!0){b._headerElement.className+=" "+b.toThemeProperty("jqx-ribbon-header-rtl");for(var h=0;h<b._items.length;h++)b._items[h].className+=" "+b.toThemeProperty("jqx-ribbon-item-rtl")}else{b._header.removeClass(b.toThemeProperty("jqx-ribbon-header-rtl"));for(var i=0;i<b._items.length;i++)a(b._items[i]).removeClass(b.toThemeProperty("jqx-ribbon-item-rtl"))}b._positionSelectionToken(b.selectedIndex)}},_raiseEvent:function(b,c){var d=this.events[b],e=new a.Event(d);e.owner=this,e.args=c;var f;try{f=this.host.trigger(e)}catch(a){}return f},_render:function(b){var c=this;switch(b!==!0&&c._removeHandlers(),c._selectionTokenOffsetY=0,c._browser.browser){case"mozilla":c._browserWidthRtlFlag=0,c._browserScrollRtlFlag=1,c._selectionTokenOffsetX=1;break;case"msie":c._browserWidthRtlFlag=0,c._browserScrollRtlFlag=-1,"8.0"===c._browser.version?c._selectionTokenOffsetX=1:"7.0"===c._browser.version?(c._selectionTokenOffsetX=0,"popup"!==c.mode||"bottom"!==c.position&&"right"!==c.position||(c._selectionTokenOffsetY=2)):c._selectionTokenOffsetX=0;break;default:c._browserWidthRtlFlag=1,c._browserScrollRtlFlag=1,c._selectionTokenOffsetX=0}if(b===!0){var d=c.host.children();c._headerElement=d[0],c._header=a(d[0]),c._contentElement=d[1],c._content=a(d[1]),c._checkStructure(d)}c._headerElement.style.float="none",c._contentElement.style.padding="0px",c.element.style.width=c._toPx(c.width),c.element.style.height=c._toPx(c.height),"bottom"!==c.position&&"right"!==c.position||c.element.insertBefore(c._contentElement,c._headerElement),"top"===c.position||"bottom"===c.position?c._orientation="horizontal":c._orientation="vertical","right"===c.position?c._headerElement.style.float="right":"left"===c.position&&(c._headerElement.style.float="left"),c._contentSections=c._content.children(),a.each(c._contentSections,function(){this.getAttribute("data-width")&&(this.style.width=this.getAttribute("data-width"),this.style.height=this.getAttribute("data-height"),this.removeAttribute("data-width"),this.removeAttribute("data-height"))}),b===!0&&(c._selectionToken=document.createElement("div"),c._selectionToken.className=c.toThemeProperty("jqx-widget-content jqx-ribbon-selection-token jqx-ribbon-selection-token-"+c.position),c.element.appendChild(c._selectionToken)),c._updateItems(),c._initiallyHidden!==!0&&c._addClasses(),b===!0&&(c._appendScrollButtons(),c._checkScrollButtons()),c._allowSelection=!0,c.selectedIndex!==-1&&(c._items[c.selectedIndex].className+=" "+c.toThemeProperty("jqx-widget-content jqx-ribbon-item-selected"),c._positionSelectionToken(c.selectedIndex),c._contentSections[c.selectedIndex].style.display="block",c.initContent&&(c.initContent(c.selectedIndex),c._items[c.selectedIndex]._isInitialized=!0)),c.disabled?c.element.className+=" "+c.toThemeProperty("jqx-fill-state-disabled"):c._addHandlers(),a.jqx.utilities.resize(c.host,function(){c._initiallyHidden&&(c._initiallyHidden=!1,c._addClasses(),c.selectedIndex!==-1&&(c._items[c.selectedIndex].className+=" "+c.toThemeProperty("jqx-widget-content jqx-ribbon-item-selected"))),c._updateSize(!0)})},_updateSize:function(a){var b=this;if("7.0"===b._browser.version&&"msie"===b._browser.browser)if("horizontal"===b._orientation)b._header.css("width",b.host.width()-parseInt(b._header.css("padding-left"),10)-parseInt(b._header.css("padding-right"),10)-parseInt(b._header.css("border-left-width"),10)-parseInt(b._header.css("border-right-width"),10)),b._contentSections.width(b._content.width()-parseInt(b._contentSections.css("border-left-width"),10)-parseInt(b._contentSections.css("border-right-width"),10)-parseInt(b._contentSections.css("padding-left"),10)-parseInt(b._contentSections.css("padding-right"),10)),"default"===b.mode&&"string"==typeof b.height&&b.height.indexOf("%")!==-1&&b._contentSections.height(b._content.height()-b._header.height()-parseInt(b._contentSections.css("border-bottom-width"),10)-parseInt(b._contentSections.css("border-top-width"),10)-1);else if(b._header.css("height",b.host.height()-parseInt(b._header.css("padding-top"),10)-parseInt(b._header.css("padding-bottom"),10)-parseInt(b._header.css("border-top-width"),10)-parseInt(b._header.css("border-bottom-width"),10)),b._contentSections.height(b._content.height()-parseInt(b._contentSections.css("border-top-width"),10)-parseInt(b._contentSections.css("border-bottom-width"),10)-parseInt(b._contentSections.css("padding-top"),10)-parseInt(b._contentSections.css("padding-bottom"),10)),"default"===b.mode&&"string"==typeof b.width&&b.height.indexOf("%")!==-1){var c="left"===b.position?parseInt(b._contentSections.css("border-left-width"),10)+parseInt(b._contentSections.css("border-right-width"),10)+1:0;b._contentSections.width(b._content.width()-b._header.width()-c)}b._checkScrollButtons(!0),b._updatePositions(void 0,a),"popup"===b.mode&&b._positionPopup()},_stopAnimation:function(){var b=this;if(!b._allowSelection){b.selectedIndex=b._animatingIndex;var c=a(b._contentSections[b._animatingIndex]);b._initAnimate(c),c.animate("finish"),b._clearSelection(!0,b._animatingIndex),b._allowSelection=!0}},_selectAt:function(b,c,d){var e=this;if(void 0===c&&(c=e.selectedIndex),(b!==c||d===!0)&&(e._stopAnimation(),e._allowSelection)){if(e._animatingIndex=b,e.selectedIndex!==-1&&e._clearSelection(!0,c),e._allowSelection=!1,e._selecting=b,"click"===e.selectionMode&&a(e._items[b]).removeClass(e.toThemeProperty("jqx-fill-state-hover jqx-ribbon-item-hover")),"popup"===e.mode&&e._roundedCorners){e._header.removeClass(e.toThemeProperty("jqx-rc-all"));var f,g;switch(e.position){case"top":f="jqx-rc-t",g="jqx-rc-b";break;case"bottom":f="jqx-rc-b",g="jqx-rc-t";break;case"left":f="jqx-rc-l",g="jqx-rc-r";break;case"right":f="jqx-rc-r",g="jqx-rc-l"}e._headerElement.className+=" "+e.toThemeProperty(f);for(var h=0;h<e._items.length;h++)e._items[h].className+=" "+e.toThemeProperty(f),e._contentSections[h].className+=" "+e.toThemeProperty(g)}e._items[b].className+=" "+e.toThemeProperty("jqx-widget-content jqx-ribbon-item-selected"),e._selectionToken.style.display="block",e._updatePositions(b);var i;switch(e.animationType){case"fade":i=a(e._contentSections[b]),e._initAnimate(i),"none"===i.css("display")?i.fadeIn({duration:e.animationDelay,complete:function(){e._animationComplete(b,c)}}):i.fadeOut({duration:e.animationDelay,complete:function(){e._animationComplete(b,c)}});break;case"slide":var j=e.position;"top"===j?j="up":"bottom"===j&&(j="down"),e.slideAnimation=e._slide(i,{mode:"show",direction:j,duration:e.animationDelay},b,c);break;case"none":e._contentSections[b].style.display="block",e._animationComplete(b,c)}}},_clearSelection:function(b,c){var d=this;if("popup"===d.mode&&d._roundedCorners&&(d._headerElement.className+=" "+d.toThemeProperty("jqx-rc-all")),d._selecting=-1,void 0===c&&(c=d.selectedIndex),a(d._items[c]).removeClass(d.toThemeProperty("jqx-widget-content jqx-ribbon-item-selected")),d._selectionToken.style.display="none",b!==!0&&"none"!==d.animationType){var e=a(d._contentSections[c]);if("fade"===d.animationType)d._initAnimate(e),e.fadeOut({duration:d.animationDelay,complete:function(){d._clearSelectionComplete(c)}});else if("slide"===d.animationType){var f=d.position;"top"===f?f="up":"bottom"===f&&(f="down"),d._stopAnimation(),c=d.selectedIndex,d.slideAnimation=d._slide(e,{mode:"hide",direction:f,duration:d.animationDelay},c),d.selectedIndex=-1}}else{if(c===-1)return;d._contentSections[c].style.display="none",d._clearSelectionComplete(c,b)}},_addHandlers:function(){function b(a){var b=k._closest(a.target,"li"),c=b._index;k._items[c]._disabled||(c!==k.selectedIndex?k._selectAt(c):"popup"===k.mode&&"none"!==k.popupCloseMode&&(b.className+=" "+k.toThemeProperty("jqx-fill-state-hover jqx-ribbon-item-hover"),k._clearSelection()))}function c(b){if(k.reorder===!0&&m===!0){var c=k._closest(b.target,"li")._index,d=k._items[j].innerHTML,e=k._contentSections[j].childNodes;k._suppressSelectionEvents=!0,k._oldReorderIndex=j,k.removeAt(j),k.clearSelection(),k.addAt(c,{title:d,content:e}),k.selectAt(c),setTimeout(function(){a(k._items[c]).trigger("mousedown")},0)}else{var f=k._closest(b.target,"li");o(f._index)&&(f.className+=" "+k.toThemeProperty("jqx-fill-state-hover jqx-ribbon-item-hover"))}}function d(b){var c=k._closest(b.target,"li");o(c._index)&&a(c).removeClass(k.toThemeProperty("jqx-fill-state-hover jqx-ribbon-item-hover"))}function e(a){if("#document"!==a.target.nodeName){var b=k._closest(a.target,"li");k.reorder!==!0&&k._removeByDrag!==!0||b._index!==k.selectedIndex||(m=!0,j=b._index,b.style.cursor="move")}}function f(){"mouseLeave"===k.popupCloseMode&&"popup"===k.mode&&k._clearSelection()}function g(a){var b=k._closest(a.target,"li")._index;k._items[b]._disabled||b===k.selectedIndex||k._selectAt(b)}function h(a){var b=k._closest(a.target,"li")._index;k._items[b]._disabled||"popup"===k.mode&&"none"!==k.popupCloseMode&&k._clearSelection()}function i(){"mouseLeave"===k.popupCloseMode&&"popup"===k.mode&&k._clearSelection()}var j,k=this,l=k.element.id,m=!1,n=function(b){if("click"===k.popupCloseMode&&"popup"===k.mode&&k.selectedIndex!==-1){if("svg"===b.target.tagName)return;var c=k._closest(b.target,void 0,"jqx-ribbon");if(void 0!==c&&c.getAttribute("id")!==l)return void k._clearSelection();if(void 0===b.target.className||b.target.className.indexOf("jqx-ribbon-content-popup")!==-1)return void k._clearSelection();if(a(b.target).ischildof(k.host))return;var d=!1,e=[],f=function(a){a.parentElement&&(e.push(a.parentElement),f(a.parentElement))};f(b.target),a.each(e,function(){if(void 0!==this.className&&this.className.indexOf){if(this.className.indexOf("jqx-ribbon")!==-1)return d=!0,!1;if(this.className.indexOf("jqx-ribbon")!==-1)return l===this.id&&(d=!0),!1}}),d||k._clearSelection()}};if("click"===k.selectionMode){for(var o=function(a){return(k._selecting!==a&&k._allowSelection===!1||(k._selecting===-1||k.selectedIndex!==a)&&k._allowSelection===!0)&&!k._items[a]._disabled},p=0;p<k._items.length;p++){var q=k._items[p];k.addHandler(q,"click.ribbon"+l,b),k.addHandler(q,"mouseenter.ribbon"+l,c),k.addHandler(q,"mouseleave.ribbon"+l,d),k.addHandler(q,"mousedown.ribbon"+l,e)}if("popup"===k.mode){k.addHandler(k.host,"mouseleave.ribbon"+l,function(){"mouseLeave"===k.popupCloseMode&&"popup"===k.mode&&k._clearSelection()});for(var r=0;r<k._contentSections.length;r++)k.addHandler(k._contentSections[r],"mouseleave.ribbon"+l,f);k.addHandler(a(document),"mousedown.ribbon"+l,function(a){n(a)})}if(k._removeByDrag===!0)for(var s=0;s<k._items.length;s++)k._items[s].className+=" "+k.toThemeProperty("jqx-ribbon-item-docking-layout");k.addHandler(document,"mouseup.ribbon"+l,function(){m=!1;for(var a=0;a<k._items.length;a++)k._items[a].style.cursor=""}),k.addHandler(k._header,"mouseleave.ribbon"+l,function(a){k._removeByDrag===!0&&m===!0&&(k._raiseEvent("3",{draggedIndex:j,x:a.pageX,y:a.pageY}),k._items.length>1&&k.removeAt(j),m=!1,a.target.style.cursor="")})}else if("hover"===k.selectionMode){for(var t=0;t<k._items.length;t++){var u=k._items[t];k.addHandler(u,"mouseenter.ribbon"+l,g),"popup"===k.mode&&k.addHandler(u,"click.ribbon"+l,h)}if("popup"===k.mode){k.addHandler(k.host,"mouseleave.ribbon"+l,function(){"mouseLeave"===k.popupCloseMode&&"popup"===k.mode&&k._clearSelection()});for(var v=0;v<k._contentSections.length;v++)k.addHandler(k._contentSections,"mouseleave.ribbon"+l,i);k.addHandler(a(document),"mousedown.ribbon"+l,function(a){n(a)})}}var w,x,y=a.jqx.mobile.isTouchDevice();y?(w="touchstart",x="touchend"):(w="mousedown",x="mouseup"),k.addHandler(k._scrollButtonNear,w+".ribbon"+l,function(){return"horizontal"===k._orientation?k._timeoutNear=setInterval(function(){var a=k._headerElement.scrollLeft,b=k.rtl&&"msie"===k._browser.browser?-1:1;k._headerElement.scrollLeft=a-k.scrollStep*b,k._updatePositions()},k.scrollDelay):k._timeoutNear=setInterval(function(){var a=k._headerElement.scrollTop;k._headerElement.scrollTop=a-k.scrollStep,k._updatePositions()},k.scrollDelay),!1}),k.addHandler(k._scrollButtonFar,w+".ribbon"+l,function(){return"horizontal"===k._orientation?k._timeoutFar=setInterval(function(){var a=k._headerElement.scrollLeft,b=k.rtl&&"msie"===k._browser.browser?-1:1;k._headerElement.scrollLeft=a+k.scrollStep*b,k._updatePositions()},k.scrollDelay):k._timeoutFar=setInterval(function(){var a=k._headerElement.scrollTop;k._headerElement.scrollTop=a+k.scrollStep,k._updatePositions()},k.scrollDelay),!1}),k.addHandler(a(document),x+".ribbon"+l,function(){clearInterval(k._timeoutNear),clearInterval(k._timeoutFar)})},_removeHandlers:function(b,c){var d=this,e=d.element.id;b||(b=d.selectionMode),c||(c=d.mode);for(var f=0;f<d._items.length;f++){var g=d._items[f];d.removeHandler(g,"mouseenter.ribbon"+e),"click"===b&&(d.removeHandler(g,"click.ribbon"+e),d.removeHandler(g,"mouseleave.ribbon"+e),d.removeHandler(g,"mousedown.ribbon"+e))}"click"===b?(d.removeHandler(document,"mouseup.ribbon"+e),d.removeHandler(d._header,"mouseleave.ribbon"+e)):"hover"===b&&"popup"===c&&d.removeHandler(d.host,"mouseleave.ribbon"+e);var h,i,j=a.jqx.mobile.isTouchDevice();j?(h="touchstart",i="touchend"):(h="mousedown",i="mouseup"),d.removeHandler(d._scrollButtonNear,h+".ribbon"+e),d.removeHandler(d._scrollButtonFar,h+".ribbon"+e),d.removeHandler(a(document),i+".ribbon"+e)},_checkStructure:function(a){var b=this,c=a.length;if(2!==c)throw new Error("jqxRibbon: Invalid HTML structure. You need to add a ul and a div to the widget container.");var d=b._header.children().length,e=b._content.children().length;if(d!==e)throw new Error("jqxRibbon: Invalid HTML structure. For each list item you must have a corresponding div element.")},_addClasses:function(){var b=this,c="jqx-widget-content jqx-ribbon-content-section jqx-ribbon-content-section-"+b.position,d="jqx-widget-content jqx-ribbon-content jqx-ribbon-content-"+b._orientation,e="jqx-widget-header jqx-disableselect jqx-ribbon-header jqx-ribbon-header-"+b._orientation,f="jqx-ribbon-item jqx-ribbon-item-"+b.position,g="jqx-widget jqx-ribbon";if(b._content.removeClass(),b._header.removeClass(b.toThemeProperty("jqx-rc-all jqx-widget-header jqx-disableselect jqx-rc-t jqx-rc-b jqx-rc-l jqx-rc-r jqx-rc-all jqx-ribbon-header-"+b._orientation+"-popup jqx-ribbon-header-bottom jqx-ribbon-header-auto jqx-ribbon-header-right jqx-ribbon-header-rtl")),b.host.removeClass(),b._roundedCorners)switch(b.position){case"top":e+=" jqx-rc-t",f+=" jqx-rc-t",c+=" jqx-rc-b";break;case"bottom":e+=" jqx-rc-b",f+=" jqx-rc-b",c+=" jqx-rc-t";break;case"left":e+=" jqx-rc-l",f+=" jqx-rc-l",c+=" jqx-rc-r";break;case"right":e+=" jqx-rc-r",f+=" jqx-rc-r",c+=" jqx-rc-l"}else switch(b.position){case"top":f+=" jqx-rc-t";break;case"bottom":f+=" jqx-rc-b";break;case"left":f+=" jqx-rc-l";break;case"right":f+=" jqx-rc-r"}b.rtl===!0&&(e+=" jqx-ribbon-header-rtl",f+=" jqx-ribbon-item-rtl"),b.element.className+=" "+b.toThemeProperty(g),b._headerElement.className+=" "+b.toThemeProperty(e),b._contentElement.className+=" "+b.toThemeProperty(d);for(var h=0;h<b._items.length;h++){var i=a(b._contentSections[h]),j=a(b._items[h]);i.removeClass(),j.removeClass(b.toThemeProperty("jqx-fill-state-disabled jqx-ribbon-item-rtl jqx-widget-content jqx-ribbon-item-selected jqx-rc-t jqx-rc-b jqx-rc-l jqx-rc-r jqx-ribbon-item-docking-layout jqx-ribbon-item jqx-ribbon-item-"+b.position)),"popup"===b.mode&&(c+=" jqx-ribbon-content-section-popup jqx-ribbon-content-popup-"+b.position+" jqx-ribbon-content-section-"+b._orientation+"-popup"),b._contentSections[h].className+=" "+b.toThemeProperty(c),b._items[h].className+=" "+b.toThemeProperty(f)}var k,l;if("popup"===b.mode?(b.selectedIndex===-1&&b._roundedCorners&&(b.element.className+=" "+b.toThemeProperty("jqx-rc-all"),b._headerElement.className+=" "+b.toThemeProperty("jqx-rc-all")),b.element.className+=" "+b.toThemeProperty("jqx-ribbon-popup"),b._headerElement.className+=" "+b.toThemeProperty("jqx-ribbon-header-"+b._orientation+"-popup"),b._contentElement.className+=" "+b.toThemeProperty("jqx-ribbon-content-popup"),b._positionPopup()):"horizontal"===b._orientation?"auto"!==b.height?(l=b._headerElement.offsetHeight,"top"===b.position?b._contentElement.style.paddingTop=b._toPx(l):b._headerElement.className+=" "+b.toThemeProperty("jqx-ribbon-header-bottom")):b._headerElement.className+=" "+b.toThemeProperty("jqx-ribbon-header-auto"):"vertical"===b._orientation&&("auto"!==b.width?(k=b._headerElement.offsetWidth,"left"===b.position?b._contentElement.style.paddingLeft=b._toPx(k):(b._headerElement.className+=" "+b.toThemeProperty("jqx-ribbon-header-right"),b._contentElement.style.paddingRight=b._toPx(k))):(b.element.className+=" "+b.toThemeProperty("jqx-ribbon-auto"),b._headerElement.className+=" "+b.toThemeProperty("jqx-ribbon-header-auto"),b._contentElement.className+=" "+b.toThemeProperty("jqx-ribbon-content-auto-width"))),"7.0"===b._browser.version&&"msie"===b._browser.browser)if("horizontal"===b._orientation)b._header.css("width",b.host.width()-parseInt(b._header.css("padding-left"),10)-parseInt(b._header.css("padding-right"),10)-parseInt(b._header.css("border-left-width"),10)-parseInt(b._header.css("border-right-width"),10)),b._items.height(b._items.height()-parseInt(b._items.css("padding-top"),10)-parseInt(b._items.css("padding-bottom"),10)-parseInt(b._items.css("border-top-width"),10)-parseInt(b._items.css("border-bottom-width"),10)),b._contentSections.width(b._contentSections.width()-parseInt(b._contentSections.css("border-left-width"),10)-parseInt(b._contentSections.css("border-right-width"),10)-parseInt(b._contentSections.css("padding-left"),10)-parseInt(b._contentSections.css("padding-right"),10)),"default"===b.mode&&"auto"!==b.height&&("top"===b.position?b._contentSections.css("padding-top",l):b._contentSections.css("padding-bottom",l),b._content.css("height",b.host.height()+2),b._contentSections.css("height",b._content.height()-parseInt(b._contentSections.css("border-bottom-width"),10)-parseInt(b._contentSections.css("border-top-width"),10)-1));else{var m;"left"===b.position?(b._contentElement.className+=" "+b.toThemeProperty("jqx-ribbon-content-left"),m=parseInt(b._contentSections.css("border-left-width"),10)+parseInt(b._contentSections.css("border-right-width"),10)+1):(b._contentElement.className+=" "+b.toThemeProperty("jqx-ribbon-content-right"),m=0),b._header.css("height",b.host.height()-parseInt(b._header.css("padding-top"),10)-parseInt(b._header.css("padding-bottom"),10)-parseInt(b._header.css("border-top-width"),10)-parseInt(b._header.css("border-bottom-width"),10)),b._items.width(b._items.width()-parseInt(b._items.css("padding-left"),10)-parseInt(b._items.css("padding-right"),10)-parseInt(b._items.css("border-left-width"),10)-parseInt(b._items.css("border-right-width"),10)),b._contentSections.height(b._contentSections.height()-parseInt(b._contentSections.css("border-top-width"),10)-parseInt(b._contentSections.css("border-bottom-width"),10)-parseInt(b._contentSections.css("padding-top"),10)-parseInt(b._contentSections.css("padding-bottom"),10)),"default"===b.mode&&"auto"!==b.width&&("left"===b.position?b._contentSections.css("padding-left",k):b._contentSections.css("padding-right",k),b._contentSections.width(b._content.width()-b._header.width()-m))}},_positionPopup:function(){var a=this,b="7.0"===a._browser.version&&"msie"===a._browser.browser;switch(a.position){case"top":a._contentElement.style.top=a._toPx(a._headerElement.offsetHeight);break;case"bottom":b?a._contentElement.style.bottom=a._toPx(a._height(a._headerElement)):a._contentElement.style.bottom=a._toPx(a._headerElement.offsetHeight);break;case"left":a._contentElement.style.left=a._toPx(a._headerElement.offsetWidth);break;case"right":a._contentElement.style.right=a._header.outerWidth()+"px"}},_appendScrollButtons:function(){function a(a,c,d){a.className=b.toThemeProperty("jqx-ribbon-scrollbutton jqx-ribbon-scrollbutton-"+b.position+" jqx-ribbon-scrollbutton-"+b.scrollPosition+" jqx-widget-header "+c),a.innerHTML='<div class="'+b.toThemeProperty("jqx-ribbon-scrollbutton-inner "+d)+'"></div>',"horizontal"===b._orientation?a.style.height=b._toPx(b._height(b._headerElement)):a.style.width=b._toPx(b._width(b._headerElement)),b.element.appendChild(a)}var b=this,c="horizontal"===b._orientation?["left","right"]:["up","down"],d=document.createElement("div");a(d,"jqx-ribbon-scrollbutton-lt","jqx-icon-arrow-"+c[0]);var e=document.createElement("div");if(a(e,"jqx-ribbon-scrollbutton-rb","jqx-icon-arrow-"+c[1]),b._scrollButtonRc(d,e),b._scrollButtonNear=d,b._scrollButtonFar=e,b.roundedCorners)switch(b.position){case"top":case"bottom":d.style.marginLeft="-1px",e.style.marginRight="-1px";break;case"right":case"left":d.style.marginTop="-1px",e.style.marginBottom="-1px"}},_scrollButtonRc:function(a,b){var c=this;if(c.roundedCorners)switch(c.position){case"top":"far"!==c.scrollPosition&&(a.className+=" "+c.toThemeProperty("jqx-rc-tl")),"near"!==c.scrollPosition&&(b.className+=" "+c.toThemeProperty("jqx-rc-tr"));break;case"bottom":"far"!==c.scrollPosition&&(a.className+=" "+c.toThemeProperty("jqx-rc-bl")),"near"!==c.scrollPosition&&(b.className+=" "+c.toThemeProperty("jqx-rc-br"));break;case"left":"far"!==c.scrollPosition&&(a.className+=" "+c.toThemeProperty("jqx-rc-tl")),"near"!==c.scrollPosition&&(b.className+=" "+c.toThemeProperty("jqx-rc-bl"));break;case"right":"far"!==c.scrollPosition&&(a.className+=" "+c.toThemeProperty("jqx-rc-tr")),"near"!==c.scrollPosition&&(b.className+=" "+c.toThemeProperty("jqx-rc-br"))}},_updateItems:function(a){function b(){c._items[d]._index===c.selectedIndex&&(c.selectedIndex=d)}var c=this;c._items=c._header.children(),c._contentSections=c._content.children();for(var d=0;d<c._items.length;d++){var e=c._items[d];e.setAttribute("unselectable","on"),void 0===e._index&&(e._disabled=!1,e._isInitialized=!1,c._contentSections[d]._layout="default"),a===!0&&b(),e._index=d,a!==!0&&b(),c._contentSections[d]&&(c._contentSections[d]._index=d)}},_positionContent:function(b){var c,d,e,f,g,h,i=this,j=i._contentSections[b];"horizontal"===i._orientation?(c=i.element.offsetWidth,d=i.host.offset().left,e=i._items[b].offsetWidth,f=a(i._items[b]).offset().left,g=j.offsetWidth||parseInt(j.style.width,10),h="left"):(c=i.element.offsetHeight,d=i.host.offset().top,e=i._items[b].offsetHeight,f=a(i._items[b]).offset().top,g=j.offsetHeight||parseInt(j.style.height,10),h="top");var k,l=function(a){a<0?a=0:a+g>c&&(a=c-g),j.style[h]=i._toPx(a)};switch(j._layout){case"near":k=f-d,l(k);break;case"far":k=f-d-(g-e),l(k);break;case"center":k=f-d-(g-e)/2,l(k);break;default:if("right"===i.position)for(var m=0;m<i._contentSections.length;m++)i._contentSections[m].style.right="1px";else j.style[h]=""}},_checkScrollButtons:function(b){var c=this,d=0;a.each(c._items,function(){var b=a(this);"none"!==b.css("display")&&(d+="horizontal"===c._orientation?b.outerWidth(!0):b.outerHeight(!0))});var e="horizontal"===c._orientation?["margin-left","margin-right"]:["margin-top","margin-bottom"],f="horizontal"===c._orientation?c._width(c._headerElement):c._height(c._headerElement);if(c._itemMargins||(c._itemMargins=[],c._itemMargins.push(a(c._items[0]).css(e[0])),c._itemMargins.push(a(c._items[c._items.length-1]).css(e[1]))),d>f){c._scrollButtonNear.style.display="block",c._scrollButtonFar.style.display="block";var g=c.rtl?c._itemMargins[0]:17,h=c.rtl?c._itemMargins[0]:17;switch(c.scrollPosition){case"near":h=0,g=34;break;case"far":h=34,g=17}c._items[0]&&(c._items[0].style[e[0]]=c._toPx(g)),c._items[c._items.length-1]&&(c._items[c._items.length-1].style[e[1]]=c._toPx(h))}else c._items[0]&&(c._items[0].style[e[0]]=c._toPx(c._itemMargins[0])),c._items[c._items.length-1]&&(c._items[c._items.length-1].style[e[1]]=c._toPx(c._itemMargins[1])),c._scrollButtonNear.style.display="none",c._scrollButtonFar.style.display="none";if(b===!0)if("horizontal"===c._orientation){var i=c._toPx(c._height(c._headerElement));c._scrollButtonNear.style.height=i,c._scrollButtonFar.style.height=i}else{var j=c._toPx(c._width(c._headerElement));c._scrollButtonNear.style.width=j,c._scrollButtonFar.style.width=j}},_positionSelectionToken:function(b){var c=this;if(b!==-1){var d=a(c._items[b]);if(0===d.length)return;var e,f,g,h,i;if("horizontal"===c._orientation){var j,k;c.rtl===!0?(j=1===c._browserWidthRtlFlag?c._headerElement.scrollWidth-c._headerElement.clientWidth:0,k=c._browserScrollRtlFlag):(j=0,k=1),g=d[0].offsetLeft+j-c._headerElement.scrollLeft*k-c._selectionTokenOffsetX+2,i=c._headerElement.offsetHeight-1;var l=c._width(d[0])+parseInt(d.css("padding-left"),10)+parseInt(d.css("padding-right"),10);"top"===c.position?(e=i-c._selectionTokenOffsetY,f=""):(e="",f=i-c._selectionTokenOffsetY),c._selectionToken.style.top=c._toPx(e),c._selectionToken.style.bottom=c._toPx(f),c._selectionToken.style.left=c._toPx(g),c._selectionToken.style.width=c._toPx(l)}else{e=d[0].offsetTop-c._headerElement.scrollTop-c._selectionTokenOffsetX+2,i=c._headerElement.offsetWidth-1;var m=c._height(d[0])+parseInt(d.css("padding-top"),10)+parseInt(d.css("padding-bottom"),10);"left"===c.position?(g=i-c._selectionTokenOffsetY,h=""):(g="",h=i-c._selectionTokenOffsetY),c._selectionToken.style.top=c._toPx(e),c._selectionToken.style.left=c._toPx(g),c._selectionToken.style.right=c._toPx(h),c._selectionToken.style.height=c._toPx(m)}}},_updatePositions:function(a,b){var c=this;if(isNaN(a)&&(a=b===!0&&null!==c._selecting&&c._selecting>=0?c._selecting:c.selectedIndex),a!==-1&&(c._positionSelectionToken(a),"popup"===c.mode&&"default"!==c._contentSections[a]._layout&&c._positionContent(a),"popup"===c.mode&&("left"===c.position||"right"===c.position))){c._contentElement.style.width="auto";var d=c._contentSections[a].style.width&&c._contentSections[a].style.width.indexOf("%")>=0;d?c._contentElement.style.width=c._toPx(c._width(c._contentSections[a])-c._width(c._headerElement)):c._contentElement.style.width=c._toPx(c._width(c._contentSections[a]))}},_animationComplete:function(a,b){var c=this,d=b!==-1?b:null;c._contentElement.style.pointerEvents="auto",c._suppressSelectionEvents!==!0?(c._raiseEvent("0",{selectedIndex:a}),c._raiseEvent("2",{unselectedIndex:d,selectedIndex:a})):(c._suppressReorder!==!0&&void 0!==c._oldReorderIndex&&a!==c._oldReorderIndex&&c._raiseEvent("4",{newIndex:a,oldIndex:c._oldReorderIndex}),c._suppressSelectionEvents=!1,c._suppressReorder=!1),c.selectedIndex=a,c.initContent&&c._items[a]._isInitialized===!1&&(c.initContent(a),c._items[a]._isInitialized=!0),c._allowSelection=!0,c._selecting=null},_clearSelectionComplete:function(a,b){var c=this;c._selecting=null,void 0===a&&(a=c.selectedIndex),a!==-1&&(c._contentElement.style.pointerEvents="none",
c._suppressSelectionEvents!==!0&&c._raiseEvent("1",{unselectedIndex:a})),b!==!0&&(c.selectedIndex=-1)},_slide:function(b,c,d,e){var f=this;if(f.activeAnimations||(f.activeAnimations=[]),f.activeAnimations.length>0)for(var g=0;g<f.activeAnimations.length;g++)f.activeAnimations[g].clearQueue(),f.activeAnimations[g].finish();else b.clearQueue(),b.finish();var h,i="ui-effects-",j={save:function(a,b){for(var c=0;c<b.length;c++)null!==b[c]&&a.length>0&&a.data(i+b[c],a[0].style[b[c]])},restore:function(a,b){var c,d;for(d=0;d<b.length;d++)null!==b[d]&&(c=a.data(i+b[d]),void 0===c&&(c=""),a.css(b[d],c))},createWrapper:function(b){if(b.parent().is(".ui-effects-wrapper"))return b.parent();var c={width:b.outerWidth(!0),height:b.outerHeight(!0),float:b.css("float")},d=a("<div></div>").addClass("ui-effects-wrapper").css({fontSize:"100%",background:"transparent",border:"none",margin:0,padding:0}),e={width:b.width(),height:b.height()},f=document.activeElement;try{f.id}catch(a){f=document.body}return b.wrap(d),(b[0]===f||a.contains(b[0],f))&&a(f).focus(),d=b.parent(),"static"===b.css("position")?(d.css({position:"relative"}),b.css({position:"relative"})):(a.extend(c,{position:b.css("position"),zIndex:b.css("z-index")}),a.each(["top","left","bottom","right"],function(a,d){c[d]=b.css(d),isNaN(parseInt(c[d],10))&&(c[d]="auto")}),b.css({position:"relative",top:0,left:0,right:"auto",bottom:"auto"})),b.css(e),d.css(c).show()},removeWrapper:function(b){var c=document.activeElement;return b.parent().is(".ui-effects-wrapper")&&(b.parent().replaceWith(b),(b[0]===c||a.contains(b[0],c))&&a(c).focus()),b}},k=["position","top","bottom","left","right","width","height"],l=c.mode,m="show"===l,n=c.direction||"left",o="up"===n||"down"===n?"top":"left",p="up"===n||"left"===n,q={};j.save(b,k),b.show(),h=c.distance||b["top"===o?"outerHeight":"outerWidth"](!0),j.createWrapper(b).css({overflow:"hidden"}),m&&b.css(o,p?isNaN(h)?"-"+h:-h:h),q[o]=(m?p?"+=":"-=":p?"-=":"+=")+h;var r=function(){b.clearQueue(),b.stop(!0,!0)};return f.activeAnimations.push(b),b.animate(q,{duration:c.duration,easing:c.easing,complete:function(){f.activeAnimations.pop(b),"show"===l?f._animationComplete(d,e):"hide"===l&&(b.hide(),f._clearSelectionComplete(d)),j.restore(b,k),j.removeWrapper(b)}}),r},_toPx:function(a){return"number"==typeof a?a+"px":a},_width:function(b){var c=a(b),d=c.css("border-left-width"),e=c.css("border-right-width"),f=parseInt(c.css("padding-left"),10),g=parseInt(c.css("padding-right"),10),h="none"===c.css("display");h&&(b.style.display="block"),d=d.indexOf("px")===-1?1:parseInt(d,10),e=e.indexOf("px")===-1?1:parseInt(e,10);var i=b.offsetWidth-(d+e+f+g);return h&&(b.style.display="none"),Math.max(0,i)},_height:function(b){var c=a(b),d=c.css("border-top-width"),e=c.css("border-bottom-width"),f=parseInt(c.css("padding-top"),10),g=parseInt(c.css("padding-bottom"),10);d=d.indexOf("px")===-1?1:parseInt(d,10),e=e.indexOf("px")===-1?1:parseInt(e,10);var h=b.offsetHeight-(d+e+f+g);return Math.max(0,h)},_closest:function(a,b,c){if(b){if(a.nodeName.toLowerCase()===b)return a;for(var d=a.parentNode;null!==d&&"#document"!==d.nodeName;){if(d.nodeName.toLowerCase()===b)return d;d=d.parentNode}}if(c){if((" "+a.className+" ").replace(/[\n\t]/g," ").indexOf(" "+c+" ")>-1)return a;for(var e=a.parentNode;null!==e&&"#document"!==e.nodeName;){if((" "+e.className+" ").replace(/[\n\t]/g," ").indexOf(" "+c+" ")>-1)return e;e=e.parentNode}}},_initAnimate:function(a){if(a.initAnimate){if(a.animate)return;a.initAnimate()}}})}(jqxBaseFramework);

